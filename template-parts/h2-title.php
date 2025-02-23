<?php

wp_enqueue_style('h2-title-style', get_template_directory_uri() . '/assets/styles/template-parts/h2-title.css', [], '1.0');

$h2_title = get_field('h2_title');

if (!empty($h2_title)) :
?>
    <div class="h2-title-wrapper">
        <h2 class="h2-title"><?php echo esc_html($h2_title); ?></h2>
    </div>
<?php endif; ?>