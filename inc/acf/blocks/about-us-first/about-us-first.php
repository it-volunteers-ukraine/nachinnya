<?php
$default_classes = [
    'main_photo' => 'main_photo',
    'image-container' => 'image-container',
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
        <div class="<?php echo esc_attr($classes['image-container']); ?>">
            <?php 
                $image = get_field('main_section_photo');
                if( !empty( $image ) ): ?>
                    <img class="<?php echo esc_attr($classes['main_photo']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>