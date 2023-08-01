<?php 

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

 * @version 1.3.5
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/DevDasher/PTB-PHP
 * @link http://t.me/DevDasher
*/

namespace DevDasher\PTB;

use Closure;
use CURLFile;
use DateInterval;
use Exception;
use Laravel\SerializableClosure\SerializableClosure;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Psr16Cache;
use Throwable;

define('FIELD_OK', 'ok');
define('FIELD_RESULT', 'result');
define('FIELD_PARAMETERS', 'parameters');
define('FIELD_UPDATE_ID', 'update_id');
define('FIELD_MESSAGE', 'message');
define('FIELD_EDITED_MESSAGE', 'edited_message');
define('FIELD_CHANNEL_POST', 'channel_post');
define('FIELD_EDITED_CHANNEL_POST', 'edited_channel_post');
define('FIELD_INLINE_QUERY', 'inline_query');
define('FIELD_CHOSEN_INLINE_RESULT', 'chosen_inline_result');
define('FIELD_CALLBACK_QUERY', 'callback_query');
define('FIELD_SHIPPING_QUERY', 'shipping_query');
define('FIELD_PRE_CHECKOUT_QUERY', 'pre_checkout_query');
define('FIELD_POLL', 'poll');
define('FIELD_POLL_ANSWER', 'poll_answer');
define('FIELD_MY_CHAT_MEMBER', 'my_chat_member');
define('FIELD_CHAT_MEMBER', 'chat_member');
define('FIELD_CHAT_JOIN_REQUEST', 'chat_join_request');
define('FIELD_HAS_CUSTOM_CERTIFICATE', 'has_custom_certificate');
define('FIELD_PENDING_UPDATE_COUNT', 'pending_update_count');
define('FIELD_IP_ADDRESS', 'ip_address');
define('FIELD_LAST_ERROR_DATE', 'last_error_date');
define('FIELD_LAST_ERROR_MESSAGE', 'last_error_message');
define('FIELD_LAST_SYNCHRONIZATION_ERROR_DATE', 'last_synchronization_error_date');
define('FIELD_MAX_CONNECTIONS', 'max_connections');
define('FIELD_ALLOWED_UPDATES', 'allowed_updates');
define('FIELD_IS_BOT', 'is_bot');
define('FIELD_FIRST_NAME', 'first_name');
define('FIELD_LAST_NAME', 'last_name');
define('FIELD_USERNAME', 'username');
define('FIELD_LANGUAGE_CODE', 'language_code');
define('FIELD_IS_PREMIUM', 'is_premium');
define('FIELD_ADDED_TO_ATTACHMENT_MENU', 'added_to_attachment_menu');
define('FIELD_CAN_JOIN_GROUPS', 'can_join_groups');
define('FIELD_CAN_READ_ALL_GROUP_MESSAGES', 'can_read_all_group_messages');
define('FIELD_SUPPORTS_INLINE_QUERIES', 'supports_inline_queries');
define('FIELD_TYPE', 'type');
define('FIELD_TITLE', 'title');
define('FIELD_IS_FORUM', 'is_forum');
define('FIELD_PHOTO', 'photo');
define('FIELD_ACTIVE_USERNAMES', 'active_usernames');
define('FIELD_EMOJI_STATUS_CUSTOM_EMOJI_ID', 'emoji_status_custom_emoji_id');
define('FIELD_BIO', 'bio');
define('FIELD_HAS_PRIVATE_FORWARDS', 'has_private_forwards');
define('FIELD_HAS_RESTRICTED_VOICE_AND_VIDEO_MESSAGES', 'has_restricted_voice_and_video_messages');
define('FIELD_JOIN_TO_SEND_MESSAGES', 'join_to_send_messages');
define('FIELD_JOIN_BY_REQUEST', 'join_by_request');
define('FIELD_DESCRIPTION', 'description');
define('FIELD_INVITE_LINK', 'invite_link');
define('FIELD_PINNED_MESSAGE', 'pinned_message');
define('FIELD_PERMISSIONS', 'permissions');
define('FIELD_SLOW_MODE_DELAY', 'slow_mode_delay');
define('FIELD_MESSAGE_AUTO_DELETE_TIME', 'message_auto_delete_time');
define('FIELD_HAS_AGGRESSIVE_ANTI_SPAM_ENABLED', 'has_aggressive_anti_spam_enabled');
define('FIELD_HAS_HIDDEN_MEMBERS', 'has_hidden_members');
define('FIELD_HAS_PROTECTED_CONTENT', 'has_protected_content');
define('FIELD_STICKER_SET_NAME', 'sticker_set_name');
define('FIELD_CAN_SET_STICKER_SET', 'can_set_sticker_set');
define('FIELD_LINKED_CHAT_ID', 'linked_chat_id');
define('FIELD_LOCATION', 'location');
define('FIELD_MESSAGE_ID', 'message_id');
define('FIELD_MESSAGE_THREAD_ID', 'message_thread_id');
define('FIELD_FROM', 'from');
define('FIELD_SENDER_CHAT', 'sender_chat');
define('FIELD_DATE', 'date');
define('FIELD_CHAT', 'chat');
define('FIELD_FORWARD_FROM', 'forward_from');
define('FIELD_FORWARD_FROM_CHAT', 'forward_from_chat');
define('FIELD_FORWARD_FROM_MESSAGE_ID', 'forward_from_message_id');
define('FIELD_FORWARD_SIGNATURE', 'forward_signature');
define('FIELD_FORWARD_SENDER_NAME', 'forward_sender_name');
define('FIELD_FORWARD_DATE', 'forward_date');
define('FIELD_IS_TOPIC_MESSAGE', 'is_topic_message');
define('FIELD_IS_AUTOMATIC_FORWARD', 'is_automatic_forward');
define('FIELD_REPLY_TO_MESSAGE', 'reply_to_message');
define('FIELD_VIA_BOT', 'via_bot');
define('FIELD_EDIT_DATE', 'edit_date');
define('FIELD_MEDIA_GROUP_ID', 'media_group_id');
define('FIELD_AUTHOR_SIGNATURE', 'author_signature');
define('FIELD_TEXT', 'text');
define('FIELD_ENTITIES', 'entities');
define('FIELD_ANIMATION', 'animation');
define('FIELD_AUDIO', 'audio');
define('FIELD_DOCUMENT', 'document');
define('FIELD_STICKER', 'sticker');
define('FIELD_VIDEO', 'video');
define('FIELD_VIDEO_NOTE', 'video_note');
define('FIELD_VOICE', 'voice');
define('FIELD_CAPTION', 'caption');
define('FIELD_CAPTION_ENTITIES', 'caption_entities');
define('FIELD_HAS_MEDIA_SPOILER', 'has_media_spoiler');
define('FIELD_CONTACT', 'contact');
define('FIELD_DICE', 'dice');
define('FIELD_GAME', 'game');
define('FIELD_VENUE', 'venue');
define('FIELD_NEW_CHAT_MEMBERS', 'new_chat_members');
define('FIELD_LEFT_CHAT_MEMBER', 'left_chat_member');
define('FIELD_NEW_CHAT_TITLE', 'new_chat_title');
define('FIELD_NEW_CHAT_PHOTO', 'new_chat_photo');
define('FIELD_DELETE_CHAT_PHOTO', 'delete_chat_photo');
define('FIELD_GROUP_CHAT_CREATED', 'group_chat_created');
define('FIELD_SUPERGROUP_CHAT_CREATED', 'supergroup_chat_created');
define('FIELD_CHANNEL_CHAT_CREATED', 'channel_chat_created');
define('FIELD_MESSAGE_AUTO_DELETE_TIMER_CHANGED', 'message_auto_delete_timer_changed');
define('FIELD_MIGRATE_TO_CHAT_ID', 'migrate_to_chat_id');
define('FIELD_MIGRATE_FROM_CHAT_ID', 'migrate_from_chat_id');
define('FIELD_INVOICE', 'invoice');
define('FIELD_SUCCESSFUL_PAYMENT', 'successful_payment');
define('FIELD_USER_SHARED', 'user_shared');
define('FIELD_CHAT_SHARED', 'chat_shared');
define('FIELD_CONNECTED_WEBSITE', 'connected_website');
define('FIELD_WRITE_ACCESS_ALLOWED', 'write_access_allowed');
define('FIELD_PASSPORT_DATA', 'passport_data');
define('FIELD_PROXIMITY_ALERT_TRIGGERED', 'proximity_alert_triggered');
define('FIELD_FORUM_TOPIC_CREATED', 'forum_topic_created');
define('FIELD_FORUM_TOPIC_EDITED', 'forum_topic_edited');
define('FIELD_FORUM_TOPIC_CLOSED', 'forum_topic_closed');
define('FIELD_FORUM_TOPIC_REOPENED', 'forum_topic_reopened');
define('FIELD_GENERAL_FORUM_TOPIC_HIDDEN', 'general_forum_topic_hidden');
define('FIELD_GENERAL_FORUM_TOPIC_UNHIDDEN', 'general_forum_topic_unhidden');
define('FIELD_VIDEO_CHAT_SCHEDULED', 'video_chat_scheduled');
define('FIELD_VIDEO_CHAT_STARTED', 'video_chat_started');
define('FIELD_VIDEO_CHAT_ENDED', 'video_chat_ended');
define('FIELD_VIDEO_CHAT_PARTICIPANTS_INVITED', 'video_chat_participants_invited');
define('FIELD_WEB_APP_DATA', 'web_app_data');
define('FIELD_REPLY_MARKUP', 'reply_markup');
define('FIELD_OFFSET', 'offset');
define('FIELD_LENGTH', 'length');
define('FIELD_URL', 'url');
define('FIELD_USER', 'user');
define('FIELD_LANGUAGE', 'language');
define('FIELD_CUSTOM_EMOJI_ID', 'custom_emoji_id');
define('FIELD_FILE_SIZE', 'file_size');
define('FIELD_FILE_ID', 'file_id');
define('FIELD_FILE_UNIQUE_ID', 'file_unique_id');
define('FIELD_WIDTH', 'width');
define('FIELD_HEIGHT', 'height');
define('FIELD_DURATION', 'duration');
define('FIELD_THUMBNAIL', 'thumbnail');
define('FIELD_THUMB', 'thumb');
define('FIELD_FILE_NAME', 'file_name');
define('FIELD_MIME_TYPE', 'mime_type');
define('FIELD_PERFORMER', 'performer');
define('FIELD_PHONE_NUMBER', 'phone_number');
define('FIELD_USER_ID', 'user_id');
define('FIELD_VCARD', 'vcard');
define('FIELD_EMOJI', 'emoji');
define('FIELD_VALUE', 'value');
define('FIELD_VOTER_COUNT', 'voter_count');
define('FIELD_POLL_ID', 'poll_id');
define('FIELD_OPTION_IDS', 'option_ids');
define('FIELD_ID', 'id');
define('FIELD_QUESTION', 'question');
define('FIELD_OPTIONS', 'options');
define('FIELD_TOTAL_VOTER_COUNT', 'total_voter_count');
define('FIELD_IS_CLOSED', 'is_closed');
define('FIELD_IS_ANONYMOUS', 'is_anonymous');
define('FIELD_ALLOWS_MULTIPLE_ANSWERS', 'allows_multiple_answers');
define('FIELD_CORRECT_OPTION_ID', 'correct_option_id');
define('FIELD_EXPLANATION', 'explanation');
define('FIELD_EXPLANATION_ENTITIES', 'explanation_entities');
define('FIELD_OPEN_PERIOD', 'open_period');
define('FIELD_CLOSE_DATE', 'close_date');
define('FIELD_LONGITUDE', 'longitude');
define('FIELD_LATITUDE', 'latitude');
define('FIELD_HORIZONTAL_ACCURACY', 'horizontal_accuracy');
define('FIELD_LIVE_PERIOD', 'live_period');
define('FIELD_HEADING', 'heading');
define('FIELD_PROXIMITY_ALERT_RADIUS', 'proximity_alert_radius');
define('FIELD_ADDRESS', 'address');
define('FIELD_FOURSQUARE_ID', 'foursquare_id');
define('FIELD_FOURSQUARE_TYPE', 'foursquare_type');
define('FIELD_GOOGLE_PLACE_ID', 'google_place_id');
define('FIELD_GOOGLE_PLACE_TYPE', 'google_place_type');
define('FIELD_DATA', 'data');
define('FIELD_BUTTON_TEXT', 'button_text');
define('FIELD_TRAVELER', 'traveler');
define('FIELD_WATCHER', 'watcher');
define('FIELD_DISTANCE', 'distance');
define('FIELD_ICON_COLOR', 'icon_color');
define('FIELD_CHAT_ID', 'chat_id');
define('FIELD_WEB_APP_NAME', 'web_app_name');
define('FIELD_START_DATE', 'start_date');
define('FIELD_USERS', 'users');
define('FIELD_TOTAL_COUNT', 'total_count');
define('FIELD_PHOTOS', 'photos');
define('FIELD_FILE_PATH', 'file_path');
define('FIELD_KEYBOARD', 'keyboard');
define('FIELD_IS_PERSISTENT', 'is_persistent');
define('FIELD_RESIZE_KEYBOARD', 'resize_keyboard');
define('FIELD_ONE_TIME_KEYBOARD', 'one_time_keyboard');
define('FIELD_INPUT_FIELD_PLACEHOLDER', 'input_field_placeholder');
define('FIELD_SELECTIVE', 'selective');
define('FIELD_REQUEST_USER', 'request_user');
define('FIELD_REQUEST_CHAT', 'request_chat');
define('FIELD_REQUEST_CONTACT', 'request_contact');
define('FIELD_REQUEST_LOCATION', 'request_location');
define('FIELD_REQUEST_POLL', 'request_poll');
define('FIELD_WEB_APP', 'web_app');
define('FIELD_USER_IS_BOT', 'user_is_bot');
define('FIELD_USER_IS_PREMIUM', 'user_is_premium');
define('FIELD_CHAT_IS_CHANNEL', 'chat_is_channel');
define('FIELD_CHAT_IS_FORUM', 'chat_is_forum');
define('FIELD_CHAT_HAS_USERNAME', 'chat_has_username');
define('FIELD_CHAT_IS_CREATED', 'chat_is_created');
define('FIELD_USER_ADMINISTRATOR_RIGHTS', 'user_administrator_rights');
define('FIELD_BOT_ADMINISTRATOR_RIGHTS', 'bot_administrator_rights');
define('FIELD_BOT_IS_MEMBER', 'bot_is_member');
define('FIELD_REMOVE_KEYBOARD', 'remove_keyboard');
define('FIELD_INLINE_KEYBOARD', 'inline_keyboard');
define('FIELD_CALLBACK_DATA', 'callback_data');
define('FIELD_LOGIN_URL', 'login_url');
define('FIELD_SWITCH_INLINE_QUERY', 'switch_inline_query');
define('FIELD_SWITCH_INLINE_QUERY_CURRENT_CHAT', 'switch_inline_query_current_chat');
define('FIELD_SWITCH_INLINE_QUERY_CHOSEN_CHAT', 'switch_inline_query_chosen_chat');
define('FIELD_CALLBACK_GAME', 'callback_game');
define('FIELD_FORWARD_TEXT', 'forward_text');
define('FIELD_BOT_USERNAME', 'bot_username');
define('FIELD_REQUEST_WRITE_ACCESS', 'request_write_access');
define('FIELD_QUERY', 'query');
define('FIELD_ALLOW_USER_CHATS', 'allow_user_chats');
define('FIELD_ALLOW_BOT_CHATS', 'allow_bot_chats');
define('FIELD_ALLOW_GROUP_CHATS', 'allow_group_chats');
define('FIELD_ALLOW_CHANNEL_CHATS', 'allow_channel_chats');
define('FIELD_INLINE_MESSAGE_ID', 'inline_message_id');
define('FIELD_CHAT_INSTANCE', 'chat_instance');
define('FIELD_GAME_SHORT_NAME', 'game_short_name');
define('FIELD_FORCE_REPLY', 'force_reply');
define('FIELD_SMALL_FILE_ID', 'small_file_id');
define('FIELD_SMALL_FILE_UNIQUE_ID', 'small_file_unique_id');
define('FIELD_BIG_FILE_ID', 'big_file_id');
define('FIELD_BIG_FILE_UNIQUE_ID', 'big_file_unique_id');
define('FIELD_CREATOR', 'creator');
define('FIELD_CREATES_JOIN_REQUEST', 'creates_join_request');
define('FIELD_IS_PRIMARY', 'is_primary');
define('FIELD_IS_REVOKED', 'is_revoked');
define('FIELD_EXPIRE_DATE', 'expire_date');
define('FIELD_MEMBER_LIMIT', 'member_limit');
define('FIELD_PENDING_JOIN_REQUEST_COUNT', 'pending_join_request_count');
define('FIELD_CAN_MANAGE_CHAT', 'can_manage_chat');
define('FIELD_CAN_DELETE_MESSAGES', 'can_delete_messages');
define('FIELD_CAN_MANAGE_VIDEO_CHATS', 'can_manage_video_chats');
define('FIELD_CAN_RESTRICT_MEMBERS', 'can_restrict_members');
define('FIELD_CAN_PROMOTE_MEMBERS', 'can_promote_members');
define('FIELD_CAN_CHANGE_INFO', 'can_change_info');
define('FIELD_CAN_INVITE_USERS', 'can_invite_users');
define('FIELD_CAN_POST_MESSAGES', 'can_post_messages');
define('FIELD_CAN_EDIT_MESSAGES', 'can_edit_messages');
define('FIELD_CAN_PIN_MESSAGES', 'can_pin_messages');
define('FIELD_CAN_MANAGE_TOPICS', 'can_manage_topics');
define('FIELD_STATUS', 'status');
define('FIELD_CUSTOM_TITLE', 'custom_title');
define('FIELD_CAN_BE_EDITED', 'can_be_edited');
define('FIELD_IS_MEMBER', 'is_member');
define('FIELD_CAN_SEND_MESSAGES', 'can_send_messages');
define('FIELD_CAN_SEND_AUDIOS', 'can_send_audios');
define('FIELD_CAN_SEND_DOCUMENTS', 'can_send_documents');
define('FIELD_CAN_SEND_PHOTOS', 'can_send_photos');
define('FIELD_CAN_SEND_VIDEOS', 'can_send_videos');
define('FIELD_CAN_SEND_VIDEO_NOTES', 'can_send_video_notes');
define('FIELD_CAN_SEND_VOICE_NOTES', 'can_send_voice_notes');
define('FIELD_CAN_SEND_POLLS', 'can_send_polls');
define('FIELD_CAN_SEND_OTHER_MESSAGES', 'can_send_other_messages');
define('FIELD_CAN_ADD_WEB_PAGE_PREVIEWS', 'can_add_web_page_previews');
define('FIELD_OLD_CHAT_MEMBER', 'old_chat_member');
define('FIELD_NEW_CHAT_MEMBER', 'new_chat_member');
define('FIELD_VIA_CHAT_FOLDER_INVITE_LINK', 'via_chat_folder_invite_link');
define('FIELD_USER_CHAT_ID', 'user_chat_id');
define('FIELD_CAN_SEND_POLL', 'can_send_polls');
define('FIELD_COMMAND', 'command');
define('FIELD_SHORT_DESCRIPTION', 'short_description');
define('FIELD_RETRY_AFTER', 'retry_after');
define('FIELD_SUPPORTS_STREAMING', 'supports_streaming');
define('FIELD_DISABLE_CONTENT_TYPE_DETECTION', 'disable_content_type_detection');
define('FIELD_SET_NAME', 'set_name');
define('FIELD_PREMIUM_ANIMATION', 'premium_animation');
define('FIELD_NEEDS_REPAINTING', 'needs_repainting');
define('FIELD_NAME', 'name');
define('FIELD_STICKER_TYPE', 'sticker_type');
define('FIELD_IS_ANIMATED', 'is_animated');
define('FIELD_IS_VIDEO', 'is_video');
define('FIELD_STICKERS', 'stickers');
define('FIELD_POINT', 'point');
define('FIELD_X_SHIFT', 'x_shift');
define('FIELD_Y_SHIFT', 'y_shift');
define('FIELD_SCALE', 'scale');
define('FIELD_EMOJI_LIST', 'emoji_list');
define('FIELD_MASK_POSITION', 'mask_position');
define('FIELD_KEYWORDS', 'keywords');
define('FIELD_CHAT_TYPE', 'chat_type');
define('FIELD_START_PARAMETER', 'start_parameter');
define('FIELD_INPUT_MESSAGE_CONTENT', 'input_message_content');
define('FIELD_HIDE_URL', 'hide_url');
define('FIELD_THUMBNAIL_URL', 'thumbnail_url');
define('FIELD_THUMBNAIL_WIDTH', 'thumbnail_width');
define('FIELD_THUMBNAIL_HEIGHT', 'thumbnail_height');
define('FIELD_PHOTO_URL', 'photo_url');
define('FIELD_PHOTO_WIDTH', 'photo_width');
define('FIELD_PHOTO_HEIGHT', 'photo_height');
define('FIELD_PARSE_MODE', 'parse_mode');
define('FIELD_GIF_URL', 'gif_url');
define('FIELD_GIF_WIDTH', 'gif_width');
define('FIELD_GIF_HEIGHT', 'gif_height');
define('FIELD_GIF_DURATION', 'gif_duration');
define('FIELD_THUMBNAIL_MIME_TYPE', 'thumbnail_mime_type');
define('FIELD_MPEG4_URL', 'mpeg4_url');
define('FIELD_MPEG4_WIDTH', 'mpeg4_width');
define('FIELD_MPEG4_HEIGHT', 'mpeg4_height');
define('FIELD_MPEG4_DURATION', 'mpeg4_duration');
define('FIELD_VIDEO_URL', 'video_url');
define('FIELD_VIDEO_WIDTH', 'video_width');
define('FIELD_VIDEO_HEIGHT', 'video_height');
define('FIELD_VIDEO_DURATION', 'video_duration');
define('FIELD_AUDIO_URL', 'audio_url');
define('FIELD_AUDIO_DURATION', 'audio_duration');
define('FIELD_VOICE_URL', 'voice_url');
define('FIELD_VOICE_DURATION', 'voice_duration');
define('FIELD_DOCUMENT_URL', 'document_url');
define('FIELD_PHOTO_FILE_ID', 'photo_file_id');
define('FIELD_GIF_FILE_ID', 'gif_file_id');
define('FIELD_MPEG4_FILE_ID', 'mpeg4_file_id');
define('FIELD_STICKER_FILE_ID', 'sticker_file_id');
define('FIELD_DOCUMENT_FILE_ID', 'document_file_id');
define('FIELD_VIDEO_FILE_ID', 'video_file_id');
define('FIELD_VOICE_FILE_ID', 'voice_file_id');
define('FIELD_AUDIO_FILE_ID', 'audio_file_id');
define('FIELD_MESSAGE_TEXT', 'message_text');
define('FIELD_DISABLE_WEB_PAGE_PREVIEW', 'disable_web_page_preview');
define('FIELD_PAYLOAD', 'payload');
define('FIELD_PROVIDER_TOKEN', 'provider_token');
define('FIELD_CURRENCY', 'currency');
define('FIELD_PRICES', 'prices');
define('FIELD_MAX_TIP_AMOUNT', 'max_tip_amount');
define('FIELD_SUGGESTED_TIP_AMOUNTS', 'suggested_tip_amounts');
define('FIELD_PROVIDER_DATA', 'provider_data');
define('FIELD_PHOTO_SIZE', 'photo_size');
define('FIELD_NEED_NAME', 'need_name');
define('FIELD_NEED_PHONE_NUMBER', 'need_phone_number');
define('FIELD_NEED_EMAIL', 'need_email');
define('FIELD_NEED_SHIPPING_ADDRESS', 'need_shipping_address');
define('FIELD_SEND_PHONE_NUMBER_TO_PROVIDER', 'send_phone_number_to_provider');
define('FIELD_SEND_EMAIL_TO_PROVIDER', 'send_email_to_provider');
define('FIELD_IS_FLEXIBLE', 'is_flexible');
define('FIELD_RESULT_ID', 'result_id');
define('FIELD_LABEL', 'label');
define('FIELD_AMOUNT', 'amount');
define('FIELD_TOTAL_AMOUNT', 'total_amount');
define('FIELD_COUNTRY_CODE', 'country_code');
define('FIELD_STATE', 'state');
define('FIELD_CITY', 'city');
define('FIELD_STREET_LINE1', 'street_line1');
define('FIELD_STREET_LINE2', 'street_line2');
define('FIELD_POST_CODE', 'post_code');
define('FIELD_EMAIL', 'email');
define('FIELD_SHIPPING_ADDRESS', 'shipping_address');
define('FIELD_INVOICE_PAYLOAD', 'invoice_payload');
define('FIELD_SHIPPING_OPTION_ID', 'shipping_option_id');
define('FIELD_ORDER_INFO', 'order_info');
define('FIELD_TELEGRAM_PAYMENT_CHARGE_ID', 'telegram_payment_charge_id');
define('FIELD_PROVIDER_PAYMENT_CHARGE_ID', 'provider_payment_charge_id');
define('FIELD_CREDENTIALS', 'credentials');
define('FIELD_FILES', 'files');
define('FIELD_FRON_SIDE', 'front_side');
define('FIELD_REVERSE_SIDE', 'reverse_side');
define('FIELD_SELFIE', 'callableie');
define('FIELD_TRANSLATION', 'translation');
define('FIELD_SECRET', 'secret');
define('FIELD_SOURCE', 'source');
define('FIELD_FIELD_NAME', 'field_name');
define('FIELD_DATA_HASH', 'data_hash');
define('FIELD_FILE_HASH', 'file_hash');
define('FIELD_FILE_HASHES', 'file_hashes');
define('FIELD_ELEMENT_HASH', 'element_hash');
define('FIELD_TEXT_ENTITIES', 'text_entities');
define('FIELD_POSITION', 'position');
define('FIELD_SCORE', 'score');

