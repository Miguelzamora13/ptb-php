# PTB-PHP = Procedural Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

# 🗂️ Table of Contents

- 🌟 [Introduction](#introduction)
- 💡 [Basic Example](#basic-example)
- 🛠️ [Installation](#installation)
- 📐 [Requirements](#requirements)
- 🕸️ [Dependencies](#dependencies)
- 💪 [Features](#features)
- ❓ [Why Procedural and NOT OOP?](#why-procedural)
- 📚 [Documentation](#documentation)
    - ⚙️ [Configuraion](#configuration)
        - [Available Configuration Parameters](#available-configuration-parameters)
    - 📤 [Uploading Files](#uploading-files)
    - 📥 [Downloading Files](#downloading-files)
    - 🤖 [Multiple Bot Management](#multiple-bot-management)
    - 🤝 [Middlewares](#middlewares)
        - [Global Middlewares](#global-middlewares)
            - [Defining Multiple Middlewares](#defining-multiple-middlewares)
            - [Skipping Global Middlewares](#skipping-multiple-middlewares)
        - [Local Middlewares](#local-middlewares)
        - [Real World Example](#middlewares-real-world-example)
    - 💬 [Conversations](#conversations)
        - [Important Notice](#conversations-important-notice)
        - [OOP Way](#conversations-oop-way)
    - 🎮 [Keyboards](#keyboards)
        - [ReplyKeyboardMarkup](#reply-keyboard-markup)
        - [ReplyKeyboardRemove](#reply-keyboard-remove)
        - [InlineKeyboardMarkup](#inline-keyboard-markup)
        - [ForceReply](#force-reply)
    - 🧩 [Handlers](#handlers)
    - 🚁 [Helpers](#helpers)
        - [How to use Helpers in action?](#how-to-use-helpers)
    - 💎 [Available Methods](#available-methods)
    - 🔮 [Available Types](#available-types)
    - ⚓️ [Available Constants](#available-constants)
    - ♟ [Usage Without Handlers](#usage-without-handlers)
        - [Webhook Implementation](#without-handlers-webhook-implementation)
        - [LongPolling Implementation](#without-handlers-longpolling-implementation)
    - 🧱 [Usage With OOP](#usage-with-oop)
        - [Optimizing Project Structure](#optimizing-project-structure)
    - 🔗 [Deep Links](#deep-links) (Soon...)
    - 🚀 [Performance](#performance) (Not complete yet...)
- ✨ [Projects Showcase](#projects-showcase)
- 🐞 [Bug Report](#bug-report)
- ❤️ [Support Us!](#support-us)
- 📝 [Changelog](#changelog)
- 🙌 [Credits](#credits)
- 📜 [License](#license)
    - ⚠️ [Disclaimer of Warranty](#disclaimer-of-warranty)

# 🌟 Introduction <a name="introduction"></a>

This library utilizes the latest features of **PHP 8** and aims to excel in terms of **speed**, **scalability**, and **usability**. It enables you to swiftly create basic bots while also offering advanced capabilities to handle even the most intricate workflows. Some fundamental principles underlying **PTB-PHP** draw inspiration from another open-source project called [Nutgram](https://github.com/nutgram/nutgram)! Be sure to check it out as well!

# 💡 Basic Example <a name="basic-example"></a>

```php
<?php

use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Handlers\middleware;
use function DevDasher\PTB_PHP\Handlers\onMessage;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Config\run;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

// require(__DIR__.'/vendor/autoload.php'); // You can use Composer's autolaoder
require(__DIR__.'/path/to/PTB.php'); // Or require the PTB.php file directly

/*
    This function is for setting the initial settings of the library
    It should be defined and called at the top of the code and before the handlers
*/
configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    is_webhook: false, # Webhook OR LongPolling?
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
    pattern: '/start|/begin', // Here, we specified two commands

    # The function that is executed after checking the pattern on response to the user
    callable: function() { 
        sendMessage(text: 'Hello World'); // A function to send a message to the user

        /*
            In short, if the user sends the /start OR /begin commands to the bot,
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

# 📐 Requirements <a name="requirements"></a>

- **PHP Version:** 8.* or higher
- **PHP Extension:** [cURL](https://www.php.net/manual/en/book.curl.php)

# 🕸️ Dependencies <a name="dependencies"></a>

If you are using Composer:

- **[symfony/cache](https://github.com/symfony/cache)**: ^6.3
- **[psr/simplecache](https://github.com/php-fig/simple-cache)**: ^3.0
- **[laravel/serializableclosure](https://github.com/laravel/serializable-closure)**: ^1.3
- **[devdasher/php-helpers](https://github.com/devdasher/php-helpers)**: ^1.0

# 💪 Features <a name="features"></a>

- **Middlewares:** Easily implement middleware functions to intercept and modify incoming requests or outgoing responses.
- **Handlers:** Define handlers to process different types of events or commands in your Telegram bot.
- **Conversations:** Conversations is a feature that allows you to easily receive inputs from users in your Telegram bot. It provides a convenient way to manage and track ongoing conversations with users, making it simpler to implement interactive and dynamic bot interactions. With the Conversations feature, you can create multi-step dialogs, handle user responses, and maintain context throughout the conversation flow.
- **Function Helpers:** Convenient helper functions to simplify common tasks and operations in your bot's logic.
- **Constant Helpers:** Access predefined constants that represent commonly used values or configurations.
- **Available all Telegram Bot API Methods:** Utilize the full range of methods provided by the Telegram Bot API to interact with users, send messages, manage chats, and more.
- **Available all Telegram Bot API Types:** Access the complete set of data types defined by the Telegram Bot API for parsing and working with incoming updates and outgoing requests.

These features provide a comprehensive toolkit for building powerful and flexible Telegram bots.

# ❓ Why Procedural and NOT OOP? <a name="why-procedural"></a>

Procedural programming is often considered faster than Object-Oriented Programming (OOP) due to its lower overhead and the smaller number of operations required for execution. In procedural programming, the focus is on writing sequential instructions on a step-by-step manner to accomplish a task. This approach allows for efficient execution as the program directly operates on data using straightforward instructions.

One key factor that contributes to the perceived speed advantage of procedural programming is the reduced number of OPcodes (operation codes) involved. OPcodes are fundamental instructions understood by the computer's hardware and define specific operations like arithmetic calculations or memory access. Since procedural programs typically involve fewer layers of abstraction and direct manipulation of data, they tend to require fewer OPcodes to achieve a given functionality.

In contrast, OOP introduces additional layers of complexity through concepts such as classes, objects, and inheritance. While these features provide benefits like code reusability, modularity, and maintainability, they also introduce some performance overhead. OOP programs often involve more intricate interactions between objects, which may require additional processing steps and indirections. These factors can lead to a slightly slower execution compared to procedural programs, especially on scenarios where performance is critical and the additional features of OOP are not heavily utilized.

It is important to note that the performance difference between procedural and OOP approaches is contextual and may vary based on several factors, such as the specific programming language used, the efficiency of the compiler or interpreter, the design choices made, and the nature of the problem being solved. Therefore, while procedural programming can be perceived as faster due to its streamlined execution model and reduced OPcode usage, it is not a definitive rule, and OOP can provide significant advantages on terms of code organization, maintainability, and extensibility.


# 📚 Documentation <a name="documentation"></a>

This library is continuously updated and offers a wide range of features.

The following list represents just a fraction of the library's capabilities, and we are actively working expand this documentation. Here are some of the key highlights:


## ⚙️ Configuration <a name="configuration"></a>

To use the library, you must configure it by setting at least two mandatory parameters. Here's an example:

```php
use function DevDasher\PTB_PHP\Config\configurePTB;

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',
    // ...
);
```

### Available Configuration Parameters <a name="available-configuration-parameters"></a>

| Parameter                                 | Required | Description                                                        
|-------------------------------------------|----------|--------------------------------------------------------------------
| `string $username`                        | ✅       | The bot username used for identification.                          
| `string $token`                           | ✅       | The bot token required to authenticate and access the Telegram API. 
| `string $api_base_url = API_BASE_URL`     | ❌       | The base URL for the Telegram API. Default is 'https://api.telegram.org', but you can provide your own custom base URL.
| `array $curl_options = []`                | ❌       | Additional cURL options for sending requests to the Telegram API. Some options are already set by default, but you can add or overwrite them using this parameter.
| `bool $is_webhook = false`                | ❌       | Set this to `true` if you want to use Webhook to receive updates from Telegram. This is suitable for production environments. By default, Long Polling is used (`false`).
| `?CacheInterface $cache = null`           | ❌       | A cache adapter implementation that will be used for caching purposes. You can pass a cache adapter object that implements the `Psr\SimpleCache\CacheInterface`.
| `array $update = []`                      | ❌       | Allows you to set the input update sent from Telegram servers manually, or add a fake update for testing purposes.
| `array $global_data = []`                 | ❌       | An optional array of key-value pairs that allows you to store global data (e.g., configuration values) accessible to all middlewares and handlers in the library using `getGlobalData(...)` helper. The `_setGLobalData(...)` does the same thing.
| `?array $allowedgetUpdates = null`          | ❌       | Defines the allowed types of updates that the library should handle. You can effectively determine allowed updates through the `setWebhook` method. Updates that are not allowed will be automatically rejected by the library. This provides an additional layer of validation for incoming updates.

## 📤 Uploading Files <a name="uploading-files"></a>

Here is some examples of how you can send files to the user in different ways:

```php
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendPhoto;
use function DevDasher\PTB_PHP\Telegram\Methods\sendVideo;
use function DevDasher\PTB_PHP\Telegram\Types\InputFile;

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

        caption: 'This is your photo caption!',

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
use function DevDasher\PTB_PHP\Helpers\downloadURL;
use function DevDasher\PTB_PHP\Telegram\Helpers\downloadBotFile;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessageId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getPhoto;
use function DevDasher\PTB_PHP\Handlers\onMessagePhoto;
use function DevDasher\PTB_PHP\Telegram\Methods\getFile;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

onMessagePhoto(callable: function() {
    $photo = getPhoto(); // A Helper, to get the photo details sent to the bot
    $response = sendMessage(
        text: 'Downloading...',
        reply_to_message_id: getMessageId(),
    );
    $file = getFile(file_id: $photo['file_id']); // Get details about the photo (photo path on Telegram servers...) 
    if (!$file['ok']) {
        return sendMessage(text: 'Something went wrong!');
    }
    $result = downloadBotFile(
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

Alternatively, you can use the `downloadURL(...)` function to download files, but you need to pass the url to it:

```php
use function DevDasher\PTB_PHP\Helpers\downloadURL;

//...
    $url = 'https://api.telegram.org/file/botTOKEN/FILE_NAME.jpg';
    $result = downloadURL(
        url: $url,
        save_path: 'where/to/save/this/file.jpg',
    );
//...
```

It's better to use the `downloadBotFile(...)` function.


## 🤖 Multiple Bot Management <a name="multiple-bot-management"></a>

You can manage your bots easily. see this example:

```php
use function DevDasher\PTB_PHP\Config\addNewBot;
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Config\sendApiRequest;
use function DevDasher\PTB_PHP\Handlers\onMessage;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;


# You set the first and default bot details here:
configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',
    //...
);

onMessage(callable: function() {
    # A helper function to add a new bot, do this anywhere you want:
    addNewBot(
        token: 'SECOND_BOT_TOKEN',
        username: 'SECOND_BOT_USERNAME',
        //...
    );

    # By default, all requests will be sent to the main (default) bot:
    $response = sendMessage(text: 'Hey there!');

    # Now, we send a message to the second bot like this:
    $response = sendApiRequest(
        method: METHOD_SEND_MESSAGE,
        parameters: [
            'text' => "What's up bro?",
        ],
        options: [
            # Here, you can specify the second bot username:
            'bot_username' => 'SECOND_BOT_USERNAME',

            # Or you can pass the second bot's token directly:
            'bot_token' => 'SECOND_BOT_TOKEN',

            //...
        ],
    );

    //...
});

//...
```

## 🤝 Middlewares <a name="middlewares"></a>

Middleware is a layer of code that intercepts and processes requests and responses in web applications. It provides a modular and reusable way to handle common tasks such as authentication, logging, error handling, and data validation. Each middleware component inspects and modifies the request and response objects and can either terminate the cycle or pass control to the next middleware. By promoting separation of concerns and modularity, middleware allows for easy customization and maintenance of web applications. It is widely used enhance functionality, security, and maintainability.

In PTB-PHP there are two types of middlewares:

- Global Middlewares
- Local Middlewares

### Global Middlewares <a name="global-middlewares"></a>

These middlewares always executes before handlers automatically

If you remember, we have already seen a simple example of it above.

```php
use function DevDasher\PTB_PHP\Handlers\middleware;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

# Defining a middleware:
middleware(
    callable: function() {
        //...
        //...
        sendMessage(text: 'Global middleware 1');
        //...
        //...
    },
    name: 'GLOBAL_MIDDLEWARE_1', // Optional. The name of this middleware.
);
# You can define another middleware like above here.

onMessageText(pattern: '/start', callable: function() {
    sendMessage(text: 'START');
});
```

#### Defining Multiple Middlewares <a name="defining-multiple-middlewares"></a>

```php
use function DevDasher\PTB_PHP\Handlers\middlewares;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

middlewares(callables: [
    'GLOBAL_MIDDLEWARE_1' => function() { // 1
        //...
        //...
        sendMessage(text: 'Global middleware 1');
        //...
        //...
    },

    'GLOBAL_MIDDLEWARE_2' => function() { // 2
        //...
        //...
        sendMessage(text: 'Global middleware 2');
        //...
        //...
    },
]);

// The previous two middlewares will always run before these handlers:

onMessageText(pattern: '/start', callable: function() {
    sendMessage(text: 'START');
});

onMessageText(pattern: '/help', callable: function() {
    sendMessage(text: 'HELP');
});
```

#### Skipping Global Middlewares <a name="skipping-multiple-middlewares"></a>

You can skip one or more global middlewares from being running for special handlers:

```php
use function DevDasher\PTB_PHP\Handlers\middlewares;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

middlewares(callables: [
    'GLOBAL_MIDDLEWARE_1' => function() { // 1
        sendMessage(text: 'Global middleware 1');
    },

    'GLOBAL_MIDDLEWARE_2' => function() { // 2
        sendMessage(text: 'Global middleware 2');
    },
]);


onMessageText( // The previous two middlewares will always run before this handler.
    pattern: '/start',
    callable: function() {
        sendMessage(text: 'START');
    },
);

onMessageText(
    pattern: '/help',
    callable: function() {
        sendMessage(text: 'HELP');
    },

    # Here, pass the names of global middlewares in array like this:
    skip_global_middlewares: ['GLOBAL_MIDDLEWARE_2'], 
    # The global middleware with the name 'GLOBAL_MIDDLEWARE_2' will NOT execute before this handler
);
```

### Local Middlewares <a name="local-middlewares"></a>

It is possible to define a separate middleware for each handler:

```php
use function DevDasher\PTB_PHP\Handlers\middleware;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

middleware(callable: function() { // 1
    sendMessage(text: 'Global middleware 1');
});

onMessageText(
    pattern: '/start',
    callable: function() {
        sendMessage(text: 'START');
    },

    # Defining local middleware for this handler:
    local_middlewares: [
        function() { // This local middleware will execute only before this handler.
            sendMessage(text: 'Local middleware 1');
        },
    ],
);

onMessageText(
    pattern: '/help',
    callable: function() {
        sendMessage(text: 'HELP');
    },
);
```

### Real World Example <a name="middlewares-real-world-example"></a>

```php
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

use function DevDasher\PTB_PHP\Config\run;
use function DevDasher\PTB_PHP\Config\getGlobalData;
use function DevDasher\PTB_PHP\Config\setGlobalData;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessageId;
use function DevDasher\PTB_PHP\Telegram\Helpers\keyboard;
use function DevDasher\PTB_PHP\Telegram\Helpers\row;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUser;
use function DevDasher\PTB_PHP\Telegram\Methods\answerCallbackQuery;
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Handlers\fallback;
use function DevDasher\PTB_PHP\Handlers\middlewares;
use function DevDasher\PTB_PHP\Handlers\onCallbackQueryData;
use function DevDasher\PTB_PHP\Handlers\onException;
use function DevDasher\PTB_PHP\Handlers\onMessage;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Types\InlineKeyboardButton;
use function DevDasher\PTB_PHP\Telegram\Types\InlineKeyboardMarkup;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

require(__DIR__.'/../vendor/autoload.php');

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',

    cache: new Psr16Cache(new FilesystemAdapter()),
    //...
);

middlewares([
    'CollectUserMiddleware' => function() {
        # Some code here to save user info in the database
        // $user = save_user_info_in_database(/*...*/);
        //...
        //...
        //...

        # Here we assume that we have saved the user information in the previous codes
        #   and here we define only an array of it:
        $user = [
            'id' => 1, // ID in the database
            'user_id' => getUser('id'),
            'first_name' => getUser('first_name'),
            'username' => getUser('username'),
            'is_banned' => false,
            'is_admin' => true,
            //...
        ];
        setGlobalData('user', $user); // A helper, to save some data in global state
        // Means that we can access to this user info with the getGlobalData(...) in all handlers
    },

    'CheckUserStatusMiddleware' => function() {
        $user = getGlobalData('user'); # Get user data from global state
        if (isset($user['is_banned']) && $user['is_banned']) {
            throw new Exception('You are banned from bot!');
        }
    },

    //...
]);

onMessageText(pattern: '/start', callable: function() {
    $user = getGlobalData('user'); 
    sendMessage(text: "Welcome {$user['first_name']}");
});

onMessageText(
    pattern: '/admin',
    callable: function() {
        sendMessage(
            text: "Welcome to the admins panel:",
            reply_markup: InlineKeyboardMarkup(inline_keyboard: keyboard(
                row(InlineKeyboardButton(text: 'Users', callback_data: 'panel/users')),
                row(InlineKeyboardButton(text: 'Stats', callback_data: 'panel/stats')),
            )),
        );
    },
    local_middlewares: [
        function() { // Check if user is admin
            $user = getGlobalData('user'); 
            if (!isset($user['is_admin']) || !$user['is_admin']) {
                throw new Exception('You are not the admin of the bot!');
            }
        }
    ]
);

onCallbackQueryData(pattern: 'panel/users', callable: function() {
    answerCallbackQuery(text: 'Users!', show_alert: true);
});

onCallbackQueryData(pattern: 'panel/stats', callable: function() {
    answerCallbackQuery(text: 'Stats!', show_alert: true);
});

fallback(callable: function() {
    sendMessage(text: 'Unknown command!', reply_to_message_id: getMessageId());
});

onException(callable: function(Throwable $e) {
    sendMessage(text: $e->getMessage());
});

run();
```


## 💬 Conversations <a name="conversations"></a>

The Conversations feature enables seamless interaction between users and the bot by facilitating the retrieval of input values. It allows the bot to engage in dynamic and context-aware conversations with users, capturing their responses and providing personalized and tailored experiences. By utilizing Conversations, developers can effortlessly gather user input, process it, and deliver relevant and meaningful responses, enhancing the overall user experience and enabling more interactive and engaging interactions within the Telegram bot ecosystem.

To use this feature, you need to use Composer and it requires a `Symfony/Cache` adapter, such as `FilesystemAdapter`, `ApcuAdapter`, or others. By default, the library utilizes the `ArrayAdapter`, which is non-persistent and suitable for `LongPolling` mode and testing purposes.

For more information about adapters, check out [available cache adapters](https://symfony.com/doc/current/components/cache.html#available-cache-adapters) in the main documentation.

If you wish to use other adapters like `ApcuAdapter`, `RedisAdapter`, `MemcachedAdapter` or others, you will need to install the necessary tools or extensions. Also these adapters are more suitable for Production.

We can't explain much about it and leave it up to you how to install related tools and extensions.

Here we examine an example:

```php
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

use function DevDasher\PTB_PHP\Telegram\Helpers\getText;
use function DevDasher\PTB_PHP\Config\setConversationNextStep;
use function DevDasher\PTB_PHP\Config\setConversationData;
use function DevDasher\PTB_PHP\Config\endConversation;
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',

    # As mentioned, you need to use Composer and install requried packages for this.
    # Here we use the FilesystemAdapter:
    cache: new Psr16Cache(new FilesystemAdapter()),

    //...
);

# Here we examine a scenario of receiving input from the user in three steps
onMessageText('/register', function() { // FIRST STEP

    # When user send the /register command...
    # We ask the user's name (This is the first step)
    sendMessage(text: 'Send your name:');


    # This helper is to determine the next (second) step.
    # This will be executed later, when the user submits the second input
    setConversationNextStep(next_step: function() { // SECOND STEP

        # This will be the user's answer to the first question that we asked him for his name
        $text = getText();

        // Here you can put a validation for the $text variable to make sure that the user has sent a text to the bot.

        # Store user's name into a varaiable
        $name = $text;

        # With this helper, we store the user's input in the cache (as conversation data)
        setConversationData('name', $name);
        # Note that this value will be passed as a parameter to the function you define for the next steps (third step...)

        # Now, This time we ask the user's age (We are still in the second step)
        sendMessage('Send your age:');

        # Again, since we need to get another value from the user,
        # We define the next step (third step) here:
        setConversationNextStep(
            // Here, we get the name we saved in the cache automatically
            //       in the function parameter. Related to the setConversationData(...) helper.
            next_step: function($name) { // THIRD AND FINAL STEP

                # Storing the text value in a variable:
                $text = getText();

                // Some input validation for the $text variable goes here...

                # If the input value is correct, we store the user's age in another variable
                $age = $text;

                # And we thank the user for his cooperation :)
                sendMessage(text: "Thank you! Your registration was successful!\n\nYour Name: {$name}\nYour Age: {$age}");

                # And with this helper, we end the conversation.
                # Remember to call this function to end the conversation!
                # Otherwise, this step will be executed again with every user request!
                endConversation();
            }
        );
    });
});
```

### Preview of the above code:

![conversation-feature-example-01-preview](https://github.com/devdasher/ptb-php/assets/78247242/dd5b3dc2-5379-429e-a02c-f7bfd6458ffb)


### Another And Better Example:

```php
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

use function DevDasher\PTB_PHP\Telegram\Helpers\getText;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessageId;
use function DevDasher\PTB_PHP\Config\getInputFromUser;
use function DevDasher\PTB_PHP\Config\setConversationData;
use function DevDasher\PTB_PHP\Config\endConversation;
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',

    cache: new Psr16Cache(new FilesystemAdapter()),

    //...
);

onMessageText('/register', function() { // FIRST STEP

    # Alternative to the setConversationNextStep(...)
    getInputFromUser(

        # This text will be send to the user with sendMessage method
        prompt: 'Send your name:',

        # Or you can pass a closure and send a message in your own way:
        // prompt: fn() => sendMessage(
        //     text: 'Send your name:',
        //     reply_to_message_id: getMessageId(),
        // ),

        next_step: function() {  // SECOND STEP
            $text = getText();
            // ...
            // ...
            $name = $text;
            
            setConversationData('name', $name);
        
            getInputFromUser(
                prompt: 'Send your age:',

                next_step: function($name) { // THIRD AND FINAL STEP
                    $text = getText();
                    // ...
                    // ...
                    $age = $text;

                    sendMessage(text: "Thank you! Your registration was successful!\n\nYour Name: {$name}\nYour Age: {$age}");

                    endConversation();
                },
            );

        }
        
    );

});
```

### Important Notice <a name="conversations-important-notice"></a>

In Procedural way the [laravel/serializableclosure](https://github.com/laravel/serializable-closure) package currently has issues with correctly identifying Named Parameters. Due to PHP's lack of support for `Closure Serialization`, we are forced to use on third-party packages.

This issue may cause certain problems for your bot! So, if you wish, wait until further notice (at least until this problem is resolved by the developers of this package or this feature is added by PHP itself in future versions).

If you have a solution for it, please raise it with relevant details in the [Issues](https://github.com/devdasher/ptb-php/issues) section or send your solution to [@devdasher](https://t.me/devdasher) in Telegram.

### OOP Way <a name="conversations-oop-way"></a>

Here, we implement the scenario that we examined in the previous examples in the OOP way:

```php
use function DevDasher\PTB_PHP\Config\setConversationData;
use function DevDasher\PTB_PHP\Telegram\Helpers\getText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Conversation\Conversation;

//...

# Suupose we have this class in our program:
class RegisterConversation extends Conversation {
    /*
        Additional notes:

        - The class name MUST extends the base class 'DevDasher\PTB_PHP\Conversation\Conversation'

        - The library automatically executes each method in the class in each step respectively.

            And after executing the last method in the class (step3), it automatically ends the conversation.

            But pay attention to the fact that the order of the methods in the class is very important.

            With this, you no longer need to call functions like setConversationNextStep(...) and endConversation().
    */

    public function step1() { // FIRST STEP
        sendMessage('Send your name:');
    }

    public function step2() { // SECOND STEP
        $text = getText();
        //...
        //...
        $name = $text;

        setConversationData('name', $name);

        sendMessage('Send your age:');
    }

    # We get the value of $name in the method parameter, that we have stored in the previous step (step 2):
    public function step3($name) { // THIRD AND FINAL STEP
        $text = getText();
        //...
        //...
        $age = $text;

        sendMessage(text: "Thank you! Your registration was successful!\n\nYour Name: {$name}\nYour Age: {$age}");
    }
}

# Here we only pass the class name:
onMessageText('/register', RegisterConversation::class);

# Another way:
// onMessageText('/register', new RegisterConversation);

//...
```

#### Another example:

If you wanna add other methods that are not part of steps to the class, do this:

```php
use function DevDasher\PTB_PHP\Config\setConversationData;
use function DevDasher\PTB_PHP\Telegram\Helpers\getText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Conversation\Conversation;

class RegisterConversation extends Conversation {

    # Override this property like this:
    protected array $steps = ['step1', 'step2', 'step3']; // Specify steps here.


    public function step1() { // FIRST STEP
        //...
    }

    public function step2() { // SECOND STEP
        //...
    }

    public function step3() { // THIRD STEP
        //...
    }


    # These class methods will not be executed as conversation step:

    public function getSomethingFromSomewhere1() { // A method associated with this class
        //...
    }

    public function getSomethingFromSomewhere2() { // Aother method associated with this class
        //...
    }

    //...
}

```

## 🎮 Keyboards <a name="keyboards"></a>

The PTB-PHP library provides a simple way to build and send keyboards.

### ReplyKeyboardMarkup <a name="reply-keyboard-markup"></a>

The `ReplyKeyboardMarkup(...)` function helps you to create a reply keyabord. Here is an example:

```php
use function DevDasher\PTB_PHP\Telegram\Helpers\keyboard;
use function DevDasher\PTB_PHP\Telegram\Helpers\row;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;
use function DevDasher\PTB_PHP\Telegram\Types\ReplyKeyboardMarkup;
use function DevDasher\PTB_PHP\Telegram\Types\KeyboardButton;

onMessageText(pattern: '/start', callable: function() {
    sendMessage(
        text: 'START Message',
        reply_markup: ReplyKeyboardMarkup(
            keyboard: keyboard(
                row(KeyboardButton(text: 'Say Hi!'), KeyboardButton(text: 'Say Bye!')),
            ),
            is_persistent: true,
            resize_keyboard: true,
            //...
        )
    );
});

onMessageText(pattern: 'Say Hi!', callable: fn() => sendMessage('Hi!'));

onMessageText(pattern: 'Say Bye!', callable: fn() => sendMessage('Bye!'));
```

### ReplyKeyboardRemove <a name="reply-keyboard-remove"></a>

Use `ReplyKeyboardRemove(...)` to remove an existing `ReplyMarkupKeyboard`:

```php
use function DevDasher\PTB_PHP\Telegram\Helpers\keyboard;
use function DevDasher\PTB_PHP\Telegram\Helpers\row;
use function DevDasher\PTB_PHP\Telegram\Types\ReplyKeyboardMarkup;
use function DevDasher\PTB_PHP\Telegram\Types\KeyboardButton;
use function DevDasher\PTB_PHP\Telegram\Types\ReplyKeyboardRemove;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

onMessageText('/keyboard', function() {
    sendMessage(
        text: 'START',
        reply_markup: ReplyKeyboardMarkup(
            keyboard: keyboard(
                row(KeyboardButton(text: 'Button 1'), KeyboardButton(text: 'Button 2')),
            ),
            resize_keyboard: true,
        ),
    );
});

onMessageText('/remove_keyboard', function() {
    sendMessage(
        text: 'Keyboard Removed!',
        reply_markup: ReplyKeyboardRemove(/* ... */),
    );
});
```

#### Preview of the above code:

https://github.com/devdasher/ptb-php/assets/78247242/efca3898-4c71-409a-a216-9500ef5be7f6


### InlineKeyboardMarkup <a name="inline-keyboard-markup"></a>

The `InlineKeyboardMarkup(...)` function helps you to create a inline keyabord. Here is an example:

```php
use function DevDasher\PTB_PHP\Telegram\Helpers\keyboard;
use function DevDasher\PTB_PHP\Telegram\Helpers\row;
use function DevDasher\PTB_PHP\Telegram\Methods\answerCallbackQuery;
use function DevDasher\PTB_PHP\Telegram\Types\InlineKeyboardButton;
use function DevDasher\PTB_PHP\Telegram\Types\InlineKeyboardMarkup;
use function DevDasher\PTB_PHP\Handlers\onCallbackQueryData;
use function DevDasher\PTB_PHP\Handlers\onMessageText;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

onMessageText(pattern: '/account', callable: function() {
    sendMessage(
        text: "Account Details\n\n...",
        reply_markup: InlineKeyboardMarkup(
            inline_keyboard: keyboard(
                row(
                    InlineKeyboardButton(text: 'Suspend', callback_data: 'account/suspend'),
                    InlineKeyboardButton(text: 'Delete', callback_data: 'account/delete')
                ),
            ),
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

### ForceReply <a name="force-reply"></a>

```php
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;
use function DevDasher\PTB_PHP\Telegram\Types\ForceReply;

//...
    sendMessage(
        text: 'Send your picture:',

        # We force the user to reply on the bot's message
        #   It is only related to the UI and it is an apparent compulsion
        reply_markup: ForceReply(input_field_placeholder: 'Send A Photo'),
    ),
//...
```

## 🧩 Handlers <a name="handlers"></a>

Handlers are essential components in building interactive and dynamic conversational experiences. They enable the customization of logic and actions based on specific triggers or conditions. For instance, handlers can be triggered by user messages, chat joins, button clicks, or any other desired action for the bot to respond appropriately. Key aspects of handlers include event binding, where they are associated with specific events; logic and actions, which define what happens when the event occurs; event types, allowing handlers to cater to different event categories; registration, ensuring appropriate handler invocation upon event occurrence; and customization, enabling the bot to respond differently based on various situations. Leveraging handlers effectively facilitates the creation of chatbots capable of interactive and adaptable user interactions, while offering a maintainable and extensible code structure.

Here is a list of all available handlers in the library on namespace `DevDasher\PTB_PHP\Handlers`:

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
| `onMessageNewChatPhoto(...)`                  | Handles `new_chatgetPhoto` on `message` update type
| `onMessageDeleteChatPhoto(...)`               | Handles `delete_chatgetPhoto` on `message` update type
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
| `onChannelPostNewChatTitle(...)`                    | Handles `new_chat_title` on `channel_post` update type
| `onChannelPostNewChatPhoto(...)`                    | Handles `new_chatgetPhoto` on `channel_post` update type
| `onChannelPostDeleteChatPhoto(...)`                 | Handles `delete_chatgetPhoto` on `channel_post` update type
| `onChannelPostMessageAutoDeleteTimerChanged(...)`   | Handles `message_auto_delete_timer_changed` on `channel_post` update type
| `onChannelPostPinnedMessage(...)`                   | Handles `pinned_message` on `channel_post` update type
| `onChannelPostVideoChatScheduled(...)`              | Handles `video_chat_scheduled` on `channel_post` update type
| `onChannelPostVideoChatStarted(...)`                | Handles `video_chat_started` on `channel_post` update type
| `onChannelPostVideoChatEnded(...)`                  | Handles `video_chat_ended` on `channel_post` update type
| `onChannelPostVideoChatParticipantsInvited(...)`    | Handles `video_chat_participants_invited` on `channel_post` update type
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

Here is a list of all available helpers in the library on namespace `DevDasher\PTB_PHP\Telegram\Helpers`:

✍️ **Note:** In the table below, in the `Description` column, the term `ANY` (with capital letters) refers to one of update types, like `message`, `edited_message`, `channel_post`, `edited_channel_post` and in some cases `callback_query`. etc.

| Helper                                                 | Description                                                                                                                                                       | Return Type
|-------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------
| `getUpdate(?string $keys = null)`                       | Returns the update as an array                                                                                                                                    | `array` for itself, `mixed` for subkeys
| `getUpdateId()`                                         | Returns the `update_id`                                                                                                                                           | `?int`
| `getUpdateType()`                                       | Returns the current update type                                                                                                                                   | `?string`
| `getUpdateTypes(array $exclude = [])`                   | Returns all available update types                                                                                                                                | `array` of strings
| `getMessage(?string $keys = null)`                      | Returns `ANY` if available, `null` otherwise.                                                                                                                     | `array` for itself, `mixed` for subkeys
| `getMessageId()`                                        | Returns `ANY->message_id` if available, `null` otherwise.                                                                                                         | `?int`
| `getMessageType()`                                      | Returns the current message type if available, `null` otherwise.                                                                                                  | `?string`
| `getMessageTypes(array $exclude = [])`                  | Returns all available message types                                                                                                                               | `array` of strings
| `getMediaGroupId()`                                     | Returns `ANY->media_group_id` if available, `null` otherwise                                                                                                      | `?int`
| `getReplyToMessage(?string $keys = null)`               | Returns `ANY->reply_to_message` if available, `null` otherwise.                                                                                                   | `array` for itself, `mixed` for subkeys
| `getCallbackQuery(?string $keys = null)`                | Returns `callback_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `getCallbackQueryId()`                                  | Returns `callback_query->id` if available, `null` otherwise.                                                                                                      | `?int`
| `getCallbackQueryData()`                                | Returns `callback_query->data` if available, `null` otherwise.                                                                                                    | `?string`
| `getInlineQuery(?string $keys = null)`                  | Returns `inline_query` if available, `null` otherwise.                                                                                                            | `array` for itself, `mixed` for subkeys
| `getInlineQueryId()`                                    | Returns `inline_query->id` if available, `null` otherwise.                                                                                                        | `?int`
| `getInlineQueryText()`                                  | Returns `inline_query->query` if available, `null` otherwise.                                                                                                     | `?string`
| `getShippingQuery(?string $keys = null)`                | Returns `shipping_query` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `getChosenInlineResult(?string $keys = null)`           | Returns `chosen_inline_result` if available, `null` otherwise.                                                                                                    | `array` for itself, `mixed` for subkeys
| `getChosenInlineResultId()`                             | Returns `chosen_inline_result->result_id` if available, `null` otherwise.                                                                                         | `?string`
| `getChosenInlineResultQuery()`                          | Returns `chosen_inline_result->query` if available, `null` otherwise.                                                                                             | `?string`
| `getChosenInlineResultInlineMessageId()`                | Returns `chosen_inline_result->inline_message_id` if available, `null` otherwise.                                                                                 | `?string`
| `getPreCheckoutQuery(?string $keys = null)`             | Returns `pre_checkout_query` if available, `null` otherwise.                                                                                                      | `array` for itself, `mixed` for subkeys
| `getReplyMarkup(?string $keys = null)`                  | Returns `ANY->reply_markup` if available, `null` otherwise                                                                                                        | `array` for itself, `mixed` for subkeys
| `getText()`                                             | Returns `ANY->text` if available, `null` otherwise                                                                                                                | `?string`
| `getPhoto(?string $keys = null)`                        | Returns the last item (and high quality) of `ANY->photo` if available, `null` otherwise                                                                           | `array` for itself, `mixed` for subkeys
| `getPhotos()`                                           | Returns `ANY->photo` if available, `null` otherwise                                                                                                               | `?array`
| `getDocument(?string $keys = null)`                     | Returns `ANY->document` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `getSticker(?string $keys = null)`                      | Returns `ANY->sticker` if available, `null` otherwise                                                                                                             | `array` for itself, `mixed` for subkeys
| `getVideo(?string $keys = null)`                        | Returns `ANY->video` if available, `null` otherwise                                                                                                               | `array` for itself, `mixed` for subkeys
| `getVideoNote(?string $keys = null)`                    | Returns `ANY->video_note` if available, `null` otherwise                                                                                                          | `array` for itself, `mixed` for subkeys
| `getVoice(?string $keys = null)`                        | Returns `ANY->voice` if available, `null` otherwise                                                                                                               | `array` for itself, `mixed` for subkeys
| `getAudio(?string $keys = null)`                        | Returns `ANY->audio` if available, `null` otherwise                                                                                                               | `array` for itself, `mixed` for subkeys
| `getDice(?string $keys = null)`                         | Returns `ANY->dice` if available, `null` otherwise                                                                                                                | `array` for itself, `mixed` for subkeys
| `getGame(?string $keys = null)`                         | Returns `ANY->game` if available, `null` otherwise                                                                                                                | `array` for itself, `mixed` for subkeys
| `getGamePhoto(?string $keys = null)`                    | Returns the last item (and high quality) of `ANY->game->photo` if available, `null` otherwise                                                                     | `array` for itself, `mixed` for subkeys
| `getGamePhotos()`                                       | Returns `ANY->game->photo` if available, `null` otherwise                                                                                                         | `?array`
| `getVenue(?string $keys = null)`                        | Returns `ANY->venue` if available, `null` otherwise                                                                                                               | `array` for itself, `mixed` for subkeys
| `getLocation(?string $keys = null)`                     | Returns `ANY->location` if available, `null` otherwise                                                                                                            | `array` for itself, `mixed` for subkeys
| `getAnimation(?string $keys = null)`                    | Returns `ANY->animation` if available, `null` otherwise                                                                                                           | `array` for itself, `mixed` for subkeys
| `getCaption()`                                          | Returns `ANY->caption` if available, `null` otherwise                                                                                                             | `?string`
| `getEntities()`                                         | Returns `ANY->entities` OR `ANY->caption_entities` if available, `null` otherwise                                                                                 | `?array`
| `getPoll(?string $keys = null)`                         | Returns `poll` OR `ANY->poll` if available, `null` otherwise                                                                                                      | `array` for itself, `mixed` for subkeys
| `getPollOptions()`                                      | Returns `poll->options` if available, `null` otherwise                                                                                                            | `?array`
| `getPollAnswer(?string $keys = null)`                   | Returns `poll_answer` if available, `null` otherwise                                                                                                              | `array` for itself, `mixed` for subkeys
| `getViaBot(?string $keys = null)`                       | Returns `ANY->via_bot` if available, `null` otherwise                                                                                                             | `array` for itself, `mixed` for subkeys
| `getFrom(?string $keys = null)`                         | Returns `ANY->from` if available, `null` otherwise                                                                                                                | `array` for itself, `mixed` for subkeys
| `getUser(?string $keys = null)`                         | Returns the current `user` if available, `null` otherwise, alternative to `_from(...)`                                                                            | `array` for itself, `mixed` for subkeys
| `getUserId()`                                           | Returns the current user id (`ANY->from->id`) if available, `null` otherwise                                                                                      | `?int`
| `getChat(?string $keys = null)`                         | Returns the current `chat` if available, `null` otherwise                                                                                                         | `array` for itself, `mixed` for subkeys
| `getChatId()`                                           | Returns `chat->id` if available, `null` otherwise                                                                                                                 | `?int`
| `getChatType()`                                         | Returns the current `chat->type` if available, `null` otherwise                                                                                                   | `?string`
| `getChatTypes(array $exclude = [])`                     | Returns all available chat types                                                                                                                                  | `array` of strings
| `getChatActions(array $exclude = [])`                   | Returns all available chat actions                                                                                                                                | `array` of strings
| `getChatMember(?string $keys = null)`                   | Returns `chat_member` if available, `null` otherwise.                                                                                                             | `array` for itself, `mixed` for subkeys
| `getChatMemberStatuses(array $exclude = [])`            | Returns all available chat member statuses                                                                                                                        | `array` of strings
| `getMyChatMember(?string $keys = null)`                 | Returns `my_chat_member` if available, `null` otherwise.                                                                                                          | `array` for itself, `mixed` for subkeys
| `getFormattingOptions(array $exclude = [])`             | Returns all available formatting options                                                                                                                          | `array` of strings
| `getFileTypes(array $exclude = [])`                     | Returns all available message types that are files                                                                                                                | `array` of strings
| `getForwardFrom(?string $keys = null)`                  | Returns `ANY->forward_from` if available, `null` otherwise                                                                                                        | `array` for itself, `mixed` for subkeys
| `getForwardFromChat(?string $keys = null)`              | Returns `ANY->forward_from_chat` if available, `null` otherwise                                                                                                   | `array` for itself, `mixed` for subkeys
| `getForwardDate()`                                      | Returns `ANY->forward_date` if available, `null` otherwise                                                                                                        | `?int`
| `getForwardFromMessageId()`                             | Returns `ANY->forward_from_message_id` if available, `null` otherwise                                                                                             | `?int`
| `getSenderChat(?string $keys = null)`                   | Returns `ANY->sender_chat` if available, `null` otherwise                                                                                                         | `?array` for itself, `mixed` for subkeys
| `getAuthorSignature()`                                  | Returns `ANY->author_signature` if available, `null` otherwise                                                                                                    | `?string`
| `getDate()`                                             | Returns `ANY->date` if available, `null` otherwise                                                                                                                | `?int`
| `getEditDate()`                                         | Returns `ANY->edit_date` if available, `null` otherwise                                                                                                           | `?int`
| `getChatTitle()`                                        | Returns `chat->title`  if available, `null` otherwise                                                                                                             | `?string`
| `getPollQuestion()`                                     | Returns `poll->question` if available, `null` otherwise                                                                                                           | `?string`
| `getPollType()`                                         | Returns `poll->type` if available, `null` otherwise                                                                                                               | `?string`
| `getPollId()`                                           | Returns `poll->id` if available, `null` otherwise                                                                                                                 | `?string`
| `getAnimationFileName()`                                | Returns `animation->file_name` if available, `null` otherwise                                                                                                     | `?string`
| `getAnimationMimeType()`                                | Returns `animation->mime_type` if available, `null` otherwise                                                                                                     | `?string`
| `getAnimationDuration()`                                | Returns `animation->duration` if available, `null` otherwise                                                                                                      | `?int`
| `getAnimationWidth()`                                   | Returns `animation->width` if available, `null` otherwise                                                                                                         | `?int`
| `getAnimationHeight()`                                  | Returns `animation->height` if available, `null` otherwise                                                                                                        | `?int`
| `getAnimationThumb(?string $keys = null)`               | Returns `animation->thumb` if available, `null` otherwise                                                                                                         | `?array` for itself, `mixed` for subkeys
| `getGameTitle()`                                        | Returns `ANY->game->title` if available, `null` otherwise                                                                                                         | `?string`
| `getGameDescription()`                                  | Returns `ANY->game->description` if available, `null` otherwise                                                                                                   | `?string`
| `getForumTopicCreated(?string $keys = null)`            | Returns `message->forum_topic_created` if available, `null` otherwise                                                                                             | `?array` for itself, `mixed` for subkeys
| `getForumTopicEdited(?string $keys = null)`             | Returns `message->forum_topic_edited` if available, `null` otherwise                                                                                              | `?array` for itself, `mixed` for subkeys
| `getForumTopicClosed(?string $keys = null)`             | Returns `message->forum_topic_closed` if available, `null` otherwise                                                                                              | `?array` for itself, `mixed` for subkeys
| `getForumTopicReopened(?string $keys = null)`           | Returns `message->forum_topic_reopened` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed` for subkeys
| `getMessageThreadId()`                                  | Returns `message->message_thread_id` if available, `null` otherwise                                                                                               | `?int`
| `getUserFirstName()`                                    | Returns `ANY->from->first_name` if available, `null` otherwise                                                                                                    | `?string`
| `getUserUsername()`                                     | Returns `ANY->from->username` if available, `null` otherwise                                                                                                      | `?string`
| `getChatShared(?string $keys = null)`                   | Returns `message->chat_shared` if available, `null` otherwise                                                                                                     | `?array` for itself, `mixed for subkeys`
| `getUserShared(?string $keys = null)`                   | Returns `message->user_shared` if available, `null` otherwise                                                                                                     | `?array` for itself, `mixed for subkeys`
| `getConnectedWebsite()`                                 | Returns `message->connected_website` if available, `null` otherwise                                                                                               | `?string`
| `getWriteAccessAllowed(?string $keys = null)`           | Returns `message->write_access_allowed` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed for subkeys`
| `getPassportData(?string $keys = null)`                 | Returns `message->passport_data` if available, `null` otherwise                                                                                                   | `?array` for itself, `mixed for subkeys`
| `getProximityAlertTriggered(?string $keys = null)`      | Returns `message->proximity_alert_trigerred` if available, `null` otherwise                                                                                       | `?array` for itself, `mixed for subkeys`
| `getGeneralForumTopicHidden(?string $keys = null)`      | Returns `message->general_forum_hidden` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed for subkeys`
| `getGeneralForumTopicUnhidden(?string $keys = null)`    | Returns `message->general_forum_unhidden` if available, `null` otherwise                                                                                          | `?array` for itself, `mixed for subkeys`
| `getVideoChatScheduled(?string $keys = null)`           | Returns `message->video_chat_scheduled` if available, `null` otherwise                                                                                            | `?array` for itself, `mixed for subkeys`
| `getVideoChatStarted(?string $keys = null)`             | Returns `message->video_chat_started` if available, `null` otherwise                                                                                              | `?array` for itself, `mixed for subkeys`
| `getVideoChatEnded(?string $keys = null)`               | Returns `message->video_chat_ended` if available, `null` otherwise                                                                                                | `?array` for itself, `mixed for subkeys`
| `getVideoChatParticipantsInvited(?string $keys = null)` | Returns `message->video_chat_participants_invited` if available, `null` otherwise                                                                                 | `?array` for itself, `mixed for subkeys`
| `getWebAppData(?string $keys = null)`                   | Returns `message->web_app_data` if available, `null` otherwise                                                                                                    | `?array` for itself, `mixed for subkeys`
| `getReplyMarkupInlineKeyboard()`                        | Returns `ANY->reply_markup->inline_keyboard` if available, `null` otherwise                                                                                       | `?array`
| `isMessage()`                                        | Returns `true` if the current update type was `message`, `false` otherwise                                                                                        | `bool`
| `isCallbackQuery()`                                  | Returns `true` if the current update type was `callback_query`, `false` otherwise                                                                                 | `bool`
| `isEditedMessage()`                                  | Returns `true` if the current update type was `edited_message`, `false` otherwise                                                                                 | `bool`
| `isChannelPost()`                                    | Returns `true` if the current update type was `channel_post`, `false` otherwise                                                                                   | `bool`
| `isEditedChannelPost()`                              | Returns `true` if the current update type was `edited_channel_post`, `false` otherwise                                                                            | `bool`
| `isShippingQuery()`                                  | Returns `true` if the current update type was `shipping_query`, `false` otherwise                                                                                 | `bool`
| `isChatJoinRequest()`                                | Returns `true` if the current update type was `chat_join_request`, `false` otherwise                                                                              | `bool`
| `isInlineQuery()`                                    | Returns `true` if the current update type was `inline_query`, `false` otherwise                                                                                   | `bool`
| `isMyChatMember()`                                   | Returns `true` if the current update type was `my_chat_member`, `false` otherwise                                                                                 | `bool`
| `isChatMember()`                                     | Returns `true` if the current update type was `chat_member`, `false` otherwise                                                                                    | `bool`
| `isChosenInlineResult()`                             | Returns `true` if the current update type was `chosen_inline_result`, `false` otherwise                                                                           | `bool`
| `isPollAnswer()`                                     | Returns `true` if the current update type was `poll_answer`, `false` otherwise                                                                                    | `bool`
| `isPoll()`                                           | Returns `true` if the current update type OR message type was `poll`, `false` otherwise                                                                           | `bool`
| `isPhoto()`                                          | Returns `true` if the current message type was `photo`, `false` otherwise                                                                                         | `bool`
| `isSticker()`                                        | Returns `true` if the current message type was `sticker`, `false` otherwise                                                                                       | `bool`
| `isAnimation()`                                      | Returns `true` if the current message type was `animation`, `false` otherwise                                                                                     | `bool`
| `isVideo()`                                          | Returns `true` if the current message type was `video`, `false` otherwise                                                                                         | `bool`
| `isVideoNote()`                                      | Returns `true` if the current message type was `video_note`, `false` otherwise                                                                                    | `bool`
| `isDice()`                                           | Returns `true` if the current message type was `dice`, `false` otherwise                                                                                          | `bool`
| `isGame()`                                           | Returns `true` if the current message type was `game`, `false` otherwise                                                                                          | `bool`
| `isVenue()`                                          | Returns `true` if the current message type was `venue`, `false` otherwise                                                                                         | `bool`
| `isVoice()`                                          | Returns `true` if the current message type was `voice`, `false` otherwise                                                                                         | `bool`
| `isDocument()`                                       | Returns `true` if the current message type was `document`, `false` otherwise                                                                                      | `bool`
| `isLocation()`                                       | Returns `true` if the current message type was `location`, `false` otherwise                                                                                      | `bool`
| `isContact()`                                        | Returns `true` if the current message type was `contact`, `false` otherwise                                                                                       | `bool`
| `isAudio()`                                          | Returns `true` if the current message type was `audio`, `false` otherwise                                                                                         | `bool`
| `isText()`                                           | Returns `true` if the current message type was `text`, `false` otherwise                                                                                          | `bool`
| `isNewChatMembers()`                                 | Returns `true` if the current message type was `new_chat_members`, `false` otherwise                                                                              | `bool`
| `isLeftChatMember()`                                 | Returns `true` if the current message type was `left_chat_member`, `false` otherwise                                                                              | `bool`
| `isNewChatTitle()`                                   | Returns `true` if the current message type was `new_chat_title`, `false` otherwise                                                                                | `bool`
| `isNewChatPhoto()`                                   | Returns `true` if the current message type was `new_chatgetPhoto`, `false` otherwise                                                                                | `bool`
| `isDeleteChatPhoto()`                                | Returns `true` if the current message type was `delete_chatgetPhoto`, `false` otherwise                                                                             | `bool`
| `isGroupChatCreated()`                               | Returns `true` if the current message type was `group_chat_created`, `false` otherwise                                                                            | `bool`
| `isSupergroupChatCreated()`                          | Returns `true` if the current message type was `supergroup_chat_created`, `false` otherwise                                                                       | `bool`
| `isChannelChatCreated()`                             | Returns `true` if the current message type was `channel_chat_created`, `false` otherwise                                                                          | `bool`
| `isAutoDeleteTimerChanged()`                         | Returns `true` if the current message type was `message_auto_delete_timer_changed`, `false` otherwise                                                             | `bool`
| `isMigrateToChatId()`                                | Returns `true` if the current message type was `migrate_to_chat_id`, `false` otherwise                                                                            | `bool`
| `isMigrateFromChatId()`                              | Returns `true` if the current message type was `migrate_from_chat_id`, `false` otherwise                                                                          | `bool`
| `isPinnedMessage()`                                  | Returns `true` if the current message type was `pinned_message`, `false` otherwise                                                                                | `bool`
| `isInvoice()`                                        | Returns `true` if the current message type was `invoice`, `false` otherwise                                                                                       | `bool`
| `isSuccessfulPayment()`                              | Returns `true` if the current message type was `successful_payment`, `false` otherwise                                                                            | `bool`
| `isUserShared()`                                     | Returns `true` if the current message type was `user_shared`, `false` otherwise                                                                                   | `bool`
| `isChatShared()`                                     | Returns `true` if the current message type was `chat_shared`, `false` otherwise                                                                                   | `bool`
| `isConnectedWebsite()`                               | Returns `true` if the current message type was `connected_website`, `false` otherwise                                                                             | `bool`
| `isWriteAccessAllowed()`                             | Returns `true` if the current message type was `write_access_allowed`, `false` otherwise                                                                          | `bool`
| `isPassportData()`                                   | Returns `true` if the current message type was `passport_data`, `false` otherwise                                                                                 | `bool`
| `isProximityAlertTriggered()`                        | Returns `true` if the current message type was `proximity_alert_triggered`, `false` otherwise                                                                     | `bool`
| `isForumTopicCreated()`                              | Returns `true` if the current message type was `forum_topic_created`, `false` otherwise                                                                           | `bool`
| `isForumTopicEdited()`                               | Returns `true` if the current message type was `forum_topoic_edited`, `false` otherwise                                                                           | `bool`
| `isForumTopicClosed()`                               | Returns `true` if the current message type was `forum_topic_closed`, `false` otherwise                                                                            | `bool`
| `isForumTopicReopened()`                             | Returns `true` if the current message type was `forum_topoic_reopened`, `false` otherwise                                                                         | `bool`
| `isGeneralForumTopicHidden()`                        | Returns `true` if the current message type was `general_forum_topic_hidden`, `false` otherwise                                                                    | `bool`
| `isGeneralForumTopicUnhidden()`                      | Returns `true` if the current message type was `general_forum_topic_unhidden`, `false` otherwise                                                                  | `bool`
| `isVideoChatScheduled()`                             | Returns `true` if the current message type was `video_chat_scheduled`, `false` otherwise                                                                          | `bool`
| `isVideoChatStarted()`                               | Returns `true` if the current message type was `video_chat_started`, `false` otherwise                                                                            | `bool`
| `isVideoChatEnded()`                                 | Returns `true` if the current message type was `video_chat_ended`, `false` otherwise                                                                              | `bool`
| `isVideoChatParticipantsInvited()`                   | Returns `true` if the current message type was `video_chat_participants_invited`, `false` otherwise                                                               | `bool`
| `isWebAppData()`                                     | Returns `true` if the current message type was `web_app_data`, `false` otherwise                                                                                  | `bool`
| `isPollAnonymous()`                                  | Returns `true` if the `poll->is_anonymous` was true, `false` otherwise                                                                                            | `bool`
| `isPollClosed()`                                     | Returns `true` if the `poll->is_closed` was true, `false` otherwise                                                                                               | `bool`
| `isTopicMessage()`                                   | Returns `true` if `message->is_topic_message` was true, `false` otherwise                                                                                         | `bool`
| `isSender()`                                         | Returns `true` if the current chat type was `sender`                                                                                                              | `bool`
| `isGroup()`                                          | Returns `true` if the current chat type was `gorup`                                                                                                               | `bool`
| `isSupergroup()`                                     | Returns `true` if the current chat type was `supergroup`                                                                                                          | `bool`
| `isPrivate()`                                        | Returns `true` if the current chat type was `private`                                                                                                             | `bool`
| `isChannel()`                                        | Returns `true` if the current chat type was `channel`                                                                                                             | `bool`
| `isForwarded()`                                      | Returns `true` if a message was forwarded                                                                                                                         | `bool`
| `isBot()`                                            | Returns `true` if the `from->is_bot` was true, `false` otherwise                                                                                                  | `bool`
| `isForum()`                                          | Returns `true` if the `chat->is_forum` was true, `false` otherwise                                                                                                | `bool`

### How to use Helpers in action? <a name="how-to-use-helpers"></a>

Here is an example:

```php
use function DevDasher\PTB_PHP\Telegram\Helpers\getUpdate;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUpdateId;
use function DevDasher\PTB_PHP\Telegram\Helpers\getMessage;
use function DevDasher\PTB_PHP\Telegram\Helpers\getFrom;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUser;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUserId;
use function DevDasher\PTB_PHP\Telegram\Helpers\isPhoto;
use function DevDasher\PTB_PHP\Telegram\Helpers\getPhotos;
use function DevDasher\PTB_PHP\Telegram\Helpers\getPhoto;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;
use function DevDasher\PTB_PHP\Handlers\onMessage;

onMessage(function() {

    # Get the update:
    $update = getUpdate(); // Array


    # Get the update_id in different ways:
    $updateId = getUpdateId();
    $updateId = getUpdate('update_id'); // Another way
    $updateId = $update['update_id'];


    # Get the message in different ways:
    $message = $update['message'];
    $message = getUpdate('message'); // Another way
    $message = getMessage();


    # Get current user info in different ways:
    $from = _from();
    //...
    $user = getUser(); // Alternative to _from();

    $userId = $update['message']['from']['id'];
    $userId = getUpdate('message.from.id');
    $userId = $message['from']['id'];
    $userId = getMessage('from.id');
    $userId = $user['id'];
    $userId = getUserId();
    $userId = getUser('id');
    //...

    # SEE THE AVAILABLE HELPERS AND TEST OTHES THINGS YOURSELF #

    if (isPhoto()) {
        # Get the photos in different ways:
        $photos = getUpdate('message.photo');
        $photos = getMessage('photo');
        $photos = getPhotos();

        $photo = end($photos); // Get the last photo that has high quality
        $photo = getPhoto(); // Another and better way

        $photoFileId = $photo['file_id'];
        $photoFileId = getPhoto('file_id');
        //...

        return sendMessage('You sent a photo!');
    }
    //....
});
```


## 💎 Available Methods <a name="available-methods"></a>

All Telegram Bot API [Available methods](https://core.telegram.org/bots/api#available-methods) are available in the library.

- `getMe()`
- `logOut()`
- `close()`
- `sendMessage(...)`
- `forwardMessage(...)`
- `sendPhoto(...)`
- ...

## 🔮 Available Types <a name="available-types"></a>

All Telegram Bot API [Available types](https://core.telegram.org/bots/api#available-types) are available in the library.

- `Update(...)`
- `WebhookInfo(...)`
- `User(...)`
- `Chat(...)`
- `Message(...)`
- ...

## ⚓️ Available Constants <a name="available-constants"></a>

A lot of useful constants are available in the library for fast development and convenience of most developers.

Here are some of them:
- **Types Fields**: `FIELD_*` for example: `FIELDgetUpdate_ID`, `FIELD_TITLE`, etc
- **Method Names**: `METHOD_*` for example: `METHOD_SEND_ANY`, `METHOD_DELETE_ANY`, etc
- **Methods Parameters**: `PARAM_*` for example: `PARAM_CHAT_ID`, `PARAM_TEXT`, etc
- **Update Types**: `UPDATE_TYPE_*` for example: `UPDATE_TYPE_ANY`, `UPDATE_TYPE_EDITED_ANY`, etc
- **Message Types**: `ANY_TYPE_*` for example: `ANY_TYPE_TEXT`, `ANY_TYPE_VIDEO`, etc
- **Message Entities**: `ANY_ENTITIE_*` for example: `ANY_ENTITIE_MENTION`, `ANY_ENTITIE_HASHTAG`, etc
- **Bot Cmmand Scopes**: `BOT_COMMAND_SCOPE_*` for example: `BOT_COMMAND_SCOPE_DEFAULT`, `BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS`, etc
- **Chat Member Statuses**: `CHAT_MEMBER_STATUS_*` for example: `CHAT_MEMBER_STATUS_AMINISTRATOR`, `CHAT_MEMBER_STATUS_CREATOR`, etc
- **Chat Types**: `CHAT_TYPE_*` for example: `CHAT_TYPE_PRIVATE`, `CHAT_TYPE_CHANNEL`, etc
- **Chat Actions**: `CHAT_ACTION_*` for example: `CHAT_ACTION_TYPING`, `CHAT_ACTION_UPLOAD_PHOTO`, etc
- **Chat Permissions**: `CHAT_PERMISSION_CAN_*` for example: `CHAT_PERMISSION_CAN_SEND_ANYS`, `CHAT_PERMISSION_CAN_SEND_AUDIOS`, etc
- **Chat Administrator Rights**: `CHAT_ADMINISTRATOR_RIGHT_*` for example: `CHAT_ADMINISTRATOR_RIGHT_IS_ANONYMOUS`, `CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_CHAT`, etc
- **Colors**: `COLOR_RGB_*` | `COLOR_RGB_*_HEX` for example: `COLOR_RGB_BLUE` | `COLOR_RGB_BLUE_HEX`, `COLOR_RGB_YELLOW` | `COLOR_RGB_YELLOW_HEX`, etc
- **Dice Emojis**: `DICE_EMOJI_*` for example: `DICE_EMOJI_DICE`, `DICE_EMOJI_DART`, etc
- **Google Place Types**: `GOOGLE_PLACE_TYPE_*` for example: `GOOGLE_PLACE_TYPE_ACCOUNTING`, `GOOGLE_PLACE_TYPE_AIRPORT`, etc
- **Menu Button Types**: `MENU_BUTTON_TYPE_*` for example: `MENU_BUTTON_TYPE_DEFAULT`, `MENU_BUTTON_TYPE_WEB_APP`, etc
- **Poll Types**: `POLL_TYPE_*` for example: `POLL_TYPE_REGULAR`, etc
- **Switch Inline Query Chosen Chats**: `SWITCH_INLINE_QUERY_CHOSEN_CHAT_*` for example: `SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_USER_CHATS`, `SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_BOT_CHATS`, etc
- **Sticker Formats**: `STICKER_FORMAT_*` for example: `STICKER_FORMAT_STATIC`, `STICKER_FORMAT_ANIMATED`, etc
- **Sticker Mask Position Points**: `STICKER_MASK_POSITION_POINT_*` for example: `STICKER_MASK_POSITION_POINT_FOREHEAD`, `STICKER_MASK_POSITION_POINT_MOUTH`, etc
- **Sticker Types**: `STICKER_TYPE_*` for example: `STICKER_TYPE_REGULAR`, `STICKER_TYPE_MASK`, etc
- **Parse Modes**: `PARSE_MODE_*` for example: `PARSE_MODE_HTML`, `PARSE_MODE_MARKDOWN`, etc
- **Passport Element Types**: `PASSPORT_ELEMENT_TYPE_*` for example: `PASSPORT_ELEMENT_TYPE_PASSPORT`, `PASSPORT_ELEMENT_TYPE_DRIVER_LICENSE`, etc
- **Passport Element Errors**: `PASSPORT_ELEMENT_ERROR_*` for example: `PASSPORT_ELEMENT_ERROR_DATA_FIELD`, `PASSPORT_ELEMENT_ERROR_FRONT_SIDE`, etc
- Input Media Types: `INPUT_MEDIA_TYPE_*` for example: `INPUT_MEDIA_TYPE_ANIMATION`, `INPUT_MEDIA_TYPE_DOCUMENT`, etc

And much more! ... check the source code yourself :)

## ♟ Usage Without Handlers <a name="usage-without-handlers"></a>

If you are not comfortable with existing handlers and this type of coding, there is no problem. You can choose your own code style.

You just need to pass your bot token and username to the `configurePTB(...)` function and continue the rest of the code as you like.

Here is an example:

### Webhook implementation: <a name="without-handlers-webhook-implementation"></a>

```php
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

$input = file_get_contents('php://input');
$update = json_decode($input, true);
// Here, you can use the setUpdate($update) for work with all the available helper functions
// See the next example.

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',

    # Here you can pass the $update directly
    # But in this example we do not do this
    // update: $udpate,


    //...
);

$updateId = $update['update_id'];

if (isset($update['message'])) {
    $message = $update['message'];

    $from = $message['from'];
    $chat = $message['chat'];

    $chatId = $chat['id'];
    $text = $message['text'] ?? null;

    //...
}

if ($text === '/start') {
    return sendMessage(text: 'START', chat_id: $chatId);
}

//...
//...
//...
```

#### Another Example:

```php
use function DevDasher\PTB_PHP\Telegram\Helpers\getText;
use function DevDasher\PTB_PHP\Telegram\Helpers\getChatId;
use function DevDasher\PTB_PHP\Config\setUpdate;
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

$input = file_get_contents('php://input');
$update = json_decode($input, true);

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',

    # Pass the $update directly
    update: $udpate,

    //...
);
// setUpdate($update); // Or pass the $update in this way.


$text = getText(); // Now, we can use all available helper functions. like this one here.
$chatId = getChatId();
//...

if ($text === '/start') {
    return sendMessage(
        text: 'START ANY',
        // chat_id: $chatId, // And here, we don't need to pass the $chatId anymore
    );
}

//...
//...
//...

```

### LongPolling Implementation <a name="without-handlers-longpolling-implementation"></a>

```php
use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Telegram\Methods\getUpdates;

configurePTB(
    token: 'TOKEN',
    username: 'USERNAME',
    //...
);

$updates = getUpdates(/* ... */);

foreach ($updates as $update) {
    //...
}

//...
//...
//...
```

### 🧱 Usage With OOP <a name="usage-with-oop"></a>

The PTB-PHP library provides developers with the flexibility to utilize object-oriented programming (OOP) alongside procedural code. While the library primarily encourages a procedural approach, it acknowledges that certain scenarios may require OOP concepts. As such, PTB-PHP allows the use of classes and objects within middleware and handlers, offering developers the freedom to incorporate OOP where necessary, rather than limiting them to pure functions.

Let's see an example:
```php
use function DevDasher\PTB_PHP\Handlers\middleware;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;
use function DevDasher\PTB_PHP\Handlers\onMessageText;

# Suppose we have two clasess, one for handler, and another for middleware:
class StartCommand {
    # This is a magic method in PHP that allows us to call a class as if it were a callable
    public function __invoke() {
        sendMessage(text: 'Start');
        //...
        //...
    }
    //...
}

class CheckUserStatusMiddleware {
    public function __invoke() {
        sendMessage(text: 'Hello from '.__CLASS__);
        //...
        //...
    }
    //...
}

# Here, we pass the class name for middleware:
middleware(CheckUserStatusMiddleware::class);

# Or pass an object of class:
// middleware(new CheckUserStatusMiddleware);

# Or pass class and method name in an array like this:
// middleware([CheckUserStatusMiddleware::class, 'method_name']);
// middleware([new CheckUserStatusMiddleware, 'method_name']);

# And here, we pass a class name for handler:
onMessageText(pattern: '/start', callable: StartCommand::class);

# Or pass an object of class:
// onMessageText(pattern: '/start', callable: new StartCommand);

# Or pass class and method name in an array like this:
// onMessageText(pattern: '/start', callable: [StartCommand::class, 'method_name']);
// onMessageText(pattern: '/start', callable: [new StartCommand, 'method_name']);


# Here we define some additional commands assuming that we have defined related classes somewhere in the program:
onMessageText(
    pattern: '/admin',
    callable: AdminCommand::class,

    # A middleware for checking if user is an admin or not
    local_middlewares: AdminAuthMiddleware::class, 

    # Of course, if you need multiple middlewares, just pass them in an array
    // middlewares: [AdminAuthMiddleware::class, AnotherMiddleware::class, /* ... */ ],


    # Here we say that the CheckUserStatusMiddleware class sould not be executed before this handler
    skip_global_middlewares: CheckUserStatusMiddleware::class,

    # Of course, if you need to pass multiple middleware names, just pass them in an array
    // middlewares: [CheckUserStatusMiddleware::class, AnotherMiddlewareToSkip::class, /* ... */ ],
);

//...
```

#### Optimizing Project Structure <a name="optimizing-project-structure"></a>

A well-organized project structure is crucial for developing a Telegram bot, especially when using object-oriented programming (OOP) principles. Here's an enhanced suggested structure to optimize your project:

- MyBot
    - app/
        - Commands/
            - StartCommand.php
            - HelpCommand.php
            - AccountCommand.php
            - ...
        - Conversations/
            - RegisterConversation.php
            - TransferMoneyConversation.php
            - DeleteUserConversation.php
            - ...
        - Middlewares/
            - CollectUserMiddleware.php
            - CheckUserStatusMiddleware.php
            - CheckBotStatusMiddleware.php
            - AdminAuthMiddleware.php
            - ...
    - config/
        - config.php
        - functions.php
        - messages.php
        - ...
    - vendor/
    - .gitignore
    - bot.php **(Your main file to set webhook or other things...)**
    - CHANGELOG.md
    - composer.json
    - composer.lock
    - LICENSE
    - README.md
    

### 🔗 Deep Links <a name="deep-links"></a>

Soon...

## 🚀 Performance <a name="performance"></a>

The performance of a Telegram bot is crucial for providing a seamless user experience. Response speed plays a vital role in ensuring timely interactions and satisfying user expectations. To improve the performance of a Telegram bot built with PHP, several methods can be employed. Firstly, optimizing code efficiency by minimizing unnecessary computations and database queries can significantly enhance response speed. Caching frequently accessed data or utilizing in-memory caching systems like Redis can also boost performance. Additionally, employing asynchronous processing techniques, such using queues or event-driven architectures, can help handle concurrent requests more efficiently. Utilizing a scalable infrastructure with load balancing and horizontal scaling can further improve performance by distributing the workload across multiple servers. Regular monitoring and profiling of the bot's performance can identify bottlenecks and areas for optimization, allowing for continuous improvement.

In the future, we will provide you with additional explanations and training in this particular field to ensure that you can achieve optimal performance with our library, PTB-PHP.

More details soon...

# ✨ Projects Showcase <a name="projects-showcase"></a>

We would love to feature your projects that utilize our library! Please share the links with us, and we will gladly showcase them in this section.

| Bot Name         | Username                           | Source Code                                      | Source Code Status         | Telegram Status           | Description
|------------------|------------------------------------|--------------------------------------------------|----------------------------|---------------------------|----------------
| MKeepBot         | [@mkeepbot](https://t.me/mkeepbot) |[GitHub](https://github.com/devdasher/mkeepbot)   | Development in progress... | 🔴 Deactive               |  A Telegram bot to share posts with others easily uisng the PTB-PHP library.

# 🐞 Bug Report <a name="bug-report"></a>

We strive to provide a robust and reliable library, but bugs may still occur. If you encounter any issues or unexpected behavior while using our library, we appreciate your help in reporting them.

Please follow these steps to report a bug:

1. Check the existing issues in the [Issue Tracker](https://github.com/devdasher/ptb-php/issues) to ensure that the bug hasn't already been reported.
2. If your issue is unique, create a new issue with a clear and descriptive title, including steps to reproduce the problem, expected behavior, and any relevant details.
3. Attach any error messages, stack traces, or code snippets that can assist with troubleshooting.

Your bug reports are invaluable in helping us identify and address any shortcomings promptly. We are committed to continuously improving the library and ensuring a smooth experience for all users.

We would also like to take this opportunity to encourage you to use our library and leverage its features to enhance your projects. We value your feedback and contributions, as they play a pivotal role in shaping the library's future development.

Thank you for your support and happy coding!

# ❤️ Support Us! <a name="support-us"></a>

Thank you for using our library! We greatly appreciate your support. If you find our library helpful, please consider giving us a 🌟 star on GitHub. Your positive feedback and engagement help us improve and continue providing valuable resources to the community. Don't forget to share this library with your friends and colleagues who might benefit from it. Together, we can make a difference in the development community. Thank you for being a part of our journey!

# 📝 Changelog <a name="changelog"></a>

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

# 🙌 Credits <a name="credits"></a>

- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

# 📜 License <a name="license"></a>

The GPL License (GPLv3). Please see [License File](LICENSE.md) for more information.

## ⚠️ Disclaimer of Warranty <a name="disclaimer-of-warranty"></a>

The PTB-PHP (Procedural Telegram Bot - PHP) library is distributed under the terms of the GNU General Public License, which grants users the legal permission to copy, distribute, and modify the software. However, it is important to note that the library is provided "as is" without any warranty or guarantee of its performance or functionality. The developer of the PTB-PHP library does not make any guarantees about its quality, suitability, or fitness for a particular purpose. The library may contain bugs or errors in any version, and the user is fully responsible for its usage and any consequences that may arise from it. It is recommended to thoroughly test the library and ensure its compatibility with specific use cases before deploying it in a production environment. The user should acknowledge that they are using the PTB-PHP library at their own risk. If the user encounters any issues or has any questions about the library, they can contact the developer for support or inquiries.
