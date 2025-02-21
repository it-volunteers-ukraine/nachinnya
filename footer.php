<?php
$ornament_url = get_template_directory_uri() . "/assets/images/symbol-defs.svg#icon-ornament1";
// $phone_number = '+38 099 169 47 45';
$phone_number = esc_html(get_field('phone_number', 'options'));
$phone = str_replace(' ', '', $phone_number);
$email = esc_html(get_field('email', 'options'));

$socials = get_field('socials', 'options');
// echo var_dump($socials);
?>
<style>
    /* https://nachinnya.loc/wp-content/themes/nachinnya/assets/images/symbol-defs.svg#icon-ornament1 */
    .ornament {
        background-image: url('https://nachinnya.loc/wp-content/themes/nachinnya/assets/images/ornament1.svg');
        width: 100%;
        height: 42px;
        background-size: contain;
        background-repeat: repeat-x;

    }

    @media screen and (min-width: 768px) {
        .ornament {
            height: 58px;
        }
    }

    @media screen and (min-width: 1440px) {
        .ornament {
            height: 89px;
        }
    }
</style>

<footer>
    <div class="ornament"></div>
    <div class="footer">
        <div class="footer-content">
            <a href="" class="logo-footer-link">
                <svg class="logo-footer-img">
                    <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-logo-white"></use>
                </svg>
            </a>
            <?php
            // if (has_nav_menu('footer-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu', // Класс для стилизации меню
                'container'      => false, // Убираем контейнер (если не нужен)
                "menu_id"        => "footer-menu", //
                'items_wrap'      => '<ul id="%1$s" class="%2$s wrap-link-adv">%3$s</ul>',
                // 'list_item_class'  => 'nav-item',
                // 'link_class' => 'aaaaa',
            ));
            // }
            ?>

            <address class="address">
                <div class="address-contact">
                    <div class="address-wrap ">
                        <a href="mailto:<?php echo $email; ?>" target="_blank" class="email link-adv"><?php echo $email; ?></a>
                    </div>
                    <div class="address-wrap ">
                        <a href="tel:<?php echo $phone; ?>" class="phone link-adv"><?php echo $phone_number; ?></a>
                    </div>
                </div>
                <div class="uzor">
                    <svg class="wave-y hidden">
                        <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-wave-m-y"></use>
                    </svg>
                    <svg class="wave-y hidden">
                        <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-wave-l-y"></use>
                    </svg>
                </div>
                <?php
                $socseti = get_field('socseti_block', 'options');
                $socseti_title = esc_html(get_field('socseti_title', 'options'));
                // echo var_dump($socseti);
                ?>
                <div class="social-wrap">
                    <?php if ($socseti) : ?>
                        <p class="social-title"><?php echo $socseti_title; ?></p>
                        <div class="social footer__social">
                            <?php foreach ($socseti as $item) : ?>
                                <a href="<?php echo $item['url']; ?>" class="social-link">
                                    <?php
                                    $social_sprite_url = esc_url(get_field('social_sprite', 'options')) . "#" . $item['sprite_icon_name'];
                                    ?>
                                    <svg class="social-icon">
                                        <use xlink:href="<?php echo $social_sprite_url; ?>"></use>
                                    </svg>
                                </a>
                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </address>

        </div>

        <!-- <img src="" alt="" class="footer-ornament"> -->
        <div class="copyright-wrap">
            <a href="https://it-volunteers.com/" class="copyright link-adv" target="_blank"><?php echo esc_html(get_field('copyright', 'option')); ?></a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>