<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

$option = get_option('true_options');
?>

<!-- INTRODUCTION -->
<section class="introduction" data-bg-src="<?php echo $option['intro-bg']; ?>" data-bg-size="cover" data-bg-pos="top center">
	<div class="wrap introduction__content">
		<div class="introduction__text">
			<h1 class="h1 introduction__title">
				<?php _e($option['intro-title'], 'civilmplus'); ?>
			</h1>
			<p class="introduction__descr">
				<?php _e($option['intro-subtitle'], 'civilmplus'); ?>
			</p>
		</div>

		<?php get_template_part( 'template-parts/coming-events' ); ?>
	</div>
</section>
<!-- /INTRODUCTION -->