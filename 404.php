<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package wp-it-volunteers
 */

get_header();

$ornament_url = get_template_directory_uri() . "/assets/images/symbol-defs.svg#icon-ornament1";
?>
	<style>
		.ornament {
			background-image: url('<?php bloginfo('template_url'); ?>/assets/images/ornament1.svg');
		}
	</style>
	<main id="primary" class="site-main 404-main">
		<section class="section section-404">
			<div class="container container-404">
				<header class="page-404-header">
					<h2 class="page-404-header-not-found">
						<?= get_field('header_page_not_found', 'option') ?>
					</h2>
					<h1 class="page-404-header-error-code">404</h1>
				</header><!-- .page-header -->
				<div class="page-404-content">
					<p class="page-404-content-text">
						<?= get_field('header_something_went_wrong', 'option') ?>
					</p>
					<div class="page-404-content-link">
						<a class="page-404-content-link-button" href="<?= get_home_url() ?>">
							<?= get_field('return_to_main_page_button_text', 'option') ?>
						</a>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->

		<div class="ornament"></div>
	</main><!-- #main -->
<?php
get_footer('404');