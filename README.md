## 🇮🇷 [توضیحات فارسی](README.fa.md)

# PTB-PHP = Procedural Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

# 🗂️ Table of Contents

- 🌟 [Introduction](#introduction)
- 💡 [Basic Example](#basic-example)
- 🛠️ [Installation](#installation)
- ❓ [Why Procedural and NOT OOP?](#why-procedural)
- 📚 [Documentation](#documentation)
    - ⚙️ [Configuraion](#configuration)
    - 📤 [Uploading Files](#uploading-files)
    - 📥 [Downloading Files](#downloading-files)
    - 🤖 [Multiple Bot Management](#multiple-bot-management)
    - 🤝 Middlewares (Soon...)
    - 💬 Conversations (Soon...)
    - 🎮 [Keyboards](#keyboards)
        - [ReplyKeyboardMarkup](#reply-keyboard-markup)
        - [InlineKeyboardMarkup](#inline-keyboard-markup)
    - 🧩 [Handlers](#handlers)
    - 🚁 [Helpers](#helpers)
    - 💎 [Available Methods](#available-methods)
    - 🔮 [Available Types](#available-types)
    - ⚓️ [Available Constants](#available-constants)
    - ♟ Usage Without Handlers (Soon...)
- 🐞 [Bug Report](#bug-report)
- 📝 [Changelog](#changelog)
- 🙌 [Credits](#credits)
- 📜 [License](#license)

# 🌟 Introduction <a name="introduction"></a>

This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check it out too!

# 💡 Basic Example <a name="basic-example"></a>

```php
<?php

use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\middleware;
use function DevDasher\PTB\onMessage;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;

// require(__DIR__.'/vendor/autoload.php'); // You can use Composer's autolaod
require(__DIR__.'/path/to/PTB.php'); // Or require the PTB.php file directly

/*
    This function is for setting the initial settings of the library
    It should be defined and called at the top of the code and before the handlers
*/
configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    // ...
);


# A middleware before handlers
middleware(callable: function() {
    sendMessage('Global Middleware');

    // This will execute automatically before the main handlers
});



# This handler is used to check text inputs on the 'message' update type
onMessageText(
    # Enter your text pattern here
    pattern: '/start', 

    # The function that is executed after checking the pattern on response to the user
    callable: function() { 
        sendMessage(text: 'Hello World'); // A function to send a message to the user

        /*
            In short, if the user sends the /start command to the bot,
            the response "Hello World" will be sent to the user
        */
    },
);


# Here we examine another example together
onMessageText(
    # Text pattern with a placeholder
    pattern: 'My name is {name}', 
    
    # The function that is executed after checking the pattern on response to the user
    callable: function($name) { // Note that you receive the corresponding placeholder as a parameter on the function
        sendMessage(text: "Hello $name");

        /*
            In short, if the user sends the following text:
            "My name is Pooria"
            The bot will also send the reply "Hello Pooria" to the user
        */
    },
);


# A handler for 'message' update type
onMessage(callable: function() {
    sendMessage('onMessage');

    /*
        In short, any type of message that the user sends directly to the bot,
            this handler is called and a message with the value "onMessage" is sent to the user.

        Of course, this happens if the updates sent do not match the previous handlers
    */
});


# Other handlers goes here.


/*
    This function should always be at the end of the code (after the handlers).
    After this function is called, the library checks the available handlers
    and executes the relevant codes accordingly and sends the appropriate response to the user
    The response you specified on an anonymous function on previous handlers
*/
run();


```

# 🛠️ Installation <a name="installation"></a>

You can install the package via composer:

```bash
composer require devdasher/ptb-php
```

Or you can include the PTB.php file on your PHP code directly

# ❓ Why Procedural and NOT OOP? <a name="why-procedural"></a>

Procedural programming is often considered faster than Object-Oriented Programming (OOP) due to its lower overhead and the smaller number of operations required for execution. In procedural programming, the focus is on writing sequential instructions on a step-by-step manner to accomplish a task. This approach allows for efficient execution as the program directly operates on data using straightforward instructions.

One key factor that contributes to the perceived speed advantage of procedural programming is the reduced number of OPcodes (operation codes) involved. OPcodes are fundamental instructions understood by the computer's hardware and define specific operations like arithmetic calculations or memory access. Since procedural programs typically involve fewer layers of abstraction and direct manipulation of data, they tend to require fewer OPcodes to achieve a given functionality.

In contrast, OOP introduces additional layers of complexity through concepts such as classes, objects, and inheritance. While these features provide benefits like code reusability, modularity, and maintainability, they also introduce some performance overhead. OOP programs often involve more intricate interactions between objects, which may require additional processing steps and indirections. These factors can lead to a slightly slower execution compared to procedural programs, especially on scenarios where performance is critical and the additional features of OOP are not heavily utilized.

It is important to note that the performance difference between procedural and OOP approaches is contextual and may vary based on several factors, such as the specific programming language used, the efficiency of the compiler or interpreter, the design choices made, and the nature of the problem being solved. Therefore, while procedural programming can be perceived as faster due to its streamlined execution model and reduced OPcode usage, it is not a definitive rule, and OOP can provide significant advantages on terms of code organization, maintainability, and extensibility.


# 📚 Documentation <a name="documentation"></a>

This library is constantly being updated and currently has many features.  

The list below is only a part of the library's facilities and soon this part of the document will be more complete. Below you can see the most important things:


## ⚙️ Configuration <a name="configuration"></a>

For the library to work, you need to set at least two mandatory parameters:

```php
use function DevDasher\PTB\configurePTB;

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',
    // ...
);
```

### Available Configuration Parameters <a name="available-configuration-parameters"></a>

| Parameter                                      | Description
|------------------------------------------------|-------------
| `string $username`                             | The bot token
| `string $token`                                | The bot username
| `string $api_base_url = API_BASE_URL`          | ...
| `array $curl_options = []`                     | ...
| `bool $is_webhook = false`                     | Pass `true` if you want to use Webhook to get updates, appropriate for production. default is `false` (LongPolling)

## 📤 Uploading Files <a name="uploading-files"></a>

Here is some examples of how you can send files to the user in different ways:

```php
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\sendPhoto;
use function DevDasher\PTB\sendVideo;
use function DevDasher\PTB\InputFile;

onMessageText(pattern: '/photo', callable: function() {
    $response = sendPhoto(
        # Pass your photo path:
        photo: 'path/to/photo.jpg',

        # Or you can use the InputFile function like this:
        // photo: InputFile(file_path: 'path/to/photo.jpg'), 

        # Or pass the file_id like this:
        // photo: 'FILE_ID',

        # Or pass a URL:
        // photo: 'https://example.com/path/to/photo.jpg',

        caption: 'Here is your photo caption!',

        //...
    );
    //...
});

onMessageText(pattern: '/video', callable: function() {
    $response = sendVideo(
        # Pass your video path:
        video: 'path/to/video.mp4',

        # Or you can use the InputFile function like this:
       // video: InputFile(file_path: 'path/to/video.mp4'), 

        # Or pass the file_id like this:
        // video: 'FILE_ID',

        # Or pass a URL:
        // video: 'https://example.com/path/to/video.mp4',

        caption: 'This is your video caption!',

        //...
    );
    //...
});

//...
```

## 📥 Downloading Files <a name="downloading-files"></a>

And here is an example of how you can download files sent to the bot:

```php
use function DevDasher\PTB\_download;
use function DevDasher\PTB\_downloadBotFile;
use function DevDasher\PTB\_messageId;
use function DevDasher\PTB\_photo;
use function DevDasher\PTB\getFile;
use function DevDasher\PTB\onMessagePhoto;
use function DevDasher\PTB\sendMessage;

onMessagePhoto(callable: function() {
    $photo = _photo(); // A Helper, to get the photo details sent to the bot
    $response = sendMessage(
        text: 'Downloading...',
        reply_to_message_id: _messageId(),
    );
    $file = getFile(file_id: $photo['file_id']); // Get details about the photo (photo path on Telegram servers...) 
    if (!$file['ok']) {
        return sendMessage(text: 'Something went wrong!');
    }
    $result = _downloadBotFile(
        # Pass the $file array here:
        file: $file,

        # Or you can pass the $photo['file_id'] here directly:
        // file: $photo['file_id'],

        # Specify the destination and the file name:
        save_path: 'where/to/save/this/file.jpg',
    );
    if (!$result) {
        return editMessageText(
            text: 'An error occurred!',
            message_id: $response['result']['message_id'],
        );
    }
    return editMessageText(
        text: 'Photo downloaded.',
        message_id: $response['result']['message_id'],
    );
});

// For the rest (video, sticker, etc), it is almost the same
```

Alternatively, you can use the `_download(...)` function to download files, but you need to pass the url to it:

```php
use function DevDasher\PTB\_download;

//...
    $url = 'https://api.telegram.org/file/botTOKEN/FILE_NAME.jpg';
    $result = _download(
        url: $url,
        save_path: 'where/to/save/this/file.jpg',
    );
//...
```

It's better to use the `_downloadBotFile(...)` function.


## 🤖 Multiple Bot Management <a name="multiple-bot-management"></a>

You can manage your bots easily. see this example:

```php
use function DevDasher\PTB\_registerNewBot;
use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\onMessage;
use function DevDasher\PTB\sendMessage;

# You set the first and default bot details here:
configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',
    //...
);

onMessage(callable: function() {
    # A helper function to add a new bot, do this anywhere you want:
    _registerNewBot(
        token: 'SECOND_BOT_TOKEN',
        username: 'SECOND_BOT_USERNAME',
        //...
    );

    # By default, all requests will be sent to the main (default) bot:
    $response = sendMessage(text: 'Hey there!');

    # Now, we send a message to the second bot like this:
    $response = sendMessage(
        text: "What's up bro?",

        # This parameter is present in all functions (related to sending requests)
        _options: [
            # Here, you can specify the second bot username:
            'bot_username' => 'SECOND_BOT_USERNAME',

            # Or you can pass the second bot's token directly:
            'bot_token' => 'SECOND_BOT_TOKEN',

            //...
        ],

        //...
    );

    //...
});

//...
```

## 🎮 Keyboards <a name="keyboards"></a>

The PTB-PHP library provides a simple way to build and send keyboards.

### ReplyKeyboardMarkup <a name="reply-keyboard-markup"></a>

The `ReplyKeyboardMarkup(...)` function helps you to create a reply keyabord. Here is an example:

```php
use function DevDasher\PTB\_row;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\sendMessage;
use function DevDasher\PTB\ReplyKeyboardMarkup;
use function DevDasher\PTB\KeyboardButton;

onMessageText(pattern: '/start', callable: function() {
    sendMessage(
        text: 'START Message',
        reply_markup: ReplyKeyboardMarkup(
            keyboard: [
                _row(KeyboardButton(text: 'Say Hi!'), KeyboardButton(text: 'Say Bye!')),
            ],
            is_persistent: true,
            resize_keyboard: true,
            //...
        )
    );
});

onMessageText(pattern: 'Say Hi!', callable: fn() => sendMessage('Hi!'));

onMessageText(pattern: 'Say Bye!', callable: fn() => sendMessage('Bye!'));
```

### InlineKeyboardMarkup <a name="inline-keyboard-markup"></a>

The `InlineKeyboardMarkup(...)` function helps you to create a inline keyabord. Here is an example:

```php
use function DevDasher\PTB\_row;
use function DevDasher\PTB\answerCallbackQuery;
use function DevDasher\PTB\InlineKeyboardButton;
use function DevDasher\PTB\InlineKeyboardMarkup;
use function DevDasher\PTB\onCallbackQueryData;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\sendMessage;

onMessageText(pattern: '/account', callable: function() {
    sendMessage(
        text: "Account Details\n\n...",
        reply_markup: InlineKeyboardMarkup(
            inline_keyboard: [
                _row(
                    InlineKeyboardButton(text: 'Suspend', callback_data: 'account/suspend'),
                    InlineKeyboardButton(text: 'Delete', callback_data: 'account/delete')
                ),
            ],
        )
    );
});

onCallbackQueryData(
    pattern: 'account/suspend',
    callable: fn() => answerCallbackQuery(text: 'Account Suspended', show_alert: true)
);

onCallbackQueryData(
    pattern: 'account/delete',
    callable: fn() => answerCallbackQuery(text: 'Account Deleted', show_alert: true)
);
```

## 🧩 Handlers <a name="handlers"></a>

Handlers are essential components in building interactive and dynamic conversational experiences. They enable the customization of logic and actions based on specific triggers or conditions. For instance, handlers can be triggered by user messages, chat joins, button clicks, or any other desired action for the bot to respond appropriately. Key aspects of handlers include event binding, where they are associated with specific events; logic and actions, which define what happens when the event occurs; event types, allowing handlers to cater to different event categories; registration, ensuring appropriate handler invocation upon event occurrence; and customization, enabling the bot to respond differently based on various situations. Leveraging handlers effectively facilitates the creation of chatbots capable of interactive and adaptable user interactions, while offering a maintainable and extensible code structure.

Here is a list of all available handlers in the library:

| Message Handlers                              | Description
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
| `onMessageNewChatMembers(...)`                | Handles `new_chat_members` on `message` update type
| `onMessageLeftChatMember(...)`                | Handles `left_chat_member` on `message` update type
| `onMessageNewChatTitle(...)`                  | Handles `new_chat_title` on `message` update type
| `onMessageNewChatPhoto(...)`                  | Handles `new_chat_photo` on `message` update type
| `onMessageDeleteChatPhoto(...)`               | Handles `delete_chat_photo` on `message` update type
| `onMessageGroupChatCreated(...)`              | Handles `group_chat_created` on `message` update type
| `onMessageSupergroupChatCreated(...)`         | Handles `supergroup_chat_created` on `message` update type
| `onMessageChannelChatCreated(...)`            | Handles `channel_chat_created` on `message` update type
| `onMessageAutoDeleteTimerChanged(...)`        | Handles `message_auto_delete_timer_changed` on `message` update type
| `onMessageMigrateToChatId(...)`               | Handles `migrate_to_chat_id` on `message` update type
| `onMessageMigrateFromChatId(...)`             | Handles `migrate_from_chat_id` on `message` update type
| `onMessagePinnedMessage(...)`                 | Handles `pinned_message` on `message` update type
| `onMessageInvoice(...)`                       | Handles `invoice` on `message` update type
| `onMessageSuccessfulPayment(...)`             | Handles `successful_payment` on `message` update type
| `onMessageUserShared(...)`                    | Handles `user_shared` on `message` update type
| `onMessageChatShared(...)`                    | Handles `chat_shared` on `message` update type
| `onMessageConnectedWebsite(...)`              | Handles `connected_website` on `message` update type
| `onMessageWriteAccessAllowed(...)`            | Handles `write_access_allowed` on `message` update type
| `onMessagePassportData(...)`                  | Handles `passport_data` on `message` update type
| `onMessageProximityAlertTriggered(...)`       | Handles `proximity_alert_triggered` on `message` update type
| `onMessageForumTopicCreated(...)`             | Handles `forum_topic_created` on `message` update type
| `onMessageForumTopicEdited(...)`              | Handles `forum_topic_edited` on `message` update type
| `onMessageForumTopicClosed(...)`              | Handles `forum_topic_closed` on `message` update type
| `onMessageForumTopicReopened(...)`            | Handles `forum_topic_reopened` on `message` update type
| `onMessageGeneralForumTopicHidden(...)`       | Handles `general_forum_topic_hidden` on `message` update type
| `onMessageGeneralForumTopicUnhidden(...)`     | Handles `general_forum_topic_unhidden` on `message` update type
| `onMessageVideoChatScheduled(...)`            | Handles `video_chat_scheduled` on `message` update type
| `onMessageVideoChatStarted(...)`              | Handles `video_chat_started` on `message` update type
| `onMessageVideoChatEnded(...)`                | Handles `video_chat_ended` on `message` update type
| `onMessageVideoChatParticipantsInvited(...)`  | Handles `video_chat_participants_invited` on `message` update type
| `onMessageWebAppData(...)`                    | Handles `web_app_data` on `message` update type
| `onMessage(...)`                              | Will be called if none of the above handlers match

| EditedMessage Handlers               | Description
|--------------------------------------|-------------
| `onEditedMessageText(...)`           | Handles `text` on `edited_message` update type
| `onEditedMessagePhoto(...)`          | Handles `photo` on `edited_message` update type
| `onEditedMessageAnimation(...)`      | Handles `animation` on `edited_message` update type
| `onEditedMessageVideo(...)`          | Handles `video` on `edited_message` update type
| `onEditedMessageVideoNote(...)`      | Handles `video note` on `edited_message` update type
| `onEditedMessageAudio(...)`          | Handles `audio` on `edited_message` update type
| `onEditedMessageVoice(...)`          | Handles `voice` on `edited_message` update type
| `onEditedMessageDocument(...)`       | Handles `document` on `edited_message` update type
| `onEditedMessage(...)`               | Will be called if none of the above handlers match

| ChannelPost Handlers                                | Description
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

| EditedChannelPost Handlers              | Description
|-----------------------------------------|-------------
| `onEditedChannelPostText(...)`          | Handles `text` on `edited_channel_post` update type
| `onEditedChannelPostPhoto(...)`         | Handles `photo` on `edited_channel_post` update type
| `onEditedChannelPostAnimation(...)`     | Handles `animation` on `edited_channel_post` update type
| `onEditedChannelPostVideo(...)`         | Handles `video` on `edited_channel_post` update type
| `onEditedChannelPostVideoNote(...)`     | Handles `video note` on `edited_channel_post` update type
| `onEditedChannelPostAudio(...)`         | Handles `audio` on `edited_channel_post` update type
| `onEditedChannelPostVoice(...)`         | Handles `voice` on `edited_channel_post` update type
| `onEditedChannelPostDocument(...)`      | Handles `document` on `edited_channel_post` update type
| `onEditedChannelPost(...)`              | Will be called if none of the above handlers match

| ChatMember Handlers      | Description
|--------------------------|-------------
| `onChatMember(...)`      | Will be called on `chat_member` update type

| MyChatMember Handlers      | Description
|----------------------------|-------------
| `onMyChatMember(...)`      | Will be called on `my_chat_member` update type

| Poll Handlers      | Description
|--------------------|-------------
| `onPoll(...)`      | Will be called on `poll` update type

| PollAnswer Handlers      | Description
|--------------------------|-------------
| `onPollAnswer(...)`      | Will be called on `poll_answer` update type

| InlineQuery Handlers      | Description
|---------------------------|-------------
| `onInlineQueryText(...)`  | Handles `query` on `inline_query` update type
| `onInlineQuery(...)`      | Will be called if none of the above handlers match

| ShippingQuery Handlers      | Description
|-----------------------------|-------------
| `onShippingQuery(...)`      | Will be called on `shipping_query` update type

| ChatJoinRequest Handlers      | Description
|-------------------------------|-------------
| `onChatJoinRequest(...)`      | Will be called on `chat_join_request` update type

| PreCheckoutQuery Handlers      | Description
|--------------------------------|-------------
| `onPreCheckoutQuery(...)`      | Will be called on `pre_checkout_query` update type

| ChosenInlineResult Handlers      | Description
|----------------------------------|-------------
| `onChosenInlineResultQuery(...)` | Handles `query` on `chosen_inline_result` update type
| `onChosenInlineResultId(...)`    | Handles `result_id` on `chosen_inline_result` update type
| `onChosenInlineResult(...)`      | Will be called if none of the above handlers match

| Fallback Handlers | Description
|-------------------|-------------
| `fallbackOn`      | Will be called if none of the previous handlers match. Here you can determine the type of update
| `fallback`        | Will be called if none of the previous handlers match

| Exception Handlers     | Description
|------------------------|-------------
| `onException(...)`     | Will be called if whenever code reaches the throw statement

| ApiError Handlers      | Description
|------------------------|-------------
| `onApiError(...)`      | Will be called if an error occurs on the Telegram side while sending the request

## 🚁 Helpers <a name="helpers"></a>

Helpers refer to a set of utility functions (or constants...) that are designed to assist developers in performing common tasks or operations more efficiently. These helper functions encapsulate commonly used code snippets, providing a convenient way to reuse and simplify complex logic. By abstracting away repetitive or boilerplate code, function helpers enhance code readability, maintainability, and promote modular programming practices. They can range from simple functions for string manipulation or array operations to more advanced functionalities like file handling, database interactions, or API integrations. Function helpers serve as valuable tools in libraries, empowering developers to streamline their workflow and focus on higher-level application logic.

Here is a list of all available helpers in the library:

| Helper                                                | Description                                                                                                                                                       | Return Type
|-------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------
| `_update(?string $keys = null)`                       | Returns the update as an array                                                                                                                                    | `array` for itself, `mixed` for subkeys
| `_updateId()`                                         | Returns the `update_id`                                                                                                                                           | `?int`
| `_updateType()`                                       | Returns the current update type                                                                                                                                   | `?string`
| `_updateTypes(array $exclude = [])`                   | Returns all available update types                                                                                                                                | `array` of strings
| `_message(?string $keys = null)`                      | Returns `message` if available, `null` otherwise.                                                                                                                 | `array` for itself, `mixed` for subkeys
| `_messageId()`                                        | Returns `message->message_id` if available, `null` otherwise.                                                                                                     | `?int`
| `_messageType()`                                      | Returns the current message type if available, `null` otherwise.                                                                                                  | `?string`
| `_messageTypes(array $exclude = [])`                  | Returns all available message types                                                                                                                               | `array` of strings
| `_mediaGroupId()`                                     | Returns `message->media_group_id` if available, `null` otherwise                                                                                                  | `?int`
| `_replyToMessage(?string $keys = null)`               | Returns `message->reply_to_message` if available, `null` otherwise.                                                                                               | `array` for itself, `mixed` for subkeys
| `_callbackQuery(?string $keys = null)`                | Returns `callback_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `_callbackQueryId()`                                  | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?int`
| `_callbackQueryData()`                                | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?string`
| `_inlineQuery(?string $keys = null)`                  | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `array` for itself, `mixed` for subkeys
| `_inlineQueryId()`                                    | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `?int`
| `_inlineQueryText()`                                  | Returns `inline_query->query` if available, `null` otherwise.                                                                                                     | `?string`
| `_shippingQuery(?string $keys = null)`                | Returns `shipping_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `_chosenInlineResult(?string $keys = null)`           | Returns `chosen_inline_result` if available, `null` otherwise.                                                                                                    | `array` for itself, `mixed` for subkeys
| `_chosenInlineResultId()`                             | Returns `chosen_inline_result->result_id` if available, `null` otherwise.                                                                                         | `?string`
| `_chosenInlineResultQuery()`                          | Returns `chosen_inline_result->query` if available, `null` otherwise.                                                                                             | `?string`
| `_chosenInlineResultInlineMessageId()`                | Returns `chosen_inline_result->inline_message_id` if available, `null` otherwise.                                                                                 | `?string`
| `_preCheckoutQuery(?string $keys = null)`             | Returns `pre_checkout_query` if available, `null` otherwise.                                                                                                      | `array` for itself, `mixed` for subkeys
| `_replyMarkup(?string $keys = null)`                  | Returns `message->reply_markup` if available, `null` otherwise                                                                                                    | `array` for itself, `mixed` for subkeys
| `_text()`                                             | Returns `message->text` if available, `null` otherwise                                                                                                            | `?string`
| `_photo(?string $keys = null)`                        | Returns the last item (and high quality) of `message->photo` if available, `null` otherwise                                                                       | `array` for itself, `mixed` for subkeys
| `_photos()`                                           | Returns `message->photo` if available, `null` otherwise                                                                                                           | `?array`
| `_document(?string $keys = null)`                     | Returns `message->document` if available, `null` otherwise                                                                                                        | `array` for itself, `mixed` for subkeys
| `_sticker(?string $keys = null)`                      | Returns `message->sticker` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `_video(?string $keys = null)`                        | Returns `message->video` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_videoNote(?string $keys = null)`                    | Returns `message->video_note` if available, `null` otherwise                                                                                                      | `array` for itself, `mixed` for subkeys
| `_voice(?string $keys = null)`                        | Returns `message->voice` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_audio(?string $keys = null)`                        | Returns `message->audio` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_dice(?string $keys = null)`                         | Returns `message->dice` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `_game(?string $keys = null)`                         | Returns `message->game` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `_gamePhoto(?string $keys = null)`                    | Returns the last item (and high quality) of `message->game->photo` if available, `null` otherwise                                                                 | `array` for itself, `mixed` for subkeys
| `_gamePhotos()`                                       | Returns `message->game->photo` if available, `null` otherwise                                                                                                     | `?array`
| `_venue(?string $keys = null)`                        | Returns `message->venue` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `_location(?string $keys = null)`                     | Returns `message->location` if available, `null` otherwise                                                                                                        | `array` for itself, `mixed` for subkeys
| `_animation(?string $keys = null)`                    | Returns `message->animation` if available, `null` otherwise                                                                                                       | `array` for itself, `mixed` for subkeys
| `_caption()`                                          | Returns `message->caption` if available, `null` otherwise                                                                                                         | `?string`
| `_entities()`                                         | Returns `message->entities` or `message->caption_entities` if available, `null` otherwise                                                                         | `?array`
| `_poll(?string $keys = null)`                         | Returns `poll` if available, `null` otherwise                                                                                                                     | `array` for itself, `mixed` for subkeys
| `_pollOptions()`                                      | Returns `poll->options` if available, `null` otherwise                                                                                                            | `?array`
| `_pollAnswer(?string $keys = null)`                   | Returns `poll_answer` if available, `null` otherwise                                                                                                              | `array` for itself, `mixed` for subkeys
| `_viaBot(?string $keys = null)`                       | Returns `message->via_bot` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `_from(?string $keys = null)`                         | Returns `ANY->from` if available, `null` otherwise                                                                                                                | `array` for itself, `mixed` for subkeys
| `_user(?string $keys = null)`                         | Returns the current `user` if available, `null` otherwise, alternative to `from(...)`                                                                             | `array` for itself, `mixed` for subkeys
| `_userId()`                                           | Returns user id if available, `null` otherwise                                                                                                                    | `?int`
| `_chat(?string $keys = null)`                         | Returns the current `chat` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `_chatId()`                                           | Returns `chat->id` if available, `null` otherwise                                                                                                                 | `?int`
| `_chatType()`                                         | Returns the current `chat->type` if available, `null` otherwise                                                                                                   | `?string`
| `_chatTypes(array $exclude = [])`                     | Returns all available chat types                                                                                                                                  | `array` of strings
| `_chatActions(array $exclude = [])`                   | Returns all available chat actions                                                                                                                                | `array` of strings
| `_chatMember(?string $keys = null)`                   | Returns `chat_member` if available, `null` otherwise.                                                                                                             | `array` for itself, `mixed` for subkeys
| `_chatMemberStatuses(array $exclude = [])`            | Returns all available chat member statuses                                                                                                                        | `array` of strings
| `_myChatMember(?string $keys = null)`                 | Returns `my_chat_member` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `_formattingOptions(array $exclude = [])`             | Returns all available formatting options                                                                                                                          | `array` of strings
| `_fileTypes(array $exclude = [])`                     | Returns all available message types that are files                                                                                                                | `array` of strings
| `_forwardFrom(?string $keys = null)`                  | Returns `message->forward_from` if available, `null` otherwise                                                                                                    | `array` for itself, `mixed` for subkeys
| `_forwardFromChat(?string $keys = null)`              | Returns `message->forward_from_chat` if available, `null` otherwise                                                                                               | `array` for itself, `mixed` for subkeys
| `_forwardDate()`                                      | Returns `message->forward_date` if available, `null` otherwise                                                                                                    | `?int`
| `_forwardFromMessageId()`                             | Returns `message->forward_from_message_id` if available, `null` otherwise                                                                                         | `?int`
| `_senderChat(?string $keys = null)`                   | Returns `message->sender_chat` if available, `null` otherwise                                                                                                     | `?array` for itself, `mixed` for subkeys
| `_authorSignature()`                                  | Returns `MESSAGE->author_signature` if available, `null` otherwise                                                                                                | `?string`
| `_date()`                                             | Returns `message->date` if available, `null` otherwise                                                                                                            | `?int`
| `_chatTitle()`                                        | Returns `chat->title`  if available, `null` otherwise                                                                                                             | `?string`
| `_pollQuestion()`                                     | Returns `poll->question` if available, `null` otherwise                                                                                                           | `?string`
| `_pollType()`                                         | Returns `poll->type` if available, `null` otherwise                                                                                                               | `?string`
| `_pollId()`                                           | Returns `poll->id` if available, `null` otherwise                                                                                                                 | `?string`
| `_animationFileName()`                                | Returns `animation->file_name` if available, `null` otherwise                                                                                                     | `?string`
| `_animationMimeType()`                                | Returns `animation->mime_type` if available, `null` otherwise                                                                                                     | `?string`
| `_animationDuration()`                                | Returns `animation->duration` if available, `null` otherwise                                                                                                      | `?int`
| `_animationWidth()`                                   | Returns `animation->width` if available, `null` otherwise                                                                                                         | `?int`
| `_animationHeight()`                                  | Returns `animation->height` if available, `null` otherwise                                                                                                        | `?int`
| `_animationThumb()`                                   | Returns `animation->thumb` if available, `null` otherwise                                                                                                         | `?array`
| `_gameTitle()`                                        | Returns `message->game->title` if available, `null` otherwise                                                                                                     | `?string`
| `_gameDescription()`                                  | Returns `message->game->description` if available, `null` otherwise                                                                                               | `?string`
| `_forumTopicCreated(?string $keys = null)`            | Returns `message->forum_topic_created` if available, `null` otherwise                                                                                             | `?array` for itself, `mixed` for subkeys
| `_forumTopicEdited(?string $keys = null)`             | Returns  `message->forum_topic_edited` if available, `null` otherwise                                                                                             | `?array` for itself, `mixed` for subkeys
| `_forumTopicClosed(?string $keys = null)`             | Returns  `message->forum_topic_closed` if available, `null` otherwise                                                                                             | `?array` for itself, `mixed` for subkeys
| `_forumTopicReopened(?string $keys = null)`           | Returns  `message->forum_topic_reopened` if available, `null` otherwise                                                                                           | `?array` for itself, `mixed` for subkeys
| `_messageThreadId()`                                  | Returns `message->message_thread_id` if available, `null` otherwise                                                                                               | `?int`
| `_userFirstName()`                                    | Returns `message->from->first_name` if available, `null` otherwise                                                                                                | `?string`
| `_userUsername()`                                     | Returns `message->from->username` if available, `null` otherwise                                                                                                  | `?string`
| `_chatShared(?string $keys = null)`                   | Returns `message->chat_shared` if available, `null` otherwise                                                                                                     | `?array` for itself, `mixed for subkeys`
| `_userShared(?string $keys = null)`                   | Returns `message->user_shared` if available, `null` otherwise                                                                                                     | `?array` for itself, `mixed for subkeys`
| `_connectedWebsite(?string $keys = null)`             | Returns `message->connected_website` if available, `null` otherwise                                                                                               | `?array` for itself, `mixed for subkeys`
| `_writeAccessAllowed(?string $keys = null)`           | Returns `message->write_access_allowed` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed for subkeys`
| `_passportData(?string $keys = null)`                 | Returns `message->passport_data` if available, `null` otherwise                                                                                                   | `?array` for itself, `mixed for subkeys`
| `_proximityAlertTriggered(?string $keys = null)`      | Returns `message->proximity_alert_trigerred` if available, `null` otherwise                                                                                       | `?array` for itself, `mixed for subkeys`
| `_generalForumTopicHidden(?string $keys = null)`      | Returns `message->general_forum_hidden` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed for subkeys`
| `_generalForumTopicUnhidden(?string $keys = null)`    | Returns `message->general_forum_unhidden` if available, `null` otherwise                                                                                          | `?array` for itself, `mixed for subkeys`
| `_videoChatScheduled(?string $keys = null)`           | Returns `message->video_chat_scheduled` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed for subkeys`
| `_videoChatStarted(?string $keys = null)`             | Returns `message->video_chat_started` if available, `null` otherwise                                                                                              | `?array` for itself, `mixed for subkeys`
| `_videoChatEnded(?string $keys = null)`               | Returns `message->video_chat_ended` if available, `null` otherwise                                                                                                | `?array` for itself, `mixed for subkeys`
| `_videoChatParticipantsInvited(?string $keys = null)` | Returns `message->video_chat_participants_invited` if available, `null` otherwise                                                                                 | `?array` for itself, `mixed for subkeys`
| `_webAppData(?string $keys = null)`                   | Returns `message->web_app_data` if available, `null` otherwise                                                                                                    | `?array` for itself, `mixed for subkeys`
| `_replyMarkupInlineKeyboard()`                        | Returns `message->reply_markup->inline_keyboard` if available, `null` otherwise                                                                                   | `?array`
| `_isMessage()`                                        | Returns `true` if the current update type was `message`, `false` otherwise                                                                                        | `bool`
| `_isCallbackQuery()`                                  | Returns `true` if the current update type was `callback_query`, `false` otherwise                                                                                 | `bool`
| `_isEditedMessage()`                                  | Returns `true` if the current update type was `edited_message`, `false` otherwise                                                                                 | `bool`
| `_isChannelPost()`                                    | Returns `true` if the current update type was `channel_post`, `false` otherwise                                                                                   | `bool`
| `_isEditedChannelPost()`                              | Returns `true` if the current update type was `edited_channel_post`, `false` otherwise                                                                            | `bool`
| `_isShippingQuery()`                                  | Returns `true` if the current update type was `shipping_query`, `false` otherwise                                                                                 | `bool`
| `_isChatJoinRequest()`                                | Returns `true` if the current update type was `chat_join_request`, `false` otherwise                                                                              | `bool`
| `_isInlineQuery()`                                    | Returns `true` if the current update type was `inline_query`, `false` otherwise                                                                                   | `bool`
| `_isMyChatMember()`                                   | Returns `true` if the current update type was `my_chat_member`, `false` otherwise                                                                                 | `bool`
| `_isChatMember()`                                     | Returns `true` if the current update type was `chat_member`, `false` otherwise                                                                                    | `bool`
| `_isChosenInlineResult()`                             | Returns `true` if the current update type was `chosen_inline_result`, `false` otherwise                                                                           | `bool`
| `_isPollAnswer()`                                     | Returns `true` if the current update type was `poll_answer`, `false` otherwise                                                                                    | `bool`
| `_isPoll()`                                           | Returns `true` if the current update OR message type was `poll`, `false` otherwise                                                                                | `bool`
| `_isPhoto()`                                          | Returns `true` if the current message type was `photo`, `false` otherwise                                                                                         | `bool`
| `_isSticker()`                                        | Returns `true` if the current message type was `sticker`, `false` otherwise                                                                                       | `bool`
| `_isAnimation()`                                      | Returns `true` if the current message type was `animation`, `false` otherwise                                                                                     | `bool`
| `_isVideo()`                                          | Returns `true` if the current message type was `video`, `false` otherwise                                                                                         | `bool`
| `_isVideoNote()`                                      | Returns `true` if the current message type was `video_note`, `false` otherwise                                                                                    | `bool`
| `_isDice()`                                           | Returns `true` if the current message type was `dice`, `false` otherwise                                                                                          | `bool`
| `_isGame()`                                           | Returns `true` if the current message type was `game`, `false` otherwise                                                                                          | `bool`
| `_isVenue()`                                          | Returns `true` if the current message type was `venue`, `false` otherwise                                                                                         | `bool`
| `_isVoice()`                                          | Returns `true` if the current message type was `voice`, `false` otherwise                                                                                         | `bool`
| `_isDocument()`                                       | Returns `true` if the current message type was `document`, `false` otherwise                                                                                      | `bool`
| `_isLocation()`                                       | Returns `true` if the current message type was `location`, `false` otherwise                                                                                      | `bool`
| `_isContact()`                                        | Returns `true` if the current message type was `contact`, `false` otherwise                                                                                       | `bool`
| `_isAudio()`                                          | Returns `true` if the current message type was `audio`, `false` otherwise                                                                                         | `bool`
| `_isText()`                                           | Returns `true` if the current message type was `text`, `false` otherwise                                                                                          | `bool`
| `_isSender()`                                         | Returns `true` if the current chat type was `sender`                                                                                                              | `bool`
| `_isGroup()`                                          | Returns `true` if the current chat type was `gorup`                                                                                                               | `bool`
| `_isSupergroup()`                                     | Returns `true` if the current chat type was `supergroup`                                                                                                          | `bool`
| `_isPrivate()`                                        | Returns `true` if the current chat type was `private`                                                                                                             | `bool`
| `_isChannel()`                                        | Returns `true` if the current chat type was `channel`                                                                                                             | `bool`
| `_isForwarded()`                                      | Returns `true` if a message was forwarded                                                                                                                         | `bool`
| `_isMessageNewChatMembers()`                          | Returns `true` if the current message type was `new_chat_members`, `false` otherwise                                                                              | `bool`
| `_isMessageLeftChatMember()`                          | Returns `true` if the current message type was `left_chat_member`, `false` otherwise                                                                              | `bool`
| `_isMessageNewChatTitle()`                            | Returns `true` if the current message type was `new_chat_title`, `false` otherwise                                                                                | `bool`
| `_isMessageNewChatPhoto()`                            | Returns `true` if the current message type was `new_chat_photo`, `false` otherwise                                                                                | `bool`
| `_isMessageDeleteChatPhoto()`                         | Returns `true` if the current message type was `delete_chat_photo`, `false` otherwise                                                                             | `bool`
| `_isMessageGroupChatCreated()`                        | Returns `true` if the current message type was `group_chat_created`, `false` otherwise                                                                            | `bool`
| `_isMessageSupergroupChatCreated()`                   | Returns `true` if the current message type was `supergroup_chat_created`, `false` otherwise                                                                       | `bool`
| `_isMessageChannelChatCreated()`                      | Returns `true` if the current message type was `channel_chat_created`, `false` otherwise                                                                          | `bool`
| `_isMessageAutoDeleteTimerChanged()`                  | Returns `true` if the current message type was `message_auto_delete_timer_changed`, `false` otherwise                                                             | `bool`
| `_isMessageMigrateToChatId()`                         | Returns `true` if the current message type was `migrate_to_chat_id`, `false` otherwise                                                                            | `bool`
| `_isMessageMigrateFromChatId()`                       | Returns `true` if the current message type was `migrate_from_chat_id`, `false` otherwise                                                                          | `bool`
| `_isMessagePinnedMessage()`                           | Returns `true` if the current message type was `pinned_message`, `false` otherwise                                                                                | `bool`
| `_isMessageInvoice()`                                 | Returns `true` if the current message type was `invoice`, `false` otherwise                                                                                       | `bool`
| `_isMessageSuccessfulPayment()`                       | Returns `true` if the current message type was `successful_payment`, `false` otherwise                                                                            | `bool`
| `_isMessageUserShared()`                              | Returns `true` if the current message type was `user_shared`, `false` otherwise                                                                                   | `bool`
| `_isMessageChatShared()`                              | Returns `true` if the current message type was `chat_shared`, `false` otherwise                                                                                   | `bool`
| `_isMessageConnectedWebsite()`                        | Returns `true` if the current message type was `connected_website`, `false` otherwise                                                                             | `bool`
| `_isMessageWriteAccessAllowed()`                      | Returns `true` if the current message type was `write_access_allowed`, `false` otherwise                                                                          | `bool`
| `_isMessagePassportData()`                            | Returns `true` if the current message type was `passport_data`, `false` otherwise                                                                                 | `bool`
| `_isMessageProximityAlertTriggered()`                 | Returns `true` if the current message type was `proximity_alert_triggered`, `false` otherwise                                                                     | `bool`
| `_isMessageForumTopicCreated()`                       | Returns `true` if the current message type was `forum_topic_created`, `false` otherwise                                                                           | `bool`
| `_isMessageForumTopicEdited()`                        | Returns `true` if the current message type was `forum_topoic_edited`, `false` otherwise                                                                           | `bool`
| `_isMessageForumTopicClosed()`                        | Returns `true` if the current message type was `forum_topic_closed`, `false` otherwise                                                                            | `bool`
| `_isMessageForumTopicReopened()`                      | Returns `true` if the current message type was `forum_topoic_reopened`, `false` otherwise                                                                         | `bool`
| `_isMessageGeneralForumTopicHidden()`                 | Returns `true` if the current message type was `general_forum_topic_hidden`, `false` otherwise                                                                    | `bool`
| `_isMessageGeneralForumTopicUnhidden()`               | Returns `true` if the current message type was `general_forum_topic_unhidden`, `false` otherwise                                                                  | `bool`
| `_isMessageVideoChatScheduled()`                      | Returns `true` if the current message type was `video_chat_scheduled`, `false` otherwise                                                                          | `bool`
| `_isMessageVideoChatStarted()`                        | Returns `true` if the current message type was `video_chat_started`, `false` otherwise                                                                            | `bool`
| `_isMessageVideoChatEnded()`                          | Returns `true` if the current message type was `video_chat_ended`, `false` otherwise                                                                              | `bool`
| `_isMessageVideoChatParticipantsInvited()`            | Returns `true` if the current message type was `video_chat_participants_invited`, `false` otherwise                                                               | `bool`
| `_isMessageWebAppData()`                              | Returns `true` if the current message type was `web_app_data`, `false` otherwise                                                                                  | `bool`
| `_isPollAnonymous()`                                  | Returns `true` if the `poll->is_anonymous` was true, `false` otherwise                                                                                            | `bool`
| `_isPollClosed()`                                     | Returns `true` if the `poll->is_closed` was true, `false` otherwise                                                                                               | `bool`
| `_isTopicMessage()`                                   | Returns `true` if `message->is_topic_message` was true, `false` otherwise                                                                                         | `bool`
| `_isBot()`                                            | Returns `true` if the `message->from->is_bot` was true, `false` otherwise                                                                                         | `bool`
| `_isForum()`                                          | Returns `true` if the `message->chat->is_forum` was true, `false` otherwise                                                                                       | `bool`


## 💎 Available Methods <a name="available-methods"></a>

All Telegram Bot API [Available methods](https://core.telegram.org/bots/api#available-methods) is available in the library.

- `getMe()`
- `logOut()`
- `close()`
- `sendMessage(...)`
- `forwardMessage(...)`
- `sendPhoto(...)`
- ...

## 🔮 Available Types <a name="available-types"></a>

All Telegram Bot API [Available types](https://core.telegram.org/bots/api#available-types) is available in the library.

- `Update(...)`
- `WebhookInfo(...)`
- `User(...)`
- `Chat(...)`
- `Message(...)`
- ...

## ⚓️ Available Constants <a name="available-constants"></a>

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

# 🐞 Bug Report <a name="bug-report"></a>
We strive to provide a robust and reliable library, but bugs may still occur. If you encounter any issues or unexpected behavior while using our library, we appreciate your help in reporting them.

Please follow these steps to report a bug:

1. Check the existing issues in the [Issue Tracker](https://github.com/devdasher/ptb-php/issues) to ensure that the bug hasn't already been reported.
2. If your issue is unique, create a new issue with a clear and descriptive title, including steps to reproduce the problem, expected behavior, and any relevant details.
3. Attach any error messages, stack traces, or code snippets that can assist with troubleshooting.

Your bug reports are invaluable in helping us identify and address any shortcomings promptly. We are committed to continuously improving the library and ensuring a smooth experience for all users.

We would also like to take this opportunity to encourage you to use our library and leverage its features to enhance your projects. We value your feedback and contributions, as they play a pivotal role in shaping the library's future development.

Thank you for your support and happy coding!

# 📝 Changelog <a name="changelog"></a>

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

# 🙌 Credits <a name="credits"></a>

- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

# 📜 License <a name="license"></a>
The GNU License (GNU v3). Please see [License File](LICENSE.md) for more information.
