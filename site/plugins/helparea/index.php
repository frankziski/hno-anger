<?php

function getContent() {
  return Data::read(__DIR__ . '//' . t('contentfile'));
}

function getBasepath() {
  return Url::home();
}

Kirby::plugin('fz/helparea', [
  'translations' => [
      'en' => [
          'helptitle' => 'Help Area',
          'contentfile' => 'content_en.json'
      ],
      'de' => [
          'helptitle' => 'Hilfebereich',
          'contentfile' => 'content_de.json'
      ]
  ],
  'areas' => [
    'helparea' => function ($kirby) {
      return [
        'label' => t('helptitle'),
        'icon'  => 'question',
        'menu'  => true,
        'link'  => 'help',
        'views' => [
          [
            'pattern' => 'help',
            'action'  => function () {
              return [
                  'component' => 'helparea',
                  'title' => t('helptitle'),

                  'props' => [
                    'helpcontent' => getContent(),
                    'title'    => t('helptitle'),
                    'size'    => 'small',
                    'layout'  => 'cards',
                    'url'  => getBasepath(),
                  ],
              ];
            }
          ]
        ]
      ];
    }
  ],
]);