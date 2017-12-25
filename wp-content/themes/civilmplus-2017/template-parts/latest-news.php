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
$is_post = (is_single()) ? true : false;
$is_tag = (get_queried_object()->taxonomy == 'tags') ? true : false;
$is_workgroup = (get_queried_object()->taxonomy == 'workgroups') ? true : false;
$is_search = is_search();

if ( $is_workgroup ) {
	$args = array(
		'posts_per_page' => 4,
		'post_type' => 'news',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'tax_query' => array (
			array(
				'taxonomy' => 'workgroups',
				'field' => 'term_id',
				'terms' => get_queried_object()->term_id
			)
		)	
	);
} else if ( $is_tag ) {
	$args = array(
		'posts_per_page' => 4,
		'post_type' => 'news',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'tax_query' => array (
			array(
				'taxonomy' => 'tags',
				'field' => 'term_id',
				'terms' => get_queried_object()->term_id
			)
		)	
	);
} else {
	$args = array(
		'post_type' => 'news',
		'post-status' => 'publish',
		'posts_per_page' => 4,
		'orderby' => 'date',
		'order' => 'DESC'
	); 
}

if ( $is_search ) {
	$search = $_GET['s'];
	$args["s"] = $search;
}

if ( $is_post ) {
	$args["post__not_in"] = array(get_the_ID());
}

$posts = new WP_Query( $args );
?>

<?php if ($posts->have_posts()): ?>
	<!-- LATEST -->
	<section class="latest" id="news">
		<div class="latest__head <?php if ($is_post) echo 'latest__head_center'; ?>">
			<div class="wrap">
				<h2 class="h2 latest__title">
					<?php if ( $is_post ) _e('Также может заинтересовать', 'civilmplus');
					else if ( $is_search ) _e('В новостях', 'civilmplus');
					else _e('Новости'); ?>				
				</h2>

				<a class="link-more link-more_darkgray" href="<?php echo esc_url( home_url( '/' ) ); ?>
					<?php echo $args['post_type']; ?>/
					<?php if ($is_workgroup) echo '?workgroup='.get_queried_object()->term_id; ?>
					<?php if ($is_tag) echo '?label='.get_queried_object()->term_id; ?>
					<?php if ( $is_search ) echo '?search='.$search; ?>" >
					<span class="link-more__dots">
						<span></span>
						<span></span>
						<span></span>
					</span>
					<?php if ( $is_search ) _e('Все результаты', 'civilmplus');
					else _e('Все новости', 'civilmplus'); ?>
				</a>
			</div>
		</div>
		<div class="latest__list">
			<div class="wrap">
				<div class="cards cards_news">
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
<?php endif ?>