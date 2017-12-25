<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package civilmplus
 */

$option = get_option('true_options'); 
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>
	<?php $og_image = $option['intro-bg']; 
	if ( is_single() ) {
		$thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
		if ( $thumb ) $og_image = $thumb;
	}
	?>
	<meta property="og:image" content="<?php echo $og_image; ?>" /> 
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- SVG CONTAINER -->
	<div class="svg-container" style="display: none;">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<symbol id="icon-fb" viewBox="0 0 18 18">
				<path fill-rule="evenodd" d="M17.003.004H.993C.447.004.002.45.002.997v16.01c0 .547.446.992.994.992h8.62v-6.97H7.267V8.316h2.345V6.312c0-2.324 1.42-3.59 3.493-3.59.992 0 1.846.074 2.095.107v2.428h-1.437c-1.128 0-1.346.537-1.346 1.323v1.735h2.69l-.35 2.716h-2.34V18h4.586c.548 0 .993-.446.993-.994V.996c0-.547-.445-.992-.993-.992z"/>
			</symbol>	
			<symbol id="icon-twitter" viewBox="0 0 20 17">
				<path fill-rule="evenodd" d="M6.29 17.003c7.548 0 11.676-6.537 11.676-12.205 0-.186-.004-.37-.012-.555.8-.605 1.498-1.36 2.047-2.22-.734.34-1.525.57-2.355.674.847-.53 1.497-1.37 1.804-2.373-.794.492-1.672.85-2.606 1.04C16.094.533 15.028.01 13.848.01c-2.266 0-4.104 1.92-4.104 4.29 0 .337.036.664.106.978-3.41-.18-6.434-1.886-8.458-4.482-.353.634-.556 1.37-.556 2.156 0 1.49.725 2.802 1.826 3.57-.673-.02-1.305-.214-1.858-.536v.054c0 2.078 1.414 3.813 3.29 4.206-.344.098-.706.15-1.08.15-.265 0-.522-.027-.772-.077.522 1.704 2.037 2.944 3.833 2.98C4.67 14.45 2.9 15.134.98 15.134c-.332 0-.66-.02-.98-.06 1.816 1.217 3.972 1.928 6.29 1.928"/>
			</symbol>
			<symbol id="icon-search" viewBox="0 0 20 20">
				<path fill-rule="evenodd" d="M20 18.16L18.165 20l-4.048-4.066c-1.477 1.117-3.306 1.788-5.293 1.788C3.958 17.722 0 13.747 0 8.862 0 3.973 3.957 0 8.823 0c4.865 0 8.824 3.974 8.824 8.86 0 1.954-.64 3.755-1.71 5.22L20 18.16zM8.832 2.396c-3.56 0-6.458 2.927-6.458 6.524s2.897 6.525 6.458 6.525c3.56 0 6.458-2.928 6.458-6.525 0-3.597-2.897-6.524-6.458-6.524z"/>
			</symbol>	
			<symbol id="download-arrow" viewBox="0 0 15 9">
				<path fill-rule="evenodd" d="M.646 1.353l.708-.707 7 7-.708.707-7-7z"/>
				<path fill-rule="evenodd" d="M14.354 1.353l-.708-.707-7 7 .708.707 7-7z"/>
			</symbol>	
			<symbol id="icon-phone" viewbox="0 0 15 22">
				<path fill-rule="evenodd" d="M14.12 20.63l-1.134.63c-4.924 2.895-9.638-3.413-11.303-7.19l-.006-.012-.073-.166-.073-.166c0-.004-.002-.007-.004-.01C-.14 9.935-1.614 2.197 3.836.505L5.067.09c.898-.304 1.857.177 2.12 1.062l.72 2.422c.268.896-.195 1.86-1.076 2.243L4.515 6.82c-.633.127-1.03.712-.962 1.3v.007c.004.03.007.06.013.092.155 1.115 1.453 4.163 1.453 4.163s1.373 3.013 2.092 3.88c.018.025.038.048.06.072l.003.005c.388.447 1.088.546 1.608.163l2.3-1.036c.876-.394 1.9-.087 2.38.714l1.302 2.166c.476.79.184 1.825-.645 2.285z"/>
			</symbol>	
			<symbol id="icon-mail" viewbox="0 0 23 15">
				<path fill-rule="evenodd" d="M21.504 15.012H1.487c-.82 0-1.49-.668-1.49-1.484V1.678l10.946 8.055c.164.12.36.18.553.18.195 0 .39-.06.556-.183l10.94-8.133v11.93c0 .817-.67 1.485-1.488 1.485zM.974.092c.16-.06.332-.097.513-.097h20.017c.152 0 .296.03.435.072L11.492 7.832.973.092z"/>
			</symbol>		
		</svg>
	</div>
	<!-- /SVG CONTAINER -->

	<!-- HEADER -->
	<header class="header">
		<a class="logo header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo $option['logo-header-url']; ?>" alt="logo" class="logo__img" />
			<h1 class="assistive-text">
				<?php bloginfo('name'); ?>
			</h1>
		</a>
		<div class="header__part">
			<div class="header__panel header__panel_top">
				<?php 
				wp_nav_menu( array(
					'theme_location' => 'additional', 
					'container' => false,
					'items_wrap' => '<nav class="%2$s">%3$s</nav>',
					'walker' => new Header_Menu_Walker,
					'menu_class' => 'nav header__nav'
				));
				?>

				<!-- <?php lang_switcher_header(); ?> -->
			</div>
			<div class="header__panel header__panel_bottom">
				<div class="burger" data-popup-open="menu">
					<span></span>
				</div>
				<?php 
				wp_nav_menu( array(
					'theme_location' => 'primary', 
					'container' => false,
					'items_wrap' => '<nav class="%2$s">%3$s</nav>',
					'walker' => new Header_Menu_Walker,
					'menu_class' => 'nav header__nav'
				));
				?>
				<div class="search search_desktop" data-search>
					<form role="search" method="get" class="search__form" action="<?php echo home_url( '/' ); ?>" data-search-form>
						<input type="search" name="s" placeholder="<?php _e('Введите запрос...', 'civilmplus'); ?>" class="search__field" value="<?php echo get_search_query() ?>" required data-search-field />
						<button class="search__submit" type="button" data-search-button>
							<svg class="icon-search">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
							</svg>
						</button>
					</form>
				</div>
				<div class="search search_mobile" data-popup-open="search">						
					<button class="search__submit" type="button">
						<svg class="icon-search">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
						</svg>
					</button>
				</div>
				<div class="socials">
					<a class="socials__item" href="<?php echo $option['twitter-url'] ?>" target="_blank">
						<span class="socials__icon">
							<svg class="icon-twitter">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-twitter"></use>
							</svg>
						</span>
					</a>
					<a class="socials__item" href="<?php echo $option['facebook-url'] ?>" target="_blank">
						<span class="socials__icon">
							<svg class="icon-fb">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-fb"></use>
							</svg>
						</span>
					</a>
				</div>
			</div>
		</div>
	</header>
	<!-- /HEADER -->

	<!-- MAIN -->
	<main>
		<h1 class="assistive-text">Content</h1>