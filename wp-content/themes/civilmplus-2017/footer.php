<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package civilmplus
 */

$option = get_option('true_options');
?>
</main>
<!-- MAIN -->

<!-- FOOTER -->
<footer class="footer">
	<h1 class="assistive-text">Footer</h1>
	<div class="wrap">
		<div class="footer__main">

			<?php
			$menu_name = 'footer';
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
			$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
			?>

			<?php
			$count = 0;
			$submenu = false;
			foreach( $menuitems as $item ):
				$link = $item->url;
				$title = $item->title;
				if ( !$item->menu_item_parent ):
					$parent_id = $item->ID;
					?>
					<div class="footer__column">
						<ul class="nav footer__nav">
							<li class="nav__item">
								<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
							</li>
						<?php endif; ?>

						<?php if ( $parent_id == $item->menu_item_parent ): ?>

							<?php if ( !$submenu ): $submenu = true; ?>
							<?php endif; ?>

							<li class="nav__subitem">
								<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
							</li>

							<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
								<?php $submenu = false; endif; ?>

							<?php endif; ?>

							<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
							</ul>  
						</div>                         
						<?php $submenu = false; endif; ?>

						<?php $count++; endforeach; ?>
						<div class="footer__column footer__column_join">
							<a href="#" class="footer__join">
								<?php _e('Присоединиться  к платформе', 'civilmplus'); ?>
							</a>

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
				</div>
				<div class="footer__bottom">
					<div class="wrap">		
						<a class="logo footer__logo" href="<?php echo home_url( '/' ); ?>">
							<img src="<?php echo $option['logo-footer-url'] ?>" alt="logo" />
						</a>
						<div class="footer__copy">
							CivilMPlus, 2016 — <?php echo date("Y"); ?>
						</div>
						<div class="footer__dev">
							<?php _e('Разработка сайта', 'civilmplus'); ?> — <a target="_blank" href="https://demch.co/">demch.co</a>
						</div>
					</div>
				</div>		
			</footer>
			<!-- /FOOTER -->

			<!-- MENU POPUP -->
			<div class="popup menu-popup" data-popup="menu">
				<div class="burger" data-popup-close>
					<span></span>
				</div>

				<div class="popup__inner">
					<div class="wrap">

						<?php 
						wp_nav_menu( array(
							'theme_location' => 'popup', 
							'container' => false,
							'items_wrap' => '<nav class="%2$s">%3$s</nav>',
								// 'walker' => new Header_Menu_Walker,
							'menu_class' => 'nav menu-popup__nav menu-popup__nav_type_1'
						));
						?>

						<?php 
						wp_nav_menu( array(
							'theme_location' => 'additional', 
							'container' => false,
							'items_wrap' => '<nav class="%2$s">%3$s</nav>',
							'walker' => new Header_Menu_Walker,
							'menu_class' => 'nav menu-popup__nav menu-popup__nav_type_2'
						));
						?>
						<div class="socials">
							<a class="socials__item" href="#">
								<span class="socials__icon">
									<svg class="icon-twitter">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-twitter"></use>
									</svg>
								</span>
								<span class="socials__label">Twitter</span>
							</a>
							<a class="socials__item" href="#">
								<span class="socials__icon">
									<svg class="icon-fb">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-fb"></use>
									</svg>
								</span>
								<span class="socials__label">Facebook</span>
							</a>
						</div>

						<!-- <?php lang_switcher_popup(); ?> -->
					</div>
				</div>
			</div>
			<!-- /MENU POPUP -->

			<!-- SEARCH POPUP -->
			<div class="popup search-popup" data-popup="search">
				<div class="burger" data-popup-close>
					<span></span>
				</div>

				<div class="popup__inner">
					<div class="search-popup__container">
						<div class="wrap">
							<div class="search-popup__label">
								<?php _e('Поиск по сайту', 'civilmplus'); ?>
							</div>
							<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-popup__form">
								<input type="search" name="s" placeholder="<?php _e('Введите запрос...', 'civilmplus'); ?>" value="<?php echo get_search_query(); ?>" class="search-popup__field" required />
								<button class="search-popup__submit">
									<svg class="icon-search">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
									</svg>
								</button>
							</form>
						</div>
					</div>			
				</div>
			</div>
			<!-- /SEARCH POPUP -->

			<?php wp_footer(); ?>

		</body>
		</html>