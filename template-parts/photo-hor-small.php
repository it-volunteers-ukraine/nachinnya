<!-- 
 Якщо передати id, то буде розмітка с lightbox. ID потрыбен для групування фото для виводу
 Якщо в id передати url photo, то в lightbox відкриєтся одне фото 
 Також можно передати photo_full_url, це для показу великих фото в lightbox, інакше буде звичайне photo_url
 -->

<?php
wp_enqueue_style('parts-photo-hor-small-style', get_template_directory_uri() . '/assets/styles/template-parts/photo-hor-small.css', [], '1.0');

$photo_id = isset($args['id']) ? $args['id'] : null;
$photo_url = isset($args['photo_url']) ? $args['photo_url'] : get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';
$photo_full_url = isset($args['photo_full_url']) ? $args['photo_full_url'] : null;
$photo_alt = isset($args['photo_alt']) ? $args['photo_alt'] : 'alt';
$my_class = isset($args['my_class']) ? $args['my_class'] : '';

if ($photo_full_url){
    $photo_full = $photo_full_url;
} else {
    $photo_full = $photo_url;
}

$is_lightbox = $photo_id ? true : false;
$target_lightbox = $photo_id ? $photo_id : $photo_url ;

// if ($is_lightbox) {
//     wp_enqueue_style( 'lightbox2-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css' );
//     wp_enqueue_script( 'lightbox2-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), null, true );
// }

?>

<div class='small-img-frame <?php echo esc_attr($my_class); ?>'>
    <div class='small-img-wrap'>
        <?php if ($is_lightbox): ?>
            <a href="<?php echo esc_url($photo_full); ?>" data-lightbox="<?php echo esc_attr($target_lightbox); ?>">
                <img src="<?php echo esc_url($photo_url); ?>" class="small-img" alt="<?php echo esc_attr($photo_alt); ?>">
            </a>
        <?php else: ?>
            <img src="<?php echo esc_url($photo_url); ?>" class="small-img" alt="<?php echo esc_attr($photo_alt); ?>">
        <?php endif; ?>
    </div>
</div>