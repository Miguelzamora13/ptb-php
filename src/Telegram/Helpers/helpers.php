<?php

/**
 * This file is part of the PTB-PHP (Procedural Telegram Bot - PHP) library, which provides an easy way to interact with the Telegram BOT API using Procedural programming in PHP.
 *
 * The PTB library is distributed under the terms of the GNU General Public License and is free to use, modify, and redistribute.
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

namespace DevDasher\PTB_PHP\Telegram\Helpers;

use CURLFile;
use Exception;

use function DevDasher\PHPHelpers\array_clean_nulls;
use function DevDasher\PHPHelpers\array_common_keys;
use function DevDasher\PHPHelpers\array_get;
use function DevDasher\PTB_PHP\Config\getApiBaseUrl;
use function DevDasher\PTB_PHP\Config\getBotToken;
use function DevDasher\PTB_PHP\Config\getUpdate as getUpdateFromConfig;
use function DevDasher\PTB_PHP\Helpers\downloadURL;
use function DevDasher\PTB_PHP\Telegram\Methods\getFile;
use function DevDasher\PTB_PHP\Telegram\Methods\sendAnimation;
use function DevDasher\PTB_PHP\Telegram\Methods\sendAudio;
use function DevDasher\PTB_PHP\Telegram\Methods\sendDocument;
use function DevDasher\PTB_PHP\Telegram\Methods\sendPhoto;
use function DevDasher\PTB_PHP\Telegram\Methods\sendSticker;
use function DevDasher\PTB_PHP\Telegram\Methods\sendVideo;
use function DevDasher\PTB_PHP\Telegram\Methods\sendVideoNote;
use function DevDasher\PTB_PHP\Telegram\Methods\sendVoice;

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
define('FIELD_JOIN_TO_SENDMESSAGES', 'join_to_send_messages');
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
define('FIELD_FORWARD_FROM_MESSAGE_ID', 'forward_from_MESSAGE_id');
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
define('FIELD_STORY', 'story');
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
define('FIELD_INLINE_MESSAGE_ID', 'inline_MESSAGE_id');
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
define('FIELD_CAN_DELETEMESSAGES', 'can_delete_messages');
define('FIELD_CAN_MANAGE_VIDEO_CHATS', 'can_manage_video_chats');
define('FIELD_CAN_RESTRICT_MEMBERS', 'can_restrict_members');
define('FIELD_CAN_PROMOTE_MEMBERS', 'can_promote_members');
define('FIELD_CAN_CHANGE_INFO', 'can_change_info');
define('FIELD_CAN_INVITE_USERS', 'can_invite_users');
define('FIELD_CAN_POSTMESSAGES', 'can_post_messages');
define('FIELD_CAN_EDITMESSAGES', 'can_edit_messages');
define('FIELD_CAN_PINMESSAGES', 'can_pin_messages');
define('FIELD_CAN_MANAGE_TOPICS', 'can_manage_topics');
define('FIELD_STATUS', 'status');
define('FIELD_CUSTOM_TITLE', 'custom_title');
define('FIELD_CAN_BE_EDITED', 'can_be_edited');
define('FIELD_IS_MEMBER', 'is_member');
define('FIELD_CAN_SENDMESSAGES', 'can_send_messages');
define('FIELD_CAN_SEND_AUDIOS', 'can_send_audios');
define('FIELD_CAN_SEND_DOCUMENTS', 'can_send_documents');
define('FIELD_CAN_SEND_PHOTOS', 'can_send_photos');
define('FIELD_CAN_SEND_VIDEOS', 'can_send_videos');
define('FIELD_CAN_SEND_VIDEO_NOTES', 'can_send_video_notes');
define('FIELD_CAN_SEND_VOICE_NOTES', 'can_send_voice_notes');
define('FIELD_CAN_SEND_POLLS', 'can_send_polls');
define('FIELD_CAN_SEND_OTHERMESSAGES', 'can_send_other_messages');
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
define('FIELD_INPUT_MESSAGE_CONTENT', 'input_MESSAGE_content');
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

define('METHOD_GET_UPDATES', 'getUpdates');
define('METHOD_SET_WEBHOOK', 'setWebhook');
define('METHOD_DELETE_WEBHOOK', 'deleteWebhook');
define('METHOD_GET_WEBHOOK_INFO', 'getWebhookInfo');
define('METHOD_GET_ME', 'getMe');
define('METHOD_LOG_OUT', 'logOut');
define('METHOD_CLOSE', 'close');
define('METHOD_DELETE_MESSAGE', 'delete_message');
define('METHOD_SEND_MESSAGE', 'send_message');
define('METHOD_FORWARD_MESSAGE', 'forward_message');
define('METHOD_COPY_MESSAGE', 'copy_message');
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
define('METHOD_PIN_CHAT_MESSAGE', 'pinChat_message');
define('METHOD_UNPIN_CHAT_MESSAGE', 'unpinChat_message');
define('METHOD_UNPIN_ALL_CHATMESSAGES', 'unpinAllChatMessages');
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
define('METHOD_UNPIN_ALL_FORUM_TOPICMESSAGES', 'unpinAllForumTopicMessages');
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
define('PARAM_REVOKEMESSAGES', 'revoke_messages');
define('PARAM_ONLY_IF_BANNED', 'only_if_banned');
define('PARAM_PERMISSIONS', 'permissions');
define('PARAM_USE_INDEPENDENT_CHAT_PERMISSIONS', 'use_independent_chat_permissions');
define('PARAM_CAN_MANAGE_CHAT', 'can_manage_chat');
define('PARAM_CAN_POSTMESSAGES', 'can_post_messages');
define('PARAM_CAN_EDITMESSAGES', 'can_edit_messages');
define('PARAM_CAN_DELETEMESSAGES', 'can_delete_messages');
define('PARAM_CAN_MANAGE_VIDEO_CHATS', 'can_manage_video_chats');
define('PARAM_CAN_RESTRICT_MEMBERS', 'can_restrict_members');
define('PARAM_CAN_PROMOTE_MEMBERS', 'can_promote_members');
define('PARAM_CAN_CHANGE_INFO', 'can_change_info');
define('PARAM_CAN_INVITE_USERS', 'can_invite_users');
define('PARAM_CAN_PINMESSAGES', 'can_pin_messages');
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
define('MESSAGE_TYPE_STORY', FIELD_STORY);
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

define('CHAT_PERMISSION_CAN_SENDMESSAGES', 'can_send_messages');
define('CHAT_PERMISSION_CAN_SEND_AUDIOS', 'can_send_audios');
define('CHAT_PERMISSION_CAN_SEND_DOCUMENTS', 'can_send_documents');
define('CHAT_PERMISSION_CAN_SEND_PHOTOS', 'can_send_photos');
define('CHAT_PERMISSION_CAN_SEND_VIDEOS', 'can_send_videos');
define('CHAT_PERMISSION_CAN_SEND_VIDEO_NOTES', 'can_send_video_notes');
define('CHAT_PERMISSION_CAN_SEND_VOICE_NOTES', 'can_send_voice_notes');
define('CHAT_PERMISSION_CAN_SEND_POLLS', 'can_send_polls');
define('CHAT_PERMISSION_CAN_SEND_OTHERMESSAGES', 'can_send_other_messages');
define('CHAT_PERMISSION_CAN_ADD_WEB_PAGE_PREVIEWS', 'can_add_web_page_previews');
define('CHAT_PERMISSION_CAN_CHANGE_INFO', 'can_change_info');
define('CHAT_PERMISSION_CAN_INVITE_USERS', 'can_invite_users');
define('CHAT_PERMISSION_CAN_PINMESSAGES', 'can_pin_messages');
define('CHAT_PERMISSION_CAN_MANAGE_TOPICS', 'can_manage_topics');

define('CHAT_ADMINISTRATOR_RIGHT_IS_ANONYMOUS', 'is_anonymous');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_CHAT', 'can_manage_chat');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_DELETEMESSAGES', 'can_delete_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_MANAGE_VIDEO_CHATS', 'can_manage_video_chats');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_RESTRICT_MEMBERS', 'can_restrict_members');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_PROMOTE_MEMBERS', 'can_promote_members');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_CHANGE_INFO', 'can_change_info');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_INVITE_USERS', 'can_invite_users');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_POSTMESSAGES', 'can_post_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_EDITMESSAGES', 'can_edit_messages');
define('CHAT_ADMINISTRATOR_RIGHT_CAN_PINMESSAGES', 'can_pin_messages');
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
define('API_BASE_URL_FILE_BOT', 'https://api.telegram.org/file/bot');

define('REGEX_TELEGRAM_BOT_TOKEN', '/(?<token>(?<bot_id>\d{8,10})\:(?<hash>[\w-]{35}))/');
define('REGEX_TELEGRAM_INVITE_LINK', '/(?<invite_link>(?:http[s]://)?(?:t|telegram)\.(?:me|dog)\/(?:joinchat\/|\+)(?<hash>[\w\-]+))/i');
define('REGEX_TELEGRAM_USERNAME', '/@(?<username>\w{5,32})/');

/**
 * Get the update ID.
 *
 * @return int|null
 */
