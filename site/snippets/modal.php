<div class="modal fade" id="<?= $modalName ?>" tabindex="-1" aria-labelledby="<?= $modalName.'-label' ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <?php if($modalTitle!=''): ?>
                    <h5 class="modal-title"><?= $modalTitle->kti() ?></h5>
                <?php endif ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">            
                <div class="modal-text">
                    <?= $modalContent->kt() ?>
                </div>
            </div>
        </div>
    </div>
</div>