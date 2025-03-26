<?php
wp_enqueue_style('parts-photo-left-style', get_template_directory_uri() . '/assets/styles/template-parts/photo-left.css', [], '1.0');

$photo_id = isset($args['id']) ? $args['id'] : null;
$photo_url = isset($args['photo_url']) ? $args['photo_url'] : get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
$photo_full_url = isset($args['photo_full_url']) ? $args['photo_full_url'] : null;
$photo_alt = isset($args['photo_alt']) ? $args['photo_alt'] : 'alt';
$my_class = isset($args['my_class']) ? $args['my_class'] : '';

if ($photo_full_url){
    $photo_full = $photo_full_url;
    // echo $photo_full_url; 
} else {
    $photo_full = $photo_url;
}

$is_lightbox = $photo_id ? true : false;
$target_lightbox = $photo_id ? $photo_id : $photo_url ;


?>

<div class='left-img-frame <?php echo esc_attr($my_class); ?>'>
    <div class='left-img-wrap'>
        <?php if ($is_lightbox): ?>
            <a href="<?php echo esc_url($photo_full); ?>" data-lightbox="<?php echo esc_attr($target_lightbox); ?>">
                <img src="<?php echo esc_url($photo_url); ?>" class="left-img" alt="<?php echo esc_attr($photo_alt); ?>">
            </a>
        <?php else: ?>
            <img src="<?php echo esc_url($photo_url); ?>" class="left-img" alt="<?php echo esc_attr($photo_alt); ?>">
        <?php endif; ?>
    </div>
</div>