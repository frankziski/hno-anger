<?php 
    $id = $block->tabsID()->or('tabs0');
?>


<div class="list-group list-group-horizontal" id="<?= $id ?>" role="tablist">
    <?php $i = 1; foreach($block->tabs()->toBlocks() as $tab): ?>
        <a class="list-group-item list-group-item-action<?php e($i==1, ' active', '') ?>" id="<?= $id.'-'.$i.'-list'; ?>" data-bs-toggle="list" href="#<?= $id.'-'.$i; ?>" role="tab" aria-controls="<?= $id.'-'.$i; ?>">
            <?= $tab->tabTitle()->or('Tab '.$i) ?>
        </a>
    <?php $i++; endforeach ?>
</div>

<div class="tab-content" id="nav-<?= $id ?>">
    <?php $i = 1; foreach($block->tabs()->toBlocks() as $tab): ?>
        <div class="tab-pane fade<?php e($i==1, ' show active', '') ?>" id="<?= $id.'-'.$i; ?>" role="tabpanel" aria-labelledby="<?= $id.'-'.$i.'-list'; ?>">
            <?php 
            if ($tab->tabContent()->toBlocks()->first()) {
                snippet('blocks', ['blockElement' => $tab->tabContent()->toBlocks()]);
            }
            ?>
        </div>
    <?php $i++; endforeach ?>
</div>