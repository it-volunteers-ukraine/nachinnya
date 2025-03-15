<?php
acf_register_block_type(array(
    'name' => 'events-slider',
    'title' => __('Events in slider'),
    'description' => __('Events that are shown in the slider one by one'),
    'render_template' => acf_theme_blocks_path('events-slider/events-slider.php'),
    'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/events-slider/events-slider.css',
    'enqueue_script' => get_template_directory_uri() . '/assets/blocks/scripts/events-slider/events-slider.js',
    'category' => 'custom-blocks',
));
