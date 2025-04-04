<?php
$default_classes = [
    'main-section' => 'main-section',
    'main_photo' => 'main_photo',
    'image-container' => 'image-container',
    'upper-title-wrapper' => 'upper-title-wrapper',
    'title' => 'title',
    'title-template-part' => 'title-template-part',
    'main_section_slogan' => 'main_section_slogan',
    'slogan' => 'slogan',
    'main_section_columns-text' => 'main_section_columns-text',

];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['main-section-block'] ?? []);
}
?>

<section class='<?php echo esc_attr($classes['main-section']); ?>'>
    <div class='<?php echo esc_attr($classes['upper-title-container']); ?>'>

        <!-- If h2 title is above the image -->
        <?php
        $main_section_upper_title = get_field('main_section_upper_title');
        if (!empty($main_section_upper_title)) :
        ?>
            <div class="<?php echo esc_attr($classes['upper-title-template-part-wrapper']); ?>">
                <?php get_template_part('template-parts/h2-title-v2', null,[
                    'title' => $main_section_upper_title,
                    'custom_elements_class' => 'upper-title-tpl-part'
                    ]); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class='container'>
        <!-- Image margin variations -->
        <?php
        $margin = get_field('margin_size') ?: 'about-page';
        $margin_variant = '';
        if ($margin === 'main-page') {
            $margin_variant = $classes['main-page'] ?? 'main-page';
        } elseif ($margin === 'team-page') {
            $margin_variant = $classes['team-page'] ?? 'team-page';
        } elseif ($margin === 'support-page') {
            $margin_variant = $classes['support-page'] ?? 'support-page';
        } elseif ($margin === 'about-page') {
            $margin_variant = $classes['about-page'] ?? 'about-page';
        }
        ?>

        <!-- Image -->
        <?php
        $image = get_field('main_section_photo');
        if (!empty($image)): ?>
            <div class="<?php echo esc_attr(($classes['image-container'] ?? '') . ' ' . $margin_variant); ?>">
                <img class="<?php echo esc_attr($classes['main_photo']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
        <?php endif; ?>

        <!-- h2 title -->
        <?php
            $h2_title = get_field('h2_title_main_section');
            if (!empty($h2_title)) : 
        ?>
            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title-v2', null,[
                    'title' => $h2_title
                    ]); ?>
            </div>
        <?php endif; ?>

        <!-- slogan -->
        <?php
        $main_section_slogan = get_field('main_section_slogan');
        if (!empty($main_section_slogan)) :
        ?>
            <div class="<?php echo esc_attr($classes['main_section_slogan']); ?>">
                <h3 class="<?php echo esc_attr($classes['slogan']); ?>"><?php echo wp_kses_post($main_section_slogan); ?></h3>
            </div>
        <?php endif; ?>

        <!-- 2-columns text -->
        <?php
        $main_section_column_left = get_field('main_section_column_left');
        $main_section_column_right = get_field('main_section_column_right');
        if (!empty($main_section_column_left) && !empty($main_section_column_right)) :
        ?>
            <div class="<?php echo esc_attr(($classes['main_section_columns-text'] ?? '') . ' ' . $margin_variant); ?>">
                <div class="<?php echo esc_attr($classes['left']); ?>">
                    <p><?php echo wp_kses_post($main_section_column_left); ?></p>
                </div>
                <div class="<?php echo esc_attr($classes['right']); ?>">
                    <p><?php echo wp_kses_post($main_section_column_right); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>