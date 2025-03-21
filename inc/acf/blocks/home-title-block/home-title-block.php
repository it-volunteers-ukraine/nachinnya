<?php
$title = get_field('home_title_text');

$modules_json = get_template_directory() . '/assets/blocks/styles/modules.json';
$styles = [];

if (file_exists($modules_json)) {
  $styles = json_decode(file_get_contents($modules_json), true);
}

// Отримуємо значення поля заголовка
$title = get_field('home_title_text');

// Перевіряємо, чи є потрібні класи
$block_class = $styles['home-title-block']['home-title-block'] ?? '';
$title_class = $styles['home-title-block']['home-title'] ?? '';

if ($title) {
  echo "<section class='$block_class'>";
  echo "<h1 class='$title_class'>$title</h1>";
  echo "</section>";
} else {
  echo "<h1>Заголовок не знайдено!</h1>";
}
