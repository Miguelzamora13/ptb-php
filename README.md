# PTB = Procedure Telegram Bot (PHP Library)

> The PTB Library gives your project flexibility, scalability and super speed

This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check it out too!

```php
<?php

use function DevDasher\PTB\initPTB;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\sendMessage;
use function DevDasher\PTB\run;

require(__DIR__.'/vendor/autoload.php');
// require(__DIR__.'/path/to/PTB.php'); # Or you can directly require the src/PTB.php file. It's a little bit faster.

initPTB(
    token: 'TOKEN',
    username: 'bot1',
    api_base_url: 'https://api.tlgr.org',
    is_webhook: false,
);

onMessageText('/start', function() {
    sendMessage('Hello World!');
});

onMessageText('My name is {name}', function(string $name) {
    sendMessage("Hi {$name}");
});

run();
```

# Why Procedure and NOT OOP ?
When it comes to choosing between a procedural or object-oriented programming (OOP) approach, speed is one area where the procedural way can have an advantage. Procedural code has lower opcode than OOP, which means that it can execute faster. This is because procedural code is simpler and more direct. It follows a linear execution path and doesn't have to deal with additional layers of abstraction that come with objects and classes. While OOP provides many benefits in terms of code organization, reusability, and maintainability, sometimes the simplicity of procedural code can be a better fit for certain use cases. Ultimately, the decision on which approach to take should depend on the specific requirements of the project.

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

The GNU License (GNU v3.0). Please see [License File](LICENSE.md) for more information.
