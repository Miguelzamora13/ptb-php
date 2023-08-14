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

namespace DevDasher\PTB_PHP\Telegram\Types;

use CURLFile;
use Exception;

use function DevDasher\PTB_PHP\Config\prepareApiTypeFields;

/**
 * This [object](https://core.telegram.org/bots/api#available-types) represents an incoming update.
 * 
 * At most one of the optional parameters can be present in any given update.
 *
 * @param integer|null $update_id
 * @param array|null $message
 * @param array|null $editedgetMessage
 * @param array|null $channel_post
 * @param array|null $edited_channel_post
 * @param array|null $inline_query
 * @param array|null $chosen_inline_result
 * @param array|null $callback_query
 * @param array|null $shipping_query
 * @param array|null $pre_checkout_query
 * @param array|null $poll
 * @param array|null $poll_answer
 * @param array|null $my_chat_member
 * @param array|null $chat_member
 * @param array|null $chat_join_request
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#update
 */
function Update(
    int $update_id = null,
    ?array $message = null,
    ?array $editedgetMessage = null,
    ?array $channel_post = null,
    ?array $edited_channel_post = null,
    ?array $inline_query = null,
    ?array $chosen_inline_result = null,
    ?array $callback_query = null,
    ?array $shipping_query = null,
    ?array $pre_checkout_query = null,
    ?array $poll = null,
    ?array $poll_answer = null,
    ?array $my_chat_member = null,
    ?array $chat_member = null,
    ?array $chat_join_request = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes the current status of a webhook.
 *
 * @param string $url
 * @param boolean $has_custom_certificate
 * @param integer $pendinggetUpdate_count
 * @param string|null $ip_address
 * @param integer|null $last_error_date
 * @param string|null $last_errorgetMessage
 * @param integer|null $last_synchronization_error_date
 * @param integer|null $max_connections
 * @param array|null $allowedgetUpdates
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#webhookinfo
 */
function WebhookInfo(
    string $url,
    bool $has_custom_certificate,
    int $pendinggetUpdate_count,
    ?string $ip_address = null,
    ?int $last_error_date = null,
    ?string $last_errorgetMessage = null,
    ?int $last_synchronization_error_date = null,
    ?int $max_connections = null,
    ?array $allowedgetUpdates = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a Telegram user or bot.
 *
 * @param integer $id
 * @param boolean $is_bot
 * @param string $first_name
 * @param string|null $last_name
 * @param string|null $username
 * @param string|null $language_code
 * @param boolean|null $is_premium
 * @param boolean|null $added_to_attachment_menu
 * @param boolean|null $can_join_groups
 * @param boolean|null $can_read_all_groupgetMessages
 * @param boolean|null $supports_inline_queries
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#user
 */
function User(
    int $id,
    bool $is_bot,
    string $first_name,
    ?string $last_name = null,
    ?string $username = null,
    ?string $language_code = null,
    ?bool $is_premium = null,
    ?bool $added_to_attachment_menu = null,
    ?bool $can_join_groups = null,
    ?bool $can_read_all_groupgetMessages = null,
    ?bool $supports_inline_queries = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a chat.
 *
 * @param integer $id
 * @param string $type
 * @param string|null $title
 * @param string|null $username
 * @param string|null $first_name
 * @param string|null $last_name
 * @param boolean|null $is_forum
 * @param array|null $photo
 * @param array|null $active_usernames
 * @param string|null $emoji_status_custom_emoji_id
 * @param string|null $bio
 * @param boolean|null $has_private_forwards
 * @param boolean|null $has_restricted_voice_and_videogetMessages
 * @param boolean|null $join_to_sendgetMessages
 * @param boolean|null $join_by_request
 * @param string|null $description
 * @param string|null $invite_link
 * @param array|null $pinnedgetMessage
 * @param array|null $permissions
 * @param integer|null $slow_mode_delay
 * @param integer|null $message_auto_delete_time
 * @param boolean|null $has_aggressive_anti_spam_enabled
 * @param boolean|null $has_hidden_members
 * @param boolean|null $has_protected_content
 * @param string|null $sticker_set_name
 * @param boolean|null $can_set_sticker_set
 * @param integer|null $linked_chat_id
 * @param array|null $location
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chat
 */
function Chat(
    int $id,
    string $type,
    ?string $title = null,
    ?string $username = null,
    ?string $first_name = null,
    ?string $last_name = null,
    ?bool $is_forum = null,
    ?array $photo = null,
    ?array $active_usernames = null,
    ?string $emoji_status_custom_emoji_id = null,
    ?string $bio = null,
    ?bool $has_private_forwards = null,
    ?bool $has_restricted_voice_and_videogetMessages = null,
    ?bool $join_to_sendgetMessages = null,
    ?bool $join_by_request = null,
    ?string $description = null,
    ?string $invite_link = null,
    ?array $pinnedgetMessage = null,
    ?array $permissions = null,
    ?int $slow_mode_delay = null,
    ?int $message_auto_delete_time = null,
    ?bool $has_aggressive_anti_spam_enabled = null,
    ?bool $has_hidden_members = null,
    ?bool $has_protected_content = null,
    ?string $sticker_set_name = null,
    ?bool $can_set_sticker_set = null,
    ?int $linked_chat_id = null,
    ?array $location = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a message.
 *
 * @param integer|null $message_id
 * @param integer|null $date
 * @param array|null $chat
 * @param integer|null $message_thread_id
 * @param array|null $from
 * @param array|null $sender_chat
 * @param array|null $forward_from
 * @param array|null $forward_from_chat
 * @param integer|null $forward_fromgetMessage_id
 * @param string|null $forward_signature
 * @param string|null $forward_sender_name
 * @param integer|null $forward_date
 * @param boolean|null $is_topicgetMessage
 * @param boolean|null $is_automatic_forward
 * @param array|null $reply_togetMessage
 * @param array|null $via_bot
 * @param integer|null $edit_date
 * @param boolean|null $has_protected_content
 * @param string|null $media_group_id
 * @param string|null $author_signature
 * @param string|null $text
 * @param array|null $entities
 * @param array|null $animation
 * @param array|null $audio
 * @param array|null $document
 * @param array|null $photo
 * @param array|null $sticker
 * @param array|null $video
 * @param array|null $video_note
 * @param array|null $voice
 * @param string|null $caption
 * @param array|null $caption_entities
 * @param boolean|null $has_media_spoiler
 * @param array|null $contact
 * @param array|null $dice
 * @param array|null $game
 * @param array|null $poll
 * @param array|null $venue
 * @param array|null $location
 * @param array|null $new_chat_members
 * @param array|null $left_chat_member
 * @param string|null $new_chat_title
 * @param array|null $new_chat_photo
 * @param boolean|null $delete_chat_photo
 * @param boolean|null $group_chat_created
 * @param boolean|null $supergroup_chat_created
 * @param boolean|null $channel_chat_created
 * @param array|null $message_auto_delete_timer_changed
 * @param integer|null $migrate_to_chat_id
 * @param integer|null $migrate_from_chat_id
 * @param array|null $pinnedgetMessage
 * @param array|null $invoice
 * @param array|null $successful_payment
 * @param array|null $user_shared
 * @param array|null $chat_shared
 * @param string|null $connected_website
 * @param array|null $write_access_allowed
 * @param array|null $passport_data
 * @param array|null $proximity_alert_triggered
 * @param array|null $forum_topic_created
 * @param array|null $forum_topic_edited
 * @param array|null $forum_topic_closed
 * @param array|null $forum_topic_reopened
 * @param array|null $general_forum_topic_hidden
 * @param array|null $general_forum_topic_unhidden
 * @param array|null $video_chat_scheduled
 * @param array|null $video_chat_started
 * @param array|null $video_chat_ended
 * @param array|null $video_chat_participants_invited
 * @param array|null $web_app_data
 * @param array|null $reply_markup
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#message
 */
function Message(
    ?int $message_id = null,
    ?int $date = null,
    ?array $chat = null,
    ?int $message_thread_id = null,
    ?array $from = null,
    ?array $sender_chat = null,
    ?array $forward_from = null,
    ?array $forward_from_chat = null,
    ?int $forward_fromgetMessage_id = null,
    ?string $forward_signature = null,
    ?string $forward_sender_name = null,
    ?int $forward_date = null,
    ?bool $is_topicgetMessage = null,
    ?bool $is_automatic_forward = null,
    ?array $reply_togetMessage = null,
    ?array $via_bot = null,
    ?int $edit_date = null,
    ?bool $has_protected_content = null,
    ?string $media_group_id = null,
    ?string $author_signature = null,
    ?string $text = null,
    ?array $entities = null,
    ?array $animation = null,
    ?array $audio = null,
    ?array $document = null,
    ?array $photo = null,
    ?array $sticker = null,
    ?array $video = null,
    ?array $video_note = null,
    ?array $voice = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?bool $has_media_spoiler = null,
    ?array $contact = null,
    ?array $dice = null,
    ?array $game = null,
    ?array $poll = null,
    ?array $venue = null,
    ?array $location = null,
    ?array $new_chat_members = null,
    ?array $left_chat_member = null,
    ?string $new_chat_title = null,
    ?array $new_chat_photo = null,
    ?bool $delete_chat_photo = null,
    ?bool $group_chat_created = null,
    ?bool $supergroup_chat_created = null,
    ?bool $channel_chat_created = null,
    ?array $message_auto_delete_timer_changed = null,
    ?int $migrate_to_chat_id = null,
    ?int $migrate_from_chat_id = null,
    ?array $pinnedgetMessage = null,
    ?array $invoice = null,
    ?array $successful_payment = null,
    ?array $user_shared = null,
    ?array $chat_shared = null,
    ?string $connected_website = null,
    ?array $write_access_allowed = null,
    ?array $passport_data = null,
    ?array $proximity_alert_triggered = null,
    ?array $forum_topic_created = null,
    ?array $forum_topic_edited = null,
    ?array $forum_topic_closed = null,
    ?array $forum_topic_reopened = null,
    ?array $general_forum_topic_hidden = null,
    ?array $general_forum_topic_unhidden = null,
    ?array $video_chat_scheduled = null,
    ?array $video_chat_started = null,
    ?array $video_chat_ended = null,
    ?array $video_chat_participants_invited = null,
    ?array $web_app_data = null,
    ?array $reply_markup = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a unique message identifier.
 *
 * @param integer $messageId
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#messageid
 */
function MessageId(int $messageId): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @param string $type
 * @param integer $offset
 * @param integer $length
 * @param string|null $url
 * @param array|null $user
 * @param string|null $language
 * @param string|null $custom_emoji_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#messageentity
 */
function MessageEntity(
    string $type,
    int $offset,
    int $length,
    ?string $url = null,
    ?array $user = null,
    ?string $language = null,
    ?string $custom_emoji_id = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents one size of a photo or a [file](https://core.telegram.org/bots/api#document) / [sticker](https://core.telegram.org/bots/api#sticker) thumbnail.
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $width
 * @param integer $height
 * @param integer|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#photosize
 */
function PhotoSize(
    string $file_id,
    string $file_unique_id,
    int $width,
    int $height,
    ?int $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $width
 * @param integer $height
 * @param integer $duration
 * @param array|null $thumbnail
 * @param string|null $file_name
 * @param string|null $mime_type
 * @param integer|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#animation
 */
function Animation(
    string $file_id,
    string $file_unique_id,
    int $width,
    int $height,
    int $duration,
    ?array $thumbnail = null,
    ?string $file_name = null,
    ?string $mime_type = null,
    ?int $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $duration
 * @param string|null $performer
 * @param string|null $title
 * @param string|null $file_name
 * @param string|null $mime_type
 * @param integer|null $file_size
 * @param array|null $thumbnail
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#audio
 */
function Audio(
    string $file_id,
    string $file_unique_id,
    int $duration,
    ?string $performer = null,
    ?string $title = null,
    ?string $file_name = null,
    ?string $mime_type = null,
    ?int $file_size = null,
    ?array $thumbnail = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a general file (as opposed to [photos](https://core.telegram.org/bots/api#photosize), [voice messages](https://core.telegram.org/bots/api#voice) and [audio files](https://core.telegram.org/bots/api#audio)).
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param array|null $thumbnail
 * @param string|null $file_name
 * @param string|null $mime_type
 * @param integer|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#document
 */
function Document(
    string $file_id,
    string $file_unique_id,
    ?array $thumbnail = null,
    ?string $file_name = null,
    ?string $mime_type = null,
    ?int $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a video file.
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $width
 * @param integer $height
 * @param integer $duration
 * @param array|null $thumbnail
 * @param string|null $file_name
 * @param string|null $mime_type
 * @param integer|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#video
 */
function Video(
    string $file_id,
    string $file_unique_id,
    int $width,
    int $height,
    int $duration,
    ?array $thumbnail = null,
    ?string $file_name = null,
    ?string $mime_type = null,
    ?int $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a [video message](https://telegram.org/blog/video-messages-and-telescope) (available in Telegram apps as of [v.4.0](https://telegram.org/blog/video-messages-and-telescope)).
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $length
 * @param integer $duration
 * @param array|null $thumbnail
 * @param integer|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#videonote
 */
function VideoNote(
    string $file_id,
    string $file_unique_id,
    int $length,
    int $duration,
    ?array $thumbnail = null,
    ?int $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a voice note.
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $duration
 * @param string|null $mime_type
 * @param integer|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#voice
 */
function Voice(
    string $file_id,
    string $file_unique_id,
    int $duration,
    ?string $mime_type = null,
    ?int $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a phone contact.
 *
 * @param string $phone_number
 * @param string $first_name
 * @param string|null $last_name
 * @param integer|null $user_id
 * @param string|null $vcard
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#contact
 */
function Contact(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?int $user_id,
    ?string $vcard = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an animated emoji that displays a random value.
 *
 * @param string $emoji
 * @param integer $value
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#dice
 */
function Dice(string $emoji, int $value): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains information about one answer option in a poll.
 *
 * @param string $text
 * @param integer $voter_count
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#polloption
 */
function PollOption(string $text, int $voter_count): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @param string $poll_id
 * @param array $user
 * @param array $option_ids
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#pollanswer
 */
function PollAnswer(string $poll_id, array $user, array $option_ids): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains information about a poll.
 *
 * @param string $id
 * @param string $question
 * @param array $options
 * @param integer $total_voter_count
 * @param boolean $is_closed
 * @param boolean $is_anonymous
 * @param string $type
 * @param boolean $allows_multiple_answers
 * @param integer|null $correct_option_id
 * @param string|null $explanation
 * @param array|null $explanation_entities
 * @param integer|null $open_period
 * @param integer|null $close_date
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#poll
 */
function Poll(
    string $id,
    string $question,
    array $options,
    int $total_voter_count,
    bool $is_closed,
    bool $is_anonymous,
    string $type,
    bool $allows_multiple_answers,
    ?int $correct_option_id = null,
    ?string $explanation = null,
    ?array $explanation_entities = null,
    ?int $open_period = null,
    ?int $close_date = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a point on the map.
 *
 * @param float|string $longitude
 * @param float|string $latitude
 * @param null|float|string|null $horizontal_accuracy
 * @param integer|null $live_period
 * @param integer|null $heading
 * @param integer|null $proximity_alert_radius
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#location
 */
function Location(
    float|string $longitude,
    float|string $latitude,
    null|float|string $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a venue.
 *
 * @param array $location
 * @param string $title
 * @param string $address
 * @param string|null $foursquare_id
 * @param string|null $foursquare_type
 * @param string|null $google_place_id
 * @param string|null $google_place_type
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#venue
 */
function Venue(
    array $location,
    string $title,
    string $address,
    ?string $foursquare_id = null,
    ?string $foursquare_type = null,
    ?string $google_place_id = null,
    ?string $google_place_type = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes data sent from a [Web App](https://core.telegram.org/bots/webapps) to the bot.
 *
 * @param string $data
 * @param string $button_text
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#webappdata
 */
function WebAppData(string $data, string $button_text): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 *
 * @param array $traveler
 * @param array $watcher
 * @param integer $distance
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#proximityalerttriggered      
 */
function ProximityAlertTriggered(array $traveler, array $watcher, int $distance): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @param integer $message_auto_delete_time
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
function MessageAutoDeleteTimerChanged(int $message_auto_delete_time): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @param string $name
 * @param integer $icon_color
 * @param string|null $icon_custom_emoji_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#forumtopiccreated
 */
function ForumTopicCreated(string $name, int $icon_color, ?string $icon_custom_emoji_id = null): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a forum topic closed in the chat. Currently holds no information.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#forumtopicclosed
 */
function ForumTopicClosed(): array {
    return [];
}

/**
 * This object represents a service message about an edited forum topic.
 *
 * @param string|null $name
 * @param string|null $icon_custom_emoji_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#forumtopicedited
 */
function ForumTopicEdited(?string $name = null, ?string $icon_custom_emoji_id = null): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a forum topic reopened in the chat. Currently holds no information.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#forumtopicreopened
 */
function ForumTopicReopened(): array {
    return [];
}

/**
 * This object represents a service message about General forum topic hidden in the chat. Currently holds no information.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#generalforumtopichidden
 */
function GeneralForumTopicHidden(): array {
    return [];
}

/**
 * This object represents a service message about General forum topic unhidden in the chat. Currently holds no information.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#generalforumtopicunhidden
 */
function GeneralForumTopicUnhidden(): array {
    return [];
}

/**
 * This object contains information about the user whose identifier was shared with the bot using a [KeyboardButtonRequestUser](https://core.telegram.org/bots/api#keyboardbuttonrequestuser) button.
 *
 * @param integer $request_id
 * @param integer $user_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#usershared
 */
function UserShared(int $request_id, int $user_id): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains information about the chat whose identifier was shared with the bot using a [KeyboardButtonRequestChat](https://core.telegram.org/bots/api#keyboardbuttonrequestchat) button.
 *
 * @param integer $request_id
 * @param integer $chat_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatshared
 */
function ChatShared(int $request_id, int $chat_id): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to the attachment menu or launching a Web App from a link.
 *
 * @param string|null $web_app_name
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#writeaccessallowed
 */
function WriteAccessAllowed(?string $web_app_name = null): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @param integer $start_date
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#videochatscheduled
 */
function VideoChatScheduled(int $start_date): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about a video chat started in the chat. Currently holds no information.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#videochatstarted
 */
function VideoChatStarted(): array {
    return [];
}

/**
 * This object represents a service message about a video chat ended in the chat.
 *
 * @param integer $duration
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#videochatended
 */
function VideoChatEnded(int $duration): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a service message about new members invited to a video chat.
 *
 * @param array $users
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
function VideoChatParticipantsInvited(array $users): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represent a user's profile pictures.
 *
 * @param integer $total_count
 * @param array $photos
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#userprofilephotos
 */
function UserProfilePhotos(int $total_count, array $photos): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
 *
 * The maximum file size to download is 20 MB
 * 
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer|null $file_size
 * @param string|null $file_path
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#file
 */
function File(
    string $file_id,
    string $file_unique_id,
    ?int $file_size = null,
    ?string $file_path = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes a [Web App](https://core.telegram.org/bots/webapps).
 *
 * @param string $url
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#webappinfo
 */
function WebAppInfo(string $url): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a [custom keyboard](https://core.telegram.org/bots/features#keyboards) with reply options (see [Introduction to bots](https://core.telegram.org/bots/features#keyboards) for details and examples).
 *
 * @param array $keyboard
 * @param boolean|null $is_persistent
 * @param boolean|null $resize_keyboard
 * @param boolean|null $one_time_keyboard
 * @param boolean|null $selective
 * @param string|null $input_field_placeholder
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 */
function ReplyKeyboardMarkup(
    array $keyboard,
    ?bool $is_persistent = null,
    ?bool $resize_keyboard = null,
    ?bool $one_time_keyboard = null,
    ?bool $selective = null,
    ?string $input_field_placeholder = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents one button of the reply keyboard. For simple text buttons, String can be used instead of this object to specify the button text. The optional fields web_app, request_user, request_chat, request_contact, request_location, and request_poll are mutually exclusive.
 * 
 * Note: request_contact and request_location options will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.
 * 
 * Note: request_poll option will only work in Telegram versions released after 23 January, 2020. Older clients will display unsupported message.
 * 
 * Note: web_app option will only work in Telegram versions released after 16 April, 2022. Older clients will display unsupported message.
 * 
 * Note: request_user and request_chat options will only work in Telegram versions released after 3 February, 2023. Older clients will display unsupported message.
 *
 * @param string $text
 * @param array|null $request_user
 * @param array|null $request_chat
 * @param boolean|null $request_contact
 * @param boolean|null $request_location
 * @param array|null $request_poll
 * @param array|null $web_app
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
function KeyboardButton(
    string $text,
    ?array $request_user = null,
    ?array $request_chat = null,
    ?bool $request_contact = null,
    ?bool $request_location = null,
    ?array $request_poll = null,
    ?array $web_app = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared with the bot when the corresponding button is pressed. [More about requesting users »](https://core.telegram.org/bots/features#chat-and-user-selection)
 *
 * @param integer $request_id
 * @param boolean|null $user_is_bot
 * @param boolean|null $user_is_premium
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestuser
 */
function KeyboardButtonRequestUser(
    int $request_id,
    ?bool $user_is_bot = null,
    ?bool $user_is_premium = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object defines the criteria used to request a suitable chat. The identifier of the selected chat will be shared with the bot when the corresponding button is pressed. [More about requesting chats »](https://core.telegram.org/bots/features#chat-and-user-selection)
 *
 * @param integer $request_id
 * @param boolean $chat_is_channel
 * @param boolean|null $chat_is_forum
 * @param boolean|null $chat_has_username
 * @param boolean|null $chat_is_created
 * @param array|null $user_administrator_rights
 * @param array|null $bot_administrator_rights
 * @param boolean|null $bot_is_member
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
function KeyboardButtonRequestChat(
    int $request_id,
    bool $chat_is_channel,
    ?bool $chat_is_forum = null,
    ?bool $chat_has_username = null,
    ?bool $chat_is_created = null,
    ?array $user_administrator_rights = null,
    ?array $bot_administrator_rights = null,
    ?bool $bot_is_member = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 *
 * @param string|null $type
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
function KeyboardButtonPollType(?string $type = null): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user presses a button (see [ReplyKeyboardMarkup](https://core.telegram.org/bots/api#replykeyboardmarkup)).
 *
 * @param boolean $remove_keyboard
 * @param boolean|null $selective
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#replykeyboardremove
 */
function ReplyKeyboardRemove(bool $remove_keyboard = true, ?bool $selective = null): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) that appears right next to the message it belongs to.
 * 
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.
 *
 * @param array $inline_keyboard
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
function InlineKeyboardMarkup(array $inline_keyboard): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 * @param string $text
 * @param string|null $url
 * @param string|null $callback_data
 * @param array|null $web_app
 * @param array|null $login_url
 * @param string|null $switch_inline_query
 * @param array|null $switch_inline_query_chosen_chat
 * @param array|null $callback_game
 * @param boolean|null $pay
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
function InlineKeyboardButton(
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
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in:
 *
 * Telegram apps support these buttons as of [version 5.7](https://telegram.org/blog/privacy-discussions-web-bots#meet-seamless-web-bots).
 * 
 * Sample bot: [@discussbot](https://t.me/discussbot)
 * 
 * @param string $url
 * @param string|null $forward_text
 * @param string|null $bot_username
 * @param boolean|null $request_write_access
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#loginurl
 */
function LoginUrl(
    string $url,
    ?string $forward_text = null,
    ?string $bot_username = null,
    ?bool $request_write_access = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 *
 * @param string|null $query
 * @param boolean|null $allow_user_chats
 * @param boolean|null $allow_bot_chats
 * @param boolean|null $allow_group_chats
 * @param boolean|null $allow_channel_chats
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#switchinlinequerychosenchat
 */
function SwitchInlineQueryChosenChat(
    ?string $query = null,
    ?bool $allow_user_chats = null,
    ?bool $allow_bot_chats = null,
    ?bool $allow_group_chats = null,
    ?bool $allow_channel_chats = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an incoming callback query from a callback button in an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards). If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in [inline mode](https://core.telegram.org/bots/api#inline-mode)), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 *
 * NOTE: After the user presses a callback button, Telegram clients will display a progress bar until you call [answerCallbackQuery](https://core.telegram.org/bots/api#answercallbackquery). It is, therefore, necessary to react by calling [answerCallbackQuery](https://core.telegram.org/bots/api#answercallbackquery) even if no notification to the user is needed (e.g., without specifying any of the optional parameters).
 * 
 * @param string $id
 * @param array $from
 * @param array|null $message
 * @param string|null $inlinegetMessage_id
 * @param string|null $chat_instance
 * @param string|null $data
 * @param string|null $game_short_name
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#callbackquery
 */
function CallbackQuery(
    string $id,
    array $from,
    ?array $message = null,
    ?string $inlinegetMessage_id = null,
    ?string $chat_instance = null,
    ?string $data = null,
    ?string $game_short_name = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice [privacy mode](https://core.telegram.org/bots/features#privacy-mode).
 * 
 * Example: A [poll bot](https://t.me/PollBot) for groups runs in privacy mode (only receives commands, replies to its messages and mentions). There could be two ways to create a new poll:
 * 
 * - Explain the user how to send a command with parameters (e.g. /newpoll question answer1 answer2). May be appealing for hardcore users but lacks modern day polish.
 * 
 * - Guide the user through a step-by-step process. 'Please send me your question', 'Cool, now let's add the first answer option', 'Great. Keep adding answer options, then send /done when you're ready'.
 * 
 * The last option is definitely more attractive. And if you use [ForceReply](https://core.telegram.org/bots/api#forcereply) in your bot's questions, it will receive the user's answers even if it only receives replies, commands and mentions - without any extra work for the user.
 * 
 *
 * @param boolean $force_reply
 * @param string|null $input_field_placeholder
 * @param boolean|null $selective
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#forcereply
 */
function ForceReply(
    bool $force_reply = true,
    ?string $input_field_placeholder = null,
    ?bool $selective = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a chat photo.
 *
 * @param string $small_file_id
 * @param string $small_file_unique_id
 * @param string $big_file_id
 * @param string $big_file_unique_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatphoto
 */
function ChatPhoto(
    string $small_file_id,
    string $small_file_unique_id,
    string $big_file_id,
    string $big_file_unique_id,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents an invite link for a chat.
 *
 * @param string $invite_link
 * @param array $creator
 * @param boolean $creates_join_request
 * @param boolean $is_primary
 * @param boolean $is_revoked
 * @param string|null $name
 * @param integer|null $expire_date
 * @param integer|null $member_limit
 * @param integer|null $pending_join_request_count
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatinvitelink
 */
function ChatInviteLink(
    string $invite_link,
    array $creator,
    bool $creates_join_request,
    bool $is_primary,
    bool $is_revoked,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?int $pending_join_request_count = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the rights of an administrator in a chat.
 *
 * @param boolean|null $is_anonymous
 * @param boolean|null $can_manage_chat
 * @param boolean|null $can_deletegetMessages
 * @param boolean|null $can_manage_video_chats
 * @param boolean|null $can_restrict_members
 * @param boolean|null $can_promote_members
 * @param boolean|null $can_change_info
 * @param boolean|null $can_invite_users
 * @param boolean|null $can_postgetMessages
 * @param boolean|null $can_editgetMessages
 * @param boolean|null $can_pingetMessages
 * @param boolean|null $can_manage_topics
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatadministratorrights
 */
function ChatAdministratorRights(
    ?bool $is_anonymous = null,
    ?bool $can_manage_chat = null,
    ?bool $can_deletegetMessages = null,
    ?bool $can_manage_video_chats = null,
    ?bool $can_restrict_members = null,
    ?bool $can_promote_members = null,
    ?bool $can_change_info = null,
    ?bool $can_invite_users = null,
    ?bool $can_postgetMessages = null,
    ?bool $can_editgetMessages = null,
    ?bool $can_pingetMessages = null,
    ?bool $can_manage_topics = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that owns the chat and has all administrator privileges.
 *
 * @param string $status
 * @param array $user
 * @param boolean $is_anonymous
 * @param string|null $custom_title
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmemberowner
 */
function ChatMemberOwner(
    string $status,
    array $user,
    bool $is_anonymous,
    ?string $custom_title = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has some additional privileges.
 *
 * @param string $status
 * @param array $user
 * @param boolean $can_be_edited
 * @param boolean $is_anonymous
 * @param boolean $can_manage_chat
 * @param boolean $can_deletegetMessages
 * @param boolean $can_manage_video_chats
 * @param boolean $can_restrict_members
 * @param boolean $can_promote_members
 * @param boolean $can_change_info
 * @param boolean $can_invite_users
 * @param boolean|null $can_postgetMessages
 * @param boolean|null $can_editgetMessages
 * @param boolean|null $can_pingetMessages
 * @param boolean|null $can_manage_topics
 * @param boolean|null $custom_title
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmemberadministrator
 */
function ChatMemberAdministrator(
    string $status,
    array $user,
    bool $can_be_edited,
    bool $is_anonymous,
    bool $can_manage_chat,
    bool $can_deletegetMessages,
    bool $can_manage_video_chats,
    bool $can_restrict_members,
    bool $can_promote_members,
    bool $can_change_info,
    bool $can_invite_users,
    ?bool $can_postgetMessages = null,
    ?bool $can_editgetMessages = null,
    ?bool $can_pingetMessages = null,
    ?bool $can_manage_topics = null,
    ?bool $custom_title = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has no additional privileges or restrictions.
 *
 * @param string $status
 * @param array $user
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmembermember
 */
function ChatMemberMember(string $status, array $user): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that is under certain restrictions in the chat. Supergroups only.
 *
 * @param string $status
 * @param array $user
 * @param boolean $is_member
 * @param boolean $can_sendgetMessages
 * @param boolean $can_send_audios
 * @param boolean $can_send_documents
 * @param boolean $can_send_photos
 * @param boolean $can_send_videos
 * @param boolean $can_send_video_notes
 * @param boolean $can_send_voice_notes
 * @param boolean $can_send_polls
 * @param boolean $can_send_othergetMessages
 * @param boolean $can_add_web_page_previews
 * @param boolean $can_change_info
 * @param boolean $can_invite_users
 * @param boolean $can_pingetMessages
 * @param boolean $can_manage_topics
 * @param integer $until_date
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmemberrestricted
 */
function ChatMemberRestricted(
    string $status,
    array $user,
    bool $is_member,
    bool $can_sendgetMessages,
    bool $can_send_audios,
    bool $can_send_documents,
    bool $can_send_photos,
    bool $can_send_videos,
    bool $can_send_video_notes,
    bool $can_send_voice_notes,
    bool $can_send_polls,
    bool $can_send_othergetMessages,
    bool $can_add_web_page_previews,
    bool $can_change_info,
    bool $can_invite_users,
    bool $can_pingetMessages,
    bool $can_manage_topics,
    int $until_date,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that isn't currently a member of the chat, but may join it themselves.
 *
 * @param string $status
 * @param array $user
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmemberleft
 */
function ChatMemberLeft(string $status, array $user): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @param string $status
 * @param array $user
 * @param integer $until_date
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmemberbanned
 */
function ChatMemberBanned(string $status, array $user, int $until_date): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents changes in the status of a chat member.
 *
 * @param array $chat
 * @param array $from
 * @param integer $date
 * @param array $old_chat_member
 * @param array $new_chat_member
 * @param array|null $invite_link
 * @param boolean|null $via_chat_folder_invite_link
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatmemberupdated
 */
function ChatMemberUpdated(
    array $chat,
    array $from,
    int $date,
    array $old_chat_member,
    array $new_chat_member,
    ?array $invite_link = null,
    ?bool $via_chat_folder_invite_link = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a join request sent to a chat.
 *
 * @param array $chat
 * @param array $from
 * @param integer $user_chat_id
 * @param integer $date
 * @param string|null $bio
 * @param array|null $invite_link
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatjoinrequest
 */
function ChatJoinRequest(
    array $chat,
    array $from,
    int $user_chat_id,
    int $date,
    ?string $bio = null,
    ?array $invite_link = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @param boolean|null $can_sendgetMessages
 * @param boolean|null $can_send_audios
 * @param boolean|null $can_send_documents
 * @param boolean|null $can_send_photos
 * @param boolean|null $can_send_videos
 * @param boolean|null $can_send_video_notes
 * @param boolean|null $can_send_voice_notes
 * @param boolean|null $can_send_polls
 * @param boolean|null $can_send_othergetMessages
 * @param boolean|null $can_add_web_page_previews
 * @param boolean|null $can_change_info
 * @param boolean|null $can_invite_users
 * @param boolean|null $can_pingetMessages
 * @param boolean|null $can_manage_topics
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
function ChatPermissions(
    ?bool $can_sendgetMessages = null,
    ?bool $can_send_audios = null,
    ?bool $can_send_documents = null,
    ?bool $can_send_photos = null,
    ?bool $can_send_videos = null,
    ?bool $can_send_video_notes = null,
    ?bool $can_send_voice_notes = null,
    ?bool $can_send_polls = null,
    ?bool $can_send_othergetMessages = null,
    ?bool $can_add_web_page_previews = null,
    ?bool $can_change_info = null,
    ?bool $can_invite_users = null,
    ?bool $can_pingetMessages = null,
    ?bool $can_manage_topics = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a location to which a chat is connected.
 *
 * @param array $location
 * @param string $address
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#chatlocation
 */
function ChatLocation(array $location, string $address): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a forum topic.
 *
 * @param integer $message_thread_id
 * @param string $name
 * @param integer $icon_color
 * @param string|null $icon_custom_emoji_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#forumtopic
 */
function ForumTopic(
    int $message_thread_id,
    string $name,
    int $icon_color,
    ?string $icon_custom_emoji_id = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a bot command.
 *
 * @param string $command
 * @param string $description
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommand
 */
function BotCommand(string $command, string $description): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the default [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands. Default commands are used if no commands with a narrower scope are specified for the user.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopedefault
 */
function BotCommandScopeDefault(): array {
    return prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_DEFAULT]);
}

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all private chats.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
function BotCommandScopeAllPrivateChats(): array {
    return prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS]);
}

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
function BotCommandScopeAllGroupChats(): array {
    return prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_ALL_GROUP_CHATS]);
}

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
function BotCommandScopeAllChatAdministrators(): array {
    return prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_ALL_CHAT_ADMINISTRATORS]);
}

/**
 * Represents the scope of bot commands, covering a specific chat.
 *
 * @param null|integer|string|null $chat_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopechat
 */
function BotCommandScopeChat(null|int|string $chat_id = null): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => BOT_COMMAND_SCOPE_CHAT,
    ]));
}

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 *
 * @param null|integer|string|null $chat_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopechatadministrators
 */
function BotCommandScopeChatAdministrators(null|int|string $chat_id = null): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => BOT_COMMAND_SCOPE_CHAT_ADMINISTRATORS,
    ]));
}

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @param null|integer|string|null $chat_id
 * @param integer|null $user_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botcommandscopechatmember
 */
function BotCommandScopeChatMember(null|int|string $chat_id = null, ?int $user_id = null): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => BOT_COMMAND_SCOPE_CHAT_MEMBER,
    ]));
}

/**
 * This object represents the bot's name.
 *
 * @param string $name
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botname
 */
function BotName(string $name): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents the bot's description.
 *
 * @param string $description
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botdescription
 */
function BotDescription(string $description): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents the bot's short description.
 *
 * @param string $short_description
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#botshortdescription
 */
function BotShortDescription(string $short_description): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#menubuttoncommands
 */
function MenuButtonCommands(): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => MENU_BUTTON_TYPE_COMMANDS,
    ]));
}

/**
 * Represents a menu button, which launches a [Web App](https://core.telegram.org/bots/webapps).
 *
 * @param string $text
 * @param array $web_app
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#menubuttonwebapp
 */
function MenuButtonWebApp(string $text, array $web_app): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => MENU_BUTTON_TYPE_WEB_APP,
    ]));
}

/**
 * Describes that no specific value for the menu button was set.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#menubuttondefault
 */
function MenuButtonDefault(): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => MENU_BUTTON_TYPE_DEFAULT,
    ]));
}

/**
 * Describes why a request was unsuccessful.
 *
 * @param integer|null $migrate_to_chat_id
 * @param integer|null $retry_after
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#responseparameters
 */
function ResponseParameters(?int $migrate_to_chat_id = null, ?int $retry_after = null): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a photo to be sent.
 *
 * @param string $media
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param boolean|null $has_spoiler
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputmediaphoto
 */
function InputMediaPhoto(
    string $media,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?bool $has_spoiler = null,
): array {
    return prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_PHOTO], get_defined_vars()));
}

/**
 * Represents a video to be sent.
 *
 * @param string $media
 * @param null|CURLFile|string|null $thumbnail
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param boolean|null $has_spoiler
 * @param integer|null $width
 * @param integer|null $height
 * @param integer|null $duration
 * @param boolean|null $supports_streaming
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputmediavideo
 */
function InputMediaVideo(
    string $media,
    null|CURLFile|string $thumbnail = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?bool $has_spoiler = null,
    ?int $width = null,
    ?int $height = null,
    ?int $duration = null,
    ?bool $supports_streaming = null,
): array {
    return prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_VIDEO], get_defined_vars()));
}

/**
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 *
 * @param string $media
 * @param string|null $caption
 * @param null|CURLFile|string|null $thumbnail
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param integer|null $width
 * @param integer|null $height
 * @param integer|null $duration
 * @param boolean|null $has_spoiler
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputmediaanimation
 */
function InputMediaAnimation(
    string $media,
    ?string $caption = null,
    null|CURLFile|string $thumbnail = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?int $width = null,
    ?int $height = null,
    ?int $duration = null,
    ?bool $has_spoiler = null,
): array {
    return prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_ANIMATION], get_defined_vars()));
}

/**
 * Represents an audio file to be treated as music to be sent.
 *
 * @param string $media
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param null|CURLFile|string|null $thumbnail
 * @param integer|null $duration
 * @param integer|null $performer
 * @param string|null $title
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputmediaaudio
 */
function InputMediaAudio(
    string $media,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    null|CURLFile|string $thumbnail = null,
    ?int $duration = null,
    ?int $performer = null,
    ?string $title = null,
): array {
    return prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_AUDIO], get_defined_vars()));
}

/**
 * Represents a general file to be sent.
 *
 * @param string $media
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param boolean|null $has_spoiler
 * @param null|CURLFile|string|null $thumbnail
 * @param boolean|null $disable_content_type_detection
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputmediadocument
 */
function InputMediaDocument(
    string $media,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?bool $has_spoiler = null,
    null|CURLFile|string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
): array {
    return prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_DOCUMENT], get_defined_vars()));
}

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
 *
 * @param string $file_path
 * @return CURLFile
 * 
 * @link https://core.telegram.org/bots/api#inputfile
 */
function InputFile(string $file_path): CURLFile { 
    if (!is_file($file_path)) {
        throw new Exception("File '{$file_path}' does not exist!");
    }
    return new CURLFile($file_path);
}

/**
 * This object represents a sticker.
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param string $type
 * @param integer $width
 * @param integer $height
 * @param boolean $is_animated
 * @param boolean $is_video
 * @param array|null $thumbnail
 * @param string|null $emoji
 * @param string|null $set_name
 * @param array|null $premium_animation
 * @param array|null $mask_position
 * @param string|null $custom_emoji_id
 * @param string|null $needs_repainting
 * @param string|null $file_size
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#sticker
 */
function Sticker(
    string $file_id,
    string $file_unique_id,
    string $type,
    int $width,
    int $height,
    bool $is_animated,
    bool $is_video,
    ?array $thumbnail = null,
    ?string $emoji = null,
    ?string $set_name = null,
    ?array $premium_animation = null,
    ?array $mask_position = null,
    ?string $custom_emoji_id = null,
    ?string $needs_repainting = null,
    ?string $file_size = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a sticker set.
 *
 * @param string $name
 * @param string $title
 * @param string $sticker_type
 * @param boolean $is_animated
 * @param boolean $is_video
 * @param array $stickers
 * @param array|null $thumbnail
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#stickerset
 */
function StickerSet(
    string $name,
    string $title,
    string $sticker_type,
    bool $is_animated,
    bool $is_video,
    array $stickers,
    array $thumbnail = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @param string $point
 * @param float $x_shift
 * @param float $y_shift
 * @param float $scale
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#maskposition
 */
function MaskPosition(
    string $point,
    float $x_shift,
    float $y_shift,
    float $scale,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object describes a sticker to be added to a sticker set.
 *
 * @param null|CURLFile|string $sticker
 * @param array $emoji_list
 * @param array|null $mask_position
 * @param array|null $keywords
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputsticker
 */
function InputSticker(
    null|CURLFile|string $sticker,
    array $emoji_list,
    ?array $mask_position = null,
    ?array $keywords = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @param string $id
 * @param array $from
 * @param string $query
 * @param string $offset
 * @param string|null $chat_type
 * @param array|null $location
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequery
 */
function InlineQuery(
    string $id,
    array $from,
    string $query,
    string $offset,
    ?string $chat_type = null,
    ?array $location = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a button to be shown above inline query results. You must use exactly one of the optional fields.
 *
 * @param string $text
 * @param array|null $web_app
 * @param string|null $start_parameter
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultsbutton
 */
function InlineQueryResultsButton(
    string $text,
    ?array $web_app = null,
    ?string $start_parameter = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to an article or web page.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $title
 * @param array $inputgetMessage_content
 * @param array|null $reply_markup
 * @param string|null $url
 * @param boolean|null $hide_url
 * @param string|null $description
 * @param string|null $thumbnail_url
 * @param integer|null $thumbnail_width
 * @param integer|null $thumbnail_height
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
function InlineQueryResultArticle(
    string $type,
    string|int $id,
    string $title,
    array $inputgetMessage_content,
    ?array $reply_markup = null,
    ?string $url = null,
    ?bool $hide_url = null,
    ?string $description = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $photo_url
 * @param string $thumbnail_url
 * @param integer|null $photo_width
 * @param integer|null $photo_height
 * @param string|null $title
 * @param string|null $description
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
function InlineQueryResultPhoto(
    string $type,
    string|int $id,
    string $photo_url,
    string $thumbnail_url,
    ?int $photo_width = null,
    ?int $photo_height = null,
    ?string $title = null,
    ?string $description = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $gif_url
 * @param string $thumbnail_url
 * @param integer|null $gif_width
 * @param integer|null $gif_height
 * @param integer|null $gif_duration
 * @param string|null $thumbnail_mime_type
 * @param string|null $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultgif
 */
function InlineQueryResultGif(
    string $type,
    string|int $id,
    string $gif_url,
    string $thumbnail_url,
    ?int $gif_width = null,
    ?int $gif_height = null,
    ?int $gif_duration = null,
    ?string $thumbnail_mime_type = null,
    ?string $title = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $mpeg4_url
 * @param string $thumbnail_url
 * @param integer|null $mpeg4_width
 * @param integer|null $mpeg4_height
 * @param integer|null $mpeg4_duration
 * @param string|null $thumbnail_mime_type
 * @param string|null $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
function InlineQueryResultMpeg4Gif(
    string $type,
    string|int $id,
    string $mpeg4_url,
    string $thumbnail_url,
    ?int $mpeg4_width = null,
    ?int $mpeg4_height = null,
    ?int $mpeg4_duration = null,
    ?string $thumbnail_mime_type = null,
    ?string $title = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities= null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content= null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 *
 * If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you must replace its content using input_message_content.
 * 
 * @param string $type
 * @param string|integer $id
 * @param string $video_url
 * @param string $mime_type
 * @param string $thumbnail_url
 * @param string $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param integer|null $video_width
 * @param integer|null $video_height
 * @param integer|null $video_duration
 * @param string|null $description
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
function InlineQueryResultVideo(
    string $type,
    string|int $id,
    string $video_url,
    string $mime_type,
    string $thumbnail_url,
    string $title,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?int $video_width = null,
    ?int $video_height = null,
    ?int $video_duration = null,
    ?string $description = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to an MP3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $audio_url
 * @param string $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param string|null $performer
 * @param integer|null $audio_duration
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
 */
function InlineQueryResultAudio(
    string $type,
    string|int $id,
    string $audio_url,
    string $title,
    ?string $caption,
    ?string $parse_mode,
    ?array $caption_entities,
    ?string $performer,
    ?int $audio_duration,
    ?array $reply_markup,
    ?array $inputgetMessage_content,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the the voice message.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $voice_url
 * @param string $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param integer|null $voice_duration
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
 */
function InlineQueryResultVoice(
    string $type,
    string|int $id,
    string $voice_url,
    string $title,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?int $voice_duration = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $document_url
 * @param string $mime_type
 * @param string $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param string|null $description
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @param string|null $thumbnail_url
 * @param integer|null $thumbnail_width
 * @param integer|null $thumbnail_height
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
 */
function InlineQueryResultDocument(
    string $type,
    string|int $id,
    string $document_url,
    string $mime_type,
    string $title,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?string $description = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 *
 * @param string $type
 * @param string|integer $id
 * @param float|string $latitude
 * @param float|string $longitude
 * @param string $title
 * @param null|float|string|null $horizontal_accuracy
 * @param integer|null $live_period
 * @param integer|null $heading
 * @param integer|null $proximity_alert_radius
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @param string|null $thumbnail_url
 * @param integer|null $thumbnail_width
 * @param integer|null $thumbnail_height
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
function InlineQueryResultLocation(
    string $type,
    string|int $id,
    float|string $latitude,
    float|string $longitude,
    string $title,
    null|float|string $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 *
 * @param string $type
 * @param string|integer $id
 * @param float|string $latitude
 * @param float|string $longitude
 * @param string $title
 * @param string $address
 * @param string|null $foursquare_id
 * @param string|null $foursquare_type
 * @param string|null $google_place_id
 * @param string|null $google_place_type
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @param string|null $thumbnail_url
 * @param integer|null $thumbnail_width
 * @param integer|null $thumbnail_height
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
 */
function InlineQueryResultVenue(
    string $type,
    string|int $id,
    float|string $latitude,
    float|string $longitude,
    string $title,
    string $address,
    ?string $foursquare_id = null,
    ?string $foursquare_type = null,
    ?string $google_place_id = null,
    ?string $google_place_type = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $phone_number
 * @param string $first_name
 * @param string|null $last_name
 * @param string|null $vcard
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @param string|null $thumbnail_url
 * @param integer|null $thumbnail_width
 * @param integer|null $thumbnail_height
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
function InlineQueryResultContact(
    string $type,
    string|int $id,
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [Game](https://core.telegram.org/bots/api#games).
 * 
 * Note: This will only work in Telegram versions released after October 1, 2016. Older clients will not display any inline results if a game result is among them.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $game_short_name
 * @param array|null $reply_markup
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 */
function InlineQueryResultGame(
    string $type,
    string|int $id,
    string $game_short_name,
    ?array $reply_markup = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a photo stored on the Telegram servers. By default, this photo will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $photo_file_id
 * @param string|null $title
 * @param string|null $description
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedphoto
 */
function InlineQueryResultCachedPhoto(
    string $type,
    string|int $id,
    string $photo_file_id,
    ?string $title = null,
    ?string $description = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with specified content instead of the animation.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $gif_file_id
 * @param string|null $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
function InlineQueryResultCachedGif(
    string $type,
    string|int $id,
    string $gif_file_id,
    ?string $title = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers. By default, this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $mpeg4_file_id
 * @param string|null $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 */
function InlineQueryResultCachedMpeg4Gif(
    string $type,
    string|int $id,
    string $mpeg4_file_id,
    ?string $title = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the sticker.
 * 
 * Note: This will only work in Telegram versions released after 9 April, 2016 for static stickers and after 06 July, 2019 for [animated stickers](https://telegram.org/blog/animated-stickers). Older clients will ignore them.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $sticker_file_id
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 */
function InlineQueryResultCachedSticker(
    string $type,
    string|int $id,
    string $sticker_file_id,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $title
 * @param string $document_file_id
 * @param string|null $description
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
function InlineQueryResultCachedDocument(
    string $type,
    string|int $id,
    string $title,
    string $document_file_id,
    ?string $description = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $video_file_id
 * @param string $title
 * @param string|null $description
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 */
function InlineQueryResultCachedVideo(
    string $type,
    string|int $id,
    string $video_file_id,
    string $title,
    ?string $description = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a link to a voice message stored on the Telegram servers. By default, this voice message will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the voice message.
 *
 * @param string $type
 * @param string|integer $id
 * @param string $voice_file_id
 * @param string $title
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
 */
function InlineQueryResultCachedVoice(
    string $type,
    string|int $id,
    string $voice_file_id,
    string $title,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * 
 *
 * @param string $type
 * @param string|integer $id
 * @param string $audio_file_id
 * @param string|null $caption
 * @param string|null $parse_mode
 * @param array|null $caption_entities
 * @param array|null $reply_markup
 * @param array|null $inputgetMessage_content
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
 */
function InlineQueryResultCachedAudio(
    string $type,
    string|int $id,
    string $audio_file_id,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $inputgetMessage_content = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a text message to be sent as the result of an inline query.
 *
 * @param string $message_text
 * @param string|null $parse_mode
 * @param array|null $entities
 * @param boolean|null $disable_web_page_preview
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputtextmessagecontent
 */
function InputTextMessageContent(
    string $message_text,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a location message to be sent as the result of an inline query.
 *
 * @param float|string $latitude
 * @param float|string $longitude
 * @param null|float|string|null $horizontal_accuracy
 * @param integer|null $live_period
 * @param integer|null $heading
 * @param integer|null $proximity_alert_radius
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
function InputLocationMessageContent(
    float|string $latitude,
    float|string $longitude,
    null|float|string $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a venue message to be sent as the result of an inline query.
 *
 * @param float|string $latitude
 * @param float|string $longitude
 * @param string $title
 * @param string $address
 * @param string|null $foursquare_id
 * @param string|null $foursquare_type
 * @param string|null $google_place_id
 * @param string|null $google_place_type
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
function InputVenueMessageContent(
    float|string $latitude,
    float|string $longitude,
    string $title,
    string $address,
    string $foursquare_id = null,
    string $foursquare_type = null,
    string $google_place_id = null,
    string $google_place_type = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a contact message to be sent as the result of an inline query.
 *
 * @param string $phone_number
 * @param string $first_name
 * @param string|null $last_name
 * @param string|null $vcard
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
function InputContactMessageContent(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of an invoice message to be sent as the result of an inline query.
 *
 * @param string $title
 * @param string $description
 * @param string $payload
 * @param string $provider_token
 * @param string $currency
 * @param array $prices
 * @param integer|null $max_tip_amount
 * @param array|null $suggested_tip_amounts
 * @param string|null $provider_data
 * @param string|null $photo_url
 * @param integer|null $photo_size
 * @param integer|null $photo_width
 * @param integer|null $photo_height
 * @param boolean|null $need_name
 * @param boolean|null $need_phone_number
 * @param boolean|null $need_email
 * @param boolean|null $need_shipping_address
 * @param boolean|null $send_phone_number_to_provider
 * @param boolean|null $send_email_to_provider
 * @param boolean|null $is_flexible
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#inputinvoicemessagecontent
 */
function InputInvoiceMessageContent(
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
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents a [result](https://core.telegram.org/bots/api#inlinequeryresult) of an inline query that was chosen by the user and sent to their chat partner.
 * 
 * Note: It is necessary to enable [inline feedback](https://core.telegram.org/bots/inline#collecting-feedback) via [@BotFather](https://t.me/botfather) in order to receive these objects in updates.
 *
 * @param string $query
 * @param string $result_id
 * @param array $from
 * @param array|null $location
 * @param string|null $inlinegetMessage_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
function ChosenInlineResult(
    string $query,
    string $result_id,
    array $from,
    ?array $location = null,
    ?string $inlinegetMessage_id = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes an inline message sent by a [Web App](https://core.telegram.org/bots/webapps) on behalf of a user.
 *
 * @param string $inlinegetMessage_id
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#sentwebappmessage
 */
function SentWebAppMessage(string $inlinegetMessage_id): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a portion of the price for goods or services.
 *
 * @param string $label
 * @param integer $amount
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#labeledprice
 */
function LabeledPrice(string $label, int $amount): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains basic information about an invoice.
 *
 * @param string $title
 * @param string $description
 * @param string $start_parameter
 * @param string $currency
 * @param integer $total_amount
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#invoice
 */
function Invoice(
    string $title,
    string $description,
    string $start_parameter,
    string $currency,
    int $total_amount,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a shipping address.
 *
 * @param string $country_code
 * @param string $state
 * @param array $city
 * @param string $street_line1
 * @param string $street_line2
 * @param string $post_code
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
function ShippingAddress(
    string $country_code,
    string $state,
    array $city,
    string $street_line1,
    string $street_line2,
    string $post_code,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents information about an order.
 *
 * @param string|null $name
 * @param string|null $phone_number
 * @param string|null $email
 * @param array|null $shipping_address
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#orderinfo
 */
function OrderInfo(
    ?string $name = null,
    ?string $phone_number = null,
    ?string $email = null,
    ?array $shipping_address = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents one shipping option.
 *
 * @param string $id
 * @param string $title
 * @param array $prices
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#shippingoption
 */
function ShippingOption(string $id, string $title, array $prices): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains basic information about a successful payment.
 *
 * @param string $currency
 * @param integer $total_amount
 * @param string $invoice_payload
 * @param string $telegram_payment_charge_id
 * @param string $provider_payment_charge_id
 * @param string|null $shipping_option_id
 * @param array|null $order_info
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#successfulpayment
 */
function SuccessfulPayment(
    string $currency,
    int $total_amount,
    string $invoice_payload,
    string $telegram_payment_charge_id,
    string $provider_payment_charge_id,
    ?string $shipping_option_id = null,
    ?array $order_info = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains information about an incoming shipping query.
 *
 * @param string $id
 * @param array $from
 * @param string $invoice_payload
 * @param array $shipping_address
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#shippingquery
 */
function ShippingQuery(
    string $id,
    array $from,
    string $invoice_payload,
    array $shipping_address,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object contains information about an incoming pre-checkout query.
 *
 * @param string $id
 * @param array $from
 * @param string $currency
 * @param integer $total_amount
 * @param string $invoice_payload
 * @param string|null $shipping_option_id
 * @param array|null $order_info
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#precheckoutquery
 */
function PreCheckoutQuery(
    string $id,
    array $from,
    string $currency,
    int $total_amount,
    string $invoice_payload,
    ?string $shipping_option_id = null,
    ?array $order_info = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @param array $data
 * @param array $credentials
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportdata
 */
function PassportData(array $data, array $credentials): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 *
 * @param string $file_id
 * @param string $file_unique_id
 * @param integer $file_size
 * @param integer $file_date
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportfile
 */
function PassportFile(
    string $file_id,
    string $file_unique_id,
    int $file_size,
    int $file_date,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @param string $type
 * @param string $hash
 * @param string|null $data
 * @param string|null $phone_number
 * @param string|null $email
 * @param array|null $files
 * @param array|null $front_side
 * @param array|null $reverse_side
 * @param array|null $selfie
 * @param array|null $translation
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#encryptedpassportelement
 */
function EncryptedPassportElement(
    string $type,
    string $hash,
    ?string $data = null,
    ?string $phone_number = null,
    ?string $email = null,
    ?array $files = null,
    ?array $front_side = null,
    ?array $reverse_side = null,
    ?array $selfie = null,
    ?array $translation = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 *
 * @param string $data
 * @param string $hash
 * @param string $secret
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#encryptedcredentials
 */
function EncryptedCredentials(string $data, string $hash, string $secret): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 *
 * @param string $type
 * @param string $field_name
 * @param string $data_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrordatafield
 */
function PassportElementErrorDataField(
    string $type,
    string $field_name,
    string $data_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_DATA_FIELD,
    ]));
}

/**
 * Represents an issue with the front side of a document. The error is considered resolved when the file with the front side of the document changes.
 *
 * @param string $type
 * @param string $file_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrorfrontside
 */
function PassportElementErrorFrontSide(
    string $type,
    string $file_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_FRONT_SIDE,
    ]));
}

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side of the document changes.
 *
 * @param string $type
 * @param string $file_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
function PassportElementErrorReverseSide(
    string $type,
    string $file_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_REVERSE_SIDE,
    ]));
}

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 *
 * @param string $type
 * @param string $file_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrorselfie
 */
function PassportElementErrorSelfie(
    string $type,
    string $file_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_SELFIE,
    ]));
}

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 *
 * @param string $type
 * @param string $file_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrorfile
 */
function PassportElementErrorFile(
    string $type,
    string $file_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_FILE,
    ]));
}

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 *
 * @param string $type
 * @param array $file_hashes
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrorfiles
 */
function PassportElementErrorFiles(
    string $type,
    array $file_hashes,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_FILES,
    ]));
}

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved when the file changes.
 *
 * @param string $type
 * @param string $file_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfile
 */
function PassportElementErrorTranslationFile(
    string $type,
    string $file_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_TRANSLATION_FILE,
    ]));
}

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 *
 * @param string $type
 * @param array $file_hashes
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
function PassportElementErrorTranslationFiles(
    string $type,
    array $file_hashes,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_TRANSLATION_FILES,
    ]));
}

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 *
 * @param string $type
 * @param array $element_hash
 * @param string $message
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
function PassportElementErrorUnspecified(
    string $type,
    array $element_hash,
    string $message,
): array {
    return prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_UNSPECIFIED,
    ]));
}

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 *
 * @param string $title
 * @param string $description
 * @param array $photo
 * @param string|null $text
 * @param array|null $text_entities
 * @param array|null $animation
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#game
 */
function Game(
    string $title,
    string $description,
    array $photo,
    ?string $text = null,
    ?array $text_entities = null,
    ?array $animation = null,
): array {
    return prepareApiTypeFields(get_defined_vars());
}

/**
 * A placeholder, currently holds no information. Use BotFather to set up your game.
 *
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#callbackgame
 */
function CallbackGame(): array {
    return [];
}

/**
 * This object represents one row of the high scores table for a game.
 *
 * @param integer $position
 * @param array $user
 * @param integer $score
 * @return array
 * 
 * @link https://core.telegram.org/bots/api#gamehighscore
 */
function GameHighScore(int $position, array $user, int $score): array {
    return prepareApiTypeFields(get_defined_vars());
}
