<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    'bg-wrapper' => 'bg-wrapper'
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['support-us-details-block'] ?? []);
}
?>

<section class='section'>
    <div class="<?php echo esc_attr($classes['ornament-wrapper']); ?>">
        <div class="<?php echo esc_attr($classes['bg-wrapper']); ?>">
            <div class='container'>
                <!-- h2 & slider -->

                <?php
                    $h2_title = get_field('h2_title_support_us_details');
                    if (!empty($h2_title)) :
                ?>
                    <div class="<?php echo esc_attr($classes['title-template-part-above-slider']); ?>">
                        <?php get_template_part('template-parts/h2-title-v2', null,[
                            'title' => $h2_title,
                            'custom_text_class' => 'yellow-white-title',
                            'custom_elements_class' => 'yellow-elements'
                            ]); ?>
                    </div>
                <?php endif; ?>

                <div class="swiper-container-support <?php echo esc_attr($classes['swiper-container']); ?>">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="<?php echo esc_attr($classes['slide-1']); ?>">
                                <?php
                                $photo_url = get_field('left_foto_support_details') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                                $photo_alt = get_the_title();

                                get_template_part('template-parts/photo-left', null, [
                                    'photo_url' => $photo_url,
                                    'photo_alt' => $photo_alt,
                                    'my_class' => 'slide_1'
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="<?php echo esc_attr($classes['slide-2']); ?>">
                                <?php
                                $photo_url = get_field('right_foto_support_details') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                                $photo_alt = get_the_title();

                                get_template_part('template-parts/photo-right', null, [
                                    'photo_url' => $photo_url,
                                    'photo_alt' => $photo_alt,
                                    'my_class' => 'slide_2'
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination-wrapper <?php echo esc_attr($classes['swiper-pagination-wrapper']); ?>">
                        <div class="swiper-pagination <?php echo esc_attr($classes['swiper-pagination']); ?>"></div>
                    </div>
                </div>
                
                <div class="<?php echo esc_attr($classes['flex-container']); ?>">
                    <!-- left-photo -->
                    <div class="<?php echo esc_attr($classes['image-left-wrapper']); ?>">
                        <?php
                        $photo_url = get_field('left_foto_support_details') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                        $photo_alt = get_the_title();

                        get_template_part('template-parts/photo-left', null, [
                            'photo_url' => $photo_url,
                            'photo_alt' => $photo_alt,
                            'my_class' => 'left_photo'
                        ]);
                        ?>
                    </div>
                    <!-- middle texsts -->
                    <div class="<?php echo esc_attr($classes['middle-column-text']); ?>">
                        <!-- h2_title -->
                        <?php
                            $h2_title = get_field('h2_title_support_us_details');
                            if (!empty($h2_title)) :
                        ?>
                            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                                <?php get_template_part('template-parts/h2-title-v2', null,[
                                    'title' => $h2_title,
                                    'custom_text_class' => 'yellow-white-title',
                                    'custom_elements_class' => 'yellow-elements'
                                    ]); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Text -->
                        <?php 
                        $has_details = have_rows('details'); 
                        ?>
                        <div class="<?php echo esc_attr($has_details ? $classes['text'] : $classes['text_no_IBAN']); ?>">

                            <?php 
                            $has_details = have_rows('details'); 
                            ?>
                            <div class="<?php echo esc_attr($has_details ? $classes['paragraph'] : $classes['paragraph_no_IBAN']); ?>">
                                <p><?php echo get_field('motivational_text') ?></p>
                            </div>

                            <div class="<?php echo esc_attr($classes['details']); ?>">
                                <?php if (have_rows('details')) :
                                while (have_rows('details')) : the_row(); ?>
                                    <div class="<?php echo esc_attr($classes['details-flex-container']); ?>">
                                        <div class="<?php echo esc_attr($classes['details-title']); ?>">
                                            <p><?php echo the_sub_field('details_title') ?></p>
                                        </div>
                                        <div class="<?php echo esc_attr($classes['details-value']); ?>" data-class="<?php echo esc_attr($classes['details-value']); ?>">
                                            <p class="details-text <?php echo esc_attr($classes['details-text']); ?>"><?php echo get_sub_field('details_value') ?></p>
                                            <div class="<?php echo esc_attr($classes['copy-value']); ?>" onclick="copyToClipboard(this)"
                                            data-original-class="<?php echo esc_attr($classes['copy-value']); ?>"
                                            data-copied-class="<?php echo esc_attr($classes['copied-value']); ?>"></div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                endif; ?>
                            </div>
                            <!-- optional link -->
                            <?php
                                $optional_link = get_field('support_us_details_optional_link');
                                if (!empty($optional_link)) :

                                    $link_class = isset($classes['link']) ? esc_attr($classes['link']) : '';
                                    get_template_part('template-parts/yellow-link', null, [
                                        'link' => $optional_link['url'],
                                        'link_text' => $optional_link['title'],
                                        'link_class' => $link_class
                                    ]);
                                    
                                endif;
                            ?>
                        </div>
                    </div>
                    <!-- Right-photo -->
                    <div class="<?php echo esc_attr($classes['image-right-wrapper']); ?>">
                        <?php
                        $photo_url = get_field('right_foto_support_details') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

                        $photo_alt = get_the_title();

                        get_template_part('template-parts/photo-right', null, [
                            'photo_url' => $photo_url,
                            'photo_alt' => $photo_alt,
                            'my_class' => 'right_photo'
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>