<?php
    // Loading classes
    $default_classes = [
        'item' => 'item',

        'item-upper-part' => 'item-upper-part',
        'item-upper-part-wrapper' => 'item-upper-part-wrapper',
        'item-upper-part-image' => 'item-upper-part-image',
        'item-upper-part-blue' => 'item-upper-part-blue',
        'item-upper-part-yellow' => 'item-upper-part-yellow',

        'item-text-part' => 'item-text-part',
        'item-text-part-title' => 'item-text-part-title',
        'item-text-part-card' => 'item-text-part-card',
        'item-text-part-card-info' => 'item-text-part-card-info',
        'item-text-part-card-info-datetime' => 'item-text-part-card-info-datetime',
        'item-text-part-card-info-date' => 'item-text-part-card-info-date',
        'item-text-part-card-info-time' => 'item-text-part-card-info-time',
        'item-text-part-card-info-address-and-location' => 'item-text-part-card-info-address-and-location',
        'item-text-part-card-info-price-and-duration' => 'item-text-part-card-info-price-and-duration',
        'item-text-part-card-texts' => 'item-text-part-card-texts',
        'item-text-part-card-excerpt' => 'item-text-part-card-excerpt',
        'item-text-part-card-show-more' => 'item-text-part-card-show-more'
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events'] ?? []);
    }

    // Retrieving the texts from the arguments
    $registration_button_text = $args['registration_button_text'];
    $show_more_text = $args['show_more_text'];

    // Preparing some values
    $current_id = get_the_ID();
    // The image
    $image = get_field('image', $current_id);
    $image_tag = ImageHelper::get_image_tag(
        $image, 
        $classes['item-upper-part-image'],
        '(max-width: 767.9px) 100vw, (max-width: 1439.9px) 50vw, 33.33vw'
    );
    // The time
    $start_time = get_field('start_time', $current_id);
    $end_time = get_field('end_time', $current_id);
    $time = $start_time . ($end_time ? "-$end_time" : '');
?>
<div class="<?= $classes["item"] ?>">
    <!-- Upper part -->
    <div class="<?= $classes["item-upper-part"] ?>">
        <div class="<?= $classes["item-upper-part-wrapper"] ?>">
            <div class="<?= $classes["item-upper-part-yellow"] ?>"></div>
            <div class="<?= $classes["item-upper-part-blue"] ?>"></div>
            <?= $image_tag ?>
        </div> 
    </div>
    <!-- Text part -->
    <div class="<?= $classes["item-text-part"] ?>">
        <h2 class="<?= $classes["item-text-part-title"] ?>">
            <?= get_field('title', $current_id) ?>
        </h2>
        <div class="<?= $classes["item-text-part-card"] ?>">
            <div class="<?= $classes["item-text-part-card-info"] ?>">
                <div class="<?= $classes["item-text-part-card-info-datetime"] ?>">
                    <div class="<?= $classes["item-text-part-card-info-date"] ?>">
                        <?= get_field('date', $current_id) ?>
                    </div>
                    <div class="<?= $classes["item-text-part-card-info-time"] ?>">
                        <?= $time ?>
                    </div>
                </div>
                <div class="<?= $classes["item-text-part-card-info-address-and-location"] ?>">
                    address and location
                </div>
                <div class="<?= $classes["item-text-part-card-info-price-and-duration"] ?>">
                    price and duration
                </div>
            </div>
            <div class="<?= $classes["item-text-part-card-texts"] ?>">
                <div class="<?= $classes["item-text-part-card-excerpt"] ?>">
                    excerpt
                </div>
                <div class="<?= $classes["item-text-part-card-show-more"] ?>">
                    show more
                </div>
            </div>
        </div>
    </div>
</div>