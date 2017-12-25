<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package civilmplus
 */

get_header(); ?>

<section class="error-page">
	<div class="wrap">
		<h2 class="error-page__code">404</h2>
		<div class="error-page__details">
			<h2>
				<?php _e('К сожалению, такой страницы нет', 'civilmplus'); ?>
			</h2>
			<a class="error-page__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php _e('На главную', 'civilmplus'); ?>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();
