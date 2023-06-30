# PTB = Procedure Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check them out too!

```php
<?php

use function DevDasher\PTB\answerCallbackQuery;
use function DevDasher\PTB\fallback;
use function DevDasher\PTB\fallbackOn;
use function DevDasher\PTB\inlineKeyboard;
use function DevDasher\PTB\inlineKeyboardButton;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;
use function DevDasher\PTB\onApiError;
use function DevDasher\PTB\onCallbackQueryData;
use function DevDasher\PTB\onEditedMessageText;
use function DevDasher\PTB\onException;
use function DevDasher\PTB\onMessagePhoto;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\initPTB;
use function DevDasher\PTB\messageId;
use function DevDasher\PTB\onMessageSticker;
use function DevDasher\PTB\photo;
use function DevDasher\PTB\sticker;
use function DevDasher\PTB\user;

// require(__DIR__.'/vendor/autoload.php');
require(__DIR__.'/path/to/PTB.php'); // Or you can require directly

initPTB(
    token: 'TOKEN',
    username: 'BOT_USERNAME',
    api_base_url: 'https://tlgr.org',
    is_webhook: true, // or false for LongPolling running mode (from terminal)
    default_curl_options: [
        // CURLOPT_PROXY => '127.0.0.1:2080',
        // ...
    ],
);

onMessageText('/start', function() {
    sendMessage(
        text: 'Hello World!',
        reply_markup: inlineKeyboard([
            [inlineKeyboardButton(text: 'btn1', callback_data: 'btn1')],
            [inlineKeyboardButton(text: 'btn2', callback_data: 'btn2/SOME_VALUE')],
            [inlineKeyboardButton(text: 'btn3', callback_data: 'btn3')],
        ]),
    );
});

onMessageText('/user', function() {
    $user = user();
    sendMessage(
        text: <<<TEXT
            UserID: {$user['id']},
            UserFirstName: {$user['first_name']}
            UserUsername: {$user['username']}
        TEXT,
    );
});

onMessageText('My name is {name}', function(string $name) {
    sendMessage(text: "Hi {$name}");
});

onMessagePhoto(function() {
    $photo = photo();
    sendMessage("You send a photo!\n\n".json_encode($photo, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
});

onMessageSticker(function() {
    $sticker = sticker();
    sendMessage("You send a sticker!\n\n".json_encode($sticker, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
});

onEditedMessageText('/help', function() {
    sendMessage(
        text: 'You edited this message to the command /help, and this handler was executed!',
        reply_to_message_id: messageId(),
    );
});

onCallbackQueryData('btn1', function() {
    answerCallbackQuery(
        text: 'You clicked on button btn1!',
        show_alert: true,
    );
});

onCallbackQueryData('btn2/{value}', function(string $value) {
    answerCallbackQuery(
        text: 'You clicked on button btn2! with callback parameter value: '.$value,
        show_alert: true,
    );
});

// other handlers here...

fallbackOn(UPDATE_TYPE_MESSAGE, function() {
    sendMessage("Unknown command! (on 'message' update type)");
});

fallbackOn(UPDATE_TYPE_CALLBACK_QUERY, function() {
    answerCallbackQuery(
        text: "Unknown command! (on 'callback_query' update type)",
        show_alert: true
    );
});

fallback(function() {
    sendMessage('Unknown command!');
});

onException(function(\Throwable $e) {
    sendMessage(text: 'onException ' . $e->getMessage());
});

onApiError(function(array $response) {
    sendMessage(text: 'onApiError ' . $response['error_code']);
});

run();
```

## Installation

You can install the package via composer:

```bash
composer require devdasher/ptb
```

## Usage

- Official Documentation

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

## License

The GNU License (GNU v3). Please see [License File](LICENSE.md) for more information.
