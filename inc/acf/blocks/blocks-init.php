<?php

function acf_theme_blocks_path($path = '')
{
    return get_template_directory() . '/inc/acf/blocks/' . $path;
}

function gt_block_category_init($categories, $post)
{
    return array_merge(
        [
            [
                'slug' => 'custom-blocks',
                'title' => __('Custom Blocks', 'it_volunteers_blocks_theme'),
            ],
            [
                'slug' => 'posts-blocks',
                'title' => __('Posts Blocks', 'it_volunteers_blocks_theme'),
            ],
        ],
        $categories
    );
}
add_filter('block_categories', 'gt_block_category_init', 10, 2);

/* Register acf blocks */
function it_volunteers_acf_blocks_init()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        $block_folders = glob(acf_theme_blocks_path() . '*', GLOB_ONLYDIR);
        foreach ($block_folders as $block_path) {
            $register_file = $block_path . '/register.php';

            if (file_exists($register_file)) {
                include_once $register_file;
            }
        }

        // Register block for rendering the latest posts
        acf_register_block_type(array(
            'name'              => 'latest-posts',
            'title'             => __('Latest Posts'),
            'description'       => __('Block for rendering the latest posts'),
            'render_template'   => acf_theme_blocks_path('latest-posts/latest-posts.php'),
            'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/latest-posts/latest-posts.css',
            'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/latest-posts/latest-posts.js',
            'category'          => 'posts-blocks',
            'icon'              => 'admin-post',
            'keywords'          => array('posts', 'latest posts', 'blog'),
        ));

        // Register main-section-block
        acf_register_block_type(array(
            'name'              => 'main-section-block',
            'title'             => __('main-section-block'),
            'description'       => __('Block with photo and upper title'),
            'render_template'   => acf_theme_blocks_path('main-section-block/main-section-block.php'),
            'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/main-section-block/main-section-block.css',
            'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/main-section-block/main-section-block.js',
            'category'          => 'custom-blocks',
        ));

        // Register partners-block
        acf_register_block_type(array(
            'name'              => 'partners-block',
            'title'             => __('partners-block'),
            'description'       => __('Block for partners'),
            'render_template'   => acf_theme_blocks_path('partners-block/partners-block.php'),
            'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/partners-block/partners-block.css',
            'category'          => 'posts-blocks',
            'icon'              => 'admin-post',
        ));

        // Register a breadcrumbs block
        acf_register_block_type(array(
            'name'              => 'breadcrumbs',
            'title'             => __('breadcrumbs'),
            'description'       => __('Breadcrumbs'),
            'render_template'   => acf_theme_blocks_path('breadcrumbs/breadcrumbs.php'),
            'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/breadcrumbs/breadcrumbs.css',
            'category'          => 'custom-blocks',
        ));


        // Register an events block
        acf_register_block_type(array(
            'name'              => 'events',
            'title'             => __('Events'),
            'description'       => __('Події'),
            'render_template'   => acf_theme_blocks_path('events/events.php'),
            'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/events/events.css',
            'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/events/events.js',
            'category'          => 'custom-blocks',
            'icon'              => 'admin-post',
        ));


       // Register contacts block
        acf_register_block_type(array(
            'name' => 'contacts-block',
            'title' => __('Contacts Block'),
            'description'       => __('Block contacts'),
            'render_template' =>  acf_theme_blocks_path('contacts-block/contacts-block.php'),
            'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/contacts-block/contacts-block.css',
            'category' => 'custom-blocks',
        ));


    }
}
add_action('acf/init', 'it_volunteers_acf_blocks_init');
