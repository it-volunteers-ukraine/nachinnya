<?php
    // The logo elements
    $logo_url = get_field('logo', 'option');
    $current_lang = function_exists('pll_current_language') ? pll_current_language() : 'uk';

    $home_url = ($current_lang === 'en') ? '/en/' : '/';

    $logo_elements = "";
    if ($logo_url) {
        $logo_elements = <<<LOGO
            <a href="$home_url"><img class="header__logo-img" src="$logo_url"></a>
        LOGO;
    }

    // The social-icons elements
    $socials = get_field('socials', 'option');

    $socials_elements = "";
    if ($socials) {
        //
        $socials_items = "";
        foreach ($socials as $social) {
            $url = $social["url"];
            $img_url = $social["icon"];

            $socials_items .= <<<ITEM
                <li class="header__social-icon">
                    <a class="header__social-icon-link" href="$url" target="_blank" rel="noreferrer">
                        <img class="header__social-icon-image" src="$img_url">
                    </a>
                </li>
            ITEM;
        }

        //
        $socials_elements = <<<LIST
            <ul class="header__social-icons">$socials_items</ul>
        LIST;
        $dropdown_menu_socials_elements = <<<LIST
            <ul class="header__dropdown-menu-social-icons">$socials_items</ul>
        LIST;
    }

    //
    $menu_open_svg_href = get_bloginfo('template_url') . "/assets/images/symbol-defs.svg#icon-veggie-burger";
    $menu_close_svg_href = get_bloginfo('template_url') . "/assets/images/symbol-defs.svg#icon-cross";
    $scroll_to_top_svg_href = get_bloginfo('template_url') . "/assets/images/symbol-defs.svg#icon-arrow-right";
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <?php wp_head(); ?>
    <title>Nachynnya</title>
</head>
<body>  
    <div class="wrapper">
        <!-- The header -->
        <header class="header">
            <div class="header__content _container">
                <!-- The logo -->
                <?= $logo_elements ?>
                <!-- The header group -->
                <div class="header__group">
                    <!-- The menu -->
                    <nav class="menu__nav"> 
                        <?php wp_nav_menu([
                            'theme_location'       => 'header',
                            'container'            => false,
                            'menu_class'           => 'header__menu__list',
                            'menu_id'              => false,
                            'echo'                 => true,
                            'items_wrap'           => '<ul id="%1$s" class="header_list %2$s">%3$s</ul>',
                        ]); ?>
                    </nav>
                    <!-- The language switcher -->
                    <div class="header__language-switcher">
                        <?php
                        $display_lang = ($current_lang === 'uk') ? 'УКР' : 'ENG';
                        ?>
                        
                        <button
                            class="header__language-switcher-button header__dropdown-menu-language-switcher-button-selected"
                            type="button"
                            onclick="toggleHeaderLanguageSwitcherDropdown();"
                        >
                            <?php echo esc_html($display_lang); ?>
                        </button>

                        <button
                            id="headerLanguageSwitcherOverlay"
                            class="header__language-switcher-overlay header__language-switcher-overlay-hidden"
                            type="button"
                            onclick="toggleHeaderLanguageSwitcherDropdown();"
                        ></button>

                        <ul id="headerLanguageSwitcherDropdown" class="header__language-switcher-dropdown header__language-switcher-dropdown-hidden">
                            <?php
                            $languages = pll_the_languages(array(
                                'dropdown' => 0,
                                'show_flags' => 0,
                                'show_names' => 1,
                                'hide_current' => 0,
                                'echo' => 0
                            ));

                            $languages = str_replace(['Українська', 'English'], ['УКР', 'ENG'], $languages);
                            echo $languages;
                            ?>
                        </ul>
                    </div>

                    <!-- The social icons -->
                    <?= $socials_elements ?>
                    <!-- The dropdown menu toggle button for the mobile screens -->
                    <button class="header__mobile-menu-dropdown-toggle" type="button" onclick="toggleHeaderDropdownMenu();">
                        <svg class="header__mobile-menu-dropdown-open-svg">
                            <use xlink:href="<?= $menu_open_svg_href ?>"></use>
                        </svg>
                    </button>
                    <!-- The dropdown menu toggle button for the tablet and the desktop screens -->
                    <?php $menu_text = ($current_lang === 'en') ? 'Menu' : 'Меню'; ?>
                    <button class="header__td-menu-dropdown-toggle" type="button" onclick="toggleHeaderDropdownMenu();">
                        <svg class="header__td-menu-dropdown-open-svg">
                            <use xlink:href="<?= $menu_open_svg_href ?>"></use>
                        </svg>
                         <?php echo $menu_text ?>
                    </button>
                </div>
            </div>                      
        </header>
        <!-- The dropdown menu -->
        <button
            id="headerDropdownMenuOverlay"
            class="header__dropdown-menu-overlay header__dropdown-menu-overlay-hidden"
            type="button"
            onclick="toggleHeaderDropdownMenu();"
        >
        </button>
        <div id="headerDropdownMenu" class="header__dropdown-menu header__dropdown-menu-hidden">
            <!-- The dropdown menu toggle button for the mobile screens -->
            <button class="header__mobile-menu-dropdown-toggle" type="button" onclick="toggleHeaderDropdownMenu();">
                <svg class="header__mobile-menu-dropdown-close-svg">
                    <use xlink:href="<?= $menu_close_svg_href ?>"></use>
                </svg>
            </button>
            <!-- The dropdown menu toggle button for the tablet and desktop screens -->
            <?php $close_text = ($current_lang === 'en') ? 'Close' : 'Закрити'; ?>
            <button class="header__td-menu-dropdown-toggle" type="button" onclick="toggleHeaderDropdownMenu();">
                <svg class="header__td-menu-dropdown-close-svg">
                    <use xlink:href="<?= $menu_close_svg_href ?>"></use>
                </svg>
                <?php echo $close_text ?>
            </button>

            <div class="header__dropdown-menu-wrapper">
                <div class="header__dropdown-menu-items-wrapper">
                    <!-- The menu -->
                    <nav class="header__dropdown-menu__nav"> 
                        <?php wp_nav_menu([
                            'theme_location'       => 'header',
                            'container'            => false,
                            'menu_class'           => 'header__dropdown-menu__list',
                            'menu_id'              => false,
                            'echo'                 => true,
                            'items_wrap'           => '<ul id="%1$s" class="header_list %2$s">%3$s</ul>',
                        ]); ?>
                    </nav>
                    <!-- The language switcher -->
                    <div class="header__dropdown-menu-language-switcher">
                        <button
                            class="header__dropdown-menu-language-switcher-button header__dropdown-menu-language-switcher-button-selected"
                            type="button"
                        >
                            <?php
                                $languages = pll_the_languages(array(
                                    'dropdown' => 0,
                                    'show_flags' => 0,
                                    'show_names' => 1,
                                    'hide_current' => 1,
                                    'echo' => 0
                                ));

                                $languages = str_replace(['Українська', 'English'], ['УКР', 'ENG'], $languages);
                                echo $languages;
                            ?>
                        </button>
                    </div>
                </div>
                <!-- The social icons -->
                <?= $dropdown_menu_socials_elements ?>
            </div>
        </div>
        <!-- The button "Scroll to top" -->
        <button
            id="headerScrollToTopButton"
            class="header__scroll-to-top-button"
            type="button"
            onclick="window.scrollTo({top: 0, behavior: 'smooth'});"
        >
            <svg class="header__scroll-to-top-button-svg">
                <use xlink:href="<?= $scroll_to_top_svg_href ?>"></use>
            </svg>
        </button>
        <!-- End of the header -->
	