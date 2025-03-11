<?php
acf_register_block_type(array(
  'name'              => 'support-home',
  'title'             => __('Support Home Block'),
  'render_template'   => get_template_directory() . '/inc/acf/blocks/support-home/support-home.php',
  'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/support-home/support-home.css',
  'category'          => 'custom-blocks',
  'icon'              => 'admin-comments',
));
