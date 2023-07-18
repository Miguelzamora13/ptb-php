# Changelog

All notable changes to this project will be documented in this file.

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
