<?php
$ornament_url = get_template_directory_uri() . "/assets/images/symbol-defs.svg#icon-ornament1";
$phone_number = '+38 099 169 47 45';
$phone = str_replace(' ', '', $phone_number);
$socials = get_field('socials', 'option');
echo var_dump($socials);
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
                        <a href="mailto:INFO@NACHYNNYA.ORG.UA" target="_blank" class="email link-adv">iNFO@NACHYNNYA.ORG.UA</a>
                    </div>
                    <div class="address-wrap ">
                        <a href="tel:<?php echo $phone; ?>" class="phone link-adv"><?php echo $phone_number ?></a>
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
                <div class="social-wrap">
                    <p class="social-title">МИ У СОЦМЕРЕЖАХ:</p>
                    <div class="social footer__social">
                        <a href="#" class="social-link">
                            <svg class="social-icon">
                                <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-instagram"></use>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg class="social-icon">
                                <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-facebook"></use>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg class="social-icon">
                                <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-tiktok"></use>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg class="social-icon">
                                <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-linkedin"></use>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg class="social-icon">
                                <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-youtube"></use>
                            </svg>
                        </a>
                    </div>

                </div>
            </address>

        </div>

        <!-- <img src="" alt="" class="footer-ornament"> -->
        <div class="copyright-wrap">
            <a href="https://it-volunteers.com/" class="copyright link-adv" target="_blank">Сайт розроблено IT Volunteers ©2025 Громадська організація «Начиння»</a>

        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>