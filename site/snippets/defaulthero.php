<?php
    $herotitle = $page->title();

    if(isset($title)) {
        $herotitle = $title;
    }
?>
<section class="container-fluid full padding">
    <div class="row block-row align-items-center">
        <div class="block-col col">
            <div class="block block-type-hero align-content-center align-block-center block-width-full">
                <div class="hero textonly">
                    <div class="hero-content">
                        <div class="hero-headline">
                            <h1 class="title-hero"><?= $herotitle ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>