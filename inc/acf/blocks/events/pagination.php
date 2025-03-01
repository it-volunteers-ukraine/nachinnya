<?php
    // Loading classes
    $default_classes = [
        "pagination" => "pagination",
        "pagination-numeric" => "pagination-pages",

        "pagination-arrow-button" => "pagination-arrow-button",
        "pagination-arrow-button-svg" => "pagination-arrow-button-svg",
        "pagination-number-button" => "pagination-number-button",
        "pagination-button-disabled" => "pagination-button-disabled",
        "pagination-button-selected" => "pagination-button-selected",

        "rotate-180" => "rotate-180",
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events'] ?? []);
    }

    // Retrieving the arguments
    $max_num_pages = $args['max_num_pages'];
    $current_page = $args['current_page'];

    //
    function getButton($classes, $btn_type, $current_page, $page_number, $inner) {
        $btn_class = $classes[$btn_type];
        //
        if ($current_page != $page_number) {
            $page_url = get_pagenum_link($page_number);

            return <<<BTN
                <a class="$btn_class" href="$page_url">$inner</a>
            BTN;
        }
        $disabled_class = $classes["pagination-button-disabled"];
        $selected_class = $btn_type == "pagination-number-button" ? $classes["pagination-button-selected"] : "";

        return <<<BTN
            <span class="$btn_class $disabled_class $selected_class">$inner</span>
        BTN;
    }

    // Returns the button with the arrow
    function getArrowButton($classes, $current_page, $page_number, $direction) {
        //
        $svg_class = $classes["pagination-button-svg"];
        $href = get_bloginfo('template_url') . "/assets/images/symbol-defs.svg#icon-arrow-right";
        $rotate_class = $direction == "left" ? $classes["rotate-180"] : "";

        $svg = <<<SVG
            <svg class="$svg_class $rotate_class">
                <use xlink:href="$href"></use>
            </svg>
        SVG;

        return getButton(
            $classes, 
            "pagination-arrow-button", 
            $current_page, 
            $page_number, 
            $svg
        );
    }

    // Returns the button with the number
    function getNumberButton($classes, $current_page, $page_number) {
        return getButton(
            $classes,
            "pagination-number-button", 
            $current_page, 
            $page_number, 
            $page_number
        );
    }

    //
    $s = "";

    // Only if there are some pages
    if ($max_num_pages > 1) {
        // The start of the pagination
        $s = '<div class="' . $classes["pagination"] . '">';

        // The previous arrow button
        $s .= getArrowButton(
            $classes, 
            $current_page, 
            $current_page > 1 ? $current_page - 1 : 1,
            "left"
        );

        // The start of the numeric pages group
        $s .= '<div class="' . $classes["pagination-numeric"] . '">';

        // The second previous page, but only if the current page is the last one
        if (($current_page - 2 > 0) && ($current_page == $max_num_pages)) {
            $s .= getNumberButton($classes, $current_page, $current_page - 2);
        }

        // The previous page
        if ($current_page - 1 > 0) {
            $s .= getNumberButton($classes, $current_page, $current_page - 1);
        }

        // The current page
        $s .= getNumberButton($classes, $current_page, $current_page);

        // The next page
        if ($current_page + 1 <= $max_num_pages) {
            $s .= getNumberButton($classes, $current_page, $current_page + 1);
        }

        // The second next page, but only if the current page is the first one
        if (($current_page + 2 <= $max_num_pages) && ($current_page == 1)) {
            $s .= getNumberButton($classes, $current_page, $current_page + 2);
        }

        // End of the numeric pages group
        $s .= '</div>';

        // The next arrow button
        $s .= getArrowButton(
            $classes, 
            $current_page, 
            $current_page < $max_num_pages ? $current_page + 1 : $max_num_pages,
            "right"
        );

        // End of pagination
        $s .= '</div>';
    }

    echo $s;