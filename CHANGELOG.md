# Changelog

All notable changes to this project will be documented in this file.

## [1.2.4] - 2023-07-18

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
        - `onMessageMessageAutoDeleteTimerChanged(...)`
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