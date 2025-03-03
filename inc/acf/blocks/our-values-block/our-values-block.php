<?php
$default_classes = [
    'background' => 'background',
    'title-template-part' => 'title-template-part',
    'values' => 'values',
    'value-item' => 'value-item',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['our-values-block'] ?? []);
}
?>

<section class='section'>
    <div class='<?php echo esc_attr($classes['background']); ?>'>
        <div class='container'>
            <!-- h2_title -->
            <?php
                $h2_title = get_field('h2_title_our_values');
                if (!empty($h2_title)) : 
            ?>
                <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                    <?php get_template_part('template-parts/h2-title-yellow', null, ['title' => $h2_title]); ?>
                </div>
            <?php endif; ?>
            <div class='<?php echo esc_attr($classes['values']); ?>'>
                <?php if (have_rows('values')) :
                while (have_rows('values')) : the_row(); ?>
                    <div class='<?php echo esc_attr($classes['value-item']) ?>' style="background-image: url('<?php the_sub_field('value_background'); ?>');">
                        <div class='<?php echo esc_attr($classes['title-wrapper']) ?>'>
                            <h4 class='<?php echo esc_attr($classes['value-title']) ?>'><?php the_sub_field('value_title'); ?></h4>
                        </div>
                        <p><?php the_sub_field('value_description'); ?></p>
                    </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>