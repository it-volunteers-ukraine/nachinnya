<?php
/*
Template Name: partners
*/
get_header();
?>

    <section class="partners">
        <div class="wrapper">
            <div class="container">
                <h2 class="title"><?php the_title(); ?></h2>
                <div class="content">
                    <?php get_template_part('template-parts/partners-posts') ?>
                </div>
            </div>
    </section>


<?php get_footer(); ?>