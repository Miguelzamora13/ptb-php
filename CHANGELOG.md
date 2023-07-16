# Changelog

All notable changes to this project will be documented in this file.

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
