<?php
$default_classes = [
  'main_photo' => 'main_photo',
  'image-container' => 'image-container',
  'upper-title-wrapper' => 'upper-title-wrapper',
  'title' => 'title',
  'title-template-part' => 'title-template-part',
  'main_section_slogan' => 'main_section_slogan',
  'slogan' => 'slogan',
  'main_section_columns-text' => 'main_section_columns-text',
  'left' => 'left',
  'right' => 'right'
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
  $modules = json_decode(file_get_contents($modules_file), true);
  $classes = array_merge($default_classes, $modules['hero-section-block'] ?? []);
}
?>

<section class='section'>
  <div class='container'>

    <!-- Main Image Home Hero Section -->
    <?php
    $hero_image = get_field('hero_image');
    if (!empty($hero_image)): ?>
      <div class="<?php echo esc_attr($classes['image-container']); ?>">
        <img class="<?php echo esc_attr($classes['main_photo']); ?>" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" />
      </div>
    <?php endif; ?>

    <!-- h2 title Home Hero Section -->
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

    <!-- Slogan Home Hero Section -->
    <?php
    $hero_slogan = get_field('hero_slogan');
    if (!empty($hero_slogan)) :
    ?>
      <div class="<?php echo esc_attr($classes['main_section_slogan']); ?>">
        <h3 class="<?php echo esc_attr($classes['slogan']); ?>"><?php echo wp_kses_post($hero_slogan); ?></h3>
      </div>
    <?php endif; ?>

    <!-- Columns Text -->
    <?php if (have_rows('hero_columns')):
    ?>
      <div class="<?php echo esc_attr($classes['main_section_columns-text']); ?>">
        <?php
        while (have_rows('hero_columns')): the_row();
          $left_column_text = get_sub_field('left_column_text');
          $right_column_text = get_sub_field('right_column_text');

          if (!empty($left_column_text)) :
        ?>
            <div class="<?php echo esc_attr($classes['left']); ?>">
              <p><?php echo wp_kses_post($left_column_text); ?></p>
            </div>
          <?php endif; ?>

          <?php if (!empty($right_column_text)) : ?>
            <div class="<?php echo esc_attr($classes['right']); ?>">
              <p><?php echo wp_kses_post($right_column_text); ?></p>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>