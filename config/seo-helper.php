<?php

return [

    /* -----------------------------------------------------------------
     |  Title
     | -----------------------------------------------------------------
     */

    'title' => [
        'default'   => 'Awesome constume cartoon princess dresss store',
        'site-name' => env('APP_NAME', 'Colthesmy.com'),
        'separator' => '-',
        'first'     => true,
        'max'       => 55,
    ],

    /* -----------------------------------------------------------------
     |  Description
     | -----------------------------------------------------------------
     */

    'description' => [
        'default'   => 'Awesome constume cartoon princess dresss store',
        'max'       => 155,
    ],

    /* -----------------------------------------------------------------
     |  Keywords
     | -----------------------------------------------------------------
     */

    'keywords'  => [
        'default'   => [
            //
        ],
    ],

    /* -----------------------------------------------------------------
     |  Miscellaneous
     | -----------------------------------------------------------------
     */

    'misc'      => [
        'canonical' => true,
        'robots'    => env('APP_ENV', 'production') !== 'production', // Tell robots not to index the content if it's not on production
        'default'   => [
            'viewport'  => 'width=device-width, initial-scale=1', // Responsive design thing
            'author'    => '', // https://plus.google.com/[YOUR PERSONAL G+ PROFILE HERE]
            'publisher' => '', // https://plus.google.com/[YOUR PERSONAL G+ PROFILE HERE]
        ],
    ],

    /* -----------------------------------------------------------------
     |  Webmaster Tools
     | -----------------------------------------------------------------
     */

    'webmasters' => [
        'google'    => '',
        'bing'      => '',
        'alexa'     => '',
        'pinterest' => '',
        'yandex'    => '',
    ],

    /* -----------------------------------------------------------------
     |  Open Graph
     | -----------------------------------------------------------------
     */

    'open-graph' => [
        'enabled'     => true,
        'prefix'      => 'og:',
        'type'        => 'website',
        'title'       => 'Default Open Graph title',
        'description' => 'Default Open Graph description',
        'site-name'   => '',
        'properties'  => [
            //
        ],
    ],

    /* -----------------------------------------------------------------
     |  Twitter
     | -----------------------------------------------------------------
     |  Supported card types : 'app', 'gallery', 'photo', 'player', 'product', 'summary', 'summary_large_image'.
     */

    'twitter' => [
        'enabled' => true,
        'prefix'  => 'twitter:',
        'card'    => 'summary',
        'site'    => 'Username',
        'title'   => 'Default Twitter Card title',
        'metas'   => [
            //
        ],
    ],

    /* -----------------------------------------------------------------
     |  Analytics
     | -----------------------------------------------------------------
     */

    'analytics' => [
        'google' => '', // UA-XXXXXXXX-X
    ],

];
