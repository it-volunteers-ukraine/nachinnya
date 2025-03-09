<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
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
            <!-- text -->
            <div class="<?php echo esc_attr(($classes['text-container'] ?? '') . ' ' . $style_variant); ?>">
                <p><?php echo get_field('text_follow_us') ?></p>
                <!-- link -->
                <?php
                    $follow_link = get_field('link_follow_us');
                    if (!empty($follow_link)):
                ?>
                <div class="<?php echo esc_attr($classes['link']); ?>">
                    <a href="<?php echo $follow_link; ?>" target="_blank"><?php echo the_field('link_follow_title') ?></a>
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