define('METHOD_GET_ME', 'getMe');
define('METHOD_LOG_OUT', 'logOut');
define('METHOD_CLOSE', 'close');
define('METHOD_DELETE_MESSAGE', 'deleteMessage');
define('METHOD_SEND_MESSAGE', 'sendMessage');
define('METHOD_FORWARD_MESSAGE', 'forwardMessage');
define('METHOD_COPY_MESSAGE', 'copyMessage');
define('METHOD_SEND_PHOTO', 'sendPhoto');
define('METHOD_SEND_AUDIO', 'sendAudio');
define('METHOD_SEND_DOCUMENT', 'sendDocument');
define('METHOD_SEND_VIDEO', 'sendVideo');
define('METHOD_SEND_ANIMATION', 'sendAnimation');
define('METHOD_SEND_VOICE', 'sendVoice');
define('METHOD_SEND_VIDEO_NOTE', 'sendVideoNote');
define('METHOD_SEND_MEDIA_GROUP', 'sendMediaGroup');
define('METHOD_SEND_LOCATION', 'sendLocation');
define('METHOD_SEND_VENUE', 'sendVenue');
define('METHOD_SEND_CONTACT', 'sendContact');
define('METHOD_SEND_POLL', 'sendPoll');
define('METHOD_SEND_DICE', 'sendDice');
define('METHOD_SEND_FILE', 'sendFile');
define('METHOD_SEND_CHAT_ACTION', 'sendChatAction');
define('METHOD_GET_USER_PROFILE_PHOTOS', 'getUserProfilePhotos');
define('METHOD_GET_FILE', 'getFile');
define('METHOD_BAN_CHAT_MEMBER', 'banChatMember');
define('METHOD_UNBAN_CHAT_MEMBER', 'unbanChatMember');
define('METHOD_RESTRICT_CHAT_MEMBER', 'restrictChatMember');
define('METHOD_PROMOTE_CHAT_MEMBER', 'promoteChatMember');
define('METHOD_SET_CHAT_ADMINISTRATOR_CUSTOM_TITLE', 'setChatAdministratorCustomTitle');
define('METHOD_BAN_CHAT_SENDER_CHAT', 'banChatSenderChat');
define('METHOD_UNBAN_CHAT_SENDER_CHAT', 'unbanChatSenderChat');
define('METHOD_SET_CHAT_PERMISSIONS', 'setChatPermissions');
define('METHOD_EXPORT_CHAT_INVITE_LINK', 'exportChatInviteLink');
define('METHOD_CREATE_CHAT_INVITE_LINK', 'createChatInviteLink');
define('METHOD_EDIT_CHAT_INVITE_LINK', 'editChatInviteLink');
define('METHOD_REVOKE_CHAT_INVITE_LINK', 'revokeChatInviteLink');
define('METHOD_APPROVE_CHAT_JOIN_REQUEST', 'approveChatJoinRequest');
define('METHOD_DECLINE_CHAT_JOIN_REQUEST', 'declineChatJoinRequest');
define('METHOD_SET_CHAT_PHOTO', 'setChatPhoto');
define('METHOD_DELETE_CHAT_PHOTO', 'deleteChatPhoto');
define('METHOD_SET_CHAT_TITLE', 'setChatTitle');
define('METHOD_SET_CHAT_DESCRIPTION', 'setChatDescription');
define('METHOD_PIN_CHAT_MESSAGE', 'pinChatMessage');
define('METHOD_UNPIN_CHAT_MESSAGE', 'unpinChatMessage');
define('METHOD_UNPIN_ALL_CHAT_MESSAGES', 'unpinAllChatMessages');
define('METHOD_LEAVE_CHAT', 'leaveChat');
define('METHOD_GET_CHAT', 'getChat');
define('METHOD_GET_CHAT_ADMINISTRATORS', 'getChatAdministrators');
define('METHOD_GET_CHAT_MEMBER_COUNT', 'getChatMemberCount');
define('METHOD_GET_CHAT_MEMBER', 'getChatMember');
define('METHOD_SET_CHAT_STICKER_SET', 'setChatStickerSet');
define('METHOD_DELETE_CHAT_STICKER_SET', 'deleteChatStickerSet');
define('METHOD_GET_FORUM_TOPIC_ICON_STICKERS', 'getForumTopicIconStickers');
define('METHOD_CREATE_FORUM_TOPIC', 'createForumTopic');
define('METHOD_EDIT_FORUM_TOPIC', 'editForumTopic');
define('METHOD_CLOSE_FORUM_TOPIC', 'closeForumTopic');
define('METHOD_REOPEN_FORUM_TOPIC', 'reopenForumTopic');
define('METHOD_DELETE_FORUM_TOPIC', 'deleteForumTopic');
define('METHOD_UNPIN_ALL_FORUM_TOPIC_MESSAGES', 'unpinAllForumTopicMessages');
define('METHOD_EDIT_GENERAL_FORUM_TOPIC', 'editGeneralForumTopic');
define('METHOD_CLOSE_GENERAL_FORUM_TOPIC', 'closeGeneralForumTopic');
define('METHOD_REOPEN_GENERAL_FORUM_TOPIC', 'reopenGeneralForumTopic');
define('METHOD_HIDE_GENERAL_FORUM_TOPIC', 'hideGeneralForumTopic');
define('METHOD_UNHIDE_GENERAL_FORUM_TOPIC', 'unhideGeneralForumTopic');
define('METHOD_ANSWER_CALLBACK_QUERY', 'answerCallbackQuery');
define('METHOD_SET_MY_COMMANDS', 'setMyCommands');
define('METHOD_DELETE_MY_COMMANDS', 'deleteMyCommands');
define('METHOD_GET_MY_COMMANDS', 'getMyCommands');
define('METHOD_SET_MY_NAME', 'setMyName');
define('METHOD_GET_MY_NAME', 'getMyName');
define('METHOD_SET_MY_DESCRIPTION', 'setMyDescription');
define('METHOD_GET_MY_DESCRIPTION', 'getMyDescription');
define('METHOD_SET_MY_SHORT_DESCRIPTION', 'setMyShortDescription');
define('METHOD_GET_MY_SHORT_DESCRIPTION', 'getMyShortDescription');
define('METHOD_SET_CHAT_MENU_BUTTON', 'setChatMenuButton');
define('METHOD_GET_CHAT_MENU_BUTTON', 'getChatMenuButton');
define('METHOD_SET_MY_DEFAULT_ADMINISTRATOR_RIGHTS', 'setMyDefaultAdministratorRights');
define('METHOD_GET_MY_DEFAULT_ADMINISTRATOR_RIGHTS', 'getMyDefaultAdministratorRights');
define('METHOD_EDIT_MESSAGE_TEXT', 'editMessageText');
define('METHOD_EDIT_MESSAGE_CAPTION', 'editMessageCaption');
define('METHOD_EDIT_MESSAGE_MEDIA', 'editMessageMedia');
define('METHOD_EDIT_MESSAGE_LIVE_LOCATION', 'editMessageLiveLocation');
define('METHOD_STOP_MESSAGE_LIVE_LOCATION', 'stopMessageLiveLocation');
define('METHOD_EDIT_MESSAGE_REPLY_MARKUP', 'editMessageReplyMarkup');
define('METHOD_STOP_POLL', 'stopPoll');
define('METHOD_SEND_STICKER', 'sendSticker');
define('METHOD_GET_STICKER_SET', 'getStickerSet');
define('METHOD_GET_CUSTOM_EMOJI_STICKERS', 'getCustomEmojiStickers');
define('METHOD_UPLOAD_STICKER_FILE', 'uploadStickerFile');
define('METHOD_CREATE_NEW_STICKER_SET', 'createNewStickerSet');
define('METHOD_ADD_STICKER_TO_SET', 'addStickerToSet');
define('METHOD_SET_STICKER_POSITION_IN_SET', 'setStickerPositionInSet');
define('METHOD_DELETE_STICKER_FROM_SET', 'deleteStickerFromSet');
define('METHOD_SET_STICKER_EMOJI_LIST', 'setStickerEmojiList');
define('METHOD_SET_STICKER_KEYWORDS', 'setStickerKeywords');
define('METHOD_SET_STICKER_MASK_POSITION', 'setStickerMaskPosition');
define('METHOD_SET_STICKER_SET_TITLE', 'setStickerSetTitle');
define('METHOD_SET_STICKER_SET_THUMBNAIL', 'setStickerSetThumbnail');
define('METHOD_SET_CUSTOM_EMOJI_STICKER_SET_THUMBNAIL', 'setCustomEmojiStickerSetThumbnail');
define('METHOD_DELETE_STICKER_SET', 'deleteStickerSet');
define('METHOD_ANSWER_INLINE_QUERY', 'answerInlineQuery');
define('METHOD_ANSWER_WEB_APP_QUERY', 'answerWebAppQuery');
define('METHOD_SEND_INVOICE', 'sendInvoice');
define('METHOD_CREATE_INVOICE_LINK', 'createInvoiceLink');
define('METHOD_ANSWER_SHIPPING_QUERY', 'answerShippingQuery');
define('METHOD_ANSWER_PRE_CHECKOUT_QUERY', 'answerPreCheckoutQuery');
define('METHOD_SET_PASSPORT_DATA_ERRORS', 'setPassportDataErrors');
define('METHOD_SEND_GAME', 'sendGame');
define('METHOD_SET_GAME_SCORE', 'setGameScore');
define('METHOD_GET_GAME_HIGH_SCORES', 'getGameHighScores');
define('METHOD_GET_UPDATES', 'getUpdates');

