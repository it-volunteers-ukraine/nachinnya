<?php
$default_classes = [
    'block' => 'block',
    'button_a' => 'button',
    'button_b' => 'button',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['jsblock2'] ?? []);
}
?>

<div class="<?php echo esc_attr($classes['block']); ?>">

    <?php get_template_part('template-parts/h2-title'); ?>

    <p>jsblock2</p>
    <button class="<?php echo esc_attr($classes['button_a']); ?>">Button A</button>
    <button class="<?php echo esc_attr($classes['button_b']); ?>">Button B</button>
</div>
