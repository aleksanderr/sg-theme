<?php
/*
Template Name: About
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package civilmplus
*/

/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

get_header(); 
$option = get_option('true_options');
?>

<?php 
$args = array( 'category' => 14 );
$parts = get_posts( $args );
?>

<!-- GROUP -->
<section class="group group_no-border">
	<div class="group__hero" data-bg-src="<?php echo $option['about-bg']; ?>" data-bg-size="cover" data-bg-pos="center">
		<div class="wrap">
			<h1 class="h1 group__title">
				<?php _e($option['about-slogan'], 'civilmplus'); ?>
			</h1>
		</div>
		<div class="group-nav">
			<div class="wrap">
				<div class="group-nav__container">
					<?php 
					foreach ( $parts as $part ): setup_postdata( $part ); 
						?>
						<a href="#" class="group-nav__item" data-scroll-to="<?php echo $part->post_name ?>">							
							<?php echo types_render_field( 'about-icon', array("id" => $part->ID, "class" => "group-nav__icon") ); ?>
							<span class="group-nav__label">
								<?php echo $part->post_title; ?>
							</span>
						</a>
						<?php 
					endforeach; 
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /GROUP -->

<!-- ABOUT -->
<section class="about custom-content">
	<h1 class="assistive-text">About sections</h1>

	<?php 
	foreach ( $parts as $part ): setup_postdata( $part ); ?>
	<article class="about__section" id="<?php echo $part->post_name; ?>">
		<div class="wrap">
			<div class="about__wrap">
				<h2 class="h2 about__title"><?php echo $part->post_title; ?></h2>
				<img src="<?php echo get_the_post_thumbnail_url($part->ID,'full'); ?>" alt="" class="about__thumb" />
				<?php $content = get_the_content(); 
				if ($content) {
					echo '<div class="about__content">' . apply_filters( 'the_content', get_post_field('post_content', $part->ID) ) . '</div>';
				}?>	
			</div>
		</div>
	</article>
<?php endforeach; 
wp_reset_postdata();?>

</section>
<!-- /ABOUT -->

<?php get_footer(); ?>
