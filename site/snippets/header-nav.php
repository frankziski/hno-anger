<?php
  $buttons = $site->headerButtons()->toStructure();
  $heroBackground = $page->heroBackground()->toStructure()->first();
?>
<?php
  $class = 'header-main';
?>
<header class="<?= $class; ?>">
  <nav id="navbar" class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <?php if ($site->logoType()->value() !== 'none'): ?>
        <a href="<?= $site->url() ?>" class="navbar-brand" rel="home" title="<?= $site->title() . ' - Home'?>">
          <?php if ($site->logoType()->value() === 'svg' && $site->logoSvg()->isNotEmpty()): ?>
            <div class="svg-logo-holder">
              <?= $site->logoSvg() ?>
            </div>
          <?php elseif ($site->logoType()->value() === 'image' && ($logo = $site->logoImage()->toFile())): ?>
            <img src="<?= $logo->resize(null, 32)->url() ?>" srcset="<?= $logo->srcset(['1x' => ['height' => 32], '2x' => ['height' => 64]]) ?>" alt="<?= $site->title() ?>">
          <?php elseif ($site->logoType()->value() === 'text'): ?>
            <?= $site->title() ?>
          <?php endif ?>
        </a>
      <?php endif ?>

      <ul class="navbar-nav d-none d-lg-flex">
          <?php snippet('navbar-navitems') ?>
      </ul>

      <a href="<?= page('online-terminvergabe')->url() ?>" class="btn btn-style-secondary ml-space-10 btn-appointment">
        <span class="material-icons-outlined icon left">calendar_month</span>
      </a>

      <?php if ($site->headerLanguages()->bool() && $kirby->languages()->count() > 1): ?>
        <ul class="header-languages d-none d-lg-flex">
          <?php $num = 0; foreach($kirby->languages() as $language): ?>
            <?php if ($num == count($kirby->languages()) - 1): ?>
              <li<?php e($kirby->language() == $language, ' class="active"') ?>><a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>"><?= str::ucfirst($language->code()) ?></a></li>
            <?php else: ?>
              <li<?php e($kirby->language() == $language, ' class="active"') ?>><a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>"><?= str::ucfirst($language->code()) ?></a></li>
              <li class="muted"><span>/</span></li>
            <?php endif ?>
          <?php $num++; endforeach ?>
        </ul>
      <?php endif ?>

      <?php if ($site->headerSocial()->bool()): ?>
        <ul class="header-social d-none d-lg-flex">
          <?php foreach ($site->socialProfiles()->toStructure() as $socialProfile): ?>            
            <li class="social-link">
              <a class="icon" href="<?= $socialProfile->socialProfileLink() ?>" target="_blank" title="<?= $socialProfile->socialProfileName()->value() . ' - ' .$site->title() ?>">
                <?= $socialProfile->socialProfileIcon() ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>

      <?php if ($site->headerSearch()->bool()): ?>
        <button class="icon icon-search" title="<?= t('search-title', 'Suche') ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler-search" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
        </button>
      <?php endif ?>

      <?php if ($buttons->isNotEmpty()): ?>
        <div class="header-buttons d-none d-lg-flex">
          <?php foreach ($buttons as $button): ?>
            <?php 
              $class = 'btn btn-style-'.$button->style();
              echo setlink($button, $class, $page);
            ?>
          <?php endforeach ?>

        </div>
      <?php endif ?>

      <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="<?= t('open-menu', 'Menü öffnen') ?>" title="<?= t('open-menu', 'Menü öffnen') ?>">
        <div class="hamburger hamburger--arrowturn" type="button">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </div>
      </button>
    </div>
  </nav>
</header>

<?php snippet('navbar-offcanvas') ?>
