<?php
$ornament_url = get_template_directory_uri() . "/assets/images/symbol-defs.svg#icon-ornament1";
$phone_number = '+38 099 169 47 45';
$phone = str_replace(' ', '', $phone_number);
?>
<style>
    /* https://nachinnya.loc/wp-content/themes/nachinnya/assets/images/symbol-defs.svg#icon-ornament1 */
    .ornament {
        /* background-image: url('<?php echo $ornament_url; ?>'); */
        /* mask-image: url('https://nachinnya.loc/wp-content/themes/nachinnya/assets/images/ornament1.svg'); */
        background-image: url('https://nachinnya.loc/wp-content/themes/nachinnya/assets/images/ornament1.svg');
        width: 100%;
        height: 42px;
        background-size: contain;
        background-repeat: repeat-x;
    }
</style>
<footer>
    <div class="ornament">
    </div>
    <div class="footer">
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
        ));
        // }
        ?>
        <address class="address">
            <a href="mailto:INFO@NACHYNNYA.ORG.UA" target="_blank" class="email">INFO@NACHYNNYA.ORG.UA</a>
            <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone_number ?></a>
        </address>
        <svg class="wave-y">
            <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-wave-s-y"></use>
        </svg>
        <a href="https://it-volunteers.com/" class="copyright" target="_blank">Сайт розроблено IT Volunteers ©2025 Громадська організація «Начиння»</a>
        <!-- <img src="" alt="" class="footer-ornament"> -->
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>