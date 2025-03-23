<?php
wp_enqueue_style('yellow-link-style', get_template_directory_uri() . '/assets/styles/template-parts/yellow-link.css', [], '1.0');

$link = isset($args['link']) ? $args['link'] : '#';
$link_text = isset($args['link_text']) ? $args['link_text'] : 'click-link';
$link_class = isset($args['link_class']) ? $args['link_class'] : '';
$target = isset($args['target']) ? $args['target'] : '';
?>

<a class="optional-link <?php echo esc_attr($link_class); ?>" href="<?php echo esc_url($link); ?>" target="<?php echo esc_url($target); ?>">
    <?php echo esc_html($link_text); ?>
</a>