<?php
$default_classes = [
    'projects-title' => 'projects-title',
    'test-wrap' => 'test-wrap',
    


    // 'team-sky-s' => 'team-sky-s',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['projects-block'] ?? []);
}

$current_id = get_the_ID();
$is_debug = get_field('debug_page');
$team_block = null;
// $team_block = get_field('team_block');
// $welcome  = get_field('welcome_to_command');
// $count = count($team_block) == 5 ? 'count-5' : '';

// echo '<pre>';
// echo var_dump($team_block);
// print_r($team_block);
// var_export($team_block);
// echo '</pre>';
?>

<section class="section">
    <div class="container <?php echo $is_debug ? 'debug-red ' : ''; ?>">
        <div class="<?php echo esc_attr($classes['team-title']); ?>">
            <?php get_template_part('template-parts/h2-title', null, []); ?>
        </div>
        <div class="<?php echo $is_debug ? 'debug-blue ' : '';
                    echo esc_attr($classes['team-wrap']); ?>">

            <div class="<?php echo esc_attr($classes["test-wrap"]); ?>">
                <?php
                $photo_url = get_template_directory_uri() . "/assets/images/teams/t1.jpg";
                $photo_alt = "Team member photo";
                get_template_part('template-parts/photo-left', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => 'debug-blue']);
                ?>
                <?php
                $photo_url = get_template_directory_uri() . "/assets/images/teams/t3.jpg";
                $photo_alt = "Team member photo";
                get_template_part('template-parts/photo-right', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => 'debug-blue']);
                ?>
            </div>

            <? if ($team_block) : ?>
                <?php $count_res = 'count-' . count($team_block); ?>
                <ul class="<?php echo esc_attr(implode(' ', [$classes['team-list'], $classes[$count_res]])); ?>">
                    <?php foreach ($team_block as $team) : ?>
                        <li class="<?php echo $is_debug ? 'debug-green ' : '';
                                    echo esc_attr($classes['team-item']); ?>">
                            <?php
                            $photo_url = esc_url($team['member_photo']['sizes']['large']);
                            $photo_alt = esc_html($team['member_photo']['alt']);
                            $full_name = esc_html($team['full_name']);
                            $job_title = esc_html($team['job_title']);
                            ?>
                            <div class="<?php echo esc_attr($classes['team-img-frame']); ?>">
                                <div class="<?php echo esc_attr($classes['team-img-wrap']); ?>">
                                    <?php
                                    get_template_part('template-parts/photo-vertical', null, ['photo_url' => $photo_url, 'photo_alt' => $photo_alt, 'my_class' => '']);
                                    ?>
                                </div>
                            </div>
                            <div class="<?php echo esc_attr($classes["team-text"]); ?>">
                                <div class="<?php echo esc_attr($classes["team-text-wrap"]); ?>">
                                    <p class='<?php echo esc_attr($classes["team-item-fullname"]); ?>'><?php echo $full_name; ?></p>
                                    <p class='<?php echo esc_attr($classes["team-item-jobtitle"]); ?>'><?php echo $job_title; ?></p>

                                </div>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_360.svg" alt="sky-360" class='<?php echo esc_attr($classes["team-sky-s"]); ?> '>

                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- <?php endif; ?> -->
                <!-- <?php if ($team_block) : ?> -->
                <?php for ($i = 1; $i <= ceil(count($team_block) / 2); $i++) : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_768.svg" alt="sky-768" class='<?php echo esc_attr(implode(' ', [$classes["team-sky-m"]])); ?> '>
                <?php endfor; ?>

                <?php if (count($team_block) < 5 && $welcome): ?>
                    <div class=" <?php echo esc_attr($classes['team-welcome-block']); ?> ">
                        <a href="<?php echo get_field('telegram_bot', 'option'); ?>" class="link-main <?php echo esc_attr($classes['team-welcome-text']); ?> "><?php echo $welcome; ?></a>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_1440.svg" alt="sky-1440" class='<?php echo esc_attr($classes["team-sky-l"]); ?> '>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_1920.svg" alt="sky-1920" class='<?php echo esc_attr($classes["team-sky-xl"]); ?> '>
        </div>
    </div>

</section>