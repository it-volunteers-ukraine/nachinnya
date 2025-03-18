<?php
$default_classes = [
    'projects' => 'projects',
    'projects-title' => 'projects-title',
    'test-wrap' => 'test-wrap',
    'toggle-posts-btn' => 'toggle-posts-btn',
    'icon-open-close' => 'icon-open-close',
    'open' => 'open',
    'category-header' => 'category-header',
    'category-header-wrap' => 'category-header-wrap',
    'project__item' => 'project__item',
    'category-gallery' => 'category-gallery',
    'project-slider' => 'project-slider',
    'item-content' => 'item-content',
    'item-title-wrap' => 'item-title-wrap',
    'item-title' => 'item-title',
    'item-date-location' => 'item-date-location',
    'item-date' => 'item-date',
    'item-location' => 'item-location',
    'item-text' => 'item-text',
    'item-text-more' => 'item-text-more',
    'item-element' => 'item-element',

    'text-wrap' => 'text-wrap',


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
    <div class="container <?php echo $is_debug ? 'debug-red ' : ''; ?> <?php echo esc_attr($classes['projects']); ?>">
        <div class="<?php echo esc_attr($classes['projects-title']); ?>">
            <?php get_template_part('template-parts/h2-title', null, []); ?>
        </div>

        <?php
        $counter = 0; // счетчик категорий 
        $project_text_more = get_field('buttont_more_text');
        $project_text_less = get_field('buttont_less_text');
        // echo 'projects_text_more: ' . $projects_text_more . '<br>';
        ?>


        <?php foreach ($category_list as $category_item) : ?>
            <?php
            $gallery_list = $category_item['gallery'];
            $category_id = $category_item['category'];

            $category_term = get_term($category_id, 'project-category');
            $category_name = $category_term->name;

            $posts = get_posts([
                'post_type'      => 'project',  // Замени на твой пост-тайп
                'posts_per_page' => -1,
                'tax_query'      => [
                    [
                        'taxonomy' => 'project-category',
                        'field'    => 'term_id',
                        'terms'    => $category_id,
                    ]
                ]
            ]);
            // echo '<pre>';
            // echo 'category_id: ' . ($category_id) . '<br>';
            // echo 'Count: ' . $category_term->count;
            // echo 'category_term: '. var_dump($category_term) . '<br>';
            // echo 'posts:' . var_dump($posts);
            // var_dump($category_id);
            // echo var_dump($category_list);
            // echo var_dump($team_block);
            // print_r($team_block);
            // var_export($team_block);
            // echo '</pre>';

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
                <div class="<?php echo esc_attr($classes['category-header-wrap']); ?>">
                    <div class="<?php echo esc_attr($classes['category-header']); ?>">
                        <h3><?php echo esc_html($category_name); ?></h3>

                        <button class="<?php echo $class_btn; ?>" type="button" onclick="projectsCategoryHidden(event, '<?php echo $class_open; ?>' )">
                            <img id="icon-open" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_open-close.svg" class="<?php echo esc_attr($classes['icon-open-close']); ?>" data-open="">
                        </button>
                    </div>

                    <!-- Галерея категории -->
                    <div class="<?php echo esc_attr($classes['category-gallery']); ?>">
                        <?php if (!empty($gallery_list)) :
                            foreach ($gallery_list as $image) : ?>
                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>

                <!-- Список постов этой категории -->
                <div class="category-posts" style="<?php echo $is_open ? 'display:block;' : 'display:none;'; ?>">
                    <?php if (!empty($posts)) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php
                            $post_id = $post->ID;
                            $acf_data = [
                                'gallery'       => get_field('gallery', $post_id),
                                'title'         => get_field('title', $post_id),
                                'date'          => get_field('date', $post_id),
                                'location'      => get_field('location', $post_id),
                                'location_link' => get_field('location_link', $post_id),
                                'text'          => get_field('text', $post_id),
                            ];
                            $gallery = get_field('gallery', $post_id);
                            $title = get_field('title', $post_id);
                            $date = get_field('date', $post_id);
                            $location = get_field('location', $post_id);
                            $location_link = get_field('location_link', $post_id);
                            $text = get_field('text', $post_id);
                            // echo '<pre>';
                            // var_dump($acf_data);
                            // echo '</pre>';
                            // echo "<br>";
                            // setup_postdata($post); 
                            ?>
                            <div class="<?php echo esc_attr($classes['project__item']); ?>">
                                <div class="<?php echo esc_attr($classes['project-slider']); ?>">
                                    <?php
                                    $photo_item = $gallery[0];
                                    $photo_url = $photo_item['sizes']['medium_large'];
                                    $photo_alt = $photo_item['alt'] ? $photo_item['alt'] : $photo_item['title'];
                                    $photo_alt = $photo_item['alt'] ? $photo_item['alt'] : $photo_item['title'];

                                    get_template_part('template-parts/photo-left', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => '']);
                                    ?>
                                </div>
                                <div class="<?php echo esc_attr($classes['item-content']); ?>">
                                    <div class="<?php echo esc_attr($classes['item-title-wrap']); ?>">
                                        <h4 class="<?php echo esc_attr($classes['item-title']); ?>"><?php echo esc_html($title); ?></h4>
                                        <div class="<?php echo esc_attr($classes['item-date-location']); ?>">
                                            <p class="<?php echo esc_attr($classes['item-date']); ?>"><?php echo esc_html($date); ?></p>
                                            <p class="<?php echo esc_attr($classes['item-location']); ?>"><?php echo esc_html($location); ?></p>
                                        </div>
    
                                    </div>
                                    <div class="<?php echo esc_attr($classes['item-text']); ?>">
                                        <div class="<?php echo esc_attr($classes['text-wrap']); ?>">
                                            <?php echo $text; ?>
                                            <button class="<?php echo esc_attr($classes['item-text-more']); ?>"><?php echo esc_html($project_text_more) ?></button>
                                        </div>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/loop-arrow-yellow.svg" class="<?php echo esc_attr($classes['item-element']); ?>" alt="">
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p>Нет постов в этой категории.</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php $counter++; ?>
        <?php endforeach; ?>

    </div>
</section>