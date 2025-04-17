<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    'partners-slider-wrapper' => 'partners-slider-wrapper',
    'slide-prev' => 'slide-prev',
    'partner-image' => 'partner-image',
    'slide-next' => 'slide-next',
    'partners-text-column' => 'partners-text-column',
    'link' => 'link',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['home-parthers-slider-block'] ?? []);
}
?>

<section class='section'>
    <div class="container">
        <!-- h2_title -->
        <?php
            $h2_title = get_field('home_partners_h2_title');
            if (!empty($h2_title)) :
        ?>
            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title-v2', null,[
                    'title' => $h2_title,
                    ]); ?>
            </div>
        <?php endif; ?>
        <div class="<?php echo esc_attr($classes['partners-slider-wrapper']); ?>">
            <div class="slide-prev <?php echo esc_attr($classes['slide-prev']); ?>"></div>
            <div class="swiper partnersSwiper">
                <div class="swiper-wrapper">
                    <?php
                    $partners = new WP_Query(array(
                        'post_type'      => 'partners',
                        'posts_per_page' => -1,
                    ));

                    if ($partners->have_posts()) :
                        while ($partners->have_posts()) : $partners->the_post();
                        $image = get_field('partner_image', get_the_ID());
                        if ($image): 
                    ?>
                        <div class="swiper-slide">
                            <img class="<?php echo esc_attr($classes['partner-image']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        
                    <?php
                    endif;
                    endwhile;
                    wp_reset_postdata();
                    endif;

                    // x2 numbers of slides
                    if ($partners->have_posts()) :
                        while ($partners->have_posts()) : $partners->the_post();
                        $image = get_field('partner_image', get_the_ID());
                        if ($image): 
                    ?>
                        <div class="swiper-slide">
                            <img class="<?php echo esc_attr($classes['partner-image']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        
                    <?php
                    endif;
                    endwhile;
                    wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
            <div class="slide-next <?php echo esc_attr($classes['slide-next']); ?>"></div>
        </div>
        <div class="<?php echo esc_attr($classes['partners-text-column']); ?>">
            <p><?php echo get_field('partners_text_column') ?></p>
            <?php
                $partners_link = get_field('partners_link');
                if (!empty($partners_link)) :

                    $link_class = isset($classes['link']) ? esc_attr($classes['link']) : '';
                    get_template_part('template-parts/yellow-link', null, [
                        'link' => $partners_link['url'],
                        'link_text' => $partners_link['title'],
                        'link_class' => $link_class
                    ]);
                    
                endif;
            ?>
        </div>
    </div>
</section>