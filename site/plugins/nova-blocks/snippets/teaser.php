<?php if ($block->text()->isNotEmpty()): ?>
  <?php if ($block->linkfield()->toStructure()->first()): ?>
    <?= setlink($block->linkfield()->toStructure()->first(), 'teaser-link', $block, false); ?>
  <?php endif ?>

    <div class="teaser-wrapper">
      <?php if ($block->image()->isNotEmpty()):
        $image = $block->image()->toFile();
      ?>
        <?php snippet('lazyimage', ['image' => $image, 'size' => 'teaser']) ?>
      <?php endif ?>

      <div class="teaser-text">
        <h5 class="teaser-title"><?= $block->heading()->kti() ?></h5>
        <?= $block->text() ?>
        
        <?php 
        if ($link = $block->linkfield()->toStructure()->first()): 
          if($link->style()->isNotEmpty()) {
            $class = 'btn btn-style-'.$link->style();
          } else {
            $class = 'btn btn-style-secondary';
          }
        ?>
          <button class="<?= $class ?>"><?= $link->linkTitle()->kti()->or('mehr') ?></button>
        <?php endif ?>
      </div>
    </div>

  <?php if ($block->linkfield()->toStructure()->first()): ?>
    </a>
  <?php endif ?>
<?php endif ?>