function getUpdateId(): ?int {
    return getUpdate(FIELD_UPDATE_ID);
}

/**
 * Get the update as array or it's subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getUpdate(?string $key = null): mixed {
    return array_get(getUpdateFromConfig(), $key);
}

/**
 * Get the current update type.
 *
 * @return string|null
 */
function getUpdateType(): ?string {
    return current(array_common_keys(getUpdate(), array_flip(getUpdateTypes())));
}

/**
 * Get the message as array or it's subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getMessage(?string $key = null): mixed {
    $update = getUpdate();
    $updateType = getUpdateType();
    $message = match ($updateType) {
        UPDATE_TYPE_CALLBACK_QUERY => $update[$updateType][UPDATE_TYPE_MESSAGE],
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_EDITED_CHANNEL_POST => $update[$updateType],
        default => null,
    };
    if (!$message) {
        return null;
    }
    return array_get($message, $key);
}

/**
 * Get the message type if available, null otherwise.
 *
 * @return string|null
 */
function getMessageType(): ?string {
    return current(array_common_keys(array_flip(getMessageTypes()), getMessage()));
}

/**
 * Get the inline_query as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getInlineQuery(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_INLINE_QUERY), $key);
}

/**
 * Get the inline_query_result as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getChosenInlineResult(?string $key = null): ?string {
    return array_get(getUpdate(UPDATE_TYPE_CHOSEN_INLINE_RESULT), $key);
}

/**
 * Get the callback_query as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getCallbackQuery(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_CALLBACK_QUERY), $key);
}

/**
 * Get the shipping_query as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getShippingQuery(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_SHIPPING_QUERY), $key);
}

/**
 * Get the pre_checkout_query as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getPreCheckoutQuery(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_PRE_CHECKOUT_QUERY), $key);
}

/**
 * Get the query from update or message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getPoll(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_POLL) ?? getMessage(MESSAGE_TYPE_POLL), $key);
}

/**
 * Get the poll_answer as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getPollAnswer(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_POLL_ANSWER), $key);
}

/**
 * Get the my_chat_member as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getMyChatMember(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_MY_CHAT_MEMBER), $key);
}

/**
 * Get the chat_member as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getChatMember(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_CHAT_MEMBER), $key);
}

/**
 * Get the chat_join_request as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getChatJoinRequest(?string $key = null): mixed {
    return array_get(getUpdate(UPDATE_TYPE_CHAT_JOIN_REQUEST), $key);
}

/**
 * Get the from as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getFrom(?string $key = null): mixed {
    $updateType = getUpdateType();
    $update = getUpdate();
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
    if (!$user) {
        return null;
    }
    return array_get($user, $key);
}

/**
 * Get the current user as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getUser(?string $key = null): mixed {
    return getFrom($key);
}

/**
 * Get the current user ID.
 *
 * @return int|null
 */
