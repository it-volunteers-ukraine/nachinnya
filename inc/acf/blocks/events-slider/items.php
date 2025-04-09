<?php
    // Loading classes
    $default_classes = [
        'events' => 'events',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events-slider'] ?? []);
    }

    //
    $price_label_text = get_field('price_label_text');
    $duration_label_text = get_field('duration_label_text');
    $registration_button_text = get_field('registration_button_text');
    $show_more_text = get_field('show_more_text');
    $show_less_text = get_field('show_less_text');

    // Basic args for query
    $args = array(
        'post_type'             => 'event',

        'posts_per_page'        => -1,

        'meta_query'            => array(
            'relation'          => 'AND',
            'date_clause'       => array (
                'key'           => 'date',
                'compare'       => 'EXISTS',
                'type'          => 'DATE',
            ),
            'start_time_clause' => array (
                'key'           => 'start_time',
                'compare'       => 'EXISTS',
                'type'          => 'TIME',
            ),
        ),
        'orderby'              => array(
            'date_clause'       => 'DESC',
            'start_time_clause' => 'DESC',
        )
    );
    $query = new WP_Query($args);
?>
<div id="eventsItems" class="<?= $classes["events"] ?>" data-items-count="<?= $query->post_count ?>">
    <?php
        if ($query->have_posts()):
            //
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part(
                    'inc/acf/blocks/events-slider/item',
                    null,
                    [
                        "price_label_text" => $price_label_text,
                        "duration_label_text" => $duration_label_text,
                        "registration_button_text" => $registration_button_text,
                        "show_more_text" => $show_more_text,
                        "show_less_text" => $show_less_text,
                    ],
                );
            }

            // Resetting the postdata
            wp_reset_postdata();
        else:
    ?>
            <p>У процесі підготовки</p>
    <?php
        endif;
    ?>
</div>