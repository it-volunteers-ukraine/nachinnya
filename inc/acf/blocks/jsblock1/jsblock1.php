<?php
$default_classes = [
    'block' => 'block',
    'button_a' => 'button',
    'button_b' => 'button',
    'paragraph_2' => 'paragraph_2',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['jsblock1'] ?? []);
}
?>

<div class="<?php echo esc_attr($classes['block']); ?>">
    <p>jsblock1</p>
    <button class="<?php echo esc_attr($classes['button_a']); ?>">Button A</button>
    <button class="<?php echo esc_attr($classes['button_b']); ?>">Button B</button>
    <p class="<?php echo esc_attr($classes['paragraph_2']); ?>">New article</p>
</div>
