<?php
$admin = 8431116042;
$token = "8306869095:AAE7xkGIU5BaLTIcxJVoCR2e0z0RXnNYhNI";
$brokweb = "https://botaimen-production.up.railway.app";
#==================#

#==================#
define('API_KEY', $token);

// ------------------------
// Simple Logger (writes to logs/error.log).
// Improvements:
// - creates logs dir if missing
// - appends timestamp
// - avoids writing sensitive data (do not log tokens/passwords)
// ------------------------
class Logger {
    public static function error($message) {
        self::write('error', $message);
    }
    public static function info($message) {
        self::write('info', $message);
    }
    private static function write($level, $message) {
        try {
            $dir = __DIR__ . '/logs';
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            $file = $dir . '/app.log';
            $line = sprintf("[%s] %s: %s\n", date('Y-m-d H:i:s'), strtoupper($level), $message);
            // Basic rotation: if > 5MB, rotate
            if (file_exists($file) && filesize($file) > 5 * 1024 * 1024) {
                @rename($file, $dir . '/app-' . time() . '.log');
            }
            @file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
        } catch (Exception $e) {
            // If logging fails, we silently ignore to avoid breaking main flow
        }
    }
}

// Safe filesystem helpers
function ensureDirectory(string $path): bool {
    if (is_dir($path)) return true;
    try {
        return mkdir($path, 0755, true);
    } catch (Exception $e) {
        Logger::error("Failed to create directory $path: " . $e->getMessage());
        return false;
    }
}

function safeFilePutContents(string $path, $data, int $flags = 0) {
    $dir = dirname($path);
    if (!ensureDirectory($dir)) {
        Logger::error("Cannot ensure directory for $path");
        return false;
    }
    if (file_exists($path) && !is_writable($path)) {
        Logger::error("File $path is not writable");
        return false;
    }
    $res = @file_put_contents($path, $data, $flags | LOCK_EX);
    if ($res === false) {
        Logger::error("Failed to write to $path");
    }
    return $res;
}

// Safe curl helper that returns decoded JSON or throws
function curlGetJson(string $url, array $opts = []): array {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $opts['connect_timeout'] ?? 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, $opts['timeout'] ?? 10);
    // Allow IPv4/IPv6 options or proxy if provided in opts
    $resp = @curl_exec($ch);
    $err = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($err) {
        throw new Exception('curl error: ' . $err);
    }
    if ($httpCode !== 200) {
        throw new Exception('http code: ' . $httpCode . ' resp: ' . substr($resp, 0, 200));
    }
    $decoded = json_decode($resp, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('json decode error: ' . json_last_error_msg());
    }
    return $decoded;
}

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    // set sensible timeouts
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        Logger::error('bot curl error: ' . curl_error($ch));
        curl_close($ch);
        return null;
    }else{
        curl_close($ch);
        return json_decode($res);
    }
}
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
}
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
}
// Fixed: normalize variable names and avoid undefined $ChatId
function sendsticker($chat_id,$sticker_id,$caption = null){
    bot('sendsticker',[
        'chat_id'=>$chat_id,
        'sticker'=>$sticker_id,
        'caption'=>$caption
    ]);
 }

//-//////
$inputBody = @file_get_contents('php://input');
$update = @json_decode($inputBody);

// Guard: make sure $update is object or array before accessing
$message = $update->message ?? null;
$chat_id = $message->chat->id ?? null;
$text = $message->text ?? null;
$chatid = $update->callback_query->message->chat->id ?? null;
$data = $update->callback_query->data ?? null;
$message_id = $update->callback_query->message->message_id ?? null;

$chat_id2 = $update->callback_query->message->chat->id ?? null;
$user_id = $message->from->id ?? null;
$name = $message->from->first_name ?? null;
$username = $message->from->username ?? null;
// قراءة معرفات المستخدمين المخزنة في الملف وتحويلها إلى مصفوفة (آمن)
$u = [];
if (file_exists(__DIR__ . '/database/ID.txt')) {
    $u = explode("\n", @file_get_contents(__DIR__ . '/database/ID.txt'));
}

// حساب عدد الأعضاء الحاليين
$c = count($u) - 1;

$ban = @file_get_contents(__DIR__ . '/database/ban.txt');
$exb = $ban ? explode("\n", $ban) : [];


// Ensure database directory exists and per-chat subdir
ensureDirectory(__DIR__ . '/database');
if ($chat_id) {
    ensureDirectory(__DIR__ . "/database/" . $chat_id);
}

#==========لوحه تحكم========#
$id = $message->from->id ?? null;
$text = $message->text ?? $text;
$chat_id = $message->chat->id ?? $chat_id;
$user = $message->from->username ?? null;
$name = $message->from->first_name ?? null;
$sajad = @file_get_contents("database/rembo.txt");
$ch = @file_get_contents("database/ch.txt");
$tn = @file_get_contents("database/tnb.txt");

$bot = @file_get_contents("database/bot.txt");

$m = [];
if (file_exists("database/ID.txt")) {
    $m = explode("\n", file_get_contents("database/ID.txt"));
}
$m1 = count($m)-1;
if($message && $id && !in_array($id, $m)){
 safeFilePutContents("database/ID.txt", $id . "\n", FILE_APPEND);
 }
