# TYPO3 Extension: Default Author

Automatically prefills author and email fields with the currently logged-in backend user's information when creating new records.

## Supported Tables

- `pages` → `author`, `author_email`
- `sys_note` → `author`, `email`
- `tx_news_domain_model_news` → `author`, `author_email` (if EXT:news is installed)

## Installation

```bash
composer require kitzberger/defaultauthor
```

## Requirements

- TYPO3 v13.4+

## How It Works

The extension registers a `FormDataProvider` that runs when the backend form engine initializes a new record. It checks if the current table has author/email fields and prefills them with the backend user's `realName` and `email`.

The user can still modify these values before saving.

## Kudos

This extension is based on the work of:

- Ernesto Baschny (EXT:cron_setdefaultauthor)
- Mike Tölle (EXT:setdefaultauthor)

## License

GPL-3.0-or-later
