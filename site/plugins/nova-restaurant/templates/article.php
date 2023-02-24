<?php
    $author = $page->author()->toUser();
    $parent = $page->parent();

    if ($author) {
        $avatar = $author->avatar();
    }
?>
<?php snippet('header') ?>

  <main class="main-article">
    <article>
        <div class="container-fluid padding-left padding-right padding-top padding-bottom">
            <div class="row">
                <?php 
                    $classesContent = 'col-12';
                    $classesSidebar = 'col-12 col-md-4 col-xl-3';

                    if($parent->showSidebar()->toBool() === true) {
                        $classesContent = 'col-12 col-md-8 col-xl-9';
                    }
                ?>
                <div class="<?= $classesContent ?>">
                    <header>
                        <h1><?= $page->title() ?></h1>

                        <?php if ($parent->showAuthorSingle()->bool()): ?>
                            <div class="article-date">
                                <?= $page->published()->toDate('%d.%m.%Y') ?>
                            </div>
                        <?php endif ?>
                        
                        <?php if ($parent->showCoverSingle()->bool() && $cover = $page->cover()->toFile()): ?>
                            <div class="cover">
                                <?php snippet('lazyimage', ['image' => $cover, 'nometa' => true]); ?>
                            </div>
                        <?php endif ?>
                        
                        <?= $page->intro() ?>
                    </header>

                    <?php 
                    if ($page->blocks()->toBlocks()->first()) {
                        snippet('blocks', ['blockElement' => $page->blocks()->toBlocks()]);
                    }
                    ?>

                    
                    <footer class="article-meta mb-3 mt-3">
                        <?php if($parent->showTagsSingle()->bool() && $page->tags()->isNotEmpty()): ?>
                            <h5>Tags:</h5>
                            <?php snippet('tags', ['source' => $page->tags()]) ?>
                        <?php endif ?>

                        <?php if($parent->showAuthorSingle()->bool() && $author): ?>
                            <h5><?= t('author', 'Autor') ?></h5>
                            <div class="card article-author">
                                <div class="row g-0">
                                    <?php if($avatar): ?>
                                        <div class="col-md-4">
                                            <?php snippet('lazyimage', ['image' => $avatar, 'alt' => $author->name()]); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="<?php e($avatar, 'col-md-8', 'col-md-12') ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $author->name() ?></h5>
                                            <p class="card-text"><?= $author->description() ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </footer>

                    <?php
                        $related = $page->related()->toPages();
                        if ($related->count() > 0):
                    ?>
                        <h5><?= t('related', 'Verwandte Beiträge') ?></h5>
                        <?php snippet('article-teaser', ['articles' => $related, 'page' => $page->parent()]) ?>
                    <?php endif ?>
                </div>

                <?php if($parent->showSidebar()->toBool() === true): ?>
                    <div class="<?= $classesSidebar ?>">
                        <?php 
                        if ($parent->sidebarblocks()->toBlocks()->first()) {
                            snippet('blocks', ['blockElement' => $parent->sidebarblocks()->toBlocks()]);
                        }
                        ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </article>
  </main>

<?php snippet('footer') ?>