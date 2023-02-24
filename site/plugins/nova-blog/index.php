<?php
Kirby::plugin('fz/nova-blog', [
  'blueprints' => [
    //sections
    'sections/blog-section' => __DIR__ . '/blueprints/sections/blog-section.yml',
    //fields
    'fields/blocks-article' => __DIR__ . '/blueprints/fields/blocks-article.yml',
    'fields/blocks-blog' => __DIR__ . '/blueprints/fields/blocks-blog.yml',
    //pages
    'pages/article' => __DIR__ . '/blueprints/pages/article.yml',
    'pages/blog' => __DIR__ . '/blueprints/pages/blog.yml',
    //blocks
    'blocks/tagcloud' => __DIR__ . '/blueprints/blocks/tagcloud.yml',
    'blocks/posts' => __DIR__ . '/blueprints/blocks/posts.yml',
  ],
  'templates' => [
    'article' => __DIR__ . '/templates/article.php',
    'blog' => __DIR__ . '/templates/blog.php',
  ],
  'snippets' => [
    'tags' => __DIR__ . '/snippets/tags.php',
    'article-teaser' => __DIR__ . '/snippets/article-teaser.php',
    'article-list' => __DIR__ . '/snippets/article-list.php',
    //blocks
    'blocks/tagcloud' => __DIR__ . '/snippets/tagcloud.php',
    'blocks/posts' => __DIR__ . '/snippets/posts.php',
  ],
  'translations' => [
    'en' => [
        'posts-from' => 'Posts from: ',
    ],
    'de' => [
        'posts-from' => 'Beiträge von: ',
    ]
  ]
]);