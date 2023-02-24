<?php snippet('header') ?>

  <main class="main-blog">
  
    <?php snippet('defaulthero') ?>

    <section class="layout large">
        <?php 
            $classesContent = 'blog-articles col-12';
            $classesSidebar = 'blog-sidebar col-12 col-md-4 col-xl-3';

            if($page->showSidebar()->toBool() === true) {
                $classesContent = 'blog-articles col-12 col-md-8 col-xl-9';
            }
        ?>
        <div class="container-fluid">
            <div class="row padding">
                <div class="<?= $classesContent ?>">
                    <?php if ($page->hasListedChildren()): ?>
                        <?php
                        $articles = $page->children()->listed();

                        if (param('t')) {
                            $articles = $articles->filterBy('tags', urldecode(param('t')), ',');
                        }

                        if ($page->postsPerPage()->isNotEmpty()) {
                            $articles = $articles->paginate($page->postsPerPage()->toInt());
                        }
                        ?>

                        <?php if (param('t')): ?>
                            <div class="blog-filter">
                                <h4>Filter: <span class="badge"><?= param('t') ?></span></h4>
                                <a href="<?= $page->url() ?>" class="reset-filter" title="<?= t('reset-filter', 'Zurücksetzen') ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="4" y="4" width="16" height="16" rx="2" />
                                    <path d="M10 10l4 4m0 -4l-4 4" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif ?>

                        <?php snippet('article-teaser', ['articles' => $articles, 'page' => $page]) ?>

                        <?php if ($articles->pagination() != null): ?>
                            <?php if ($articles->pagination()->hasPages()): ?>
                                <div class="row">
                                    <div class="col">
                                        <nav class="pagination padding-only-top d-flex justify-content-between">
                                            <?php if ($articles->pagination()->hasPrevPage()): ?>
                                                <a href="<?= $articles->pagination()->prevPageURL() ?>" class="btn btn-style-secondary newer-posts">
                                                <div class="icon left">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M16 7H3.83l5.59-5.59L8 0 0 8l8 8 1.41-1.41L3.83 9H16z" fill="currentColor"></path></svg>
                                                </div>
                                                <?= t('newer-posts', 'Jüngere Beiträge') ?>
                                                </a>
                                            <?php endif ?>

                                            <?php if ($articles->pagination()->hasNextPage()): ?>
                                                <a href="<?= $articles->pagination()->nextPageURL() ?>" class="btn btn-style-secondary older-posts">
                                                <div class="icon left">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M8 0L6.59 1.41 12.17 7H0v2h12.17l-5.58 5.59L8 16l8-8z" fill="currentColor"></path></svg>
                                                </div>
                                                <?= t('older-posts', 'Ältere Beiträge') ?>
                                                </a>
                                            <?php endif ?>
                                        </nav>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col">
                                <?php snippet('alert', ['message' => $page->emptyText()->or('Keine Beiträge gefunden'),'context' => 'negative']); ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <?php if($page->showSidebar()->toBool() === true): ?>
                    <div class="<?= $classesSidebar ?>">
                        <?php 
                        if ($page->sidebarblocks()->toBlocks()->first()) {
                            snippet('blocks', ['blockElement' => $page->sidebarblocks()->toBlocks()]);
                        }
                        ?>
                    </div>
                <?php endif ?>
            </div>        
        </div>        
    </section>

  </main>

<?php snippet('footer') ?>