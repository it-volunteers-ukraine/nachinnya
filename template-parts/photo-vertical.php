<?php
wp_enqueue_style('parts-photo-vertical-style', get_template_directory_uri() . '/assets/styles/template-parts/photo-vertical.css', [], '1.0');

$photo_url = isset($args['photo_url']) ? $args['photo_url'] : get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
$photo_alt = isset($args['photo_alt']) ? $args['photo_alt'] : 'alt';
$my_class = isset($args['my_class']) ? $args['my_class'] : '';
?>

<div class='vert-img-frame <?php echo $my_class; ?>'>
    <div class='vert-img-wrap'>
        <img src="<?php echo $photo_url; ?>" class="vert-img " alt="<?php echo $photo_alt; ?>" ?>
    </div>
</div>