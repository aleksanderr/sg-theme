<?php $current_date = time();
if ( is_home() ) { 
	$args = array(
		'post_type' => 'announcements',
		'posts_per_page' => 3,
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

$events = new WP_Query( $args );

if ( $events ) { ?>

<div class="coming-events">
	<div class="coming-events__head">
		<h2 class="coming-events__title">
			<?php _e('Ближайшие события', 'civilmplus'); ?>			
		</h2>
		<a class="link-more" href="<?php echo esc_url( home_url( '/' ) ); ?>announcements">
			<span class="link-more__dots">
				<span></span>
				<span></span>
				<span></span>
			</span>
			<?php _e('Все', 'civilmplus'); ?>
		</a>
	</div>

	<div class="coming-events__list">

		<?php while ( $events->have_posts() ) {
			$events->the_post(); ?>
			<a class="coming-event" href="<?php echo get_permalink(); ?>">
				<time class="coming-event__date"><?php echo (types_render_field( 'announce-date', array( 'format' => 'd.m' ) )); ?></time>
				<h3 class="coming-event__title">
					<?php echo the_title(); ?>
				</h3>
			</a>
			<?php 
		};
		wp_reset_query(); ?>

	</div>

	<a class="link-more coming-events__link" href="/announcements">
		<span class="link-more__dots">
			<span></span>
			<span></span>
			<span></span>
		</span>
		<?php _e('Ближайшие события', 'civilmplus'); ?>	
	</a>
</div>
<?php }; ?>