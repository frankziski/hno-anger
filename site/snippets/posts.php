<?php

  $posts = $page->children()->listed();

  if (param('t')) {
    $posts = $posts->filterBy('tags', urldecode(param('t')), ',');
  }

  if ($page->postsPerPage()->isNotEmpty()) {
    $posts = $posts->paginate(postsPerPage($page->postsPerPage()));
  } else {
    $posts = $posts->paginate(postsPerPage($site));
  }

?>

<?php if (param('t')): ?>
  <div class="row blog-filter">
    <div class="col align-content-center d-flex">
      <h6>Filter: <span class="badge bg-primary"><?= param('t') ?></span></h6>
      <a href="<?= $page->url() ?>" class="reset-filter">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <rect x="4" y="4" width="16" height="16" rx="2" />
        <path d="M10 10l4 4m0 -4l-4 4" />
      </svg>
      </a>
    </div>
  </div>
<?php endif ?>

<?php if ($page->layout()->value() === 'list'): ?>
  <?php snippet('posts-list' . $page->listStyle(), ['posts' => $posts]) ?>
<?php elseif ($page->layout()->value() === 'cards'): ?>
  <?php snippet('posts-cards', ['posts' => $posts]) ?>
<?php endif ?>

<?php if ($posts->pagination()->hasPages()): ?>
  <nav class="pagination padding-top">

    <?php if ($posts->pagination()->hasPrevPage()): ?>
      <a href="<?= $posts->pagination()->prevPageURL() ?>" class="button button-style-secondary float-left">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M16 7H3.83l5.59-5.59L8 0 0 8l8 8 1.41-1.41L3.83 9H16z" fill="currentColor"></path></svg>
      </a>
    <?php endif ?>

    <?php if ($posts->pagination()->hasNextPage()): ?>
      <a href="<?= $posts->pagination()->nextPageURL() ?>" class="button button-style-secondary float-right">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M8 0L6.59 1.41 12.17 7H0v2h12.17l-5.58 5.59L8 16l8-8z" fill="currentColor"></path></svg>
      </a>
    <?php endif ?>

  </nav>
<?php endif ?>
