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
            'Princess dress','costume dress','girls dress','baby dress'
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
        'title'       => 'Awesome constume cartoon princess dresss store',
        'description' => 'Awesome constume cartoon princess dresss store',
        'site-name'   => 'Clothesmy',
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
        'site'    => 'Clothesmy.com',
        'title'   => 'Awesome constume cartoon princess dresss store',
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
