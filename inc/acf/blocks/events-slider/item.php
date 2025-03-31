<?php
    // Loading classes
    $default_classes = [
        'item' => 'item',

        'item-360-text-part-card-main-text-visible' => 'item-360-text-part-card-main-text-visible',
        'item-768-text-part-card-main-text-visible' => 'item-768-text-part-card-main-text-visible',
        'item-1440-text-part-card-main-text-visible' => 'item-1440-text-part-card-main-text-visible',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events-slider'] ?? []);
    }

    // Retrieving the texts from the arguments
    $show_more_text = $args['show_more_text'];
    $show_less_text = $args['show_less_text'];

    // Preparing some values
    $current_id = get_the_ID();
?>
<div
    id="<?= $current_id ?>EventItem"
    class="<?= $classes["item"] ?>"
    data-show-more-text="<?= $show_more_text ?>"
    data-show-less-text="<?= $show_less_text ?>"
    data-text-class-to-show-mobile="<?= $classes["item-360-text-part-card-main-text-visible"] ?>"
    data-text-class-to-show-tablet="<?= $classes["item-768-text-part-card-main-text-visible"] ?>"
    data-text-class-to-show-desktop="<?= $classes["item-1440-text-part-card-main-text-visible"] ?>"
    data-text-class-to-show-full="<?= $classes["item-1920-text-part-card-main-text-visible"] ?>"
>
    <?php 
        get_template_part(
            'inc/acf/blocks/events-slider/item-360',
            null,
            $args
        );
        get_template_part(
            'inc/acf/blocks/events-slider/item-768',
            null,
            $args
        );
        get_template_part(
            'inc/acf/blocks/events-slider/item-1440',
            null,
            $args
        );
        get_template_part(
            'inc/acf/blocks/events-slider/item-1920',
            null,
            $args
        );
    ?>
</div>