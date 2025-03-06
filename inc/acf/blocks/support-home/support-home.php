<?php
$block_id = 'support-home-' . $block['id'];
$class_name = 'support-home';

if (!empty($block['anchor'])) {
  $block_id = $block['anchor'];
}

if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$title = get_field('support_title');
$text = get_field('support_text');
$button_text = get_field('support_button_text');
$button_link = get_field('support_button_link');

$background_image = wp_get_attachment_image_url(get_field('background_image'), 'full'); // Фонова картинка
$background_style = $background_image ? 'background-image: url(' . esc_url($background_image) . ');' : '';

$wave_image = get_template_directory_uri() . '/assets/images/wave-top.png'; // Хвиля

// Підключення стилів для блоку
wp_enqueue_style(
  'support-home-block-style', // Ідентифікатор стилю
  get_template_directory_uri() . '/inc/acf/blocks/support-home/support-home.module.scss', // Шлях до стилів
  array(), // Залежності
  filemtime(get_template_directory() . '/inc/acf/blocks/support-home/support-home.module.scss')
);
?>

<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($background_style); ?>">

  <img src="<?php echo esc_url($wave_image); ?>" alt="Хвиля" class="support-home__wave">

  <div class="support-home__container">
    <img src="<?php echo esc_url($circlesleft_image); ?>" alt="Орнамент кола зліва зверху" class="support-home__circlesleft-top">
    <h2 class="support-home__title"><?php echo esc_html($title); ?></h2>
    <img src="<?php echo esc_url($circlesright_image); ?>" alt="Орнамент кола справа знизу" class="support-home__circlesright-lower">
    <img src="<?php echo esc_url($wavyline_image); ?>" alt="Орнамент хвиаяста лінія з клубком" class="support-home__wavyline-tangle">
    <p class="support-home__text"><?php echo esc_html($text); ?></p>

    <?php if ($button_text && $button_link) : ?>
      <a href="<?php echo esc_url($button_link); ?>" class="support-home__button">
        <?php echo esc_html($button_text); ?>
      </a>
    <?php endif; ?>
  </div>

</section>