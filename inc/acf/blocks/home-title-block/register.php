<?php
acf_register_block_type(array(
  'name'            => 'home-title-block',
  'title'           => __('Home Title Block'),
  'description'     => __('Блок із заголовком для головної сторінки'),
  'render_template' => acf_theme_blocks_path('home-title-block/home-title-block.php'),
  'enqueue_style'   => get_template_directory_uri() . '/assets/blocks/styles/home-title-block/home-title-block.css',
  'category'        => 'custom-blocks',
));
