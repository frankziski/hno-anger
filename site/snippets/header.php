<?php

  $blockFirst = $page->blocks()->toBlocks()->first();
  $cover = $page->cover()->toFile();
  $coverSite = $site->cover()->toFile();

  $title = '';
  $description = '';

  if ($page->pageTitle()->isNotEmpty()) {
    $title = $page->pageTitle().' - '.$site->title();
  } elseif ($page->isHomePage() && $site->tagline()->isNotEmpty()) {
    $title = $site->title().' - '.$site->tagline();
  } elseif ($page->isHomePage()) {
    $title = $site->title();
  } elseif ($page->pageTitle()->isNotEmpty()) {
    $title = $page->pageTitle().' - '.$site->title();
  } else {
    $title = $page->title();
  }
  
  if ($page->description()->isNotEmpty()) {
    $description = $page->description();
  } elseif ($page->heroText()->isNotEmpty()) {
    $description = $page->heroText()->excerpt(150);
  } elseif ($blockFirst && $blockFirst->text()->isNotEmpty()) {
    $description =  $blockFirst->text()->excerpt(150);
  }

  include_once 'functions.php';

?>
<!doctype html>
<html lang="<?php if ($kirby->multilang()): ?><?php echo $kirby->language()->code() ?><?php elseif ($site->languageCode()->isNotEmpty()): ?><?= $site->languageCode() ?><?php else: ?>en<?php endif ?>">
<head>
<meta charset="utf-8">
<meta name="author" content="<?= $site->title() ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, minimum-scale=1, minimal-ui">
<meta name="theme-color" content="#8C3D17" />
<title><?= $title ?></title>
<meta name="description" content="<?= $description ?>">
<?php if ($page->keywords()->isNotEmpty()): ?>
<meta name="keywords" content="<?= $page->keywords()->html() ?>"/>
<?php endif ?>
<meta property="og:description" content="<?= $description ?>" />
<?php if ($cover): ?>
<meta property="og:image" content="<?= $cover->resize(1200, 800)->url() ?>" />
<?php elseif ($coverSite): ?>
<meta property="og:image" content="<?= $coverSite->resize(1200, 800)->url() ?>" />
<?php endif ?>
<meta property="og:site_name" content="<?= $site->title() ?>">
<meta property="og:title" content="<?= $title ?>" />
<?php if ($page->parents()->count()): ?>
<meta property="og:type" content="article" />
<?php else: ?>
<meta property="og:type" content="website" />
<?php endif ?>
<meta property="og:url" content="<?= $page->url() ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?= $description ?>" />
<?php if ($cover): ?>
<meta name="twitter:image" content="<?= $cover->resize(1200, 800)->url() ?>" />
<?php elseif ($coverSite): ?>
<meta name="twitter:image" content="<?= $coverSite->resize(1200, 800)->url() ?>" />
<?php endif ?>
<meta name="twitter:title" content="<?= $title ?>" />
<?php if ($icon = $site->icon()->toFile()): ?>
<link rel="apple-touch-icon-precomposed" href="<?= $icon->url() ?>">
<link rel="icon" href="<?= $icon->url() ?>">
<link rel="shortcut icon" href="<?= $icon->url() ?>">
<?php endif ?>
<?php if ($kirby->languages()->count() > 1): ?>
<?php foreach($kirby->languages() as $language): ?>
<link rel="alternate" hreflang="<?php echo $language->code() ?>" href="<?= $page->url($language->code()) ?>">
<?php endforeach ?>
<?php endif ?>

<script id="usercentrics-cmp" async data-eu-mode="true" data-settings-id="wJaZvY_AlKXjeX" src="https://app.eu.usercentrics.eu/browser-ui/latest/loader.js"></script>
<script type="application/javascript" src="https://sdp.eu.usercentrics.eu/latest/uc-block.bundle.js"></script>

<link rel="preload" href="<?= $kirby->urls()->assets() . '/css/bootstrap.css?ver=5.1.0' ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= $kirby->urls()->assets() . '/css/bootstrap.css?ver=5.1.0' ?>" media="screen"></noscript>

<?php $ver = filemtime('assets/css/main.css'); ?>
<link rel="preload" href="<?= $kirby->urls()->assets() . '/css/main.css?ver='. $ver ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= $kirby->urls()->assets() . '/css/main.css?ver='. $ver ?>" media="screen"></noscript>

<?php if ($site->customCSS()->isNotEmpty()): ?>
  <style>
    <?= $site->customCSS() ?>
  </style>
<?php endif ?>
<?php if ($site->codeHeader()->isNotEmpty()): ?>
  <?= $site->codeHeader() ?>
<?php endif ?>
<?php if ($page->parents()->count() && $page->parent()->codeHeader()->isNotEmpty()): ?>
<?= $page->parent()->codeHeader() ?>
<?php endif ?>
<?php if ($page->codeHeader()->isNotEmpty()): ?>
<?= $page->codeHeader() ?>
<?php endif ?>

</head>
<?php 
  $class=$page->template();

  if($page->isHomePage()) {
    $class='home';
  }
?>
<body class="page preload <?= $class ?>">
  <script>
    setTimeout(function() {
      document.body.classList.remove('preload');
    }, 100);
  </script>

  <?php if ($site->headerSearch()->bool()):
    $query   = get('q');
  ?>
    <form action="<?= ($p = page('s')) ? $p->url() : '' ?>" autocomplete="off" class="search header-search" method="get">
      <div class="form-group">
        <input id="search" name="q" onfocus="this.value=''" placeholder="Seite durchsuchen..." type="search" value="<?= html($query) ?>">
        <button type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="7 7 12 12 7 17" /><polyline points="13 7 18 12 13 17" /></svg>
        </button>
      </div>
    </form>
    <div class="search-overlay"></div>
  <?php endif ?>

  <?php snippet('header-nav') ?>