define('PARAM_CERTIFICATE', 'certificate');
define('PARAM_IP_ADDRESS', 'ip_address');
define('PARAM_MAX_CONNECTIONS', 'max_connections');
define('PARAM_DROP_PENDING_UPDATES', 'drop_pending_updates');
define('PARAM_SECRET_TOKEN', 'secret_token');
define('PARAM_MESSAGE_ID', 'message_id');
define('PARAM_CHAT_ID', 'chat_id');
define('PARAM_USER_ID', 'user_id');
define('PARAM_TEXT', 'text');
define('PARAM_MESSAGE_THREAD_ID', 'message_thread_id');
define('PARAM_PARSE_MODE', 'parse_mode');
define('PARAM_ENTITIES', 'entities');
define('PARAM_DISABLE_WEB_PAGE_PREVIEW', 'disable_web_page_preview');
define('PARAM_DISABLE_NOTIFICATION', 'disable_notification');
define('PARAM_PROTECT_CONTENT', 'protect_content');
define('PARAM_REPLY_TO_MESSAGE_ID', 'reply_to_message_id');
define('PARAM_ALLOW_SENDING_WITHOUT_REPLY', 'allow_sending_without_reply');
define('PARAM_REPLY_MARKUP', 'reply_markup');
define('PARAM_FROM_CHAT_ID', 'from_chat_id');
define('PARAM_CAPTION', 'caption');
define('PARAM_CAPTION_ENTITIES', 'caption_entities');
define('PARAM_PHOTO', 'photo');
define('PARAM_HAS_SPOILER', 'has_spoiler');
define('PARAM_AUDIO', 'audio');
define('PARAM_DURATION', 'duration');
define('PARAM_PERFORMER', 'performer');
define('PARAM_TITLE', 'title');
define('PARAM_THUMBNAIL', 'thumbnail');
define('PARAM_DOCUMENT', 'document');
define('PARAM_DISABLE_CONTENT_TYPE_DETECTION', 'disable_content_type_detection');
define('PARAM_VIDEO', 'video');
define('PARAM_WIDTH', 'width');
define('PARAM_HEIGHT', 'height');
define('PARAM_SUPPORTS_STREAMING', 'supports_streaming');
define('PARAM_ANIMATION', 'animation');
define('PARAM_VOICE', 'voice');
define('PARAM_VIDEO_NOTE', 'video_note');
define('PARAM_LENGTH', 'length');
define('PARAM_MEDIA', 'media');
define('PARAM_LATITUDE', 'latitude');
define('PARAM_LONGITUDE', 'longitude');
define('PARAM_HORIZONTAL_ACCURACY', 'horizontal_accuracy');
define('PARAM_LIVE_PERIOD', 'live_period');
define('PARAM_HEADING', 'heading');
define('PARAM_PROXIMITY_ALERT_RADIUS', 'proximity_alert_radius');
define('PARAM_ADDRESS', 'address');
define('PARAM_FOURSQUARE_ID', 'foursquare_id');
define('PARAM_FOURSQUARE_TYPE', 'foursquare_type');
define('PARAM_GOOGLE_PLACE_ID', 'google_place_id');
define('PARAM_GOOGLE_PLACE_TYPE', 'google_place_type');
define('PARAM_PHONE_NUMBER', 'phone_number');
define('PARAM_FIRST_NAME', 'first_name');
define('PARAM_LAST_NAME', 'last_name');
define('PARAM_VCARD', 'vcard');
define('PARAM_QUESTION', 'question');
define('PARAM_OPTIONS', 'options');
define('PARAM_IS_ANONYMOUS', 'is_anonymous');
define('PARAM_TYPE', 'type');
define('PARAM_ALLOWS_MULTIPLE_ANSWERS', 'allows_multiple_answers');
define('PARAM_CORRECT_OPTION_ID', 'correct_option_id');
define('PARAM_EXPLANATION', 'explanation');
define('PARAM_EXPLANATION_PARSE_MODE', 'explanation_parse_mode');
define('PARAM_EXPLANATION_ENTITIES', 'explanation_entities');
define('PARAM_OPEN_PERIOD', 'open_period');
define('PARAM_CLOSE_DATE', 'close_date');
define('PARAM_IS_CLOSED', 'is_closed');
define('PARAM_EMOJI', 'emoji');
define('PARAM_ACTION', 'action');
define('PARAM_OFFSET', 'offset');
define('PARAM_LIMIT', 'limit');
define('PARAM_FILE_ID', 'file_id');
define('PARAM_UNTIL_DATE', 'until_date');
define('PARAM_REVOKE_MESSAGES', 'revoke_messages');
define('PARAM_ONLY_IF_BANNED', 'only_if_banned');
define('PARAM_PERMISSIONS', 'permissions');
define('PARAM_USE_INDEPENDENT_CHAT_PERMISSIONS', 'use_independent_chat_permissions');
define('PARAM_CAN_MANAGE_CHAT', 'can_manage_chat');
define('PARAM_CAN_POST_MESSAGES', 'can_post_messages');
define('PARAM_CAN_EDIT_MESSAGES', 'can_edit_messages');
define('PARAM_CAN_DELETE_MESSAGES', 'can_delete_messages');
define('PARAM_CAN_MANAGE_VIDEO_CHATS', 'can_manage_video_chats');
define('PARAM_CAN_RESTRICT_MEMBERS', 'can_restrict_members');
define('PARAM_CAN_PROMOTE_MEMBERS', 'can_promote_members');
define('PARAM_CAN_CHANGE_INFO', 'can_change_info');
define('PARAM_CAN_INVITE_USERS', 'can_invite_users');
define('PARAM_CAN_PIN_MESSAGES', 'can_pin_messages');
define('PARAM_CAN_MANAGE_TOPICS', 'can_manage_topics');
define('PARAM_CUSTOM_TITLE', 'custom_title');
define('PARAM_SENDER_CHAT_ID', 'sender_chat_id');
define('PARAM_NAME', 'name');
define('PARAM_EXPIRE_DATE', 'expire_date');
define('PARAM_MEMBER_LIMIT', 'member_limit');
define('PARAM_CREATES_JOIN_REQUEST', 'creates_join_request');
define('PARAM_INVITE_LINK', 'invite_link');
define('PARAM_DESCRIPTION', 'description');
define('PARAM_ICON_COLOR', 'icon_color');
define('PARAM_ICON_CUSTOM_EMOJI_ID', 'icon_custom_emoji_id');
define('PARAM_SHOW_ALERT', 'show_alert');
define('PARAM_URL', 'url');
define('PARAM_CACHE_TIME', 'cache_time');
define('PARAM_CALLBACK_QUERY_ID', 'callback_query_id');
define('PARAM_COMMANDS', 'commands');
define('PARAM_SCOPE', 'scope');
define('PARAM_LANGUAGE_CODE', 'language_code');
define('PARAM_SHORT_DESCRIPTION', 'short_description');
define('PARAM_MENU_BUTTON', 'menu_button');
define('PARAM_RIGHTS', 'rights');
define('PARAM_FOR_CHANNELS', 'for_channels');
define('PARAM_INLINE_MESSAGE_ID', 'inline_message_id');
define('PARAM_CUSTOM_EMOJI_IDS', 'custom_emoji_ids');
define('PARAM_STICKER', 'sticker');
define('PARAM_STICKER_SET_NAME', 'sticker_set_name');
define('PARAM_STICKER_FORMAT', 'sticker_format');
define('PARAM_STICKERS', 'stickers');
define('PARAM_STICKER_TYPE', 'sticker_type');
define('PARAM_NEEDS_REPAINTING', 'needs_repainting');
define('PARAM_POSITION', 'position');
define('PARAM_EMOJI_LIST', 'emoji_list');
define('PARAM_KEYWORDS', 'keywords');
define('PARAM_MASK_POSITION', 'mask_position');
define('PARAM_CUSTOM_EMOJI_ID', 'custom_emoji_id');
define('PARAM_RESULTS', 'results');
define('PARAM_IS_PERSONAL', 'is_personal');
define('PARAM_NEXT_OFFSET', 'next_offset');
define('PARAM_BUTTON', 'button');
define('PARAM_INLINE_QUERY_ID', 'inline_query_id');
define('PARAM_RESULT', 'result');
define('PARAM_WEB_APP_QUERY_ID', 'web_app_query_id');
define('PARAM_PAYLOAD', 'payload');
define('PARAM_PROVIDER_TOKEN', 'provider_token');
define('PARAM_CURRENCY', 'currency');
define('PARAM_PRICES', 'prices');
define('PARAM_MAX_TIP_AMOUNT', 'max_tip_amount');
define('PARAM_SUGGESTED_TIP_AMOUNTS', 'suggested_tip_amounts');
define('PARAM_START_PARAMETER', 'start_parameter');
define('PARAM_OK', 'ok');
define('PARAM_SHIPPING_OPTIONS', 'shipping_options');
define('PARAM_ERROR_MESSAGE', 'error_message');
define('PARAM_SHIPPING_QUERY_ID', 'shipping_query_id');
define('PARAM_PRE_CHECKOUT_QUERY_ID', 'pre_checkout_query_id');
define('PARAM_ERRORS', 'errors');
define('PARAM_GAME_SHORT_NAME', 'game_short_name');
define('PARAM_FORCE', 'force');
define('PARAM_DISABLE_EDIT_MESSAGE', 'disable_edit_message');
define('PARAM_TIMEOUT', 'timeout');
define('PARAM_ALLOWED_UPDATES', 'allowed_updates');

define('UPDATE_TYPE_MESSAGE', FIELD_MESSAGE);
define('UPDATE_TYPE_EDITED_MESSAGE', FIELD_EDITED_MESSAGE);
define('UPDATE_TYPE_CHANNEL_POST', FIELD_CHANNEL_POST);
define('UPDATE_TYPE_EDITED_CHANNEL_POST', FIELD_EDITED_CHANNEL_POST);
define('UPDATE_TYPE_INLINE_QUERY', FIELD_INLINE_QUERY);
define('UPDATE_TYPE_CHOSEN_INLINE_RESULT', FIELD_CHOSEN_INLINE_RESULT);
define('UPDATE_TYPE_CALLBACK_QUERY', FIELD_CALLBACK_QUERY);
define('UPDATE_TYPE_SHIPPING_QUERY', FIELD_SHIPPING_QUERY);
define('UPDATE_TYPE_PRE_CHECKOUT_QUERY', FIELD_PRE_CHECKOUT_QUERY);
define('UPDATE_TYPE_POLL', FIELD_POLL);
define('UPDATE_TYPE_POLL_ANSWER', FIELD_POLL_ANSWER);
define('UPDATE_TYPE_MY_CHAT_MEMBER', FIELD_MY_CHAT_MEMBER);
define('UPDATE_TYPE_CHAT_MEMBER', FIELD_CHAT_MEMBER);
define('UPDATE_TYPE_CHAT_JOIN_REQUEST', FIELD_CHAT_JOIN_REQUEST);

define('MESSAGE_TYPE_TEXT', FIELD_TEXT);
define('MESSAGE_TYPE_STICKER', FIELD_STICKER);
define('MESSAGE_TYPE_ANIMATION', FIELD_ANIMATION);
define('MESSAGE_TYPE_VIDEO', FIELD_VIDEO);
define('MESSAGE_TYPE_VIDEO_NOTE', FIELD_VIDEO_NOTE);
define('MESSAGE_TYPE_AUDIO', FIELD_AUDIO);
define('MESSAGE_TYPE_VOICE', FIELD_VOICE);
define('MESSAGE_TYPE_DOCUMENT', FIELD_DOCUMENT);
define('MESSAGE_TYPE_PHOTO', FIELD_PHOTO);
define('MESSAGE_TYPE_LOCATION', FIELD_LOCATION);
define('MESSAGE_TYPE_CONTACT', FIELD_CONTACT);
define('MESSAGE_TYPE_POLL', FIELD_POLL);
define('MESSAGE_TYPE_GAME', FIELD_GAME);
define('MESSAGE_TYPE_DICE', FIELD_DICE);
define('MESSAGE_TYPE_VENUE', FIELD_VENUE);
define('MESSAGE_TYPE_NEW_CHAT_MEMBERS', FIELD_NEW_CHAT_MEMBERS);
define('MESSAGE_TYPE_LEFT_CHAT_MEMBER', FIELD_LEFT_CHAT_MEMBER);
define('MESSAGE_TYPE_NEW_CHAT_TITLE', FIELD_NEW_CHAT_TITLE);
define('MESSAGE_TYPE_NEW_CHAT_PHOTO', FIELD_NEW_CHAT_PHOTO);
define('MESSAGE_TYPE_DELETE_CHAT_PHOTO', FIELD_DELETE_CHAT_PHOTO);
define('MESSAGE_TYPE_GROUP_CHAT_CREATED', FIELD_GROUP_CHAT_CREATED);
define('MESSAGE_TYPE_SUPERGROUP_CHAT_CREATED', FIELD_SUPERGROUP_CHAT_CREATED);
define('MESSAGE_TYPE_CHANNEL_CHAT_CREATED', FIELD_CHANNEL_CHAT_CREATED);
define('MESSAGE_TYPE_MESSAGE_AUTO_DELETE_TIMER_CHANGED', FIELD_MESSAGE_AUTO_DELETE_TIMER_CHANGED);
define('MESSAGE_TYPE_MIGRATE_TO_CHAT_ID', FIELD_MIGRATE_TO_CHAT_ID);
define('MESSAGE_TYPE_MIGRATE_FROM_CHAT_ID', FIELD_MIGRATE_FROM_CHAT_ID);
define('MESSAGE_TYPE_PINNED_MESSAGE', FIELD_PINNED_MESSAGE);
define('MESSAGE_TYPE_INVOICE', FIELD_INVOICE);
define('MESSAGE_TYPE_SUCCESSFUL_PAYMENT', FIELD_SUCCESSFUL_PAYMENT);
define('MESSAGE_TYPE_USER_SHARED', FIELD_USER_SHARED);
define('MESSAGE_TYPE_CHAT_SHARED', FIELD_CHAT_SHARED);
define('MESSAGE_TYPE_CONNECTED_WEBSITE', FIELD_CONNECTED_WEBSITE);
define('MESSAGE_TYPE_WRITE_ACCESS_ALLOWED', FIELD_WRITE_ACCESS_ALLOWED);
define('MESSAGE_TYPE_PASSPORT_DATA', FIELD_PASSPORT_DATA);
define('MESSAGE_TYPE_PROXIMITY_ALERT_TRIGGERED', FIELD_PROXIMITY_ALERT_TRIGGERED);
define('MESSAGE_TYPE_FORUM_TOPIC_CREATED', FIELD_FORUM_TOPIC_CREATED);
define('MESSAGE_TYPE_FORUM_TOPIC_EDITED', FIELD_FORUM_TOPIC_EDITED);
define('MESSAGE_TYPE_FORUM_TOPIC_CLOSED', FIELD_FORUM_TOPIC_CLOSED);
define('MESSAGE_TYPE_FORUM_TOPIC_REOPENED', FIELD_FORUM_TOPIC_REOPENED);
define('MESSAGE_TYPE_GENERAL_FORUM_TOPIC_HIDDEN', FIELD_GENERAL_FORUM_TOPIC_HIDDEN);
define('MESSAGE_TYPE_GENERAL_FORUM_TOPIC_UNHIDDEN', FIELD_GENERAL_FORUM_TOPIC_UNHIDDEN);
define('MESSAGE_TYPE_VIDEO_CHAT_SCHEDULED', FIELD_VIDEO_CHAT_SCHEDULED);
define('MESSAGE_TYPE_VIDEO_CHAT_STARTED', FIELD_VIDEO_CHAT_STARTED);
define('MESSAGE_TYPE_VIDEO_CHAT_ENDED', FIELD_VIDEO_CHAT_ENDED);
define('MESSAGE_TYPE_VIDEO_CHAT_PARTICIPANTS_INVITED', FIELD_VIDEO_CHAT_PARTICIPANTS_INVITED);
define('MESSAGE_TYPE_WEB_APP_DATA', FIELD_WEB_APP_DATA);

define('MESSAGE_ENTITY_MENTION', 'mention');
define('MESSAGE_ENTITY_HASHTAG', 'hashtag');
define('MESSAGE_ENTITY_CASHTAG', 'cashtag');
define('MESSAGE_ENTITY_BOT_COMMAND', 'bot_command');
define('MESSAGE_ENTITY_URL', 'url');
define('MESSAGE_ENTITY_EMAIL', 'email');
define('MESSAGE_ENTITY_PHONE_NUMBER', 'phone_number');
define('MESSAGE_ENTITY_BOLD', 'bold');
define('MESSAGE_ENTITY_ITALIC', 'italic');
define('MESSAGE_ENTITY_UNDERLINE', 'underline');
define('MESSAGE_ENTITY_STRIKETHROUGH', 'strikethrough');
define('MESSAGE_ENTITY_SPOILER', 'spoiler');
define('MESSAGE_ENTITY_CODE', 'code');
define('MESSAGE_ENTITY_PRE', 'pre');
define('MESSAGE_ENTITY_TEXT_LINK', 'text_link');
define('MESSAGE_ENTITY_TEXT_MENTION', 'text_mention');
define('MESSAGE_ENTITY_CUSTOM_EMOJI', 'custom_emoji');

define('BOT_COMMAND_SCOPE_DEFAULT', 'default');
define('BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS', 'all_private_chats');
define('BOT_COMMAND_SCOPE_ALL_GROUP_CHATS', 'group_chats');
define('BOT_COMMAND_SCOPE_ALL_CHAT_ADMINISTRATORS', 'chat_administrators');
define('BOT_COMMAND_SCOPE_CHAT', 'chat');
define('BOT_COMMAND_SCOPE_CHAT_ADMINISTRATORS', 'chat_administrators');
define('BOT_COMMAND_SCOPE_CHAT_MEMBER', 'chat_member');

define('CHAT_MEMBER_STATUS_ADMINISTRATOR', 'administrator');
define('CHAT_MEMBER_STATUS_CREATOR', 'creator');
define('CHAT_MEMBER_STATUS_RESTRICTED', 'restricted');
define('CHAT_MEMBER_STATUS_LEFT', 'left');
define('CHAT_MEMBER_STATUS_MEMBER', 'member');
define('CHAT_MEMBER_STATUS_KICKED', 'kicked');

define('CHAT_TYPE_SENDER', 'sender');
define('CHAT_TYPE_GROUP', 'group');
define('CHAT_TYPE_SUPERGROUP', 'supergroup');
define('CHAT_TYPE_PRIVATE', 'private');
define('CHAT_TYPE_CHANNEL', 'channel');

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

