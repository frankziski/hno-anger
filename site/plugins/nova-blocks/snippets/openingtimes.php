<div class="opening-times-wrapper">
    <?php if ($block->heading()->isNotEmpty()): ?>
    <<?= $level = $block->level()->or('h2') ?> class="title"><?= $block->heading()->kti() ?></<?= $level ?>>
    <?php endif ?>

    <dl class="opening-times <?= $block->orientation()->value() ?>">
        <?php foreach ($block->dlist()->toStructure() as $item): ?>
            <dt><?= $item->dt() ?></dt>
            <dd><?= $item->dd() ?></dd>
        <?php endforeach?>
    </dl>
</div>