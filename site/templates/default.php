<?php snippet('header') ?>

  <main class="main-<?= $page->slug() ?>">

    <?php snippet('layout', ['page' => $page->blocks()]) ?>

  </main>

<?php snippet('footer') ?>