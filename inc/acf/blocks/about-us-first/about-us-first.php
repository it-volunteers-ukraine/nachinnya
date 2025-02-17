<?php
$default_classes = [
    'main_photo' => 'main_photo',
    'image-container' => 'image-container',
    'upper-title-wrapper' => 'upper-title-wrapper',
    'bottom-title-wrapper' => 'bottom-title-wrapper',
    'title-flex-container' => 'title-flex-container',
    'title' => 'title',
    'top_left_rounds' => 'top_left_rounds',
    'down_right_rounds' => 'down_right_rounds',
    'under_title_image' => 'under_title_image',
    'text-columns-wrapper' => 'text-columns-wrapper',
    'text-columns' => 'text-columns',
    'text-column' => 'text-column',
    'red_long_arrow' => 'red_long_arrow',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['about-us-first'] ?? []);
}
?>

<section class='section'>
    <div class='container'>
    <!-- If title is above the image -->
        <?php 
            $support_us_heading = get_field('support_us_heading');
            if (!empty($support_us_heading)) : 
        ?>
            <div class="<?php echo esc_attr($classes['upper-title-wrapper']); ?>">
                <div class="<?php echo esc_attr($classes['title-flex-container']); ?>">
                    <?php 
                        $image = get_field('top_left_rounds');
                        if( !empty( $image ) ): ?>
                            <img class="<?php echo esc_attr($classes['top_left_rounds']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <h2 class="<?php echo esc_attr($classes['title']); ?>"><?php echo esc_html($support_us_heading); ?></h2>
                    <?php 
                        $image = get_field('down_right_rounds');
                        if( !empty( $image ) ): ?>
                            <img class="<?php echo esc_attr($classes['down_right_rounds']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <?php 
                    $image = get_field('under_title_image');
                    if( !empty( $image ) ): ?>
                        <img class="<?php echo esc_attr($classes['under_title_image']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Image -->
        <div class="<?php echo esc_attr($classes['image-container']); ?>">
            <?php 
                $image = get_field('about_us_main_photo');
                if( !empty( $image ) ): ?>
                    <img class="<?php echo esc_attr($classes['main_photo']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>

        <!-- If title is under the image -->
        <?php 
            $about_us_heading = get_field('about_us_heading');
            if (!empty($about_us_heading)) : 
        ?>
            <div class="<?php echo esc_attr($classes['bottom-title-wrapper']); ?>">
                <div class="<?php echo esc_attr($classes['title-flex-container']); ?>">
                    <?php 
                        $image = get_field('top_left_rounds');
                        if( !empty( $image ) ): ?>
                            <img class="<?php echo esc_attr($classes['top_left_rounds']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <h2 class="<?php echo esc_attr($classes['title']); ?>"><?php echo esc_html($about_us_heading); ?></h2>
                    <?php 
                        $image = get_field('down_right_rounds');
                        if( !empty( $image ) ): ?>
                            <img class="<?php echo esc_attr($classes['down_right_rounds']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <?php 
                    $image = get_field('under_title_image');
                    if( !empty( $image ) ): ?>
                        <img class="<?php echo esc_attr($classes['under_title_image']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>

            <!-- Paragraphs -->
            <div class="<?php echo esc_attr($classes['text-columns-wrapper']); ?>">
                <div class="<?php echo esc_attr($classes['text-columns']); ?>">
                    <div class="<?php echo esc_attr($classes['text-column']); ?>">
                        <p><?php echo esc_html(get_field('text_column_1')); ?></p>
                    </div>
                    <div class="<?php echo esc_attr($classes['text-column']); ?>">
                        <p><?php echo esc_html(get_field('text_column_2')); ?></p>
                    </div>
                </div>

                <!-- Red arrow -->
                <?php 
                    $image = get_field('red_long_arrow');
                    if( !empty( $image ) ): ?>
                        <img class="<?php echo esc_attr($classes['red_long_arrow']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>

        <?php endif; ?>

    </div>
</section>