<?php

wp_enqueue_style('h2-title-v2-style', get_template_directory_uri() . '/assets/styles/template-parts/h2-title-v2.css', [], '1.0');

    $h2_title = $args['title'] ?? '';
    $custom_text_class = $args['custom_text_class'] ?? '';
    $custom_elements_class = $args['custom_elements_class'] ?? '';

    if (!empty($h2_title)) : 
?>
    <div class="h2-title-v2-wrapper <?php echo esc_attr($custom_elements_class); ?>">
        <div class="h2-title-v2-elements-container">
            <h2 class="h2-title-v2 <?php echo esc_attr($custom_text_class); ?>"><?php echo esc_html($h2_title); ?></h2>
        </div>
    </div>
<?php endif; ?>