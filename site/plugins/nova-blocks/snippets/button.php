<?php 
  foreach($block->linkfield()->toStructure() as $link) {
    echo setlink($link, '', $block);
  }  
?>