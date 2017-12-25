<?php
/**
 * Template part for displaying reminder block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */
?>

<div class="reminder">
	<time class="reminder__time"> 
		<?php echo(types_render_field( 'announce-date', array( 'format' => 'd F, H:i' ) )); ?> 
	</time>
	<div class="reminder__label">
		<span>
			<?php _e('Напомнить о событии', 'civilmplus'); ?>
		</span>
	</div>
	<form action="" class="reminder__form">
		<input type="text" class="reminder__field" placeholder="<?php _e('Ваш e-mail', 'civilmplus'); ?>">
		<button class="button reminder__button" role="button">
			<?php _e('Напомнить', 'civilmplus'); ?>
		</button>
	</form>
</div>