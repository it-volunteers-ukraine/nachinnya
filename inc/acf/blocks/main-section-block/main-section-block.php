<?php
$default_classes = [
    'main_photo' => 'main_photo',
    'image-container' => 'image-container',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['main-section-block'] ?? []);
}
?>

<div class='container'>
    <?php 
        $image = get_field('main_section_photo');
        if( !empty( $image ) ): ?>
            <div class="<?php echo esc_attr($classes['image-container']); ?>">
                <img class="<?php echo esc_attr($classes['main_photo']); ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
    <?php endif; ?>
</div>