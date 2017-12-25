<?php
/**
 * Template part for displaying mailing block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

$option = get_option('true_options');
?>

<!-- MAILING -->
<section class="mailing">
	<h1 class="assistive-text">Mailing</h1>
	<div class="wrap">
		<div class="mailing__title">
			<?php _e('Подпишитесь и получайте последние новости', 'civilmplus'); ?>
		</div>
		<div class="mailing__form">
			<form action="#">
				<input type="text" class="mailing__field" placeholder="<?php _e('Ваш e-mail', 'civilmplus'); ?>">
				<button class="button mailing__button" type="submit">
					<?php _e('Подписаться', 'civilmplus'); ?>
				</button>
			</form>
		</div>
	</div>
</section>
<!-- /MAILING -->