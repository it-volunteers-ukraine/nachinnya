<?php

function acf_theme_blocks_path($path) {
    return get_template_directory() . '/inc/acf/blocks/' . $path;
}

function gt_block_category_init( $categories, $post ) {
    return array_merge([
            [
                'slug' => 'custom-blocks',
                'title' => __('Custom Blocks', 'it_volunteers_blocks_theme'),
            ],
        ],
        $categories
    );
}
add_filter( 'block_categories', 'gt_block_category_init', 10, 2 );

/* Register acf blocks */
function it_volunteers_acf_blocks_init() {
    
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        
        // Register a hero1 block.
        acf_register_block_type(array(
            'name'              => 'hero1',
            'title'             => __('Hero1'),
            'description'       => __('Block Hero1'),
            'render_template'   => acf_theme_blocks_path('hero1/hero1.php'),
            'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/hero1/hero1.css',
            'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/hero1/hero1.js',
            'category'          => 'custom-blocks',
        ));
    }
}
add_action('acf/init', 'it_volunteers_acf_blocks_init');
