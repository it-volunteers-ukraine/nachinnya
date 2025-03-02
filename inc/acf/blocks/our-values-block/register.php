<?php
acf_register_block_type(array(
    'name'              => 'our-values-block',
    'title'             => __('Our Values Block'),
    'description'       => __('Our Values'),
    'render_template'   => acf_theme_blocks_path('our-values-block/our-values-block.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/our-values-block/our-values-block.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/our-values-block/our-values-block.js',
    'category'          => 'custom-blocks',
));
?>