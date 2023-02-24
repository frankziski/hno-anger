<?php if(isset($item)): ?>
<div class="search-item row">
    <div class="item-text col-12 col-md-8">
        <a href="<?= $item->url() ?>" class="item-title">
        <h2><?= $item->title() ?></h2>
        </a>

        <?php if ($item->intro()->isNotEmpty()): ?>
            <p class="excerpt"><?= $item->intro()->excerpt(160) ?></p>        
        <?php elseif ($item->description()->isNotEmpty()): ?>
            <p class="excerpt"><?= $item->description()->excerpt(160) ?></p>
        <?php endif ?>

        <span class="meta muted date"><?= $item->date()->toDate(dateFormat($site)) ?></span>
    </div>

    <?php
        if ($cover = $item->cover()->toFile()) {
            $image = $cover->resize(720);
        } elseif ($cover = $site->placeholderImage()->toFile()) {
            $image = $cover;
        }

        if($image):
    ?>
        <div class="item-img col-12 col-md-4">
        <a href="<?= $item->url() ?>">
            <?php snippet('lazyimage', ['image' => $image]) ?>
        </a>
        </div>
    <?php endif ?>
</div>
<?php endif ?>