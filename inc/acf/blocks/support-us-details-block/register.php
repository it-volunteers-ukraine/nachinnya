<?php
acf_register_block_type(array(
    'name' => 'support-us-details-block',
    'title' => __('support us details block'),
    'description' => __('Support us block with details'),
    'render_template' => acf_theme_blocks_path('support-us-details-block/support-us-details-block.php'),
    'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/support-us-details-block/support-us-details-block.css',
    'enqueue_script' => get_template_directory_uri() . '/assets/blocks/scripts/support-us-details-block/support-us-details-block.js',
    'category' => 'custom-blocks',
));
