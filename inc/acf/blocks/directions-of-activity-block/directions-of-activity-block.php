<?php
$default_classes = [
    'title-template-part' => 'title-template-part',
    'bg-wrapper' => 'bg-wrapper'
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['directions-of-activity-block'] ?? []);
}
?>

<section class='section'>
    <div class="<?php echo esc_attr($classes['ornament-wrapper']); ?>">
        <div class="<?php echo esc_attr($classes['bg-wrapper']); ?>">
            <div class='container'>
                <!-- h2_title -->
                <?php
                    $h2_title = get_field('h2_title_directions_of_activity');
                    if (!empty($h2_title)) : 
                ?>
                    <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                        <?php get_template_part('template-parts/h2-title-v2', null,[
                            'title' => $h2_title,
                            'custom_text_class' => 'yellow-yellow-title',
                            'custom_elements_class' => 'yellow-elements'
                            ]); ?>
                    </div>
                <?php endif; ?>
                <!-- content -->
                <?php if (have_rows('directions_descriptions')) : ?>
                    <div class="<?php echo esc_attr($classes['directions-and-descriptions-wrapper']); ?>">
                        <?php while (have_rows('directions_descriptions')) : the_row(); ?>
                            <div class="<?php echo esc_attr($classes['directions-and-descriptions']); ?>">
                                <div class="<?php echo esc_attr($classes['direction']); ?>">
                                    <h4><?php echo the_sub_field('direction_title') ?></h4>
                                </div>
                                <div class="<?php echo esc_attr($classes['description']); ?>">
                                    <p><?php echo the_sub_field('direction_description') ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>