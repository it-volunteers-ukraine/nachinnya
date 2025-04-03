<?php
$default_classes = [
    'partners-title' => 'partners-title',
    'partner-text' => 'partner-text',
    'partners_section' => 'partners_section',
    'partners' => 'partners',
    'post-item' => 'post-item',
    'partner-image' => 'partner-image',
    'partners-pagination' => 'partners-pagination',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['partners-block'] ?? []);
}
?>

<section class="section <?php echo esc_attr($classes['partners_section']); ?>">

    <?php
    $h2_title = get_field('h2_title_main_section');
    if (!empty($h2_title)) :
        ?>
        <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
            <?php get_template_part('template-parts/h2-title-v2', null, [
                'title' => $h2_title
            ]); ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_per_page = wp_is_mobile() ? 4 : -1;
        $args = array(
            'post_type' => 'partners',
            'posts_per_page' => $posts_per_page,
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            echo '<div id="partners-block" class="' . esc_attr($classes['partners']) . '">';
            while ($query->have_posts()) : $query->the_post();
                $id = get_the_ID();
                $partner_title = get_field('partner_title', $id);
                $partner_image = get_field('partner_image', $id);
                $partner_text = get_field('partner_text', $id);
                ?>
                <div class="<?php echo esc_attr($classes['post-item']); ?>">
                    <?php if ($partner_image) : ?>
                        <img class="<?php echo esc_attr($classes['partner-image']); ?>"
                             src="<?php echo esc_url($partner_image['url']); ?>"
                             alt="<?php echo esc_attr($partner_title); ?>">
                    <?php endif; ?>
                    <p class="<?php echo esc_attr($classes['partner-text']); ?>"><?php echo esc_html($partner_text); ?></p>
                </div>
            <?php endwhile;
            echo '</div>';
            wp_reset_postdata();
            ?>
            <div class="<?php echo esc_attr($classes['partners-pagination']); ?>">
                <?php
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $query->max_num_pages,
                    'prev_text' => '<svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 1.44922L1.5 10.4492L10.5 19.4492" stroke="#B74028" stroke-width="2" stroke-linecap="round"/>
                    </svg>',
                    'next_text' => '<svg width="10" height="19" viewBox="0 0 10 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 1.92031L1.48725 0.449219L9.58796 8.46664C9.71853 8.59511 9.82216 8.74788 9.89288 8.91615C9.96359 9.08442 10 9.26488 10 9.44714C10 9.62939 9.96359 9.80985 9.89288 9.97812C9.82216 10.1464 9.71853 10.2992 9.58796 10.4276L1.48725 18.4492L0.0014019 16.9781L7.60448 9.44922L0 1.92031Z" fill="#B74028"/>
                        </svg>'
                ));
                ?>
            </div>
        <?php
        else :
            echo '<p>Немає записів.</p>';
        endif;
        ?>
    </div>
</section>