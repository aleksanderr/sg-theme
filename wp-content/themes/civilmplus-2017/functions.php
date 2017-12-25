<?php
/**
 * civilmplus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package civilmplus
 */

if ( ! function_exists( 'civilmplus_2017_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function civilmplus_2017_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on civilmplus, use a find and replace
		 * to change 'civilmplus-2017' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'civilmplus-2017', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu().
		register_nav_menus(array(
			'additional' => 'Дополнительное меню', 
			'primary' => 'Главное',
			'footer' => 'Футер',
			'popup' => 'Попап'  
		));
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'civilmplus_2017_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'civilmplus_2017_setup' );

// /**
//  * Register widget area.
//  *
//  * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
//  */
// function civilmplus_2017_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'civilmplus-2017' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'civilmplus-2017' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'civilmplus_2017_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function civilmplus_2017_scripts() {

	wp_enqueue_style( 'likely-css', get_template_directory_uri() . '/libs/likely/likely.css' );
	wp_enqueue_script( 'likely-js', get_template_directory_uri() . '/libs/likely/likely.js' );

	// wp_enqueue_script( 'dotdotdot', get_template_directory_uri() . '/libs/dotdotdot/dotdotdot.js' );

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );

	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	wp_enqueue_script( 'custom-upload', get_template_directory_uri() . '/js/custom-upload.js', array('jquery'), null, false );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/core.js', array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'civilmplus_2017_scripts' );

/**
 * Remove emoji
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Load up our theme options
 */
require_once ( get_template_directory() . '/theme-options.php' );

/**
* Custom uploader
*/
function true_image_uploader_field( $name, $value = '', $w = 115, $h = 90) {
	$default = get_stylesheet_directory_uri() . '/img/no-image.png';
	if( $value ) {
		$image_attributes = wp_get_attachment_image_src( $value, array($w, $h) );
		$src = $image_attributes[0];
	} else {
		$src = $default;
	}
	echo '
	<div>
	<img data-src="' . $default . '" src="' . $src . '" width="' . $w . 'px" height="' . $h . 'px" />
	<div>
	<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
	<button type="submit" class="upload_image_button button">Загрузить</button>
	<button type="submit" class="remove_image_button button">&times;</button>
	</div>
	</div>
	';
}

/**
 *  Customize wp-admin login form logo
 */
function wp_login_logo() { ?>
<style type="text/css">
#login h1 a, .login h1 a {
	width: 233px;
	height: 37px;
	background-image: url(/wp-content/uploads/2017/12/logo_header.png);
	background-size: contain;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'wp_login_logo' );

/**
 * Remove default menus
 */
function remove_default_menus() {
    remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action('admin_menu','remove_default_menus');

/**
* Change tag class
*/
function change_attr_in_list_of_tags( $term_links ){
	$out = array();
	foreach( $term_links as $link )
		$out[] = str_replace('<a', '<a class="tag post__tag"', $link);

	return $out;
}
add_filter('term_links-tags', 'change_attr_in_list_of_tags');

/**
* Menu walkers
*/
class Header_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class='sub-menu'><ul class='sub-menu-inner'>\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}

class Footer_Menu_Walker extends Walker_Nav_Menu {
	// function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	// 	$classes = empty($item->classes) ? array () : (array) $item->classes;
	// 	$class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
	// 	!empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
	// 	$output .= "";
	// 	$attributes  = '';
	// 	!empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
	// 	!empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
	// 	!empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
	// 	!empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
	// 	$title = apply_filters( 'the_title', $item->title, $item->ID );
	// 	$item_output = $args->before
	// 	. "<a $attributes $class_names>"
	// 	. $args->link_before
	// 	. $title
	// 	. '</a>'
	// 	. $args->link_after
	// 	. $args->after;
	// 	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	// }
}

/*
* Custom link in menu
*/

function menu_custom_link( $items, $args ) {
	if ( $args->theme_location == 'primary' || $args->theme_location == 'popup' ) {
		$items .=  '<li class="nav__item"><a href="#">' . __('Присоединиться', 'civilmplus') . '</li>';
	}
	return $items;
}

// add_filter('wp_nav_menu_items','menu_custom_link', 10, 2);

/**
* Change menu item classes
*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'nav__item_active';
	}

	if (in_array('menu-item', $classes) ){
		$classes[] = 'nav__item';
	}
	return $classes;
}

/**
 * Filter the except length to 10 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
* Remove h2 from pagination
*/
add_filter('navigation_markup_template', 'navigation_template', 10, 2 );
function navigation_template( $template, $class ){
	return '<nav class="pagination">%3$s</nav>';
}

/**
* Convert dates
*/

function true_russian_date_forms($the_date = '') {
	if ( substr_count($the_date , '---') > 0 ) {
		return str_replace('---', '', $the_date);
	}
	$replacements = array(
		"Январь" => "января",
		"Февраль" => "февраля",
		"Март" => "марта",
		"Апрель" => "апреля",
		"Май" => "мая",
		"Июнь" => "июня",
		"Июль" => "июля",
		"Август" => "августа",
		"Сентябрь" => "сентября",
		"Октябрь" => "октября",
		"Ноябрь" => "ноября",
		"Декабрь" => "декабря"
	);
	return strtr($the_date, $replacements);
}
add_filter('the_time', 'true_russian_date_forms');
add_filter('get_the_time', 'true_russian_date_forms');
add_filter('the_date', 'true_russian_date_forms');
add_filter('get_the_date', 'true_russian_date_forms');
add_filter('the_modified_time', 'true_russian_date_forms');
add_filter('get_the_modified_date', 'true_russian_date_forms');
add_filter('get_post_time', 'true_russian_date_forms');
add_filter('get_comment_date', 'true_russian_date_forms');

/**
* Download file shortcode
*/
/* add_shortcode( 'file', 'file_shortcode' );
function file_shortcode( $atts ) { 
	$params = shortcode_atts( array(
		'url' => '',
		'img' => ''
	), $atts );	

	$url = $params['url'];

	if ( @fopen($url,"r") ) {
		$head = array_change_key_case(get_headers($url, TRUE));
		$filesize = $head['content-length'];

		$out .= '<div class="download-file">
					<div class="download-file__container">
						<div class="download-file__thumb" data-bg-src="' . $params['img'] . '" data-bg-size="cover" data-bg-pos="center center"></div>
						<div class="download-file__panel">
							<a href="'. $params['url'] .'" class="download-file__button">
								<span class="arrow">
									<svg class="icon-arrow">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#download-arrow"></use>
									</svg>
								</span>
								Скачать
							</a>
							<span class="download-file__attr">'. pathinfo($url, PATHINFO_EXTENSION) .', '. human_filesize($filesize) .'</span>
						</div>
					</div>
				</div>';

		return $out;
	} else {
		return 'File not found.';
	}

	clearstatcache();
}

function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
} */

/**
* Filter archive ordering
*/
add_action( 'pre_get_posts', 'custom_archive_order', 101 );
function custom_archive_order( $query ) {

    if ($query->is_post_type_archive('announcements'))  { // use the slug of your custom taxonomy
    	$query->set('orderby', 'meta_value');
    	$query->set('order', 'DESC');
    	// $query->set('value', 'strtotime("00:00:00")');
    	$query->set('meta_key', 'wpcf-announce-date');
    }


    return $query;
}

/*
* Get available languages
*/
function lang_switcher_header(){
	$languages = apply_filters( 'wpml_active_languages', NULL,  array( 'skip_missing' => 0) );

	if ( !empty($languages) ) {
		echo '<div class="dropdown-lang">
		<div class="dropdown-lang__container">
		<span class="dropdown-lang__item dropdown-lang__item_current">' . convert_lang_code(ICL_LANGUAGE_CODE) . '</span>
		<div class="dropdown-lang__list">';

		foreach($languages as $l){
			if(!$l['active']) echo '<a class="dropdown-lang__item" href="' . $l['url'] . '">' . convert_lang_code($l['language_code']) . '</a>';
		}

		echo '</div>
		</div>
		</div>';
	}
}

function lang_switcher_popup(){
	$languages = icl_get_languages('skip_missing=0');
	if ( !empty($languages) ) {
		echo '<div class="lang">';
		
		foreach($languages as $l){
			if($l['active']) echo' <a  href="' . $l['url'] . '" class="lang__item lang__item_active">' . convert_lang_code($l['language_code']) . '</a>';
			else echo' <a  href="' . $l['url'] . '" class="lang__item">' . convert_lang_code($l['language_code']) . '</a>';
		}
		echo '</div>';
	}	
}

/*
* Convert languages code
*/
function convert_lang_code($lang_code) {
	$replacements = array(
		"ru" => "Рус",
		"uk" => "Укр",
		"en" => "Eng"
	);
	return strtr($lang_code, $replacements);
}

/*
* Shortcode for get council members
*/
function get_council_members( $atts ){
	$args = array(
		'post_type' => 'experts',
		'posts_per_page' => -1,
		'post-status' => 'publish',
		'meta_query' => array(
			array(
				'key' => 'wpcf-council-member',
				'compare' => '=',
				'value' => 1
			)
		)
	);

	$members = new WP_Query( $args );
	echo '<div class="cards cards_experts">';
	while ( $members->have_posts() ) {
		$members->the_post(); 
		get_template_part( 'template-parts/content', 'card' ); 
	};
	wp_reset_query();
	echo '</div>';
}
add_shortcode( 'council', 'get_council_members' );

/*
* Exclude categories from search
*/
function exclude_category_from_search($query) {
	if ($query->is_search) {
		$query->set('cat', '-14,-21,-1');
	}
	return $query;
}
add_filter('pre_get_posts','exclude_category_from_search');

// /**
//  * Implement the Custom Header feature.
//  */
// require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Custom template tags for this theme.
//  */
// require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Functions which enhance the theme by hooking into WordPress.
//  */
// require get_template_directory() . '/inc/template-functions.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

