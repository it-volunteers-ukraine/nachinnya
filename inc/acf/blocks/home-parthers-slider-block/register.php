<?php
acf_register_block_type(array(
    'name'              => 'home-parthers-slider-block',
    'title'             => __('Home parthers slider block'),
    'description'       => __('Block for Partners on Home page with slider'),
    'render_template'   => acf_theme_blocks_path('home-parthers-slider-block/home-parthers-slider-block.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/home-parthers-slider-block/home-parthers-slider-block.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/home-parthers-slider-block/home-parthers-slider-block.js',
    'category'          => 'custom-blocks',
));
?>