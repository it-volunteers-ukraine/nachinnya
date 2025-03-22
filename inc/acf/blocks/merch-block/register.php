<?php
acf_register_block_type(array(
    'name'              => 'merch-block',
    'title'             => __('Merch block'),
    'description'       => __('Block with light-box'),
    'render_template'   => acf_theme_blocks_path('merch-block/merch-block.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/merch-block/merch-block.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/merch-block/merch-block.js',
    'category'          => 'custom-blocks',
));
?>