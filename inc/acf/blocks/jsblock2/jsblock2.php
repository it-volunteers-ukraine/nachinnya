<?php
$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $class_name = $modules['jsblock2']['block'] ?? 'block';
} else {
    $class_name = 'block';
}
?>
<div class="<?php echo esc_attr($class_name); ?>">
    <p>jsblock2</p>
</div>
