<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

?>

<?php $type = get_post_type(); ?>

<div class="wrap">
	<div class="post__container">
		<div class="post__head">
			<?php if ( $type != "projects" && $type != "publications" && $type != "announcements"): ?>
				<time class="post__date"> 
					<?php the_date('d.m'); ?> 
				</time>
			<?php elseif ($type == "announcements"): $announce_date = (types_render_field( 'announce-date', array( 'format' => 'd.m' ) )); ?>
				<time class="post__date"> 
					<?php echo $announce_date; ?> 
				</time>
			<?php endif; ?>

			<h1 class="h1 post__title"> 
				<?php the_title(); ?>
			</h1>
			
			<?php $tags = get_the_term_list(get_the_ID(), 'tags');
			if ( $tags ) { ?>
			<div class="post__tags">
				<?php echo $tags; ?>
			</div>	
			<?php } ?>		
		</div>	

		<?php $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); 
		if ($thumb_url) { ?>		
		<div class="post__thumb" data-bg-src="<?php echo $thumb_url; ?>" data-bg-size="cover" data-bg-pos="center"></div>
		<?php }; ?>
		
		<?php if ( $type == "announcements" && $announce_date) get_template_part( 'template-parts/reminder' ); ?>

		<?php the_content(); ?>

		<?php if ( $type = "publications" ) get_template_part( 'template-parts/download-file' ); ?>
	</div>
</div>

<div class="likely likely-big">
	<div class="twitter">
		<?php _e('Твитнуть', 'civilmplus'); ?>
	</div>
	<div class="facebook">
		<?php _e('Поделиться', 'civilmplus'); ?>
	</div>
	<div class="gplus"></div>
	<div class="telegram">
		<?php _e('Отправить', 'civilmplus'); ?>
	</div>
</div>
