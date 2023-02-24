<?php 
    $pImage = '';

    if($image = $site->placeholderImage()->toFile()) {
        $pImage = $image->url();
    }

    echo $pImage;
?>