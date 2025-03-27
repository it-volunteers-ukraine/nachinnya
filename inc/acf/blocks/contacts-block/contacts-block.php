<?php
$default_classes = [
    'title-center' => 'title-center',
    'text-content' => 'text-content',
    'contacts' => 'contacts',
    'photo' => 'photo',
    'elem-yellow' => 'elem-yellow',
    'icons-contacts' => 'icons-contacts',
    'contacts-row' => 'contacts-row',
    'contacts-center' => 'contacts-center',
    'title-left' => 'title-left',
    'contacts-social-media' => 'contacts-social-media',
    'contacts-text' => 'contacts-text',
    'red-mobile' => 'red-mobile',
    'custom-container' => 'custom-container',
    'title-merch' => 'title-merch',
    'yellow' => 'yellow',
    'red' => 'red',
    'contacts-photo' => 'contacts-photo',
    'icon-email' => 'icon-email',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['contacts-block'] ?? []);
}
?>

<section class="section">
    <div class="container <?php echo esc_attr($classes['custom-container']); ?>">
        <?php
        $contacts_title = get_field('contacts_title');
        $checked = get_field('use-custom-template');
        $colorArrow = $checked ? $classes['red'] : $classes['yellow'];
        $photo = get_field('contacts-image') ?: get_template_directory_uri() . '/assets/images/no_image_available_500_x_500.svg';

        if (is_front_page()) :
            if (!empty($contacts_title)) : ?>
                <div class="<?php echo esc_attr($classes['title-left']); ?>">
                    <?php get_template_part('template-parts/h2-title-v2', null, [
                        'title' => $contacts_title,
                    ]); ?>
                </div>
            <?php endif;
        else :
            if (!empty($contacts_title)) :
                $class = $checked ? $classes['title-merch'] : $classes['title-center'];
                ?>
                <div class="<?php echo esc_attr($class); ?>">
                    <?php get_template_part('template-parts/h2-title-v2', null, [
                        'title' => $contacts_title,
                    ]); ?>
                </div>
            <?php endif;
        endif;
        ?>
        <div class="<?php echo esc_attr($classes['contacts-center']); ?>">
            <div class="<?php echo esc_attr($classes['contacts']); ?>">
                    <?php
                    if (!empty($photo)) :
                        if ($checked) :
                            ?>
                            <a href="<?php echo $photo; ?>" data-lightbox="gallery">
                                <?php
                                get_template_part('template-parts/photo-left', null, [
                                    'photo_url' => $photo,
                                    'my_class' => esc_attr($classes['merch_photo']),
                                ]);
                                ?>
                            </a>
                        <?php
                        else :
                            echo '<div class="' . esc_attr($classes['photo']) . '">';
                            get_template_part('template-parts/photo-left', null, [
                                'photo_url' => $photo,
                                'my_class' => esc_attr($classes['contacts-photo']),
                            ]);
                              echo '</div>';
                        endif;
                    endif;
                    ?>

                <img class="<?php echo esc_attr($classes['elem-yellow'] . ' ' . $colorArrow); ?>"
                     src="<?php echo get_template_directory_uri() . '/assets/images/element-yellow.svg' ?>"
                     alt="image">

                <div class="<?php echo esc_attr($classes['text-content'])
                    . ' ' . ($checked ? $classes['red-mobile'] : ''); ?>">
                    <p class="<?php echo esc_attr($classes['contacts-text']); ?>">
                        <?php the_field('contacts_text'); ?>
                    </p>
                    <div class="<?php echo esc_attr($classes['icons-contacts']); ?>">
                        <?php
                        $email = get_field('contacts-email');
                        $phone = get_field('phone');
                        ?>
                        <div class="<?php echo esc_attr($classes['contacts-row']); ?>">
                            <?php if (!empty($phone)): ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>" rel="noopener noreferrer" class="icon">
                                    <img src="<?php the_field('icon-phone') ?>" alt="phone">
                                </a>
                                <a href=tel:<?php echo esc_attr($phone); ?> rel="noopener noreferrer">
                                    <?php echo esc_html($phone); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="<?php echo esc_attr($classes['contacts-row']); ?>">
                            <?php if (!empty($email)): ?>
                                <a href=mailto:<?php echo esc_attr($email); ?> rel="noopener noreferrer">
                                    <img class="<?php echo esc_attr($classes['icon-email']); ?>" src="<?php the_field('icon-email') ?>" alt="email">
                                </a>
                                <a href=mailto:<?php echo esc_attr($email); ?> rel="noopener noreferrer">
                                    <?php echo esc_html($email); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($classes['contacts-social-media']); ?>">
                        <p><?php the_field('social-media-title'); ?></p>
                        <?php
                        get_template_part('template-parts/socblock', null, ['is_main' => true, 'is_title' => false]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>