<?php
acf_register_block_type(array(
    'name'              => 'projects-block',
    'title'             => __('Projects Block'),
    'description'       => __('Block Projects'),
    'render_template'   => acf_theme_blocks_path('projects-block/projects-block.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/projects-block/projects-block.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/projects-block/projects-block.js',
    'category'          => 'custom-blocks',
));
?>