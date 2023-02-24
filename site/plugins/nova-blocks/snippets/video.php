<?php if ($block->media()->isNotEmpty()): ?>
  <?php if ($video = $block->media()->toFile()): ?>
    <?php 
      $poster = '';
      if($poster = $video->poster()->toFile()) {
        $poster = ' poster="'.$poster->url().'"';
      }
    ?>
    <div class="ratio ratio-16x9 video-wrapper">
      <video id="video-<?= $block->id()?>" class="video"<?php e($video->autoplay()->bool(), ' autoplay', '') ?> <?php e($video->controls()->bool(), ' controls controlsList="nodownload"', '') ?> <?php e($video->loop()->bool(), ' loop', '') ?> <?php e($video->muted()->bool(), ' muted', '') ?> <?php e($video->playsinline()->bool(), ' playsinline', '') ?><?= $poster ?> onplay="videoOnPlay('<?= $block->id()?>')" onpause="videoOnStop('<?= $block->id()?>')" onended="videoOnStop('<?= $block->id()?>')">
        <source src="<?= $video->url() ?>" type="<?php if ($video->extension() === 'mp4'): ?>video/mp4<?php elseif ($video->extension() === 'ogg'): ?>video/ogg<?php elseif ($video->extension() === 'webm'): ?>video/webm<?php endif ?>">
      <p>Leider wird dieses Video von Ihrem Browser nicht unterstützt.</p>
      </video>
      <div id="play-<?= $block->id()?>" class="video-overlay" onclick="playButtonClicked('<?= $block->id()?>')">
          <img class="play-button" src="<?= kirby()->urls()->assets() . '/img/play-button.svg' ?>" alt="Video abspielen" title="Video abspielen" width="80" height="80"> 
      </div>
    </div>
  <?php endif ?>
<?php endif ?>