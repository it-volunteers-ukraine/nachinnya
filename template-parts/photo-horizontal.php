<?php
wp_enqueue_style('parts-photo-horizontal-style', get_template_directory_uri() . '/assets/styles/template-parts/photo-horizontal.css', [], '1.0');

// $photo_url = $args['photo_url'];
// $photo_url = isset($args['photo_url']) ? $args['photo_url'] : get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
// $photo_alt = $args['photo_alt'];
$photo_url = isset($args['photo_url']) ? $args['photo_url'] : get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
$photo_alt = isset($args['photo_alt']) ? $args['photo_alt'] : 'alt';
$my_class = isset($args['my_class']) ? $args['my_class'] : '';

?>

<div class='hor-img-frame <?php echo $my_class; ?>'>
    <div class='hor-img-wrap'>
        <img src="<?php echo $photo_url; ?>" class="hor-img " alt="<?php echo $photo_alt; ?>" ?>
    </div>
</div>