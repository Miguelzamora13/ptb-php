<?php

// https://randomuser.me/api/


/**
    RANDOM USER:
    A Telegram bot for getting random user data, Like Lorem Ipsum, but for people
    We use the randomuser.me website for this
    
        
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

 * @version 1.0.0
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/DevDasher/PTB-PHP
 * @link http://t.me/DevDasher
*/

use function DevDasher\PTB\__makeCurlRequest;
use function DevDasher\PTB\_messageId;
use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\editMessageText;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;

require(__DIR__.'/../../src/PTB.php'); // path to PTB.php

configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    is_webhook: false, // Webhook or LongPolling?
);

onMessageText(pattern: '/start', callable: function() {
    sendMessage(
        text: "Hi!\n\nTouch /generate command to get random and fake user data!",
        reply_to_message_id: _messageId(),
    );
});

onMessageText(pattern: '/generate', callable: function() {
    $response = sendMessage(
        text: 'Please wait...',
        reply_to_message_id: _messageId(),
    );
    $url = 'https://randomuser.me/api/';
    $result = __makeCurlRequest(url: $url, options: [
        CURLOPT_RETURNTRANSFER => true,
    ]);
    if (!$result) {
        return editMessageText(text: 'An error occurred!', message_id: $response['result']['message_id']);
    }
    $fakeUser = json_decode($result, true);
    return editMessageText(
        text: formatData($fakeUser),
        message_id: $response['result']['message_id'],
        parse_mode: PARSE_MODE_MARKDOWN,
    );
});

run();


// ------------------------

function formatData(array $data, int $indentation = 0): string {
    $result = '';
    $indent = str_repeat(' ', $indentation * 4);
    foreach ($data as $key => $value) {
        $result .= $indent;
        if (is_array($value)) {
            $result .= "➕*$key*:".PHP_EOL.formatData($value, $indentation + 1);
        } else {
            $result .= "➖*$key*: `$value`".PHP_EOL;
        }
    }
    return $result;
}

// ------------------------
