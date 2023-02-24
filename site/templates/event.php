<?php

  $author = $page->author()->toUser();

  if ($author) {
    $avatar = $author->avatar();
    $socialProfiles = $author->social()->toStructure();
  }

?>
<?php snippet('header') ?>

  <main class="main-post">

    <article class="container-fluid medium padding">
      <div class="row">
        <div class="col align-content-center">
          <h1><?= $page->title() ?></h1>
          <div class="event-meta">
            <?php 
              $eDate = '';
              $eTime = '';

              if ($page->eventdate()->isNotEmpty()) {
                $eDate = $page->eventdate()->toDate(dateFormat($site));

                if ($page->eventdateend()->isNotEmpty()) {
                  $eDate = $eDate . ' - ' . $page->eventdateend()->toDate(dateFormat($site));
                }
              }

              if ($page->eventstart()->isNotEmpty()) {
                $eTime = $page->eventstart()->toDate('H:i');

                if ($page->eventend()->isNotEmpty()) {
                  $eTime = $eTime . ' - ' . $page->eventend()->toDate('H:i');
                }
              }

              if($eDate != ''):
            ?>
              <span class="event-date"><?= $eDate ?></span>
            <?php endif ?>

            <?php if($eTime != ''): ?>
              <span class="divider">|</span>
              <span class="event-time"><?= $eTime ?></span>
            <?php endif ?>
          </div>

          <?php if($page->allowRegistration()->bool()): ?>
            <?php if($page->showTicketAmmount()->bool() && $page->availableTickets()->value() > -1): ?>
              <span class="available-tickets"><?= $page->showTicketAmmountTitle()->or('Verfügbar').': '.$page->availableTickets()->value() ?></span>
            <?php endif ?>
            <a href="#event-registration" class="btn btn-large btn-style-primary">Zur Anmeldung</a>
          <?php endif ?>

          <?php if ($cover = $page->cover()->toFile()): ?>
            <div class="cover">
              <?php snippet('lazyimage', ['image' =>$cover]); ?>
            </div>
          <?php endif ?>

          <?php if ($page->blocks()->toBlocks()->first()): ?>
            <div class="blocks">
              <?php $numBlock = 0; foreach ($page->blocks()->toBlocks() as $block): $numBlock = ++$numBlock; ?>
                <?php    
                  // Classes    
                  $class = 'block block-type-' . $block->type() . ' align-content-' . $block->alignContent()->or('left') . ' align-block-' . $block->alignBlock()->or('center') . ' block-width-' . $block->width(). backgroundClass($block);

                  if ($fontColor = fontColor($block->fontColor()->value())) {
                    $class = $class . $fontColor;
                  }

                  $style= backgroundImage($block);
                ?>
                    <?= $block ?>
                </div>
              <?php endforeach ?>
            </div>
          <?php endif ?>

          <?php snippet('tags', ['source' => $page->tags()]) ?>
        </div>
      </div>
    </article>

    <?php if($page->allowRegistration()->bool()): ?>
      <div class="container-fluid medium padding">
        <div class="row">
          <div class="col align-content-<?= $page->parent()->postTitleAlign() ?>">
            <?php if($page->availableTickets()->value() > 0 || $page->availableTickets()->value() == -1): ?>
              <?php snippet('form', ['contentPage' => $page->parent(), 'formID' => 'event-registration']); ?>
            <?php else: ?>
              <div id="event-registration">
                <?php if ($page->parent()->heading()->isNotEmpty()): ?>
                  <h3 class="title-<?= $page->parent()->fontSize() ?>"><?= $page->parent()->heading() ?></h3>
                <?php endif ?>
                <?= $page->parent()->eventNoTicketsTitle()->or('Leider ausverkauft!') ?>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    <?php endif ?>

    <?php if ($page->parent()->postRelated()->bool() && $page->parent()->children()->listed()->count() > 2): ?>

      <?php snippet('posts-related') ?>

    <?php endif ?>

  </main>

<?php snippet('footer') ?>