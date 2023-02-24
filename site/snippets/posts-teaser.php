<?php if(isset($posts)): ?>
<div class="row g-5 row-cols-1 row-cols-md-2 row-cols-xxl-3">

  <?php 
    $excerptLength = $page->excerptLength()->or(160)->toInt();

    foreach ($posts as $post):
        $excerpt = '';        

        if($post->intro()->isNotEmpty()) {
            $excerpt = $post->intro()->excerpt($excerptLength);
        } elseif($blockFirst = $post->blocks()->toBlocks()->first()) {
            if ($blockFirst->text()->isNotEmpty()) {
                $excerpt = $blockFirst->text()->excerpt($excerptLength);
            }
        }
  ?>

    <div class="col">
      <div class="card">
        <?php
          if ($cover = $post->cover()->toFile()) {
            	$image = $cover;
          } elseif ($placeholder = $site->placeholderImage()->toFile()) {
            $image = $placeholder;
          }

          if($image):
        ?>
          <div class="card-img">
            <a href="<?= $post->url() ?>">
                <?php snippet('lazyimage', ['image' => $image, 'class' => 'teaser-img', 'size' => 'teaser']) ?>
            </a>
          </div>
        <?php endif ?>
        
        <div class="card-body">
            <div class="post-meta">
                <?php if ($page->author()->bool()): ?>
                    <span class="author">
                        <?php if (($author = $post->author()->toUser()) && $author->name()->isNotEmpty()): ?> 
                            <?= $author->name() ?>
                        <?php endif ?>
                    </span>
                <?php endif ?>
                <?php if ($page->datePublished()->bool()): ?>
                  <?php 
                    $date = $post->date()->toDate(dateFormat($site));

                    if($post->template() == 'event') {
                      $eDate = '';

                      if ($post->eventdate()->isNotEmpty()) {
                        $eDate = $post->eventdate()->toDate(dateFormat($site));
        
                        if ($post->eventdateend()->isNotEmpty()) {
                          $eDate = $eDate . ' - ' . $post->eventdateend()->toDate(dateFormat($site));
                        }
                      }
                      $date = $eDate;
                    }  
                  ?>
                  <span class="date"><?= $date ?></span>
                <?php endif ?>
            </div>

          <a href="<?= $post->url() ?>" class="post-title">
            <h4><?= $post->title() ?></h4>
          </a>

          <?php if ($page->showTags()->bool()): ?>
            <?php snippet('tags', ['source' => $post->tags()]) ?>
          <?php endif ?>

          <?php if ($excerpt != ''): ?>
            <p class="post-excerpt"><?= $excerpt ?></p>
          <?php endif ?>

          <?php if($page->readmore()->bool()): ?>
            <a href="<?= $post->url() ?>" class="btn btn-style-secondary"><?php e($page->readMoreText()->isNotEmpty(), $page->readMoreText(), 'mehr'); ?></a>
          <?php endif ?>
        </div>
      </div>
    </div>

  <?php endforeach ?>

</div>
<?php endif ?>