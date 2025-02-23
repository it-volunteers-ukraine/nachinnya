<?php
$default_classes = [
    'partner-title' => 'partner-title',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['partners-block'] ?? []);
}
?>

<section>
<?php

$args = array(
    'post_type'      => 'partners',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$query = new WP_Query($args);
if ($query->have_posts()) :
    echo '<div class="partners">';
    while ($query->have_posts()) : $query->the_post(); 

    $partner_title = get_field('partner_title', get_the_ID()); 
    $partner_image = get_field('partner_image', get_the_ID());

?>

    <div class="container">
        <div class="post-item">
            <?php if ($partner_image) : ?>
                <img src="<?php echo esc_url($partner_image['url']); ?>" alt="<?php echo esc_attr($partner_title); ?>">
            <?php endif; ?>
            
            <h3 class="<?php echo esc_attr($classes['partner-title']); ?>">
                <a href="<?php the_permalink(); ?>">
                    <?php echo esc_html($partner_title ? $partner_title : get_the_title()); ?>
                </a>
            </h3>

            <p><?php the_excerpt(); ?></p>
        </div>
    </div>

    <?php endwhile;
    echo '</div>';
    wp_reset_postdata();
else :
    echo '<p>Немає записів.</p>';
endif;
?>
</section>