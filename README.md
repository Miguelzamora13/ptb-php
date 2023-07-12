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
    This handler is used to check text inputs in the 'message' update type
*/
onMessageText(
    # Enter your text pattern here
    pattern: '/start', 

    # The function that is executed after checking the pattern in response to the user
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
    
    # The function that is executed after checking the pattern in response to the user
    callable: function($name) { // Note that you receive the corresponding placeholder as a parameter in the function
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
    The response you specified in an anonymous function in previous handlers
*/
run();


```
# Why Procedural and NOT OOP?
Procedural programming is often considered faster than Object-Oriented Programming (OOP) due to its lower overhead and the smaller number of operations required for execution. In procedural programming, the focus is on writing sequential instructions in a step-by-step manner to accomplish a task. This approach allows for efficient execution as the program directly operates on data using straightforward instructions.

One key factor that contributes to the perceived speed advantage of procedural programming is the reduced number of OPcodes (operation codes) involved. OPcodes are fundamental instructions understood by the computer's hardware and define specific operations like arithmetic calculations or memory access. Since procedural programs typically involve fewer layers of abstraction and direct manipulation of data, they tend to require fewer OPcodes to achieve a given functionality.

In contrast, OOP introduces additional layers of complexity through concepts such as classes, objects, and inheritance. While these features provide benefits like code reusability, modularity, and maintainability, they also introduce some performance overhead. OOP programs often involve more intricate interactions between objects, which may require additional processing steps and indirections. These factors can lead to a slightly slower execution compared to procedural programs, especially in scenarios where performance is critical and the additional features of OOP are not heavily utilized.

It is important to note that the performance difference between procedural and OOP approaches is contextual and may vary based on several factors, such as the specific programming language used, the efficiency of the compiler or interpreter, the design choices made, and the nature of the problem being solved. Therefore, while procedural programming can be perceived as faster due to its streamlined execution model and reduced OPcode usage, it is not a definitive rule, and OOP can provide significant advantages in terms of code organization, maintainability, and extensibility.

# Documentation
This library is constantly being updated and currently has many features.  
We will complete this section later

# Installation
You can install the package via composer:

```bash
composer require devdasher/ptb-php
```

Or you can include the PTB.php file in your PHP code directly

# Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

# Credits
- [Pooria Bashiri](https://github.com/devdahser)
- [All Contributors](../../contributors)

# License
The GNU License (GNU v3). Please see [License File](LICENSE.md) for more information.