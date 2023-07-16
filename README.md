## 🇮🇷 [توضیحات فارسی](docs/fa/README.md)

# PTB = Procedural Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

# Quick Access
- [Introduction](#introduction)
- [A Basic Example](#basic-example)
- [Installation](#installation)
- [Why Procedural and NOT OOP?](#why-procedural)
- [Documentation](#documentation)
    - [Handlers](#handlers)
        - [Available Handlers](#available-handlers)
    - [Available Helpers](#available-helpers)
    - [Available Methods](#available-methods)
    - [Available Types](#available-types)
- [Bug Report](#bug-report)
- [Changelog](#available-changelog)
- [Credits](#available-credits)
- [License](#available-license)

# Introduction <a name="introduction"></a>
This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check it out too!

# A Basic Example <a name="basic-example"></a>
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

# Installation <a name="installation"></a>
You can install the package via composer:

```bash
composer require devdasher/ptb-php
```

Or you can include the PTB.php file on your PHP code directly

# Why Procedural and NOT OOP? <a name="why-procedural"></a>
Procedural programming is often considered faster than Object-Oriented Programming (OOP) due to its lower overhead and the smaller number of operations required for execution. In procedural programming, the focus is on writing sequential instructions on a step-by-step manner to accomplish a task. This approach allows for efficient execution as the program directly operates on data using straightforward instructions.

One key factor that contributes to the perceived speed advantage of procedural programming is the reduced number of OPcodes (operation codes) involved. OPcodes are fundamental instructions understood by the computer's hardware and define specific operations like arithmetic calculations or memory access. Since procedural programs typically involve fewer layers of abstraction and direct manipulation of data, they tend to require fewer OPcodes to achieve a given functionality.

In contrast, OOP introduces additional layers of complexity through concepts such as classes, objects, and inheritance. While these features provide benefits like code reusability, modularity, and maintainability, they also introduce some performance overhead. OOP programs often involve more intricate interactions between objects, which may require additional processing steps and indirections. These factors can lead to a slightly slower execution compared to procedural programs, especially on scenarios where performance is critical and the additional features of OOP are not heavily utilized.

It is important to note that the performance difference between procedural and OOP approaches is contextual and may vary based on several factors, such as the specific programming language used, the efficiency of the compiler or interpreter, the design choices made, and the nature of the problem being solved. Therefore, while procedural programming can be perceived as faster due to its streamlined execution model and reduced OPcode usage, it is not a definitive rule, and OOP can provide significant advantages on terms of code organization, maintainability, and extensibility.


# Documentation <a name="documentation"></a>
This library is constantly being updated and currently has many features.  

The list below is only a part of the library's facilities and soon this part of the document will be more complete. Below you can see the most important things:



## Configuration <a name="configuration"></a>
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


## Handlers <a name="handlers"></a>
Handlers are essential components in building interactive and dynamic conversational experiences. They enable the customization of logic and actions based on specific triggers or conditions. For instance, handlers can be triggered by user messages, chat joins, button clicks, or any other desired action for the bot to respond appropriately. Key aspects of handlers include event binding, where they are associated with specific events; logic and actions, which define what happens when the event occurs; event types, allowing handlers to cater to different event categories; registration, ensuring appropriate handler invocation upon event occurrence; and customization, enabling the bot to respond differently based on various situations. Leveraging handlers effectively facilitates the creation of chatbots capable of interactive and adaptable user interactions, while offering a maintainable and extensible code structure.

### Available Handlers <a name="available-handlers"></a>

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
| `onMessagePoll`      | Handles `poll` on `message` update type
| `onMessageVenue`     | Handles `venue` on `message` update type
| `onMessageGame`      | Handles `game` on `message` update type
| `onMessageDice`      | Handles `dice` on `message` update type
| `onMessageSticker`   | Handles `sticker` on `message` update type
| `onMessage`          | Will be called if none of the above handlers match

| EditedMessage Handlers          | Description
|---------------------------------|-------------
| `onEditedMessageText`           | Handles `text` on `edited_message` update type
| `onEditedMessagePhoto`          | Handles `photo` on `edited_message` update type
| `onEditedMessageAnimation`      | Handles `animation` on `edited_message` update type
| `onEditedMessageVideo`          | Handles `video` on `edited_message` update type
| `onEditedMessageVideoNote`      | Handles `video note` on `edited_message` update type
| `onEditedMessageAudio`          | Handles `audio` on `edited_message` update type
| `onEditedMessageVoice`          | Handles `voice` on `edited_message` update type
| `onEditedMessageDocument`       | Handles `document` on `edited_message` update type
| ` [!] onEditedMessageLocation`  | Handles `location` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Location Messages)
| ` [!] onEditedMessageContact`   | Handles `contact` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Contact Messages)
| ` [!] onEditedMessagePoll`      | Handles `poll` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Poll Messages)
| ` [!] onEditedMessageVenue`     | Handles `venue` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Venue Messages)
| ` [!] onEditedMessageGame`      | Handles `game` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Game Messages)
| ` [!] onEditedMessageDice`      | Handles `dice` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Dice Messages)
| ` [!] onEditedMessageSticker`   | Handles `sticker` on `edited_message` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this (Editing Sticker Messages)
| `onEditedMessage`               | Will be called if none of the above handlers match

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
| `onChannelPostPoll`      | Handles `poll` on `channel_post` update type
| `onChannelPostVenue`     | Handles `venue` on `channel_post` update type
| `onChannelPostGame`      | Handles `game` on `channel_post` update type
| `onChannelPostDice`      | Handles `dice` on `channel_post` update type
| `onChannelPostSticker`   | Handles `sticker` on `channel_post` update type
| `onChannelPost`          | Will be called if none of the above handlers match

| EditedChannelPost Handlers         | Description
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
| `[!] onEditedChannelPostContact`   | Handles `contact` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Contact Messages)
| `[!] onEditedChannelPostPoll`      | Handles `poll` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Poll Messages)
| `[!] onEditedChannelPostVenue`     | Handles `venue` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Venue Messages)
| `[!] onEditedChannelPostGame`      | Handles `game` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Game Messages)
| `[!] onEditedChannelPostDice`      | Handles `dice` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this feature yet (Editing Dice Messages)
| `[!] onEditedChannelPostSticker`   | Handles `sticker` on `edited_channel_post` update type, __CURRENTLY NOT WORKING:__ Telegram still does not support this (Editing Sticker Messages)
| `onEditedChannelPost`              | Will be called if none of the above handlers match

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
| `onInlineQueryText`  | Handles `query` on `inline_query` update type
| `onInlineQuery`      | Will be called if none of the above handlers match

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
| `onChosenInlineResultQuery` | Handles `query` on `chosen_inline_result` update type
| `onChosenInlineResultId`    | Handles `result_id` on `chosen_inline_result` update type
| `onChosenInlineResult`      | Will be called if none of the above handlers match

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

## Available Helpers <a name="available-helpers"></a>

| Helper                                    | Description                                                                                                                                                       | Return Type
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


## Available Methods <a name="available-methods"></a>
All Telegram Bot API [Available methods](https://core.telegram.org/bots/api#available-methods) is available in the library.

- `getMe()`
- `logOut()`
- `close()`
- `sendMessage(...)`
- `forwardMessage(...)`
- `forwardMessage(...)`
- `sendPhoto(...)`
- ...

## Available Types <a name="available-types"></a>
All Telegram Bot API [Available types](https://core.telegram.org/bots/api#available-types) is available in the library.

- `Update(...)`
- `WebhookInfo(...)`
- `User(...)`
- `Chat(...)`
- `Message(...)`
- ...

## Bug Report <a name="bug-report"></a>
We strive to provide a robust and reliable library, but bugs may still occur. If you encounter any issues or unexpected behavior while using our library, we appreciate your help in reporting them.

Please follow these steps to report a bug:

1. Check the existing issues in the [Issue Tracker](https://github.com/devdasher/ptb-php/issues) to ensure that the bug hasn't already been reported.
2. If your issue is unique, create a new issue with a clear and descriptive title, including steps to reproduce the problem, expected behavior, and any relevant details.
3. Attach any error messages, stack traces, or code snippets that can assist with troubleshooting.

Your bug reports are invaluable in helping us identify and address any shortcomings promptly. We are committed to continuously improving the library and ensuring a smooth experience for all users.

We would also like to take this opportunity to encourage you to use our library and leverage its features to enhance your projects. We value your feedback and contributions, as they play a pivotal role in shaping the library's future development.

Thank you for your support and happy coding!

# Changelog <a name="available-changelog"></a>
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

# Credits <a name="available-credits"></a>
- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

# License <a name="available-license"></a>
The GNU License (GNU v3). Please see [License File](LICENSE.md) for more information.
