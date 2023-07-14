## 🇮🇷 [توضیحات فارسی](docs/fa/README.md)

# PTB = Procedural Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check it out too!

# A Basic Example
```php
<?php

use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\onMessageText;
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

/*
    This handler is used to check text inputs on the 'message' update type
*/
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

/*
    This function should always be at the end of the code (after the handlers).
    After this function is called, the library checks the available handlers
    and executes the relevant codes accordingly and sends the appropriate response to the user
    The response you specified on an anonymous function on previous handlers
*/
run();


```
# Why Procedural and NOT OOP?
Procedural programming is often considered faster than Object-Oriented Programming (OOP) due to its lower overhead and the smaller number of operations required for execution. In procedural programming, the focus is on writing sequential instructions on a step-by-step manner to accomplish a task. This approach allows for efficient execution as the program directly operates on data using straightforward instructions.

One key factor that contributes to the perceived speed advantage of procedural programming is the reduced number of OPcodes (operation codes) involved. OPcodes are fundamental instructions understood by the computer's hardware and define specific operations like arithmetic calculations or memory access. Since procedural programs typically involve fewer layers of abstraction and direct manipulation of data, they tend to require fewer OPcodes to achieve a given functionality.

In contrast, OOP introduces additional layers of complexity through concepts such as classes, objects, and inheritance. While these features provide benefits like code reusability, modularity, and maintainability, they also introduce some performance overhead. OOP programs often involve more intricate interactions between objects, which may require additional processing steps and indirections. These factors can lead to a slightly slower execution compared to procedural programs, especially on scenarios where performance is critical and the additional features of OOP are not heavily utilized.

It is important to note that the performance difference between procedural and OOP approaches is contextual and may vary based on several factors, such as the specific programming language used, the efficiency of the compiler or interpreter, the design choices made, and the nature of the problem being solved. Therefore, while procedural programming can be perceived as faster due to its streamlined execution model and reduced OPcode usage, it is not a definitive rule, and OOP can provide significant advantages on terms of code organization, maintainability, and extensibility.

# Documentation
This library is constantly being updated and currently has many features.  

The list below is only a part of the library's facilities and soon this part of the document will be more complete. Below you can see the most important things:

## Available Handlers

| Message Handlers     | Description
|----------------------|-------------
| `onMessageText`      | Handles `text` on `message` update type
| `onMessagePhoto`     | Handles `photo` on `message` update type
| `onMessageAnimation` | Handles `animation` on `message` update type
| `onMessageVideo`     | Handles `video` on `message` update type
| `onMessageVideoNote` | Handles `video note` on `message` update type
| `onMessageAudio`     | Handles `audio` on `message` update type
| `onMessageVoice`     | Handles `voice` on `message` update type
| `onMessageDocument`  | Handles `document` on `message` update type
| `onMessageLocation`  | Handles `location` on `message` update type
| `onMessageContact`   | Handles `contact` on `message` update type
| `onMessageVenue`     | Handles `venue` on `message` update type
| `onMessageGame`      | Handles `game` on `message` update type
| `onMessageDice`      | Handles `dice` on `message` update type
| `onMessageSticker`   | Handles `sticker` on `message` update type
| `onMessage`          | Will be called if none of the above handlers match

| EditedMessage Handlers     | Description
|----------------------------|-------------
| `onEditedMessageText`      | Handles `text` on `edited_message` update type
| `onEditedMessagePhoto`     | Handles `photo` on `edited_message` update type
| `onEditedMessageAnimation` | Handles `animation` on `edited_message` update type
| `onEditedMessageVideo`     | Handles `video` on `edited_message` update type
| `onEditedMessageVideoNote` | Handles `video note` on `edited_message` update type
| `onEditedMessageAudio`     | Handles `audio` on `edited_message` update type
| `onEditedMessageVoice`     | Handles `voice` on `edited_message` update type
| `onEditedMessageDocument`  | Handles `document` on `edited_message` update type
| `onEditedMessageLocation`  | Handles `location` on `edited_message` update type
| `onEditedMessageContact`   | Handles `contact` on `edited_message` update type
| `onEditedMessageVenue`     | Handles `venue` on `edited_message` update type
| `onEditedMessageGame`      | Handles `game` on `edited_message` update type
| `onEditedMessageDice`      | Handles `dice` on `edited_message` update type
| `onEditedMessageSticker`   | Handles `sticker` on `edited_message` update type
| `onEditedMessage`          | Will be called if none of the above handlers match

