<?php
acf_register_block_type(array(
    'name' => 'directions-of-activity-block',
    'title' => __('Directions of activity block'),
    'description' => __('directions-of-activity-block'),
    'render_template' => acf_theme_blocks_path('directions-of-activity-block/directions-of-activity-block.php'),
    'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/directions-of-activity-block/directions-of-activity-block.css',
    'enqueue_script' => get_template_directory_uri() . '/assets/blocks/scripts/directions-of-activity-block/directions-of-activity-block.js',
    'category' => 'custom-blocks',
));