function getUserId(): ?int {
    return getUser(FIELD_ID);
}

/**
 * Get the current chat as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getChat(?string $key = null): mixed {
    $message = getMessage();
    $updateType = getUpdateType();
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
    if (!$chat) {
        return null;
    }
    return array_get($chat, $key);
}

/**
 * Get the current chat ID.
 *
 * @return int|null
 */
function getChatId(): ?int {
    return getChat(FIELD_ID);
}

/**
 * Get the current photo (high quality one) from message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getPhoto(?string $key = null): mixed {
    $photos = getPhotos();
    return array_get(end($photos), $key);
}

/**
 * Get the current photo (all photos) from message as array or subkeys value for the given key.
 *
 * @return array|null
 */
function getPhotos(): ?array {
    return getMessage(FIELD_PHOTO);
}

/**
 * Get the current game photo as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getGamePhoto(?string $key = null): mixed {
    $gamePhotos = getGamePhotos();
    return array_get(end($gamePhotos), $key);
}

/**
 * Get the current game photos (all photos) as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return array|null
 */
function getGamePhotos(): ?array {
    return getMessage(FIELD_GAME);
}

/**
 * Get the reply_markup of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getReplyMarkup(?string $key = null): mixed {
    return array_get(getMessage(FIELD_REPLY_MARKUP), $key);
}

/**
 * Get the via_bot as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getViaBot(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIA_BOT), $key);
}

/**
 * Get the document of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getDocument(?string $key = null): mixed {
    return array_get(getMessage(FIELD_DOCUMENT), $key);
}

/**
 * Get the sticker of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getSticker(?string $key = null): mixed {
    return array_get(getMessage(FIELD_STICKER), $key);
}

/**
 * Get the video of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVideo(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIDEO), $key);
}

/**
 * Get the video_note of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVideoNote(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIDEO_NOTE), $key);
}

/**
 * Get the voice of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVoice(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VOICE), $key);
}

/**
 * Get the audio of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getAudio(?string $key = null): mixed {
    return array_get(getMessage(FIELD_AUDIO), $key);
}

/**
 * Get the dice of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getDice(?string $key = null): mixed {
    return array_get(getMessage(FIELD_DICE), $key);
}

/**
 * Get the game of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getGame(?string $key = null): mixed {
    return array_get(getMessage(FIELD_GAME), $key);
}

/**
 * Get the venue of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVenue(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VENUE), $key);
}

/**
 * Get the location of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getLocation(?string $key = null): mixed {
    return array_get(getMessage(FIELD_LOCATION), $key);
}

/**
 * Get the contact of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getContact(?string $key = null): mixed {
    return array_get(getMessage(FIELD_CONTACT), $key);
}

/**
 * Get the animation (GIF) of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getAnimation(?string $key = null): mixed {
    return array_get(getMessage(FIELD_ANIMATION), $key);
}

/**
 * Get the text of the current message.
 *
 * @return string|null The text of the current message if available, null otherwise.
 */
function getText(): ?string {
    return getMessage(FIELD_TEXT);
}

/**
 * Get the caption of the current message.
 *
 * @return string|null The caption of the current message if available, null otherwise.
 */
function getCaption(): ?string {
    return getMessage(FIELD_CAPTION);
}

/**
 * Get the entities of the current message or caption.
 *
 * @return array|null The entities of the current message or caption, or null if they cannot be retrieved.
 */
function getEntities(): ?array {
    return getMessage(FIELD_ENTITIES) ?? getMessage(FIELD_CAPTION_ENTITIES);
}

/**
 * Get the text of the current_inline_query.
 *
 * @return string|null The text of the current_inline_query if available, null otherwise.
 */
function getInlineQueryText(): ?string {
    return getInlineQuery(FIELD_QUERY);
}

/**
 * Get the data of the current callback_query.
 *
 * @return string|null The data of the current callback_query if available, null otherwise.
 */
function getCallbackQueryData(): ?string {
    return getCallbackQuery(FIELD_DATA);
}

