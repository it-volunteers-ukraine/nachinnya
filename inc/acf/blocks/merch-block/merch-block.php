<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    'flex-container' => 'flex-container',
    'text-wrapper' => 'text-wrapper',
    'merch_photo' => 'merch_photo',
    'loop-arrow' => 'loop-arrow',
    'merch_text' => 'merch_text',
    'merch-socials' => 'merch-socials',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['merch-block'] ?? []);
}
?>

<section class='section'>
    <div class="container">
        <!-- h2_title -->
        <?php
            $h2_title = get_field('merch_h2_title');
            if (!empty($h2_title)) :
        ?>
            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title-v2', null,[
                    'title' => $h2_title,
                    ]); ?>
            </div>
        <?php endif; ?>
        <div class='<?php echo esc_attr($classes['flex-container']); ?>'>
            <!-- Photo -->
            <?php

            $photo_url = get_field('merch_image') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
            $photo_alt = get_the_title();
            
            if(!empty ($photo_url)) :
            ?>
                <a href="<?php echo $photo_url; ?>" data-lightbox="gallery">
                <?php
                get_template_part('template-parts/photo-left', null, [
                    'photo_url' => $photo_url,
                    'photo_alt' => $photo_alt,
                    'my_class' => esc_attr($classes['merch_photo']),
                ]);
                ?>
                </a>
            <?php endif; ?>
            <div class="<?php echo esc_attr($classes['loop-arrow']); ?>"></div>
            <!-- Text-wrapper -->
            <div class='<?php echo esc_attr($classes['text-wrapper']); ?>'>
                <p class='<?php echo esc_attr($classes['merch_text']); ?>'><?php echo get_field('merch_text')?></p>
                <!-- Socials -->
                <div class='<?php echo esc_attr($classes['merch-socials']); ?>'>
                    <?php
                    get_template_part('template-parts/socblock', null, ['is_main' => true, 'is_title' => true]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>