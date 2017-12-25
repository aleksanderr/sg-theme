<?php
/**
 * Template part for displaying card
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

?>

<?php 
$type = get_post_type(); 
$queried_object = get_queried_object();
$is_library = ( $queried_object->slug == 'library' ) ? true : false;
$permalink = get_the_permalink();

if ($type !== 'news') $type = substr($type, 0, -1);

if ($is_library) {
	$type ='publication';
	$permalink = types_render_field( 'library-url', array("output" => "raw") );
} 
?>

<?php if ($type == 'expert') { 
	$facebook = types_render_field('facebook', array('id' => $member->ID));	?>
	<article class="member">
		<div class="member__inner">
			<a class="member__photo" data-bg-src="<?php echo get_the_post_thumbnail_url($member->ID, 'medium'); ?>" data-bg-size="cover" data-bg-pos="center" href="<?php echo $permalink; ?>"></a>
			<div class="member__details">
				<a class="member__name" href="<?php echo $permalink; ?>">
					<h3>
						<?php echo the_title(); ?>
					</h3>
				</a>
				<a class="member__about" href="<?php echo $permalink; ?>">
					<?php echo types_render_field('position'); ?>
				</a>
				<?php if ( $facebook ) { ?>
				<div class="member__socials">
					<a href="<?php echo $facebook; ?>" class="member__social" target="_blank">
						<span>
							<svg class="icon-fb">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-fb"></use>
							</svg>
						</span>
					</a>
				</div>
				<?php }; ?>
			</div>
		</div>
	</article>
	<?php } else { 
		$thumbUrl = get_the_post_thumbnail_url(get_the_ID(), 'medium');

		if ( $type == 'announcement' ) {
			$currentDate = time();
			$announceDate = types_render_field( 'announce-date', array( 'format' => 'U' ) );
			$pastEvent = ($currentDate > $announceDate) ? true : false;
		} ?>
		<article class="card card_<?php echo $type; ?> <?php if ($pastEvent) echo 'card_past'; ?>">
			<div class="card__inner">
				<a class="card__thumb-container" href="<?php echo $permalink; ?>" <?php if ($is_library) echo 'target="_blank"'; ?> >
					<?php if ( $type == 'news' ) : ?>
						<div class="card__thumb" data-bg-src="<?php echo $thumbUrl; ?>" data-bg-size="cover" data-bg-pos="center"></div>
						<time class="card__date"><?php echo the_time('d.m'); ?></time>

					<?php elseif ( $type == 'announcement' ) : ?>
						<div class="card__thumb <?php echo ($thumb == '') ? 'card__thumb_empty' : ''; ?>" data-bg-src="<?php echo $thumbUrl; ?>" data-bg-size="cover" data-bg-pos="center"></div>
						<time class="card__date"><?php echo(types_render_field( 'announce-date', array( 'format' => 'd.m' ) )); ?></time>

					<?php elseif ( $type == 'project' ) : ?>
						<img class="card__thumb" src="<?php echo $thumbUrl; ?>" alt="" />

					<?php elseif ( $type == 'publication' ) : ?>
						<div class="card__thumb" data-bg-src="<?php echo $thumbUrl; ?>" data-bg-size="cover" data-bg-pos="center"></div>
					<?php endif; ?>
				</a>								
				<div class="card__details">
					<h3 class="card__title">
						<a href="<?php echo $permalink; ?>" <?php if ($is_library) echo 'target="_blank"'; ?> >
							<?php the_title(); ?>
						</a>
					</h3>
					<?php if ( $type == 'news' || $type == 'project' ) : ?>
						<div class="card__excerpt">
							<?php echo the_excerpt(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</article>
		<?php } ?>