<?php 
  $id = $block->customID()->or('accordion1');
  $class = 'accordion';

  if($block->behaviour()->value() == 'single') {
    $class = $class . ' accordion-flush';
  }

  if($block->customClass()->isNotEmpty()) {
    $class = $class . ' ' . $block->customClass();
  }

  $accItems = $block->items()->toBlocks();

  if($accItems->isNotEmpty()):
?>

<<?= $block->level()->or('h2') ?>><?= $block->heading() ?></<?= $block->level()->or('h2') ?>>

<div id="<?= $id ?>" class="<?= $class ?>">
  <?php $i= 1; foreach($accItems as $item): ?>
    <div class="accordion-item">
      <h4 class="accordion-header" id="heading<?= $i ?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $id ?>-collapse<?= $i ?>" aria-expanded="false" aria-controls="<?= $id ?>-collapse<?= $i ?>"><?= $item->summary() ?></button>
      </h4>
      <div id="<?= $id ?>-collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i ?>" <?php if($block->behaviour()->value() == 'single'): ?>data-bs-parent="#<?= $id ?>"<?php endif ?>>
        <div class="accordion-body"><?= $item->details() ?></div>
      </div>
    </div>
    <?php $i++; endforeach; ?>
</div>

<?php endif; ?>