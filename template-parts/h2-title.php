<?php 
    $current_id = get_the_ID();
    $h2_title = get_field('h2_title', $current_id);
    if (!empty($h2_title)) : 
?>
    <div class="h2-title-wrapper">
        <h2 class="h2-title"><?php echo esc_html($h2_title); ?></h2>
    </div>
<?php endif; ?>