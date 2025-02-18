<?php
    // The logo elements
    $logo_url = get_field('logo', 'option');
    $logo_elements = "";
    if ($logo_url) {
        $logo_elements = <<<LOGO
            <a href="/"><img class="header__logo-img" src="$logo_url"></a>
        LOGO;
    }

    // The social-icons elements
    $socials = get_field('socials', 'option');
    $socials_elements = "";
    if ($socials && count($socials)) {
        //
        $socials_items = "";
        foreach ($socials as $social) {
            $url = $social["url"];
            $img_url = $social["icon"];

            $socials_items .= <<<ITEM
                <li class="header__social-icon">
                    <a href="$url" target="_blank" rel="noreferrer">
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
                        <button
                            class="header__language-switcher-button header__dropdown-menu-language-switcher-button-selected"
                            type="button"
                            onclick="toggleHeaderLanguageSwitcherDropdown();"
                        >
                            УКР
                        </button>
                        <ul
                            id="headerLanguageSwitcherDropdown"
                            class="header__language-switcher-dropdown header__language-switcher-dropdown-hidden"
                        >
                            <li><button class="header__language-switcher-button" type="button">УКР</button></li>
                            <li><button class="header__language-switcher-button" type="button">ENG</button></li>
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
                    <button class="header__td-menu-dropdown-toggle" type="button" onclick="toggleHeaderDropdownMenu();">
                        <svg class="header__td-menu-dropdown-open-svg">
                            <use xlink:href="<?= $menu_open_svg_href ?>"></use>
                        </svg>
                        Меню
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
            <button class="header__td-menu-dropdown-toggle" type="button" onclick="toggleHeaderDropdownMenu();">
                <svg class="header__td-menu-dropdown-close-svg">
                    <use xlink:href="<?= $menu_close_svg_href ?>"></use>
                </svg>
                Закрити
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
                            УКР
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
	