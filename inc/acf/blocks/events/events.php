<?php
    // Loading classes
    $default_classes = [
        'container' => 'container',
        'title' => 'title',
        'title-header' => 'title-header',
        'title-decoration-image' => 'title-decoration-image'
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
    $title_decoration_href = get_bloginfo('template_url') . '/assets/images/title_element.svg';
?>
<section class="section">
    <div class="container <?= $classes["container"] ?>">
        <div class="<?= $classes["title"] ?>">
            <div class="<?= $classes["title-header"] ?>">
                <img src="<?= $re_href ?>">
                <h1><?= $header_text ?></h1>
                <img src="<?= $re_href ?>">
            </div>
            <img class="<?= $classes["title-decoration-image"] ?>" src="<?= $title_decoration_href ?>">
        </div>
        <?php get_template_part('inc/acf/blocks/events/items');?>
    </div>
</section>