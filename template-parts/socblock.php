<!-- 
#default value:
#is_main - false
#is_title - false 
-->

<?php
wp_enqueue_style('parts-socblock-style', get_template_directory_uri() . '/assets/styles/template-parts/socblock.css', [], '1.0');

$socseti = get_field('socseti_block', 'option');
// echo var_dump($socseti);
$socseti_title = esc_html(get_field('socseti_title', 'option'));
// echo '<br>' . 'socseti_title = ' . var_dump($socseti_title);

$is_main = isset($args['is_main']) ? (bool) $args['is_main'] : false;
$type_block = $is_main ? 'main' : 'advanced';

$is_title = isset($args['is_title']) ? (bool) $args['is_title'] : false;

?>
<div class="social-wrap <?php echo $type_block; ?>">
    <?php if ($socseti) : ?>

        <?php if ($is_title) : ?>
            <p class="social-title"><?php echo $socseti_title; ?></p>
        <?php endif; ?>
        <div class="social footer__social">
            <?php foreach ($socseti as $item) : ?>
                <a href="<?php echo $item['url']; ?>" class="social-link" target="_blank">
                    <?php
                    $social_sprite_url = esc_url(get_field('social_sprite', 'option')) . "#" . $item['sprite_icon_name'];
                    ?>
                    <svg class="social-icon">
                        <use xlink:href="<?php echo $social_sprite_url; ?>"></use>
                    </svg>
                </a>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>
</div>