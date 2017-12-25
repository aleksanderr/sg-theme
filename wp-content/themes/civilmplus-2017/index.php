<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

get_header(); ?>

<?php get_template_part( 'template-parts/introduction' ); 

// get_template_part( 'template-parts/mailing' ); 

get_template_part( 'template-parts/latest-news' ); 

get_template_part( 'template-parts/latest-projects' ); 

get_template_part( 'template-parts/statistics' ); ?>

<?php get_footer(); ?>