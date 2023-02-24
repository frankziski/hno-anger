<?php if($site->headerShowHomepage()->toBool() == true): ?>
    <li class="nav-item<?php e($site->homePage()->isActive(), ' active') ?>">
        <a class="nav-link<?php e($site->homePage()->isActive(), ' active') ?>" <?php e($site->homePage()->isActive(), 'aria-current="page"') ?> href="<?= $site->homePage()->url() ?>">
            <?= $site->homePage()->title() ?>
        </a>
    </li>
<?php endif ?>

<?php foreach ($site->children()->listed() as $item): ?>
    <li class="nav-item<?php e($item->isActive(), ' active') ?>">
        <a class="nav-link<?php e($item->isActive(), ' active') ?>" <?php e($item->isActive(), 'aria-current="page"') ?> href="<?= $item->url() ?>">
            <?= $item->title() ?>
        </a>
    </li>
<?php endforeach ?>