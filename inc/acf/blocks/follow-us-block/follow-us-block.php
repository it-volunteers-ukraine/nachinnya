<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    'our-mission' => 'our-mission',
    'our-vision' => 'our-vision',
    'follow-us' => 'follow-us',
    'variations-wrapper' => 'variations-wrapper',
    'swiper-container' => 'swiper-container',
    'v-slide' => 'v-slide',
    'h-slide' => 'h-slide',
    'swiper-pagination-wrapper' => 'swiper-pagination-wrapper',
    'swiper-pagination' => 'swiper-pagination',
    'text-container' => 'text-container',
    'link-container' => 'link-container',
    'link' => 'link',
    'images-container' => 'images-container',
    'image-vertical-wrapper' => 'image-vertical-wrapper',
    'image-horizontal-wrapper' => 'image-horizontal-wrapper',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['follow-us-block'] ?? []);
}
?>

<section class='section'>
    <div class='container'>
        
        <?php
        $layout = get_field('layout_direction') ?: 'follow-us';
        $style_variant = '';
        if ($layout === 'our-mission') {
            $style_variant = $classes['our-mission'] ?? 'our-mission';
        } elseif ($layout === 'our-vision') {
            $style_variant = $classes['our-vision'] ?? 'our-vision';
        } elseif ($layout === 'follow-us') {
            $style_variant = $classes['follow-us'] ?? 'follow-us';
        }
        ?>

        <!-- h2_title -->
        <?php
            $h2_title = get_field('h2_follow_us');
            if (!empty($h2_title)) : 
        ?>
        <div class="<?php echo esc_attr(($classes['title-template-part'] ?? '') . ' ' . $style_variant); ?>">
            <?php get_template_part('template-parts/h2-title-v2', null,[
                'title' => $h2_title,
            ]); ?>
        </div>
        <?php endif; ?>

        <!-- content -->
        <div class="<?php echo esc_attr(($classes['variations-wrapper'] ?? '') . ' ' . $style_variant); ?>">
            <!-- Swiper -->
            <div class="swiper-container <?php echo esc_attr($classes['swiper-container']); ?>">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="<?php echo esc_attr($classes['v-slide']); ?>">
                            <?php
                            $photo_url = get_field('v_foto_follow_us') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                            $photo_alt = get_the_title();

                            get_template_part('template-parts/photo-vertical', null, [
                                'photo_url' => $photo_url,
                                'photo_alt' => $photo_alt,
                                'my_class' => 'v_slide'
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="<?php echo esc_attr($classes['h-slide']); ?>">
                            <?php
                            $photo_url = get_field('h_foto_follow_us') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                            $photo_alt = get_the_title();

                            get_template_part('template-parts/photo-horizontal', null, [
                                'photo_url' => $photo_url,
                                'photo_alt' => $photo_alt,
                                'my_class' => 'h_slide'
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination-wrapper <?php echo esc_attr($classes['swiper-pagination-wrapper']); ?>">
                    <div class="swiper-pagination <?php echo esc_attr($classes['swiper-pagination']); ?>"></div>
                </div>
            </div>
            <!-- text -->
            <div class="<?php echo esc_attr(($classes['text-container'] ?? '') . ' ' . $style_variant); ?>">
                <p><?php echo get_field('text_follow_us') ?></p>
                <!-- link -->
                <?php
                $optional_link = get_field('link_follow_us');
                if (!empty($optional_link)) :
                ?>

                <div class="<?php echo esc_attr($classes['link-container']); ?>">
                    <?php
                    $link_class = isset($classes['link']) ? esc_attr($classes['link']) : '';
                    get_template_part('template-parts/yellow-link', null, [
                        'link' => $optional_link['url'],
                        'link_text' => $optional_link['title'],
                        'link_class' => $link_class,
                        'target' => $optional_link['target']
                    ]);
                    ?>
                </div>

                <?php endif; ?>
            </div>
            <!-- images -->
            <div class="<?php echo esc_attr(($classes['images-container'] ?? '') . ' ' . $style_variant); ?>">
                <div class="<?php echo esc_attr($classes['image-vertical-wrapper']); ?>">
                    <?php
                    $photo_url = get_field('v_foto_follow_us') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                    $photo_alt = get_the_title();

                    get_template_part('template-parts/photo-vertical', null, [
                        'photo_url' => $photo_url,
                        'photo_alt' => $photo_alt,
                        'my_class' => 'v_photo'
                    ]);
                    ?>
                </div>
                <div class="<?php echo esc_attr($classes['image-horizontal-wrapper']); ?>">
                    <?php
                    $photo_url = get_field('h_foto_follow_us') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                    $photo_alt = get_the_title();

                    get_template_part('template-parts/photo-horizontal', null, [
                        'photo_url' => $photo_url,
                        'photo_alt' => $photo_alt,
                        'my_class' => 'h_photo'
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>