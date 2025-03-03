<?php
acf_register_block_type(array(
    'name' => 'history-section-block',
    'title' => __('History section block'),
    'description' => __('History section block'),
    'render_template' => acf_theme_blocks_path('history-section-block/history-section-block.php'),
    'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/history-section-block/history-section-block.css',
    'enqueue_script' => get_template_directory_uri() . '/assets/blocks/scripts/history-section-block/history-section-block.js',
    'category' => 'custom-blocks',
));
