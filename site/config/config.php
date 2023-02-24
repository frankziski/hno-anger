<?php

return [
  'languages' => true,
  'languages.detect' => true,
  'debug' => true,

  'date.handler' => 'strftime',

  'panel' => [
    'css' => 'assets/css/panel.min.css',
    'install' => true
  ],

  'cache' => [
    'pages' => [
        'active' => false,
        'ignore' => function ($page) {
          return $page->title()->value() === 'Do not cache me';
        }
    ]
  ],

  //https://github.com/michnhokn/kirby3-cookie-banner/
  'michnhokn.cookie-banner' => [
    'features' => [
        'analytics' => 'custom.cookie-modal.analytics',
        'iframe' => 'custom.cookie-modal.iframe',
    ]
  ],

  'thumbs' => [
    'srcsets' => [
      'default' => [
        '400w' => ['width' => 400, 'format' => 'webp'],
        '992w' => ['width' => 992, 'format' => 'webp'],
        '1400w' => ['width' => 1400, 'format' => 'webp'],
        '2048w' => ['width' => 2048, 'format' => 'webp']
      ],
      'teaser' => [
        '400w' => ['width' => 400, 'height' => 300, 'crop' => 'center', 'format' => 'webp'],
        '992w' => ['width' => 600, 'height' => 450, 'crop' => 'center', 'format' => 'webp'],
        '1400w' => ['width' => 800, 'height' => 600, 'crop' => 'center', 'format' => 'webp']
      ],
      'icon' => [
        '400w' => ['width' => 80, 'format' => 'webp'],
        '1400w' => ['width' => 256, 'format' => 'webp'],
        '2048w' => ['width' => 512, 'format' => 'webp']
      ]
    ]
  ],

  'email' => [
    'transport' => [
      'type' => 'smtp',
      'host' => 'web.ziski.de',
      'port' => 587,
      'security' => 'tls',
      'auth' => true,
      'username' => 'automailer@ziski.de',
      'password' => '86xFRLZTSm'
    ]
  ],

  'routes' => [
    [
      'pattern' => 'sitemap.xml',
      'action'  => function() {
        $pages = site()->pages()->index();

        // Fetch the pages to ignore
        $ignore = kirby()->option('sitemap.ignore', ['error', 's']);

        $content = snippet('sitemap', compact('pages', 'ignore'), true);

        // Return response with correct header type
        return new Kirby\Cms\Response($content, 'application/xml');
      }
    ],
    [
      'pattern' => 'sitemap',
      'action'  => function() {
        return go('sitemap.xml', 301);
      }
    ]
  ]
];