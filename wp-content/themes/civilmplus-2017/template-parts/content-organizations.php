<?php
/**
 * Template part for displaying expert profile
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

$facebook = types_render_field( 'organization-facebook', array("output" => "raw") );
$email = types_render_field( 'organization-email', array("output" => "raw") );
$address = types_render_field( 'organization-address', array("output" => "raw") );
$website = types_render_field( 'organization-website', array("output" => "raw") );
?>

<!-- USER -->
<section class="user user_organization">
	<div class="user__head" data-bg-src="<?php echo get_template_directory_uri(); ?>/pic/user-bg.png" data-bg-size="cover" data-bg-pos="unset">
		<div class="wrap">
			<img class="user__avatar" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'middle'); ?>"></img>
			<div class="user__main">
				<h1 class="h1 user__name">
					<?php echo the_title(); ?>
				</h1>
			</div>
		</div>
	</div>
	<div class="user__about">
		<div class="wrap">
			<div class="user__info">
				<h2 class="h2">
					<?php _e('Информация', 'civilmplus'); ?>
				</h2>
				<?php the_content(); ?>
			</div>
			<?php if ( $website || $address || $email || $facebook ) : ?>
				<div class="user__contacts">
					<h2 class="h2">
						<?php _e('Контакты', 'civilmplus'); ?>
					</h2>

					<?php if ( $website ): ?>		
						<a class="user-contact" href="<?php echo $website; ?>" target="_blank">
							<div class="user-contact__icon">
								<span>
									<svg class="icon-phone">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-phone"></use>
									</svg>
								</span>
							</div>
							<span class="user-contact__value">
								<?php echo esc_url($website); ?>
							</span>
						</a>
					<?php endif; ?>

					<?php if ( $email ): ?>		
						<a class="user-contact" href="mailto:<?php echo $email; ?>">
							<div class="user-contact__icon">
								<span>
									<svg class="icon-mail">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-mail"></use>
									</svg>
								</span>
							</div>
							<span class="user-contact__value">
								<?php echo $email; ?>
							</span>
						</a>
					<?php endif; ?>

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

					<?php if ( $address ): ?>			
						<div class="user-contact">
							<div class="user-contact__icon">
								<span>
									<svg class="icon-fb">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-fb"></use>
									</svg>
								</span>
							</div>
							<span class="user-contact__value">
								<?php echo $address; ?>
							</span>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- /USER -->