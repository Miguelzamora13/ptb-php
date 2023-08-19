<?php

/**
 * This file is part of the PTB-PHP (Procedural Telegram Bot - PHP) library, which provides an easy way to interact with the Telegram BOT API using Procedural programming in PHP.
 *
 * The PTB library is distributed under the terms of the GNU General Public License and is free to use, modify, and redistribute.
 * 
 * This file contains a set of functions that are available in the Telegram BOT API documentation.
 *
 * Please note that as the developer of the PTB-PHP library, I do not make any guarantees about its performance or functionality. The library may contain bugs or errors in any version.
 * 
 * It is important to thoroughly test the library and ensure its compatibility with your specific use case before deploying it in a production environment.
 * 
 * By using the PTB-PHP library, you acknowledge that you are fully responsible for its usage and any consequences that may arise from it.
 *
 * If you encounter any issues or have any questions about the library, please feel free to contact me.
 *
 * For more information about the PTB-PHP library, please visit its GitHub page.
 *
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/devdasher/ptb-php
 * @link http://t.me/devdasher
 */
namespace DevDasher\PTB_PHP\Handlers;

use Exception;

use function DevDasher\PTB_PHP\Config\addHandler;
use function DevDasher\PTB_PHP\Config\addMiddleware;
use function DevDasher\PTB_PHP\Config\getHandlersCommonParameters;
use function DevDasher\PTB_PHP\Telegram\Helpers\getUpdateTypes;

function middleware(array|string|callable $callable, ?string $name = null): void {
    addMiddleware($callable, $name);
}

function middlewares(array $callables): void {
    foreach ($callables as $name => $callable) {
        middleware($callable, is_numeric($name) ? null : $name);
    }
}

function onMessageText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.text.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessagePhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.photo", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageAnimation(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.animation", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVideo(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.video", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVideoNote(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.video_note", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageAudio(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.audio", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVoice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.voice", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageDocument(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.document", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageLocation(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.location", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageContact(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.contact", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessagePoll(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.poll', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVenue(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.venue", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageGame(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.game", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageDice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.dice", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageSticker(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.sticker", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageStory(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message.story", ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageNewChatMembers(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.new_chat_members', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageLeftChatMember(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.left_chat_member', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageNewChatTitle(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.new_chat_title', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageNewChatPhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.new_chat_photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageDeleteChatPhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.delete_chat_photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageGroupChatCreated(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.group_chat_created', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageSupergroupChatCreated(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.supergroup_chat_created', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageChannelChatCreated(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.channel_chat_created', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageAutoDeleteTimerChanged(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.message_auto_delete_timer_changed', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageMigrateToChatId(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.migrate_to_chat_id', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageMigrateFromChatId(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.migrate_from_chat_id', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessagePinnedMessage(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.pinned_message', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageInvoice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.invoice', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageSuccessfulPayment(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.successful_payment', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageUserShared(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.user_shared', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageChatShared(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.chat_shared', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageConnectedWebsite(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.connected_website', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageWriteAccessAllowed(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.write_access_allowed', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessagePassportData(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.passport_data', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageProximityAlertTriggered(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.proximity_alert_triggered', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageForumTopicCreated(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.forum_topic_created', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageForumTopicEdited(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.forum_topic_edited', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageForumTopicClosed(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.forum_topic_closed', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageForumTopicReopened(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.forum_topic_reopened', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageGeneralForumTopicHidden(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.general_forum_topic_hidden', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageGeneralForumTopicUnhidden(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.general_forum_topic_unhidden', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVideoChatScheduled(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.video_chat_scheduled', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVideoChatStarted(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.video_chat_started', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVideoChatEnded(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.video_chat_ended', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageVideoChatParticipantsInvited(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.video_chat_participants_invited', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessageWebAppData(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('message.web_app_data', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMessage(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("message", ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("edited_message.text.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessagePhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageAnimation(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.animation', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageVideo(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.video', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageVideoNote(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.video_note', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageAudio(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.audio', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageVoice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.voice', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessageDocument(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message.document', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedMessage(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_message', ...getHandlersCommonParameters(get_defined_vars()));
}

function onCallbackQueryData(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("callback_query.data.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onCallbackQuery(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('callback_query', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("channel_post.text.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostPhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostAnimation(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.animation', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVideo(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.video', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVideoNote(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.video_note', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostAudio(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.audio', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVoice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.voice', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostDocument(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.document', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostLocation(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.location', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostContact(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.contact', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostPoll(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.poll', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVenue(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.venue', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostGame(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.game', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostDice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.dice', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostSticker(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.sticker', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostStory(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.story', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostNewChatTitle(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.new_chat_title', ...getHandlersCommonParameters(get_defined_vars()));
}
function onChannelPostNewChatPhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.new_chat_photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostDeleteChatPhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.delete_chat_photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostMessageAutoDeleteTimerChanged(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.message_auto_delete_timer_changed', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostPinnedMessage(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.pinned_message', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVideoChatScheduled(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.video_chat_scheduled', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVideoChatStarted(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.video_chat_started', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVideoChatEnded(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.video_chat_ended', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPostVideoChatParticipantsInvited(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post.video_chat_participants_invited', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChannelPost(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('channel_post', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("edited_channel_post.text.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostPhoto(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.photo', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostAnimation(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.animation', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostVideo(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.video', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostVideoNote(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.video_note', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostAudio(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.audio', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostVoice(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.voice', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPostDocument(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post.document', ...getHandlersCommonParameters(get_defined_vars()));
}

function onEditedChannelPost(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('edited_channel_post', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChatMember(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('chat_member', ...getHandlersCommonParameters(get_defined_vars()));
}

function onMyChatMember(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('my_chat_member', ...getHandlersCommonParameters(get_defined_vars()));
}

function onPoll(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('poll', ...getHandlersCommonParameters(get_defined_vars()));
}

function onPollAnswer(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('poll_answer', ...getHandlersCommonParameters(get_defined_vars()));
}

function onInlineQueryText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("inline_query.query.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onInlineQuery(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('inline_query', ...getHandlersCommonParameters(get_defined_vars()));
}

function onShippingQuery(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('shipping_query', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChatJoinRequest(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('chat_join_request', ...getHandlersCommonParameters(get_defined_vars()));
}


function onPreCheckoutQuery(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('pre_checkout_query', ...getHandlersCommonParameters(get_defined_vars()));
}

function onChosenInlineResultQuery(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("chosen_inline_result.query.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onChosenInlineResultId(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler("chosen_inline_result.result_id.{$pattern}", ...getHandlersCommonParameters(get_defined_vars()));
}

function onChosenInlineResult(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('chosen_inline_result', ...getHandlersCommonParameters(get_defined_vars()));
}

function fallbackOn(
    string $updateType,
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    if (!in_array($updateType, getUpdateTypes())) {
        throw new Exception("Invalid update type '{$updateType}'!");
    }
    addHandler("{$updateType}.fallback", ...getHandlersCommonParameters(get_defined_vars()));
}

function fallback(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('fallback', ...getHandlersCommonParameters(get_defined_vars()));
}

function onException(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('exception', ...getHandlersCommonParameters(get_defined_vars()));
}

function onApiError(
    array|string|callable $callable,
    array|string|callable $local_middlewares = [],
    array|string $skip_global_middlewares = [],
): void {
    addHandler('api_error', ...getHandlersCommonParameters(get_defined_vars()));
}
