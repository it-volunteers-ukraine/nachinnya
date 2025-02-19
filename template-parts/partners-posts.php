<?php
$args = array(
    'post_type' => 'partners',
    'posts_per_page' => 6,
    'order' => 'ASC'
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
        ?>
        <?php
        $partners = get_field('partners');
        foreach ($partners as $row) : ?>
            <?php if (!is_front_page()) : ?>
                <h2 class="partners-title"><?php the_title(); ?></h2>
            <?php endif; ?>
            <div class="posts">
                <img class="partners-logo" src="<?= $row['logo']; ?>" alt="image">
                <?php if (!empty($row['description']) && !is_front_page()) : ?>
                    <p class="partners-description">
                        <?= $row['description']; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'No posts to display.';
endif;
?>