<?php snippet('header') ?>

  <main class="main-posts">
  
    <?php snippet('defaulthero') ?>

    <?php if ($page->hasListedChildren()): ?>
      <section id="posts-<?= $page->slug() ?>" class="container-fluid medium padding-left-right">    
        <?php
          $posts = $page->children()->listed();

          if (param('t')) {
            $posts = $posts->filterBy('tags', urldecode(param('t')), ',');
          }

          if ($page->postsPerPage()->isNotEmpty()) {
            $posts = $posts->paginate(postsPerPage($page->postsPerPage()));
          }
        ?>

        <?php if (param('t')): ?>
          <div class="row blog-filter">
            <div class="col align-content-center d-flex">
              <h6>Filter: <span class="badge"><?= param('t') ?></span></h6>

              <a href="<?= $page->url() ?>" class="reset-filter" title="<?= t('reset-filter', 'Zurücksetzen') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <rect x="4" y="4" width="16" height="16" rx="2" />
                  <path d="M10 10l4 4m0 -4l-4 4" />
                </svg>
              </a>

            </div>
          </div>
        <?php endif ?>

        <?php snippet('posts-teaser', ['posts' => $posts]) ?>
      </section>

      <div class="container-fluid small padding-left-right">
        <div class="row">
          <div class="col">
            <?php if ($posts->pagination() != null): ?>
              <?php if ($posts->pagination()->hasPages()): ?>
                <nav class="pagination padding-only-top d-flex justify-content-between">

                  <?php if ($posts->pagination()->hasPrevPage()): ?>
                    <a href="<?= $posts->pagination()->prevPageURL() ?>" class="btn btn-style-secondary newer-posts">
                      <div class="icon left">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M16 7H3.83l5.59-5.59L8 0 0 8l8 8 1.41-1.41L3.83 9H16z" fill="currentColor"></path></svg>
                      </div>
                      <?= t('newer-posts', 'Ältere Beiträge') ?>
                    </a>
                  <?php endif ?>

                  <?php if ($posts->pagination()->hasNextPage()): ?>
                    <a href="<?= $posts->pagination()->nextPageURL() ?>" class="btn btn-style-secondary older-posts">
                      <div class="icon left">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><path d="M8 0L6.59 1.41 12.17 7H0v2h12.17l-5.58 5.59L8 16l8-8z" fill="currentColor"></path></svg>
                      </div>
                      <?= t('older-posts', 'Neuere Beiträge') ?>
                    </a>
                  <?php endif ?>

                </nav>
              <?php endif ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    <?php else: ?>

      <div class="container-fluid small padding-left-right">
        <div class="row">
          <div class="col">
            <?php snippet('alert', ['message' => $page->emptyText()->or('Keine Beiträge gefunden'),'context' => 'negative']); ?>
          </div>
        </div>
      </div>

    <?php endif ?>

  </main>

<?php snippet('footer') ?>