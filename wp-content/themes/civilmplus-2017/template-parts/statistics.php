<?php
/**
 * Template part for displaying statistics block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

$option = get_option('true_options');
$type = get_post_type(); 
$taxonomy = get_queried_object()->taxonomy;
?>

<!-- STATISTICS -->
<section class="statistics <?php if ( $type === 'experts' || $taxonomy === 'workgroups' || $type === 'organizations' )  echo 'statistics_light'; ?>">
	<div class="wrap">
		<h2 class="h2 statistics__title"> 
			<?php _e($option['statistics-title'], 'civilmplus'); ?> 
		</h2>
		<div class="statistics__items">
			<article class="statistics__item statistics__item_sm">
				<div class="statistics__bg" data-bg-src="<?php echo $option['statistics-img-1']; ?>" data-bg-size="cover" data-bg-pos="center"></div>
				<div class="statistics__number"> 
					<?php echo $option['statistics-val-1']; ?> 
				</div>
				<span class="statistics__divider"></span>
				<div class="statistics__label"> 
					<?php _e($option['statistics-text-1'], 'civilmplus'); ?> 
				</div>
			</article>
			<article class="statistics__item statistics__item_lg">
				<div class="statistics__bg" data-bg-src="<?php echo $option['statistics-img-2']; ?>" data-bg-size="cover" data-bg-pos="center"></div>
				<div class="statistics__number"> 
					<?php echo $option['statistics-val-2']; ?> 
				</div>
				<span class="statistics__divider"></span>
				<div class="statistics__label"> 
					<?php _e($option['statistics-text-2'], 'civilmplus'); ?> 
				</div>
			</article>
			<article class="statistics__item statistics__item_sm">
				<div class="statistics__bg" data-bg-src="<?php echo $option['statistics-img-3']; ?>" data-bg-size="cover" data-bg-pos="center"></div>
				<div class="statistics__number"> 
					<?php echo $option['statistics-val-3']; ?> 
				</div>
				<span class="statistics__divider"></span>
				<div class="statistics__label"> 
					<?php _e($option['statistics-text-3'], 'civilmplus'); ?> 
				</div>
			</article>
		</div>
		<p class="statistics__call">
			<?php _e($option['statistics-call'], 'civilmplus'); ?>
		</p>
		<a href="#" class="button statistics__button">
			<span>
				<?php _e('Присоединиться', 'civilmplus'); ?>
			</span>
		</a>
	</div>
</section>
<!-- /STATISTICS -->