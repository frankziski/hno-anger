<?= js('/media/plugins/fz/nova-restaurant/restaurant.js?ver=1.0.0', ['async' => true, 'defer' => true]) ?>

<?php if ($block->heading()->isNotEmpty()): ?>
  <div class="menusection-intro align-content-<?= $block->alignHeadline()->value() ?>">
    <h4 id="menusection-hl"><?= $block->heading() ?></h4>
    <?php if ($block->text()->isNotEmpty()){ echo $block->text(); } ?>
  </div>
<?php endif ?>

<div aria-labelledby="menusection-hl" class="menusection-items">
  <?php $tabindex = 0; foreach($block->menuitems()->toStructure() as $item): ?>
    <div class="menusection-item">
      <div class="title">
        <h5><?= $item->itemTitle() ?></h5>
        <span class="price"><?= number_format($item->itemPrice()->toFloat(), 2, ',', ' ') . " €" ?></span>
      </div>

      <div class ="description">
        <?= $item->itemDetails() ?>

        <?php 
          $additives = '';
          $title = '';

          if($item->itemAdditives()->isNotEmpty()) {
            $i = 1;
            $first = true;
            $list = $item->itemAdditives()->split();
            
            if($page->additives()->isNotEmpty()) {
              foreach ($page->additives()->toStructure() as $additive){
                $id = $additive->additiveId();
                $name = $additive->additiveName();
                
                if(array_search($id, $list) > -1) {
                  if($first == true) {
                    $title = $title . $i;
                    $additives = $additives . $i .': '.$name;
                    $first = false;
                  } else {
                    $title = $title . ', '.$i;
                    $additives = $additives . ' | '. $i .': '.$name;
                  }
                }

                $i++;
              }
            }
          }

          if($additives != ''):
        ?>        

          <a tabindex="<?= $tabindex ?>" class="btn btn-additives" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Zusatzstoffe" data-bs-content="<?= $additives ?>"><?= $title ?></a>
        
        <?php endif ?>
      </div>
    </div>
  <?php $tabindex++; endforeach?>
</div>