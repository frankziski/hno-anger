<div class="hero <?= $block->heroMediaType() ?>">
  <?php if($block->heroMediaType() == 'heroimage'): ?>
      <?php if($image = $block->heroMedia()->toFile()): ?>
        <div class="hero-backdrop">
          <img class="hero-media-img" loading="lazy" src="<?= $image->url() ?>" srcset="<?= $image->srcset() ?>" alt="<?= $image->alt() ?>">
        </div>
      <?php endif ?>
    <?php elseif($block->heroMediaType() == 'herovideo'): ?>
      <?php if($video = $block->heroVideo()->toFile()): ?>
        <div class="hero-backdrop hero-video-backdrop ratio ratio-16x9">
          <?php 
            $poster = '';
            if($poster = $video->poster()->toFile()) {
              $poster = ' poster="'.$poster->url().'"';
            }
          ?>
          <figure class="video-wrapper">
            <video id="video-<?= $block->id()?>" class="video" <?php e($video->autoplay()->bool(), ' autoplay muted', '') ?> <?php e($video->loop()->bool(), ' loop', '') ?> <?php e($video->muted()->bool() && $video->autoplay()->bool() == false, '', ' muted') ?> <?php e($video->playsinline()->bool(), ' playsinline', '') ?><?= $poster ?> onplay="videoOnPlay('<?= $block->id()?>')" onpause="videoOnStop('<?= $block->id()?>')" onended="videoOnStop('<?= $block->id()?>')">
              <source src="<?= $video->url() ?>" type="<?php if ($video->extension() === 'mp4'): ?>video/mp4<?php elseif ($video->extension() === 'ogg'): ?>video/ogg<?php elseif ($video->extension() === 'webm'): ?>video/webm<?php endif ?>">
            <p>Leider wird dieses Video von Ihrem Browser nicht unterstützt.</p>
            </video>
            <div id="play-<?= $block->id()?>" class="video-overlay" onclick="playButtonClicked('<?= $block->id()?>')">
                <img class="play-button" src="<?= kirby()->urls()->assets() . '/img/play-button.svg' ?>" alt="Video abspielen" title="Video abspielen"> 
            </div>
          </figure>
        </div>
      <?php endif ?>
    <?php endif ?>
    
  <div class="hero-content">
    <div class="hero-headline">
      <h1 class="title-<?= $block->level() ?>"><?= $block->heroHeading()->or($block->title()) ?></h1>

      <?php if ($block->heroText()->isNotEmpty()): ?>
        <div class="paragraph"><?= $block->heroText() ?></div>
      <?php endif ?>
    </div>
  </div>
</div>
