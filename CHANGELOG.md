# Changelog

All notable changes to this project will be documented in this file.

## [1.2.6] - 2023-07-20

### Added

...

### Changed
- Remove unnecessary parameter `$from_message` from the poll related helper functions `_poll(...)`, `_isPoll(...)`, etc
- Code Improvements (in the `_poll(...)` function)

### Fixed

...



## [1.2.5] - 2023-07-20

### Added
- Added mroe helpers (Check out the diff from commits)
    - `_chatJoinRequest()`
    - `_pinnedMessage()`
    - `_senderChat()`
    - `_authorSignature()`
    - `_date()`
    - `_chatTitle()`
    - `_pollQuestion()`
    - `_pollType()`
    - `_pollId()`
    - `_animationFileName()`
    - `_animationMimeType()`
    - `_animationDuration()`
    - `_animationWidth()`
    - `_animationHeight()`
    - `_animationThumb()`
    - `_gameTitle()`
    - `_gameDescription()`
    - `_forumTopicCreated()`
    - `_forumTopicEdited()`
    - `_forumTopicClosed()`
    - `_forumTopicReopened()`
    - `_messageThreadId()`
    - `_userFirstName()`
    - `_userUsername()`
    - `_chatShared()`
    - `_userShared()`
    - `_connectedWebsite()`
    - `_writeAccessAllowed()`
    - `_passportData()`
    - `_proximityAlertTriggered()`
    - `_generalForumTopicHidden()`
    - `_generalForumTopicUnhidden()`
    - `_videoChatScheduled()`
    - `_videoChatStarted()`
    - `_videoChatEnded()`
    - `_videoChatParticipantsInvited()`
    - `_webAppData()`
    - `_replyMarkupInlineKeyboard()`
    - `_isMessageNewChatMembers()`
    - `_isMessageLeftChatMember()`
    - `_isMessageNewChatTitle()`
    - `_isMessageNewChatPhoto()`
    - `_isMessageDeleteChatPhoto()`
    - `_isMessageGroupChatCreated()`
    - `_isMessageSupergroupChatCreated()`
    - `_isMessageChannelChatCreated()`
    - `_isMessageAutoDeleteTimerChanged()`
    - `_isMessageMigrateToChatId()`
    - `_isMessageMigrateFromChatId()`
    - `_isMessagePinnedMessage()`
    - `_isMessageInvoice()`
    - `_isMessageSuccessfulPayment()`
    - `_isMessageUserShared()`
    - `_isMessageChatShared()`
    - `_isMessageConnectedWebsite()`
    - `_isMessageWriteAccessAllowed()`
    - `_isMessagePassportData()`
    - `_isMessageProximityAlertTriggered()`
    - `_isMessageForumTopicCreated()`
    - `_isMessageForumTopicEdited()`
    - `_isMessageForumTopicClosed()`
    - `_isMessageForumTopicReopened()`
    - `_isMessageGeneralForumTopicHidden()`
    - `_isMessageGeneralForumTopicUnhidden()`
    - `_isMessageVideoChatScheduled()`
    - `_isMessageVideoChatStarted()`
    - `_isMessageVideoChatEnded()`
    - `_isMessageVideoChatParticipantsInvited()`
    - `_isMessageWebAppData()`
    - `_isPollAnonymous()`
    - `_isPollClosed()`
    - `_isTopicMessage()`
    - `_isBot()`
    - `_isForum()`
- Added new constant named `FIELD_THUMB`
- Added one parameter named `$from_message` to the `_isPoll(...)` helper (and other related helpers) to separate the result (get poll from `UPDATE->poll` OR get the poll from `UPDATE->message->poll`)

### Changed
- Changed the name of the function `_repliedMessage(...)` to `_replyToMessage()`
- Removed unnecessary separators`#~~~ ... ~~~#` to reduce the source size


### Fixed

- Code improvements


## [1.2.4] - 2023-07-19

### Added

- Added more handlesrs
    - `message` update type:
        - `onMessageNewChatMembers(...)`
        - `onMessageLeftChatMember(...)`
        - `onMessageNewChatTitle(...)`
        - `onMessageNewChatPhoto(...)`
        - `onMessageDeleteChatPhoto(...)`
        - `onMessageGroupChatCreated(...)`
        - `onMessageSupergroupChatCreated(...)`
        - `onMessageChannelChatCreated(...)`
        - `onMessageAutoDeleteTimerChanged(...)`
        - `onMessageMigrateToChatId(...)`
        - `onMessageMigrateFromChatId(...)`
        - `onMessagePinnedMessage(...)`
        - `onMessageInvoice(...)`
        - `onMessageSuccessfulPayment(...)`
        - `onMessageUserShared(...)`
        - `onMessageChatShared(...)`
        - `onMessageConnectedWebsite(...)`
        - `onMessageWriteAccessAllowed(...)`
        - `onMessagePassportData(...)`
        - `onMessageProximityAlertTriggered(...)`
        - `onMessageForumTopicCreated(...)`
        - `onMessageForumTopicEdited(...)`
        - `onMessageForumTopicClosed(...)`
        - `onMessageForumTopicReopened(...)`
        - `onMessageGeneralForumTopicHidden(...)`
        - `onMessageGeneralForumTopicUnhidden(...)`
        - `onMessageVideoChatScheduled(...)`
        - `onMessageVideoChatStarted(...)`
        - `onMessageVideoChatEnded(...)`
        - `onMessageVideoChatParticipantsInvited(...)`
        - `onMessageWebAppData(...)`
    - `channel_post` update type:
        -  `onChannelPostMessageAutoDeleteTimerChanged(...)`
        -  `onChannelPostPinnedMessage(...)`
