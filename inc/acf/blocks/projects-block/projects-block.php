<?php
$default_classes = [
    'projects-title' => 'projects-title',
    'test-wrap' => 'test-wrap',
    'toggle-posts-btn' => 'toggle-posts-btn',
    'icon-open-close' => 'icon-open-close',
    'open' => 'open',


    // 'team-sky-s' => 'team-sky-s',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['projects-block'] ?? []);
}

$current_id = get_the_ID();
$is_debug = get_field('debug_page');
$team_block = null;
// $team_block = get_field('team_block');
// $welcome  = get_field('welcome_to_command');
// $count = count($team_block) == 5 ? 'count-5' : '';

$category_list = get_field('category_gallery', $current_id);

// echo '<pre>';
// echo var_dump($category_list);
// echo var_dump($team_block);
// print_r($team_block);
// var_export($team_block);
// echo '</pre>';
?>

<section class="section">
    <div class="container <?php echo $is_debug ? 'debug-red ' : ''; ?>">
        <div class="<?php echo esc_attr($classes['projects-title']); ?>">
            <?php get_template_part('template-parts/h2-title', null, []); ?>
        </div>

        <?php $counter = 0; // счетчик категорий 
        ?>

        <?php foreach ($category_list as $category_item) : ?>
            <?php
            $gallery_list = $category_item['gallery'];
            $category_id = $category_item['category'];

            $category_term = get_term($category_id, 'project-category');
            $category_name = $category_term->name;

            $posts = get_posts([
                'post_type'      => 'your_post_type',  // Замени на твой пост-тайп
                'posts_per_page' => -1,
                'tax_query'      => [
                    [
                        'taxonomy' => 'project-category',
                        'field'    => 'term_id',
                        'terms'    => $category_id,
                    ]
                ]
            ]);
            $class_open = esc_attr($classes['open']);
            
            $is_open = $counter === 0 ? $class_open : '';
            // $is_open = $counter === 0 ? ' open' : '';
            // $class_is_open = esc_attr($classes[$is_open]); 
            // echo 'is_open: '. $is_open. '<br>';
            // echo 'counter: '. $counter. '<br>';
            $class_btn = esc_attr($classes['toggle-posts-btn']) . ' ' . $is_open;
            // $str_class = echo $class_open;
            ?>

            <div class="category-block <?php echo esc_attr($is_open); ?>">
                <div class="category-header">
                    <h3><?php echo esc_html($category_name); ?></h3>

                    <button class="<?php echo $class_btn; ?>" type="button" onclick="projectsCategoryHidden(event, '<?php echo $class_open; ?>' )"> 
                        <img id="icon-open" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_open-close.svg" class="<?php echo esc_attr($classes['icon-open-close']); ?>" data-open="">
                    </button>
                </div>

                <!-- Галерея категории -->
                <div class="category-gallery">
                    <?php if (!empty($gallery_list)) :
                        foreach ($gallery_list as $image) : ?>
                            <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endforeach;
                    endif; ?>
                </div>

                <!-- Список постов этой категории -->
                <div class="category-posts" style="<?php echo $is_open ? 'display:block;' : 'display:none;'; ?>">
                    <?php if (!empty($posts)) :
                        foreach ($posts as $post) :
                            setup_postdata($post); ?>
                            <div class="post-item">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>">Подробнее</a>
                            </div>
                        <?php endforeach;
                        wp_reset_postdata();
                    else : ?>
                        <p>Нет постов в этой категории.</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php $counter++; ?>
        <?php endforeach; ?>

    </div>
</section>