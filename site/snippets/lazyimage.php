<?php
if(isset($image)):
  $srcsetName = 'default';
  $altText = $image->alt();
  
  if(isset($size)) {
    $srcsetName = $size;
  }

  if(isset($alt)) {
    $altText = $alt;
  }

  if(isset($nometa)) {
    $imgCaption = '';
  } else {
    $imgCaption = $image->caption();
  }

    if(isset($class)) {
      $imgClass = $class;
    } else {
      $imgClass = 'img-fluid';
    }

    if($imgCaption!=''): 
?>
      <figure>
    <?php endif?>

    <picture>
      <source srcset="<?= $image->srcset($srcsetName) ?>" type="image/webp">      
      <img src="<?= $image->url() ?>" alt="<?= $altText ?>" class="<?= $imgClass ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
    </picture>

    <?php if($imgCaption!=''): ?>
        <figcaption>
          <?= $imgCaption ?>
        </figcaption>
      </figure>
    <?php endif ?>
<?php endif ?>