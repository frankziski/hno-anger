<blockquote>
  <h3><?= $block->text()->inline() ?></h3>
  <?php if ($block->citation()->isNotEmpty()): ?>
  <footer>
    <?= $block->citation() ?>
  </footer>
  <?php endif ?>
</blockquote>