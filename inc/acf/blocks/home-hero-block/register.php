<?php
acf_register_block_type(array(
  'name'            => 'home-hero-block',
  'title'           => __('Home Hero Block'),
  'description'     => __('Блок секції Hero'),
  'render_template' => acf_theme_blocks_path('home-hero-block/home-hero-block.php'),
  'enqueue_style'   => get_template_directory_uri() . '/assets/blocks/styles/home-hero-block/home-hero-block.css',
  'enqueue_script'  => get_template_directory_uri() . '/assets/blocks/scripts/home-hero-block/home-title-block.js',
  'category'        => 'custom-blocks',
));