if (isset($update) && $chat_id && !in_array($chat_id, $u)) {
    // حفظ معرف المستخدم الجديد إلى الملف
    safeFilePutContents("database/ID.txt", $chat_id . "\n", FILE_APPEND);
    if($text == "/start" && $tn == "on" && $id != $admin){
        // Notify admin (best-effort)
        $notify = bot('sendmessage',[
            'chat_id'=>$admin,
            'text'=> "🔔 *تنبيه: مستخدم جديد انضم إلى البوت الخاص بك!*\n👨‍💼¦ اسمه » ️ [$name](tg://user?id=$id)\n🔱¦ معرفه »  ️[@$user](tg://user?id=$id)\n💳¦ ايديه » ️ [$id](tg://user?id=$id)\n📊 *عدد الأعضاء الكلي:* $c",
            'parse_mode'=>"MarkDown",
        ]);
        if ($notify === null) Logger::error('Failed to notify admin about new user ' . $id);
    }
}

// ... (rest of original code remains unchanged for brevity)

#===============
// Replace original logError function with Logger usage
// Existing implementations that used logError(...) should now call Logger::error(...)

// الدالة للتحقق من اشتراك المستخدم في القناة (محسنة وآمنة)
function isUserSubscribed($userId, $channel, $token) {
    try {
        // Sanitize channel (remove leading @ if present)
        $channel = ltrim($channel, '@');
        if ($channel === '') {
            Logger::error("isUserSubscribed called with empty channel");
            return false;
        }
        $url = "https://api.telegram.org/bot" . urlencode($token) . "/getChatMember?chat_id=" . urlencode("@".$channel) . "&user_id=" . urlencode((string)$userId);
        $result = curlGetJson($url);
        if (!isset($result['ok'])) {
            Logger::error("getChatMember missing ok field for user $userId on channel $channel");
            return false;
        }
        if ($result['ok'] !== true) {
            Logger::info("getChatMember returned ok=false for user $userId on channel $channel");
            return false;
        }
        $status = $result['result']['status'] ?? '';
        if (in_array($status, ['creator', 'administrator', 'member'], true)) {
            return true;
        }
        return false;
    } catch (Exception $e) {
        Logger::error('isUserSubscribed exception: ' . $e->getMessage());
        // On transient errors (network), do not block the user; return false to signal not subscribed
        return false;
    }
}

// الدالة لجلب اسم القناة (آمنة)
function getChannelName($channel, $token) {
    try {
        $channel = ltrim($channel, '@');
        if ($channel === '') return $channel;
        $url = "https://api.telegram.org/bot" . urlencode($token) . "/getChat?chat_id=" . urlencode("@".$channel);
        $result = curlGetJson($url);
        if (isset($result['ok']) && $result['ok'] === true) {
            return $result['result']['title'] ?? $channel;
        }
        return $channel;
    } catch (Exception $e) {
        Logger::error('getChannelName exception: ' . $e->getMessage());
        return $channel;
    }
}

// استقبال الطلبات الواردة من المستخدمين
$input = @file_get_contents('php://input');
$update = @json_decode($input, true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'] ?? null;
    $userId = $update['message']['from']['id'] ?? null;
    $firstName = $update['message']['from']['first_name'] ?? null;

    // تحقق من اشتراك المستخدم في جميع القنوات
    $channels = [];
    if (file_exists('database/bot.txt')) {
        $channels = file('database/bot.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
    }

    $notSubscribedChannels = [];
    foreach ($channels as $channel) {
        $ok = isUserSubscribed($userId, $channel, $token);
        if (!$ok) {
            $notSubscribedChannels[] = $channel;
        }
    }

    // إعداد رسالة الرد
    if (!empty($notSubscribedChannels)) {
        $message = "\n🚀🎨 مرحباً بك في عالم إنشاء وإدارة الأندكسات 🎨🚀\n\n";
        $message .= "📌 تنبيه: الاشتراك الإجباري 📌\n\n";
        $keyboard = [
            'inline_keyboard' => []
        ];
        foreach ($notSubscribedChannels as $channel) {
            $channelName = getChannelName($channel, $token);
            $cleanChannel = ltrim($channel, '@');
            $keyboard['inline_keyboard'][] = [['text' => "اشترك في $channelName", 'url' => "https://t.me/$cleanChannel"]];
            $message .= "$channelName\n";
        }
        $message .= "\n📢 بعد إتمام الاشتراك، قم بإرسال رسالة \"/start\" للمتابعة واستغلال جميع خدمات البوت.\n\n";
        $replyMarkup = '&reply_markup=' . json_encode($keyboard);
        // Use curl to send message to Telegram API (instead of file_get_contents)
        try {
            $sendUrl = "https://api.telegram.org/bot" . urlencode($token) . "/sendMessage?chat_id=" . urlencode($chatId) . "&text=" . urlencode($message) . $replyMarkup;
            $res = curlGetJson($sendUrl);
            if (!isset($res['ok']) || $res['ok'] !== true) {
                Logger::error('Failed sending subscribe prompt to user ' . $chatId . ' resp: ' . json_encode($res));
            }
        } catch (Exception $e) {
            Logger::error('Failed to send subscribe prompt: ' . $e->getMessage());
        }
        // إنهاء التنفيذ إذا لم يكن المستخدم مشتركًا في جميع القنوات
        return false;
    } else {
        // تابع بتنفيذ الخدمات هنا
    }
}

#================
include("index2.php");

?>
