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
                    <!-- middle texsts & slider -->
                    <div class="<?php echo esc_attr($classes['middle-column-text']); ?>">
                        <!-- h2_title -->
                        <?php
                            $h2_title = get_field('h2_title_support_us_details');
                            if (!empty($h2_title)) : 
                        ?>
                            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                                <?php get_template_part('template-parts/h2-title-v2', null,[
                                    'title' => $h2_title,
                                    'custom_text_class' => 'yellow-yellow-title',
                                    'custom_elements_class' => 'yellow-elements'
                                    ]); ?>
                            </div>
                        <?php endif; ?>
                        <!-- slider -->
                        <div class="slider"></div>
                        <!-- Text -->
                        <div>
                            <p><?php echo get_field('motivational_text') ?></p>
                        </div>
                        <div class="<?php echo esc_attr($classes['details']); ?>">
                            <?php if (have_rows('details')) :
                            while (have_rows('details')) : the_row(); ?>
                                <div class="<?php echo esc_attr($classes['details-flex-container']); ?>">
                                    <div class="<?php echo esc_attr($classes['details-title']); ?>">
                                        <p><?php echo the_sub_field('details_title') ?></p>
                                    </div>
                                    <div class="<?php echo esc_attr($classes['details-value']); ?>">
                                        <p><?php echo the_sub_field('details_value') ?></p>
                                    </div>
                                </div>
                            <?php endwhile;
                            endif; ?>
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