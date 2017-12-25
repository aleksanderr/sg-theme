<?php
/**
 * Template part for displaying latest news
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */
?>

<?php 
$is_search = is_search();

$args = array(
	'post_type' => 'projects',
	'post-status' => 'publish',
	'posts_per_page' => 4,
	'orderby' => 'date',
	'order' => 'DESC'); 

if ( $is_search ) {
	$search = $_GET['s'];
	$args["s"] = $search;
}

$posts = new WP_Query( $args );
?>

<?php if ($posts->have_posts()): ?>
	<!-- LATEST -->
	<section class="latest">
		<div class="latest__head">
			<div class="wrap">
				<h2 class="h2 latest__title">				
					<?php if ( $is_search ) _e('В проектах и кампаниях', 'civilmplus');
					else _e('Проекты и кампании', 'civilmplus'); ?>
				</h2>
				<a class="link-more link-more_darkgray" href="<?php echo esc_url( home_url( '/' ) ); ?>
					<?php echo $args['post_type']; ?>/
					<?php if ($is_workgroup) echo '?workgroup='.get_queried_object()->term_id; ?>
					<?php if ($is_search) echo '?search='.$search; ?>">
					<span class="link-more__dots">
						<span></span>
						<span></span>
						<span></span>
					</span>				
					<?php if ( $is_search ) _e('Все результаты', 'civilmplus');
					else _e('Все проекты', 'civilmplus'); ?>
				</a>
			</div>
		</div>
		<div class="latest__list">
			<div class="wrap">
				<div class="cards cards_projects">
					<?php while ( $posts->have_posts() ) {
						$posts->the_post(); 
						get_template_part( 'template-parts/content', 'card' );  
					}; 
					wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</section>
	<!--/ LATEST -->
<?php endif; ?>