<?php
$default_classes = [
  'background' => 'background',
  'title-template-part' => 'title-template-part',
  'text-content' => 'text-content',
  'button' => 'button',
  'wave' => 'wave',
  'wave-item' => 'wave-item',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
  $modules = json_decode(file_get_contents($modules_file), true);
  $classes = array_merge($default_classes, $modules['support-home'] ?? []);
}
?>

<section class="section">
  <div class="<?php echo esc_attr($classes['background']); ?>"
    style="background-image: linear-gradient(rgba(20, 20, 20, 0.65), rgba(20, 20, 20, 0.65)), 
        url('<?php echo get_field('background_image_field'); ?>');">
    <div class="container">
      <!-- Wave background Support Home Block -->
      <?php
      $wave_bg = get_field('wave_background');
      $wave_desc = get_field('wave_description');

      if ($wave_bg) : ?>
        <div class="<?php echo esc_attr($classes['wave']); ?>">
          <div class="<?php echo esc_attr($classes['wave-item']); ?>"
            style="background-image: url('<?php echo esc_url($wave_bg); ?>');">

            <!-- Title Support Home Block -->
            <?php
            $support_title = get_field('support_title');
            if (!empty($support_title)) : ?>
              <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
                <?php get_template_part('template-parts/h2-title-v2', null, [
                  'title' => $support_title,
                  'custom_text_class' => 'yellow-white-title',
                  'custom_elements_class' => 'yellow-elements'
                ]); ?>
              </div>
            <?php endif; ?>

            <!-- Text Support Home Block -->
            <?php if (!empty($wave_desc)) : ?>
              <p class="<?php echo esc_attr($classes['text-content']); ?>">
                <?php echo esc_html($wave_desc); ?>
              </p>
            <?php endif; ?>

            <!-- Button Support Home Block -->
            <?php
            $button_text = get_field('support_button_text');
            $button_link = get_field('support_button_link');
            if ($button_text && $button_link) : ?>
              <a href="<?php echo esc_url($button_link); ?>" class="<?php echo esc_attr($classes['button']); ?>">
                <?php echo esc_html($button_text); ?>
              </a>
            <?php endif; ?>

          </div>
        </div>
      <?php else : ?>
        <p style="color: red;">❌ Немає фону хвилі! Переконайся, що поле "wave_background" заповнене в ACF.</p>
      <?php endif; ?>

    </div>
  </div>
</section>