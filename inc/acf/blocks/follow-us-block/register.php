<?php
acf_register_block_type(array(
    'name' => 'follow-us-block',
    'title' => __('Follow us etc. block'),
    'description' => __('Block with possibility switch left-right and link'),
    'render_template' => acf_theme_blocks_path('follow-us-block/follow-us-block.php'),
    'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/follow-us-block/follow-us-block.css',
    'enqueue_script' => get_template_directory_uri() . '/assets/blocks/scripts/follow-us-block/follow-us-block.js',
    'category' => 'custom-blocks',
));
