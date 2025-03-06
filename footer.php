<?php
$ornament_url = get_template_directory_uri() . "/assets/images/symbol-defs.svg#icon-ornament1";
// $phone_number = '+38 099 169 47 45';
$phone_number = esc_html(get_field('phone_number', 'options'));
$phone = str_replace(' ', '', $phone_number);
$email = esc_html(get_field('email', 'options'));

$socials = get_field('socials', 'options');
?>
<style>
    .ornament {
        background-image: url('<?php bloginfo('template_url'); ?>/assets/images/ornament1.svg');
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
            <a href="/" class="logo-footer-link">
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
                'fallback_cb'    => '__return_false', // Вимикає автогенерацію меню
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
                get_template_part('template-parts/socblock', null, ['is_main' => false, 'is_title' => true]);
                ?>

            </address>

        </div>

        <div class="copyright-wrap">
            <a href="https://it-volunteers.com/" class="copyright link-adv" target="_blank"><?php echo esc_html(get_field('copyright', 'option')); ?></a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>