/**
 * Get the ID of the chosen_inline_result.
 *
 * @return string|null The ID of the chosen_inline_result if available, null otherwise.
 */
function getChosenInlineResultId(): ?string {
    return getChosenInlineResult(FIELD_RESULT_ID);
}

/**
 * Get the query of the chosen_inline_result.
 *
 * @return string|null The query of the chosen_inline_result if available, null otherwise.
 */
function getChosenInlineResultQuery(): ?string {
    return getChosenInlineResult(FIELD_QUERY);
}

/**
 * Get the forward_from of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForwardFrom(?string $key = null): mixed {
    return array_get(getMessage(FIELD_FORWARD_FROM), $key);
}

/**
 * Get the forward_from_chat of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForwardFromChat(?string $key = null): mixed {
    return array_get(getMessage(FIELD_FORWARD_FROM_CHAT), $key);
}

/**
 * Get the forward_date of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForwardDate(): ?int {
    return getMessage(FIELD_FORWARD_DATE);
}

/**
 * Get the reply_to_message of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getReplyToMessage(?string $key = null): mixed {
    return array_get(getMessage(FIELD_REPLY_TO_MESSAGE), $key);
}

/**
 * Get the pinned_message of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getPinnedMessage(?string $key = null): mixed {
    return array_get(getMessage(FIELD_PINNED_MESSAGE), $key);
}

/**
 * Get the sender_chat of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getSenderChat(?string $key = null): mixed {
    return array_get(getMessage(FIELD_SENDER_CHAT), $key);
}

/**
 * Get the author_signature of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getAuthorSignature(): ?string {
    return getMessage(FIELD_AUTHOR_SIGNATURE);
}

/**
 * Get the forum_topic_created of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForumTopicCreated(?string $key = null): mixed {
    return array_get(getMessage(FIELD_FORUM_TOPIC_CREATED), $key);
}

/**
 * Get the forum_topic_edited of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForumTopicEdited(?string $key = null): mixed {
    return array_get(getMessage(FIELD_FORUM_TOPIC_EDITED), $key);
}

/**
 * Get the forum_topic_closed of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForumTopicClosed(?string $key = null): mixed {
    return array_get(getMessage(FIELD_FORUM_TOPIC_CLOSED), $key);
}

/**
 * Get the forum_topic_reopened of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getForumTopicReopened(?string $key = null): mixed {
    return array_get(getMessage(FIELD_FORUM_TOPIC_REOPENED), $key);
}

/**
 * Get the message_thread_id of the current message.
 *
 * @return int|null
 */
function getMessageThreadId(): ?int {
    return getMessage(FIELD_MESSAGE_THREAD_ID);
}

/**
 * Get the chat_shared of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getChatShared(?string $key = null): mixed {
    return array_get(getMessage(FIELD_CHAT_SHARED), $key);
}

/**
 * Get the user_shared of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getUserShared(?string $key = null): mixed {
    return array_get(getMessage(FIELD_USER_SHARED), $key);
}

/**
 * Get the connected_website of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getConnectedWebsite(): ?string {
    return getMessage(FIELD_CONNECTED_WEBSITE);
}

/**
 * Get the write_access_allowed of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getWriteAccessAllowed(?string $key = null): mixed {
    return array_get(getMessage(FIELD_WRITE_ACCESS_ALLOWED), $key);
}

/**
 * Get the passport_data of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getPassportData(?string $key = null): mixed {
    return array_get(getMessage(FIELD_PASSPORT_DATA), $key);
}

/**
 * Get the proximity_alert_triggered of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getProximityAlertTriggered(?string $key = null): mixed {
    return array_get(getMessage(FIELD_PROXIMITY_ALERT_TRIGGERED), $key);
}

/**
 * Get the general_forum_topic_hidden of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getGeneralForumTopicHidden(?string $key = null): mixed {
    return array_get(getMessage(FIELD_GENERAL_FORUM_TOPIC_HIDDEN), $key);
}

/**
 * Get the general_forum_topic_unhidden of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getGeneralForumTopicUnhidden(?string $key = null): mixed {
    return array_get(getMessage(FIELD_GENERAL_FORUM_TOPIC_UNHIDDEN), $key);
}

/**
 * Get the video_chat_scheduled of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVideoChatScheduled(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIDEO_CHAT_SCHEDULED), $key);
}

/**
 * Get the video_chat_started of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVideoChatStarted(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIDEO_CHAT_STARTED), $key);
}

/**
 * Get the video_chat_ended of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVideoChatEnded(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIDEO_CHAT_ENDED), $key);
}

/**
 * Get the video_chat_participants_invited of the current message as array or subkeys value for the given key.
 *
 * @param string|null $key
 * @return mixed
 */
function getVideoChatParticipantsInvited(?string $key = null): mixed {
    return array_get(getMessage(FIELD_VIDEO_CHAT_PARTICIPANTS_INVITED), $key);
}

/**
 * Get the value of a specific key from the web_app_data array.
 *
 * @param string|null $key The key to retrieve from the web_app_data array.
 * @return mixed The value of the specified key, or the entire web_app_data array if no key is specified.
 */
function getWebAppData(?string $key = null): mixed {
    return array_get(getMessage(FIELD_WEB_APP_DATA), $key);
}

/**
 * Get the inline keyboard reply markup from the current message.
 *
 * @return mixed The inline keyboard reply markup.
 */
