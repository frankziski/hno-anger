<?php if ($image = $block->source()->toFile()): ?>
  <?php if ($block->linkfield()->toStructure()->first()): ?>
    <?= setlink($block->linkfield()->toStructure()->first(), 'teaser-link', $block, false); ?>
  <?php elseif($block->showLightbox()->toBool() != false): ?>
    <a href="<?= $image->url() ?>" data-lightbox>
  <?php endif ?>

    <?php snippet('lazyimage', ['image' => $image]) ?>

  <?php if ($block->linkfield()->toStructure()->first() || $block->showLightbox()->toBool() != false): ?>
    </a>
  <?php endif ?>
<?php endif ?>
