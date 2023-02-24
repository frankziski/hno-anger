<?php if ($block->svgcode()->isNotEmpty()): ?>
  <?php if ($block->linkfield()->toStructure()->first()): ?>
    <?= setlink($block->linkfield()->toStructure()->first(), 'icon-link', $block, false); ?>
  <?php endif ?>

    <div class="icon">
      <?= $block->svgcode() ?>
    </div>

  <?php if ($block->linkfield()->toStructure()->first()): ?>
    </a>
  <?php endif ?>
<?php endif ?>