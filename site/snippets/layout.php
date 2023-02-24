<?php foreach ($page->toLayouts() as $row): ?>
  <?php if ($row->visibility()->bool()): ?>

    <?php
    $padding = '';

    if($row->padding()->isEmpty()) {
      $padding = ' no-padding ';
    } else {
      if(count($row->padding()->split()) === 4) {
        $padding = ' padding ';
      } else {
        foreach ($row->padding()->split() as $val) {
          $padding = $padding . ' ' . $val . ' ';
        }
      }
    }

    $sectionClass = 'layout ' . $row->width()->value();
    $containerClass = 'container-fluid';
    $rowClass = 'row block-row' . $padding . $row->alignVertical();

    if($row->columnReverse()->bool()) {
      $rowClass = $rowClass . ' flex-column-reverse flex-md-row';
    }

    $sectionStyle= '';
    $containerStyle= '';

    if($row->marginBottom()->toBool() === true ) {
      $sectionClass = $sectionClass . ' margin-bottom';
    }
    
    if($row->backgroundSize() == 'full-screen' || $row->backgroundSize() == 'full-width') {
      $sectionClass = $sectionClass . backgroundClass($row);
      $sectionStyle= ' style="' . backgroundImage($row) . '"';
    } else {
      $containerClass = $containerClass . backgroundClass($row);
      $containerStyle= ' style="' . backgroundImage($row) . '"';
    }

    if ($row->customClass()->isNotEmpty()) {
      $sectionClass = $sectionClass . ' ' . $row->customClass();
    }
    ?>

    <section <?php e($row->customId()->isNotEmpty(), 'id="' . $row->customId() . '"', '') ?> class="<?= $sectionClass; ?>"<?= $sectionStyle ?>>
      <div class="<?= $containerClass ?>"<?= $containerStyle ?>>
        <div class="<?= $rowClass ?>">    
          <?php $numColumn = 0; foreach ($row->columns() as $column): $numColumn = ++$numColumn; ?>    
            <?php if ($column->blocks()->isNotEmpty()): ?>    
              <?php    
                $colClass = 'block-col';

                if ($column->span() === 12) {
                  $colClass = $colClass . ' col';
                } elseif ($column->span() === 6) {
                  $colClass = $colClass . ' col-md-6';
                } elseif ($column->span() === 4) {
                  $colClass = $colClass . ' col-lg-4 col-md-6';
                } elseif ($column->span() === 3) {
                  $colClass = $colClass . ' col-lg-3 col-md-6';
                } elseif ($column->span() === 8) {
                  $colClass = $colClass . ' col-lg-8 col-md-6';
                }
              ?>
              <div class="<?= $colClass; ?>">
                <?php snippet('blocks', ['blockElement' => $column->blocks()]); ?>  
              </div>

            <?php endif ?>    
          <?php endforeach ?>    
        </div>
      </div>
    </section>
  <?php endif ?>
<?php endforeach ?>
