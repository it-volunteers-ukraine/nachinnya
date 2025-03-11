<!-- 
 Якщо передати id, то буде розмітка с lightbox. ID потрыбен для групування фото для виводу 
 Також можно передати photo_obj, це для показу великих фото в lightbox
 -->

<?php
wp_enqueue_style('parts-photo-hor-small-style', get_template_directory_uri() . '/assets/styles/template-parts/photo-hor-small.css', [], '1.0');

$photo_url = isset($args['photo_url']) ? $args['photo_url'] : get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
$photo_obj = isset($args['photo_obj']) ? $args['photo_obj'] : null;
$photo_alt = isset($args['photo_alt']) ? $args['photo_alt'] : 'alt';
$my_class = isset($args['my_class']) ? $args['my_class'] : '';

if ($photo_obj){
    $photo_full = $photo_obj;
    echo $photo_obj; 
} else {
    $photo_full = $photo_url;
}

$is_lightbox = isset($args['is_lightbox']) ? $args['is_lightbox'] : false;
$target_lightbox = isset($args['id']) ? $args['id'] : $photo_url ;

if ($is_lightbox) {
    wp_enqueue_style( 'lightbox2-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css' );
    wp_enqueue_script( 'lightbox2-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), null, true );
}

?>


<!-- 
<div class='small-img-frame <?php echo $my_class; ?>'>
    <div class='small-img-wrap'>
        <img src="<?php echo $photo_url; ?>" class="small-img " alt="<?php echo $photo_alt; ?>" ?>
    </div>
</div> -->

<div class='small-img-frame <?php echo esc_attr($my_class); ?>'>
    <div class='small-img-wrap'>
        <?php if ($is_lightbox): ?>
            <a href="<?php echo esc_url($photo_url); ?>" data-lightbox="<?php echo esc_attr($target_lightbox); ?>">
                <img src="<?php echo esc_url($photo_url); ?>" class="small-img" alt="<?php echo esc_attr($photo_alt); ?>">
            </a>
        <?php else: ?>
            <img src="<?php echo esc_url($photo_url); ?>" class="small-img" alt="<?php echo esc_attr($photo_alt); ?>">
        <?php endif; ?>
    </div>
</div>