function getReplyMarkupInlineKeyboard(): mixed {
    return getReplyMarkup(FIELD_INLINE_KEYBOARD);
}

/**
 * Get the ID of the current message.
 *
 * @return int|null The ID of the current message if available, null otherwise.
 */
function getMessageId(): ?int {
    return getMessage(FIELD_MESSAGE_ID);
}

/**
 * Get the ID of the current callback_query.
 *
 * @return int|null The ID of the current callback_query if available, null otherwise.
 */
function getCallbackQueryId(): ?int {
    return getCallbackQuery(FIELD_ID);
}

/**
 * Get the ID of the current_inline_query.
 *
 * @return int|null The ID of the current_inline_query if available, null otherwise.
 */
function getInlineQueryId(): ?int {
    return getInlineQuery(FIELD_ID);
}

/**
 * Get the media group ID of the current message.
 *
 * @return int|null The media group ID of the current message if available, null otherwise.
 */
function getMediaGroupId(): ?int {
    return getMessage(FIELD_MEDIA_GROUP_ID);
}

/**
 * Get the type of the current chat.
 *
 * @return string|null The type of the current chat if available, null otherwise.
 */
function getChatType(): ?string {
    return getChat(FIELD_TYPE);
}

/**
 * Check if the update type is message.
 *
 * @return bool
 */
function isMessage(): bool {
    return getUpdateType() === UPDATE_TYPE_MESSAGE;
}

/**
 * Check if the update type is message, edited_message, channel_post, or edited_channel_post.
 *
 * @return bool
 */
function isOfMessage(): bool {
    return in_array(getUpdateType(), [
        UPDATE_TYPE_MESSAGE,
        UPDATE_TYPE_EDITED_MESSAGE,
        UPDATE_TYPE_CHANNEL_POST,
        UPDATE_TYPE_EDITED_CHANNEL_POST,
    ]);
}

/**
 * Check if the update type is callback_query.
 *
 * @return bool
 */
function isCallbackQuery(): bool {
    return getUpdateType() === UPDATE_TYPE_CALLBACK_QUERY;
}

/**
 * Check if the update type is edited_message.
 *
 * @return bool
 */
function isEditedMessage(): bool {
    return getUpdateType() === UPDATE_TYPE_EDITED_MESSAGE;
}

/**
 * Check if the update type is channel_post.
 *
 * @return bool
 */
function isChannelPost(): bool {
    return getUpdateType() === UPDATE_TYPE_CHANNEL_POST;
}

/**
 * Check if the update type is edited_channel_post.
 *
 * @return bool
 */
function isEditedChannelPost(): bool {
    return getUpdateType() === UPDATE_TYPE_EDITED_CHANNEL_POST;
}

/**
 * Check if the update type is shipping_query.
 *
 * @return bool
 */
function isShippingQuery(): bool {
    return getUpdateType() === UPDATE_TYPE_SHIPPING_QUERY;
}

/**
 * Check if the update type is chat_join_request.
 *
 * @return bool
 */
function isChatJoinRequest(): bool {
    return getUpdateType() === UPDATE_TYPE_CHAT_JOIN_REQUEST;
}

/**
 * Check if the update type is inline_query.
 *
 * @return bool
 */
function isInlineQuery(): bool {
    return getUpdateType() === UPDATE_TYPE_INLINE_QUERY;
}

/**
 * Check if the update type is my_chat_member.
 *
 * @return bool
 */
function isMyChatMember(): bool {
    return getUpdateType() === UPDATE_TYPE_MY_CHAT_MEMBER;
}

/**
 * Check if the update type is chat_member.
 *
 * @return bool
 */
function isChatMember(): bool {
    return getUpdateType() === UPDATE_TYPE_CHAT_MEMBER;
}

/**
 * Check if the update type is chosen_inline_result.
 *
 * @return bool
 */
function isChosenInlineResult(): bool {
    return getUpdateType() === UPDATE_TYPE_CHOSEN_INLINE_RESULT;
}

/**
 * Check if the update type is pre_checkout_query.
 *
 * @return bool
 */
function isPreCheckOutQuery(): bool {
    return getUpdateType() === UPDATE_TYPE_PRE_CHECKOUT_QUERY;
}

/**
 * Check if the update type is poll_answer.
 *
 * @return bool
 */
function isPollAnswer(): bool {
    return getUpdateType() === UPDATE_TYPE_POLL;
}

/**
 * Check if the update type is poll. Optionally, check if the message type is poll.
 *
 * @param bool $check_message_type Whether to check if the message type is poll.
 * @return bool
 */
function isPoll(bool $check_message_type = false): bool {
    if ($check_message_type) {
        return getMessageType() === MESSAGE_TYPE_POLL;
    }
    return getUpdateType() === UPDATE_TYPE_POLL;
}

/**
 * Check if the message type is photo.
 *
 * @return bool
 */
function isPhoto(): bool {
    return getMessageType() === MESSAGE_TYPE_PHOTO;
}

/**
 * Check if the message type is sticker.
 *
 * @return bool
 */
function isSticker(): bool {
    return getMessageType() === MESSAGE_TYPE_STICKER;
}

/**
 * Check if the message type is story.
 *
 * @return bool
 */
function isStory(): bool {
    return getMessageType() === MESSAGE_TYPE_STORY;
}

/**
 * Check if the message type is animation.
 *
 * @return bool
 */
