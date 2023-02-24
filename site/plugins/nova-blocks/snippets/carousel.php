<?= css('/media/plugins/fz/nova-blocks/flickity.min.css?ver=2.2', 'screen') ?>
<?= js('/media/plugins/fz/nova-blocks/flickity.pkgd.min.js?ver=2.2') ?>
<?= js('/media/plugins/fz/nova-blocks/fullscreen.min.js?ver=1.1.1') ?>

<?php if ($block->images()->isNotEmpty()): ?>

<?php

  $id = 'carousel1';
  if($block->carouselID()->isNotEmpty()){
    $id = $block->sliderID();
  }

  $pImage = '';

  if($image = $block->placeholderImage()->toFile()) {
      $pImage = $image->url();
  } elseif($image = $site->cover()->toFile()) {
    $pImage = $image->url();
  }

  // Slider options

  $options = '"wrapAround": true, "adaptiveHeight": true, "setGallerySize": true, "lazyLoad": true';

  if ($block->groupCells()->bool()) {
    $options = $options . ', "groupCells": 2';
  } 
  if ($block->fullscreen()->bool()) {
    $options = $options . ', "fullscreen": true';
  } 
  if ($block->autoPlay()->bool()) {
    $options = $options . ', "autoPlay": '.$block->autoPlayTime()->toInt();
  } 
  if ($block->controls()->bool() === false) {
    $options = $options . ', "prevNextButtons": false';
  } 
  if ($block->indicators()->bool() === false) {
    $options = $options . ', "pageDots": false';
  } 

?>

<div id="<?= $id ?>" class="carousel"  data-flickity='{<?= $options ?>}'>
    <?php foreach ($block->images()->toFiles() as $sliderMediaFile): ?>

    <div class="carousel-cell">
      <?php if ($sliderMediaFile->type() === 'image'): ?>
        <img src="<?= $pImage ?>" data-flickity-lazyload-srcset="<?= $sliderMediaFile->srcset() ?>" alt="<?= $sliderMediaFile->alt() ?>" width="<?= $sliderMediaFile->width() ?>" height="<?= $sliderMediaFile->height() ?>">
      <?php elseif ($sliderMediaFile->type() === 'video'): ?>
        <video <?php if ($sliderMediaFile->autoplay()->bool()): ?> autoplay<?php endif ?><?php if ($sliderMediaFile->controls()->bool()): ?> controls<?php endif ?><?php if ($sliderMediaFile->loop()->bool()): ?> loop<?php endif ?><?php if ($sliderMediaFile->muted()->bool()): ?> muted<?php endif ?><?php if ($sliderMediaFile->playsinline()->bool()): ?> playsinline<?php endif ?>>
            <source src="<?= $sliderMediaFile->url() ?>" type="<?php if ($sliderMediaFile->extension() === 'mp4'): ?>video/mp4<?php elseif ($sliderMediaFile->extension() === 'ogg'): ?>video/ogg<?php elseif ($sliderMediaFile->extension() === 'webm'): ?>video/webm<?php endif ?>">
            <p>Your browser does not support the video element.</p>
        </video>
      <?php endif ?>

      <?php if($block->caption()->bool() && $sliderMediaFile->caption()->isNotEmpty()):?>
        <div class="carousel-cell-caption">
          <?= $sliderMediaFile->caption() ?>
        </div>
      <?php endif ?>
    </div>
    <?php endforeach ?>
  </div>
</div>

<?php endif ?>