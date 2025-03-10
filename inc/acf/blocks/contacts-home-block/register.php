<?php
acf_register_block_type(array(
  'name'              => 'contacts-home',
  'title'             => __('Contacts Home Block'),
  'render_template'   => get_template_directory() . '/inc/acf/blocks/contacts-home-block/contacts-home.php',
  'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/contacts-home/contacts-home.css',
  'category'          => 'custom-blocks',
  'icon'              => 'admin-comments',
));