| ChannelPost Handlers     | Description
|--------------------------|-------------
| `onChannelPostText`      | Handles `text` on `channel_post` update type
| `onChannelPostPhoto`     | Handles `photo` on `channel_post` update type
| `onChannelPostAnimation` | Handles `animation` on `channel_post` update type
| `onChannelPostVideo`     | Handles `video` on `channel_post` update type
| `onChannelPostVideoNote` | Handles `video note` on `channel_post` update type
| `onChannelPostAudio`     | Handles `audio` on `channel_post` update type
| `onChannelPostVoice`     | Handles `voice` on `channel_post` update type
| `onChannelPostDocument`  | Handles `document` on `channel_post` update type
| `onChannelPostLocation`  | Handles `location` on `channel_post` update type
| `onChannelPostContact`   | Handles `contact` on `channel_post` update type
| `onChannelPostVenue`     | Handles `venue` on `channel_post` update type
| `onChannelPostGame`      | Handles `game` on `channel_post` update type
| `onChannelPostDice`      | Handles `dice` on `channel_post` update type
| `onChannelPostSticker`   | Handles `sticker` on `channel_post` update type
| `onChannelPost`          | Will be called if none of the above handlers match

| EditedChannelPost Handlers     | Description
|--------------------------------|-------------
| `onEditedChannelPostText`      | Handles `text` on `edited_channel_post` update type
| `onEditedChannelPostPhoto`     | Handles `photo` on `edited_channel_post` update type
| `onEditedChannelPostAnimation` | Handles `animation` on `edited_channel_post` update type
| `onEditedChannelPostVideo`     | Handles `video` on `edited_channel_post` update type
| `onEditedChannelPostVideoNote` | Handles `video note` on `edited_channel_post` update type
| `onEditedChannelPostAudio`     | Handles `audio` on `edited_channel_post` update type
| `onEditedChannelPostVoice`     | Handles `voice` on `edited_channel_post` update type
| `onEditedChannelPostDocument`  | Handles `document` on `edited_channel_post` update type
| `onEditedChannelPostLocation`  | Handles `location` on `edited_channel_post` update type
| `onEditedChannelPostContact`   | Handles `contact` on `edited_channel_post` update type
| `onEditedChannelPostVenue`     | Handles `venue` on `edited_channel_post` update type
| `onEditedChannelPostGame`      | Handles `game` on `edited_channel_post` update type
| `onEditedChannelPostDice`      | Handles `dice` on `edited_channel_post` update type
| `onEditedChannelPostSticker`   | Handles `sticker` on `edited_channel_post` update type
| `onEditedChannelPost`          | Will be called if none of the above handlers match

| ChatMember Handlers | Description
|---------------------|-------------
| `onChatMember`      | Will be called on `chat_member` update type

| MyChatMember Handlers | Description
|-----------------------|-------------
| `onMyChatMember`      | Will be called on `my_chat_member` update type

| Poll Handlers | Description
|---------------|-------------
| `onPoll`      | Will be called on `poll` update type

| PollAnswer Handlers | Description
|---------------------|-------------
| `onPollAnswer`      | Will be called on `poll_answer` update type

| InlineQuery Handlers | Description
|----------------------|-------------
| `onInlineQuery`      | Will be called on `inline_query` update type

| ShippingQuery Handlers | Description
|------------------------|-------------
| `onShippingQuery`      | Will be called on `shipping_query` update type

| ChatJoinRequest Handlers | Description
|--------------------------|-------------
| `onChatJoinRequest`      | Will be called on `chat_join_request` update type

| PreCheckoutQuery Handlers | Description
|---------------------------|-------------
| `onPreCheckoutQuery`      | Will be called on `pre_checkout_query` update type

