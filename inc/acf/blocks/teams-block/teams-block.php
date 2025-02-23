<?php 
wp_enqueue_style('h2-title-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/h2-title.css', array('main'));
$current_id = get_the_ID();
// echo $current_id;
// $aaa = get_field('h2_title');
?>

<section class="section">
    <div class="container">
        <?php get_template_part('template-parts/h2-title', null, []); ?>

    </div>

</section>
