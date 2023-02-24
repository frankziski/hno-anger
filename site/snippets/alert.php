<?php 
    $type = 'alert-negative';

    if(isset($context)) {
        $type = 'alert-'.$context;
    }

    if(isset($message)):
?>
    <div class="align-left alert <?= $type ?> paragraph"><?= $message ?></div>

<?php endif ?>