<?php

/**
    MEDIA DOWNLOADER BOT:
    Downloads any media sent by user and saves them into a folder
    
        
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

use function DevDasher\PTB\configurePTB;
use function DevDasher\PTB\downloadBotFile;
use function DevDasher\PTB\editMessageText;
use function DevDasher\PTB\file;
use function DevDasher\PTB\fileTypes;
use function DevDasher\PTB\getFile;
use function DevDasher\PTB\messageId;
use function DevDasher\PTB\messageType;
use function DevDasher\PTB\middlewares;
use function DevDasher\PTB\onException;
use function DevDasher\PTB\onMessagePhoto;
use function DevDasher\PTB\onMessageSticker;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\photo;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;
use function DevDasher\PTB\sticker;

require(__DIR__.'/../src/PTB.php'); // path to PTB.php

configurePTB(
    token: 'TOKEN', // Your bot token
    username: 'USERNAME', // Your bot username
    is_webhook: false, // Webhook or LongPolling?
);

// This handler will be called whenever code reaches the throw statement
onException(callable: function(Throwable $e) {
    if ($e instanceof Exception) {
        return sendMessage($e->getMessage()); // Send error messages to the user
    }
    throw $e;
});

// This middlewares will be called before the main handlers
middlewares([
    'CHECK_FILE_TYPE' => function() {
        $messageType = messageType();
        $allowedTypes = fileTypes();
        if (!in_array($messageType, $allowedTypes)) {
            // Here, the onException handler will be called
            throw new Exception('Ony files are allowed to download!');
        }
    },
    'CHECK_FILE_SIZE' => function() {
        $file = file(); // Not the php's built in function!
        if ($file['file_size'] > API_LIMIT_DOWNLOAD_FILE_SIZE_MAX) {
            throw new Exception("The file size must be less than 20mb!");
        }
    }
]);

onMessageText(
    pattern: '/start',
    callable: function() {
        sendMessage(text: 'Ok, send me any sticker or photo to download');
    },
    // Skips global middlewares from running for this handler
    skip_middlewares: ['CHECK_FILE_TYPE', 'CHECK_FILE_SIZE'],
);

onMessagePhoto(callable: function() {
    $respose = sendMessage(
        text: 'Downloading...',
        reply_to_message_id: messageId()
    );
    $photo = photo();
    $file = getFile($photo['file_id']);
    $result = downloadBotFile(
        file: $file, // Or you can only pass the fild_id => $photo['file_id']
        save_path: __DIR__.'/../resources/photo.jpg',
    );
    if (!$result) {
        throw new Exception("Error while downloading!");
    }
    sleep(1);
    editMessageText(
        text: 'Photo downloaded.',
        message_id: $respose['result']['message_id'],
    );
});

onMessageSticker(callable: function() {
    $respose = sendMessage(
        text: 'Downloading...',
        reply_to_message_id: messageId()
    );
    $result = downloadBotFile(
        file: sticker('file_id'), // Here we pass the file_id
        save_path: __DIR__.'/../resources/sticker.webp',
    );
    if (!$result) {
        throw new Exception("Error while downloading!");
    }
    sleep(1);
    editMessageText(
        text: 'Sticker downloaded.',
        message_id: $respose['result']['message_id'],
    );
});


// Other handlers goes here...


run();