function isAnimation(): bool {
    return getMessageType() === MESSAGE_TYPE_ANIMATION;
}

/**
 * Check if the message type is video.
 *
 * @return bool
 */
function isVideo(): bool {
    return getMessageType() === MESSAGE_TYPE_VIDEO;
}

/**
 * Check if the message type is video note.
 *
 * @return bool
 */
function isVideoNote(): bool {
    return getMessageType() === MESSAGE_TYPE_VIDEO_NOTE;
}

/**
 * Check if the message type is dice.
 *
 * @return bool
 */
function isDice(): bool {
    return getMessageType() === MESSAGE_TYPE_DICE;
}

/**
 * Check if the message type is game.
 *
 * @return bool
 */
function isGame(): bool {
    return getMessageType() === MESSAGE_TYPE_GAME;
}

/**
 * Check if the message type is venue.
 *
 * @return bool
 */
function isVenue(): bool {
    return getMessageType() === MESSAGE_TYPE_VENUE;
}

/**
 * Check if the message type is voice.
 *
 * @return bool
 */
function isVoice(): bool {
    return getMessageType() === MESSAGE_TYPE_VOICE;
}

/**
 * Check if the message type is document.
 *
 * @return bool
 */
function isDocument(): bool {
    return getMessageType() === MESSAGE_TYPE_DOCUMENT;
}

/**
 * Check if the message type is location.
 *
 * @return bool Returns
 */
function isLocation(): bool {
    return getMessageType() === MESSAGE_TYPE_LOCATION;
}

/**
 * Check if the message type is contact.
 *
 * @return bool Returns
 */
function isContact(): bool {
    return getMessageType() === MESSAGE_TYPE_CONTACT;
}

/**
 * Check if the message type is audio.
 *
 * @return bool Returns
 */
function isAudio(): bool {
    return getMessageType() === MESSAGE_TYPE_AUDIO;
}

/**
 * Check if the message type is text.
 *
 * @return bool Returns
 */
function isText(): bool {
    return getMessageType() === MESSAGE_TYPE_TEXT;
}

/**
 * @return bool Returns
 */
function isNewChatMembers(): bool {
    return getMessageType() === MESSAGE_TYPE_NEW_CHAT_MEMBERS;
}

/**
 * @return bool Returns
 */
function isLeftChatMember(): bool {
    return getMessageType() === MESSAGE_TYPE_LEFT_CHAT_MEMBER;
}

/**
 * @return bool Returns
 */
function isNewChatTitle(): bool {
    return getMessageType() === MESSAGE_TYPE_NEW_CHAT_TITLE;
}

/**
 * @return bool Returns
 */
function isNewChatPhoto(): bool {
    return getMessageType() === MESSAGE_TYPE_NEW_CHAT_PHOTO;
}

/**
 * @return bool Returns
 */
function isDeleteChatPhoto(): bool {
    return getMessageType() === MESSAGE_TYPE_DELETE_CHAT_PHOTO;
}

/**
 * @return bool Returns
 */
function isGroupChatCreated(): bool {
    return getMessageType() === MESSAGE_TYPE_GROUP_CHAT_CREATED;
}

/**
 * @return bool Returns
 */
function isSupergroupChatCreated(): bool {
    return getMessageType() === MESSAGE_TYPE_SUPERGROUP_CHAT_CREATED;
}

/**
 * @return bool Returns
 */
function isChannelChatCreated(): bool {
    return getMessageType() === MESSAGE_TYPE_CHANNEL_CHAT_CREATED;
}

/**
 * @return bool Returns
 */
function isAutoDeleteTimerChanged(): bool {
    return getMessageType() === MESSAGE_TYPE_MESSAGE_AUTO_DELETE_TIMER_CHANGED;
}

/**
 * @return bool Returns
 */
function isMigrateToChatId(): bool {
    return getMessageType() === MESSAGE_TYPE_MIGRATE_TO_CHAT_ID;
}

/**
 * @return bool Returns
 */
function isMigrateFromChatId(): bool {
    return getMessageType() === MESSAGE_TYPE_MIGRATE_FROM_CHAT_ID;
}

/**
 * @return bool Returns
 */
function isPinnedMessage(): bool {
    return getMessageType() === MESSAGE_TYPE_PINNED_MESSAGE;
}

/**
 * Check if the message type is invoce.
 *
 * @return bool Returns
 */
function isInvoice(): bool {
    return getMessageType() === MESSAGE_TYPE_INVOICE;
}

/**
 * @return bool Returns
 */
function isSuccessfulPayment(): bool {
    return getMessageType() === MESSAGE_TYPE_SUCCESSFUL_PAYMENT;
}

/**
 * @return bool Returns
 */
function isUserShared(): bool {
    return getMessageType() === MESSAGE_TYPE_USER_SHARED;
}

/**
 * @return bool Returns
 */
function isChatShared(): bool {
    return getMessageType() === MESSAGE_TYPE_CHAT_SHARED;
}

/**
 * @return bool Returns
 */
function isConnectedWebsite(): bool {
    return getMessageType() === MESSAGE_TYPE_CONNECTED_WEBSITE;
}

/**
 * @return bool Returns
 */
function isWriteAccessAllowed(): bool {
    return getMessageType() === MESSAGE_TYPE_WRITE_ACCESS_ALLOWED;
}

/**
 * @return bool Returns
 */
