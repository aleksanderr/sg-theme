<?php
/**
 * Template part for displaying donwload file link
 *
 * @package civilmplus
 */
?>

<?php $url = types_render_field( 'file-url' );

if ($url !== '') {
	if ( @fopen($url,"r") ) {
		function human_filesize($bytes, $decimals = 2) {
			$sz = 'BKMGTP';
			$factor = floor((strlen($bytes) - 1) / 3);
			return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
		}

		$head = array_change_key_case(get_headers($url, TRUE));
		$filesize = $head['content-length'];
		?>
		<!-- download file -->
		<div class="download-file">
			<div class="download-file__container">
				<div class="download-file__thumb" data-bg-src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>" data-bg-size="cover" data-bg-pos="center center"></div>
				<div class="download-file__panel">
					<a href="<?php echo $url; ?>" class="download-file__button" target="_blank">
						<span class="arrow">
							<svg class="icon-arrow">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#download-arrow"></use>
							</svg>
						</span>
						<?php _e('Скачать', 'civilmplus'); ?>
					</a>
					<span class="download-file__attr">
						<?php echo pathinfo($url, PATHINFO_EXTENSION); ?>, <?php echo human_filesize($filesize); ?>
					</span>
				</div>
			</div>
		</div>
		<!-- download file -->
		<?php 
		clearstatcache();
	}
}
?>