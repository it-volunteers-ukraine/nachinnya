<?php
$default_classes = [
    'team-wrap' => 'team-wrap',
    'team-list' => 'team-list',
    'team-item' => 'team-item',
    'team-img-frame' => 'team-img-frame',
    'team-img-wrap' => 'team-img-wrap',
    'team-img' => 'team-img',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['teams-block'] ?? []);
}

// wp_enqueue_style('h2-title-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/h2-title.css', array('main'));
$current_id = get_the_ID();
// echo $current_id;
// $aaa = get_field('h2_title');
?>

<section class="section">
    <div class="container">
        <?php get_template_part('template-parts/h2-title', null, []); ?>
        <div class="<?php echo esc_attr($classes['team-wrap']); ?>">
            <ul class="<?php echo esc_attr($classes['team-list']); ?>">
                <!-- <li class="team-item"><img src="<?php echo get_field('photo1'); ?>" alt="" class="<?php echo esc_attr($classes['team-img']); ?>"></li> -->
                <li class="debug-green <?php echo esc_attr($classes['team-item']); ?>">
                    <?php
                    $photo_url = get_template_directory_uri() . '/assets/images/teams/t1.jpg';
                    $photo_alt = 'alt';
                    get_template_part('template-parts/photo-vertical', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => 'test-class']);
                    ?>
                </li>
                <li class="debug-red <?php echo esc_attr($classes['team-item']); ?>">
                    <?php
                    $photo_alt = 'alt';
                    $photo_url = get_template_directory_uri() . '/assets/images/teams/t6-g.jpg';
                    get_template_part('template-parts/photo-horizontal', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => 'test-class']);
                    ?>
                </li>
                <li class="debug-blue <?php echo esc_attr($classes['team-item']); ?>">
                    <?php
                    $photo_alt = 'alt';
                    $photo_url = get_template_directory_uri() . '/assets/images/teams/t2.jpg';
                    get_template_part('template-parts/photo-vertical', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => 'test-class']);
                    ?>
                </li>
            </ul>
        </div>
    </div>

</section>