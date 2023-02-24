<?php if ($source->isNotEmpty()): ?>
<?php 
    $blogUrl = '';

    if($page->template() == 'blog') {
        $blogUrl = $page->url();
    } elseif($page->parent() != null) {
        $blogUrl = $page->parent()->url();
    }

?>
<div class="tags">  
    <?php $tags = $source->split(); sort($tags); foreach ($tags as $tag): ?>

    <a href="<?= url($blogUrl, ['params' => ['t' => urlencode($tag)]]) ?>" class="badge"><?= $tag ?></a>

    <?php endforeach ?>
</div>
<?php endif ?>