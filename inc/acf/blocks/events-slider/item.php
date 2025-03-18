<?php
    // Helper class to work with images
    require_once(get_template_directory() . '/inc/acf/blocks/events-slider/image-helper.php');

    // Loading classes
    $default_classes = [
        'item' => 'item',
        'item-upper-part' => 'item-upper-part',
        'item-upper-part-image' => 'item-upper-part-image',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events-slider'] ?? []);
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

    // The date
    $date = get_field('date', $current_id);
    // Putting all the dates into the array, sorting them, then converting them into the strings in format 'd.m.Y' and imploding them
    // with ', ' separator
    $dates = [\DateTime::createFromFormat('d.m.Y', $date)];
    while (have_rows('additional_dates', $current_id)) {
        the_row();

        $next_date = get_sub_field('date');
        $dates[] = \DateTime::createFromFormat('d.m.Y', $next_date);
    }
    sort($dates);
    $formatted_dates = array_map(function ($date) {
        return $date->format('d.m.Y');
    }, $dates);
    $dates_to_display = implode(', ', $formatted_dates);

    // The time
    $start_time = get_field('start_time', $current_id);
    $end_time = get_field('end_time', $current_id);
    $time = $start_time . ($end_time ? "-$end_time" : '');
    // The register link
    $register_link = get_field('register_link', $current_id);
    $show_register_button = false;

    if ($register_link) {
        //
        $start_datetime = \DateTime::createFromFormat('d.m.Y H.i', "$date $start_time");
        //
        $now_datetime = new DateTime();

        $show_register_button = $start_datetime > $now_datetime;
    }
    // The main text
    $main_text = acf_esc_html(get_field('main_text', $current_id));
?>
<div class="<?= $classes["item"] ?>">
    <div class="<?= $classes["item-upper-part"] ?>">
        123
    </div>
</div>