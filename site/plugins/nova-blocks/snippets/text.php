<?php if ($block->text()->isNotEmpty()): ?>
  <div class="text-wrapper">
    <?= kirbytags($block->text()) ?>
  </div>
<?php endif ?>