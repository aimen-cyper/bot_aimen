<?php
$admin = 8431116042;
$token = "8306869095:AAE7xkGIU5BaLTIcxJVoCR2e0z0RXnNYhNI";
$brokweb = "https://8000-ib2po42b3tda4t9x8qx5w-9d03bd5c.us1.manus.computer";
#==================#
$channels = file("database/bot.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// دالة لتسجيل الأخطاء
function logError($message) {
    file_put_contents('error_log.txt', $message . PHP_EOL, FILE_APPEND);
}

// الدالة للتحقق من اشتراك المستخدم في القناة
function isUserSubscribed($userId, $channel, $token) {
    $url = "https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$userId";
    $result = file_get_contents($url);
    $result = json_decode($result, true);

    if (!$result) {
        logError("Failed to fetch chat member info: " . json_last_error_msg());
        return false;
    }

    if ($result['ok'] && ($result['result']['status'] == 'member' || $result['result']['status'] == 'administrator' || $result['result']['status'] == 'creator')) {
        return true;
    }
    return false;
}

// الدالة لجلب اسم القناة
function getChannelName($channel, $token) {
    $url = "https://api.telegram.org/bot$token/getChat?chat_id=$channel";
    $result = file_get_contents($url);
    $result = json_decode($result, true);

    if (!$result) {
        logError("Failed to fetch chat info: " . json_last_error_msg());
        return $channel;
    }

    if ($result['ok']) {
        return $result['result']['title'];
    }
    return $channel; // ارجاع المعرف إذا لم ينجح الحصول على الاسم
}

// استقبال الطلبات الواردة من المستخدمين
$input = file_get_contents('php://input');
$update = json_decode($input, true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $userId = $update['message']['from']['id'];
    $firstName = $update['message']['from']['first_name'];

    // تحقق من اشتراك المستخدم في جميع القنوات
    $notSubscribedChannels = [];
    foreach ($channels as $channel) {
        if (!isUserSubscribed($userId, $channel, $token)) {
            $notSubscribedChannels[] = $channel;
        }
    }

    // إعداد رسالة الرد
    if (!empty($notSubscribedChannels)) {
        $message = "
🚀🎨 مرحباً بك في عالم إنشاء وإدارة الأندكسات 🎨🚀

📌 تنبيه: الاشتراك الإجباري 📌

🔐 لضمان أفضل تجربة واستخدام كامل لميزات البوت، يُرجى الاشتراك في القنوات التالية:

🌟📈 استعد للانطلاق في رحلة تفاعلية مذهلة! 📈🌟

";

        $keyboard = [
            'inline_keyboard' => []
        ];

        foreach ($notSubscribedChannels as $channel) {
            $channelName = getChannelName($channel, $token);
            // إزالة @ من معرف القناة إذا كان موجوداً
            $cleanChannel = ltrim($channel, '@');
            $keyboard['inline_keyboard'][] = [['text' => "اشترك في $channelName", 'url' => "https://t.me/$cleanChannel"]];
            $message .= "$channelName\n";
        }

        $message .= "\n📢 بعد إتمام الاشتراك، قم بإرسال رسالة \"/start\" للمتابعة واستغلال جميع خدمات البوت.\n\n💬 نتمنى لك تجربة رائعة ومليئة بالتفاعل! 💬";

        $replyMarkup = '&reply_markup=' . json_encode($keyboard);
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chatId&text=" . urlencode($message) . $replyMarkup);

        // إنهاء التنفيذ إذا لم يكن المستخدم مشتركًا في جميع القنوات
        return false;
    } else {
        // تابع بتنفيذ الخدمات هنا
    }
}
#==================#
define('API_KEY', $token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
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
function sendsticker($chat_id,$sticker_id,$caption){
    bot('sendsticker',[
        'chat_id'=>$ChatId,
        'sticker'=>$sticker_id,
        'caption'=>$caption
    ]);
 } 
//-//////
$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;

$chat_id2 = $update->callback_query->message->chat->id;
$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;
// قراءة معرفات المستخدمين المخزنة في الملف وتحويلها إلى مصفوفة
$u = explode("\n", file_get_contents("database/ID.txt"));

// حساب عدد الأعضاء الحاليين
$c = count($u) - 1;

// التأكد من أن $update و $chat_id تم تعريفهما وأن $chat_id غير موجودة بالفعل في المصفوفة $u


    // إرسال رسالة إلى الإدمن عن المستخدم الجديد
 

#===============
mkdir("database");
mkdir("database/$chat_id");
#==========لوحه تحكم========#
$id = $message->from->id;
$text = $message->text;
$chat_id = $message->chat->id;
$user = $message->from->username;
$name = $message->from->first_name;
$sajad = file_get_contents("database/rembo.txt");
$ch = file_get_contents("database/ch.txt");
$tn = file_get_contents("database/tnb.txt");
$ban = file_get_contents("database/ban.txt");
$exb = explode("\n",$ban);
$m = explode("\n",file_get_contents("database/ID.txt"));
$m1 = count($m)-1;
if($message and !in_array($id, $m)){
file_put_contents("database/ID.txt", $id."\n",FILE_APPEND);
 }
$j = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$id);
if($message && (strpos($j,'"status":"left"') or strpos($j,'"Bad Request: USER_ID_INVALID"') or strpos($j,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا عزيزي اشترك بقناة البوت اولا❎
$ch
ثم ارسل /start",
]);return false;}

if (isset($update) && !in_array($chat_id, $u)) {
    // حفظ معرف المستخدم الجديد إلى الملف
    file_put_contents("database/ID.txt", $chat_id . "\n", FILE_APPEND);
if($text =="/start"and $tn =="on"and $id !=$admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>
"
🔔 *تنبيه: مستخدم جديد انضم إلى البوت الخاص بك!*
👨‍💼¦ اسمه » ️ [$name](tg://user?id=$id)
🔱¦ معرفه »  ️[@$user](tg://user?id=$id)
💳¦ ايديه » ️ [$id](tg://user?id=$id)
📊 *عدد الأعضاء الكلي:* $c
",
'parse_mode'=>"MarkDown",
]);
}
}
if($text =='/start' and $id ==$admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"•وضع اشتراك اجباري💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك اجباري🔱",'callback_data'=>"dch"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"ايقاف البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
]
])
]);
}

