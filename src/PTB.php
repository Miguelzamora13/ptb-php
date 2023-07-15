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

 * @version 1.1.7
 * @author Pooria Bashiri <po.pooria@gmail.com>
 * @link http://github.com/DevDasher
 * @link http://t.me/DevDasher
*/
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
namespace DevDasher\PTB;
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
use Closure;
use CURLFile;
use DateInterval;
use Exception;
use Opis\Closure\SerializableClosure;
use Psr\SimpleCache\CacheInterface;
use Throwable;
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('PARAM_MESSAGE_ID', 'message_id');
define('PARAM_CHAT_ID', 'chat_id');
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
define('PARAM_STICKER_SET_NAME', 'sticker_set_name');
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
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
define('CHAT_TYPE_SENDER', 'sender');
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
define('DICE_EMOJI_DICE', '🎲');
define('DICE_EMOJI_DART', '🎯');
define('DICE_EMOJI_BASKETBALL', '🏀');
define('DICE_EMOJI_FOOTBALL', '⚽');
define('DICE_EMOJI_SLOT_MACHINE', '🎰');
define('DICE_EMOJI_BOWLING', '🎳');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('MENU_BUTTON_TYPE_DEFAULT', 'default');
define('MENU_BUTTON_TYPE_WEB_APP', 'web_app');
define('MENU_BUTTON_TYPE_COMMANDS', 'commands');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('POLL_TYPE_REGULAR', 'regular');
define('POLL_TYPE_QUIZ', 'quiz');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_USER_CHATS', 'allow_user_chats');
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_BOT_CHATS', 'allow_bot_chats');
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_GROUP_CHATS', 'allow_group_chats');
define('SWITCH_INLINE_QUERY_CHOSEN_CHAT_ALLOW_CHANNEL_CHATS', 'allow_channel_chats');
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
define('INPUT_MEDIA_TYPE_ANIMATION', 'animation');
define('INPUT_MEDIA_TYPE_DOCUMENT', 'document');
define('INPUT_MEDIA_TYPE_AUDIO', 'audio');
define('INPUT_MEDIA_TYPE_PHOTO', 'photo');
define('INPUT_MEDIA_TYPE_VIDEO', 'video');
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
define('API_LIMIT_DOWNLOAD_FILE_SIZE_MAX', 20971520);
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('API_BASE_URL', 'https://api.telegram.org');
define('API_BASE_URL_BOT', 'https://api.telegram.org/bot');
define('API_BASE_URL_FILE', 'https://api.telegram.org/file/bot');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('REGEX_BOT_TOKEN', '/(?<token>(?<bot_id>\d{8,10})\:(?<hash>[\w-]{35}))/');
define('REGEX_INVITE_LINK', '/(?<invite_link>(?:http[s]://)?(?:t|telegram)\.(?:me|dog)\/(?:joinchat\/|\+)(?<hash>[\w\-]+))/i');
define('REGEX_USERNAME', '/@(?<username>\w{5,32})/');
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
define('_REGEX_FIND_PLACEHOLDERS', '/\{([^}]+)\}/');
define('_REGEX_PLACEHOLDERS_REPLACEMENT', '(?P<$1>\w+)');
define('_PACKAGE_NAME', 'devdasher/ptb-php');
define('_CACHE_CONVERSATION_TTL', 10800);
define('_CACHE_USER_DATA_TTL', 120);
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function configurePTB(
    string $username,
    string $token,
    string $api_base_url = API_BASE_URL,
    array $curl_options = [],
    bool $is_webhook = false,
    bool $long_polling_logger_enabled = false,
    ?CacheInterface $cache = null,
): void {
    $GLOBALS[_PACKAGE_NAME] = array_merge([
        'long_polling_logger_enabled' => $long_polling_logger_enabled,
        'is_webhook' => $is_webhook,
        'cache' => $cache,
        'update' => [],
        'global_data' => [],
        'middlewares' => [],
        'handlers' => [],
    ], $GLOBALS[_PACKAGE_NAME] ?? []);
    registerNewBot(
        username: $username,
        token: $token,
        api_base_url: $api_base_url,
        curl_options: $curl_options,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function registerNewBot(
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setGlobalData(int|string $key, mixed $value = null): void {
    _setOrPushValue($GLOBALS[_PACKAGE_NAME], $value, "global_data.{$key}");
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getGlobalData(int|string $key, mixed $defaultValue = null): mixed {
    return $GLOBALS[_PACKAGE_NAME]['global_data'][$key] ?? $defaultValue;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function middleware(callable $callable, ?string $name = null): void {
    _addMiddleware(callable: $callable, name: $name);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function middlewares(array $callables): void {
    foreach ($callables as $name => $callable) {
        if (!is_callable($callable)) {
            continue;
        }
        middleware($callable, $name);
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageText(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.text.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessagePhoto(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.photo",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageAnimation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.animation",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVideo(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.video",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVideoNote(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.video_note",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageAudio(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.audio",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVoice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.voice",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageDocument(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.document",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageLocation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.location",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageContact(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.contact",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessagePoll(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'message.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageVenue(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.venue",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageGame(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.game",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageDice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.dice",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessageSticker(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message.sticker",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMessage(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "message",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onAny(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "any",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageText(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "edited_message.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessagePhoto(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageAnimation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.animation',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVideo(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.video',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVideoNote(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.video_note',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageAudio(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.audio',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVoice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.voice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageDocument(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.document',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageLocation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.location',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageContact(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.contact',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessagePoll(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageVenue(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.venue',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageGame(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.game',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageDice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.dice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessageSticker(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message.sticker',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedMessage(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_message',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onCallbackQuery(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'callback_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onCallbackQueryData(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "callback_query.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostText(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "channel_post.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostPhoto(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostAnimation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.animation',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVideo(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.video',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVideoNote(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.video_note',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostAudio(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.audio',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVoice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.voice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostDocument(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.document',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostLocation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.location',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostContact(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.contact',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostPoll(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostVenue(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.venue',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostGame(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.game',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostDice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.dice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPostSticker(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post.sticker',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChannelPost(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'channel_post',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostText(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "edited_channel_post.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostPhoto(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.photo',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostAnimation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.animation',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVideo(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.video',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVideoNote(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.video_note',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostAudio(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.audio',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVoice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.voice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostDocument(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.document',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostLocation(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.location',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostContact(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.contact',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostPoll(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostVenue(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.venue',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostGame(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.game',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostDice(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.dice',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPostSticker(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post.sticker',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onEditedChannelPost(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'edited_channel_post',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChatMember(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'chat_member',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onMyChatMember(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'my_chat_member',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onPoll(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'poll',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onPollAnswer(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'poll_answer',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onInlineQuery(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'inline_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onInlineQueryText(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "inline_query.query.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onShippingQuery(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'shipping_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChatJoinRequest(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'chat_join_request',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onPreCheckoutQuery(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'pre_checkout_query',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChosenInlineResult(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'chosen_inline_result',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onChosenInlineResultQuery(
    string $pattern,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: "chosen_inline_result.query.{$pattern}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function fallbackOn(
    string $updateType,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    if (!in_array($updateType, updateTypes())) {
        throw new Exception("Invalid update type '{$updateType}'!");
    }
    _addHandler(
        keys: "fallback.{$updateType}",
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function fallback(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'fallback',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onException(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'exception',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function onApiError(
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    _addHandler(
        keys: 'api_error',
        callable: $callable,
        middlewares: $middlewares,
        skip_middlewares: $skip_middlewares,
    );
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function webAppInfo(string $url): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultsButton(string $text, ?array $web_app = null, ?string $start_parameter = null): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedAudio(
    string $type,
    string|int $id,
    string $audio_file_id,
    ?string $caption = null,
    ?string $parse_mode = null,
    ?array $caption_entities = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedDocument(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedGif(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedMpeg4Gif(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedPhoto(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedSticker(
    string $type,
    string|int $id,
    string $sticker_file_id,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedVideo(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultCachedVoice(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultArticle(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultPhoto(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultGif(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultAudio(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultVoice(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultDocument(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultLocation(
    string $type,
    string|int $id,
    float $latitude,
    float $longitude,
    string $title,
    ?float $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
    ?array $reply_markup = null,
    ?array $input_message_content = null,
    ?string $thumbnail_url = null,
    ?int $thumbnail_width = null,
    ?int $thumbnail_height = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultVenue(
    string $type,
    string|int $id,
    float $latitude,
    float $longitude,
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultContact(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultGame(
    string $type,
    string|int $id,
    string $game_short_name,
    ?array $reply_markup = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultMpeg4Gif(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryResultVideo(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inputTextMessageContent(
    string $message_text,
    ?string $parse_mode = null,
    ?array $entities = null,
    ?bool $disable_web_page_preview = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inputLocationMessageContent(
    float $latitude,
    float $longitude,
    ?float $horizontal_accuracy = null,
    ?int $live_period = null,
    ?int $heading = null,
    ?int $proximity_alert_radius = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inputVenueMessageContent(
    float $latitude,
    float $longitude,
    string $title,
    string $address,
    string $foursquare_id = null,
    string $foursquare_type = null,
    string $google_place_id = null,
    string $google_place_type = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inputContactMessageContent(
    string $phone_number,
    string $first_name,
    ?string $last_name = null,
    ?string $vcard = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inputInvoiceMessageContent(
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
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function row(array ...$buttons): array {
    return [...$buttons];
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function rows(array ...$rows): array {
    return [...$rows];
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
    ?bool $is_persistent = null,
    ?bool $resize_keyboard = null,
    ?bool $one_time_keyboard = null,
    ?bool $selective = null,
    ?string $input_field_placeholder = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function keyboardButton(
    string $text,
    ?array $request_user = null,
    ?array $request_chat = null,
    ?bool $request_contact = null,
    ?bool $request_location = null,
    ?array $request_poll = null,
    ?array $web_app = null,
): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function removeKeyboard(bool $remove_keyboard = true, ?bool $selective = null): array {
    return _removeNullValues(get_defined_vars());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forceReply(bool $force_reply = true, ?string $input_field_placeholder = null, ?bool $selective = null,): array {
    return _removeNullValues(get_defined_vars());
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
    return _arrayGet($chat, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function file(?string $keys = null): mixed {
    if (!isFile()) {
        throw new Exception('The message type is not a file, you called this function in inappropriate place!');
    }
    $function = __NAMESPACE__.'\\'._snakeToCamelCase(messageType());
    return $function($keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function isFile(): bool {
    return in_array(messageType(), fileTypes());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function photo(?string $keys = null): mixed {
    $photos = photos();
    return _arrayGet(end($photos), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function photos(): ?array {
    return message(MESSAGE_TYPE_PHOTO);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function gamePhoto(?string $keys = null): mixed {
    $gamePhotos = gamePhotos();
    return _arrayGet(end($gamePhotos), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function gamePhotos(): ?array {
    return message(MESSAGE_TYPE_GAME);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function replyMarkup(?string $keys = null): mixed {
    return _arrayGet(message('reply_markup'), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function viaBot(?string $keys = null): mixed {
    return _arrayGet(message('via_bot'), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function poll(?string $keys = null): mixed {
    return _arrayGet(message('poll'), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function pollOptions(): mixed {
    return _arrayGet(poll('options'));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chatMember(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_CHAT_MEMBER), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function myChatMember(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_MY_CHAT_MEMBER), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function oldChatMember(?string $keys = null): mixed {
    $key = 'old_chat_member';
    $updateType = updateType();
    $oldChatMember = $updateType === UPDATE_TYPE_CHAT_MEMBER ? chatMember($key) : myChatMember($key);
    return _arrayGet($oldChatMember, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function newChatMember(?string $keys = null): mixed {
    $key = 'new_chat_member';
    $updateType = updateType();
    $newChatMember = $updateType === UPDATE_TYPE_CHAT_MEMBER ? chatMember($key) : myChatMember($key);
    return _arrayGet($newChatMember, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function document(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_DOCUMENT), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sticker(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_STICKER), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function video(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_VIDEO), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function videoNote(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_VIDEO_NOTE), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function voice(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_VOICE), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function audio(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_AUDIO), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function dice(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_DICE), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function game(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_GAME), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function venue(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_VENUE), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function location(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_LOCATION), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function contact(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_CONTACT), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function animation(?string $keys = null): mixed {
    return _arrayGet(message(MESSAGE_TYPE_ANIMATION), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function text(): ?string {
    return message(MESSAGE_TYPE_TEXT);
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
        UPDATE_TYPE_CHOSEN_INLINE_RESULT,
        UPDATE_TYPE_SHIPPING_QUERY,
        UPDATE_TYPE_PRE_CHECKOUT_QUERY,
        UPDATE_TYPE_CALLBACK_QUERY => $update[$updateType]['from'],
        default => null,
    };
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
function callbackQuery(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_CALLBACK_QUERY), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function callbackQueryData(): ?string {
    return callbackQuery('data');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQuery(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_INLINE_QUERY), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function inlineQueryText(): ?string {
    return inlineQuery('query');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chosenInlineResult(?string $keys = null): ?string {
    return _arrayGet(update(UPDATE_TYPE_CHOSEN_INLINE_RESULT), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chosenInlineResultId(): ?string {
    return chosenInlineResult('result_id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chosenInlineResultQuery(): ?string {
    return chosenInlineResult('query');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function chosenInlineResultInlineMessageId(): ?string {
    return chosenInlineResult('inline_message_id');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function shippingQuery(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_SHIPPING_QUERY), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function preCheckoutQuery(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_PRE_CHECKOUT_QUERY), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function pollAnswer(?string $keys = null): mixed {
    return _arrayGet(update(UPDATE_TYPE_POLL_ANSWER), $keys);
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
function isChosenInlineResult(): bool {
    return updateType() === UPDATE_TYPE_CHOSEN_INLINE_RESULT;
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
function isPoll(bool $checkMessageType = false): bool {
    if ($checkMessageType) {
        return messageType() === MESSAGE_TYPE_POLL;
    }
    return updateType() === UPDATE_TYPE_POLL;
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
function isSender(): bool {
    return chatType() === CHAT_TYPE_SENDER;
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
    return _arrayGet(message('forward_from'), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardFromChat(?string $keys = null): mixed {
    return _arrayGet(message('forward_from_chat'), $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardFromMessageId(): ?int {
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
    return _arrayGet($message, $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function repliedMessage(?string $keys = null): mixed {
    return _arrayGet(message('reply_to_message'), $keys);
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
function update(?string $keys = null): mixed {
    return _arrayGet(_update(), $keys);
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
function getMe(?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, options: $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function logOut(?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, options: $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function close(?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, options: $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteMessage(
    int $message_id,
    ?int $chat_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function forwardMessage(
    int $chat_id,
    ?int $message_id = null,
    ?int $from_chat_id = null,
    ?int $message_thread_id = null,
    ?bool $disable_notification = null,
    ?bool $protect_content = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendFile(
    ?string $document = null,
    ?string $audio = null,
    ?string $photo = null,
    ?string $video = null,
    ?string $animation = null,
    ?string $voice = null,
    ?string $video_note = null,
    ?string $sticker = null,
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
    $parameters = _removeNullValues(get_defined_vars());
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function sendChatAction(
    string $action,
    ?int $chat_id = null,
    ?int $message_thread_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getUserProfilePhotos(
    ?int $chat_id = null,
    ?int $offset = null,
    ?int $limit = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getFile(
    string $file_id,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function banChatMember(
    int $chat_id,
    int $user_id,
    ?int $until_date = null,
    ?bool $revoke_messages = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unbanChatMember(
    int $chat_id,
    int $user_id,
    ?bool $only_if_banned = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function restrictChatMember(
    int $chat_id,
    int $user_id,
    array $permissions,
    ?bool $only_if_banned = null,
    ?bool $use_independent_chat_permissions = null,
    ?int $until_date = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatAdministratorCustomTitle(
    int $chat_id,
    int $user_id,
    string $custom_title,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function banChatSenderChat(
    int $chat_id,
    int $sender_chat_id,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unbanChatSenderChat(
    int $chat_id,
    int $sender_chat_id,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatPermissions(
    int|string $chat_id,
    array $permissions,
    ?bool $use_independent_chat_permissions = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function exportChatInviteLink(int|string $chat_id, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function createChatInviteLink(
    int|string $chat_id,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?bool $creates_join_request = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editChatInviteLink(
    int|string $chat_id,
    string $invite_link,
    ?string $name = null,
    ?int $expire_date = null,
    ?int $member_limit = null,
    ?bool $creates_join_request = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function revokeChatInviteLink(int|string $chat_id, string $invite_link, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function approveChatJoinRequest(int|string $chat_id, int $user_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function declineChatJoinRequest(int|string $chat_id, int $user_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatPhoto(int|string $chat_id, string $photo, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteChatPhoto(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatTitle(int|string $chat_id, string $title, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatDescription(int|string $chat_id, string $description, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function pinChatMessage(
    int|string $chat_id,
    bool $message_id,
    ?bool $disable_notification = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unpinChatMessage(int|string $chat_id, bool $message_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unpinAllChatMessages(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function leaveChat(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChat(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatAdministrators(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatMemberCount(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatMember(int|string $chat_id, int $user_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatStickerSet(int|string $chat_id, string $sticker_set_name, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteChatStickerSet(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getForumTopicIconStickers(?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function createForumTopic(
    int|string $chat_id,
    string $name,
    ?int $icon_color = null,
    ?string $icon_custom_emoji_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editForumTopic(
    int|string $chat_id,
    int $message_thread_id,
    ?string $name,
    ?string $icon_custom_emoji_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function closeForumTopic(int|string $chat_id, int $message_thread_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function reopenForumTopic(int|string $chat_id, int $message_thread_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteForumTopic(int|string $chat_id, int $message_thread_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unpinAllForumTopicMessages(int|string $chat_id, int $message_thread_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editGeneralForumTopic(int|string $chat_id, string $name, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function closeGeneralForumTopic(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function reopenGeneralForumTopic(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function hideGeneralForumTopic(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function unhideGeneralForumTopic(int|string $chat_id, ?array $_options = [],): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerCallbackQuery(
    string $text,
    ?bool $show_alert = null,
    ?string $url = null,
    ?int $cache_time = null,
    ?int $callback_query_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyCommands(
    array $commands,
    ?array $scope = null,
    ?string $language_code = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteMyCommands(?array $scope = null, ?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyCommands(?array $scope = null, ?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyName(?string $name = null, ?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyName(?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyDescription(?string $description = null, ?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyDescription(?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyShortDescription(?string $short_description = null, ?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyShortDescription(?string $language_code = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setChatMenuButton(int $chat_id, ?array $menu_button = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getChatMenuButton(int $chat_id, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setMyDefaultAdministratorRights(?array $rights = null, ?bool $for_channels = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getMyDefaultAdministratorRights(?bool $for_channels = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageMedia(
    array $media,
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function stopMessageLiveLocation(
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function editMessageReplyMarkup(
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function stopPoll(
    null|int|string $chat_id = null,
    ?int $message_id = null,
    ?array $reply_markup = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getStickerSet(string $name, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getCustomEmojiStickers(array $custom_emoji_ids, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function uploadStickerFile(int $user_id, string $sticker, string $sticker_format, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function addStickerToSet(int $user_id, string $name, array $sticker, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerPositionInSet(string $sticker, int $position, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteStickerFromSet(string $sticker, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerEmojiList(string $sticker, array $emoji_list, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerKeywords(string $sticker, ?array $keywords = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerMaskPosition(string $sticker, ?array $mask_position = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerSetTitle(string $name, string $title, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setStickerSetThumbnail(
    string $name,
    int $user_id,
    ?string $thumbnail = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setCustomEmojiStickerSetThumbnail(string $name, ?string $custom_emoji_id = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function deleteStickerSet(string $name, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerInlineQuery(
    array $results,
    ?int $cache_time = null,
    ?bool $is_personal = null,
    ?string $next_offset = null,
    ?array $button = null,
    ?string $inline_query_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerWebAppQuery(array $result, ?string $web_app_query_id = null, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerShippingQuery(
    bool $ok,
    ?array $shipping_options = null,
    ?string $error_message = null,
    ?string $shipping_query_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function answerPreCheckoutQuery(
    bool $ok,
    ?string $error_message = null,
    ?string $pre_checkout_query_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setPassportDataErrors(int $user_id, array $errors, ?array $_options = []): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
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
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getGameHighScores(
    int $user_id,
    ?int $chat_id = null,
    ?int $message_id = null,
    ?string $inline_message_id = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
};
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getUpdates(
    int $limit = 100,
    int $timeout = 0,
    ?int $offset = null,
    ?array $allowed_updates = null,
    ?array $_options = [],
): array {
    return _prepareAndMakeApiRequest(__FUNCTION__, get_defined_vars(), $_options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _autoFillApiMethodParameters($parameters) {
    if (key_exists('chat_id', $parameters) && !$parameters['chat_id']) {
        $parameters['chat_id'] = chatId() ?? userId();
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
    if (key_exists('entities', $parameters) && $parameters['entities']) {
        $parameters['entities'] = json_encode($parameters['entities']);
    }
    if (key_exists('caption_entities', $parameters) && $parameters['caption_entities']) {
        $parameters['caption_entities'] = json_encode($parameters['caption_entities']);
    }
    if (key_exists('options', $parameters) && $parameters['options']) {
        $parameters['options'] = json_encode($parameters['options']);
    }
    if (key_exists('results', $parameters) && $parameters['results']) {
        $parameters['results'] = json_encode($parameters['results']);
    }
    $fileType = current(array_intersect_key(array_keys($parameters), fileTypes()));
    if ($fileType && file_exists(strval($filePath = $parameters[$fileType]))) {
        $parameters[$fileType] = new CURLFile($filePath);
    }
    return $parameters;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function downloadBotFile(array|string $file,string $save_path,?array $options = []): bool {
    if (is_string($file)) {
        $file = getFile(file_id: $file);
        if (!$file || !$file['ok']) {
            throw new Exception("File not found!");
        }
    }
    $filePath = $file['file_path'] ?? $file['result']['file_path'] ?? null;
    if (!$filePath) {
        throw new Exception("The 'file_path' is not specified!");
    }
    $apiBaseUrl = ($options['api_base_url'] ?? _apiBaseUrl()).'/file';
    if (!$apiBaseUrl) {
        throw new Exception("The api base url is not specified!");
    }
    $token = $options['via_token'] ?? _botToken($options['to_bot'] ?? null);
    if (!$token) {
        throw new Exception("The bot token is not specified!");
    }
    $url = "$apiBaseUrl/bot{$token}/{$filePath}";
    return downloadFile(url: $url, save_path: $save_path);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function downloadFile(string $url, string $save_path): bool {
    $fp = fopen($save_path, 'w+');
    $result = _makeCurlRequest(url: $url, options: [
        CURLOPT_FILE => $fp,
    ]);
    fclose($fp);
    return $result;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _makeApiRequest(string $method = null, array $parameters = [], array $options = []): array|bool {
    $apiBaseUrl = $options['api_base_url'] ?? _apiBaseUrl();
    if (!$apiBaseUrl) {
        throw new Exception("The api base url is not specified!");
    }
    $token = $options['via_token'] ?? _botToken($options['to_bot'] ?? null);
    if (!$token) {
        throw new Exception("The bot token is not specified!");
    }
    $url = "{$apiBaseUrl}/bot{$token}/{$method}";
    $curlOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $parameters,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_SESSIONID_CACHE => true,
        CURLOPT_TCP_FASTOPEN => true,
        CURLOPT_TCP_NODELAY => true,
        CURLOPT_TIMEOUT => _isWebhook() ? 3 : 10,
        CURLOPT_CONNECTTIMEOUT => _isWebhook() ? 2 : 10,
        CURLOPT_FORBID_REUSE => false,
        CURLOPT_FRESH_CONNECT => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
    ] + ($options['curl_options'] ?? _defaultCurlOptions());
    $result = _makeCurlRequest(url: $url, options: $curlOptions);
    if (is_bool($result)) {
        return $result;
    }
    $response = json_decode($result, true);
    if (isset($response['ok']) && !$response['ok']) {
        $handlers = _handlers();
        if (isset($handlers['api_error'])) {
            return $handlers['api_error']($response);
        }
    }
    return $response;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _makeCurlRequest(string $url, array $options = []): string|bool {
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _getCommonKeys(array $array1, array $array2): array {
    return array_intersect($array1, array_keys($array2));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _config(?string $keys = null): mixed {
    return _arrayGet($GLOBALS[_PACKAGE_NAME] ?? [], $keys);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _arrayGet(?array $data, ?string $keys = null): mixed {
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
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _setOrPushValue(array &$array, mixed $value, ?string $keys = null, bool $push = false): void {
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

#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _setUpdate(array $update): void {
    _setOrPushValue($GLOBALS[_PACKAGE_NAME], $update, 'update');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _addHandler(
    string $keys,
    callable $callable,
    callable|array $middlewares = [],
    array $skip_middlewares = [],
): void {
    $handler = &$GLOBALS[_PACKAGE_NAME]['handlers'];
    foreach(explode('.', $keys) as $key) {
        $handler = &$handler[$key];
    }
    $handler['callable'] = $callable;
    if ($middlewares) {
        if (is_callable($middlewares)) {
            $handler['middlewares'][] = $middlewares;
        } else {
            $handler['middlewares'] = $middlewares;
        }
    }
    if ($skip_middlewares) {
        $handler['skip_middlewares'] = $skip_middlewares;
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _addMiddleware(callable $callable, string $name = null): void {
    $handler = &$GLOBALS[_PACKAGE_NAME]['middlewares'];
    if ($name) {
        $handler[$name] = $callable;
    } else {
        $handler[] = $callable;
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _processCurrentUpdate() {
    return _fireHandlers(_handlers());
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _getPatternParameters(string $pattern, string $value): ?array {
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
function _fireAllMiddlewares(?array $handler = null): void {
    _fireGlobalMiddlewares(_middlewares(), $handler['skip_middlewares'] ?? []);
    _fireHandlerMiddlewares($handler['middlewares'] ?? []);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _fireGlobalMiddlewares(array $middlewares, array $skipMiddlewares = []): void {
    foreach ($middlewares as $name => $middleware) {
        if ($name[0].$name[1] === 'l:' || in_array($name, $skipMiddlewares)) {
            continue;
        }
        if (is_callable($middleware)) {
            $middleware();
        }
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _fireHandlerMiddlewares(array $middlewares): void {
    $globalMiddlewares = _middlewares();
    foreach ($middlewares as $middleware) {
        if (is_callable($middleware)) {
            $middleware();
        } elseif (isset($globalMiddlewares["l:$middleware"])) {
            $globalMiddlewares["l:$middleware"]();
        } elseif (is_array($middleware)) {
            _fireHandlerMiddlewares($middleware);
        }
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _fireHandlers(array $handlers) {
    $updateType = updateType();
    $fallbackHandlers = $handlers['fallback'] ?? null;
    try {
        if (!isset($handlers[$updateType])) {
            if (isset($handlers['any'])) {
                return $handlers['any']['callable']();
            }
            if (isset($fallbackHandlers[$updateType])) {
                return $fallbackHandlers[$updateType]['callable']();
            }
            if (isset($fallbackHandlers['callable'])) {
                return $fallbackHandlers['callable']();
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
                $isStartedAConversation = _cache() && _isStartedAConversation();
                $text = text();
                foreach ($updateTypeHandlers[$messageType] as $pattern => $handler) {
                    $parameters = _getPatternParameters($pattern, $text);
                    if (is_null($parameters)) {
                        continue;
                    }
                    if ($isStartedAConversation) {
                        conversationEnd();
                    }
                    _fireAllMiddlewares($handler);
                    return $handler['callable'](...$parameters);
                }
                if ($isStartedAConversation) {
                    $userKey = _cacheGetUserKey();
                    $serializedClosure = _cache()->get("conv|{$userKey}|next_step");
                    $callable = _unserializeClosure($serializedClosure);
                    return $callable();
                }

            } elseif (in_array($messageType, messageTypes())) {
                _fireAllMiddlewares($updateTypeHandlers[$messageType]);
                return $updateTypeHandlers[$messageType]['callable']();
            }
        } elseif ($updateType === UPDATE_TYPE_CALLBACK_QUERY) {
            $callbackData = callbackQueryData();
            foreach ($updateTypeHandlers['data'] as $pattern => $handler) {
                $parameters = _getPatternParameters($pattern, $callbackData);
                if (is_null($parameters)) {
                    continue;
                }
                _fireAllMiddlewares($handler);
                return $handler['callable'](...$parameters);
            }
        } elseif ($updateType === UPDATE_TYPE_INLINE_QUERY) {
            $query = inlineQueryText();
            foreach ($updateTypeHandlers['query'] as $pattern => $handler) {
                $parameters = _getPatternParameters($pattern, $query);
                if (is_null($parameters)) {
                    continue;
                }
                _fireAllMiddlewares($handler);
                return $handler['callable'](...$parameters);
            }
        } elseif ($updateType === UPDATE_TYPE_CHOSEN_INLINE_RESULT) {
            $query = chosenInlineResultQuery();
            foreach ($updateTypeHandlers['query'] as $pattern => $handler) {
                $parameters = _getPatternParameters($pattern, $query);
                if (is_null($parameters)) {
                    continue;
                }
                _fireAllMiddlewares($handler);
                return $handler['callable'](...$parameters);
            }
        }
        if (isset($updateTypeHandlers['callable'])) {
            _fireAllMiddlewares($updateTypeHandlers);
            return $updateTypeHandlers['callable']();
        }
        if (isset($fallbackHandlers[$updateType]['callable'])) {
            _fireAllMiddlewares($fallbackHandlers[$updateType]);
            return $fallbackHandlers[$updateType]['callable']();
        }
        if (isset($fallbackHandlers['callable'])) {
            _fireAllMiddlewares($fallbackHandlers);
            return $fallbackHandlers['callable']();
        }
    } catch (Throwable $e) {
        if (isset($handlers['exception']['callable'])) {
            return $handlers['exception']['callable']($e);
        }
        throw $e;
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _prepareApiMethodParameters(array $parameters): array {
    return _removeNullValues(_autoFillApiMethodParameters(_removeInvalidParameters($parameters)));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _removeNullValues(array $array): array {
    return array_filter($array, fn($value) => $value !== null);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _removeInvalidParameters(array $parameters): array {
    unset($parameters['_options']);
    return $parameters;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _extractFunctionName(string $function): string {
    return basename(strtr($function, '\\', '/'));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _prepareAndMakeApiRequest(string $function, array $parameters = [], array $options = []): array {
    return _makeApiRequest(_extractFunctionName($function), _prepareApiMethodParameters($parameters), $options);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _serializeClosure(Closure $closure): string {
    _checkConversationRequirements();
    $serializableClosure = new SerializableClosure($closure);
    return serialize($serializableClosure);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _unserializeClosure(string $serializedClosure): Closure {
    /** @var SerializableClosure */
    $serializableClosure = unserialize($serializedClosure, [
        'allowed_classes' => [SerializableClosure::class],
    ]);
    if (!$serializableClosure) {
        throw new Exception("Can not unserialize the string '{$serializedClosure}'!");
    }
    return $serializableClosure->getClosure();
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function conversationNextStep(Closure $closure): void {
    _checkConversationRequirements();
    $userKey = _cacheGetUserKey();
    _cache()->set("conv|{$userKey}|next_step", _serializeClosure($closure), _CACHE_CONVERSATION_TTL);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _checkConversationRequirements(): void {
    if (!_cache() || !class_exists(SerializableClosure::class)) {
        throw new Exception("To use the conversation feature, you need to install rqeuired packages via Composer!");
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function conversationEnd(?Closure $finalStep = null): void {
    _checkConversationRequirements();
    $userKey = _cacheGetUserKey();
    if ($finalStep) {
        _cache()->set(
            key: "conv|{$userKey}|next_step",
            value: _serializeClosure(function() use ($finalStep, $userKey) {
                $finalStep();
                _cache()->delete("conv|{$userKey}|next_step");
            }),
            ttl: _CACHE_CONVERSATION_TTL
        );
    } else {
        _cache()->delete("conv|{$userKey}|next_step");
    }
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function conversationSetData(string $key, mixed $value, null|int|DateInterval $ttl = null): void {
    _checkConversationRequirements();
    $userKey = _cacheGetUserKey();
    _cache()->set("conv|{$userKey}|data|{$key}", $value, $ttl ?? _CACHE_CONVERSATION_TTL);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function conversationGetData(string $key, mixed $defaultValue = null): mixed {
    $userKey = _cacheGetUserKey();
    return _cache()->get("conv|{$userKey}|data|{$key}", $defaultValue);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _isStartedAConversation(?string $userKey = null): bool {
    $userKey = $userKey ?? _cacheGetUserKey();
    return boolval(_cache()->get("conv|{$userKey}|next_step"));
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _cacheGetUserKey(): string {
    static $key;
    if (!$key) {
        $key = _defaultBotUsername().'_'.chatId().'_'.userId();
    }
    return $key;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function setUserData(string $key, mixed $value, null|int|DateInterval $ttl = null): void {
    $userKey = _cacheGetUserKey();
    _cache()->set("user|{$userKey}|{$key}", $value, $ttl ?? _CACHE_USER_DATA_TTL);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function getUserData(string $key, mixed $defaultValue = null): mixed {
    $userKey = _cacheGetUserKey();
    return _cache()->get("user|{$userKey}|{$key}", $defaultValue);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _botToken(?string $username = null): ?string {
    return _config('bots.'.($username ?? _config('default_bot_username')).'.token');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _apiBaseUrl(?string $username = null): string {
    return _config('bots.'.($username ?? _config('default_bot_username')).'.api_base_url') ?? API_BASE_URL;
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _defaultBotUsername(): string {
    return _config('default_bot_username');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _isWebhook(): ?bool {
    return _config('is_webhook');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _defaultCurlOptions(): array {
    return _config('curl_options') ?? [];
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _handlers(): array {
    return _config('handlers');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _middlewares(): array {
    return _config('middlewares');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _globalData(): array {
    return _config('global_data');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _update(): array {
    return _config('update');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _cache(): ?CacheInterface {
    return _config('cache');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _longPollingLoggerEnabled(): bool {
    return _config('long_polling_logger_enabled');
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function _snakeToCamelCase(string $string) {
    $string = preg_replace_callback('/_([a-z])/', function($matches) {
        return strtoupper($matches[1]);
    }, $string);
    return lcfirst($string);
}
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~#
function run(): void {
    if (_config('is_webhook')) {
        $input = file_get_contents('php://input');
        if (!$input) {
            return;
        }
        $update = json_decode($input, true);
        _setUpdate($update);
        _processCurrentUpdate();
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
                if (_longPollingLoggerEnabled()) {
                    print_r($update);
                }
                _setUpdate($update);
                _processCurrentUpdate();
                $offset = $update['update_id'] + 1;
            }
            usleep(3000000);
        }
    }
}