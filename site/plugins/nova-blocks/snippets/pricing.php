<?php if ($block->iconType()->value() === 'image' && ($icon = $block->iconImage()->toFile())): ?>
  <img class="space-bottom-1x" loading="lazy" src="<?= $icon->resize(72)->url() ?>" srcset="<?= $icon->srcset([72 => '1x', 144 => '2x']) ?>" sizes="<?php snippet('srcset-sizes-thumb') ?>" alt="<?= $block->heading() ?>">
<?php elseif ($block->iconType()->value() === 'svg' && $block->iconSvg()->isNotEmpty()): ?>
  <div class="margin-auto-<?= $block->alignContent() ?> space-bottom-1x"><?= $block->iconSvg() ?></div>
<?php endif ?>

<?php if ($block->heading()->isNotEmpty()): ?>
  <h3 class="title-h6"><?= $block->heading() ?></h3>
<?php endif ?>

<?php if ($block->price()->isNotEmpty()): ?>
  <div class="title-h3 space-bottom-1x">
    <span class="pricing-price"><?= $block->price() ?></span>

    <?php if ($block->priceDetails()->isNotEmpty()): ?>
      <span class="font-size-lg muted"><?= $block->priceDetails() ?></span>
    <?php endif ?>

  </div>
<?php endif ?>

<?php if ($block->text()->isNotEmpty()): ?>

  <?php

    $class = 'paragraph';

    if ($block->features()->isNotEmpty()) {
      $class = $class . ' space-bottom-1x';
    } else {
      $class = $class . ' space-bottom-15x';
    }
  ?>
  <div class="<?php echo $class; ?>">
    <?= $block->text() ?>
  </div>
<?php endif ?>

<?php if ($block->features()->isNotEmpty()): ?>
  <div class="paragraph space-bottom-15x">
    <?= $block->features() ?>
  </div>
<?php endif ?>

<?php if ($block->linkfield()->toStructure()->first()): ?>
    <?= setlink($block->linkfield()->toStructure()->first(), 'btn btn-style-primary', $block, true); ?>
  <?php endif ?>
