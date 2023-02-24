<?php
Kirby::plugin('fz/nova-restaurant', [
  'blueprints' => [
    //fields
    'fields/blocks-restaurantmenu' => __DIR__ . '/blueprints/fields/blocks-restaurantmenu.yml',
    'fields/layout-restaurantmenu' => __DIR__ . '/blueprints/fields/layout-restaurantmenu.yml',
    //blocks
    'blocks/menusection' => __DIR__ . '/blueprints/blocks/menusection.yml',
    'blocks/tabs' => __DIR__ . '/blueprints/blocks/tabs.yml',
    'blocks/tabcontent' => __DIR__ . '/blueprints/blocks/tabcontent.yml',
    //pages
    'pages/restaurantmenu' => __DIR__ . '/blueprints/pages/restaurantmenu.yml',
  ],
  'snippets' => [
    //blocks
    'blocks/menusection' => __DIR__ . '/snippets/menusection.php',
    'blocks/tabs' => __DIR__ . '/snippets/tabs.php',
  ],
  'translations' => [
    'en' => [
      'restaurant-menu' => 'Menu',
    ],
    'de' => [
      'restaurant-menu' => 'Speisekarte',
    ]
  ]
]);