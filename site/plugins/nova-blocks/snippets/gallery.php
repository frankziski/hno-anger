<?php if ($block->media()->isNotEmpty()): ?>

  <?php

    // Classes

    $class = 'row';

    if ($block->gutter()->bool()) {
      $class = $class . ' gy-5 gx-5';
    } else {
      $class = $class . ' gy-0 gx-0';
    }
  ?>
  <div class="<?= $class; ?>">

    <?php foreach ($block->media()->toFiles() as $mediaFile): ?>

      <?php
        // Classes
        $class = $block->columns() . ' ' . $block->columnsResponsive()->value() . ' align-items-' . $block->mediaPositionVertical() . ' gallery-item';
      ?>
      <div class="<?= $class; ?>">
        <?php $hasLink = false; ?>
        <?php if($block->lightbox()->bool()): $hasLink = true; ?>
          <a href="<?= $mediaFile->url() ?>" data-lightbox>

        <?php elseif ($mediaFile->customlink()->value() === 'page' && $mediaFile->customlinkpage()->isNotEmpty() && $mediaFile->customlinkpage()->toPage()): $hasLink = true; ?>
          <a href="<?= $mediaFile->customlinkpage()->toPage()->url() ?>">

        <?php elseif ($mediaFile->customlink()->value() === 'url' && $mediaFile->customlinkurl()->isNotEmpty()): $hasLink = true; ?>
          <a href="<?= $mediaFile->customlinkurl() ?>" <?php if ($mediaFile->target()->bool()): ?> target="_blank"<?php endif ?>>
        <?php endif ?>

          <?php snippet('lazyimage', ['image' => $mediaFile]) ?>

        <?php if($hasLink == true): ?>
          </a>
        <?php endif ?>
      </div>

    <?php endforeach ?>

  </div>
<?php endif ?>
