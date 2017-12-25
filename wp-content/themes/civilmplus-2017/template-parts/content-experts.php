<?php
/**
 * Template part for displaying expert profile
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

$facebook = types_render_field( 'facebook' );
$phone = types_render_field( 'phone' );
$mail = types_render_field( 'mail', array("output" => "raw") );
$groups = get_the_terms(get_the_ID(), 'workgroups');
?>

<!-- USER -->
<section class="user">
	<div class="user__head" data-bg-src="<?php echo get_template_directory_uri(); ?>/pic/user-bg.png" data-bg-size="cover" data-bg-pos="unset">
		<div class="wrap">
			<div class="user__avatar" data-bg-src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'middle'); ?>" data-bg-size="cover" data-bg-pos="center center"></div>
			<div class="user__main">
				<h1 class="h1 user__name">
					<?php echo the_title(); ?>
				</h1>
				<?php if ( $groups ) {
					foreach ( $groups as $group ) { ?>
					<a class="user-group" href="<?php echo get_term_link($group); ?>"> 
						<span class="user-group__icon"></span>
						<div class="user-group__part">
							<div class="user-group__label">
								<?php _e('В рабочей группе', 'civilmplus'); ?>
							</div>
							<div class="user-group__name">
								<?php echo $group->name; ?>
							</div>
						</div>					
					</a>				
					<?php }
				} ?>	
			</div>
		</div>
	</div>
	<div class="user__about">
		<div class="wrap">
			<div class="custom-content user__info">
				<h2 class="h2">
					<?php _e('Информация', 'civilmplus'); ?>
				</h2>
				<?php the_content(); ?>
			</div>
			<?php if ( $facebook || $phone || $mail ) : ?>
				<div class="user__contacts">
					<h2 class="h2">
						<?php _e('Контакты', 'civilmplus'); ?>
					</h2>

					<?php if ( $facebook ): ?>			
						<a class="user-contact" href="<?php echo $facebook; ?>" target="_blank">
							<div class="user-contact__icon">
								<span>
									<svg class="icon-fb">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-fb"></use>
									</svg>
								</span>
							</div>
							<span class="user-contact__value">Facebook</span>
						</a>
					<?php endif; ?>

					<?php if ( $phone ): ?>		
						<a class="user-contact" href="tel:+<?php echo str_replace(" ","",$phone); ?>">
							<div class="user-contact__icon">
								<span>
									<svg class="icon-phone">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-phone"></use>
									</svg>
								</span>
							</div>
							<span class="user-contact__value">
								<?php echo $phone; ?>
							</span>
						</a>
					<?php endif; ?>

					<?php if ( $mail ): ?>		
						<a class="user-contact" href="mailto:<?php echo $mail; ?>">
							<div class="user-contact__icon">
								<span>
									<svg class="icon-mail">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-mail"></use>
									</svg>
								</span>
							</div>
							<span class="user-contact__value">
								<?php echo $mail; ?>
							</span>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- /USER -->