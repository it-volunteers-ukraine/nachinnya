<?php
$default_classes = [
    'projects__section' => 'projects__section',
    'projects' => 'projects',
    'projects-title' => 'projects-title',
    'category-block' => 'category-block',
    'category-posts' => 'category-posts',
    'test-wrap' => 'test-wrap',
    'toggle-posts-btn' => 'toggle-posts-btn',
    'icon-open-close' => 'icon-open-close',
    'close' => 'close',
    'category-header' => 'category-header',
    'category-header-wrap' => 'category-header-wrap',
    'project__item' => 'project__item',
    'category-gallery' => 'category-gallery',
    'category-gallery-img' => 'category-gallery-img',
    'project-slider' => 'project-slider',
    'swipper-wrapper' => 'swipper-wrapper',
    'swiper-pagination' => 'swiper-pagination',
    'swiper-button-prev' => 'swiper-button-prev',
    'swiper-button-next' => 'swiper-button-next',
    'swiper-wrapper' => 'swiper-wrapper',
    'btn-in-circle' => 'btn-in-circle',
    'icon-in-circle' => 'icon-in-circle',
    'icon-arrow' => 'icon-arrow',
    'item-content' => 'item-content',
    'item-title-wrap' => 'item-title-wrap',
    'item-title' => 'item-title',
    'item-date-location' => 'item-date-location',
    'item-date' => 'item-date',
    'item-location' => 'item-location',
    'item-text' => 'item-text',
    'text-content' => 'text-content',
    'collapse' => 'collapse',
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

$is_debug = get_field('debug_page');
$team_block = null;
// $team_block = get_field('team_block');
// $welcome  = get_field('welcome_to_command');
// $count = count($team_block) == 5 ? 'count-5' : '';

$category_list = get_field('category_gallery');

// echo '<pre>';
// echo var_dump($category_list);
// echo var_dump($category_list);
// echo var_dump($team_block);
// print_r($team_block);
// var_export($team_block);
// echo '</pre>';
?>

<section class="section <?php echo esc_attr($classes['projects__section']); ?>">
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
        <?php if (count($category_list) > 0) : ?>
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
                            'post_status'    => 'publish',  // только опубликованные!
                            'orderby'        => 'date',     // сортировка по дате
                            'order'          => 'DESC',     // от новых к старым (убывание)
                        ]
                    ]
                ]);
                // echo '<pre>';
                // echo 'category_id: ' . ($category_id) . '<br>';
                // echo 'Count: ' . $category_term->count;
                // echo 'category_term: '. var_dump($category_term) . '<br>';
                // echo 'posts:' . var_dump($posts);
                // var_dump($category_id);
                // var_dump($gallery_list);
                // echo var_dump($category_list);
                // echo var_dump($team_block);
                // print_r($team_block);
                // var_export($team_block);
                // echo '</pre>';

                $class_close = esc_attr($classes['close']);

                $is_close = $counter > 0 ? $class_close : '';
                // $is_close = $class_close;

                // $is_close = $counter === 0 ? ' close' : '';
                // $class_is_close = esc_attr($classes[$is_close]); 
                // echo 'is_close: '. $is_close. '<br>';
                // echo 'counter: '. $counter. '<br>';
                $class_btn = esc_attr($classes['toggle-posts-btn']) . ' ' . $is_close;
                // $str_class = echo $class_close;
                ?>
                <?php if (count($posts) > 0) : ?>
                    <div class="<?php echo esc_attr($classes['category-block']); ?> " data-category-block>
                        <div class="<?php echo esc_attr($classes['category-header-wrap']); ?>">
                            <div class="<?php echo esc_attr($classes['category-header']); ?>">
                                <h3><?php echo esc_html($category_name); ?></h3>

                                <button class="<?php echo $class_btn; ?> <?php echo esc_attr($classes['btn-in-circle']); ?>" type="button"
                                    onclick="projectsCategoryHidden(event, '<?php echo esc_attr($class_close); ?>')">
                                    <svg class="<?php echo esc_attr($classes['icon-arrow']); ?>">
                                        <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-nav-arrow-right"></use>
                                    </svg>
                                    <!-- <img id="icon-open" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_open-close.svg" class="<?php echo esc_attr($classes['icon-open-close']); ?>" data-open=""> -->
                                </button>
                            </div>

                            <!-- Галерея категории -->
                            <div class="<?php echo esc_attr($classes['category-gallery']); ?> <?php echo esc_attr($is_close); ?> " data-category-gallery>
                                <?php if (!empty($gallery_list)) :
                                    foreach ($gallery_list as $image) : ?>
                                        <?php
                                        $photo_item = $image;
                                        $photo_url = $photo_item['sizes']['medium_large'];
                                        $photo_full_url = $photo_item['url'];
                                        $photo_alt = $photo_item['alt'] ? $photo_item['alt'] : $photo_item['title'];
                                        $photo_class = esc_attr($classes['category-gallery-img']);
                                        $photo_id = esc_html($category_name);
                                        get_template_part('template-parts/photo-hor-small', null, [
                                            'id' => $photo_id,
                                            'photo_url' => $photo_url,
                                            'photo_full_url' => $photo_full_url,
                                            'photo_alt' => $photo_alt,
                                            'my_class' => $photo_class
                                        ]); ?>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>

                        <!-- Список постов этой категории -->
                        <div class="<?php echo esc_attr($classes['category-posts']); ?> <?php echo esc_attr($is_close); ?>" data-category-posts>

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
                                        <div class="<?php echo esc_attr($classes['swipper-wrapper']); ?>">
                                            <div class="swiper <?php echo esc_attr($classes['project-slider']); ?>">
                                                <div class="swiper-wrapper <?php echo esc_attr($classes['swiper-wrapper']); ?>">
                                                    <?php foreach ($gallery as $item_img) : ?>
                                                        <?php

                                                        $photo_id = esc_html($title);
                                                        // $photo_item = $gallery[0];
                                                        $photo_item = $item_img;
                                                        $photo_url = $photo_item['sizes']['medium_large'];
                                                        $photo_full_url = $photo_item['url'];
                                                        $photo_alt = $photo_item['alt'] ? $photo_item['alt'] : $photo_item['title'];
                                                        // $photo_class = esc_attr($classes['category-gallery-img']);

                                                        get_template_part('template-parts/photo-left', null, [
                                                            'id' => $photo_id,
                                                            'photo_url' => $photo_url,
                                                            'photo_full_url' => $photo_full_url,
                                                            'photo_alt' => $photo_alt,
                                                            'my_class' => 'swiper-slide'
                                                        ]);
                                                        ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="swiper-pagination <?php echo esc_attr($classes['swiper-pagination']); ?>"></div>
                                                <div class="swiper-button-left <?php echo esc_attr($classes['btn-in-circle']); ?> <?php echo esc_attr($classes['swiper-button-prev']); ?>">
                                                    <svg class="<?php echo esc_attr($classes['icon-arrow']); ?>">
                                                        <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-nav-arrow-left"></use>
                                                    </svg>
                                                </div>
                                                <div class="swiper-button-right <?php echo esc_attr($classes['btn-in-circle']); ?> <?php echo esc_attr($classes['swiper-button-next']); ?>">
                                                    <svg class="<?php echo esc_attr($classes['icon-arrow']); ?>">
                                                        <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-nav-arrow-right"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="<?php echo esc_attr($classes['item-content']); ?>">
                                            <div class="<?php echo esc_attr($classes['item-title-wrap']); ?>">
                                                <h4 class="<?php echo esc_attr($classes['item-title']); ?>"><?php echo esc_html($title); ?></h4>
                                                <div class="<?php echo esc_attr($classes['item-date-location']); ?>">
                                                    <p class="<?php echo esc_attr($classes['item-date']); ?>"><?php echo esc_html($date); ?></p>
                                                    <p class="<?php echo esc_attr($classes['item-location']); ?>"><?php echo esc_html($location); ?></p>
                                                </div>

                                            </div>
                                            <div data-item-text class="<?php echo esc_attr($classes['item-text']); ?>">
                                                <div class="<?php echo esc_attr($classes['text-wrap']); ?>">
                                                    <div data-text-content data-isClamp='true' class="<?php echo esc_attr($classes['collapse']); ?> <?php echo esc_attr($classes['text-content']); ?>">
                                                        <?php echo $text; ?>
                                                    </div>
                                                    <button
                                                        class="<?php echo esc_attr($classes['item-text-more']); ?>"
                                                        data-btn-more
                                                        onclick="toggleTextMore(event, '');"
                                                        data-clamp=10
                                                        data-text-more="<?php echo esc_attr($project_text_more); ?>"
                                                        data-text-less="<?php echo esc_attr($project_text_less); ?>"
                                                        data-clamping=yes>
                                                        <?php echo esc_html($project_text_more) ?>
                                                    </button>
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
                <?php endif; ?>
                <?php $counter++; ?>
            <?php endforeach; ?>
        <?php endif;; ?>

    </div>
</section>