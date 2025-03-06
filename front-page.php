<?php get_header(); ?>

<main class="home-page">
  <?php
  while (have_posts()) : the_post();
    the_content();
  endwhile;
  ?>
</main>

<?php get_footer(); ?>