function isPassportData(): bool {
    return getMessageType() === MESSAGE_TYPE_PASSPORT_DATA;
}

/**
 * @return bool Returns
 */
function isProximityAlertTriggered(): bool {
    return getMessageType() === MESSAGE_TYPE_PROXIMITY_ALERT_TRIGGERED;
}

/**
 * @return bool Returns
 */
function isForumTopicCreated(): bool {
    return getMessageType() === MESSAGE_TYPE_FORUM_TOPIC_CREATED;
}


/**
 * @return bool Returns
 */
function isForumTopicEdited(): bool {
    return getMessageType() === MESSAGE_TYPE_FORUM_TOPIC_EDITED;
}

/**
 * @return bool Returns
 */
function isForumTopicClosed(): bool {
    return getMessageType() === MESSAGE_TYPE_FORUM_TOPIC_CLOSED;
}

/**
 * @return bool Returns
 */
function isForumTopicReopened(): bool {
    return getMessageType() === MESSAGE_TYPE_FORUM_TOPIC_REOPENED;
}

/**
 * @return bool Returns
 */
function isGeneralForumTopicHidden(): bool {
    return getMessageType() === MESSAGE_TYPE_GENERAL_FORUM_TOPIC_HIDDEN;
}

/**
 * @return bool Returns
 */
function isGeneralForumTopicUnhidden(): bool {
    return getMessageType() === MESSAGE_TYPE_GENERAL_FORUM_TOPIC_UNHIDDEN;
}

/**
 * @return bool Returns
 */
function isVideoChatScheduled(): bool {
    return getMessageType() === MESSAGE_TYPE_VIDEO_CHAT_SCHEDULED;
}

/**
 * @return bool Returns
 */
function isVideoChatStarted(): bool {
    return getMessageType() === MESSAGE_TYPE_VIDEO_CHAT_STARTED;
}

/**
 * @return bool Returns
 */
function isVideoChatEnded(): bool {
    return getMessageType() === MESSAGE_TYPE_VIDEO_CHAT_ENDED;
}

/**
 * @return bool Returns
 */
function isVideoChatParticipantsInvited(): bool {
    return getMessageType() === MESSAGE_TYPE_VIDEO_CHAT_PARTICIPANTS_INVITED;
}

/**
 * @return bool Returns
 */
function isWebAppData(): bool {
    return getMessageType() === MESSAGE_TYPE_WEB_APP_DATA;
}

/**
 * @return bool Returns
 */
function isPollAnonymous(): bool {
    return boolval(getPoll(FIELD_IS_ANONYMOUS));
}
/**
 * @return bool Returns
 */
function isPollClosed(): bool {
    return boolval(getPoll(FIELD_IS_CLOSED));
}

/**
 * @return bool Returns
 */
function isTopicMessage(): bool {
    return boolval(getMessage(FIELD_IS_TOPIC_MESSAGE));
}

/**
 * @return bool Returns
 */
function isBot(): bool {
    return boolval(getUser(FIELD_IS_BOT));
}

/**
 * @return bool Returns
 */
function isForum(): bool {
    return boolval(getChat(FIELD_IS_FORUM));
}

/**
 * Check if the message type is of type file.
 * 
 * @return bool Returns
 */
function isFile(): bool {
    return in_array(getMessageType(), getMessageFileTypes());
}

/**
 * Check if the chat type is sender.
 * 
 * @return bool Returns
 */
function isSender(): bool {
    return getChatType() === CHAT_TYPE_SENDER;
}

/**
 * Check if the chat type is group.
 * 
 * @return bool Returns
 */
function isGroup(): bool {
    return getChatType() === CHAT_TYPE_GROUP;
}

/**
 * Check if the chat type is supergroup.
 * 
 * @return bool Returns
 */
function isSupergroup(): bool {
    return getChatType() === CHAT_TYPE_SUPERGROUP;
}

/**
 * Check if the chat type is private.
 * 
 * @return bool Returns
 */
function isPrivate(): bool {
    return getChatType() === CHAT_TYPE_PRIVATE;
}

/**
 * Check if the chat type is channel.
 * 
 * @return bool Returns
 */
function isChannel(): bool {
    return getChatType() === CHAT_TYPE_CHANNEL;
}

/**
 * Check if the message is forwarded.
 * 
 * @return bool Returns
 */
function isForwarded(): bool {
    return boolval(getMessage(FIELD_FORWARD_DATE) ?? getMessage(FIELD_FORWARD_SENDER_NAME));
}

/**
 * @param array ...$rows
 * @return array
 */
function keyboard(array ...$rows): array {
    return $rows;
}

/**
 * @param array ...$buttons
 * @return array
 */
function row(array ...$buttons): array {
    return $buttons;
}

/**
 * Use this helper function to download files from bot.
 *
 * @param array|string $file
 * @param string $save_path
 * @param array|null $options
 * @return boolean
 */
