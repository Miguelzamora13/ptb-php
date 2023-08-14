<?php

/**
    JSON VIEWER BOT:
    Sends any incoming Telegram update as json formatted string
        to the corresponding chat
        
    This file is part of the PTB (Procedural Telegram Bot).

    the PTB (Procedural Telegram Bot) is a free software library:
        you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.

    the PTB (Procedural Telegram Bot) is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY;
        without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
        See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with the PTB (Procedural Telegram Bot).
    If not, see https://www.gnu.org/licenses/.

 * @version 1.0.2
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/DevDasher/PTB-PHP
 * @link http://t.me/DevDasher
*/

use function DevDasher\PTB_PHP\Config\configurePTB;
use function DevDasher\PTB_PHP\Config\run;
use function DevDasher\PTB_PHP\Handlers\fallback;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUpdate;
use function DevDasher\PTB_PHP\Telegram\Methods\sendMessage;

require(__DIR__.'/../../src/PTB.php'); // path to PTB.php

configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    is_webhook: false, // Webhook or LongPolling?
);

fallback(callable: function() {
    sendMessage(text: json_encode(getUpdate(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
});

run();