define('COLOR_RGB_BLUE', 7322096);
define('COLOR_RGB_BLUE_HEX', '0x6FB9F0');
define('COLOR_RGB_YELLOW', 16766590);
define('COLOR_RGB_YELLOW_HEX', '0xFFD67E');
define('COLOR_RGB_VIOLET', 13338331);
define('COLOR_RGB_VIOLET_HEX', '0xCB86DB');
define('COLOR_RGB_GREEN', 9367192);
define('COLOR_RGB_GREEN_HEX', '0x8EEE98');
define('COLOR_RGB_ROSE', 16749490);
define('COLOR_RGB_ROSE_HEX', '0xFF93B2');
define('COLOR_RGB_RED', 16478047);
define('COLOR_RGB_RED_HEX', '0xFB6F5F');

define('DICE_EMOJI_DICE', '🎲');
define('DICE_EMOJI_DART', '🎯');
define('DICE_EMOJI_BASKETBALL', '🏀');
define('DICE_EMOJI_FOOTBALL', '⚽');
define('DICE_EMOJI_SLOT_MACHINE', '🎰');
define('DICE_EMOJI_BOWLING', '🎳');

define('GOOGLE_PLACE_TYPE_ACCOUNTING', 'accounting');
define('GOOGLE_PLACE_TYPE_AIRPORT', 'airport');
define('GOOGLE_PLACE_TYPE_AMUSEMENT_PARK', 'amusement_park');
define('GOOGLE_PLACE_TYPE_AQUARIUM', 'aquarium');
define('GOOGLE_PLACE_TYPE_ART_GALLERY', 'art_gallery');
define('GOOGLE_PLACE_TYPE_ATM', 'atm');
define('GOOGLE_PLACE_TYPE_BAKERY', 'bakery');
define('GOOGLE_PLACE_TYPE_BANK', 'bank');
define('GOOGLE_PLACE_TYPE_BAR', 'bar');
define('GOOGLE_PLACE_TYPE_BEAUTY_SALON', 'beauty_salon');
define('GOOGLE_PLACE_TYPE_BICYCLE_STORE', 'bicycle_store');
define('GOOGLE_PLACE_TYPE_BOOK_STORE', 'book_store');
define('GOOGLE_PLACE_TYPE_BOWLING_ALLEY', 'bowling_alley');
define('GOOGLE_PLACE_TYPE_BUS_STATION', 'bus_station');
define('GOOGLE_PLACE_TYPE_CAFE', 'cafe');
define('GOOGLE_PLACE_TYPE_CAMPGROUND', 'campground');
define('GOOGLE_PLACE_TYPE_CAR_DEALER', 'car_dealer');
define('GOOGLE_PLACE_TYPE_CAR_RENTAL', 'car_rental');
define('GOOGLE_PLACE_TYPE_CAR_REPAIR', 'car_repair');
define('GOOGLE_PLACE_TYPE_CAR_WASH', 'car_wash');
define('GOOGLE_PLACE_TYPE_CASINO', 'casino');
define('GOOGLE_PLACE_TYPE_CEMETERY', 'cemetery');
define('GOOGLE_PLACE_TYPE_CHURCH', 'church');
define('GOOGLE_PLACE_TYPE_CITY_HALL', 'city_hall');
define('GOOGLE_PLACE_TYPE_CLOTHING_STORE', 'clothing_store');
define('GOOGLE_PLACE_TYPE_CONVENIENCE_STORE', 'convenience_store');
define('GOOGLE_PLACE_TYPE_COURTHOUSE', 'courthouse');
define('GOOGLE_PLACE_TYPE_DENTIST', 'dentist');
define('GOOGLE_PLACE_TYPE_DEPARTMENT_STORE', 'department_store');
define('GOOGLE_PLACE_TYPE_DOCTOR', 'doctor');
define('GOOGLE_PLACE_TYPE_DRUGSTORE', 'drugstore');
define('GOOGLE_PLACE_TYPE_ELECTRICIAN', 'electrician');
define('GOOGLE_PLACE_TYPE_ELECTRONICS_STORE', 'electronics_store');
define('GOOGLE_PLACE_TYPE_EMBASSY', 'embassy');
define('GOOGLE_PLACE_TYPE_FIRE_STATION', 'fire_station');
define('GOOGLE_PLACE_TYPE_FLORIST', 'florist');
define('GOOGLE_PLACE_TYPE_FUNERAL_HOME', 'funeral_home');
define('GOOGLE_PLACE_TYPE_FURNITURE_STORE', 'furniture_store');
define('GOOGLE_PLACE_TYPE_GAS_STATION', 'gas_station');
define('GOOGLE_PLACE_TYPE_GYM', 'gym');
define('GOOGLE_PLACE_TYPE_HAIR_CARE', 'hair_care');
define('GOOGLE_PLACE_TYPE_HARDWARE_STORE', 'hardware_store');
define('GOOGLE_PLACE_TYPE_HINDU_TEMPLE', 'hindu_temple');
define('GOOGLE_PLACE_TYPE_HOME_GOODS_STORE', 'home_goods_store');
define('GOOGLE_PLACE_TYPE_HOSPITAL', 'hospital');
define('GOOGLE_PLACE_TYPE_INSURANCE_AGENCY', 'insurance_agency');
define('GOOGLE_PLACE_TYPE_JEWELRY_STORE', 'jewelry_store');
define('GOOGLE_PLACE_TYPE_LAUNDRY', 'laundry');
define('GOOGLE_PLACE_TYPE_LAWYER', 'lawyer');
define('GOOGLE_PLACE_TYPE_LIBRARY', 'library');
define('GOOGLE_PLACE_TYPE_LIGHT_RAIL_STATION', 'light_rail_station');
define('GOOGLE_PLACE_TYPE_LIQUOR_STORE', 'liquor_store');
define('GOOGLE_PLACE_TYPE_LOCAL_GOVERNMENT_OFFICE', 'local_government_office');
define('GOOGLE_PLACE_TYPE_LOCKSMITH', 'locksmith');
define('GOOGLE_PLACE_TYPE_LODGING', 'lodging');
define('GOOGLE_PLACE_TYPE_MEAL_DELIVERY', 'meal_delivery');
define('GOOGLE_PLACE_TYPE_MEAL_TAKEAWAY', 'meal_takeaway');
define('GOOGLE_PLACE_TYPE_MOSQUE', 'mosque');
define('GOOGLE_PLACE_TYPE_MOVIE_RENTAL', 'movie_rental');
define('GOOGLE_PLACE_TYPE_MOVIE_THEATER', 'movie_theater');
define('GOOGLE_PLACE_TYPE_MOVING_COMPANY', 'moving_company');
define('GOOGLE_PLACE_TYPE_MUSEUM', 'museum');
define('GOOGLE_PLACE_TYPE_NIGHT_CLUB', 'night_club');
define('GOOGLE_PLACE_TYPE_PAINTER', 'painter');
define('GOOGLE_PLACE_TYPE_PARK', 'park');
define('GOOGLE_PLACE_TYPE_PARKING', 'parking');
define('GOOGLE_PLACE_TYPE_PET_STORE', 'pet_store');
define('GOOGLE_PLACE_TYPE_PHARMACY', 'pharmacy');
define('GOOGLE_PLACE_TYPE_PHYSIOTHERAPIST', 'physiotherapist');
define('GOOGLE_PLACE_TYPE_PLUMBER', 'plumber');
define('GOOGLE_PLACE_TYPE_POLICE', 'police');
define('GOOGLE_PLACE_TYPE_POST_OFFICE', 'post_office');
define('GOOGLE_PLACE_TYPE_PRIMARY_SCHOOL', 'primary_school');
define('GOOGLE_PLACE_TYPE_REAL_ESTATE_AGENCY', 'real_estate_agency');
define('GOOGLE_PLACE_TYPE_RESTAURANT', 'restaurant');
define('GOOGLE_PLACE_TYPE_ROOFING_CONTRACTOR', 'roofing_contractor');
define('GOOGLE_PLACE_TYPE_RV_PARK', 'rv_park');
define('GOOGLE_PLACE_TYPE_SCHOOL', 'school');
define('GOOGLE_PLACE_TYPE_SECONDARY_SCHOOL', 'secondary_school');
define('GOOGLE_PLACE_TYPE_SHOE_STORE', 'shoe_store');
define('GOOGLE_PLACE_TYPE_SHOPPING_MALL', 'shopping_mall');
define('GOOGLE_PLACE_TYPE_SPA', 'spa');
define('GOOGLE_PLACE_TYPE_STADIUM', 'stadium');
define('GOOGLE_PLACE_TYPE_STORAGE', 'storage');
define('GOOGLE_PLACE_TYPE_STORE', 'store');
define('GOOGLE_PLACE_TYPE_SUBWAY_STATION', 'subway_station');
define('GOOGLE_PLACE_TYPE_SUPERMARKET', 'supermarket');
define('GOOGLE_PLACE_TYPE_SYNAGOGUE', 'synagogue');
define('GOOGLE_PLACE_TYPE_TAXI_STAND', 'taxi_stand');
define('GOOGLE_PLACE_TYPE_TOURIST_ATTRACTION', 'tourist_attraction');
define('GOOGLE_PLACE_TYPE_TRAIN_STATION', 'train_station');
define('GOOGLE_PLACE_TYPE_TRANSIT_STATION', 'transit_station');
define('GOOGLE_PLACE_TYPE_TRAVEL_AGENCY', 'travel_agency');
define('GOOGLE_PLACE_TYPE_UNIVERSITY', 'university');
define('GOOGLE_PLACE_TYPE_VETERINARY_CARE', 'veterinary_care');
define('GOOGLE_PLACE_TYPE_ZOO', 'zoo');

define('MENU_BUTTON_TYPE_DEFAULT', 'default');
define('MENU_BUTTON_TYPE_WEB_APP', 'web_app');
define('MENU_BUTTON_TYPE_COMMANDS', 'commands');

define('POLL_TYPE_REGULAR', 'regular');
define('POLL_TYPE_QUIZ', 'quiz');

define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_USER_CHATS', 'allow_user_chats');
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_BOT_CHATS', 'allow_bot_chats');
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_GROUP_CHATS', 'allow_group_chats');
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_CHANNEL_CHATS', 'allow_channel_chats');

define('STICKER_FORMAT_STATIC', 'static');
define('STICKER_FORMAT_ANIMATED', 'animated');
define('STICKER_FORMAT_VIDEO', 'video');

define('STICKER_MASK_POSITION_POINT_FOREHEAD', 'forehead');
define('STICKER_MASK_POSITION_POINT_EYES', 'eyes');
define('STICKER_MASK_POSITION_POINT_MOUTH', 'mouth');
define('STICKER_MASK_POSITION_POINT_CHIN', 'chin');

define('STICKER_TYPE_REGULAR', 'regular');
define('STICKER_TYPE_MASK', 'mask');
define('STICKER_TYPE_CUSTOM_EMOJI', 'custom_emoji');

define('PARSE_MODE_HTML', 'HTML');
define('PARSE_MODE_MARKDOWN', 'Markdown');
define('PARSE_MODE_MARKDOWN_V2', 'MarkdownV2');

define('PASSPORT_ELEMENT_TYPE_PASSPORT', 'passport');
define('PASSPORT_ELEMENT_TYPE_DRIVER_LICENSE', 'driver_license');
define('PASSPORT_ELEMENT_TYPE_IDENTITY_CARD', 'identity_card');
define('PASSPORT_ELEMENT_TYPE_INTERNAL_PASSPORT', 'internal_passport');
define('PASSPORT_ELEMENT_TYPE_UTILITY_BILL', 'utility_bill');
define('PASSPORT_ELEMENT_TYPE_BANK_STATEMENT', 'bank_statement');
define('PASSPORT_ELEMENT_TYPE_RENTAL_AGREEMENT', 'rental_agreement');
define('PASSPORT_ELEMENT_TYPE_PASSPORT_REGISTRATION', 'passport_registration');
define('PASSPORT_ELEMENT_TYPE_TEMPORARY_REGISTRATION', 'temporary_registration');

define('PASSPORT_ELEMENT_ERROR_DATA_FIELD', 'data');
define('PASSPORT_ELEMENT_ERROR_FRONT_SIDE', 'front_side');
define('PASSPORT_ELEMENT_ERROR_REVERSE_SIDE', 'reverse_side');
define('PASSPORT_ELEMENT_ERROR_SELFIE', 'selfie');
define('PASSPORT_ELEMENT_ERROR_FILE', 'file');
define('PASSPORT_ELEMENT_ERROR_FILES', 'files');
define('PASSPORT_ELEMENT_ERROR_TRANSLATION_FILE', 'translation_file');
define('PASSPORT_ELEMENT_ERROR_TRANSLATION_FILES', 'translation_files');
define('PASSPORT_ELEMENT_ERROR_UNSPECIFIED', 'unspecified');

define('INPUT_MEDIA_TYPE_ANIMATION', 'animation');
define('INPUT_MEDIA_TYPE_DOCUMENT', 'document');
define('INPUT_MEDIA_TYPE_AUDIO', 'audio');
define('INPUT_MEDIA_TYPE_PHOTO', 'photo');
define('INPUT_MEDIA_TYPE_VIDEO', 'video');

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
define('API_LIMIT_DOWNLOAD_FILE_SIZE_MAX', 20971520);

define('API_BASE_URL', 'https://api.telegram.org');
define('API_BASE_URL_BOT', 'https://api.telegram.org/bot');
define('API_BASE_URL_FILE', 'https://api.telegram.org/file/bot');

define('REGEX_BOT_TOKEN', '/(?<token>(?<bot_id>\d{8,10})\:(?<hash>[\w-]{35}))/');
define('REGEX_INVITE_LINK', '/(?<invite_link>(?:http[s]://)?(?:t|telegram)\.(?:me|dog)\/(?:joinchat\/|\+)(?<hash>[\w\-]+))/i');
define('REGEX_USERNAME', '/@(?<username>\w{5,32})/');

define('_REGEX_FIND_PLACEHOLDERS', '/\{([^}]+)\}/');
define('_REGEX_PLACEHOLDERS_REPLACEMENT', '(?P<$1>\w+)');
define('_PACKAGE_NAME', 'devdasher/ptb-php');
define('_CACHE_CONVERSATION_TTL', 10800);
define('_CACHE_USER_DATA_TTL', 120);
define('_FIELD_EXCEPTION', 'exception');
define('_FIELD_FALLBACK', 'fallback');
define('_FIELD_API_ERROR', 'api_error');
define('_FIELD_CALLABLE', 'callable');
define('_FIELD_HANDLERS', 'handlers');
define('_FIELD_SKIP_MIDDLEWARES', 'skip_middlewares');
define('_FIELD_MIDDLEWARES', 'middlewares');
define('_FIELD_IS_WEBHOOK', 'is_webhook');
define('_FIELD_CACHE', 'cache');
define('_FIELD_TOKEN', 'token');
define('_FIELD_USERNAME', 'username');
define('_FIELD_CURL_OPTIONS', 'curl_options');
define('_FIELD_UPDATE', 'update');
define('_FIELD_GLOBAL_DATA', 'global_data');
define('_FIELD_ALLOWED_UPDATES', 'allowed_updates');

function configurePTB(
    string $username,
    string $token,
    string $api_base_url = API_BASE_URL,
    array $curl_options = [],
    bool $is_webhook = false,
    ?CacheInterface $cache = null,
    array $update = [],
    array $global_data = [],
    ?array $allowed_updates = null,
): void {
    $GLOBALS[_PACKAGE_NAME] = array_merge([
        _FIELD_IS_WEBHOOK => $is_webhook,
        _FIELD_CACHE => $cache ?? (!__isComposerUsed() ?: new Psr16Cache(new ArrayAdapter())),
        _FIELD_UPDATE => $update,
        _FIELD_GLOBAL_DATA => $global_data,
        _FIELD_ALLOWED_UPDATES => $allowed_updates ?? _updateTypes(),
        _FIELD_MIDDLEWARES => [],
        _FIELD_HANDLERS => [],
    ], $GLOBALS[_PACKAGE_NAME] ?? []);
    _registerNewBot(
        username: $username,
        token: $token,
        api_base_url: $api_base_url,
        curl_options: $curl_options,
    );
}

function middleware(array|string|callable $callable, ?string $name = null): void {
    __addMiddleware(callable: $callable, name: $name);
}

function middlewares(array $callables): void {
    foreach ($callables as $name => $callable) {
        middleware($callable, is_numeric($name) ? null : $name);
    }
}

