  <footer class="site-footer">
    <?php snippet('layout', ['page' => $site->blocks()]) ?>
  </footer>
  
<?= js('assets/js/bootstrap.bundle.min.js?ver=5.1.0', ['async' => true, 'defer' => true]) ?>
<?= js('assets/js/lightbox.js?ver=1.0', ['async' => true, 'defer' => true]) ?>
<?php $ver = filemtime('assets/js/main.min.js'); echo js('assets/js/main.min.js?ver=' . $ver . '',['async' => true, 'defer' => true]); ?>

<?php if ($site->codeFooter()->isNotEmpty()): ?>
<?= $site->codeFooter() ?>
<?php endif ?>
<?php if ($page->codeFooter()->isNotEmpty()): ?>
<?= $page->codeFooter() ?>
<?php endif ?>
<?php if ($page->parents()->count() && $page->parent()->codeFooter()->isNotEmpty()): ?>
<?= $page->parent()->codeFooter() ?>
<?php endif ?>

</body>
</html>