<?php if(isset($articles)): ?>
<div class="row row-cols-1 row-cols-md-2">

  <?php 
    $excerptLength = $page->excerptLength()->or(160)->toInt();

    foreach ($articles as $article):
        $excerpt = '';        

        if($article->intro()->isNotEmpty()) {
            $excerpt = $article->intro()->excerpt($excerptLength);
        } elseif($firstBlock = $article->blocks()->toBlocks()->first()) {
            if ($firstBlock->text()->isNotEmpty()) {
                $excerpt = $firstBlock->text()->excerpt($excerptLength);
            }
        }
  ?>

    <div class="col">
      <div class="card">
        <?php
          $image = null;

          if ($page->showCover()->toBool() === true) {
            if ($cover = $article->cover()->toFile()) {
                    $image = $cover;
            } elseif ($placeholder = $page->placeholderImage()->toFile()) {
                $image = $placeholder;
            }
          }

          if($image != null):
        ?>
          <div class="card-img">
            <a href="<?= $article->url() ?>">
                <?php snippet('lazyimage', ['image' => $image, 'class' => 'teaser-img', 'size' => 'teaser', 'nometa' => true]) ?>
            </a>
          </div>
        <?php endif ?>
        
        <div class="card-body">
            <div class="article-meta">
                <?php if ($page->showAuthor()->toBool() === true): ?>
                    <span class="author">
                        <?php if ($author = $article->author()->toUser()): ?> 
                            <?= $author->name() ?>
                        <?php endif ?>
                    </span>
                <?php endif ?>

                <?php if ($page->showDate()->toBool() === true): ?>
                  <span class="date"><?= $article->published()->toDate('%d.%m.%Y') ?></span>
                <?php endif ?>
            </div>

            <a href="<?= $article->url() ?>" class="article-title">
                <h4><?= $article->title() ?></h4>
            </a>

            <?php if ($page->showTags()->toBool() === true): ?>
                <?php snippet('tags', ['source' => $article->tags()]) ?>
            <?php endif ?>

            <?php if ($excerpt != ''): ?>
                <p class="article-excerpt"><?= $excerpt ?></p>
            <?php endif ?>
          
            <a href="<?= $article->url() ?>" class="btn btn-style-secondary"><?= $page->readMoreText()->or('weiterlesen'); ?></a>
        </div>
      </div>
    </div>

  <?php endforeach ?>

</div>
<?php endif ?>