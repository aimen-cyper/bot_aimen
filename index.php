<?php
$admin = 8431116042;
$token = "8306869095:AAE7xkGIU5BaLTIcxJVoCR2e0z0RXnNYhNI";
$brokweb = "https://1d10d478f43b4c.lhr.life";
#==================#

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
$ban = file_get_contents("database/ban.txt");
$exb = explode("\n",$ban);



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

$bot = file_get_contents("database/bot.txt");

$m = explode("\n",file_get_contents("database/ID.txt"));
$m1 = count($m)-1;
if($message and !in_array($id, $m)){
file_put_contents("database/ID.txt", $id."\n",FILE_APPEND);
 }
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
'text' => "مرحبًا! إليك أوامرك: ⚡📮\n\n
1. إدارة المشتركين والتحكم بهم.\n
2. إرسال إذاعات ورسائل موجهة.\n
3. ضبط إعدادات الاشتراك الإجباري.\n
4. تفعيل أو تعطيل التنبيهات.\n
5. إدارة حالة البوت ووضع الاشتراك.",
'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => "المشتركين 👥", 'callback_data' => "m1"]],
        [['text' => "إذاعة رسالة 📮", 'callback_data' => "send"], ['text' => "توجيه رسالة 🔄", 'callback_data' => "forward"]],
        [['text' => "وضع اشتراك إجباري 💢", 'callback_data' => "ach"], ['text' => "حذف اشتراك إجباري 🔱", 'callback_data' => "dch"]],
        [['text' => "تفعيل التنبيه ✔️", 'callback_data' => "ons"], ['text' => "تعطيل التنبيه ❎", 'callback_data' => "ofs"]],
        [['text' => "فتح البوت ✅", 'callback_data' => "obot"], ['text' => "إيقاف البوت ❌", 'callback_data' => "ofbot"]],
        [['text' => "وضع المدفوع 💰", 'callback_data' => "pro"], ['text' => "وضع المجاني 🆓", 'callback_data' => "frre"]],
        [['text' => "اظافه عظو مدفوع 💰", 'callback_data' => "pro123"], ['text' => "ازاله عظو مدفوع 🆓", 'callback_data' => "frre123"]],
        [['text' => "حظر عضو 🚫", 'callback_data' => "ban"], ['text' => "إلغاء حظر عضو ❌", 'callback_data' => "unban"]],
    ]
])
]);

}

if($data =='back'){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text' => "مرحبًا! إليك أوامرك: ⚡📮\n\n
1. إدارة المشتركين والتحكم بهم.\n
2. إرسال إذاعات ورسائل موجهة.\n
3. ضبط إعدادات الاشتراك الإجباري.\n
4. تفعيل أو تعطيل التنبيهات.\n
5. إدارة حالة البوت ووضع الاشتراك.",
'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => "المشتركين 👥", 'callback_data' => "m1"]],
        [['text' => "إذاعة رسالة 📮", 'callback_data' => "send"], ['text' => "توجيه رسالة 🔄", 'callback_data' => "forward"]],
        [['text' => "وضع اشتراك إجباري 💢", 'callback_data' => "ach"], ['text' => "حذف اشتراك إجباري 🔱", 'callback_data' => "dch"]],
        [['text' => "تفعيل التنبيه ✔️", 'callback_data' => "ons"], ['text' => "تعطيل التنبيه ❎", 'callback_data' => "ofs"]],
        [['text' => "فتح البوت ✅", 'callback_data' => "obot"], ['text' => "إيقاف البوت ❌", 'callback_data' => "ofbot"]],
        [['text' => "وضع المدفوع 💰", 'callback_data' => "pro"], ['text' => "وضع المجاني 🆓", 'callback_data' => "frre"]],
        [['text' => "اظافه عظو مدفوع 💰", 'callback_data' => "pro123"], ['text' => "ازاله عظو مدفوع 🆓", 'callback_data' => "frre123"]],
        [['text' => "حظر عضو 🚫", 'callback_data' => "ban"], ['text' => "إلغاء حظر عضو ❌", 'callback_data' => "unban"]],
    ]
])
]);

unlink("database/rembo.txt");
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
file_put_contents("database/$token/rembo.txt","unban");
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
file_put_contents("database/$token/ban.txt",$bn);
unlink("database/$token/rembo.txt");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم الغاء حظرك من البوت🤩",
]);
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
file_put_contents("database/bot1.txt","off");
}
$obot = file_get_contents("database/bot1.txt");
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
unlink("database/bot1.txt");
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

if($data =="dch"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"ارسل معرف القناه لازالتها من الاشتراك الاجباري", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","dch");
}
if($text and $sajad =="dch" and $id ==$admin){
$botn = str_replace($text,'',$bot);
file_put_contents("database/bot.txt","$botn");
unlink("database/rembo.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم مسح القناه من الاشتراك الاجباري",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
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
#========القسم مدفوع =======#
if($data =="pro123"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"قم بارسال ايدي الشخص مراد اظافته بقسم مدفوع", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","pro123");
}
if($text and $sajad =="pro123" and $id ==$admin){
file_put_contents("database/vip123.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم اظافته في وضع مدفوع",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("database/rembo.txt");
}
#================
if($data =="frre123"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"ارسل ايدي شخص مراد ازالته من الاشتراك مدفوع", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","frre123");
}
if($text and $sajad =="frre123" and $id ==$admin){
$botn = str_replace($text,'',$bot);
file_put_contents("database/vip123.txt","$botn");
unlink("database/rembo.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم ازالته من الاشتراك مدفوع",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
}
#================#
if($data =="ach"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك 📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/rembo.txt","ch");
}
if($text and $sajad =="ch" and $id ==$admin){
file_put_contents("database/bot.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم وضع اشتراك اجباري😁",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("database/rembo.txt");
}
#================

#=°°°====°°
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
#========مدفوع=======#
if($data =="frre"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم جعل البوت بوضع المجاني 😊
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("database/vip.txt");
} 
if($data =="pro"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم جعل البوت بوضع المدفوع 💼
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
   file_put_contents("database/vip.txt", "on");
} 


$vip = file_get_contents("database/vip.txt");
$vip123 = file_get_contents("database/vip123.txt");
$vip2 = explode("\n", $vip123);

if ($vip == "on" and !in_array($id, $vip2)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبًا بكم! 🌟

للاستفادة الكاملة من جميع ميزات وخدمات بوتنا المتقدمة، يُرجى تفعيل البوت من خلال شراء الاشتراك. ⚙️✨

نحن نعمل بجد لضمان تقديم تجربة فريدة ومميزة لكم. 🚀

شكراً لثقتكم بنا. 😊",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"شراء الاشتراك",'url'=>"tg://user?id=$admin"]],
]
])
]);return false;}
#===============

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

#================
include("index2.php");

?>
