<?php
/**
 * The template for displaying items of tag
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

get_header(); 

$background = types_render_termmeta( 'group-background', array('output' => 'raw') );
$content = types_render_termmeta( "areas", '' );
?>

<!-- GROUP -->
<section class="group">
	<div class="group__hero" data-bg-src="<?php echo $background; ?>" data-bg-size="cover" data-bg-pos="center">
		<div class="wrap">
			<h1 class="h1 group__title">
				<?php single_term_title(); ?>
			</h1>
		</div>
		<div class="group-nav">
			<div class="wrap">
				<div class="group-nav__container">
					<a href="#" class="group-nav__item" data-scroll-to="members">
						<span class="group-nav__icon">

						</span>
						<span class="group-nav__label">
							<?php _e('Участники', 'civilmplus'); ?>
						</span>
					</a>
					<!-- <a href="#" class="group-nav__item" data-scroll-to="events">
						<span class="group-nav__icon">

						</span>
						<span class="group-nav__label">
							<?php _e('События', 'civilmplus'); ?>
						</span>
					</a> -->
					<a href="#" class="group-nav__item" data-scroll-to="news">
						<span class="group-nav__icon">

						</span>
						<span class="group-nav__label">
							<?php _e('Новости', 'civilmplus'); ?>
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="wrap">
		<div class="group__about">
			<div class="group__areas">
				<h2 class="h2">
					<?php _e('Области работы', 'civilmplus'); ?>
				</h2>
				<div class="areas-dropdown" data-areas>
					<div class="areas-dropdown__content" data-areas-content>
						<?php echo $content; ?>
					</div>
					<div class="areas-dropdown__panel" data-areas-toggle>
						<div class="areas-dropdown__arrow">
							<span class="arrow">
								<svg class="icon-arrow">
									<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#download-arrow"></use>
								</svg>
							</span>
						</div>
						<div class="areas-dropdown__label" data-areas-label-expand>
							<?php _e('Детальнее', 'civilmplus'); ?>
						</div>
						<div class="areas-dropdown__label" data-areas-label-collapse>
							<?php _e('Свернуть', 'civilmplus'); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="coming-events group__events" id="events">
				<div class="coming-events__head">
					<h2 class="h2">Cобытия</h2>
					<a class="link-more" href="#">
						<span class="link-more__dots">
							<span></span>
							<span></span>
							<span></span>
						</span>
						Все события
					</a>
				</div>

				<div class="coming-events__list">
					<a class="coming-event" href="#">
						<time class="coming-event__date">15.09</time>
						<h3 class="coming-event__title">
							Мультинациональная платформа, объединяющая
							авторитетных специалистов
						</h3>
					</a>

					<a class="coming-event" href="#">
						<time class="coming-event__date">15.09</time>
						<h3 class="coming-event__title">
							Мультинациональная платформа, объединяющая
						</h3>
					</a>

					<a class="coming-event" href="#">
						<time class="coming-event__date">15.09</time>
						<h3 class="coming-event__title">
							Мультинациональная платформа, объединяющая
							авторитетных
						</h3>
					</a>
				</div>

				<a class="link-more coming-events__link" href="#">
					<span class="link-more__dots">
						<span></span>
						<span></span>
						<span></span>
					</span>
					Ближайшие события
				</a>
			</div> -->
		</div>
	</div>
</section>
<!-- /GROUP -->

<?php 
get_template_part( 'template-parts/latest-news' );  
get_template_part( 'template-parts/latest-publications' );  
get_template_part( 'template-parts/latest-announcements' );  
get_template_part( 'template-parts/latest-experts' ); 
get_template_part( 'template-parts/statistics' ); ?>

<?php get_footer(); ?>
