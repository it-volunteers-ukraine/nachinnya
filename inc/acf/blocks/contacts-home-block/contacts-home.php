<?php
$default_classes = [
  'title-template-part' => 'title-template-part',
  'text-content' => 'text-content',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
  $modules = json_decode(file_get_contents($modules_file), true);
  $classes = array_merge($default_classes, $modules['contacts-home'] ?? []);
}
?>

<section class="section">
  <!-- h2_title_contacts_home-->
  <?php
  // Ось тут ми використовуємо правильну змінну
  $contacts_title = get_field('contacts_title');
  if (!empty($contacts_title)) : ?>
    <div class="<?php echo esc_attr($classes['title-template-part']); ?>">
      <?php get_template_part('template-parts/h2-title-v2', null, [
        'title' => $contacts_title,  // передаємо правильну змінну
        'custom_text_class' => 'red-white-title',
        'custom_elements_class' => 'red-elements'
      ]); ?>
    </div>
  <?php endif; ?>

  <!-- Image Contacts -->
  <!-- тут додаємо готовий блок з фото з темплейтс -->

  <!-- Arrow Contacts -->
  <!-- тут додаємо стрілочку - вона вже завантажена -->

  <!-- Text Contacts Home Block -->
  <div class="<?php echo esc_attr($classes['text-content']); ?>">
    <p class="support-home-text"><?php the_field('contacts_text'); ?></p>
    <div class="contacts-phone"></div>
    <div class="contacts-email"></div>
  </div>

  <!-- Social Media Contacts Home Block -->
  <!-- у Трелло в мене є окремий коментар, як додати -->

  <div class="contacts-social-media"></div>

</section>