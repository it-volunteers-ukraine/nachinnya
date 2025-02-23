<?php
acf_register_block_type(array(
    'name' => 'teams-block',
    'title' => __('Teams Block'),
    'description' => __('Block Teams'),
    'render_template' => acf_theme_blocks_path('teams-block/teams-block.php'),
    'enqueue_style' => get_template_directory_uri() . '/assets/blocks/styles/teams-block/teams-block.css',
    'enqueue_script' => get_template_directory_uri() . '/assets/blocks/scripts/teams-block/teams-block.js',
    'category' => 'custom-blocks',
));
