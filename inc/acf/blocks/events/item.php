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
        'item-text-part-card-info-address' => 'item-text-part-card-info-address',
        'item-text-part-card-info-location' => 'item-text-part-card-info-location',
        'item-text-part-card-info-price-and-duration' => 'item-text-part-card-info-price-and-duration',
        'item-text-part-card-info-price' => 'item-text-part-card-info-price',
        'item-text-part-card-info-price-label' => 'item-text-part-card-info-price-label',
        'item-text-part-card-info-price-value' => 'item-text-part-card-info-price-value',
        'item-text-part-card-info-duration' => 'item-text-part-card-info-duration',

        'item-text-part-card-texts' => 'item-text-part-card-texts',
        'item-text-part-card-intro-text' => 'item-text-part-card-intro-text',
        'item-text-part-card-show-more' => 'item-text-part-card-show-more',
        'item-text-part-card-show-more-button' => 'item-text-part-card-show-more-button',
        'item-text-part-card-main-text' => 'item-text-part-card-main-text',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events'] ?? []);
    }

    // Retrieving the texts from the arguments
    $price_label_text = $args['price_label_text'];
    $duration_label_text = $args['duration_label_text'];
    $registration_button_text = $args['registration_button_text'];
    $show_more_text = $args['show_more_text'];
    $show_less_text = $args['show_less_text'];

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
    // The main text
    $main_text = acf_esc_html(get_field('main_text', $current_id));
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
                    <div class="<?= $classes["item-text-part-card-info-address"] ?>">
                        <?= get_field('address', $current_id) ?>
                    </div>
                    <div class="<?= $classes["item-text-part-card-info-location"] ?>">
                        <?= get_field('location_name', $current_id) ?>
                    </div>
                </div>
                <div class="<?= $classes["item-text-part-card-info-price-and-duration"] ?>">
                    <div class="<?= $classes["item-text-part-card-info-price"] ?>">
                        <div class="<?= $classes["item-text-part-card-info-price-label"] ?>">
                            <?= $price_label_text ?>
                        </div>
                        <div class="<?= $classes["item-text-part-card-info-price-value"] ?>">
                            <?= get_field('price', $current_id) ?>
                        </div>
                    </div>
                    <div class="<?= $classes["item-text-part-card-info-duration"] ?>">
                        <div class="<?= $classes["item-text-part-card-info-duration-label"] ?>">
                            <?= $duration_label_text ?>
                        </div>
                        <div class="<?= $classes["item-text-part-card-info-duration-value"] ?>">
                            <?= get_field('duration', $current_id) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?= $classes["item-text-part-card-texts"] ?>">
                <div class="<?= $classes["item-text-part-card-intro-text"] ?>">
                    <?= acf_esc_html(get_field('intro_text', $current_id)) ?>
                </div>

                <?php
                    if ($main_text): 
                ?>
                        <div class="<?= $classes["item-text-part-card-show-more"] ?>">
                            <button
                                class="<?= $classes["item-text-part-card-show-more-button"] ?>"
                                role="button"
                            >
                                <?= $show_more_text ?>
                            </button>
                        </div>
                        <div class="<?= $classes["item-text-part-card-main-text"] ?>">
                            <?= $main_text ?>
                        </div>
                <?php 
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>