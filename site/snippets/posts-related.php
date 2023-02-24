<?php
    $posts = $page->parent()->children()->listed()->not($page);
    $posts = $posts->template($page->template())->shuffle()->limit(3);
?>
<section id="related" class="container-fluid large padding bg-color-light">

  <?php if ($page->parent()->postRelatedTitle()->isNotEmpty()): ?>
    <div class="row">
      <div class="col-12 align-content-center">
        <h3><?= $page->parent()->postRelatedTitle() ?></h3>
      </div>
    </div>
  <?php endif ?>

  <div class="row related-posts">

    <?php snippet('posts-teaser', ['page' => $page->parent(), 'posts' => $posts]) ?>

  </div>

  <div class="row">
    <div class="col-12 align-content-center padding-only-top">
        <a href="<?= $page->parent()->url() ?>" class="btn btn-style-primary">< <?= $page->parent()->title() ?></a>
      </div>
    </div>
  </div>

</section>
