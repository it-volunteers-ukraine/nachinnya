<?php
$default_classes = [
    'team-wrap' => 'team-wrap',
    'team-list' => 'team-list',
    'team-item' => 'team-item',
    'team-img-frame' => 'team-img-frame',
    'team-img-wrap' => 'team-img-wrap',
    'team-img' => 'team-img',
    'team-sky-xl' => 'team-sky-xl',
    'team-sky-l' => 'team-sky-l',
    'team-sky-m' => 'team-sky-m',
    'team-sky-m-one' => 'team-sky-m-one',
    'team-sky-m-two' => 'team-sky-m-two',
    'team-sky-s' => 'team-sky-s',
    'team-text' => 'team-text',
    'team-text-wrap' => 'team-text-wrap',



    'container' => 'container',

    // 'team-sky-s' => 'team-sky-s',



];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['teams-block'] ?? []);
}

$current_id = get_the_ID();
$team_block = get_field('team_block');
echo 'team-block: ' . ceil(count($team_block) / 2);
// echo '<pre>';
// echo var_dump($team_block);
// print_r($team_block);
// var_export($team_block);
// echo '</pre>';
?>

<section class="debug-red section">
    <div class="container <?php echo esc_attr($classes["container"]); ?>">
        <?php get_template_part('template-parts/h2-title', null, []); ?>
        <div class="debug-blue <?php echo esc_attr($classes['team-wrap']); ?>">
            <ul class="<?php echo esc_attr($classes['team-list']); ?>">
                <? if ($team_block) : ?>
                    <?php foreach ($team_block as $team) : ?>
                        <li class="debug-green <?php echo esc_attr($classes['team-item']); ?>">
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
                                <img src="<?php echo get_template_directory_uri(); ?> . /assets/images/sky_360.svg" alt="sky-360" class='<?php echo esc_attr($classes["team-sky-s"]); ?> '>

                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <?php for ($i = 1; $i <= ceil(count($team_block) / 2); $i++) : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_768.svg" alt="sky-768" class='<?php echo esc_attr(implode(' ', [$classes["team-sky-m"]])); ?> '>
            <?php endfor; ?>
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_768.svg" alt="sky-768" class='<?php echo esc_attr(implode(' ', [$classes["team-sky-m"], $classes["team-sky-m-one"]])); ?> '>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_768.svg" alt="sky-768" class='<?php echo esc_attr(implode(' ', [$classes["team-sky-m"], $classes["team-sky-m-two"]])); ?> '> -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_1440.svg" alt="sky-1440" class='<?php echo esc_attr($classes["team-sky-l"]); ?> '>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_1920.svg" alt="sky-1920" class='<?php echo esc_attr($classes["team-sky-xl"]); ?> '>
        </div>
        <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_1440.svg" alt="sky-1440" class='<?php echo esc_attr($classes["team-sky-l"]); ?> '>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_768.svg" alt="sky-768" class='<?php echo esc_attr($classes["team-sky-m"]); ?> '>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sky_360.svg" alt="sky-360" class='<?php echo esc_attr($classes["team-sky-s"]); ?> '> -->
    </div>

</section>