<?php
$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $block_class = $modules['jsblock1']['block'] ?? 'block';
    $button_a_class = $modules['jsblock1']['button_a'] ?? 'button';
    $button_b_class = $modules['jsblock1']['button_b'] ?? 'button';
} else {
    $block_class = 'block';
}
?>
<div class="<?php echo esc_attr($block_class); ?>">
    <p>jsblock1</p>
    <button class="<?php echo esc_attr($button_a_class); ?>">Button A</button>
    <button class="<?php echo esc_attr($button_b_class); ?>">Button B</button>
</div>