<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['follow-us-block'] ?? []);
}
?>

<section class='section'>
    <div class='container'>

        <!-- h2_title -->
        <?php
            $h2_title = get_field('h2_follow_us');
            if (!empty($h2_title)) : 
        ?>
        <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
            <?php get_template_part('template-parts/h2-title-v2', null,[
                'title' => $h2_title,
            ]); ?>
        </div>
        <?php endif; ?>

        <!-- content -->
        <?php
        $layout = get_field('layout_direction') ?: 'follow-us';
        $style_variant = '';
        if ($layout === 'our-mission') {
            $style_variant = $classes['our-mission'] ?? 'our-mission';
        } elseif ($layout === 'our-vision') {
            $style_variant = $classes['our-vision'] ?? 'our-vision';
        } elseif ($layout === 'follow-us') {
            $style_variant = $classes['follow-us'] ?? 'follow-us';
        }
        ?>
        
        <div class="<?php echo esc_attr(($classes['variations-wrapper'] ?? '') . ' ' . $style_variant); ?>">
            <div>
                <p><?php echo get_field('left_field') ?></p>
                <p><?php echo $layout ?></p>
                <p><?php echo $style_variant ?></p>
            </div>
            <div>
                <p><?php echo get_field('right_field') ?></p>
            </div>
        </div>
    </div>
</section>