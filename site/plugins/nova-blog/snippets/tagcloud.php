<?php 
$source = null;

if($page->template() == 'blog') {
    $source = $page;
} elseif($page->parent() != null) {
    $source = $page->parent();
}
if($source != null):
?>
<div class="headline-wrp">
    <h5>Tags:</h5>
</div>

<div class="tags">  
    <?php $tags = $source->blogtags()->split(); sort($tags); foreach ($tags as $tag): ?>

        <a href="<?= url($source->url(), ['params' => ['t' => urlencode($tag)]]) ?>" class="badge"><?= $tag ?></a>

    <?php endforeach ?>
</div>
<?php endif ?>