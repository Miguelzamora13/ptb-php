<?php

/**
    ECHO BOT:
    Resends whatever the user sends to the bot with this format:
        /echo INPUT
        
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

use function DevDasher\PTB\_messageId;
use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\messageId;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;

require(__DIR__.'/../src/PTB.php'); // path to PTB.php

configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    is_webhook: false, // Webhook or LongPolling?
);

onMessageText(
    pattern: '/start',
    callable: function() {
        sendMessage(text: 'START');
    }
);

onMessageText(
    pattern: '/echo {value}',
    callable: function($value) {
        sendMessage(
            text: $value,
            reply_to_message_id: _messageId(),
            allow_sending_without_reply: true,
        );
    }
);

run();