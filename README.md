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

You can publish the config file with:

```bash
php artisan vendor:publish --tag="pages-config"
```

## Extension

As previously stated, this module will not define any format of page content. However it does contain the infrastructure for defining content blocks with minimal code. To define a new content block you will need to define an extension of the Modules\Pages\app\Abstracts\PageBlockAbstract class. Your new class should then be instantiated within the boot method of a service provider.

As part of your new class, you must define a "$label" string property. This will be the human readable representation of your new content block. You must define a "$name" string property. This will be how Laravel will reference your content block. You must define a "$view" string property. This should reference a view file containing markup and/or template logic for rendering your block on front-end pages. You must define a "fields" method. This should return an array of Laravel Nova field objects.
