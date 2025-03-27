<?php
    // Loading classes
    $default_classes = [
        'section' => 'section',
        'container' => 'container',
        'title' => 'title',
        'title-header' => 'title-header',
        'title-header-image' => 'title-header-image',
        'title-header-text' => 'title-header-text',
        'title-decoration-image' => 'title-decoration-image',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events-slider'] ?? []);
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
        <div class="<?= $classes["title"] ?>">
            <div class="<?= $classes["title-header"] ?>">
                <img class="<?= $classes["title-header-image"]?>" src="<?= $re_href ?>">
                <h2 class="<?= $classes["title-header-text"] ?>"><?= $header_text ?></h2>
                <img class="<?= $classes["title-header-image"]?>" src="<?= $re_href ?>">
            </div>
            <img class="<?= $classes["title-decoration-image-mobile"] ?>" src="<?= $title_decoration_360_href ?>">
            <img class="<?= $classes["title-decoration-image-tablet"] ?>" src="<?= $title_decoration_768_href ?>">
            <img class="<?= $classes["title-decoration-image-desktop"] ?>" src="<?= $title_decoration_1440_href ?>">
        </div>

        <?php get_template_part('inc/acf/blocks/events-slider/items');?>
    </div>
</section>