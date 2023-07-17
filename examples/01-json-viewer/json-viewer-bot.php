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

 * @version 1.0.1
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/DevDasher/PTB-PHP
 * @link http://t.me/DevDasher
*/

use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\onAnyUpdateType;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;
use function DevDasher\PTB\update;

require(__DIR__.'/../../src/PTB.php'); // path to PTB.php

configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    is_webhook: false, // Webhook or LongPolling?
);

onAnyUpdateType(callable: function() {
    sendMessage(text: json_encode(update(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
});

run();