# Module for defining editable pages on Laravel Nova sites.

This module will add the infrastructure for the creation of individual pages and a home page. It will allow page titles, descriptions and permalinks to be set against pages. However this module in isolation will not define any content block types, these must be supplied by other modules or core application code.

## Requirements

This module requires a base view file for page rendering. This will usually be part of the core application code but could be provided by another module. This will usually include html, head and body tags. This should also include global elements such as headers and footers. This file should also yield a section where page content should be rendered. The name of this file and the name of the content section can be configured.

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
