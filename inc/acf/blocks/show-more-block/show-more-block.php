<?php
$default_classes = [
    'show-more' => 'show-more',
    'button-container' => 'button-container',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['show-more-block'] ?? []);
}
?>


<div class="<?php echo esc_attr($classes['button-container']); ?>">
    <?php
    $current_slug = get_post_field('post_name', get_post());
    $button_text = get_field('show-more-text');
    echo '<button id="show-more" data-type="' . esc_attr($current_slug) . '" class="' . esc_attr($classes['show-more']) . '">
' . esc_html($button_text) . '
</button>';
    ?>
</div>










