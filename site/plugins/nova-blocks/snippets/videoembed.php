<?php if ($block->url()->isNotEmpty()): ?>
  <div class="ratio ratio-16x9">
    <?= video($block->url()) ?>
  </div>
<?php endif ?>
