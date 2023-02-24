<?php 
  if ($sourcePage = $block->source()->toPage()): 
?>

  <?php

    if ($block->sort()->value() === 'date') {
      $articles = $sourcePage->children()->listed()->sortBy('date', 'desc');
    } elseif ($block->sort()->value() === 'random') {
      $articles = $sourcePage->children()->listed()->shuffle();
    } else {
      $articles = $sourcePage->children()->listed()->flip();
    }

    // If there are tags, compare arrays to filter the result

    if ($block->tags()->isNotEmpty()) {
      $articles = $articles->filterBy('tags', 'in', $block->tags()->split(','), ',');
    }

    $allPosts = $articles->count();

    $articles = $articles->limit($block->numberOfPosts()->toInt());

  ?>

  <?php if($block->heading()->isNotEmpty()): ?>
    <<?= $block->headinglevel()->or('h2') ?>><?= $block->heading() ?></<?= $block->headinglevel()->or('h2') ?>>
  <?php endif ?>

  <?php if ($articles->count() === 0): ?>
    <?php snippet('alert', ['message' => $block->emptyText()->or('Keine Beiträge gefunden'),'context' => 'negative']); ?>
  <?php else: ?>
    <?php 
    if ($block->showAs() == 'teaser') {
      snippet('article-teaser', ['articles' => $articles, 'page' => $sourcePage]);
    } else {
      snippet('article-list', ['articles' => $articles, 'page' => $sourcePage]);
    }
    ?>
  <?php endif ?>

  <?php if($block->visitAll()->bool()): ?>
    <div class="row">
      <div class="col align-content-center padding-top">
        <a class="btn btn-style-secondary" href="<?= $sourcePage->url() ?>">
          <?= $block->visitAllText()->or('Alle') ?>
        </a>          
      </div>
    </div>
  <?php endif ?>

<?php endif ?>
