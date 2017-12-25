<?php
/**
 * The template for displaying items of tag
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

get_header(); ?>

<section class="tag-page">
	<div class="tag-page__hero">
		<div class="wrap">
			<h1 class="h1 tag-page__title">
				<span class="tag"> 
					<?php single_term_title(); ?>
				</span>
			</h1>
			<div class="tag-page__label">
				<?php echo __('По данной теме найдено публикаций', 'civilmplus') . ': ' . $wp_query->found_posts; ?>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/latest-announcements' ); 
get_template_part( 'template-parts/latest-news' ); ?>

<?php get_footer(); ?>
