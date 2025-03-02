<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['our-values-block'] ?? []);
}
?>

<section class='section'>
    <div class='container'>
        <!-- h2_title -->
        <?php
            $h2_title = get_field('h2_title');
            if (!empty($h2_title)) : 
        ?>
            <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title-yellow'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>