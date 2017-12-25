<?php
/**
 * Template part for displaying latest experts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */
?>

<?php
$args = array(
	'showposts' => 5,
	'post_type' => 'experts',
	'post_status' => 'publish',
	'tax_query' => array (
		array(
			'taxonomy' => 'workgroups',
			'field' => 'term_id',
			'terms' => get_queried_object()->term_id
		)
	)
);

$posts = new WP_Query( $args );
?>

<?php if ($posts->have_posts()): ?>
	<!-- MEMBERS -->
	<section class="members" id="members">
		<div class="wrap">
			<div class="members__container">
				<div class="members__head">
					<h2 class="h2 members__title">
						<?php _e('Участники рабочей группы', 'civilmplus'); ?>
					</h2>
					<a class="link-more link-more_darkgray members__more" href="<?php echo esc_url( home_url( '/' ) ); ?>
						<?php echo $args['post_type']; ?>/
						<?php echo '?workgroup='.get_queried_object()->term_id; ?>">
						<span class="link-more__dots">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<?php _e('Все участники', 'civilmplus'); ?>
					</a>
				</div>
				<div class="members__list">
					<?php while ( $posts->have_posts() ) {
						$posts->the_post(); 
						get_template_part( 'template-parts/content', 'card' );  
					}; 
					wp_reset_query(); ?>				
				</div>
			</div>
		</div>
	</section>
	<!-- /MEMBERS -->
<?php endif; ?>