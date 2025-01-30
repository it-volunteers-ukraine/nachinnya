<?php
// Number of posts (you can change in ACF)
$posts_per_page = get_field('posts_per_page') ?: 5;

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$query = new WP_Query($args);
if ($query->have_posts()) :
    echo '<div class="latest-posts">';
    while ($query->have_posts()) : $query->the_post(); ?>
        <div class="post-item">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile;
    echo '</div>';
    wp_reset_postdata();
else :
    echo '<p>Немає записів.</p>';
endif;
?>