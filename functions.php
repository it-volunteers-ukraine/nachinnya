<?php
if (!function_exists('wp_it_volunteers_setup')) {
    function wp_it_volunteers_setup()
    {
        add_theme_support('custom-logo',
            array(
                'height' => 64,
                'width' => 64,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'wp_it_volunteers_setup');
}

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'wp_it_volunteers_scripts');

function wp_it_volunteers_scripts()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('wp-it-volunteers-style', get_template_directory_uri() . '/assets/styles/main.css', array('main'));
    wp_enqueue_script('wp-it-volunteers-scripts', get_template_directory_uri() . '/assets/scripts/main.js', array(), false, true);
    wp_enqueue_script('wp-it-volunteers-header-scripts', get_template_directory_uri() . '/assets/scripts/header.js');

    // Load lightbox2 assets
    wp_enqueue_style('lightbox2-styles', get_template_directory_uri() . '/assets/styles/vendors/lightbox2/lightbox.min.css', array('main'));
    wp_enqueue_script('lightbox2-scripts', get_template_directory_uri() . '/assets/scripts/vendors/lightbox.min.js', array('jquery'));

    if (is_page_template('templates/home.php')) {
        wp_enqueue_style('home-style', get_template_directory_uri() . '/assets/styles/template-styles/home.css', array('main'));
        wp_enqueue_script('home-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/home.js', array(), false, true);
    }

    if (is_page_template('templates/about.php')) {
        wp_enqueue_style('about-style', get_template_directory_uri() . '/assets/styles/template-styles/about.css', array('main'));
        wp_enqueue_script('about-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/about.js', array(), false, true);
    }

    if (is_page_template('templates/contacts.php')) {
        wp_enqueue_style('contacts-style', get_template_directory_uri() . '/assets/styles/template-styles/contacts.css', array('main'));
        wp_enqueue_script('contacts-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/contacts.js', array(), false, true);
    }

    if (is_404()) {
        wp_enqueue_style('404-style', get_template_directory_uri() . '/assets/styles/template-styles/404.css', array('main'));
    }

    // Enqueue scripts and styles of blocks
    function register_acf_block_assets()
    {
        $blocks_dir = get_template_directory() . '/inc/acf/blocks';

        foreach (glob($blocks_dir . '/*', GLOB_ONLYDIR) as $block_dir) {
            $block_name = basename($block_dir);

            // Paths to styles and scripts
            $style_path = "/assets/blocks/styles/$block_name/$block_name.css";
            $script_path = "/assets/blocks/scripts/$block_name/$block_name.js";

            // If style file exists, enqueue it
            if (file_exists(get_template_directory() . $style_path)) {
                wp_enqueue_style(
                    "block-$block_name-style",
                    get_template_directory_uri() . $style_path,
                    array(),
                    filemtime(get_template_directory() . $style_path)
                );
            }

            // If script file exists, enqueue it
            if (file_exists(get_template_directory() . $script_path)) {
                wp_enqueue_script(
                    "block-$block_name-script",
                    get_template_directory_uri() . $script_path,
                    array('jquery'),
                    filemtime(get_template_directory() . $script_path),
                    true
                );
            }
        }
    }
}

/** Initializing aсf blocks for gutenberg */
require_once get_template_directory() . '/inc/acf/blocks/blocks-init.php';

/** add fonts */
function add_google_fonts()
{
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Roboto');
}

add_action('wp_enqueue_scripts', 'add_google_fonts');

/** Register menus */
function wp_it_volunteers_menus()
{
    $locations = array(
        'header' => __('Header Menu', 'wp-it-volunteers'),
        'footer' => __('Footer Menu', 'wp-it-volunteers'),
        'option' => __('Option Menu', 'wp-it-volunteers'),
    );

    register_nav_menus($locations);
}

add_action('init', 'wp_it_volunteers_menus');

/** gsap scripts */
function enqueue_gsap_scripts() {
    if (has_block('acf/history-section-block')) {
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), null, true);
    wp_enqueue_script('gsap-motionpath', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js', array('gsap'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_gsap_scripts');

/** swiper scripts */
function enqueue_slider_scripts() {
    if (has_block('acf/follow-us-block')
        || has_block('acf/home-parthers-slider-block')
        || has_block('acf/support-us-details-block')
        || has_block('acf/projects-block')) {
        
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_slider_scripts');

add_action( 'wp_footer', 'theme_lightbox2_settings' );
function theme_lightbox2_settings() {
    ?>
    <script>
      lightbox.option({
        'resizeDuration': 200,
        'fadeDuration': 300,
        'imageFadeDuration': 300,
        'wrapAround': true,
        'alwaysShowNavOnTouchDevices': true,
        'showImageNumberLabel': false,
      })
    </script>
    <?php
}

/** ACF add options page */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Common Info Settings',
        'menu_title' => 'Common Info',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => '404 Page Settings',
        'menu_title' => '404 Page',
        'parent_slug' => 'theme-general-settings',
    ));
}
