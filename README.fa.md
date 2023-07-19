
<font color="yellow">توجه:</font> توضیحات فارسی دیر تر آپدیت میشن. پس حتما داکیومنت انگلیسی رو بررسی کنید

# PTB-PHP = Procedural Telegram Bot (PHP Library)

> کتابخانه PTB به پروژه شما انعطاف پذیری، مقیاس پذیری و سرعت فوق العاده می دهد

# 🗂️ فهرست مطالب

- 🌟 [معرفی](#introduction)
- 💡 [مثال ساده](#basic-example)
- 🛠️ [نصب و راه اندازی](#installation)
- ❓ [چرا برنامه نویسی رویه‌ای (Procedural) و نه شیءگرا (OOP)؟](#why-procedural)
- 📚 [مستندات](#documentation)
    - ⚙️ [پیکربندی](#configuration)
    - 📤 [آپلود فایل ها](#uploading-files)
    - 📥 [دانلود فایل ها](#downloading-files)
    - 🤖 [مدیریت چند ربات](#multiple-bot-management)
    - 🤝 میان افزار ها (به زودی...)
    - 💬 مکالمه ها (به زودی...)
    - 🎮 [کیبرد ها](#keyboards)
        - [نوع ReplyKeyboardMarkup](#reply-keyboard-markup)
        - [نوع InlineKeyboardMarkup](#inline-keyboard-markup)
    - 🧩 [هندلر ها](#handlers)
    - 🚁 [توابع کمکی](#helpers)
    - 💎 [متد های موجود](#available-methods)
    - 🔮 [انواع موجود](#available-types)
    - ⚓️ [ثابت های موجود](#available-constants)
    - ♟ نحوه استفاده بدون هندلر ها (به زودی...)
- 🐞 [گزارش باگ](#bug-report)
- 📝 [تغییرات](#changelog)
- 🙌 [همکاران](#credits)
- 📜 [مجوز](#license)

# 🌟 معرفی <a name="introduction"></a>

این کتابخانه از آخرین قابلیت‌های **PHP 8** بهره می‌برد و سعی می‌کند مزیت‌های **سرعت**، **قابلیت مقیاس‌پذیری** و **انعطاف‌پذیری** را برای استفاده به خوبی بهره ببرد. این کتابخانه به شما اجازه می‌دهد تا به سرعت ربات‌های ساده‌ای را ایجاد کنید، اما در عین حال، امکانات **پیشرفته‌تری** را نیز برای مدیریت حتی پیچیده‌ترین جریان‌ها فراهم می‌کند. برخی از مفاهیم معماری که بر پایه آن PTB ساخته شده است، تحت تأثیر قرارگرفته‌اند از پروژه متن باز دیگری به نام [Nutgram](https://github.com/nutgram/nutgram) است! همچنین آن را نیز بررسی کنید!

# مثال ساده <a name="basic-example"></a>

```php
<?php

use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\sendMessage;

// require(__DIR__.'/vendor/autoload.php'); // میتوانید از آتولودر کامپوزر استفاده کنید
require(__DIR__.'/path/to/PTB.php'); // یا به صورت مستقیم فایل اصلی را در پروژه لود کنید

/*
    این تابع برای تنظیم تنظیمات اولیه کتابخانه بوده و 
    می بایست در بالای کد و قبل از هندلر ها تعریف و فراخوانی شود
*/
configurePTB(
    token: 'TOKEN', // توکن ربات شما
    username: 'devdasherbot', // نام کاربری ربات شما
    // ...
);


# یک میان افزار قبل از هندلر ها
middleware(callable: function() {
    sendMessage('میان افزار سراسری');

    // این میان افزار به صورت خودکار قبل از هندلر های اصلی اجرا میشود
});


/*
    این هندلر برای بررسی ورودی های متنی در نوع آپدیت
    message
    مورد استفاده قرار میگیرد
*/
onMessageText(
    # الگوی متنی خود را در اینجا وارد کنید
    pattern: '/start', 

    # تابعی که بعد از بررسی الگو در پاسخ به کاربر اجرا میشود
    callable: function() { 
        sendMessage(text: 'سلام دنیا'); // تابعی برای ارسال پیام به کاربر

        /*
            به صورت خلاصه اگر کاربر دستور
            /start
            را به ربات ارسال کند، پاسخ «سلام دنیا» به او ارسال خواهد شد
        */
    },
);


# در اینجا یک مثال دیگر را باهم بررسی میکنیم
onMessageText(
    # الگوی متنی به همراه یک متغیر
    pattern: 'اسم من {name} است', 
    
    # تابعی که بعد از بررسی الگو در پاسخ به کاربر اجرا میشود
    callable: function($name) { // دقت کنید که متغیر مربوطه را در پارامتر تابع دریافت میکنید
        sendMessage(text: "سلام $name");

        /*
            به صورت خلاصه اگر کاربر متن زیر را ارسال کند:
            «اسم من پوریا است»
            ربات نیز پاسخ «سلام پوریا» را در جواب به کاربر ارسال خواهد کرد
        */
    },
);


/*
    یک هندلر برای نوع آپدیت
    message
*/
onMessage(callable: function() {
    sendMessage('onMessage');

    /*
        به صورت خلاصه، هر پیامی که کاربر به صورت مستقیم به ربات ارسال کند،
            این هندلر فراخوانی شده و پیام با مقدار زیر به کاربر ارسال خواهد شد:
            "onMessage"

        البته، این اتفاق زمانی رخ خواهد داد که آپدیت ارسالی با هندلر های قبلی مطابقت نداشته باشند
    */
});


/*
    این تابع همیشه باید آخر کد (بعد از هندلر ها) قرار داشته باشد
    بعد از فراخوانی شدن این تابع، کتابخانه هندلر های موجود را بررسی
    و متناسب با آن کد های مربوطه را اجرا و پاسخ مناسب را به کاربر ارسال میکند
    پاسخی که شما در یک تابع ناشناس در هندلر های قبلی تعیین کرده اید
*/
run();

```

# 🛠️ نصب و راه اندازی <a name="installation"></a>

شما می‌توانید کتابخانه را از طریق composer نصب کنید:

```bash
composer require devdasher/ptb-php
```

و یا میتوانید صرفا فایل اصلی کتابخانه یعنی PTB.php را در کد PHP خود لود کنید

# ❓ چرا برنامه نویسی رویه‌ای (Procedural) و نه شیءگرا (OOP)؟ <a name="why-procedural"></a>

برنامه نویسی رویه‌ای به دلیل کمترین هزینه و تعداد عملیات مورد نیاز برای اجرا، به طور معمول سریع‌تر از برنامه نویسی شیءگرا (OOP) در نظر گرفته می‌شود. در برنامه نویسی رویه‌ای، تمرکز بر نوشتن دستورات متوالی به صورت گام به گام برای انجام یک وظیفه است. این رویکرد به اجرای کارآمد اجازه می‌دهد زیرا برنامه با استفاده از دستورات ساده، مستقیماً بر روی داده‌ها عمل می‌کند.

یکی از عوامل کلیدی که به سرعت واحساس شده برنامه نویسی رویه‌ای کمک می‌کند، تعداد کاهش یافته OPcodes (کدهای عملیات) مربوط است. OPcodes دستورات بنیادی هستند که توسط سخت‌افزار رایانه درک می‌شوند و عملیات خاصی مانند محاسبات حسابی یا دسترسی به حافظه را تعریف می‌کنند. از آنجا که برنامه‌های رویه‌ای به طور معمول شامل لایه‌های کمتری از انتزاع و مدیریت مستقیم داده هستند، به تعداد کمتری از OPcodes برای دستیابی به یک عملکرد خاص نیاز دارند.

در مقابل، برنامه نویسی شیءگرا از طریق مفاهیمی مانند کلاس‌ها، اشیاء و ارث‌بری، لایه‌های پیچیدگی اضافی را معرفی می‌کند. این ویژگی‌ها بهره‌وری مانند قابلیت استفاده مجدد کد، مدولاریت و قابلیت نگهداری را فراهم می‌کنند، اما همچنین ممکن است بار عملیاتی اضافی را به همراه داشته باشند. برنامه‌های شیءگرا اغلب شامل تعاملات پیچیده‌تری بین اشیاء هستند که ممکن است به مراحل پردازش و سطوح میانی بیشتری نیاز داشته باشد. این عوامل می‌توانند منجر به اجرایی کمی کندتر نسبت به برنامه‌های رویه‌ای شوند، به خصوص در حالت‌هایی که عملکرد بحرانی است و ویژگی‌های اضافی شیءگرا به طور قابل استفاده نیستند.

مهم است توجه داشت که تفاوت عملکرد بین رویه‌ای و شیءگرا به متناسب با شرایط و عوامل مختلفی است که شامل زبان برنامه نویسی مورد استفاده، کارایی کامپایلر یا مفسر، انتخاب‌های طراحی صورت گرفته و ماهیت مسئله‌ای که حل می‌شود، می‌شود. بنابراین، اگرچه برنامه نویسی رویه‌ای به دلیل مدل اجرایی ساده و استفاده کمتری از OPcodes به عنوان سریع‌تر درک می‌شود، اما این یک قانون قطعی نیست و شیءگرا می‌تواند مزایای قابل توجهی را در جهت سازماندهی کدها، قابلیت نگهداری و امکان‌سنجی ارائه دهد.

# 📚 مستندات <a name="documentation"></a>

این کتابخانه همواره در حال به روز رسانی می باشد و در حال حاضر دارای قابلیت های بسیار زیادی است.  
بعدا این بخش را تکمیل خواهیم کرد

## ⚙️ پیکربندی <a name="configuration"></a>

توضیحات به زودی...

## 📤 آپلود فایل ها <a name="uploading-files"></a>

توضیحات به زودی...

## 📥 دانلود فایل ها <a name="downloading-files"></a>

توضیحات به زودی...

## 🤖 مدیریت چند ربات <a name="multiple-bot-management"></a>

توضیحات به زودی...

## 🎮 کیبرد ها <a name="keyboards"></a>

توضیحات به زودی...

### نوع ReplyKeyboardMarkup <a name="reply-keyboard-markup"></a>

...

### نوع InlineKeyboardMarkup <a name="inline-keyboard-markup"></a>

...

## 🧩 هندلر ها (کنترل کننده ها) <a name="handlers"></a>

توضیحات به زودی...

در اینجا لیستی از تمام هندلر های موجود در کتابخانه آمده است:

| هندلر های Message                              | Description
|-----------------------------------------------|-------------
| `onMessageText(...)`                          | Handles `text` on `message` update type
| `onMessagePhoto(...)`                         | Handles `photo` on `message` update type
| `onMessageAnimation(...)`                     | Handles `animation` on `message` update type
| `onMessageVideo(...)`                         | Handles `video` on `message` update type
| `onMessageVideoNote(...)`                     | Handles `video note` on `message` update type
| `onMessageAudio(...)`                         | Handles `audio` on `message` update type
| `onMessageVoice(...)`                         | Handles `voice` on `message` update type
| `onMessageDocument(...)`                      | Handles `document` on `message` update type
| `onMessageLocation(...)`                      | Handles `location` on `message` update type
| `onMessageContact(...)`                       | Handles `contact` on `message` update type
| `onMessagePoll(...)`                          | Handles `poll` on `message` update type
| `onMessageVenue(...)`                         | Handles `venue` on `message` update type
| `onMessageGame(...)`                          | Handles `game` on `message` update type
| `onMessageDice(...)`                          | Handles `dice` on `message` update type
| `onMessageSticker(...)`                       | Handles `sticker` on `message` update type
| `onMessageNewChatMembers(...)`                | Handlers `new_chat_members` on `message` update type
| `onMessageLeftChatMember(...)`                | Handlers `left_chat_member` on `message` update type
| `onMessageNewChatTitle(...)`                  | Handlers `new_chat_title` on `message` update type
| `onMessageNewChatPhoto(...)`                  | Handlers `new_chat_photo` on `message` update type
| `onMessageDeleteChatPhoto(...)`               | Handlers `delete_chat_photo` on `message` update type
| `onMessageGroupChatCreated(...)`              | Handlers `group_chat_created` on `message` update type
| `onMessageSupergroupChatCreated(...)`         | Handlers `supergroup_chat_created` on `message` update type
| `onMessageChannelChatCreated(...)`            | Handlers `channel_chat_created` on `message` update type
| `onMessageMessageAutoDeleteTimerChanged(...)` | Handlers `message_auto_delete_timer_changed` on `message` update type
| `onMessageMigrateToChatId(...)`               | Handlers `migrate_to_chat_id` on `message` update type
| `onMessageMigrateFromChatId(...)`             | Handlers `migrate_from_chat_id` on `message` update type
| `onMessagePinnedMessage(...)`                 | Handlers `pinned_message` on `message` update type
| `onMessageInvoice(...)`                       | Handlers `invoice` on `message` update type
| `onMessageSuccessfulPayment(...)`             | Handlers `successful_payment` on `message` update type
| `onMessageUserShared(...)`                    | Handlers `user_shared` on `message` update type
| `onMessageChatShared(...)`                    | Handlers `chat_shared` on `message` update type
| `onMessageConnectedWebsite(...)`              | Handlers `connected_website` on `message` update type
| `onMessageWriteAccessAllowed(...)`            | Handlers `write_access_allowed` on `message` update type
| `onMessagePassportData(...)`                  | Handlers `passport_data` on `message` update type
| `onMessageProximityAlertTriggered(...)`       | Handlers `proximity_alert_triggered` on `message` update type
| `onMessageForumTopicCreated(...)`             | Handlers `forum_topic_created` on `message` update type
| `onMessageForumTopicEdited(...)`              | Handlers `forum_topic_edited` on `message` update type
| `onMessageForumTopicClosed(...)`              | Handlers `forum_topic_closed` on `message` update type
| `onMessageForumTopicReopened(...)`            | Handlers `forum_topic_reopened` on `message` update type
| `onMessageGeneralForumTopicHidden(...)`       | Handlers `general_forum_topic_hidden` on `message` update type
| `onMessageGeneralForumTopicUnhidden(...)`     | Handlers `general_forum_topic_unhidden` on `message` update type
| `onMessageVideoChatScheduled(...)`            | Handlers `video_chat_scheduled` on `message` update type
| `onMessageVideoChatStarted(...)`              | Handlers `video_chat_started` on `message` update type
| `onMessageVideoChatEnded(...)`                | Handlers `video_chat_ended` on `message` update type
| `onMessageVideoChatParticipantsInvited(...)`  | Handlers `video_chat_participants_invited` on `message` update type
| `onMessageWebAppData(...)`                    | Handlers `web_app_data` on `message` update type
| `onMessage(...)`                              | Will be called if none of the above handlers match

| هندلر های EditedMessage          | توضیحات
|---------------------------------|-------------
| `onEditedMessageText`           | Handles `text` on `edited_message` update type
| `onEditedMessagePhoto`          | Handles `photo` on `edited_message` update type
| `onEditedMessageAnimation`      | Handles `animation` on `edited_message` update type
| `onEditedMessageVideo`          | Handles `video` on `edited_message` update type
| `onEditedMessageVideoNote`      | Handles `video note` on `edited_message` update type
| `onEditedMessageAudio`          | Handles `audio` on `edited_message` update type
| `onEditedMessageVoice`          | Handles `voice` on `edited_message` update type
| `onEditedMessageDocument`       | Handles `document` on `edited_message` update type
| `onEditedMessageLocation [!]`     | Handles `location` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Location Messages)
| `onEditedMessageContact [!]`      | Handles `contact` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Contact Messages)
| `onEditedMessagePoll [!]`         | Handles `poll` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Poll Messages)
| `onEditedMessageVenue [!]`        | Handles `venue` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Venue Messages)
| `onEditedMessageGame [!]`         | Handles `game` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Game Messages)
| `onEditedMessageDice [!]`         | Handles `dice` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Dice Messages)
| `onEditedMessageSticker [!]`      | Handles `sticker` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this (Editing Sticker Messages)
| `onEditedMessage`               | Will be called if none of the above handlers match

| هندلر های ChannelPost                                | Description
|-----------------------------------------------------|-------------
| `onChannelPostText(...)`                            | Handles `text` on `channel_post` update type
| `onChannelPostPhoto(...)`                           | Handles `photo` on `channel_post` update type
| `onChannelPostAnimation(...)`                       | Handles `animation` on `channel_post` update type
| `onChannelPostVideo(...)`                           | Handles `video` on `channel_post` update type
| `onChannelPostVideoNote(...)`                       | Handles `video note` on `channel_post` update type
| `onChannelPostAudio(...)`                           | Handles `audio` on `channel_post` update type
| `onChannelPostVoice(...)`                           | Handles `voice` on `channel_post` update type
| `onChannelPostDocument(...)`                        | Handles `document` on `channel_post` update type
| `onChannelPostLocation(...)`                        | Handles `location` on `channel_post` update type
| `onChannelPostContact(...)`                         | Handles `contact` on `channel_post` update type
| `onChannelPostPoll(...)`                            | Handles `poll` on `channel_post` update type
| `onChannelPostVenue(...)`                           | Handles `venue` on `channel_post` update type
| `onChannelPostGame(...)`                            | Handles `game` on `channel_post` update type
| `onChannelPostDice(...)`                            | Handles `dice` on `channel_post` update type
| `onChannelPostSticker(...)`                         | Handles `sticker` on `channel_post` update type
| `onChannelPostMessageAutoDeleteTimerChanged(...)`   | Handles `message_auto_delete_timer_changed` on `channel_post` update type
| `onChannelPostPinnedMessage(...)`                   | Handles `pinned_message` on `channel_post` update type
| `onChannelPost(...)`                                | Will be called if none of the above handlers match

| هندلر های EditedChannelPost         | توضیحات
|------------------------------------|-------------
| `onEditedChannelPostText`          | Handles `text` on `edited_channel_post` update type
| `onEditedChannelPostPhoto`         | Handles `photo` on `edited_channel_post` update type
| `onEditedChannelPostAnimation`     | Handles `animation` on `edited_channel_post` update type
| `onEditedChannelPostVideo`         | Handles `video` on `edited_channel_post` update type
| `onEditedChannelPostVideoNote`     | Handles `video note` on `edited_channel_post` update type
| `onEditedChannelPostAudio`         | Handles `audio` on `edited_channel_post` update type
| `onEditedChannelPostVoice`         | Handles `voice` on `edited_channel_post` update type
| `onEditedChannelPostDocument`      | Handles `document` on `edited_channel_post` update type
| `onEditedChannelPostLocation`      | Handles `location` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Location Messages)
| `onEditedChannelPostContact [!]`   | Handles `contact` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Contact Messages)
| `onEditedChannelPostPoll [!]`      | Handles `poll` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Poll Messages)
| `onEditedChannelPostVenue [!]`     | Handles `venue` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Venue Messages)
| `onEditedChannelPostGame [!]`      | Handles `game` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Game Messages)
| `onEditedChannelPostDice [!]`      | Handles `dice` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Dice Messages)
| `onEditedChannelPostSticker [!]`   | Handles `sticker` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this (Editing Sticker Messages)
| `onEditedChannelPost`              | Will be called if none of the above handlers match

| هندلر های ChatMember | توضیحات
|---------------------|-------------
| `onChatMember`      | Will be called on `chat_member` update type

| هندلر های MyChatMember | توضیحات
|-----------------------|-------------
| `onMyChatMember`      | Will be called on `my_chat_member` update type

| هندلر های Poll | توضیحات
|---------------|-------------
| `onPoll`      | Will be called on `poll` update type

| هندلر های PollAnswer | توضیحات
|---------------------|-------------
| `onPollAnswer`      | Will be called on `poll_answer` update type

| هندلر های InlineQuery | توضیحات
|----------------------|-------------
| `onInlineQueryText`  | Handles `query` on `inline_query` update type
| `onInlineQuery`      | Will be called if none of the above handlers match

| هندلر های ShippingQuery | توضیحات
|------------------------|-------------
| `onShippingQuery`      | Will be called on `shipping_query` update type

| هندلر های ChatJoinRequest | توضیحات
|--------------------------|-------------
| `onChatJoinRequest`      | Will be called on `chat_join_request` update type

| هندلر های PreCheckoutQuery | توضیحات
|---------------------------|-------------
| `onPreCheckoutQuery`      | Will be called on `pre_checkout_query` update type

| هندلر های ChosenInlineResult | توضیحات
|-----------------------------|-------------
| `onChosenInlineResultQuery` | Handles `query` on `chosen_inline_result` update type
| `onChosenInlineResultId`    | Handles `result_id` on `chosen_inline_result` update type
| `onChosenInlineResult`      | Will be called if none of the above handlers match

| هندلر های Fallback | توضیحات
|-------------------|-------------
| `fallbackOn`      | Will be called if none of the previous handlers match. Here you can determine the type of update
| `fallback`        | Will be called if none of the previous handlers match

| هندلر های Exception | توضیحات
|-------------------|-------------
| `onException`     | Will be called if whenever code reaches the throw statement

| هندلر های ApiError | توضیحات
|-------------------|-------------
| `onApiError`      | Will be called if an error occurs on the Telegram side while sending the request

## 🚁 توابع کمکی <a name="helpers"></a>

| Helper                                    | توضیحات                                                                                                                                                       | Return Type
|-------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------
| `_update(?string $keys = null)`            | Returns the update                                                                                                                                                | `array` for itself, `mixed` for subkeys
| `_updateId()`                              | Returns the `update_id`                                                                                                                                           | `?int`
| `_updateType()`                            | Returns the current update type                                                                                                                                   | `?string`
| `_updateTypes(array $exclude = [])`        | Returns all available update types                                                                                                                                | `array` of strings
| `_message(?string $keys = null)`           | Returns `message` if available, `null` otherwise.                                                                                                                 | `array` for itself, `mixed` for subkeys
| `_messageId()`                             | Returns `message->message_id` if available, `null` otherwise.                                                                                                     | `?int`
| `_messageType()`                           | Returns the current message type if available, `null` otherwise.                                                                                                  | `?string`
| `_messageTypes(array $exclude = [])`       | Returns all available message types                                                                                                                               | `array` of strings
| `_mediaGroupId()`                          | Returns `message->media_group_id` if available, `null` otherwise                                                                                                  | `?int`
| `_repliedMessage(?string $keys = null)`    | Returns `message->reply_to_message` if available, `null` otherwise.                                                                                               | `array` for itself, `mixed` for subkeys
| `_callbackQuery(?string $keys = null)`     | Returns `callback_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `_callbackQueryId()`                       | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?int`
| `_callbackQueryData()`                     | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?string`
| `_inlineQuery(?string $keys = null)`       | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `array` for itself, `mixed` for subkeys
| `_inlineQueryId()`                         | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `?int`
| `_inlineQueryText()`                       | Returns `inline_query->query` if available, `null` otherwise.                                                                                                     | `?string`
| `_shippingQuery(?string $keys = null)`     | Returns `shipping_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `_chosenInlineResult(?string $keys = null)`| Returns `chosen_inline_result` if available, `null` otherwise.                                                                                                    | `array` for itself, `mixed` for subkeys
| `_chosenInlineResultId()`                  | Returns `chosen_inline_result->result_id` if available, `null` otherwise.                                                                                         | `?string`
| `_chosenInlineResultQuery()`               | Returns `chosen_inline_result->query` if available, `null` otherwise.                                                                                             | `?string`
| `_chosenInlineResultInlineMessageId()`     | Returns `chosen_inline_result->inline_message_id` if available, `null` otherwise.                                                                                 | `?string`
| `_preCheckoutQuery(?string $keys = null)`  | Returns `pre_checkout_query` if available, `null` otherwise.                                                                                                      | `array` for itself, `mixed` for subkeys
| `_replyMarkup(?string $keys = null)`       | Returns `message->reply_markup` if available, `null` otherwise                                                                                                    | `array` for itself, `mixed` for subkeys
| `_text()`                                  | Returns `message->text` if available, `null` otherwise                                                                                                            | `?string`
| `_photo(?string $keys = null)`             | Returns the last item (and high quality) of `message->photo` if available, `null` otherwise                                                                       | `array` for itself, `mixed` for subkeys
| `_photos()`                                | Returns `message->photo` if available, `null` otherwise                                                                                                           | `?array`
| `_document(?string $keys = null)`          | Returns `message->document` if available, `null` otherwise                                                                                                        | `array` for itself, `mixed` for subkeys
| `_sticker(?string $keys = null)`           | Returns `message->sticker` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `_video(?string $keys = null)`             | Returns `message->video` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_videoNote(?string $keys = null)`         | Returns `message->video_note` if available, `null` otherwise                                                                                                      | `array` for itself, `mixed` for subkeys
| `_voice(?string $keys = null)`             | Returns `message->voice` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_audio(?string $keys = null)`             | Returns `message->audio` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_dice(?string $keys = null)`              | Returns `message->dice` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `_game(?string $keys = null)`              | Returns `message->game` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `_gamePhoto(?string $keys = null)`         | Returns the last item (and high quality) of `message->game->photo` if available, `null` otherwise                                                                 | `array` for itself, `mixed` for subkeys
| `_gamePhotos()`                            | Returns `message->game->photo` if available, `null` otherwise                                                                                                     | `?array`
| `_venue(?string $keys = null)`             | Returns `message->venue` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_location(?string $keys = null)`          | Returns `message->location` if available, `null` otherwise                                                                                                        | `array` for itself, `mixed` for subkeys
| `_animation(?string $keys = null)`         | Returns `message->animation` if available, `null` otherwise                                                                                                       | `array` for itself, `mixed` for subkeys
| `_caption()`                               | Returns `message->caption` if available, `null` otherwise                                                                                                         | `?string`
| `_entities()`                              | Returns `message->entities` or `message->caption_entities` if available, `null` otherwise                                                                         | `?array`
| `_poll(?string $keys = null)`              | Returns `message->poll` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `_pollOptions()`                           | Returns `message->poll->options` if available, `null` otherwise                                                                                                   | `?array`
| `_pollAnswer(?string $keys = null)`        | Returns `poll_answer` if available, `null` otherwise                                                                                                              | `array` for itself, `mixed` for subkeys
| `_viaBot(?string $keys = null)`            | Returns `message->via_bot` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `_from(?string $keys = null)`              | Returns `ANY->from` if available, `null` otherwise                                                                                                                | `array` for itself, `mixed` for subkeys
| `_user(?string $keys = null)`              | Returns the current `user` if available, `null` otherwise, alternative to `from(...)`                                                                             | `array` for itself, `mixed` for subkeys
| `_userId()`                                | Returns user id if available, `null` otherwise                                                                                                                    | `?int`
| `_chat(?string $keys = null)`              | Returns the current `chat` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `_chatId()`                                | Returns `chat->id` if available, `null` otherwise                                                                                                                 | `?int`
| `_chatType()`                              | Returns the current `chat->type` if available, `null` otherwise                                                                                                   | `?string`
| `_chatTypes(array $exclude = [])`          | Returns all available chat types                                                                                                                                  | `array` of strings
| `_chatActions(array $exclude = [])`        | Returns all available chat actions                                                                                                                                | `array` of strings
| `_chatMember(?string $keys = null)`        | Returns `chat_member` if available, `null` otherwise.                                                                                                             | `array` for itself, `mixed` for subkeys
| `_chatMemberStatuses(array $exclude = [])` | Returns all available chat member statuses                                                                                                                        | `array` of strings
| `_myChatMember(?string $keys = null)`      | Returns `my_chat_member` if available, `null` otherwise.                                                                                                             | `array` for itself, `mixed` for subkeys
| `_formattingOptions(array $exclude = [])`  | Returns all available formatting options                                                                                                                          | `array` of strings
| `_fileTypes(array $exclude = [])`          | Returns all available message types that are files                                                                                                                | `array` of strings
| `_forwardFrom(?string $keys = null)`       | Returns `message->forward_from` if available, `null` otherwise                                                                                                    | `array` for itself, `mixed` for subkeys
| `_forwardFromChat(?string $keys = null)`   | Returns `message->forward_from_chat` if available, `null` otherwise                                                                                               | `array` for itself, `mixed` for subkeys
| `_forwardDate()`                           | Returns `message->forward_date` if available, `null` otherwise                                                                                                    | `?int`
| `_forwardFromMessageId()`                  | Returns `message->forward_from_message_id` if available, `null` otherwise                                                                                         | `?int`
| `_isMessage()`                             | Returns `true` if the current update type was `message`, `false` otherwise                                                                                        | `bool`
| `_isCallbackQuery()`                       | Returns `true` if the current update type was `callback_query`, `false` otherwise                                                                                 | `bool`
| `_isEditedMessage()`                       | Returns `true` if the current update type was `edited_message`, `false` otherwise                                                                                 | `bool`
| `_isChannelPost()`                         | Returns `true` if the current update type was `channel_post`, `false` otherwise                                                                                   | `bool`
| `_isEditedChannelPost()`                   | Returns `true` if the current update type was `edited_channel_post`, `false` otherwise                                                                            | `bool`
| `_isShippingQuery()`                       | Returns `true` if the current update type was `shipping_query`, `false` otherwise                                                                                 | `bool`
| `_isChatJoinRequest()`                     | Returns `true` if the current update type was `chat_join_request`, `false` otherwise                                                                              | `bool`
| `_isInlineQuery()`                         | Returns `true` if the current update type was `inline_query`, `false` otherwise                                                                                   | `bool`
| `_isMyChatMember()`                        | Returns `true` if the current update type was `my_chat_member`, `false` otherwise                                                                                 | `bool`
| `_isChatMember()`                          | Returns `true` if the current update type was `chat_member`, `false` otherwise                                                                                    | `bool`
| `_isChosenInlineResult()`                  | Returns `true` if the current update type was `chosen_inline_result`, `false` otherwise                                                                           | `bool`
| `_isPollAnswer()`                          | Returns `true` if the current update type was `poll_answer`, `false` otherwise                                                                                    | `bool`
| `_isPoll(bool $checkMessageType = false)`  | Returns `true` if the current update type was `poll`, `false` otherwise, pass `true` to the first parameter if you want to check the current message type         | `bool`
| `_isPhoto()`                               | Returns `true` if the current message type was `photo`, `false` otherwise                                                                                         | `bool`
| `_isSticker()`                             | Returns `true` if the current message type was `sticker`, `false` otherwise                                                                                       | `bool`
| `_isAnimation()`                           | Returns `true` if the current message type was `animation`, `false` otherwise                                                                                     | `bool`
| `_isVideo()`                               | Returns `true` if the current message type was `video`, `false` otherwise                                                                                         | `bool`
| `_isVideoNote()`                           | Returns `true` if the current message type was `video_note`, `false` otherwise                                                                                    | `bool`
| `_isDice()`                                | Returns `true` if the current message type was `dice`, `false` otherwise                                                                                          | `bool`
| `_isGame()`                                | Returns `true` if the current message type was `game`, `false` otherwise                                                                                          | `bool`
| `_isVenue()`                               | Returns `true` if the current message type was `venue`, `false` otherwise                                                                                         | `bool`
| `_isVoice()`                               | Returns `true` if the current message type was `voice`, `false` otherwise                                                                                         | `bool`
| `_isDocument()`                            | Returns `true` if the current message type was `document`, `false` otherwise                                                                                      | `bool`
| `_isLocation()`                            | Returns `true` if the current message type was `location`, `false` otherwise                                                                                      | `bool`
| `_isContact()`                             | Returns `true` if the current message type was `contact`, `false` otherwise                                                                                       | `bool`
| `_isAudio()`                               | Returns `true` if the current message type was `audio`, `false` otherwise                                                                                         | `bool`
| `_isText()`                                | Returns `true` if the current message type was `text`, `false` otherwise                                                                                          | `bool`
| `_isSender()`                              | Returns `true` if the current chat type was `sender`                                                                                                              | `bool`
| `_isGroup()`                               | Returns `true` if the current chat type was `gorup`                                                                                                               | `bool`
| `_isSupergroup()`                          | Returns `true` if the current chat type was `supergroup`                                                                                                          | `bool`
| `_isPrivate()`                             | Returns `true` if the current chat type was `private`                                                                                                             | `bool`
| `_isChannel()`                             | Returns `true` if the current chat type was `channel`                                                                                                             | `bool`
| `_isForwarded()`                           | Returns `true` if a message was forwarded                                                                                                                         | `bool`


## 💎 متد های موجود <a name="available-methods"></a>

All Telegram Bot API [Available methods](https://core.telegram.org/bots/api#available-methods) is available in the library.

- `getMe()`
- `logOut()`
- `close()`
- `sendMessage(...)`
- `forwardMessage(...)`
- `sendPhoto(...)`
- ...

## 🔮 انواع موجود <a name="available-types"></a>

All Telegram Bot API [Available types](https://core.telegram.org/bots/api#available-types) is available in the library.

- `Update(...)`
- `WebhookInfo(...)`
- `User(...)`
- `Chat(...)`
- `Message(...)`
- ...

## ⚓️ ثابت های موجود <a name="available-constants"></a>

A lot of useful constants are available in the library for fast development and convenience of most developers.

Here are some of them:
- **Types Fields**: `FIELD_*` for example: `FIELD_UPDATE_ID`, `FIELD_TITLE`, etc
- **Method Names**: `METHOD_*` for example: `METHOD_SEND_MESSAGE`, `METHOD_DELETE_MESSAGE`, etc
- **Methods Parameters**: `PARAM_*` for example: `PARAM_CHAT_ID`, `PARAM_TEXT`, etc
- **Update Types**: `UPDATE_TYPE_*` for example: `UPDATE_TYPE_MESSAGE`, `UPDATE_TYPE_EDITED_MESSAGE`, etc
- **Message Types**: `MESSAGE_TYPE_*` for example: `MESSAGE_TYPE_TEXT`, `MESSAGE_TYPE_VIDEO`, etc
- **Message Entities**: `MESSAGE_ENTITIE_*` for example: `MESSAGE_ENTITIE_MENTION`, `MESSAGE_ENTITIE_HASHTAG`, etc
- **Bot Cmmand Scopes**: `BOT_COMMAND_SCOPE_*` for example: `BOT_COMMAND_SCOPE_DEFAULT`, `BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS`, etc
- **Chat Member Statuses**: `CHAT_MEMBER_STATUS_*` for example: `CHAT_MEMBER_STATUS_AMINISTRATOR`, `CHAT_MEMBER_STATUS_CREATOR`, etc
- **Chat Types**: `CHAT_TYPE_*` for example: `CHAT_TYPE_PRIVATE`, `CHAT_TYPE_CHANNEL`, etc
- **Chat Actions**: `CHAT_ACTION_*` for example: `CHAT_ACTION_TYPING`, `CHAT_ACTION_UPLOAD_PHOTO`, etc
- **Chat Permissions**: `CHAT_PERMISSION_CAN_*` for example: `CHAT_PERMISSION_CAN_SEND_MESSAGES`, `CHAT_PERMISSION_CAN_SEND_AUDIOS`, etc
- **Chat Administrator Rights**: `CHAT_ADMINISTRATOR_RIGHT_*` for example: `CHAT_ADMINISTRATOR_RIGHT_IS_ANONYMOUS`, `CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_CHAT`, etc
- **Colors**: `COLOR_RGB_*` | `COLOR_RGB_*_HEX` for example: `COLOR_RGB_BLUE` | `COLOR_RGB_BLUE_HEX`, `COLOR_RGB_YELLOW` | `COLOR_RGB_YELLOW_HEX`, etc
- **Dice Emojis**: `DICE_EMOJI_*` for example: `DICE_EMOJI_DICE`, `DICE_EMOJI_DART`, etc
- **Google Place Types**: `GOOGLE_PLACE_TYPE_*` for example: `GOOGLE_PLACE_TYPE_ACCOUNTING`, `GOOGLE_PLACE_TYPE_AIRPORT`, etc
- **Menu Button Types**: `MENU_BUTTON_TYPE_*` for example: `MENU_BUTTON_TYPE_DEFAULT`, `MENU_BUTTON_TYPE_WEB_APP`, etc
- **Poll Types**: `POLL_TYPE_*` for example: `POLL_TYPE_REGULAR`, etc
- **Switch Inline Query Chosen Chats**: `SWITCH_INLINE_QUERY_CHOSEN_CHAT_*` for example: `SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALOW_USER_CHATS`, `SWITCH_INLINE_QUERY_BOT_CHATS`, etc
- **Sticker Formats**: `STICKER_FORMAT_*` for example: `STICKER_FORMAT_STATIC`, `STICKER_FORMAT_ANIMATED`, etc
- **Sticker Mask Position Points**: `STICKER_MASK_POSITION_POINT_*` for example: `STICKER_MASK_POSITION_POINT_FOREHEAD`, `STICKER_MASK_POSITION_POINT_MOUTH`, etc
- **Sticker Types**: `STICKER_TYPE_*` for example: `STICKER_TYPE_REGULAR`, `STICKER_TYPE_MASK`, etc
- **Parse Modes**: `PARSE_MODE_*` for example: `PARSE_MODE_HTML`, `PARSE_MODE_MARKDOWN`, etc
- **Passport Element Types**: `PASSPORT_ELEMENT_TYPE_*` for example: `PASSPORT_ELEMENT_TYPE_PASSPORT`, `PASSPORT_ELEMENT_TYPE_DRIVER_LICENSE`, etc
- **Passport Element Errors**: `PASSPORT_ELEMENT_ERROR_*` for example: `PASSPORT_ELEMENT_ERROR_DATA_FIELD`, `PASSPORT_ELEMENT_ERROR_FRONT_SIDE`, etc
- Input Media Types: `INPUT_MEDIA_TYPE_*` for example: `INPUT_MEDIA_TYPE_ANIMATION`, `INPUT_MEDIA_TYPE_DOCUMENT`, etc

And much more! ... check the source code yourself :)

# 🐞 گزارش باگ <a name="bug-report"></a>
ما در تلاش هستیم تا کتابخانه ای قوی و قابل اعتماد ارائه کنیم، اما ممکن است اشکالات همچنان رخ دهد. اگر هنگام استفاده از کتابخانه ما با مشکل یا رفتار غیرمنتظره ای مواجه شدید، از کمک شما در گزارش آن قدردانی می کنیم.

لطفا این مراحل را برای گزارش یک باگ دنبال کنید:

1. مشکلات موجود در [Issue Tracker](https://github.com/devdasher/ptb-php/issues) را بررسی کنید تا مطمئن شوید که اشکال قبلاً گزارش نشده است.
2. اگر مشکل شما منحصر به فرد است، یک شماره جدید با عنوان واضح و توصیفی، شامل مراحل بازتولید مشکل، رفتار مورد انتظار و هرگونه جزئیات مرتبط ایجاد کنید.
3. هر گونه پیام خطا، ردیابی پشته، یا قطعه کد را که می تواند به عیب یابی کمک کند، پیوست کنید.

گزارش‌های اشکال شما برای کمک به ما در شناسایی و رفع سریع هرگونه کاستی بسیار ارزشمند است. ما متعهد به بهبود مستمر کتابخانه و تضمین تجربه ای روان برای همه کاربران هستیم.

ما همچنین می‌خواهیم از این فرصت استفاده کنیم و شما را تشویق کنیم که از کتابخانه ما استفاده کنید و از ویژگی‌های آن برای بهبود پروژه‌های خود استفاده کنید. ما برای بازخورد و مشارکت شما ارزش قائلیم، زیرا آنها نقشی اساسی در شکل دادن به توسعه آینده کتابخانه دارند.

با تشکر از حمایت شما!

# 📝 تغییرات <a name="changelog"></a>

لطفاً فایل [CHANGELOG](CHANGELOG.md) را برای کسب اطلاعات بیشتر در مورد تغییرات اخیر مشاهده کنید.

# 🙌 همکاران <a name="credits"></a>

- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

# 📜 مجوز <a name="license"></a>

مجوز GNU (GNU v3). لطفاً برای کسب اطلاعات بیشتر به [فایل مجوز](LICENSE.md) مراجعه کنید.





