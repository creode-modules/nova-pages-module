# Module for defining editable pages on Laravel Nova sites.

This module will add the infrastructure for the creation of individual pages and a home page. It will allow page titles, descriptions and permalinks to be set against pages.

## Installation

You can install the package via composer:

```bash
composer require creode/nova-pages
```

This module contains database migrations. You can run the migrations with:
```bash
php artisan migrate
```

## Publishing Views
You can publish the view this module uses to customise the main page template using:

```bash
php artisan vendor:publish --tag="pages-views"
```