- Added more helper constants for `MESSAGE_TYPE_*`
    - `MESSAGE_TYPE_NEW_CHAT_MEMBERS`
    - `MESSAGE_TYPE_LEFT_CHAT_MEMBER`
    - `MESSAGE_TYPE_NEW_CHAT_TITLE`
    - `MESSAGE_TYPE_NEW_CHAT_PHOTO`
    - `MESSAGE_TYPE_DELETE_CHAT_PHOTO`
    - `MESSAGE_TYPE_GROUP_CHAT_CREATED`
    - `MESSAGE_TYPE_SUPERGROUP_CHAT_CREATED`
    - `MESSAGE_TYPE_CHANNEL_CHAT_CREATED`
    - `MESSAGE_TYPE_MESSAGE_AUTO_DELETE_TIMER_CHANGED`
    - `MESSAGE_TYPE_MIGRATE_TO_CHAT_ID`
    - `MESSAGE_TYPE_MIGRATE_FROM_CHAT_ID`
    - `MESSAGE_TYPE_PINNED_MESSAGE`
    - `MESSAGE_TYPE_INVOICE`
    - `MESSAGE_TYPE_SUCCESSFUL_PAYMENT`
    - `MESSAGE_TYPE_USER_SHARED`
    - `MESSAGE_TYPE_CHAT_SHARED`
    - `MESSAGE_TYPE_CONNECTED_WEBSITE`
    - `MESSAGE_TYPE_WRITE_ACCESS_ALLOWED`
    - `MESSAGE_TYPE_PASSPORT_DATA`
    - `MESSAGE_TYPE_PROXIMITY_ALERT_TRIGGERED`
    - `MESSAGE_TYPE_FORUM_TOPIC_CREATED`
    - `MESSAGE_TYPE_FORUM_TOPIC_EDITED`
    - `MESSAGE_TYPE_FORUM_TOPIC_CLOSED`
    - `MESSAGE_TYPE_FORUM_TOPIC_REOPENED`
    - `MESSAGE_TYPE_GENERAL_FORUM_TOPIC_HIDDEN`
    - `MESSAGE_TYPE_GENERAL_FORUM_TOPIC_UNHIDDEN`
    - `MESSAGE_TYPE_VIDEO_CHAT_SCHEDULED`
    - `MESSAGE_TYPE_VIDEO_CHAT_STARTED`
    - `MESSAGE_TYPE_VIDEO_CHAT_ENDED`
    - `MESSAGE_TYPE_VIDEO_CHAT_PARTICIPANTS_INVITED`
    - `MESSAGE_TYPE_WEB_APP_DATA`
- Added new curl option `CURLOPT_HTTPHEADER => ['Content-Type: application/json']` to the `__makeApiRequest(...)` function

### Changed

- Changed curl option value `CURLOPT_POSTFIELDS => $parameters` to `CURLOPT_POSTFIELDS => json_encode($parameters)` in the `__makeApiRequest(...)` function
- Removed unnecceary codes from `__autoFillApiMethodParameters(...)`

### Fixed

- Various bug fixes

## [1.2.3] - 2023-07-18

### Added

- Added `__convertToFileCURL(...)` function

### Changed

...

### Fixed

- Various bug fixes (in sending InputFile's)


## [1.2.2] - 2023-07-18

### Added

- Added `InputFile(...)` function

### Changed

...

### Fixed

...


## [1.2.0] - 2023-07-18

### Added

- Added the `FIELD_USER_ID` constant
- Added more common parameters to the `__autoFillApiMethodParameters(...)` function
- Added new function named `__autoFillApiTypeFields(...)` to auto fill common fields
- Added new function named `__prepareApiTypeFields(...)` to prepare type fields

### Changed

- Improved the `__autoFillApiMethodParameters(...)` function
- Improved all the AvailableType related functions (such as `User(...)`, `Chat(...)`, etc)
- Changed version number to 1.2.0 in the main file `PTB.php`

### Fixed

...

## [1.1.9] - 2023-07-18

### Added

- The curl option `CURLOPT_FOLLOWLOCATION => true` added to the `_download(...)` function
- Added `$curl_options` parameter to the `_download(...)` function
- Added forgotten webhook methods: `setWebhook(...)`, `deleteWebhook(...)`, `getWebhookInfo(...)`

### Changed

- The name of the `_downloadFile(...)` function changed to `_download(...)`

### Fixed

...


## [1.1.8] - 2023-07-16

### Added

- New helper constants added: 
    - Added various constants for passport element types (`PASSPORT_ELEMENT_TYPE_*`), passport element errors (`PASSPORT_ELEMENT_ERROR_*`), Google Place types (`GOOGLE_PLACE_TYPE_*`), color RGB values `COLOR_RGB_*`, and color RGB HEX values (`COLOR_RGB_*_HEX`).
  
- All Telegram Bot API [Available types](https://core.telegram.org/bots/api#available-types) are added as functions:

### Changed

- Handler name changed from `onAny(...)` to `onAnyUpdateType(...)`
- All helper functions now prefixed with `_` (underscore)
- All the library's background functions now prefixed with `__` (two underscores)
- All bots in the examples/ folder updated to reflect these changes
- The main README.md file updated to reflect these changes

### Fixed

- Various bug fixes