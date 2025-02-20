<?php
$default_classes = [
    'partners-info' => 'partners-info',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['partners-block'] ?? []);
}
?>

<section class='section'>
    <div class='container'>
        <?php 
            $text = get_field('partners_text');
            if (!empty($text)) : 
        ?>
            <div class="<?php echo esc_attr($classes['partners-info']); ?>">
                <p class="<?php echo esc_attr($classes['partners-info']); ?>"><?php echo esc_html($text); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>