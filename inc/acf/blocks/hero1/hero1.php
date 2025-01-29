<?php

$title = get_field('title');
$subtitle = get_field('subtitle');

?>

<section class="hero1">
    <div class="container">
        
        <?php if ( $title ) : ?>
            <h1 class="title"><?php echo $title ?></h1>
        <?php endif; ?>

        <?php if ( $subtitle ) : ?>
            <p class="subtitle"><?php echo $subtitle ?></p>
        <?php endif; ?>

    </div>
</section>