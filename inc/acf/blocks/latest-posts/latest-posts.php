<?php 
            $h2_title = get_field('h2_title');
            if (!empty($h2_title)) : 
        ?>
            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title'); ?>
            </div>
        <?php endif; ?>

<?php

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$query = new WP_Query($args);
if ($query->have_posts()) :
    echo '<div class="latest-posts">';
    while ($query->have_posts()) : $query->the_post(); ?>
    <div class="container">
        <div class="post-item">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php 
                    $paragraph = get_field('paragraph', get_the_ID());
                    if ($paragraph) :
                    ?>
                        <p><?php echo esc_html($paragraph); ?></p>
                <?php endif; ?>
        </div>
    </div>
    <?php endwhile;
    echo '</div>';
    wp_reset_postdata();
else :
    echo '<p>Немає записів.</p>';
endif;
?>
