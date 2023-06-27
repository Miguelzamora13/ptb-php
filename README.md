# PTB = Procedure Telegram Bot (Library)

> The PTB Library gives your project flexibility, scalability and super speed

This library takes advantage of the latest **PHP 8** features, and tries to make the **speed**, **scalability** and **flexibility** of use its strength, it will allow you to quickly make simple bots, but at the same time, it provides
more **advanced features** to handle even the most complicated flows. Some architectural concepts on which PTB is
based are heavily influenced by other open source project with the name [Nutgram](https://github.com/nutgram/nutgram)! check them out too!

```php
<?php

use function DevDasher\BotProc\PTB;
use function DevDasher\BotProc\initPTB;
use function DevDasher\BotProc\onMessageText;
use function DevDasher\BotProc\sendMessage;
use function DevDasher\BotProc\run;

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
