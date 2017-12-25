<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package civilmplus
 */

get_header(); ?>

<!-- POST -->
<section class="custom-content post">

	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	endwhile;
	?>

</section>
<!-- /POST -->

<?php get_template_part( 'template-parts/latest-news' );  
get_template_part( 'template-parts/statistics' ); ?>

<?php
get_footer();
