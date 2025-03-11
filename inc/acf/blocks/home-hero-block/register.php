<?php
acf_register_block_type(array(
  'name'              => 'hero-home-block',
  'title'             => __('Hero Home Block'),
  'render_template'   => get_template_directory() . '/inc/acf/blocks/hero-section-block/hero-home.php',
  'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/hero-section-home/contacts-home.css',
  'category'          => 'custom-blocks',
  'icon'              => 'admin-comments',
));