function onMessageText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.text.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessagePhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.photo",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageAnimation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.animation",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVideo(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.video",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVideoNote(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.video_note",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageAudio(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.audio",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVoice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.voice",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageDocument(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.document",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageLocation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.location",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageContact(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.contact",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessagePoll(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVenue(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.venue",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageGame(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.game",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageDice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.dice",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageSticker(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message.sticker",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageNewChatMembers(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.new_chat_members',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageLeftChatMember(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.left_chat_member',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageNewChatTitle(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.new_chat_title',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageNewChatPhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.new_chat_photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageDeleteChatPhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.delete_chat_photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageGroupChatCreated(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.group_chat_created',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageSupergroupChatCreated(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.supergroup_chat_created',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageChannelChatCreated(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.channel_chat_created',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageAutoDeleteTimerChanged(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.message_auto_delete_timer_changed',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageMigrateToChatId(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.migrate_to_chat_id',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageMigrateFromChatId(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.migrate_from_chat_id',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessagePinnedMessage(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.pinned_message',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageInvoice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.invoice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageSuccessfulPayment(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.successful_payment',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageUserShared(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.user_shared',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageChatShared(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.chat_shared',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageConnectedWebsite(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.connected_website',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageWriteAccessAllowed(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.write_access_allowed',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessagePassportData(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.passport_data',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageProximityAlertTriggered(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.proximity_alert_triggered',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageForumTopicCreated(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.forum_topic_created',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageForumTopicEdited(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.forum_topic_edited',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageForumTopicClosed(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.forum_topic_closed',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageForumTopicReopened(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.forum_topic_reopened',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageGeneralForumTopicHidden(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.general_forum_topic_hidden',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageGeneralForumTopicUnhidden(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.general_forum_topic_unhidden',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVideoChatScheduled(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.video_chat_scheduled',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVideoChatStarted(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.video_chat_started',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVideoChatEnded(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.video_chat_ended',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageVideoChatParticipantsInvited(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.video_chat_participants_invited',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessageWebAppData(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'message.web_app_data',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMessage(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "message",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "edited_message.text.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessagePhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageAnimation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.animation',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageVideo(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.video',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageVideoNote(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.video_note',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageAudio(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.audio',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageVoice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.voice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageDocument(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.document',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageLocation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.location',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageContact(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.contact',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessagePoll(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageVenue(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.venue',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageGame(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.game',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageDice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.dice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessageSticker(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message.sticker',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedMessage(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_message',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onCallbackQuery(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'callback_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onCallbackQueryData(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "callback_query.data.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "channel_post.text.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostPhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostAnimation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.animation',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVideo(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.video',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVideoNote(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.video_note',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostAudio(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.audio',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVoice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.voice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostDocument(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.document',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostLocation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.location',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostContact(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.contact',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostPoll(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVenue(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.venue',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostGame(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.game',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostDice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.dice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostSticker(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.sticker',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostNewChatTitle(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.new_chat_title',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
function onChannelPostNewChatPhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.new_chat_photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostDeleteChatPhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.delete_chat_photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostMessageAutoDeleteTimerChanged(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.message_auto_delete_timer_changed',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostPinnedMessage(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.pinned_message',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVideoChatScheduled(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.video_chat_scheduled',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVideoChatStarted(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.video_chat_started',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVideoChatEnded(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.video_chat_ended',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPostVideoChatParticipantsInvited(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post.video_chat_participants_invited',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChannelPost(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'channel_post',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "edited_channel_post.text.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostPhoto(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostAnimation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.animation',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostVideo(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.video',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostVideoNote(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.video_note',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostAudio(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.audio',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostVoice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.voice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostDocument(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.document',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostLocation(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.location',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostContact(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.contact',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostPoll(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostVenue(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.venue',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostGame(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.game',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostDice(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.dice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPostSticker(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post.sticker',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onEditedChannelPost(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'edited_channel_post',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChatMember(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'chat_member',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onMyChatMember(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'my_chat_member',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onPoll(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onPollAnswer(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'poll_answer',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onInlineQuery(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'inline_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onInlineQueryText(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "inline_query.query.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onShippingQuery(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'shipping_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChatJoinRequest(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'chat_join_request',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onPreCheckoutQuery(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'pre_checkout_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChosenInlineResult(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'chosen_inline_result',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChosenInlineResultQuery(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "chosen_inline_result.query.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onChosenInlineResultId(
    string $pattern,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: "chosen_inline_result.result_id.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function fallbackOn(
    string $updateType,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    if (!in_array($updateType, _updateTypes())) {
        throw new Exception("Invalid update type '{$updateType}'!");
    }
    __addHandler(
        keys: "{$updateType}.fallback",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function fallback(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'fallback',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onException(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'exception',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function onApiError(
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    __addHandler(
        keys: 'api_error',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}

function Update(
    int $update_id = null,
    ?array $message = null,
    ?array $edited_message = null,
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
    return __prepareApiTypeFields(get_defined_vars());
}

function WebhookInfo(
    string $url,
    bool $has_custom_certificate,
    int $pending_update_count,
    ?string $ip_address = null,
    ?int $last_error_date = null,
    ?string $last_error_message = null,
    ?int $last_synchronization_error_date = null,
    ?int $max_connections = null,
    ?array $allowed_updates = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?bool $can_read_all_group_messages = null,
    ?bool $supports_inline_queries = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?bool $has_restricted_voice_and_video_messages = null,
    ?bool $join_to_send_messages = null,
    ?bool $join_by_request = null,
    ?string $description = null,
    ?string $invite_link = null,
    ?array $pinned_message = null,
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
    return __prepareApiTypeFields(get_defined_vars());
}

function Message(
    ?int $message_id = null,
    ?int $date = null,
    ?array $chat = null,
    ?int $message_thread_id = null,
    ?array $from = null,
    ?array $sender_chat = null,
    ?array $forward_from = null,
    ?array $forward_from_chat = null,
    ?int $forward_from_message_id = null,
    ?string $forward_signature = null,
    ?string $forward_sender_name = null,
    ?int $forward_date = null,
    ?bool $is_topic_message = null,
    ?bool $is_automatic_forward = null,
    ?array $reply_to_message = null,
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
    ?array $pinned_message = null,
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
    return __prepareApiTypeFields(get_defined_vars());
}

function MessageId(int $messageId): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function MessageEntity(
    string $type,
    int $offset,
    int $length,
    ?string $url = null,
    ?array $user = null,
    ?string $language = null,
    ?string $custom_emoji_id = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PhotoSize(
    string $file_id,
    string $file_unique_id,
    int $width,
    int $height,
    ?int $file_size = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function Document(
    string $file_id,
    string $file_unique_id,
    ?array $thumbnail = null,
    ?string $file_name = null,
    ?string $mime_type = null,
    ?int $file_size = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function VideoNote(
    string $file_id,
    string $file_unique_id,
    int $length,
    int $duration,
    ?array $thumbnail = null,
    ?int $file_size = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function Voice(
    string $file_id,
    string $file_unique_id,
    int $duration,
    ?string $mime_type = null,
    ?int $file_size = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function Contact(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?int $user_id,
    ?string $vcard = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function Dice(string $emoji, int $value): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PollOption(string $text, int $voter_count): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PollAnswer(string $poll_id, array $user, array $option_ids): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function Location(
    float|string $longitude,
    float|string $latitude,
    null|float|string $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function Venue(
    array $location,
    string $title,
    string $address,
    ?string $foursquare_id = null,
    ?string $foursquare_type = null,
    ?string $google_place_id = null,
    ?string $google_place_type = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function WebAppData(string $data, string $button_text): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ProximityAlertTriggered(array $traveler, array $watcher, int $distance): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function MessageAutoDeleteTimerChanged(int $message_auto_delete_time): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ForumTopicCreated(string $name, int $icon_color, ?string $icon_custom_emoji_id = null): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ForumTopicClosed(): array {
    return [];
}

function ForumTopicEdited(?string $name = null, ?string $icon_custom_emoji_id = null): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ForumTopicReopened(): array {
    return [];
}

function GeneralForumTopicHidden(): array {
    return [];
}

function GeneralForumTopicUnhidden(): array {
    return [];
}

function UserShared(int $request_id, int $user_id): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatShared(int $request_id, int $chat_id): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function WriteAccessAllowed(?string $web_app_name = null): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function VideoChatScheduled(int $start_date): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function VideoChatStarted(): array {
    return [];
}

function VideoChatEnded(int $duration): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function VideoChatParticipantsInvited(array $users): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function UserProfilePhotos(int $total_count, array $photos): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function File(
    string $file_id,
    string $file_unique_id,
    ?int $file_size = null,
    ?string $file_path = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function WebAppInfo(string $url): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ReplyKeyboardMarkup(
    array $keyboard,
    ?bool $is_persistent = null,
    ?bool $resize_keyboard = null,
    ?bool $one_time_keyboard = null,
    ?bool $selective = null,
    ?string $input_field_placeholder = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function KeyboardButton(
    string $text,
    ?array $request_user = null,
    ?array $request_chat = null,
    ?bool $request_contact = null,
    ?bool $request_location = null,
    ?array $request_poll = null,
    ?array $web_app = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function KeyboardButtonRequestUser(
    int $request_id,
    ?bool $user_is_bot = null,
    ?bool $user_is_premium = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function KeyboardButtonPollType(?string $type = null): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ReplyKeyboardRemove(bool $remove_keyboard = true, ?bool $selective = null): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineKeyboardMarkup(array $inline_keyboard): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function LoginUrl(
    string $url,
    ?string $forward_text = null,
    ?string $bot_username = null,
    ?bool $request_write_access = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function SwitchInlineQueryChosenChat(
    ?string $query = null,
    ?bool $allow_user_chats = null,
    ?bool $allow_bot_chats = null,
    ?bool $allow_group_chats = null,
    ?bool $allow_channel_chats = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function CallbackQuery(
    string $id,
    array $from,
    ?array $message = null,
    ?string $inline_message_id = null,
    ?string $chat_instance = null,
    ?string $data = null,
    ?string $game_short_name = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ForceReply(
    bool $force_reply = true,
    ?string $input_field_placeholder = null,
    ?bool $selective = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatPhoto(
    string $small_file_id,
    string $small_file_unique_id,
    string $big_file_id,
    string $big_file_unique_id,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatAdministratorRights(
    ?bool $is_anonymous = null,
    ?bool $can_manage_chat = null,
    ?bool $can_delete_messages = null,
    ?bool $can_manage_video_chats = null,
    ?bool $can_restrict_members = null,
    ?bool $can_promote_members = null,
    ?bool $can_change_info = null,
    ?bool $can_invite_users = null,
    ?bool $can_post_messages = null,
    ?bool $can_edit_messages = null,
    ?bool $can_pin_messages = null,
    ?bool $can_manage_topics = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

// function ChatMember(): array {
//     return __prepareApiTypeFields(get_defined_vars());
// }

function ChatMemberOwner(
    string $status,
    array $user,
    bool $is_anonymous,
    ?string $custom_title = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatMemberAdministrator(
    string $status,
    array $user,
    bool $can_be_edited,
    bool $is_anonymous,
    bool $can_manage_chat,
    bool $can_delete_messages,
    bool $can_manage_video_chats,
    bool $can_restrict_members,
    bool $can_promote_members,
    bool $can_change_info,
    bool $can_invite_users,
    ?bool $can_post_messages = null,
    ?bool $can_edit_messages = null,
    ?bool $can_pin_messages = null,
    ?bool $can_manage_topics = null,
    ?bool $custom_title = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatMemberMember(string $status, array $user): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatMemberRestricted(
    string $status,
    array $user,
    bool $is_member,
    bool $can_send_messages,
    bool $can_send_audios,
    bool $can_send_documents,
    bool $can_send_photos,
    bool $can_send_videos,
    bool $can_send_video_notes,
    bool $can_send_voice_notes,
    bool $can_send_polls,
    bool $can_send_other_messages,
    bool $can_add_web_page_previews,
    bool $can_change_info,
    bool $can_invite_users,
    bool $can_pin_messages,
    bool $can_manage_topics,
    int $until_date,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatMemberLeft(string $status, array $user): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatMemberBanned(string $status, array $user, int $until_date): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatMemberUpdated(
    array $chat,
    array $from,
    int $date,
    array $old_chat_member,
    array $new_chat_member,
    ?array $invite_link = null,
    ?bool $via_chat_folder_invite_link = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatJoinRequest(
    array $chat,
    array $from,
    int $user_chat_id,
    int $date,
    ?string $bio = null,
    ?array $invite_link = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatPermissions(
    ?bool $can_send_messages = null,
    ?bool $can_send_audios = null,
    ?bool $can_send_documents = null,
    ?bool $can_send_photos = null,
    ?bool $can_send_videos = null,
    ?bool $can_send_video_notes = null,
    ?bool $can_send_voice_notes = null,
    ?bool $can_send_polls = null,
    ?bool $can_send_other_messages = null,
    ?bool $can_add_web_page_previews = null,
    ?bool $can_change_info = null,
    ?bool $can_invite_users = null,
    ?bool $can_pin_messages = null,
    ?bool $can_manage_topics = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ChatLocation(array $location, string $address): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ForumTopic(
    int $message_thread_id,
    string $name,
    int $icon_color,
    ?string $icon_custom_emoji_id = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function BotCommand(string $command, string $description): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function BotCommandScopeDefault(): array {
    return __prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_DEFAULT]);
}

function BotCommandScopeAllPrivateChats(): array {
    return __prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS]);
}

function BotCommandScopeAllGroupChats(): array {
    return __prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_ALL_GROUP_CHATS]);
}

function BotCommandScopeAllChatAdministrators(): array {
    return __prepareApiTypeFields([FIELD_TYPE => BOT_COMMAND_SCOPE_ALL_CHAT_ADMINISTRATORS]);
}

function BotCommandScopeChat(null|int|string $chat_id = null): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => BOT_COMMAND_SCOPE_CHAT,
    ]));
}

function BotCommandScopeChatAdministrators(null|int|string $chat_id = null): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => BOT_COMMAND_SCOPE_CHAT_ADMINISTRATORS,
    ]));
}

function BotCommandScopeChatMember(null|int|string $chat_id = null, ?int $user_id = null): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => BOT_COMMAND_SCOPE_CHAT_MEMBER,
    ]));
}

function BotName(string $name): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function BotDescription(string $description): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function BotShortDescription(string $short_description): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function MenuButtonCommands(): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => MENU_BUTTON_TYPE_COMMANDS,
    ]));
}

function MenuButtonWebApp(string $text, array $web_app): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => MENU_BUTTON_TYPE_WEB_APP,
    ]));
}

function MenuButtonDefault(): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_TYPE => MENU_BUTTON_TYPE_DEFAULT,
    ]));
}

function ResponseParameters(?int $migrate_to_chat_id = null, ?int $retry_after = null): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_ANIMATION], get_defined_vars()));
}

function InputMediaDocument(
    string $media,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?bool $has_spoiler = null,
    null|CURLFile|string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
): array {
    return __prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_DOCUMENT], get_defined_vars()));
}

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
    return __prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_AUDIO], get_defined_vars()));
}

function InputMediaPhoto(
    string $media,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?bool $has_spoiler = null,
): array {
    return __prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_PHOTO], get_defined_vars()));
}

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
    return __prepareApiTypeFields(array_merge([FIELD_TYPE => INPUT_MEDIA_TYPE_VIDEO], get_defined_vars()));
}

function InputFile(string $file_path): CURLFile { 
    if (!is_file($file_path)) {
        throw new Exception("File '{$file_path}' does not exist!");
    }
    return new CURLFile($file_path);
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function StickerSet(
    string $name,
    string $title,
    string $sticker_type,
    bool $is_animated,
    bool $is_video,
    array $stickers,
    array $thumbnail = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function MaskPosition(
    string $point,
    float $x_shift,
    float $y_shift,
    float $scale,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InputSticker(
    null|CURLFile|string $sticker,
    array $emoji_list,
    ?array $mask_position = null,
    ?array $keywords = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQuery(
    string $id,
    array $from,
    string $query,
    string $offset,
    ?string $chat_type = null,
    ?array $location = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultsButton(
    string $text,
    ?array $web_app = null,
    ?string $start_parameter = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultCachedAudio(
    string $type,
    string|int $id,
    string $audio_file_id,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultCachedGif(
    string $type,
    string|int $id,
    string $gif_file_id,
    ?string $title = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultCachedMpeg4Gif(
    string $type,
    string|int $id,
    string $mpeg4_file_id,
    ?string $title = null,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultCachedSticker(
    string $type,
    string|int $id,
    string $sticker_file_id,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultCachedVoice(
    string $type,
    string|int $id,
    string $voice_file_id,
    string $title,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultArticle(
    string $type,
    string|int $id,
    string $title,
    array $input_message_content,
    ?array $reply_markup = null,
    ?string $url = null,
    ?bool $hide_url = null,
    ?string $description = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultContact(
    string $type,
    string|int $id,
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InlineQueryResultGame(
    string $type,
    string|int $id,
    string $game_short_name,
    ?array $reply_markup = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content= null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    ?array $input_message_content = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InputTextMessageContent(
    string $message_text,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function InputLocationMessageContent(
    float|string $latitude,
    float|string $longitude,
    null|float|string $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function InputContactMessageContent(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function ChosenInlineResult(
    string $query,
    string $result_id,
    array $from,
    ?array $location = null,
    ?string $inline_message_id = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function SentWebAppMessage(string $inline_message_id): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function LabeledPrice(string $label, int $amount): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function Invoice(
    string $title,
    string $description,
    string $start_parameter,
    string $currency,
    int $total_amount,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ShippingAddress(
    string $country_code,
    string $state,
    array $city,
    string $street_line1,
    string $street_line2,
    string $post_code,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function OrderInfo(
    ?string $name = null,
    ?string $phone_number = null,
    ?string $email = null,
    ?array $shipping_address = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ShippingOption(string $id, string $title, array $prices): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function SuccessfulPayment(
    string $currency,
    int $total_amount,
    string $invoice_payload,
    string $telegram_payment_charge_id,
    string $provider_payment_charge_id,
    ?string $shipping_option_id = null,
    ?array $order_info = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function ShippingQuery(
    string $id,
    array $from,
    string $invoice_payload,
    array $shipping_address,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PreCheckoutQuery(
    string $id,
    array $from,
    string $currency,
    int $total_amount,
    string $invoice_payload,
    ?string $shipping_option_id = null,
    ?array $order_info = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PassportData(array $data, array $credentials): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PassportFile(
    string $file_id,
    string $file_unique_id,
    int $file_size,
    int $file_date,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

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
    return __prepareApiTypeFields(get_defined_vars());
}

function EncryptedCredentials(string $data, string $hash, string $secret): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function PassportElementErrorDataField(
    string $type,
    string $field_name,
    string $data_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_DATA_FIELD,
    ]));
}

function PassportElementErrorFrontSide(
    string $type,
    string $file_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_FRONT_SIDE,
    ]));
}

function PassportElementErrorReverseSide(
    string $type,
    string $file_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_REVERSE_SIDE,
    ]));
}

function PassportElementErrorSelfie(
    string $type,
    string $file_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_SELFIE,
    ]));
}

function PassportElementErrorFile(
    string $type,
    string $file_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_FILE,
    ]));
}

function PassportElementErrorFiles(
    string $type,
    array $file_hashes,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_FILES,
    ]));
}

function PassportElementErrorTranslationFile(
    string $type,
    string $file_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_TRANSLATION_FILE,
    ]));
}

function PassportElementErrorTranslationFiles(
    string $type,
    array $file_hashes,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_TRANSLATION_FILES,
    ]));
}

function PassportElementErrorUnspecified(
    string $type,
    array $element_hash,
    string $message,
): array {
    return __prepareApiTypeFields(array_merge(get_defined_vars(), [
        FIELD_SOURCE => PASSPORT_ELEMENT_ERROR_UNSPECIFIED,
    ]));
}

function Game(
    string $title,
    string $description,
    array $photo,
    ?string $text = null,
    ?array $text_entities = null,
    ?array $animation = null,
): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function CallbackGame(): array {
    return [];
}

function GameHighScore(int $position, array $user, int $score): array {
    return __prepareApiTypeFields(get_defined_vars());
}

function getUpdates(
    int $limit = 100,
    int $timeout = 0,
    ?int $offset = null,
    ?array $allowed__updates = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setWebhook(
    string $url,
    null|CURLFile|string $certificate = null,
    ?string $ip_address = null,
    ?int $max_connections = null,
    ?array $allowed_updates = null,
    ?bool $drop_pending_updates = null,
    ?string $secret_token = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function deleteWebhook(
    ?bool $drop_pending_updates = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getWebhookInfo(?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getMe(?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, options: $_options);
}

function logOut(?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, options: $_options);
}

function close(?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, options: $_options);
}

function deleteMessage(
    int $message_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendMessage(
    string $text,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
    ?bool $disable_notification = true,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function forwardMessage(
    int|string $chat_id,
    ?int $message_id = null,
    null|int|string $from_chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function copyMessage(
    int|string $chat_id,
    ?int $message_id = null,
    null|int|string $from_chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendPhoto(
    CURLFile|string $photo,
    null|int|string $chat_id = null,
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
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendAudio(
    CURLFile|string $audio,
    null|int|string $chat_id = null,
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
    null|CURLFile|string $thumbnail = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendDocument(
    CURLFile|string $document,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    null|CURLFile|string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendVideo(
    CURLFile|string $video,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    null|CURLFile|string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
    ?int $width = null,
    ?int $height = null,
    ?bool $has_spoiler = null,
    ?bool $supports_streaming = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendAnimation(
    CURLFile|string $animation,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    null|CURLFile|string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
    ?int $width = null,
    ?int $height = null,
    ?bool $has_spoiler = null,
    ?bool $supports_streaming = null,
    ?int $duration = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendVoice(
    CURLFile|string $voice,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendVideoNote(
    CURLFile|string $video_note,
    null|int|string $chat_id = null,
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
    null|CURLFile|string $thumbnail = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendMediaGroup(
    array $media,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendLocation(
    float|string $latitude,
    float|string $longitude,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    null|float|string $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendVenue(
    string $title,
    string $address,
    float|string $latitude,
    float|string $longitude,
    null|int|string $chat_id = null,
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
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendContact(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendPoll(
    string $question,
    array $options,
    null|int|string $chat_id = null,
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
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendDice(
    string $emoji,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function sendFile(
    null|CURLFile|string $document = null,
    null|CURLFile|string $audio = null,
    null|CURLFile|string $photo = null,
    null|CURLFile|string $video = null,
    null|CURLFile|string $animation = null,
    null|CURLFile|string $voice = null,
    null|CURLFile|string $video_note = null,
    null|CURLFile|string $sticker = null,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?string $caption = null,
    ?array $caption_entities = null,
    ?string $parse_mode = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    null|CURLFile|string $thumbnail = null,
    ?bool $disable_content_type_detection = null,
    ?int $duration = null,
    ?string $performer = null,
    ?string $title = null,
    ?int $width = null,
    ?int $height = null,
    ?bool $supports_streaming = null,
    ?int $length = null,
    ?string $emoji = null,
    ?array $_options = [],
): array {
    $parameters = __removeNullValues(get_defined_vars());
    if (isset($document)) {
        return sendDocument(...$parameters);
    }
    if (isset($audio)) {
        return sendAudio(...$parameters);
    }
    if (isset($photo)) {
        return sendPhoto(...$parameters);
    }
    if (isset($video)) {
        return sendVideo(...$parameters);
    }
    if (isset($animation)) {
        return sendAnimation(...$parameters);
    }
    if (isset($voice)) {
        return sendVoice(...$parameters);
    }
    if (isset($video_note)) {
        return sendVideoNote(...$parameters);
    }
    if (isset($sticker)) {
        return sendSticker(...$parameters);
    }
}

function sendChatAction(
    string $action,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getUserProfilePhotos(
    ?int $user_id = null,
    ?int $offset = null,
    ?int $limit = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getFile(
    string $file_id,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function banChatMember(
    int $user_id,
    null|int|string $chat_id = null,
    ?int $until_date = null,
    ?bool $revoke_messages = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function unbanChatMember(
    int $user_id,
    null|int|string $chat_id = null,
    ?bool $only_if_banned = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function restrictChatMember(
    int $user_id,
    array $permissions,
    null|int|string $chat_id = null,
    ?bool $only_if_banned = null,
    ?bool $use_independent_chat_permissions = null,
    ?int $until_date = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function promoteChatMember(
    int $user_id,
    null|int|string $chat_id = null,
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
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatAdministratorCustomTitle(
    int $user_id,
    null|int|string $chat_id = null,
    string $custom_title,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function banChatSenderChat(
    int $sender_chat_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function unbanChatSenderChat(
    int $sender_chat_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatPermissions(
    array $permissions,
    null|int|string $chat_id = null,
    ?bool $use_independent_chat_permissions = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function exportChatInviteLink(null|int|string $chat_id = null, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function createChatInviteLink(
    null|int|string $chat_id = null,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?bool $creates_join_request = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function editChatInviteLink(
    string $invite_link,
    null|int|string $chat_id = null,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?bool $creates_join_request = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function revokeChatInviteLink(
    string $invite_link,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function approveChatJoinRequest(
    int $user_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function declineChatJoinRequest(
    int $user_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatPhoto(
    null|CURLFile|string $photo,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function deleteChatPhoto(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatTitle(
    string $title,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatDescription(
    string $description,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function pinChatMessage(
    int $message_id,
    null|int|string $chat_id = null,
    ?bool $disable_notification = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function unpinChatMessage(
    int $message_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function unpinAllChatMessages(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function leaveChat(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getChat(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getChatAdministrators(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getChatMemberCount(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getChatMember(
    int $user_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatStickerSet(
    string $sticker_set_name,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function deleteChatStickerSet(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getForumTopicIconStickers(?array $_options = [],): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function createForumTopic(
    string $name,
    null|int|string $chat_id = null,
    ?int $icon_color = null,
    ?string $icon_custom_emoji_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function editForumTopic(
    int $message_thread_id,
    null|int|string $chat_id = null,
    ?string $name,
    ?string $icon_custom_emoji_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function closeForumTopic(
    int $message_thread_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function reopenForumTopic(
    int $message_thread_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function deleteForumTopic(
    int $message_thread_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function unpinAllForumTopicMessages(
    int $message_thread_id,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function editGeneralForumTopic(
    string $name,
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function closeGeneralForumTopic(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function reopenGeneralForumTopic(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function hideGeneralForumTopic(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function unhideGeneralForumTopic(
    null|int|string $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function answerCallbackQuery(
    string $text,
    ?bool $show_alert = null,
    ?string $url = null,
    ?int $cache_time = null,
    ?int $callback_query_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setMyCommands(
    array $commands,
    ?array $scope = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function deleteMyCommands(
    ?array $scope = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getMyCommands(
    ?array $scope = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setMyName(
    ?string $name = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getMyName(
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setMyDescription(
    ?string $description = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getMyDescription(
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setMyShortDescription(
    ?string $short_description = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getMyShortDescription(
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setChatMenuButton(
    ?array $menu_button = null,
    null|int $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function getChatMenuButton(
    null|int $chat_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}

function setMyDefaultAdministratorRights(
    ?array $rights = null,
    ?bool $for_channels = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function getMyDefaultAdministratorRights(
    ?bool $for_channels = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function editMessageText(
    string $text,
    ?int $message_id = null,
    null|int|string $chat_id = null,
    ?string $inline_message_id = null,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function editMessageCaption(
    ?string $caption = null,
    ?int $message_id = null,
    null|int|string $chat_id = null,
    ?string $inline_message_id = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function editMessageMedia(
    array $media,
    ?int $message_id = null,
    null|int|string $chat_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function editMessageLiveLocation(
    float|string $latitude,
    float|string $longitude,
    ?int $message_id = null,
    null|int|string $chat_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
    null|float|string $horizontal_accuracy = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function stopMessageLiveLocation(
    ?int $message_id = null,
    ?string $inline_message_id = null,
    null|int|string $chat_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function editMessageReplyMarkup(
    ?array $reply_markup = null,
    ?int $message_id = null,
    null|int|string $chat_id = null,
    ?string $inline_message_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function stopPoll(
    ?int $message_id = null,
    null|int|string $chat_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function sendSticker(
    CURLFile|string $sticker,
    null|int|string $chat_id = null,
    ?int $message_thread_id = null,
    ?array $reply_markup = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?string $emoji = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function getStickerSet(string $name, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function getCustomEmojiStickers(array $custom_emoji_ids, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function uploadStickerFile(
    null|CURLFile|string $sticker,
    string $sticker_format,
    ?int $user_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function createNewStickerSet(
    string $name,
    string $title,
    array $stickers,
    string $sticker_format,
    ?int $user_id = null,
    ?string $sticker_type = null,
    ?bool $needs_repainting = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function addStickerToSet(
    string $name,
    array $sticker,
    ?int $user_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setStickerPositionInSet(
    string $sticker,
    int $position,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function deleteStickerFromSet(string $sticker, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setStickerEmojiList(
    string $sticker,
    array $emoji_list,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setStickerKeywords(
    string $sticker,
    ?array $keywords = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setStickerMaskPosition(
    string $sticker,
    ?array $mask_position = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setStickerSetTitle(
    string $name,
    string $title,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setStickerSetThumbnail(
    string $name,
    ?int $user_id = null,
    null|CURLFile|string $thumbnail = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setCustomEmojiStickerSetThumbnail(
    string $name,
    ?string $custom_emoji_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function deleteStickerSet(string $name, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function answerInlineQuery(
    array $results,
    ?int $cache_time = null,
    ?bool $is_personal = null,
    ?string $next_offset = null,
    ?array $button = null,
    ?string $inline_query_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function answerWebAppQuery(array $result, ?string $web_app_query_id = null, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function sendInvoice(
    string $title,
    string $description,
    string $payload,
    string $provider_token,
    string $currency,
    array $prices,
    null|int|string $chat_id = null,
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
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

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
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function answerShippingQuery(
    bool $ok,
    ?array $shipping_options = null,
    ?string $error_message = null,
    ?string $shipping_query_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function answerPreCheckoutQuery(
    bool $ok,
    ?string $error_message = null,
    ?string $pre_checkout_query_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setPassportDataErrors(int $user_id, array $errors, ?array $_options = []): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function sendGame(
    string $game_short_name,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?int $reply_to_message_id = null,
    ?bool $allow_sending_without_reply = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function setGameScore(
    int $user_id,
    string $score,
    ?bool $force = null,
    ?bool $disable_edit_message = null,
    ?int $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function getGameHighScores(
    int $user_id,
    ?int $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $_options = [],
): array {
    return __prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};

function _updateId(): ?int {
    return _update(FIELD_UPDATE_ID);
}

function _update(?string $keys = null): mixed {
    return __arrayGet(__update(), $keys);
}

function _updateType(): ?string {
    $commonKeys = array_intersect(_updateTypes(), array_keys(_update()));
    return array_shift($commonKeys) ?? null;
}

function _message(?string $keys = null): mixed {
    $update = _update();
    $updateType = _updateType();
    $message = match ($updateType) {
        UPDATE_TYPE_CALLBACK_QUERY => $update[$updateType][UPDATE_TYPE_MESSAGE],
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_EDITED_CHANNEL_POST => $update[$updateType],
        default => null,
    };
    return __arrayGet($message, $keys);
}

function _messageType(): ?string {
    return current(array_intersect(_messageTypes(), array_keys(_message())));
}

function _inlineQuery(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_INLINE_QUERY), $keys);
}

function _chosenInlineResult(?string $keys = null): ?string {
    return __arrayGet(_update(UPDATE_TYPE_CHOSEN_INLINE_RESULT), $keys);
}

function _callbackQuery(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_CALLBACK_QUERY), $keys);
}

function _shippingQuery(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_SHIPPING_QUERY), $keys);
}

function _preCheckoutQuery(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_PRE_CHECKOUT_QUERY), $keys);
}

function _poll(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_POLL) ?? _message(MESSAGE_TYPE_POLL), $keys);
}

function _pollAnswer(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_POLL_ANSWER), $keys);
}

function _myChatMember(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_MY_CHAT_MEMBER), $keys);
}

function _chatMember(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_CHAT_MEMBER), $keys);
}

function _chatJoinRequest(?string $keys = null): mixed {
    return __arrayGet(_update(UPDATE_TYPE_CHAT_JOIN_REQUEST), $keys);
}

function _from(?string $keys = null): mixed {
    $updateType = _updateType();
    $update = _update();
    $user = match ($updateType) {
        UPDATE_TYPE_POLL_ANSWER => $update[$updateType][FIELD_USER],
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_MY_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_JOIN_REQUEST,
        UPDATE_TYPE_INLINE_QUERY,
        UPDATE_TYPE_CHOSEN_INLINE_RESULT,
        UPDATE_TYPE_SHIPPING_QUERY,
        UPDATE_TYPE_PRE_CHECKOUT_QUERY,
        UPDATE_TYPE_CALLBACK_QUERY => $update[$updateType][FIELD_FROM],
        default => null,
    };
    return __arrayGet($user, $keys);
}

function _user(?string $keys = null): mixed {
    return _from($keys);
}

function _userId(): ?int {
    return _user(FIELD_ID);
}

function _chat(?string $keys = null): mixed {
    $message = _message();
    $updateType = _updateType();
    $chat = match ($updateType) {
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_CALLBACK_QUERY,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_MY_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_MEMBER,
        UPDATE_TYPE_CHAT_JOIN_REQUEST,
        UPDATE_TYPE_EDITED_CHANNEL_POST => $message[FIELD_CHAT],
        default => null,
    };
    return __arrayGet($chat, $keys);
}

function _chatId(): ?int {
    return _chat(FIELD_ID);
}

function _file(?string $keys = null): mixed {
    if (!_isFile()) {
        throw new Exception('The message type is not a file, you called this function in inappropriate place!');
    }
    $function = __NAMESPACE__.'\\_'.__snakeToCamelCase(_messageType());
    return call_user_func($function, $keys);
}

function _photo(?string $keys = null): mixed {
    $photos = _photos();
    return __arrayGet(end($photos), $keys);
}

function _photos(): ?array {
    return _message(FIELD_PHOTO);
}

function _gamePhoto(?string $keys = null): mixed {
    $gamePhotos = _gamePhotos();
    return __arrayGet(end($gamePhotos), $keys);
}

function _gamePhotos(): ?array {
    return _message(FIELD_GAME);
}

function _replyMarkup(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_REPLY_MARKUP), $keys);
}

function _viaBot(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIA_BOT), $keys);
}

function _pollOptions(): mixed {
    return __arrayGet(_poll(FIELD_OPTIONS));
}

function _oldChatMember(?string $keys = null): mixed {
    $key = 'old_chat_member';
    $updateType = _updateType();
    $oldChatMember = $updateType === UPDATE_TYPE_CHAT_MEMBER ? _chatMember($key) : _myChatMember($key);
    return __arrayGet($oldChatMember, $keys);
}

function _newChatMember(?string $keys = null): mixed {
    $key = 'new_chat_member';
    $updateType = _updateType();
    $newChatMember = $updateType === UPDATE_TYPE_CHAT_MEMBER ? _chatMember($key) : _myChatMember($key);
    return __arrayGet($newChatMember, $keys);
}

function _document(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_DOCUMENT), $keys);
}

function _sticker(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_STICKER), $keys);
}

function _video(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIDEO), $keys);
}

function _videoNote(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIDEO_NOTE), $keys);
}

function _voice(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VOICE), $keys);
}

function _audio(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_AUDIO), $keys);
}

function _dice(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_DICE), $keys);
}

function _game(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_GAME), $keys);
}

function _venue(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VENUE), $keys);
}

function _location(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_LOCATION), $keys);
}

function _contact(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_CONTACT), $keys);
}

function _animation(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_ANIMATION), $keys);
}

function _text(): ?string {
    return _message(FIELD_TEXT);
}

function _caption(): ?string {
    return _message(FIELD_CAPTION);
}

function _entities(): ?array {
    return _message(FIELD_ENTITIES) ?? _message(FIELD_CAPTION_ENTITIES);
}

function _inlineQueryText(): ?string {
    return _inlineQuery(FIELD_QUERY);
}

function _callbackQueryData(): ?string {
    return _callbackQuery(FIELD_DATA);
}

function _chosenInlineResultId(): ?string {
    return _chosenInlineResult(FIELD_RESULT_ID);
}

function _chosenInlineResultQuery(): ?string {
    return _chosenInlineResult(FIELD_QUERY);
}

function _chosenInlineResultInlineMessageId(): ?string {
    return _chosenInlineResult(FIELD_INLINE_MESSAGE_ID);
}

function _forwardFrom(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_FORWARD_FROM), $keys);
}

function _forwardFromChat(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_FORWARD_FROM_CHAT), $keys);
}

function _forwardFromMessageId(): ?int {
    return _message(FIELD_FORWARD_FROM_MESSAGE_ID);
}

function _forwardDate(): ?int {
    return _message(FIELD_FORWARD_DATE);
}

function _replyToMessage(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_REPLY_TO_MESSAGE), $keys);
}

function _pinnedMessage(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_PINNED_MESSAGE), $keys);
}

function _senderChat(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_SENDER_CHAT), $keys);
}

function _authorSignature(): ?string {
    return _message(FIELD_AUTHOR_SIGNATURE);
}

function _date(): ?int {
    return _message(FIELD_DATE);
}

function _editDate(): ?int {
    return _message(FIELD_EDIT_DATE);
}

function _chatTitle(): ?string {
    return _chat(FIELD_TITLE);
}

function _pollQuestion(): ?string {
    return _poll(FIELD_QUESTION);
}

function _pollType(): ?string {
    return _poll(FIELD_TYPE);
}

function _pollId(): ?string {
    return _poll(FIELD_ID);
}

function _animationFileName(): ?string {
    return _animation(FIELD_FILE_NAME);
}

function _animationMimeType(): ?string {
    return _animation(FIELD_MIME_TYPE);
}

function _animationDuration(): ?int {
    return _animation(FIELD_DURATION);
}

function _animationWidth(): ?int {
    return _animation(FIELD_WIDTH);
}

function _animationHeight(): ?int {
    return _animation(FIELD_HEIGHT);
}

function _animationThumb(?string $keys = null): mixed {
    return __arrayGet(_animation(FIELD_THUMB), $keys);
}

function _gameTitle(): ?string {
    return _game(FIELD_TITLE);
}

function _gameDescription(): ?string {
    return _game(FIELD_DESCRIPTION);
}

function _forumTopicCreated(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_FORUM_TOPIC_CREATED), $keys);
}

function _forumTopicEdited(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_FORUM_TOPIC_EDITED), $keys);
}

function _forumTopicClosed(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_FORUM_TOPIC_CLOSED), $keys);
}

function _forumTopicReopened(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_FORUM_TOPIC_REOPENED), $keys);
}

function _messageThreadId(): ?int {
    return _message(FIELD_MESSAGE_THREAD_ID);
}

function _userFirstName(): ?string {
    return _user(FIELD_FIRST_NAME);
}

function _userUsername(): ?string {
    return _user(FIELD_USERNAME);
}

function _chatShared(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_CHAT_SHARED), $keys);
}

function _userShared(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_USER_SHARED), $keys);
}

function _connectedWebsite(): ?string {
    return _message(FIELD_CONNECTED_WEBSITE);
}

function _writeAccessAllowed(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_WRITE_ACCESS_ALLOWED), $keys);
}

function _passportData(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_PASSPORT_DATA), $keys);
}

function _proximityAlertTriggered(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_PROXIMITY_ALERT_TRIGGERED), $keys);
}

function _generalForumTopicHidden(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_GENERAL_FORUM_TOPIC_HIDDEN), $keys);
}

function _generalForumTopicUnhidden(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_GENERAL_FORUM_TOPIC_UNHIDDEN), $keys);
}

function _videoChatScheduled(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIDEO_CHAT_SCHEDULED), $keys);
}

function _videoChatStarted(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIDEO_CHAT_STARTED), $keys);
}

function _videoChatEnded(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIDEO_CHAT_ENDED), $keys);
}

function _videoChatParticipantsInvited(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_VIDEO_CHAT_PARTICIPANTS_INVITED), $keys);
}

function _webAppData(?string $keys = null): mixed {
    return __arrayGet(_message(FIELD_WEB_APP_DATA), $keys);
}

function _replyMarkupInlineKeyboard(): mixed {
    return _replyMarkup(FIELD_INLINE_KEYBOARD);
}

function _messageId(): ?int {
    return _message(FIELD_MESSAGE_ID);
}

function _callbackQueryId(): ?int {
    return _callbackQuery(FIELD_ID);
}

function _inlineQueryId(): ?int {
    return _inlineQuery(FIELD_ID);
}

function _mediaGroupId(): ?int {
    return _message(FIELD_MEDIA_GROUP_ID);
}

function _chatType(): ?string {
    return _chat(FIELD_TYPE);
}

function _isMessage(): bool {
    return _updateType() === UPDATE_TYPE_MESSAGE;
}

function _isCallbackQuery(): bool {
    return _updateType() === UPDATE_TYPE_CALLBACK_QUERY;
}

function _isEditedMessage(): bool {
    return _updateType() === UPDATE_TYPE_EDITED_MESSAGE;
}

function _isChannelPost(): bool {
    return _updateType() === UPDATE_TYPE_CHANNEL_POST;
}

function _isEditedChannelPost(): bool {
    return _updateType() === UPDATE_TYPE_EDITED_CHANNEL_POST;
}

function _isShippingQuery(): bool {
    return _updateType() === UPDATE_TYPE_SHIPPING_QUERY;
}

function _isChatJoinRequest(): bool {
    return _updateType() === UPDATE_TYPE_CHAT_JOIN_REQUEST;
}

function _isInlineQuery(): bool {
    return _updateType() === UPDATE_TYPE_INLINE_QUERY;
}

function _isMyChatMember(): bool {
    return _updateType() === UPDATE_TYPE_MY_CHAT_MEMBER;
}

function _isChatMember(): bool {
    return _updateType() === UPDATE_TYPE_CHAT_MEMBER;
}

function _isChosenInlineResult(): bool {
    return _updateType() === UPDATE_TYPE_CHOSEN_INLINE_RESULT;
}

function _isPreCheckOutQuery(): bool {
    return _updateType() === UPDATE_TYPE_PRE_CHECKOUT_QUERY;
}

function _isPollAnswer(): bool {
    return _updateType() === UPDATE_TYPE_POLL;
}

function _isPoll(bool $from_message = false): bool {
    if ($from_message) {
        return _messageType() === MESSAGE_TYPE_POLL;
    }
    return _updateType() === UPDATE_TYPE_POLL;
}

function _isPhoto(): bool {
    return _messageType() === MESSAGE_TYPE_PHOTO;
}

function _isSticker(): bool {
    return _messageType() === MESSAGE_TYPE_STICKER;
}

function _isAnimation(): bool {
    return _messageType() === MESSAGE_TYPE_ANIMATION;
}

function _isVideo(): bool {
    return _messageType() === MESSAGE_TYPE_VIDEO;
}

function _isVideoNote(): bool {
    return _messageType() === MESSAGE_TYPE_VIDEO_NOTE;
}

function _isDice(): bool {
    return _messageType() === MESSAGE_TYPE_DICE;
}

function _isGame(): bool {
    return _messageType() === MESSAGE_TYPE_GAME;
}

function _isVenue(): bool {
    return _messageType() === MESSAGE_TYPE_VENUE;
}

function _isVoice(): bool {
    return _messageType() === MESSAGE_TYPE_VOICE;
}

function _isDocument(): bool {
    return _messageType() === MESSAGE_TYPE_DOCUMENT;
}

function _isLocation(): bool {
    return _messageType() === MESSAGE_TYPE_LOCATION;
}

function _isContact(): bool {
    return _messageType() === MESSAGE_TYPE_CONTACT;
}

function _isAudio(): bool {
    return _messageType() === MESSAGE_TYPE_AUDIO;
}

function _isText(): bool {
    return _messageType() === MESSAGE_TYPE_TEXT;
}

function _isNewChatMembers(): bool {
    return _messageType() === MESSAGE_TYPE_NEW_CHAT_MEMBERS;
}

function _isLeftChatMember(): bool {
    return _messageType() === MESSAGE_TYPE_LEFT_CHAT_MEMBER;
}

function _isNewChatTitle(): bool {
    return _messageType() === MESSAGE_TYPE_NEW_CHAT_TITLE;
}

function _isNewChatPhoto(): bool {
    return _messageType() === MESSAGE_TYPE_NEW_CHAT_PHOTO;
}

function _isDeleteChatPhoto(): bool {
    return _messageType() === MESSAGE_TYPE_DELETE_CHAT_PHOTO;
}

function _isGroupChatCreated(): bool {
    return _messageType() === MESSAGE_TYPE_GROUP_CHAT_CREATED;
}

function _isSupergroupChatCreated(): bool {
    return _messageType() === MESSAGE_TYPE_SUPERGROUP_CHAT_CREATED;
}

function _isChannelChatCreated(): bool {
    return _messageType() === MESSAGE_TYPE_CHANNEL_CHAT_CREATED;
}

function _isAutoDeleteTimerChanged(): bool {
    return _messageType() === MESSAGE_TYPE_MESSAGE_AUTO_DELETE_TIMER_CHANGED;
}

function _isMigrateToChatId(): bool {
    return _messageType() === MESSAGE_TYPE_MIGRATE_TO_CHAT_ID;
}

function _isMigrateFromChatId(): bool {
    return _messageType() === MESSAGE_TYPE_MIGRATE_FROM_CHAT_ID;
}

function _isPinnedMessage(): bool {
    return _messageType() === MESSAGE_TYPE_PINNED_MESSAGE;
}

function _isInvoice(): bool {
    return _messageType() === MESSAGE_TYPE_INVOICE;
}

function _isSuccessfulPayment(): bool {
    return _messageType() === MESSAGE_TYPE_SUCCESSFUL_PAYMENT;
}

function _isUserShared(): bool {
    return _messageType() === MESSAGE_TYPE_USER_SHARED;
}

function _isChatShared(): bool {
    return _messageType() === MESSAGE_TYPE_CHAT_SHARED;
}

function _isConnectedWebsite(): bool {
    return _messageType() === MESSAGE_TYPE_CONNECTED_WEBSITE;
}

function _isWriteAccessAllowed(): bool {
    return _messageType() === MESSAGE_TYPE_WRITE_ACCESS_ALLOWED;
}

function _isPassportData(): bool {
    return _messageType() === MESSAGE_TYPE_PASSPORT_DATA;
}

function _isProximityAlertTriggered(): bool {
    return _messageType() === MESSAGE_TYPE_PROXIMITY_ALERT_TRIGGERED;
}

function _isForumTopicCreated(): bool {
    return _messageType() === MESSAGE_TYPE_FORUM_TOPIC_CREATED;
}

function _isForumTopicEdited(): bool {
    return _messageType() === MESSAGE_TYPE_FORUM_TOPIC_EDITED;
}

function _isForumTopicClosed(): bool {
    return _messageType() === MESSAGE_TYPE_FORUM_TOPIC_CLOSED;
}

function _isForumTopicReopened(): bool {
    return _messageType() === MESSAGE_TYPE_FORUM_TOPIC_REOPENED;
}

function _isGeneralForumTopicHidden(): bool {
    return _messageType() === MESSAGE_TYPE_GENERAL_FORUM_TOPIC_HIDDEN;
}

function _isGeneralForumTopicUnhidden(): bool {
    return _messageType() === MESSAGE_TYPE_GENERAL_FORUM_TOPIC_UNHIDDEN;
}

function _isVideoChatScheduled(): bool {
    return _messageType() === MESSAGE_TYPE_VIDEO_CHAT_SCHEDULED;
}

function _isVideoChatStarted(): bool {
    return _messageType() === MESSAGE_TYPE_VIDEO_CHAT_STARTED;
}

function _isVideoChatEnded(): bool {
    return _messageType() === MESSAGE_TYPE_VIDEO_CHAT_ENDED;
}

function _isVideoChatParticipantsInvited(): bool {
    return _messageType() === MESSAGE_TYPE_VIDEO_CHAT_PARTICIPANTS_INVITED;
}

function _isWebAppData(): bool {
    return _messageType() === MESSAGE_TYPE_WEB_APP_DATA;
}

function _isPollAnonymous(): bool {
    return boolval(_poll(FIELD_IS_ANONYMOUS));
}

function _isPollClosed(): bool {
    return boolval(_poll(FIELD_IS_CLOSED));
}

function _isTopicMessage(): bool {
    return boolval(_message(FIELD_IS_TOPIC_MESSAGE));
}

function _isBot(): bool {
    return boolval(_user(FIELD_IS_BOT));
}

function _isForum(): bool {
    return boolval(_chat(FIELD_IS_FORUM));
}

function _isFile(): bool {
    return in_array(_messageType(), _fileTypes());
}

function _isSender(): bool {
    return _chatType() === CHAT_TYPE_SENDER;
}

function _isGroup(): bool {
    return _chatType() === CHAT_TYPE_GROUP;
}

function _isSupergroup(): bool {
    return _chatType() === CHAT_TYPE_SUPERGROUP;
}

function _isPrivate(): ?bool {
    return _chatType() === CHAT_TYPE_PRIVATE;
}

function _isChannel(): ?bool {
    return _chatType() === CHAT_TYPE_CHANNEL;
}

function _isForwarded(): ?bool {
    return boolval(_message(FIELD_FORWARD_DATE) ?? _message(FIELD_FORWARD_SENDER_NAME));
}

function _row(array ...$buttons): array {
    return [...$buttons];
}

function _downloadBotFile(array|string $file, string $save_path, ?array $options = []): bool {
    if (is_string($file)) {
        $file = getFile(file_id: $file);
        if (!$file || !$file[FIELD_OK]) {
            throw new Exception("File not found!");
        }
    }
    $filePath = $file[FIELD_FILE_PATH] ?? $file[FIELD_RESULT][FIELD_FILE_PATH] ?? null;
    if (!$filePath) {
        throw new Exception("The '".FIELD_FILE_PATH."' is not specified!");
    }
    $apiBaseUrl = ($options['api_base_url'] ?? __apiBaseUrl()).'/file';
    if (!$apiBaseUrl) {
        throw new Exception("The api base url is not specified!");
    }
    $token = $options['bot_token'] ?? __botToken($options['bot_username'] ?? null);
    if (!$token) {
        throw new Exception("The bot token is not specified!");
    }
    $url = "$apiBaseUrl/bot{$token}/{$filePath}";
    return _download(
        url: $url,
        save_path: $save_path,
        curl_options: $options[_FIELD_CURL_OPTIONS] ?? [],
    );
}

function _download(string $url, string $save_path, array $curl_options = []): bool {
    $fp = fopen($save_path, 'w+');
    $result = __makeCurlRequest(url: $url, options: [
        CURLOPT_FILE => $fp,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_BUFFERSIZE => 1024 * 1024,
        CURLOPT_WRITEFUNCTION => function ($ch, $data) use ($fp) {
            return fwrite($fp, $data);
        }
    ] + $curl_options);
    fclose($fp);
    return $result;
}

function _registerNewBot(
    string $username,
    string $token,
    string $api_base_url = API_BASE_URL,
    array $curl_options = [],
): void {
    if (!isset($GLOBALS[_PACKAGE_NAME]['default_bot_username'])) {
        $GLOBALS[_PACKAGE_NAME]['default_bot_username'] = $username;
    }
    $GLOBALS[_PACKAGE_NAME]['bots'][$username] = get_defined_vars();
}

function _botCommandScopeTypes(array $exclude = []): array {
    return array_diff([
        BOT_COMMAND_SCOPE_DEFAULT,
        BOT_COMMAND_SCOPE_ALL_PRIVATE_CHATS,
        BOT_COMMAND_SCOPE_ALL_GROUP_CHATS,
        BOT_COMMAND_SCOPE_ALL_CHAT_ADMINISTRATORS,
        BOT_COMMAND_SCOPE_CHAT,
        BOT_COMMAND_SCOPE_CHAT_ADMINISTRATORS,
        BOT_COMMAND_SCOPE_CHAT_MEMBER,
    ], $exclude);
}

function _menuButtonTypes(array $exclude = []): array {
    return array_diff([
        MENU_BUTTON_TYPE_DEFAULT,
        MENU_BUTTON_TYPE_WEB_APP,
        MENU_BUTTON_TYPE_COMMANDS,
    ], $exclude);
}

function _chatTypes(array $exclude = []): array {
    return array_diff([
        CHAT_TYPE_GROUP,
        CHAT_TYPE_SUPERGROUP,
        CHAT_TYPE_PRIVATE,
        CHAT_TYPE_CHANNEL,
    ], $exclude);
}

function _chatMemberStatuses(array $exclude = []): array {
    return array_diff([
        CHAT_MEMBER_STATUS_ADMINISTRATOR,
        CHAT_MEMBER_STATUS_CREATOR,
        CHAT_MEMBER_STATUS_RESTRICTED,
        CHAT_MEMBER_STATUS_LEFT,
        CHAT_MEMBER_STATUS_MEMBER,
        CHAT_MEMBER_STATUS_KICKED,
    ], $exclude);
}

function _formattingOptions(array $exclude = []): array {
    return array_diff([
        PARSE_MODE_HTML,
        PARSE_MODE_MARKDOWN,
        PARSE_MODE_MARKDOWN_V2,
    ], $exclude);
}

function _chatActions(array $exclude = []): array {
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

function _updateTypes(array $exclude = []): array {
    return array_diff([
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_EDITED_CHANNEL_POST,
        UPDATE_TYPE_INLINE_QUERY,
        UPDATE_TYPE_CHOSEN_INLINE_RESULT,
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

function _messageTypes(array $exclude = []): array {
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
        MESSAGE_TYPE_NEW_CHAT_MEMBERS,
        MESSAGE_TYPE_LEFT_CHAT_MEMBER,
        MESSAGE_TYPE_NEW_CHAT_TITLE,
        MESSAGE_TYPE_NEW_CHAT_PHOTO,
        MESSAGE_TYPE_DELETE_CHAT_PHOTO,
        MESSAGE_TYPE_GROUP_CHAT_CREATED,
        MESSAGE_TYPE_SUPERGROUP_CHAT_CREATED,
        MESSAGE_TYPE_CHANNEL_CHAT_CREATED,
        MESSAGE_TYPE_MESSAGE_AUTO_DELETE_TIMER_CHANGED,
        MESSAGE_TYPE_MIGRATE_TO_CHAT_ID,
        MESSAGE_TYPE_MIGRATE_FROM_CHAT_ID,
        MESSAGE_TYPE_PINNED_MESSAGE,
        MESSAGE_TYPE_INVOICE,
        MESSAGE_TYPE_SUCCESSFUL_PAYMENT,
        MESSAGE_TYPE_USER_SHARED,
        MESSAGE_TYPE_CHAT_SHARED,
        MESSAGE_TYPE_CONNECTED_WEBSITE,
        MESSAGE_TYPE_WRITE_ACCESS_ALLOWED,
        MESSAGE_TYPE_PASSPORT_DATA,
        MESSAGE_TYPE_PROXIMITY_ALERT_TRIGGERED,
        MESSAGE_TYPE_FORUM_TOPIC_CREATED,
        MESSAGE_TYPE_FORUM_TOPIC_EDITED,
        MESSAGE_TYPE_FORUM_TOPIC_CLOSED,
        MESSAGE_TYPE_FORUM_TOPIC_REOPENED,
        MESSAGE_TYPE_GENERAL_FORUM_TOPIC_HIDDEN,
        MESSAGE_TYPE_GENERAL_FORUM_TOPIC_UNHIDDEN,
        MESSAGE_TYPE_VIDEO_CHAT_SCHEDULED,
        MESSAGE_TYPE_VIDEO_CHAT_STARTED,
        MESSAGE_TYPE_VIDEO_CHAT_ENDED,
        MESSAGE_TYPE_VIDEO_CHAT_PARTICIPANTS_INVITED,
        MESSAGE_TYPE_WEB_APP_DATA,
    ], $exclude);
}

function _fileTypes(array $exclude = []): ?array {
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

function _setGlobalData(int|string $key, mixed $value = null): void {
    __setOrPushValue($GLOBALS[_PACKAGE_NAME], $value, "global_data.{$key}");
}

function _getGlobalData(int|string $key, mixed $defaultValue = null): mixed {
    return $GLOBALS[_PACKAGE_NAME][_FIELD_GLOBAL_DATA][$key] ?? $defaultValue;
}

function _input(string|callable $prompt,Closure $next_step, array $conversation_data = []): void {
    is_string($prompt) ? sendMessage(text: $prompt) : $prompt();
    _setMultipleConverstaionData($conversation_data);
    _nextStepOfConversation($next_step);
}

function _nextStepOfConversation(Closure $closure): void {
    __updateConversationData('next_step', __serializeClosure($closure));
}

function _endConversation(): void {
    __deleteConversation();
}

function _setConversationData(string|array $key, mixed $value, null|int|DateInterval $ttl = null): void {
    if (is_array($key)) {
        _setMultipleConverstaionData($key, $ttl);
    } else {
        __updateConversationData("data.{$key}", $value);
    }
}

function _getConversationData(string $keys, mixed $defaultValue = null): mixed {
    return __arrayGet(__getConversation(), $keys) ?? $defaultValue;
}

function _setMultipleConverstaionData(array $data, null|int|DateInterval $ttl = null): void {
    foreach ($data as $key => $value) {
        _setConversationData($key, $value, $ttl);
    }
}

function _cache(): ?CacheInterface {
    return __config(_FIELD_CACHE);
}

function __getUserCacheKey(): string {
    static $key;
    if (!$key) {
        $key = __defaultBotUsername().'_'._chatId().'_'._userId();
    }
    return $key;
}

function __getConversationKey(): string {
    return 'conversations|'.__getUserCacheKey();
}

function __getConversation(?string $keys = null): array {
    return __arrayGet(_cache()->get(__getConversationKey()), $keys) ?? [];
}

function __updateConversationData(string $keys, mixed $value): void {
    $conversation = __getConversation();
    __setOrPushValue(array: $conversation, keys: $keys, value: $value);
    _cache()->set(
        key: __getConversationKey(),
        value: $conversation,
        ttl: _CACHE_CONVERSATION_TTL,
    );
}

function __deleteConversation(): bool {
    return _cache()->delete(__getConversationKey());
}

function __isStartedAConversation(): bool {
    return boolval(__getConversation());
}

function __serializeClosure(Closure $closure): string {
    return serialize(new SerializableClosure($closure));
}

function __unserializeClosure(string $serialized): Closure {
    return unserialize($serialized)->getClosure();
}

function __autoFillApiTypeFields(array $fields) {
    if (key_exists(PARAM_CHAT_ID, $fields) && !$fields[PARAM_CHAT_ID]) {
        $fields[PARAM_CHAT_ID] = _chatId() ?? _userId();
    }
    if (key_exists(PARAM_USER_ID, $fields) && !$fields[PARAM_USER_ID]) {
        $fields[PARAM_USER_ID] = _userId();
    }
    __convertToFileCURL($fields, FIELD_THUMBNAIL);
    __convertToFileCURL($fields, FIELD_STICKER);
    return $fields;
}

function __autoFillApiMethodParameters(array $parameters) {
    if (key_exists(PARAM_CHAT_ID, $parameters) && !$parameters[PARAM_CHAT_ID]) {
        $parameters[PARAM_CHAT_ID] = _chatId() ?? _userId();
    }
    if (key_exists(PARAM_USER_ID, $parameters) && !$parameters[PARAM_USER_ID]) {
        $parameters[PARAM_USER_ID] = _userId();
    }
    if (key_exists(PARAM_FROM_CHAT_ID, $parameters) && !$parameters[PARAM_FROM_CHAT_ID]) {
        $parameters[PARAM_FROM_CHAT_ID] = _chatId();
    }
    if (key_exists(PARAM_MESSAGE_ID, $parameters) && !$parameters[PARAM_MESSAGE_ID]) {
        $parameters[PARAM_MESSAGE_ID] = _messageId();
    }
    if (key_exists(PARAM_CALLBACK_QUERY_ID, $parameters) && !$parameters[PARAM_CALLBACK_QUERY_ID]) {
        $parameters[PARAM_CALLBACK_QUERY_ID] = _callbackQueryId();
    }
    if (key_exists(PARAM_CALLBACK_QUERY_ID, $parameters) && !$parameters[PARAM_CALLBACK_QUERY_ID]) {
        $parameters[PARAM_CALLBACK_QUERY_ID] = _inlineQueryId();
    }
    foreach (_fileTypes() as $name) {
        __convertToFileCURL($parameters, $name);
    }
    __convertToFileCURL($parameters, PARAM_THUMBNAIL);
    __convertToFileCURL($parameters, PARAM_CERTIFICATE);
    return $parameters;
}

function __convertToFileCURL(&$array, string $key): void {
    if (
        key_exists($key, $array)
        && is_string($array[$key])
        && is_file($filePath = $array[$key])
    ) {
        $array[$key] = new CURLFile($filePath);
    }
};

function __makeApiRequest(string $method = null, array $parameters = [], array $options = []): array|bool {
    $apiBaseUrl = $options['api_base_url'] ?? __apiBaseUrl();
    if (!$apiBaseUrl) {
        throw new Exception("The api base url is not specified!");
    }
    $token = $options['bot_token'] ?? __botToken($options['bot_username'] ?? null);
    if (!$token) {
        throw new Exception("The bot token is not specified!");
    }
    $url = "{$apiBaseUrl}/bot{$token}/{$method}";
    $curlOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($parameters),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_SESSIONID_CACHE => true,
        CURLOPT_TCP_FASTOPEN => true,
        CURLOPT_TCP_NODELAY => true,
        CURLOPT_TIMEOUT => __isWebhook() ? 3 : 10,
        CURLOPT_CONNECTTIMEOUT => __isWebhook() ? 2 : 10,
        CURLOPT_FORBID_REUSE => false,
        CURLOPT_FRESH_CONNECT => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
    ] + ($options[_FIELD_CURL_OPTIONS] ?? __defaultCurlOptions());
    $result = __makeCurlRequest(url: $url, options: $curlOptions);
    if (is_bool($result)) {
        return $result;
    }
    $response = json_decode($result, true);
    if (isset($response[FIELD_OK]) && !$response[FIELD_OK]) {
        $handlers = __handlers();
        if (isset($handlers[_FIELD_API_ERROR])) {
            return __fireHandler($handlers[_FIELD_API_ERROR], [$response]);
        }
    }
    return $response;
}

function __makeCurlRequest(string $url, array $options = []): string|bool {
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        throw new Exception("Invalid URL!");
    }
    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    if (curl_errno($ch)) {
        throw new \Exception('CURL ERROR: '.curl_error($ch));
    }
    return $result;
}

function __getCommonKeys(array $array1, array $array2): array {
    return array_intersect($array1, array_keys($array2));
}

function __arrayGet(?array $data, ?string $keys = null): mixed {
    if (!$data) {
        return null;
    }
    if (!$keys) {
        return $data;
    }
    foreach (explode('.', $keys) as $key) {
        if (!isset($data[$key])) {
            return null;
        }
        $data = $data[$key];
    }
    return $data;
}

function __setOrPushValue(array &$array, mixed $value, ?string $keys = null, bool $push = false): void {
    if (!$keys) {
        if ($push) {
            $array[] = $value;
        } else {
            $array = [$value];
        }
    } else {
        $keys = explode('.', $keys);
        $currentArr = &$array;
        foreach ($keys as $key) {
            if (!isset($currentArr[$key])) {
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

function __prepareCallable(array|string|callable $callable) {
    if (is_string($callable) && class_exists($callable)) {
        $callable = new $callable;
    }
    if (is_array($callable) && isset($callable[0]) && class_exists(strval($callable[0]))) {
        $callable[0] = new $callable[0];
    }
    if (!is_callable($callable)) {
        throw new Exception('Invalid callable provided!');
    }
    return $callable;
}

function __addHandler(
    string $keys,
    array|string|callable $callable,
    array|string|callable $middlewares = [],
    array|string $skip_middlewares = [],
): void {
    $handler = &$GLOBALS[_PACKAGE_NAME][_FIELD_HANDLERS];
    foreach(explode('.', $keys) as $key) {
        $handler = &$handler[$key];
    }
    $handler[_FIELD_CALLABLE] = __prepareCallable($callable);
    $middlewares = !is_array($middlewares) ? [$middlewares] : $middlewares;
    foreach ($middlewares as $middleware) {
        $handler[_FIELD_MIDDLEWARES][] = __prepareCallable($middleware);
    }
    $skip_middlewares = !is_array($skip_middlewares) ? [$skip_middlewares] : $skip_middlewares;
    foreach ($skip_middlewares as $name) {
        if (is_string($name)) {
            $handler[_FIELD_SKIP_MIDDLEWARES][] = $name;
        }
    }
}

function __addMiddleware(array|string|callable $callable, string $name = null): void {
    $handler = &$GLOBALS[_PACKAGE_NAME][_FIELD_MIDDLEWARES];
    $callable = __prepareCallable($callable);
    if (!$name) {
        if (is_object($callable) && !$callable instanceof Closure) {
            $name = $callable::class;
        } elseif (is_array($callable) && is_object($callable[0]) && !$callable[0] instanceof Closure) {
            $name = $callable[0]::class;
        }
    }
    if ($name) {
        $handler[$name] = $callable;
    } else {
        $handler[] = $callable;
    }
}

function __getCallableParameters(string $pattern, string $value): false|array {
    $pattern = __replacePlaceholdersWithRegexSyntax($pattern);
    return __getParametersFromPattern($pattern, $value);
}

function __replacePlaceholdersWithRegexSyntax(string $pattern): string {
    return preg_replace(
        pattern: _REGEX_FIND_PLACEHOLDERS,
        replacement: _REGEX_PLACEHOLDERS_REPLACEMENT,
        subject: addcslashes($pattern, '/'),
    );
}

function __getParametersFromPattern(string $pattern, string $value): false|array {
    if (!preg_match("/^{$pattern}$/i", $value, $matches)) {
        return false;
    }
    unset($matches[0]);
    $parameters = array_unique($matches);
    return $parameters;
}

function __fireMiddlewares(array $middlewares, array $skip = []): void {
    if ($skip) {
        $middlewares = array_diff_key(__middlewares(), array_flip($skip));
    }
    foreach ($middlewares as $middleware) {
        if (is_callable($middleware)) {
            call_user_func($middleware);
        }
    }
}

function __fireHandlers(array $handlers) {
    $updateType = _updateType();
    try {
        if (isset($handlers[$updateType]) && $updateHandlers = $handlers[$updateType]) {
            if (
                in_array($updateType, [
                    UPDATE_TYPE_MESSAGE,
                    UPDATE_TYPE_EDITED_MESSAGE,
                    UPDATE_TYPE_CHANNEL_POST,
                    UPDATE_TYPE_EDITED_CHANNEL_POST,
                ])
                && isset($updateHandlers[$messageType = _messageType()])
            ) {
                if (_isText()) {
                    $result = __fireTextHandlers($updateHandlers[FIELD_TEXT], _text());
                    
                } elseif (in_array($messageType, _messageTypes())) {
                    if (__isStartedAConversation()) {
                        $result = __fireConversation();
                    } else {
                        $result = __fireHandler($updateHandlers[$messageType]);
                    }
                }
            } elseif (_isCallbackQuery() && isset($updateHandlers[FIELD_DATA])) {
                $result = __fireTextHandlers($updateHandlers[FIELD_DATA], _callbackQueryData());
        
            } elseif (_isInlineQuery() && isset($updateHandlers[FIELD_QUERY])) {
                $result = __fireTextHandlers($updateHandlers[FIELD_QUERY], _inlineQueryText());
        
            } elseif (_isChosenInlineResult()) {
                if (isset($updateHandlers[FIELD_QUERY])) {
                    $result = __fireTextHandlers($updateHandlers[FIELD_QUERY], _chosenInlineResultQuery());
                }
                if (isset($updateHandlers[FIELD_RESULT_ID])) {
                    $result = __fireTextHandlers($updateHandlers[FIELD_RESULT_ID], _chosenInlineResultId());
                }
            }
        }
        if (!isset($result) || $result === false) {
            if (__isStartedAConversation()) {
                return __fireConversation();
            } 
            if (isset($updateHandlers[_FIELD_CALLABLE])) {
                return __fireHandler($updateHandlers);
            }
            if (isset($updateHandlers[_FIELD_FALLBACK])) {
                return __fireHandler($updateHandlers[_FIELD_FALLBACK]);
            }
        }
        if (isset($handlers[_FIELD_FALLBACK])) {
            return __fireHandler($handlers[_FIELD_FALLBACK]);
        }
        
    } catch (Throwable $e) {
        if (isset($handlers[_FIELD_EXCEPTION])) {
            $result = __fireHandler($handlers[_FIELD_EXCEPTION], [$e], [
                'skip_global_middlewares' => true,
            ]);
        }
        if (!isset($result) || $result === false) {
            throw $e;
        }
    }
}

function __fireHandler(array $handler, array $parameters = [], array $options = []): bool {
    if (!isset($options['skip_global_middlewares']) || !$options['skip_global_middlewares']) {
        __fireMiddlewares(__middlewares(), $handler[_FIELD_SKIP_MIDDLEWARES] ?? []);
    }
    __fireMiddlewares($handler[_FIELD_MIDDLEWARES] ?? []);
    call_user_func($handler[_FIELD_CALLABLE], ...$parameters);
    return true;
}

function __fireTextHandlers(array $handlers, string $value): bool {
    foreach ($handlers as $pattern => $handler) {
        $parameters = __getCallableParameters($pattern, $value);
        if ($parameters === false) {
            continue;
        }
        if (__isStartedAConversation()) {
            _endConversation();
        }
        return __fireHandler($handler, $parameters);
    }
    if (__isStartedAConversation()) {
        return __fireConversation();
    }
    return false;
}

function __fireConversation(?array $conversation = null): bool {
    $conversation = $conversation ?? __getConversation();
    $closure = __unserializeClosure($conversation['next_step']);
    call_user_func($closure, ...($conversation['data'] ?? []));
    return true;
}

function __removeNullValues(array $array): array {
    return array_filter($array, fn($value) => $value !== null);
}

function __removeInvalidParameters(array $parameters): array {
    unset($parameters['_options']);
    return $parameters;
}

function __extractFunctionName(string $function): string {
    return basename(strtr($function, '\\', '/'));
}

function __prepareApiMethodParameters(array $parameters): array {
    return __removeNullValues(__autoFillApiMethodParameters(__removeInvalidParameters($parameters)));
}

function __prepareApiTypeFields(array $fields): array {
    return __removeNullValues(__autoFillApiTypeFields($fields));
}

function __prepareAndMakeApiRequest(string $function, array $parameters = [], array $options = []): array {
    return __makeApiRequest(__extractFunctionName($function), __prepareApiMethodParameters($parameters), $options);
}

function __snakeToCamelCase(string $string) {
    $string = preg_replace_callback('/_([a-z])/', function($matches) {
        return strtoupper($matches[1]);
    }, $string);
    return lcfirst($string);
}

function __isComposerUsed(): bool {
    foreach (get_included_files() as $path) {
        if (str_ends_with($path, 'vendor'.DIRECTORY_SEPARATOR.'autoload.php')) {
            return true;
        }
    }
    return false;
}

function __config(?string $keys = null): mixed {
    return __arrayGet($GLOBALS[_PACKAGE_NAME] ?? [], $keys);
}

function __defaultBotUsername(): string {
    return __config('default_bot_username');
}

function __botToken(?string $username = null): ?string {
    return __config('bots.'.($username ?? __config('default_bot_username')).'.token');
}

function __apiBaseUrl(?string $username = null): string {
    return __config('bots.'.($username ?? __config('default_bot_username')).'.api_base_url') ?? API_BASE_URL;
}

function __isWebhook(): ?bool {
    return __config(_FIELD_IS_WEBHOOK);
}

function __defaultCurlOptions(): array {
    return __config(_FIELD_CURL_OPTIONS) ?? [];
}

function __handlers(): ?array {
    return __config(_FIELD_HANDLERS);
}

function __middlewares(): ?array {
    return __config(_FIELD_MIDDLEWARES);
}

function __globalData(): ?array {
    return __config(_FIELD_GLOBAL_DATA);
}

function __update(): ?array {
    return __config(_FIELD_UPDATE);
}

function __setUpdate(array $update): void {
    __setOrPushValue($GLOBALS[_PACKAGE_NAME], $update, _FIELD_UPDATE);
}

function __allowedUpdates(): ?array {
    return __config(_FIELD_ALLOWED_UPDATES);
}

function __handleWebhook(): void {
    $input = file_get_contents('php://input');
    if (!$input) {
        return;
    }
    $update = json_decode($input, true);
    __processUpdate($update);
}

function __handleLongPolling(): void {
    if (PHP_SAPI !== 'cli') {
        die("This script can only be executed from the command line.");
    }
    echo 'Listening...'.PHP_EOL;
    $offset = 1;
    $timeout = 10;
    while (true) {
        $response = getUpdates(timeout: $timeout, offset: $offset);
        if (!$response[FIELD_OK]) {
            throw new \Exception('Could not fetch updates with the getUpdates method!');
        }
        $updates = $response[FIELD_RESULT];
        foreach ($updates as $update) {
            $offset = $update[FIELD_UPDATE_ID] + 1;
            __processUpdate($update);
        }
        usleep(2000000);
    }
}

function __processUpdate(array $update): void {
    __setUpdate($update);
    $updateType = _updateType();
    if (!in_array($updateType, __allowedUpdates())) {
        return;
    }
    __fireHandlers(__handlers());
}

function run(): void {
    if (__isWebhook()) {
        __handleWebhook();
    } else {
        __handleLongPolling();
    }
}
