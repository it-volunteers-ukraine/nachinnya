<?php
$ornament_url = get_template_directory_uri() . "/assets/images/symbol-defs.svg#icon-ornament1";
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
        <!-- <svg class="footer-ornament">
                    <use xlink:href="<?php bloginfo('template_url'); ?>/assets/images/symbol-defs.svg#icon-ornament1"></use>
                </svg> -->
        <!-- <img src="" alt="" class="footer-ornament"> -->
    </div>
    <div class="footer">
        <a href="">
            <svg class="logo">
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

    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>