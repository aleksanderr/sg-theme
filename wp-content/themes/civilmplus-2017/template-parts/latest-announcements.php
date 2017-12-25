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
$is_post = (get_post_type() == 'news') ? true : false;
$is_tag = (get_queried_object()->taxonomy == 'tags') ? true : false;
$is_workgroup = (get_queried_object()->taxonomy == 'workgroups') ? true : false;
$is_search = is_search();

if ( $is_workgroup ) {
	$args = array(
		'posts_per_page' => 4,
		'post_type' => 'announcements',
		'post_status' => 'publish',
		'orderby'=>'wpcf-announce-date',
		'order'=>'ASC',
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
		'post_type' => 'announcements',
		'post_status' => 'publish',
		'orderby'=>'wpcf-announce-date',
		'order'=>'ASC',
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
		'post_type' => 'announcements',
		'posts_per_page' => 4,
		'post-status' => 'publish',
		'orderby'=>'wpcf-announce-date',
		'order'=>'ASC',
		'meta_query' => array(
			array(
				'key' => 'wpcf-announce-date',
				'compare' => '>=',
				'value' => $current_date
			)
		)
	);
}

if ( $is_search ) {
	$search = $_GET['s'];
	$args["s"] = $search;
}

$posts = new WP_Query( $args );
?>

<?php if ($posts->have_posts()): ?>
	<!-- LATEST -->
	<section class="latest" id="annoucements">
		<div class="latest__head">
			<div class="wrap">
				<h2 class="h2 latest__title">
					<?php if ( $is_search ) _e('В анонсах', 'civilmplus');
					else echo _e('Анонсы', 'civilmplus'); ?>
				</h2>
				<a class="link-more link-more_darkgray" href="<?php echo esc_url( home_url( '/' ) ); ?>
					<?php echo $args['post_type']; ?>/
					<?php if ($is_workgroup) echo '?workgroup='.get_queried_object()->term_id; ?>
					<?php if ($is_tag) echo '?label='.get_queried_object()->term_id; ?>
					<?php if ($is_search) echo '?search='.$search; ?>" >
					<span class="link-more__dots">
						<span></span>
						<span></span>
						<span></span>
					</span>
					<?php if ( $is_search ) _e('Все результаты', 'civilmplus');
					else _e('Все анонсы', 'civilmplus'); ?>
				</a>
			</div>
		</div>
		<div class="latest__list">
			<div class="wrap">
				<div class="cards cards_announcements">
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