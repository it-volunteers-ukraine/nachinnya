<?php
    // Loading classes
    $default_classes = [
        'list' => 'list',
        'item' => 'item',
        'selected' => 'selected',
        'link' => 'link'
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['breadcrumbs'] ?? []);
    }

    // Home page
    $home_id = get_option('page_on_front');
    $home_url = get_the_permalink($home_id);
    $home_title = get_the_title($home_id);

    // Active item
    $active_title = get_the_title();
?>

<section class="section">
    <div class="container">
        <nav>
            <ul class="<?= $classes["list"] ?>">
                <!-- Home -->
                <li class="<?= $classes["item"] ?>">
                    <a class="<?= $classes["link"] ?>" href="<?= $home_url ?>">
                        <?= $home_title ?>
                    </a>
                </li>
                <!-- Active page -->
                <li class="<?= $classes["item"] ?> <?= $classes["selected"] ?>">
                    <span>
                        <?= $active_title ?>
                    </span>
                </li>
            </ul>
        </nav>
    </div>
</section>