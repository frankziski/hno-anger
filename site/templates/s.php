<?php
  if ($site->postsPerPage()->isNotEmpty()) {
    $postsPerPage = $site->postsPerPage()->toInt();
  } else {
    $postsPerPage = 20;
  }

  $query   = get('q');

  $results = $site->search($query);
  // $results = $site->search($query)->filterBy('template', 'default');
  // $resultsBlog = $site->search($query)->listed()->filterBy('template', 'post');

?>
<?php snippet('header') ?>

<main class="main-search">

<?php snippet('defaulthero') ?>

<div class="search-wrapper container-fluid small">
  <div class="row">
    <div class="col-12">
      <h5><?= $results->count() ?> Ergebniss<?php e($results->count() > 1, 'e', '') ?></h5>

      <form action="<?= ($p = page('s')) ? $p->url() : '' ?>" autocomplete="off" class="search" method="get">
          <div class="form-group">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g transform="translate(861 -434)"><rect width="16" height="16" transform="translate(-861 434)" fill="none"/><path d="M8.14,5.64A3.352,3.352,0,1,1,4.788,2.288,3.352,3.352,0,0,1,8.14,5.64Zm.5,2.84A4.788,4.788,0,1,0,7.628,9.5l3.356,3.356L12,11.836Z" transform="translate(-859 435.148)" fill-rule="evenodd"/></g></svg>
              </span>
              <input id="search" name="q" placeholder="Suchbegriff..." type="search" value="<?= html($query) ?>" required>
              <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g transform="translate(861 -434)"><rect width="16" height="16" transform="translate(-861 434)" fill="rgba(255,255,255,0)"/><g transform="translate(-864 431)"><path d="M12.222.556H-.222A.778.778,0,0,1-1-.222.778.778,0,0,1-.222-1H12.222A.778.778,0,0,1,13-.222.778.778,0,0,1,12.222.556Z" transform="translate(5 11.222)"/><path d="M11.778,18a.778.778,0,0,1-.55-1.328L16.9,11,11.228,5.328a.778.778,0,1,1,1.1-1.1L18.55,10.45a.778.778,0,0,1,0,1.1l-6.222,6.222a.778.778,0,0,1-.55.228Z" transform="translate(-0.778)"/></g></g></svg>
              </button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php if ($results->count()): ?>
  <section id="results-blog" class="results container-fluid small">
    
    <div class="row gy-4">
        <?php foreach ($results as $result): ?>
          <div class="col-12">
            <?php snippet('search-item', ['item' => $result]); ?>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
<?php endif ?>

<?php if (!$results->count()) :?>
  <div class="container-fluid small padding-left-right">
    <div class="row">
      <div class="col">
        <?php snippet('alert', ['message' => 'Zu dem Suchbegriff <strong>' . $query .'</strong> konnten leider keine Inhalte gefunden werden','context' => 'negative']); ?>
      </div>
    </div>
  </div>
<?php endif ?>

</main>

<?php snippet('footer') ?>