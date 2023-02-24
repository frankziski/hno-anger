<div class="blurb">
  <?php if ($block->iconType()->value() === 'image' && ($icon = $block->iconImage()->toFile())): ?>
    <?php snippet('lazyimage', ['image' => $icon, 'size' => 'icon', 'alt' => $block->heading()]) ?>    
  <?php elseif ($block->iconType()->value() === 'svg' && $block->iconSvg()->isNotEmpty()): ?>
    <div class="margin-auto-<?= $block->alignContent() ?>"><?= $block->iconSvg() ?></div>
  <?php endif ?>

  <?php if ($block->heading()->isNotEmpty()): ?>
    <h4><?= $block->heading() ?></h4>
  <?php endif ?>

  <?php if ($block->text()->isNotEmpty()): ?>
    <div class="paragraph">
      <?= $block->text() ?>
    </div>
  <?php endif ?>
</div>