if($data =='back'){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين ",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"•وضع اشتراك اجباري💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك اجباري🔱",'callback_data'=>"dch"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"ايقاف البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
]
])
]);
unlink("database/rembo.txt");
}
if($data =="ban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لاحظره🤩", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","ban");
}

if($text and $sajad =="ban" and $id ==$admin){
file_put_contents("database/ban.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم حظرك من قبل المطور لايمكنك استخدام البوت😒",
]);
}

if($data =="unban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لالغاء حظره🔱", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","unban");
}
if($text and $sajad =="unban" and $id ==$admin){
$bn = str_replace($text,'',$ban);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم الغاء حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/ban.txt",$bn);
unlink("database/rembo.txt");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم الغاء حظرك من البوت🤩",
]);
}
if($data =="ofbot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم اغلاق البوت✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/bot.txt","off");
}
$obot = file_get_contents("database/bot.txt");
if($data =="obot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم فتح البوت بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("database/bot.txt");
}
if($data =="send"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رسالتك📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","send");
} 
if($text and $sajad == "send" and $id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'-تم النشر بنجاح✔️',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('sendMessage', [
'chat_id'=>$m[$i],
'text'=>$text
]);
unlink("database/rembo.txt");
}
}
if($data =="forward"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي قم بتوجيه الرسالة✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","forward");
} 
if($text and $sajad == "forward" and $id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'تم التوجيه بنجاح🔰',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('forwardMessage', [
'chat_id'=>$m[$i],
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
unlink("database/rembo.txt");
}
}
if($data =="ach"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك 📮
مثل @h4ck3riraq
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","ch");
} 
if($text and $sajad =="ch" and $id ==$admin ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم وضع اشتراك اجباري😁", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
file_put_contents("database/ch.txt","$text");
unlink("database/rembo.txt");
} 
if($data == "m1"){
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
عدد المشترڪين هو » $m1 «
        ",
        'show_alert'=>true,
]);
}
if($data =="dch"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"🔰تم حذف القناة بنجاح", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
unlink("database/ch.txt");
} 
if($data =="ons"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تفعيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/tnb.txt","on");
} 

if($data =="ofs"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تعطيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("database/tnb.txt");
} 

if($message and in_array($id, $exb)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"انت محظور من قبل المطور لايمكنك استخدام البوت📛",
]);return false;}

if($message and $obot =="off" and $id !=$admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"بوت متوقف حاليا لاغراض خاصه 🚨🚧",
]);return false;}


$vip = file_get_contents("database/vip.txt");
$vip2 = explode("\n", $vip);

include("index2.php");

?>
