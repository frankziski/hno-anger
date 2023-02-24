<?php 
if(isset($blockElement)):
    $numBlock = 0; 
    foreach ($blockElement as $block): 
        $numBlock = ++$numBlock; 
?>    
    <?php    
        // Classes    
        $class = 'block block-type-' . $block->type() . ' align-content-' . $block->alignContent()->or('left') . ' align-block-' . $block->alignBlock()->or('center') . ' block-width-' . $block->width(). backgroundClass($block);

        if ($fontColor = fontColor($block->fontColor()->value())) {
        $class = $class . $fontColor;
        }

        $style= backgroundImage($block);
    ?>
    <div class="<?= $class ?>" style="<?= $style ?>">
        <?= $block ?>
    </div>
    <?php endforeach ?>
<?php endif ?>
