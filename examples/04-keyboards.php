<?php

/**
    KEYBOARDS:
    How to use this library to send messages with keyboards...
    
        
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

use function DevDasher\PTB\_isCallbackQuery;
use function DevDasher\PTB\_messageId;
use function DevDasher\PTB\_row;
use function DevDasher\PTB\_user;
use function DevDasher\PTB\editMessageText;
use function DevDasher\PTB\InlineKeyboardButton;
use function DevDasher\PTB\InlineKeyboardMarkup;
use function DevDasher\PTB\KeyboardButton;
use function DevDasher\PTB\onCallbackQueryData;
use function DevDasher\PTB\onMessageText;
use function DevDasher\PTB\ReplyKeyboardMarkup;
use function DevDasher\PTB\run;
use function DevDasher\PTB\sendMessage;

require(__DIR__.'/../src/PTB.php'); // path to PTB.php


onMessageText(
    pattern: '/start',
    callable: function() {
        $user = _user(); // A helper to get user's info from input update
        return sendMessage(
            text: "Hi {$user['first_name']}!\n\nHere are some buttons for you! click on them.",
            reply_markup: ReplyKeyboardMarkup(
                keyboard: [
                    _row(KeyboardButton(text: 'Account'), KeyboardButton(text: 'Another Button')),
                ],
                is_persistent: true,
                resize_keyboard: true,
                //...
            ),
            reply_to_message_id: _messageId(),
        );
    }
);


# This handler shows us the account info
onMessageText(
    pattern: 'Account',
    callable:  'accountCommand' // This is a function name that we have defined at the end of this file
);


# This is an additional command
onMessageText(
    pattern: 'Another Button',
    callable: fn() => sendMessage(text: 'This is another button :)'),
);


# This handler redirects us to the wallet section
onCallbackQueryData(
    pattern: 'account/wallet',
    callable: function() {
        editMessageText(
            text: "Wallet\n\nYour balance: `9999$`",
            parse_mode: PARSE_MODE_MARKDOWN,
            reply_markup: InlineKeyboardMarkup([
                _row(InlineKeyboardButton(text: 'Back', callback_data: 'back_to/account')),
            ]),
        );
    }
);


# And this handler returns us to the account section
onCallbackQueryData(
    pattern: 'back_to/account',
    callable: 'accountCommand', // We will use this funciton again, to update the existing message
);


run();

// --------------------------------------------

/*
    This is for the Account section of the bot.
    We will only pass the name of this function in the corresponding handlers.
    You can use a class or any other Callable instead

    Another point is that it is better to put these functions or classes in
        another file so that the code is better readable.
    In this example we put everything in one file, but you better not do that.
*/
function accountCommand(): mixed {
    $user = _user();
    $id = $user['id'];
    $firstName = $user['first_name'];
    $username = $user['username'] ?? null;
    $commonParameters = [
        'text' => "Your Info\n\nID: `{$id}`\nFirstName: `{$firstName}`\nUsername: `{$username}`",
        'parse_mode' => PARSE_MODE_MARKDOWN,
        'reply_markup' => InlineKeyboardMarkup([
            _row(InlineKeyboardButton(text: 'Wallet', callback_data: 'account/wallet'))
        ]),
    ];
    if (_isCallbackQuery()) { // If it was callback_query, we will update the existing message
        return editMessageText(...$commonParameters);
    }
    return sendMessage(...array_merge($commonParameters, [ // If not, we will send a new message
        'reply_to_message_id' => _messageId()
    ])); 
}

// --------------------------------------------
