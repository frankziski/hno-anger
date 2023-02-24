<?php 
  $table = $block->table()->toTable();
  if($table != null): 

    $headRow = false;

    if ($block->createHead()->bool()){
      $headRow = true;
    }
?>
<div class="table-wrapper">
    <table class="table">
        <?php foreach ($table as $tableRow): ?>
            <?php if($headRow == true): ?>
                <thead>
                    <tr>
                        <?php foreach ($tableRow as $tableCell): ?>
                            <th><?= $tableCell; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <?php $headRow = false;?>
            <?php else: ?>
                <tr>
                    <?php foreach ($tableRow as $tableCell): ?>
                        <td><?= $tableCell; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>