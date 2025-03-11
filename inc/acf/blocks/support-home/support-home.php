<?php
$default_classes = [
  'background' => 'background-home-support',
  'title-template-part' => 'title-template-part',
  'text-content' => 'text-content',
  'button' => 'button',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
  $modules = json_decode(file_get_contents($modules_file), true);
  $classes = array_merge($default_classes, $modules['support-home'] ?? []);
}
?>

<section class="section">
  <div class="<?php echo esc_attr($classes['background-home-support']); ?>"
    style="background-image: linear-gradient(rgba(20, 20, 20, 0.65), rgba(20, 20, 20, 0.65)), 
                url('<?php echo get_field('background_image_field'); ?>');">
    <div class="container wave-wrapper">
      <!-- Wave background -->
      <div class="<?php echo esc_attr($classes['wave']); ?>" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/wave-top.png');">
      </div>

      <!-- h2_title -->
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

      <p class="support-home__text"><?php echo esc_html($text); ?></p>

      <?php if ($button_text && $button_link) : ?>
        <a href="<?php echo esc_url($button_link); ?>" class="support-home__button">
          <?php echo esc_html($button_text); ?>
        </a>
      <?php endif; ?>
    </div>
</section>