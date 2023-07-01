<?php 
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
/**
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

 * @version 1.0.7
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/DevDasher
 * @link http://t.me/DevDasher
*/
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
namespace DevDasher\PTB;
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
use Closure;
use CURLFile;
use Exception;
use Throwable;
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('UPDATE_TYPE_MESSAGE', 'message');
define('UPDATE_TYPE_EDITED_MESSAGE', 'edited_message');
define('UPDATE_TYPE_CHANNEL_POST', 'channel_post');
define('UPDATE_TYPE_EDITED_CHANNEL_POST', 'edited_channel_post');
define('UPDATE_TYPE_INLINE_QUERY', 'inline_query');
define('UPDATE_TYPE_CHOSEN_INLINE_QUERY', 'chosen_inline_result');
define('UPDATE_TYPE_CALLBACK_QUERY', 'callback_query');
define('UPDATE_TYPE_SHIPPING_QUERY', 'shipping_query');
define('UPDATE_TYPE_PRE_CHECKOUT_QUERY', 'pre_checkout_query');
define('UPDATE_TYPE_POLL', 'poll');
define('UPDATE_TYPE_POLL_ANSWER', 'poll_answer');
define('UPDATE_TYPE_MY_CHAT_MEMBER', 'my_chat_member');
define('UPDATE_TYPE_CHAT_MEMBER', 'chat_member');
define('UPDATE_TYPE_CHAT_JOIN_REQUEST', 'chat_join_request');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('MESSAGE_TYPE_TEXT', 'text');
define('MESSAGE_TYPE_STICKER', 'sticker');
define('MESSAGE_TYPE_ANIMATION', 'animation');
define('MESSAGE_TYPE_VIDEO', 'video');
define('MESSAGE_TYPE_VIDEO_NOTE', 'video_note');
define('MESSAGE_TYPE_AUDIO', 'audio');
define('MESSAGE_TYPE_VOICE', 'voice');
define('MESSAGE_TYPE_DOCUMENT', 'document');
define('MESSAGE_TYPE_PHOTO', 'photo');
define('MESSAGE_TYPE_LOCATION', 'location');
define('MESSAGE_TYPE_CONTACT', 'contact');
define('MESSAGE_TYPE_POLL', 'poll');
define('MESSAGE_TYPE_GAME', 'game');
define('MESSAGE_TYPE_DICE', 'dice');
define('MESSAGE_TYPE_VENUE', 'venue');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('BOT_COMMAND_SCOPE_DEFAULT', 'default');
define('BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS', 'all_private_chats');
define('BOT_COMMAND_SCOPE_ALL_GROUP_CHATS', 'group_chats');
define('BOT_COMMAND_SCOPE_ALL_CHAT_ADMINISTRATORS', 'chat_administrators');
define('BOT_COMMAND_SCOPE_CHAT', 'chat');
define('BOT_COMMAND_SCOPE_CHAT_ADMINISTRATORS', 'chat_administrators');
define('BOT_COMMAND_SCOPE_CHAT_MEMBER', 'chat_member');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('CHAT_MEMBER_STATUS_ADMINISTRATOR', 'administrator');
define('CHAT_MEMBER_STATUS_CREATOR', 'creator');
define('CHAT_MEMBER_STATUS_RESTRICTED', 'restricted');
define('CHAT_MEMBER_STATUS_LEFT', 'left');
define('CHAT_MEMBER_STATUS_MEMBER', 'member');
define('CHAT_MEMBER_STATUS_KICKED', 'kicked');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('CHAT_TYPE_GROUP', 'group');
define('CHAT_TYPE_SUPERGROUP', 'supergroup');
define('CHAT_TYPE_PRIVATE', 'private');
define('CHAT_TYPE_CHANNEL', 'channel');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('CHAT_ACTION_TYPING', 'typing');
define('CHAT_ACTION_UPLOAD_PHOTO', 'upload_photo');
define('CHAT_ACTION_RECORD_VIDEO', 'record_video');
define('CHAT_ACTION_UPLOAD_VIDEO', 'upload_video');
define('CHAT_ACTION_RECORD_VOICE', 'record_voice');
define('CHAT_ACTION_UPLOAD_VOICE', 'upload_voice');
define('CHAT_ACTION_UPLOAD_DOCUMENT', 'upload_document');
define('CHAT_ACTION_CHOOSE_STICKER', 'choose_sticker');
define('CHAT_ACTION_FIND_LOCATION', 'find_location');
define('CHAT_ACTION_RECORD_VIDEO_NOTE', 'record_video_note');
define('CHAT_ACTION_UPLOAD_VIDEO_NOTE', 'upload_video_note');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('CHAT_PERMISSION_CAN_SEND_MESSAGES', 'can_send_messages');
define('CHAT_PERMISSION_CAN_SEND_AUDIOS', 'can_send_audios');
define('CHAT_PERMISSION_CAN_SEND_DOCUMENTS', 'can_send_documents');
define('CHAT_PERMISSION_CAN_SEND_PHOTOS', 'can_send_photos');
define('CHAT_PERMISSION_CAN_SEND_VIDEOS', 'can_send_videos');
define('CHAT_PERMISSION_CAN_SEND_VIDEO_NOTES', 'can_send_video_notes');
define('CHAT_PERMISSION_CAN_SEND_VOICE_NOTES', 'can_send_voice_notes');
define('CHAT_PERMISSION_CAN_SEND_POLLS', 'can_send_polls');
define('CHAT_PERMISSION_CAN_SEND_OTHER_MESSAGES', 'can_send_other_messages');
define('CHAT_PERMISSION_CAN_ADD_WEB_PAGE_PREVIEWS', 'can_add_web_page_previews');
define('CHAT_PERMISSION_CAN_CHANGE_INFO', 'can_change_info');
define('CHAT_PERMISSION_CAN_INVITE_USERS', 'can_invite_users');
define('CHAT_PERMISSION_CAN_PIN_MESSAGES', 'can_pin_messages');
define('CHAT_PERMISSION_CAN_MANAGE_TOPICS', 'can_manage_topics');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('CHAT_ADMINISTRATOR_RIGHT_IS_ANONYMOUS', 'is_anonymous');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_CHAT', 'can_manage_chat');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_DELETE_MESSAGES', 'can_delete_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_VIDEO_CHATS', 'can_manage_video_chats');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_RESTRICT_MEMBERS', 'can_restrict_members');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_PROMOTE_MEMBERS', 'can_promote_members');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_CHANGE_INFO', 'can_change_info');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_INVITE_USERS', 'can_invite_users');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_POST_MESSAGES', 'can_post_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_EDIT_MESSAGES', 'can_edit_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_PIN_MESSAGES', 'can_pin_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_TOPICS', 'can_manage_topics');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('MENU_BUTTON_TYPE_DEFAULT', 'default');
define('MENU_BUTTON_TYPE_WEB_APP', 'web_app');
define('MENU_BUTTON_TYPE_COMMANDS', 'commands');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('STICKER_FORMAT_STATIC', 'static');
define('STICKER_FORMAT_ANIMATED', 'animated');
define('STICKER_FORMAT_VIDEO', 'video');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('STICKER_MASK_POSITION_POINT_FOREHEAD', 'forehead');
define('STICKER_MASK_POSITION_POINT_EYES', 'eyes');
define('STICKER_MASK_POSITION_POINT_MOUTH', 'mouth');
define('STICKER_MASK_POSITION_POINT_CHIN', 'chin');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('STICKER_TYPE_REGULAR', 'regular');
define('STICKER_TYPE_MASK', 'mask');
define('STICKER_TYPE_CUSTOM_EMOJI', 'custom_emoji');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('PARSE_MODE_HTML', 'HTML');
define('PARSE_MODE_MARKDOWN', 'Markdown');
define('PARSE_MODE_MARKDOWN_V2', 'MarkdownV2');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('API_LIMIT_CHAT_FIRST_NAME_MIN', 1);
define('API_LIMIT_CHAT_FIRST_NAME_MAX', 64);
define('API_LIMIT_CHAT_LAST_NAME_MIN', 0);
define('API_LIMIT_CHAT_LAST_NAME_MAX', 64);
define('API_LIMIT_CHAT_USERNAME_MIN', 5);
define('API_LIMIT_CHAT_USERNAME_MAX', 32);
define('API_LIMIT_BOT_COMMAND_MIN', 1);
define('API_LIMIT_BOT_COMMAND_MAX', 32);
define('API_LIMIT_BOT_COMMAND_DESCRIPTION_MIN', 1);
define('API_LIMIT_BOT_COMMAND_DESCRIPTION_MAX', 256);
define('API_LIMIT_MESSAGE_TEXT_MIN', 1);
define('API_LIMIT_MESSAGE_TEXT_MAX', 4096);
define('API_LIMIT_MESSAGE_CAPTION_MIN', 1);
define('API_LIMIT_MESSAGE_CAPTION_MAX', 1096);
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('_REGEX_FIND_PLACEHOLDERS', '/\{([^}]+)\}/');
define('_REGEX_PLACEHOLDERS_REPLACEMENT', '(?P<$1>\w+)');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function initPTB(
    string $token,
    string $username,
    string $api_base_url = 'https://api.telegram.org',
    bool $is_webhook = false,
    array $default_curl_options = [],
): void {
    $GLOBALS['_devdasher/ptb'] = array_merge(get_defined_vars(), [
        'update' => [],
        'global_data' => [],
        'middlewares' => [],
        'handlers' => [],
    ]);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function run(): void {
    if (_config('is_webhook')) {
        $input = file_get_contents('php://input');
        if (!$input) {
            exit;
        }
        $update = json_decode($input, true);
        _setUpdate($update);
        _processUpdate();
    } else {
        echo 'Listening...'.PHP_EOL;
        $offset = 1;
        while (true) {
            $response = getUpdates(timeout: 10, offset: $offset);
            if (!$response['ok']) {
                throw new \Exception('Could not fetch updates with the getUpdates method!');
            }
            $updates = $response['result'];
            foreach ($updates as $update) {
                print_r($update);
                _setUpdate($update);
                _processUpdate();
                $offset = $update['update_id'] + 1;
            }
            usleep(3000000);
        }
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setGlobalData(int|string $key, mixed $value = null): void {
    _setOrPushValue($GLOBALS['_devdasher/ptb'], $value, "global_data.{$key}");
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getGlobalData(int|string $key, mixed $defaultValue = null): mixed {
    return $GLOBALS['_devdasher/ptb']['global_data'][$key] ?? $defaultValue;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function middleware(Closure $closure): void {
    _addMiddleware($closure, 'middlewares');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageText(string $pattern, Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_TEXT.'.'.$pattern);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageSticker(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_STICKER);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessagePhoto(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_PHOTO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageDocument(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_DOCUMENT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageContact(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_CONTACT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageLocation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_LOCATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageAudio(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_AUDIO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVoice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_VOICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageDice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_DICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageGame(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_GAME);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVenue(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_VENUE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVideo(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_VIDEO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVideoNote(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_VIDEO_NOTE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageAnimation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_ANIMATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessage(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageText(string $pattern, Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_TEXT.'.'.$pattern);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageSticker(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_STICKER);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessagePhoto(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_PHOTO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageDocument(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_DOCUMENT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageContact(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_CONTACT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageLocation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_LOCATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageAudio(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_AUDIO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVoice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_VOICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageDice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_DICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageGame(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_GAME);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVenue(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_VENUE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVideo(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_VIDEO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVideoNote(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_VIDEO_NOTE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageAnimation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.'.MESSAGE_TYPE_ANIMATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessage(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_MESSAGE.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onCallbackQuery(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CALLBACK_QUERY.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onCallbackQueryData(string $pattern, Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CALLBACK_QUERY.'.data.'.$pattern);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostText(string $pattern, Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_TEXT.'.'.$pattern);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostSticker(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_STICKER);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostPhoto(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_PHOTO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostDocument(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_DOCUMENT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostContact(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_CONTACT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostLocation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_LOCATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostAudio(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_AUDIO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVoice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_VOICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostDice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_DICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostGame(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_GAME);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVenue(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_VENUE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVideo(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_VIDEO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVideoNote(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_VIDEO_NOTE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostAnimation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.'.MESSAGE_TYPE_ANIMATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPost(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHANNEL_POST.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostText(string $pattern, Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_TEXT.'.'.$pattern);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostSticker(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_STICKER);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostPhoto(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_PHOTO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostDocument(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_DOCUMENT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostContact(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_CONTACT);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostLocation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_LOCATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostAudio(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_AUDIO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVoice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_VOICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostDice(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_DICE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostGame(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_GAME);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVenue(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_VENUE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVideo(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_VIDEO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVideoNote(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_VIDEO_NOTE);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostAnimation(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.'.MESSAGE_TYPE_ANIMATION);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPost(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_EDITED_CHANNEL_POST.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChatMember(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHAT_MEMBER.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onPoll(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MESSAGE.'.'.MESSAGE_TYPE_POLL.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onPollAnswer(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_POLL_ANSWER.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onInlineQuery(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_INLINE_QUERY.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMyChatMember(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_MY_CHAT_MEMBER.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onShippingQuery(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_SHIPPING_QUERY.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChatJoinRequest(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHAT_JOIN_REQUEST.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onPreCheckoutQuery(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_PRE_CHECKOUT_QUERY.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChosenInlineQuery(Closure $closure): void {
    _addHandler($closure, UPDATE_TYPE_CHOSEN_INLINE_QUERY.'.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function fallback(Closure $closure): void {
    _addHandler($closure, 'fallback.self');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function fallbackOn(string $updateType, Closure $closure): void {
    if (!in_array($updateType, updateTypes())) {
        throw new Exception("Invalid update type '{$updateType}'!");
    }
    _addHandler($closure, "fallback.{$updateType}");
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onException(Closure $closure): void {
    _addHandler($closure, 'exception');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onApiError(Closure $closure): void {
    _addHandler($closure, 'api_error');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineKeyboard(array $inline_keyboard): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineKeyboardButton(
    string $text,
    ?string $url = null,
    ?string $callback_data = null,
    ?array $web_app = null,
    ?array $login_url = null,
    ?string $switch_inline_query = null,
    ?array $switch_inline_query_chosen_chat = null,
    ?array $callback_game = null,
    ?bool $pay = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function keyboard(
    array $keyboard,
    bool $is_persistent = true,
    bool $resize_keyboard = true,
    bool $one_time_keyboard = false,
    bool $selective = true,
    ?string $input_field_placeholder = null,
): array {
    return array_filter(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function keyboardButton(
    string $text,
    ?array $request_user = null,
    ?array $request_chat = null,
    bool $request_contact = false,
    bool $request_location = false,
    ?array $request_poll = null,
    ?array $web_app = null,
): array {
    return array_filter(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chat(?string $keys = null): mixed {
    $message = message();
    $updateType = updateType();
    $chat = match ($updateType) {
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_CALLBACK_QUERY,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_MY_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_JOIN_REQUEST,
        UPDATE_TYPE_EDITED_CHANNEL_POST => $message['chat'],
        default => null,
    };
    if (!$keys) {
        return $chat;
    }
    return _arrayGet($chat, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function photo(?string $keys = null): mixed {
    $photos = photos();
    $photo = end($photos);
    if (!$keys) {
        return $photo;
    }
    return _arrayGet($photo, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function photos(): ?array {
    return message(MESSAGE_TYPE_PHOTO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function gamePhoto(?string $keys = null): mixed {
    $gamePhotos = gamePhotos();
    $gamePhoto = end($gamePhotos);
    if (!$keys) {
        return $gamePhoto;
    }
    return _arrayGet($gamePhoto, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function gamePhotos(): ?array {
    return message(MESSAGE_TYPE_GAME);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function replyMarkup(?string $keys = null): mixed {
    $replyMarkup = message('reply_markup');
    if (!$keys) {
        return $replyMarkup;
    }
    return _arrayGet($replyMarkup, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function viaBot(?string $keys = null): mixed {
    $viaBot = message('via_bot');
    if (!$keys) {
        return $viaBot;
    }
    return _arrayGet($viaBot, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function poll(?string $keys = null): mixed {
    $poll = message('poll');
    if (!$keys) {
        return $poll;
    }
    return _arrayGet($poll, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function pollOptions(?string $keys = null): mixed {
    $pollOptions = message('poll.options');
    if (!$keys) {
        return $pollOptions;
    }
    return _arrayGet($pollOptions, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatMember(?string $keys = null): mixed {
    $chatMember = update(UPDATE_TYPE_CHAT_MEMBER);
    if (!$keys) {
        return $chatMember;
    }
    return _arrayGet($chatMember, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function myChatMember(?string $keys = null): mixed {
    $myChatMember = update(UPDATE_TYPE_MY_CHAT_MEMBER);
    if (!$keys) {
        return $myChatMember;
    }
    return _arrayGet($myChatMember, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function oldChatMember(?string $keys = null): mixed {
    $key = 'old_chat_member';
    $updateType = updateType();
    $oldChatMember = $updateType === UPDATE_TYPE_CHAT_MEMBER ? chatMember($key) : myChatMember($key);
    if (!$keys) {
        return $oldChatMember;
    }
    return _arrayGet($oldChatMember, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function newChatMember(?string $keys = null): mixed {
    $key = 'new_chat_member';
    $updateType = updateType();
    $newChatMember = $updateType === UPDATE_TYPE_CHAT_MEMBER ? chatMember($key) : myChatMember($key);
    if (!$keys) {
        return $newChatMember;
    }
    return _arrayGet($newChatMember, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function document(?string $keys = null): mixed {
    $document = message(MESSAGE_TYPE_DOCUMENT);
    if (!$keys) {
        return $document;
    }
    return _arrayGet($document, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sticker(?string $keys = null): mixed {
    $sticker = message(MESSAGE_TYPE_STICKER);
    if (!$keys) {
        return $sticker;
    }
    return _arrayGet($sticker, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function video(?string $keys = null): mixed {
    $video = message(MESSAGE_TYPE_VIDEO);
    if (!$keys) {
        return $video;
    }
    return _arrayGet($video, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function videoNote(?string $keys = null): mixed {
    $videoNote = message(MESSAGE_TYPE_VIDEO_NOTE);
    if (!$keys) {
        return $videoNote;
    }
    return _arrayGet($videoNote, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function voice(?string $keys = null): mixed {
    $voice = message(MESSAGE_TYPE_VOICE);
    if (!$keys) {
        return $voice;
    }
    return _arrayGet($voice, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function audio(?string $keys = null): mixed {
    $audio = message(MESSAGE_TYPE_AUDIO);
    if (!$keys) {
        return $audio;
    }
    return _arrayGet($audio, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function dice(?string $keys = null): mixed {
    $dice = message(MESSAGE_TYPE_DICE);
    if (!$keys) {
        return $dice;
    }
    return _arrayGet($dice, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function game(?string $keys = null): mixed {
    $game = message(MESSAGE_TYPE_GAME);
    if (!$keys) {
        return $game;
    }
    return _arrayGet($game, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function venue(?string $keys = null): mixed {
    $venue = message(MESSAGE_TYPE_VENUE);
    if (!$keys) {
        return $venue;
    }
    return _arrayGet($venue, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function location(?string $keys = null): mixed {
    $location = message(MESSAGE_TYPE_LOCATION);
    if (!$keys) {
        return $location;
    }
    return _arrayGet($location, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function contact(?string $keys = null): mixed {
    $contact = message(MESSAGE_TYPE_CONTACT);
    if (!$keys) {
        return $contact;
    }
    return _arrayGet($contact, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function animation(?string $keys = null): mixed {
    $animation = message(MESSAGE_TYPE_ANIMATION);
    if (!$keys) {
        return $animation;
    }
    return _arrayGet($animation, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function text(): ?string {
    return message('text');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function caption(): ?string {
    return message('caption');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function entities(): ?array {
    return message('entities') ?? message('caption_entities');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function from(?string $keys = null): mixed {
    $updateType = updateType();
    $update = update();
    $user = match ($updateType) {
        UPDATE_TYPE_POLL_ANSWER => $update[$updateType]['user'],
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_MY_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_JOIN_REQUEST,
        UPDATE_TYPE_INLINE_QUERY,
        UPDATE_TYPE_CHOSEN_INLINE_QUERY,
        UPDATE_TYPE_SHIPPING_QUERY,
        UPDATE_TYPE_PRE_CHECKOUT_QUERY,
        UPDATE_TYPE_CALLBACK_QUERY => $update[$updateType]['from'],
        default => null,
    };
    if (!$keys) {
        return $user;
    }
    return _arrayGet($user, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function user(?string $keys = null): mixed {
    return from($keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function userId(): ?int {
    return user('id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatId(): ?int {
    return chat('id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function update(?string $keys = null): mixed {
    $update = _config('update');
    if (!$keys) {
        return $update;
    }
    return _arrayGet($update, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function callbackQuery(?string $keys = null): mixed {
    $callbackQuery = update(UPDATE_TYPE_CALLBACK_QUERY);
    if (!$keys) {
        return $callbackQuery;
    }
    return _arrayGet($callbackQuery, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function callbackQueryData(): ?string {
    return callbackQuery('data');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQuery(?string $keys = null): mixed {
    $inlineQuery = update(UPDATE_TYPE_INLINE_QUERY);
    if (!$keys) {
        return $inlineQuery;
    }
    return _arrayGet($inlineQuery, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryString(): ?string {
    return update(UPDATE_TYPE_INLINE_QUERY.'.query');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function shippingQuery(?string $keys = null): mixed {
    $shippingQuery = update(UPDATE_TYPE_SHIPPING_QUERY);
    if (!$keys) {
        return $shippingQuery;
    }
    return _arrayGet($shippingQuery, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function preCheckoutQuery(?string $keys = null): mixed {
    $preCheckoutQuery = update(UPDATE_TYPE_PRE_CHECKOUT_QUERY);
    if (!$keys) {
        return $preCheckoutQuery;
    }
    return _arrayGet($preCheckoutQuery, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function pollAnswer(?string $keys = null): mixed {
    // ....
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isMessage(): bool {
    return updateType() === UPDATE_TYPE_MESSAGE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isCallbackQuery(): bool {
    return updateType() === UPDATE_TYPE_CALLBACK_QUERY;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isEditedMessage(): bool {
    return updateType() === UPDATE_TYPE_EDITED_MESSAGE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isChannelPost(): bool {
    return updateType() === UPDATE_TYPE_CHANNEL_POST;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isEditedChannelPost(): bool {
    return updateType() === UPDATE_TYPE_EDITED_CHANNEL_POST;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isShippingQuery(): bool {
    return updateType() === UPDATE_TYPE_SHIPPING_QUERY;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isChatJoinRequest(): bool {
    return updateType() === UPDATE_TYPE_CHAT_JOIN_REQUEST;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isInlineQuery(): bool {
    return updateType() === UPDATE_TYPE_INLINE_QUERY;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isMyChatMember(): bool {
    return updateType() === UPDATE_TYPE_MY_CHAT_MEMBER;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isChatMember(): bool {
    return updateType() === UPDATE_TYPE_CHAT_MEMBER;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isChosenInlineQuery(): bool {
    return updateType() === UPDATE_TYPE_CHOSEN_INLINE_QUERY;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isPreCheckOutQuery(): bool {
    return updateType() === UPDATE_TYPE_PRE_CHECKOUT_QUERY;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isPollAnswer(): bool {
    return updateType() === UPDATE_TYPE_POLL;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isPoll(bool $checkUpdateType = false): bool {
    if ($checkUpdateType) {
        return updateType() === UPDATE_TYPE_POLL;
    }
    return messageType() === MESSAGE_TYPE_POLL;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isPhoto(): bool {
    return messageType() === MESSAGE_TYPE_PHOTO;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isSticker(): bool {
    return messageType() === MESSAGE_TYPE_STICKER;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isAnimation(): bool {
    return messageType() === MESSAGE_TYPE_ANIMATION;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isVideo(): bool {
    return messageType() === MESSAGE_TYPE_VIDEO;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isVideoNote(): bool {
    return messageType() === MESSAGE_TYPE_VIDEO_NOTE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isDice(): bool {
    return messageType() === MESSAGE_TYPE_DICE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isGame(): bool {
    return messageType() === MESSAGE_TYPE_GAME;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isVenue(): bool {
    return messageType() === MESSAGE_TYPE_VENUE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isVoice(): bool {
    return messageType() === MESSAGE_TYPE_VOICE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isDocument(): bool {
    return messageType() === MESSAGE_TYPE_DOCUMENT;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isLocation(): bool {
    return messageType() === MESSAGE_TYPE_LOCATION;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isContact(): bool {
    return messageType() === MESSAGE_TYPE_CONTACT;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isAudio(): bool {
    return messageType() === MESSAGE_TYPE_AUDIO;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isText(): bool {
    return messageType() === MESSAGE_TYPE_TEXT;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isGroup(): bool {
    return chatType() === CHAT_TYPE_GROUP;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isSupergroup(): bool {
    return chatType() === CHAT_TYPE_SUPERGROUP;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isPrivate(): ?bool {
    return chatType() === CHAT_TYPE_PRIVATE;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isChannel(): ?bool {
    return chatType() === CHAT_TYPE_CHANNEL;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isForwarded(): ?bool {
    return boolval(message('forward_date') ?? message('forward_sender_name'));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardFrom(?string $keys = null): mixed {
    $forwardFrom = message('forward_from');
    if (!$keys) {
        return $forwardFrom;
    }
    return _arrayGet($forwardFrom, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardFromChat(?string $keys = null): mixed {
    $forwardFromChat = message('forward_from_chat');
    if (!$keys) {
        return $forwardFromChat;
    }
    return _arrayGet($forwardFromChat, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardFromid(): ?int {
    return message('forward_from_message_id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardDate(): ?int {
    return message('forward_date');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function message(?string $keys = null): mixed {
    $update = update();
    $updateType = updateType();
    $message = match ($updateType) {
        UPDATE_TYPE_CALLBACK_QUERY => $update[$updateType][UPDATE_TYPE_MESSAGE],
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_EDITED_CHANNEL_POST => $update[$updateType],
        default => null,
    };
    print_r($message);
    if (!$keys) {
        return $message;
    }
    return _arrayGet($message, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function messageId(): ?int {
    return message('message_id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function callbackQueryId(): ?int {
    return callbackQuery('id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryId(): ?int {
    return inlineQuery('id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function mediaGroupId(): ?int {
    return message('media_group_id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function updateId(): ?int {
    return update('update_id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatType(): ?string {
    return chat('type');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatTypes(array $exclude = []): array {
    return array_diff([
        CHAT_TYPE_GROUP,
        CHAT_TYPE_SUPERGROUP,
        CHAT_TYPE_PRIVATE,
        CHAT_TYPE_CHANNEL,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatMemberStatuses(array $exclude = []): array {
    return array_diff([
        CHAT_MEMBER_STATUS_ADMINISTRATOR,
        CHAT_MEMBER_STATUS_CREATOR,
        CHAT_MEMBER_STATUS_RESTRICTED,
        CHAT_MEMBER_STATUS_LEFT,
        CHAT_MEMBER_STATUS_MEMBER,
        CHAT_MEMBER_STATUS_KICKED,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function formattingOptions(array $exclude = []): array {
    return array_diff([
        PARSE_MODE_HTML,
        PARSE_MODE_MARKDOWN,
        PARSE_MODE_MARKDOWN_V2,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatActions(array $exclude = []): array {
    return array_diff([
        CHAT_ACTION_TYPING,
        CHAT_ACTION_UPLOAD_PHOTO,
        CHAT_ACTION_RECORD_VIDEO,
        CHAT_ACTION_UPLOAD_VIDEO,
        CHAT_ACTION_RECORD_VOICE,
        CHAT_ACTION_UPLOAD_VOICE,
        CHAT_ACTION_UPLOAD_DOCUMENT,
        CHAT_ACTION_CHOOSE_STICKER,
        CHAT_ACTION_FIND_LOCATION,
        CHAT_ACTION_RECORD_VIDEO_NOTE,
        CHAT_ACTION_UPLOAD_VIDEO_NOTE,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function updateTypes(array $exclude = []): array {
    return array_diff([
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_EDITED_CHANNEL_POST,
        UPDATE_TYPE_INLINE_QUERY,
        UPDATE_TYPE_CHOSEN_INLINE_QUERY,
        UPDATE_TYPE_CALLBACK_QUERY,
        UPDATE_TYPE_SHIPPING_QUERY,
        UPDATE_TYPE_PRE_CHECKOUT_QUERY,
        UPDATE_TYPE_POLL,
        UPDATE_TYPE_POLL_ANSWER,
        UPDATE_TYPE_MY_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_JOIN_REQUEST,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function updateType(): ?string {
    $commonKeys = array_intersect(updateTypes(), array_keys(update()));
    return array_shift($commonKeys) ?? null;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function messageTypes(array $exclude = []): array {
    return array_diff([
        MESSAGE_TYPE_TEXT,
        MESSAGE_TYPE_STICKER,
        MESSAGE_TYPE_ANIMATION,
        MESSAGE_TYPE_VIDEO,
        MESSAGE_TYPE_VIDEO_NOTE,
        MESSAGE_TYPE_AUDIO,
        MESSAGE_TYPE_VOICE,
        MESSAGE_TYPE_DOCUMENT,
        MESSAGE_TYPE_PHOTO,
        MESSAGE_TYPE_LOCATION,
        MESSAGE_TYPE_CONTACT,
        MESSAGE_TYPE_POLL,
        MESSAGE_TYPE_GAME,
        MESSAGE_TYPE_DICE,
        MESSAGE_TYPE_VENUE,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function messageType(): ?string {
    return current(array_intersect(messageTypes(), array_keys(message())));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function fileTypes(array $exclude = []): ?array {
    return array_diff([
        MESSAGE_TYPE_STICKER,
        MESSAGE_TYPE_ANIMATION,
        MESSAGE_TYPE_VIDEO,
        MESSAGE_TYPE_VIDEO_NOTE,
        MESSAGE_TYPE_AUDIO,
        MESSAGE_TYPE_VOICE,
        MESSAGE_TYPE_DOCUMENT,
        MESSAGE_TYPE_PHOTO,
    ], $exclude);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMe(): array {
    return _prepareAndMakeRequest(__FUNCTION__);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function logOut(): array {
    return _prepareAndMakeRequest(__FUNCTION__);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function close(): array {
    return _prepareAndMakeRequest(__FUNCTION__);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteMessage(int $message_id, ?int $chat_id = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendMessage(
    string $text,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
    ?bool $disable_notification = true,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardMessage(
    int $chat_id,
    ?int $message_id = null,
    ?int $from_chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function copyMessage(
    int $chat_id,
    ?int $message_id = null,
    ?int $from_chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendPhoto(
    string $photo,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $has_spoiler = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendAudio(
    string $audio,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?int $duration = null,
    ?string $performer = null,
    ?string $title = null,
    ?string $thumbnail = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendDocument(
    string $document,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendVideo(
    string $video,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
    ?int $width = null,
    ?int $height = null,
    ?bool $has_spoiler = null,
    ?bool $supports_streaming = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendAnimation(
    string $animation,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
    ?int $width = null,
    ?int $height = null,
    ?bool $has_spoiler = null,
    ?bool $supports_streaming = null,
    ?int $duration = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendVoice(
    string $voice,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendVideoNote(
    string $video_note,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?int $duration = null,
    ?int $length = null,
    ?string $thumbnail = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendMediaGroup(
    array $media,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendLocation(
    ?float $latitude,
    ?float $longitude,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?float $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendVenue(
    string $title,
    string $address,
    ?float $latitude,
    ?float $longitude,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?string $foursquare_id = null,
    ?string $foursquare_type = null,
    ?string $google_place_id = null,
    ?string $google_place_type = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendContact(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendPoll(
    string $question,
    array $options,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?bool $is_anonymous = null,
    ?string $type = null,
    ?bool $allows_multiple_answers = null,
    ?int $correct_option_id = null,
    ?string $explanation = null,
    ?string $explanation_parse_mode = null,
    ?array $explanation_entities = null,
    ?int $open_period = null,
    ?int $close_date = null,
    ?bool $is_closed = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendDice(
    string $emoji,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendChatAction(
    string $action,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getUserProfilePhotos(
    ?int $chat_id = null,
    ?int $offset = null,
    ?int $limit = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getFile(string $file_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function banChatMember(
    int $chat_id,
    int $user_id,
    ?int $until_date = null,
    ?bool $revoke_messages = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unbanChatMember(
    int $chat_id,
    int $user_id,
    ?bool $only_if_banned = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function restrictChatMember(
    int $chat_id,
    int $user_id,
    array $permissions,
    ?bool $only_if_banned = null,
    ?bool $use_independent_chat_permissions = null,
    ?int $until_date = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function promoteChatMember(
    int $chat_id,
    int $user_id,
    ?bool $is_anonymous = null,
    ?bool $can_manage_chat = null,
    ?bool $can_post_messages = null,
    ?bool $can_edit_messages = null,
    ?bool $can_delete_messages = null,
    ?bool $can_manage_video_chats = null,
    ?bool $can_restrict_members = null,
    ?bool $can_promote_members = null,
    ?bool $can_change_info = null,
    ?bool $can_invite_users = null,
    ?bool $can_pin_messages = null,
    ?bool $can_manage_topics = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatAdministratorCustomTitle(int $chat_id,int $user_id,string $custom_title): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function banChatSenderChat(int $chat_id, int $sender_chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unbanChatSenderChat(int $chat_id, int $sender_chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatPermissions(int|string $chat_id, array $permissions, ?bool $use_independent_chat_permissions = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function exportChatInviteLink(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function createChatInviteLink(
    int|string $chat_id,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?bool $creates_join_request = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editChatInviteLink(
    int|string $chat_id,
    string $invite_link,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?bool $creates_join_request = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function revokeChatInviteLink(int|string $chat_id, string $invite_link): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function approveChatJoinRequest(int|string $chat_id, int $user_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function declineChatJoinRequest(int|string $chat_id, int $user_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatPhoto(int|string $chat_id, string $photo): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteChatPhoto(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatTitle(int|string $chat_id, string $title): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatDescription(int|string $chat_id, string $description): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function pinChatMessage(int|string $chat_id, bool $message_id, ?bool $disable_notification = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unpinChatMessage(int|string $chat_id, bool $message_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unpinAllChatMessages(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function leaveChat(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChat(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatAdministrators(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatMemberCount(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatMember(int|string $chat_id, int $user_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatStickerSet(int|string $chat_id, string $sticker_set_name): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteChatStickerSet(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getForumTopicIconStickers(): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function createForumTopic(
    int|string $chat_id,
    string $name,
    ?int $icon_color = null,
    ?string $icon_custom_emoji_id = null
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editForumTopic(
    int|string $chat_id,
    int $message_thread_id,
    ?string $name,
    ?string $icon_custom_emoji_id = null
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function closeForumTopic(int|string $chat_id, int $message_thread_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function reopenForumTopic(int|string $chat_id, int $message_thread_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteForumTopic(int|string $chat_id, int $message_thread_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unpinAllForumTopicMessages(int|string $chat_id, int $message_thread_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editGeneralForumTopic(int|string $chat_id, string $name): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function closeGeneralForumTopic(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function reopenGeneralForumTopic(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function hideGeneralForumTopic(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unhideGeneralForumTopic(int|string $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerCallbackQuery(
    string $text,
    ?bool $show_alert = null,
    ?string $url = null,
    ?int $cache_time = null,
    ?int $callback_query_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyCommands(array $commands, ?array $scope = null, ?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteMyCommands(?array $scope = null, ?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyCommands(?array $scope = null, ?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyName(?string $name = null, ?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyName(?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyDescription(?string $description = null, ?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyDescription(?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyShortDescription(?string $short_description = null, ?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyShortDescription(?string $language_code = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatMenuButton(int $chat_id, ?array $menu_button = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatMenuButton(int $chat_id): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyDefaultAdministratorRights(?array $rights = null, ?bool $for_channels = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyDefaultAdministratorRights(?bool $for_channels = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageText(
    string $text,
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageCaption(
    ?string $caption = null,
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageMedia(
    array $media,
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageLiveLocation(
    float $latitude,
    float $longitude,
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
    ?float $horizontal_accuracy = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function stopMessageLiveLocation(
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageReplyMarkup(
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function stopPoll(
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendSticker(
    string $sticker,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?array $reply_markup = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?string $emoji = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getStickerSet(string $name): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getCustomEmojiStickers(array $custom_emoji_ids): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function uploadStickerFile(int $user_id, string $sticker, string $sticker_format): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function createNewStickerSet(
    int $user_id,
    string $name,
    string $title,
    array $stickers,
    string $sticker_format,
    ?string $sticker_type = null,
    ?bool $needs_repainting = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function addStickerToSet(int $user_id, string $name, array $sticker): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerPositionInSet(string $sticker, int $position): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteStickerFromSet(string $sticker): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerEmojiList(string $sticker, array $emoji_list): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerKeywords(string $sticker, ?array $keywords = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerMaskPosition(string $sticker, ?array $mask_position = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerSetTitle(string $name, string $title): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerSetThumbnail(string $name, int $user_id, ?string $thumbnail = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setCustomEmojiStickerSetThumbnail(string $name, ?string $custom_emoji_id = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteStickerSet(string $name): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerInlineQuery(
    array $results,
    ?int $cache_time = null,
    ?bool $is_personal = null,
    ?string $next_offset = null,
    ?array $button = null,
    ?string $inline_query_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerWebAppQuery(array $result, ?string $web_app_query_id = null): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendInvoice(
    string $title,
    string $description,
    string $payload,
    string $provider_token,
    string $currency,
    array $prices,
    null|int|string $chat_id,
    ?int $message_thread_id = null,
    ?int $max_tip_amount = null,
    ?array $suggested_tip_amounts = null,
    ?string $start_parameter = null,
    ?string $provider_data = null,
    ?string $photo_url = null,
    ?int $photo_size = null,
    ?int $photo_width = null,
    ?int $photo_height = null,
    ?bool $need_name = null,
    ?bool $need_phone_number = null,
    ?bool $need_email = null,
    ?bool $need_shipping_address = null,
    ?bool $send_phone_number_to_provider = null,
    ?bool $send_email_to_provider = null,
    ?bool $is_flexible = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function createInvoiceLink(
    string $title,
    string $description,
    string $payload,
    string $provider_token,
    string $currency,
    array $prices,
    ?int $max_tip_amount = null,
    ?array $suggested_tip_amounts = null,
    ?string $provider_data = null,
    ?string $photo_url = null,
    ?int $photo_size = null,
    ?int $photo_width = null,
    ?int $photo_height = null,
    ?bool $need_name = null,
    ?bool $need_phone_number = null,
    ?bool $need_email = null,
    ?bool $need_shipping_address = null,
    ?bool $send_phone_number_to_provider = null,
    ?bool $send_email_to_provider = null,
    ?bool $is_flexible = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerShippingQuery(
    bool $ok,
    ?array $shipping_options = null,
    ?string $error_message = null,
    ?string $shipping_query_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerPreCheckoutQuery(
    bool $ok,
    ?string $error_message = null,
    ?string $pre_checkout_query_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setPassportDataErrors(int $user_id, array $errors): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendGame(
    string $game_short_name,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setGameScore(
    int $user_id,
    string $score,
    ?bool $force = null,
    ?bool $disable_edit_message = null,
    ?int $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getGameHighScores(
    int $user_id,
    ?int $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getUpdates(
    int $limit = 100,
    int $timeout = 0,
    ?int $offset = null,
    ?array $allowed_updates = null
): array {
    return _prepareAndMakeRequest(__FUNCTION__, get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _autoFillSpecifiedParameters($parameters) {
    if (key_exists('chat_id', $parameters) && !$parameters['chat_id']) {
        $parameters['chat_id'] = chatId();
    }
    if (key_exists('user_id', $parameters) && !$parameters['user_id']) {
        $parameters['user_id'] = userId();
    }
    if (key_exists('from_chat_id', $parameters) && !$parameters['from_chat_id']) {
        $parameters['from_chat_id'] = chatId();
    }
    if (key_exists('message_id', $parameters) && !$parameters['message_id']) {
        $parameters['message_id'] = messageId();
    }
    if (key_exists('callback_query_id', $parameters) && !$parameters['callback_query_id']) {
        $parameters['callback_query_id'] = callbackQueryId();
    }
    if (key_exists('inline_query_id', $parameters) && !$parameters['inline_query_id']) {
        $parameters['inline_query_id'] = inlineQueryId();
    }
    if (key_exists('media', $parameters) && $parameters['media']) {
        $parameters['media'] = json_encode($parameters['media']);
    }
    if (key_exists('reply_markup', $parameters) && $parameters['reply_markup']) {
        $parameters['reply_markup'] = json_encode($parameters['reply_markup']);
    }
    if (key_exists('options', $parameters) && $parameters['options']) {
        $parameters['options'] = json_encode($parameters['options']);
    }
    $fileType = current(array_intersect_key(array_keys($parameters), fileTypes()));
    if ($fileType && file_exists(strval($filePath = realpath($parameters[$fileType])))) {
        $parameters[$fileType] = new CURLFile($filePath);
    }
    return $parameters;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _makeRequest(string $method, array $parameters = [], array $options = []): array {
    $baseUrl = $options['api_base_url'] ?? _config('api_base_url');
    if (!$baseUrl || !filter_var($baseUrl, FILTER_VALIDATE_URL)) {
        throw new Exception("The api_base_url option is not a valid URL or IP address!");
    }
    $token = $options['token'] ?? _config('token');
    if (!$token) {
        throw new Exception("The bot token is not specified!");
    }
    $url = "{$baseUrl}/bot{$token}/{$method}";
    $ch = curl_init($url);
    $curlOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $parameters,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_SESSIONID_CACHE => true,
        CURLOPT_TCP_FASTOPEN => true,
        CURLOPT_TCP_NODELAY => true,
        CURLOPT_TIMEOUT => 3,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_FORBID_REUSE => false,
        CURLOPT_FRESH_CONNECT => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
    ] + ($options['default_curl_options'] ?? _config('default_curl_options'));
    curl_setopt_array($ch, $curlOptions);
    $responseBody = curl_exec($ch);
    curl_close($ch);
    if (curl_errno($ch)) {
        throw new \Exception('CURL ERROR: '.curl_error($ch));
    }
    $response = json_decode($responseBody, true);
    if (isset($response['ok']) && !$response['ok']) {
        $handlers = _config('handlers');
        if (isset($handlers['api_error'])) {
            return $handlers['api_error']($response);
        }
    }
    return $response;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _getCommonKeys(array $array1, array $array2): array {
    return array_intersect($array1, array_keys($array2));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _config(?string $keys = null): mixed {
    $array = $GLOBALS['_devdasher/ptb'];
    if (!$keys) {
        return $array;
    }
    foreach (explode('.', $keys) as $key) {
        if (!isset($array[$key])) {
            return null;
            throw new \Exception("The key '{$key}' does not exist in the config!");
        }
        $array = $array[$key];
    }
    return $array;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _arrayGet(?array $data, string $keys): mixed {
    if (is_null($data)) {
        return null;
    }
    foreach (explode('.', $keys) as $key) {
        if (!isset($data[$key])) {
            throw new \Exception("The key '{$key}' does not exist!");
        }
        $data = $data[$key];
    }
    return $data;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _setOrPushValue(array &$array, mixed $value, ?string $keys = null, bool $push = false): void {
    if (!$keys) {
        $arr[] = $value;
    } else {
        $keys = explode('.', $keys);
        $currentArr = &$array;
        foreach ($keys as $key) {
            if (!isset($currentArr[$key])) {
                if ($push && empty($currentArr)) {
                    $currentArr = [];
                }
                $currentArr[$key] = [];
            }
            $currentArr = &$currentArr[$key];
        }
        if ($push) {
            $currentArr[] = $value;
        } else {
            $currentArr = $value;
        }
    }
    
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _setUpdate(array $update): void {
    _setOrPushValue($GLOBALS['_devdasher/ptb'], $update, 'update');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _addHandler(Closure $closure, ?string $keys = null, bool $push = false): void {
    if (!isset($GLOBALS['_devdasher/ptb']['handlers'])) {
        $GLOBALS['_devdasher/ptb']['handlers'] = [];
    }
    _setOrPushValue($GLOBALS['_devdasher/ptb']['handlers'], $closure, $keys, $push);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _addMiddleware(Closure $closure, ?string $keys = null): void {
    if (!isset($GLOBALS['_devdasher/ptb']['middlewares'])) {
        $GLOBALS['_devdasher/ptb']['middlewares'] = [];
    }
    _setOrPushValue($GLOBALS['_devdasher/ptb']['middlewares'], $closure, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _processUpdate() {
    $middlewares = _config('middlewares');
    if ($middlewares) {
        _fireMiddlewares($middlewares);
    }
    $handlers = _config('handlers');
    $updateType = updateType();
    $fallbackHandlers = $handlers['fallback'] ?? null;
    try {
        if (!isset($handlers[$updateType])) {
            if (isset($fallbackHandlers[$updateType])) {
                return $fallbackHandlers[$updateType]();
            }
            if (isset($fallbackHandlers['self'])) {
                return $fallbackHandlers['self']();
            }
            return;
        }
        $updateTypeHandlers = $handlers[$updateType];
        if (
            in_array($updateType, [
                UPDATE_TYPE_MESSAGE,
                UPDATE_TYPE_EDITED_MESSAGE,
                UPDATE_TYPE_CHANNEL_POST,
                UPDATE_TYPE_EDITED_CHANNEL_POST,
            ])
            && isset($updateTypeHandlers[$messageType = messageType()])
        ) {
            if ($messageType === MESSAGE_TYPE_TEXT) {
                $text = text();
                var_dump($text);
                foreach ($updateTypeHandlers[$messageType] as $pattern => $callable) {
                    $parameters = _getCallableParameters($pattern, $text);
                    if (is_null($parameters)) {
                        continue;
                    }
                    return $callable(...$parameters);
                }
            } elseif (in_array($messageType, messageTypes())) {
                return $updateTypeHandlers[$messageType]();
            }
        } elseif ($updateType === UPDATE_TYPE_CALLBACK_QUERY) {
            $callbackData = callbackQueryData();
            foreach ($updateTypeHandlers['data'] as $pattern => $callable) {
                $parameters = _getCallableParameters($pattern, $callbackData);
                if (is_null($parameters)) {
                    continue;
                }
                return $callable(...$parameters);
            }
        }
        if (isset($updateTypeHandlers['self'])) {
            return $updateTypeHandlers['self']();
        }
        if (isset($fallbackHandlers[$updateType])) {
            return $fallbackHandlers[$updateType]();
        }
        if (isset($fallbackHandlers['self'])) {
            return $fallbackHandlers['self']();
        }
    } catch (Throwable $e) {
        if (isset($handlers['exception'])) {
            return $handlers['exception']($e);
        }
        throw $e;
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _getCallableParameters(string $pattern, string $value): ?array {
    $pattern = preg_replace(
        pattern: _REGEX_FIND_PLACEHOLDERS,
        replacement: _REGEX_PLACEHOLDERS_REPLACEMENT,
        subject: addcslashes($pattern, '/')
    );
    if (!preg_match("/^{$pattern}$/i", $value, $matches)) {
        return null;
    }
    unset($matches[0]);
    $parameters = array_unique($matches);
    return $parameters;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _fireMiddlewares(array $middlewares) {
    $middlewares = _config('middlewares');
    foreach ($middlewares as $middleware) {
        $middleware();
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _fireHandlers(array $handlers, string $value = ''): mixed {
    foreach ($handlers as $pattern => $handler) {
        if (is_string($pattern)) {
            $pattern = preg_replace('/\{([^}]+)\}/', '(?P<$1>\w+)', addcslashes($pattern, '/'));
            if (!preg_match("/^{$pattern}$/", $value, $matches)) {
                continue;
            }
            unset($matches[0]);
            $parameters = array_unique($matches);
            return $handler(...$parameters);
        } else {
            return $handler();
        }
    }
    return _fireFallback();
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _fireFallback(): mixed {
    $fallback = _config('handlers.fallback') ?? null;
    return $fallback ? $fallback() : null;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _getData(array $data, ?string $keys = null): mixed {
    if (!$keys) {
        return $data;
    }
    return _arrayGet($data, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _prepareFuncParameters(array $parameters): array {
    return _removeNullValues(_autoFillSpecifiedParameters($parameters));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _removeNullValues(array $array): array {
    return array_filter($array, fn($value) => $value !== null);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _prepareAndMakeRequest(string $function, array $funcParameters = [], array $requestOptions = []): array {
    return _makeRequest(basename(strtr($function, '\\', '/')), _prepareFuncParameters($funcParameters), $requestOptions);
}
