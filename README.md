# PTB = Procedural Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check it out too!

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
use function DevDasher\PTB\setGlobalData;
use function DevDasher\PTB\getGlobalData;
use function DevDasher\PTB\middleware;
use function DevDasher\PTB\sticker;
use function DevDasher\PTB\user;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

// require(__DIR__.'/vendor/autoload.php');
require(__DIR__.'/path/to/PTB.php'); // Or you can require directly

initPTB(
    bot_token: 'TOKEN',
    bot_username: 'BOT_USERNAME',
    api_base_url: 'https://tlgr.org',
    is_webhook: true, // or false for LongPolling running mode (from terminal) => Command: php file.php
    default_curl_options: [
        // CURLOPT_PROXY => '127.0.0.1:2080',
        // ...
    ],

    // if you need to use conversation feature or cache data,
    // you need to install some packages and use Composer for this
    cache: new Psr16Cache(new FilesystemAdapter())
);

// Global middleware, That runs before handlers
middleware(function() {
    // some code here
    // maybe you want store the user's information ...
    // or check some other stuffs

    //example:
    $user = user(); // user's info in the telegram
    if ($user) {
        $user = [ 
            'user_id' => $user['id'],
            'first_name' => $user['first_name'] ?? null,
            'last_name' => $user['last_name'] ?? null,
            'username' => $user['username'] ?? null,

            // or you can use this way:
            'user_id' => user('id'),
            'first_name' => user('first_name'),
            'last_name' => user('last_name'),
            'username' => user('username'),
        ];

        // $user = save_user_info_in_database($user); // This is a hypothetical function

        // set user's info in the global_data
        setGlobalData('user', $user);
        // you can use getGlobalData('user') to get the user's info from other handlers
    }
    
    sendMessage('Middleware');
});

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
    // $user = user();
    $user = getGlobalData('user'); // or you can get user's info that we have set in the middleware earlier...
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

// Conversation Feature (To get input from user)
// You need to use composer and set a cache adapter in initPTB for this feature
onMessageText('/register', function() {
    sendMessage('Send your name: ');

    // next step that will execute next time
    conversationNextStep(function() { 
        $name = text();
        conversationSetData('name', $name);
        sendMessage('Send your age: ');

        // final step that will execute next time and will end conversation automatically
        conversationEnd(function() {
            $name = conversationGetData('name');
            $age = text();
            sendMessage("Name: {$name}\nAge: {$age}\n\nThank you!");
        });
    });
});

onMessagePhoto(function() {
    $photo = photo();
    sendMessage("You sent a photo!\n\n".json_encode($photo, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
});

onMessageSticker(function() {
    $sticker = sticker();
    sendMessage("You sent a sticker!\n\n".json_encode($sticker, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
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
# Why Procedural and NOT OOP?
Procedural programming is often considered faster than Object-Oriented Programming (OOP) due to its lower overhead and the smaller number of operations required for execution. In procedural programming, the focus is on writing sequential instructions in a step-by-step manner to accomplish a task. This approach allows for efficient execution as the program directly operates on data using straightforward instructions.

One key factor that contributes to the perceived speed advantage of procedural programming is the reduced number of OPcodes (operation codes) involved. OPcodes are fundamental instructions understood by the computer's hardware and define specific operations like arithmetic calculations or memory access. Since procedural programs typically involve fewer layers of abstraction and direct manipulation of data, they tend to require fewer OPcodes to achieve a given functionality.

In contrast, OOP introduces additional layers of complexity through concepts such as classes, objects, and inheritance. While these features provide benefits like code reusability, modularity, and maintainability, they also introduce some performance overhead. OOP programs often involve more intricate interactions between objects, which may require additional processing steps and indirections. These factors can lead to a slightly slower execution compared to procedural programs, especially in scenarios where performance is critical and the additional features of OOP are not heavily utilized.

It is important to note that the performance difference between procedural and OOP approaches is contextual and may vary based on several factors, such as the specific programming language used, the efficiency of the compiler or interpreter, the design choices made, and the nature of the problem being solved. Therefore, while procedural programming can be perceived as faster due to its streamlined execution model and reduced OPcode usage, it is not a definitive rule, and OOP can provide significant advantages in terms of code organization, maintainability, and extensibility.

## Installation

You can install the package via composer:

```bash
composer require devdasher/ptb-php
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
