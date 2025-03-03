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
}


// pagination button load-more
function load_more()
{
    $paged = $_POST['paged'];

    $post_type = (isset($_POST['post_type'])) ? $_POST['post_type'] : '';

    $width = $_POST['width'];
    $countPosts = get_posts_per_page($width, $post_type);


    $args = array(
        'paged' => $paged,
        'post_type' => $post_type,
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => $countPosts,
    );

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // change data for block by post-type
            switch ($post_type) {
                case 'partners':
                    ?>
                    <h3 class="partners-title">
                        <?php echo esc_html($partner_title ? $partner_title : get_the_title()); ?>
                    </h3>

                    <div class="post-item">
                        <?php if ($partner_image) : ?>
                            <img class="partner-image"
                                 src="<?php echo esc_url($partner_image['url']); ?>"
                                 alt="<?php echo esc_attr($partner_title); ?>">
                        <?php endif; ?>

                        <p class="partner-text">
                            <?php echo esc_html($partner_text); ?>
                        </p>
                    </div>
                    <?php
                    break;

//                case 'events':
//                    //
//                    break;

            }
        }
    } else {
        echo 'No data';
    }

    $html = ob_get_clean();
    wp_reset_postdata();

    $total_pages = $query->max_num_pages;

    wp_send_json(array('html' => $html, 'total_pages' => $total_pages, 'postsPerPage' => $countPosts));

    wp_die();
}

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');


function get_posts_per_page($width, $post_type)
{


    switch ($post_type) {
        case 'partners':

            return ($width > 767.98) ? 6 : 5;

//        case 'events':
//
////            return ($width > 767.98) ? 8 : 4;


    }
}


function init_ajax_load_more()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('pagination-ajax', get_template_directory_uri() . 'inc/acf/blocks/show-more-block/show-more-block.js', array('jquery'), null, true);

    wp_localize_script('pagination-ajax', 'my_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('my_nonce'),
    ));

}

add_action('wp_enqueue_scripts', 'init_ajax_load_more');