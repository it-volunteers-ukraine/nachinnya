<?php
wp_enqueue_style('parts-photo-horizontal-style', get_template_directory_uri() . '/assets/styles/template-parts/photo-horizontal.css', [], '1.0');

$photo_url = $args['photo_url'];
$photo_alt = $args['photo_alt'];
?>

<div class='team-img-frame-hor'>
    <div class='team-img-wrap-hor'>
        <img src="<?php echo $photo_url; ?>" class="team-img" alt="<?php echo $photo_alt; ?>" ?>
    </div>
</div>