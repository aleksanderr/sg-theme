<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package civilmplus
 */

get_header(); ?>

<section class="search-page">
	<div class="search-page__hero">
		<div class="wrap">
			<h1 class="h1 search-page__title">
				<?php _e('Поиск', 'civilmplus'); ?>
			</h1>
			<div class="search-page__label">
				<?php echo __('По вашему запросу найдено результатов', 'civilmplus') . ': ' . $wp_query->found_posts; ?>
			</div>
			<div class="main-search">
				<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="main-search__form">
					<input type="search" name="s" placeholder="<?php _e('Введите запрос...', 'civilmplus'); ?>" value="<?php echo get_search_query(); ?>" class="main-search__field" required />
					<button class="main-search__submit">
						<svg class="icon-search">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
						</svg>
					</button>
				</form>
			</div>
		</div>
	</div>

	<?php if ( $wp_query->post_count !== 0 ) {
		get_template_part( 'template-parts/latest-news' ); 
		get_template_part( 'template-parts/latest-announcements' ); 
		get_template_part( 'template-parts/latest-publications' ); 
		get_template_part( 'template-parts/latest-projects' ); 
	} else get_template_part( 'template-parts/content', 'none' );	?>

</section>

<?php get_footer();
