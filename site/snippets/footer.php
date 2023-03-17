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

<?php if( $site->showModal()->toBool() === true ): $modalName = 'attention'; ?>
  <div class="modal fade" id="<?= $modalName ?>" tabindex="-1" aria-labelledby="<?= $modalName.'-label' ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <?php if($site->modalTitle()->isNotEmpty()): ?>
                <h5 class="modal-title"><?= kirbytags($site->modalTitle()->inline()) ?></h5>
            <?php endif ?>
          </div>
          <div class="modal-body">            
            <div class="modal-text">
              <?= kirbytags($site->modalText()) ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-style-primary" data-bs-dismiss="modal" aria-label="Verstanden.">Verstanden.</button>
          </div>
        </div>
    </div>
  </div>
<?php endif ?>

</body>
</html>