<?php

  $author = $page->author()->toUser();

  if ($author) {
    $avatar = $author->avatar();
    $socialProfiles = $author->social()->toStructure();
  }

?>
<?php snippet('header') ?>

  <main class="main-post">

    <article class="container-fluid medium padding">
      <div class="row">
        <div class="col align-content-center">
          <h1><?= $page->title() ?></h1>

          <div class="post-meta">
            <?php if ($page->parent()->authorSingle()->bool() && $author && $author->name()->isNotEmpty()): ?>

              <div class="author avatar">
                <?php if ($avatar): ?>
                  <img class="author-avatar" loading="lazy" src="<?= $avatar->resize(56)->url() ?>" srcset="<?= $avatar->srcset([56 => '1x', 112 => '2x']) ?>" height="56" width="56" alt="<?= $author->name() ?>">
                <?php else: ?>
                  <span class="align-center-middle bg-color-gray-dark full-width muted">
                    <svg class="muted" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M8 8c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="currentColor"></path></svg>
                  </span>
                <?php endif ?>

                <span><?= $author->name() ?></span>
              </div>

            <?php endif ?>

            <?php if ($page->parent()->datePublishedSingle()->bool()): ?>
              <span class="date"><?= $page->date()->toDate(dateFormat($site)) ?></span>
            <?php endif ?>
          </div>

          <?php if ($cover = $page->cover()->toFile()): ?>
            <div class="cover">
              <?php snippet('lazyimage', ['image' =>$cover]); ?>
            </div>
          <?php endif ?>

          <?php if ($page->blocks()->toBlocks()->first()): ?>
            <div class="blocks">
              <?php $numBlock = 0; foreach ($page->blocks()->toBlocks() as $block): $numBlock = ++$numBlock; ?>
                <?php    
                    // Classes    
                    $class = 'block block-type-' . $block->type() . ' align-content-' . $block->alignContent()->or('left') . ' align-block-' . $block->alignBlock()->or('center') . ' block-width-' . $block->width();

                    if (($backgroundBlock = $block->background()->toStructure()->first()) && background($backgroundBlock)) {
                      $class = $class . ' ' . background($backgroundBlock);
                    }
                    if ($fontColor = fontColor($block->fontColor()->value())) {
                      $class = $class . $fontColor;
                    }
                  ?>
                  <div class="<?= $class ?>">
                    <?php if ($backgroundBlock && $backgroundBlockSvg && $backgroundBlockSvg->code()->isNotEmpty()): ?>
                      <div class="bg-svg bg-svg-position-<?= $backgroundBlockSvg->positionHorizontal() ?> bg-svg-position-<?= $backgroundBlockSvg->positionVertical() ?>"><?= $backgroundBlockSvg->code() ?></div>
                    <?php endif ?>
                    <?= $block ?>
                  </div>
              <?php endforeach ?>
            </div>
          <?php endif ?>

          <?php snippet('tags', ['source' => $page->tags()]) ?>
        </div>
      </div>
    </article>

    <?php if ($page->parent()->postRelated()->bool() && $page->parent()->children()->listed()->count() > 2): ?>

      <?php snippet('posts-related') ?>

    <?php endif ?>

  </main>

<?php snippet('footer') ?>