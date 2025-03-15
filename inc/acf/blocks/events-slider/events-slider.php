<?php
    // Loading classes
    $default_classes = [
        'section' => 'section',
        'container' => 'container',
    ];

    $modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
    $classes = $default_classes;
    if (file_exists($modules_file)) {
        $modules = json_decode(file_get_contents($modules_file), true);
        $classes = array_merge($default_classes, $modules['events'] ?? []);
    }
?>
<section class="section <?= $classes["section"] ?>">
    <div class="container <?= $classes["container"] ?>" id="eventsSliderContainer" data-ajax-url="<?= $ajax_url ?>">
        
    </div>
</section>