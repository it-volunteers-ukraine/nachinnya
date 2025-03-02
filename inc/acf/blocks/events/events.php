<?php
    // Loading classes
    $default_classes = [
        'section' => 'section',
        'container' => 'container',

        'title-mtf' => 'title-mtf',
        'title-mtf-header' => 'title-mtf-header',
        'title-mtf-decoration-image-mobile' => 'title-mtf-decoration-image-mobile',
        'title-mtf-decoration-image-tablet' => 'title-mtf-decoration-image-tablet',
        'title-mtf-decoration-image-full' => 'title-mtf-decoration-image-full',

        'title-d-wrapper' => 'title-d-wrapper',
        'title-d' => 'title-d',
        'title-d-header' => 'title-d-header',
        'title-d-decoration-image-desktop' => 'title-d-decoration-image-desktop',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events'] ?? []);
    }

    //
    $re_href = get_bloginfo('template_url') . '/assets/images/rounded_elements.svg';
    $header_text = get_field('header_text');
    //
    $title_decoration_360_href = get_bloginfo('template_url') . '/assets/images/title_element_360.svg';
    $title_decoration_768_href = get_bloginfo('template_url') . '/assets/images/title_element_768.svg';
    $title_decoration_1440_href = get_bloginfo('template_url') . '/assets/images/title_element_1440.svg';
?>
<section class="section <?= $classes["section"] ?>">
    <div class="container <?= $classes["container"] ?>">
        <!-- The layout for the mobile and the tablet -->
        <div class="<?= $classes["title-mtf"] ?>">
            <div class="<?= $classes["title-mtf-header"] ?>">
                <img src="<?= $re_href ?>">
                <h1><?= $header_text ?></h1>
                <img src="<?= $re_href ?>">
            </div>

            <img class="<?= $classes["title-mtf-decoration-image-mobile"] ?>" src="<?= $title_decoration_360_href ?>">
            <img class="<?= $classes["title-mtf-decoration-image-tablet"] ?>" src="<?= $title_decoration_768_href ?>">
            <img class="<?= $classes["title-mtf-decoration-image-full"] ?>" src="<?= $title_decoration_1440_href ?>">
        </div>
        <!-- The layout for desktop -->
        <div class="<?= $classes["title-d-wrapper"] ?>">
            <div class="<?= $classes["title-d"] ?>">
                <div class="<?= $classes["title-d-header"] ?>">
                    <img src="<?= $re_href ?>">
                    <h1><?= $header_text ?></h1>
                    <img src="<?= $re_href ?>">
                </div>

                <img class="<?= $classes["title-d-decoration-image-desktop"] ?>" src="<?= $title_decoration_1440_href ?>">
            </div>
        </div>
        <?php get_template_part('inc/acf/blocks/events/items');?>
    </div>
</section>