function downloadBotFile(array|string $file, string $save_path, ?array $options = []): bool {
    if (is_string($file)) {
        $file = getFile(file_id: $file);
        if (!$file || !$file[FIELD_OK]) {
            throw new Exception('File not found!');
        }
    }
    $filePath = $file[FIELD_FILE_PATH] ?? $file[FIELD_RESULT][FIELD_FILE_PATH] ?? null;
    if (!$filePath) {
        throw new Exception(sprintf("The '%s' is not specified!", FIELD_FILE_PATH));
    }
    $apiBaseUrl = ($options[_FIELD_API_BASE_URL] ?? getApiBaseUrl()).'/file';
    if (!$apiBaseUrl) {
        throw new Exception('The api base url is not specified!');
    }
    $token = $options[_FIELD_BOT_TOKEN] ?? getBotToken($options[_FIELD_BOT_TOKEN] ?? null);
    if (!$token) {
        throw new Exception('The bot token is not specified!');
    }
    $url = "{$apiBaseUrl}/bot{$token}/{$filePath}";
    $curl_options = $options[_FIELD_CURL_OPTIONS] ?? [];
    return downloadURL($url, $save_path, $curl_options);
}

/**
 * Use this helper function to get all bot command scope types.
 *
 * @param array $exclude
 * @return array|null
 */
function getBotCommandScopeTypes(array $exclude = []): array {
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

/**
 * Use this helper function to get all menu button types.
 *
 * @param array $exclude
 * @return array|null
 */
function getMenuButtonTypes(array $exclude = []): array {
    return array_diff([
        MENU_BUTTON_TYPE_DEFAULT,
        MENU_BUTTON_TYPE_WEB_APP,
        MENU_BUTTON_TYPE_COMMANDS,
    ], $exclude);
}

/**
 * Use this helper function to get all chat types.
 *
 * @param array $exclude
 * @return array|null
 */
function getChatTypes(array $exclude = []): array {
    return array_diff([
        CHAT_TYPE_GROUP,
        CHAT_TYPE_SUPERGROUP,
        CHAT_TYPE_PRIVATE,
        CHAT_TYPE_CHANNEL,
    ], $exclude);
}

/**
 * Use this helper function to get all chat member statuses.
 *
 * @param array $exclude
 * @return array|null
 */
function getChatMemberStatuses(array $exclude = []): array {
    return array_diff([
        CHAT_MEMBER_STATUS_ADMINISTRATOR,
        CHAT_MEMBER_STATUS_CREATOR,
        CHAT_MEMBER_STATUS_RESTRICTED,
        CHAT_MEMBER_STATUS_LEFT,
        CHAT_MEMBER_STATUS_MEMBER,
        CHAT_MEMBER_STATUS_KICKED,
    ], $exclude);
}

/**
 * Use this helper function to get name of all available formatting options.
 *
 * @param array $exclude
 * @return array|null
 */
function getFormattingOptions(array $exclude = []): array {
    return array_diff([
        PARSE_MODE_HTML,
        PARSE_MODE_MARKDOWN,
        PARSE_MODE_MARKDOWN_V2,
    ], $exclude);
}

/**
 * Use this helper function to get all chat actions.
 *
 * @param array $exclude
 * @return array|null
 */
function getChatActions(array $exclude = []): array {
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

/**
 * Use this helper function to get all Update types.
 *
 * @param array $exclude
 * @return array|null
 */
function getUpdateTypes(array $exclude = []): array {
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

/**
 * Use this helper function to get all Message types.
 *
 * @param array $exclude
 * @return array|null
 */
function getMessageTypes(array $exclude = []): array {
    return array_diff([
        MESSAGE_TYPE_TEXT,
        MESSAGE_TYPE_STICKER,
        MESSAGE_TYPE_STORY,
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

/**
 * Use this helper function to get all Message types that are of type files.
 *
 * @param array $exclude
 * @return array|null
 */
function getMessageFileTypes(array $exclude = []): ?array {
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

/**
 * Use this helper to send any files. This is NOT api method.
 * 
 * Alternative to methods:
 * - sendDocument
 * - sendAudio
 * - sendPhoto
 * - sendVideo
 * - sendAnimation
 * - sendVoice
 * - sendVideoNote
 * - sendSticker
 *
 * @param null|CURLFile|string|null $document
 * @param null|CURLFile|string|null $audio
 * @param null|CURLFile|string|null $photo
 * @param null|CURLFile|string|null $video
 * @param null|CURLFile|string|null $animation
 * @param null|CURLFile|string|null $voice
 * @param null|CURLFile|string|null $video_note
 * @param null|CURLFile|string|null $sticker
 * @param null|integer|string|null $chat_id
 * @param integer|null $message_thread_id
 * @param string|null $caption
 * @param array|null $caption_entities
 * @param string|null $parse_mode
 * @param boolean|null $disable_notification
 * @param boolean|null $protect_content
 * @param integer|null $reply_to_MESSAGE_id
 * @param boolean|null $allow_sending_without_reply
 * @param array|null $reply_markup
 * @param null|CURLFile|string|null $thumbnail
 * @param boolean|null $disable_content_type_detection
 * @param integer|null $duration
 * @param string|null $performer
 * @param string|null $title
 * @param integer|null $width
 * @param integer|null $height
 * @param boolean|null $supports_streaming
 * @param integer|null $length
 * @param string|null $emoji
 * @param array|null $_options
 * @return array
 */
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
    ?int $reply_to_MESSAGE_id = null,
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
    $parameters = array_clean_nulls(get_defined_vars());
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

/**
 * Get the parameters that can be sent as a file.
 *
 * @return array
 */
function getConvertibleApiFileParameters(): array {
    return array_merge([
        PARAM_THUMBNAIL,
        PARAM_CERTIFICATE,
    ], getMessageFileTypes());
}