| ChosenInlineResult Handlers | Description
|-----------------------------|-------------
| `onChosenInlineResult`      | Will be called on `chosen_inline_result` update type

| Fallback Handlers | Description
|-------------------|-------------
| `fallbackOn`      | Will be called if none of the previous handlers match. Here you can determine the type of update
| `fallback`        | Will be called if none of the previous handlers match

| Exception Handlers | Description
|-------------------|-------------
| `onException`     | Will be called if whenever code reaches the throw statement

| ApiError Handlers | Description
|-------------------|-------------
| `onApiError`      | Will be called if an error occurs on the Telegram side while sending the request

## Available Helpers

| Helper                                    | Description                                                                                                                                                       | Return Type
|-------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------
| `update(?string $keys = null)`            | Returns the update                                                                                                                                                | `array` for itself, `mixed` for subkeys
| `updateId()`                              | Returns the `update_id`                                                                                                                                           | `?int`
| `updateType()`                            | Returns the current update type                                                                                                                                   | `?string`
| `message(?string $keys = null)`           | Returns `message` if available, `null` otherwise.                                                                                                                 | `array` for itself, `mixed` for subkeys
| `messageType(?string $keys = null)`       | Returns the current message type if available, `null` otherwise.                                                                                                  | `?string`
| `messageId(?string $keys = null)`         | Returns `message->message_id` if available, `null` otherwise.                                                                                                     | `?int`
| `repliedMessage(?string $keys = null)`    | Returns `message->reply_to_message` if available, `null` otherwise.                                                                                               | `array` for itself, `mixed` for subkeys
| `callbackQuery(?string $keys = null)`     | Returns `callback_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `callbackQueryData()`                     | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?string`
| `callbackQueryId()`                       | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?int`
| `inlineQuery(?string $keys = null)`       | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `array` for itself, `mixed` for subkeys
| `inlineQueryId()`                         | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `?int`
| `inlineQueryString()`                     | Returns `inline_query->query` if available, `null` otherwise.                                                                                                     | `?string`
| `shippingQuery(?string $keys = null)`     | Returns `shipping_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `preCheckoutQuery(?string $keys = null)`  | Returns `pre_checkout_query` if available, `null` otherwise.                                                                                                      | `array` for itself, `mixed` for subkeys
| `user(?string $keys = null)`              | Returns the current `user` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `chat(?string $keys = null)`              | Returns the current `chat` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `chatType()`                              | Returns the current `chat->type` if available, `null` otherwise                                                                                                   | `?string`
| `chatTypes(array $exclude = [])`          | Returns all available chat types                                                                                                                                  | `array` of strings
| `chatMemberStatuses(array $exclude = [])` | Returns all available member statuses                                                                                                                             | `array` of strings
| `formattingOptions(array $exclude = [])`  | Returns all available formatting options                                                                                                                          | `array` of strings
| `chatActions(array $exclude = [])`        | Returns all available chat actions                                                                                                                                | `array` of strings
| `updateTypes(array $exclude = [])`        | Returns all available update types                                                                                                                                | `array` of strings
| `messageTypes(array $exclude = [])`       | Returns all available message types                                                                                                                               | `array` of strings
| `fileTypes(array $exclude = [])`          | Returns all available message types that are files                                                                                                                | `array` of strings
| `mediaGroupId()`                          | Returns `message->media_group_id` if available, `null` otherwise                                                                                                  | `?int`
| `forwardFrom(?string $keys = null)`       | Returns `message->forward_from` if available, `null` otherwise                                                                                                    | `array` for itself, `mixed` for subkeys
| `forwardFromChat(?string $keys = null)`   | Returns `message->forward_from_chat` if available, `null` otherwise                                                                                               | `array` for itself, `mixed` for subkeys
| `forwardFromMessageId()`                  | Returns `message->forward_from_message_id` if available, `null` otherwise                                                                                         | `?int`
| `forwardDate()`                           | Returns `message->forward_date` if available, `null` otherwise                                                                                                    | `?int`
| `isMessage()`                             | Returns `true` if the current update type was `message`, `false` otherwise                                                                                        | `bool`
| `isCallbackQuery()`                       | Returns `true` if the current update type was `callback_query`, `false` otherwise                                                                                 | `bool`
| `isEditedMessage()`                       | Returns `true` if the current update type was `edited_message`, `false` otherwise                                                                                 | `bool`
| `isChannelPost()`                         | Returns `true` if the current update type was `channel_post`, `false` otherwise                                                                                   | `bool`
| `isEditedChannelPost()`                   | Returns `true` if the current update type was `edited_channel_post`, `false` otherwise                                                                            | `bool`
| `isShippingQuery()`                       | Returns `true` if the current update type was `shipping_query`, `false` otherwise                                                                                 | `bool`
| `isChatJoinRequest()`                     | Returns `true` if the current update type was `chat_join_request`, `false` otherwise                                                                              | `bool`
| `isInlineQuery()`                         | Returns `true` if the current update type was `inline_query`, `false` otherwise                                                                                   | `bool`
| `isMyChatMember()`                        | Returns `true` if the current update type was `my_chat_member`, `false` otherwise                                                                                 | `bool`
| `isChatMember()`                          | Returns `true` if the current update type was `chat_member`, `false` otherwise                                                                                    | `bool`
| `isChosenInlineResult()`                  | Returns `true` if the current update type was `chosen_inline_result`, `false` otherwise                                                                           | `bool`
| `isPollAnswer()`                          | Returns `true` if the current update type was `poll_answer`, `false` otherwise                                                                                    | `bool`
| `isPoll(?string $keys = null)`            | Returns `true` if the current update type was `poll`, `false` otherwise, pass `true` to the first parameter if you want to check the message type                 | `bool`
| `isPhoto()`                               | Returns `true` if the current message type was `photo`, `false` otherwise                                                                                         | `bool`
| `isSticker()`                             | Returns `true` if the current message type was `sticker`, `false` otherwise                                                                                       | `bool`
| `isAnimation()`                           | Returns `true` if the current message type was `animation`, `false` otherwise                                                                                     | `bool`
| `isVideo()`                               | Returns `true` if the current message type was `video`, `false` otherwise                                                                                         | `bool`
| `isVideoNote()`                           | Returns `true` if the current message type was `video_note`, `false` otherwise                                                                                    | `bool`
| `isDice()`                                | Returns `true` if the current message type was `dice`, `false` otherwise                                                                                          | `bool`
| `isGame()`                                | Returns `true` if the current message type was `game`, `false` otherwise                                                                                          | `bool`
| `isVenue()`                               | Returns `true` if the current message type was `venue`, `false` otherwise                                                                                         | `bool`
| `isVoice()`                               | Returns `true` if the current message type was `voice`, `false` otherwise                                                                                         | `bool`
| `isDocument()`                            | Returns `true` if the current message type was `document`, `false` otherwise                                                                                      | `bool`
| `isLocation()`                            | Returns `true` if the current message type was `location`, `false` otherwise                                                                                      | `bool`
| `isContact()`                             | Returns `true` if the current message type was `contact`, `false` otherwise                                                                                       | `bool`
| `isAudio()`                               | Returns `true` if the current message type was `audio`, `false` otherwise                                                                                         | `bool`
| `isText()`                                | Returns `true` if the current message type was `text`, `false` otherwise                                                                                          | `bool`
| `isGroup()`                               | Returns `true` if the current chat type was `gorup`                                                                                                               | `bool`
| `isSupergroup()`                          | Returns `true` if the current chat type was `supergroup`                                                                                                          | `bool`
| `isPrivate()`                             | Returns `true` if the current chat type was `private`                                                                                                             | `bool`
| `isChannel()`                             | Returns `true` if the current chat type was `channel`                                                                                                             | `bool`
| `isForwarded()`                           | Returns `true` if a message was forwarded                                                                                                                         | `bool`

### And there is more! This list will be updated soon...

# Installation
You can install the package via composer:

```bash
composer require devdasher/ptb-php
```

Or you can include the PTB.php file on your PHP code directly

# Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

# Credits
- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

# License
The GNU License (GNU v3). Please see [License File](LICENSE.md) for more information.