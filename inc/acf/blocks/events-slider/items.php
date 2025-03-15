<?php
    // Returns the event based on the query
    function events_get_one() {
        // Extracting query parameters
        $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
        // Basic args for query
        $args = array(
            'post_type'             => 'event',
            'posts_per_page'        => 1,
            'offset'                => $offset,
    
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

        // Query and output the result
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            $query->the_post();
            //
            get_template_part('template-parts/events-item-with-slider');
        } 

        wp_reset_postdata();
        die();
    }