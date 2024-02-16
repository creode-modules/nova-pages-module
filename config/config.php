<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Excluded Blocks
    |--------------------------------------------------------------------------
    |
    | Array of block names to be excluded from the page builder field.
    |
    */

    'excluded_blocks' => [],

    /*
    |--------------------------------------------------------------------------
    | Pages Model
    |--------------------------------------------------------------------------
    |
    | This is the model which will be used when interacting with pages.
    |
    */

    'pages_model' => \Modules\Pages\app\Models\Page::class,

    /*
    |--------------------------------------------------------------------------
    | Traffic Cop
    |--------------------------------------------------------------------------
    |
    | Indicates whether Nova should check for modifications between viewing
    | and updating a resource.
    |
    */
    
    'traffic_cop' => true,
];
