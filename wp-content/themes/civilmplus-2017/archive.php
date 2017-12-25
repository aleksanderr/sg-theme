<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package civilmplus
 */

get_header(); 

$type = get_post_type();
$params = count($_GET);
$queried_object = get_queried_object();
$is_library = ( $queried_object->slug == 'library' ) ? true : false;


if ( $is_library ) {
	$type = 'publications';
}

if ( $params ) {
	$groupTax = isset($_GET['workgroup'])? $_GET['workgroup']: false;
	if ($groupTax) {
		$args = array(
			'post_type' => $type,
			'posts_per_page' => -1,
			'publish' => true,
			'tax_query' => array (
				array(
					'taxonomy' => 'workgroups',
					'field' => 'term_id',
					'terms' => $groupTax
				)
			)
		);
	}

	$tagTax = isset($_GET['label'])? $_GET['label']: false;
	if ($tagTax) {
		$args = array(
			'post_type' => $type,
			'posts_per_page' => -1,
			'publish' => true,
			'tax_query' => array (
				array(
					'taxonomy' => 'tags',
					'field' => 'term_id',
					'terms' => $tagTax
				)
			)
		);
	}

	$catTax = isset($_GET['publication-cat'])? $_GET['publication-cat']: false;
	if ($catTax) {
		$args = array(
			'post_type' => $type,
			'posts_per_page' => -1,
			'publish' => true,
			'tax_query' => array (
				array(
					'taxonomy' => 'publication-categories',
					'field' => 'term_id',
					'terms' => $catTax
				)
			)
		);
	}

	$search = isset($_GET['search'])? $_GET['search']: false;
	if ($search) {
		$args = array(
			'post_type' => $type,
			'posts_per_page' => -1,
			'publish' => true,
			's' => $search
		);
	}

	$posts = new WP_Query( $args );
}
?>

<section class="list-page">
	<div class="list-page__hero">
		<div class="wrap">
			<h1 class="h1 list-page__title">
				<?php if ($groupTax) {
					$term = get_term( $groupTax, 'workgroups' );
					echo $term->name.': ';
				} 
				else if ($is_library) echo single_cat_title(); 
				else echo post_type_archive_title(); ?>
			</h1>

			<?php if ($tagTax): $term = get_term( $tagTax, 'tags' ); ?>
				<div class="post__tags post__tags_center">
					<a class="tag post__tag" href="<?php echo get_term_link($term->term_id, 'tags'); ?>" rel="tag">
						<?php echo $term->name; ?>
					</a>
				</div>
			<?php endif; ?>

			<?php
			if ( $type == 'publications' && ! $is_library  && ! $search ) : 
				$terms = get_terms(array(
					'taxonomy' => 'publication-categories',
					// 'hide_empty' => false,
				));

				if ( $terms ) :
					?>
					<!-- filter -->
					<div class="filter">
						<div class="filter__container">
							<a href="/<?php echo $type; ?>" class="filter__item <?php if ( ! $params ) echo 'filter__item_current'; ?>">
								<?php _e('Все', 'civilmplus'); ?>
							</a>
							<?php foreach ( $terms as $term ) { ?>					
							<a href="?publication-cat=<?php echo $term->term_id; ?>" class="filter__item 
								<?php if ( $catTax == $term->term_id ) echo 'filter__item_current'; ?>"> 
								<?php echo $term->name; ?>
							</a>
							<?php }	?>
						</div>
					</div>
					<!-- /filter -->
				</div>

				<!-- filter dropdown -->
				<div class="filter-dropdown" data-dropdown>
					<div class="filter-dropdown__container">
						<div class="filter-dropdown__item filter-dropdown__item_current" data-dropdown-toggle>
							<?php _e('Все', 'civilmplus'); ?>
						</div>
						<div class="filter-dropdown__list">
							<?php foreach ( $terms as $term ) { ?>					
							<a href="?publication-cat=<?php echo $term->term_id; ?>" class="filter-dropdown__item"> 
								<?php echo $term->name; ?> 
							</a>
							<?php }	?>
						</div>
					</div>
				</div>
				<!-- /filter dropdown -->
				<?php 
			endif;
		endif; 
		?>
	</div>
</div>
<div class="wrap">
	<div class="cards cards_<?php echo $type; ?>">
		<?php if ($params) {
			while ( $posts->have_posts() ) {
				$posts->the_post();
				get_template_part( 'template-parts/content-card' );  
			}
			wp_reset_postdata();
		} else if ( have_posts() ) {
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-card' );           
			endwhile;
		};?>			
	</div>

	<?php if ( have_posts() && ! $params ) : 
	the_posts_pagination( array(
		'mid_size' => 2,
		'prev_next' => false
	) ); 		
	endif; ?>
</div>
</section>

<?php get_footer(); ?>