<?php
/**
 * cancri functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cancri
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cancri_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on cancri, use a find and replace
		* to change 'cancri' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cancri', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main_menu' => esc_html__( 'header_menu', 'cancri' ),
			'catalog_value' => esc_html__( 'catalog_value', 'cancri' ),
			'catalog_item' => esc_html__( 'catalog_item', 'cancri' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cancri_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'cancri_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cancri_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cancri_content_width', 640 );
}
add_action( 'after_setup_theme', 'cancri_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cancri_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cancri' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cancri' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cancri_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cancri_scripts() {
	wp_enqueue_style( 'cancri-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'cancri-main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style( 'cancri-stylesheet', get_template_directory_uri() . '/assets/fonts/stylesheet.css');
 
	wp_style_add_data( 'cancri-style', 'rtl', 'replace' );


	wp_enqueue_script( 'cancri-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'cancri-jquery', get_template_directory_uri() . '/assets/js/jquery.v3.6.3.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'cancri-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cancri_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

add_action( 'woocommerce_single_product_summary', 'woocommerce_article_after_title', 1 ); 



function woocommerce_article_after_title(){

	global $product;

	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku" id="coupon-field"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span><img src="<?php echo get_template_directory_uri()?>/assets/img/copy-alt.svg" alt="" class="icon_copy"> <p class="coupon-alert">Артикул скопирован</p><input type="text" class="input_copy"></span>

	<?php endif;
}


add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_article_after_title_card', 1 ); 

function woocommerce_article_after_title_card(){

	global $product;

	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku icon_copy" id="coupon-field"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>

	<?php endif;
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
 function jk_related_products_args( $args ) {
 
$args['posts_per_page'] = 8; // количество "Похожих товаров"
 $args['columns'] = 6; // количество колонок
 return $args;

}


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

function loop_columns() {
	return 7; // 5 products per row
	}
add_filter('loop_shop_columns', 'loop_columns', 999);

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

add_filter( 'wcspt_reveal_last_img', '__return_true' );

function woocommerce_template_loop_product_title() {
    echo '<h2 class="woocommerce-loop-product__title">' .mb_strimwidth( get_the_title(), 0, 32, '...' ) . '</h2>'; 
}



function is_subcategory(){
	$cat = get_query_var('cat');
	$category = get_category($cat);
	$category->parent;
	return ( $category->parent == '0' ) ? false : true;
}


add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}

# Исправление MIME типа для SVG файлов
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
    if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
        $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
    else
        $dosvg = ('.svg' === strtolower(substr($filename, -4)));

    if ($dosvg) {
        if (current_user_can('manage_options')) {
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        } else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }

    return $data;
}


	function be_header_menu_desc( $item_output, $item, $depth, $args ) {
		if( 'catalog_item' == $args->theme_location && ! $depth && $item->description )
	
			$item_output = str_replace( '</a>', '<span class="description">' . $item->description . '</span><div class="button_cat">SHOP NOW<svg width="28" height="8" viewBox="0 0 28 8" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M27.7797 3.63665L22.3302 0.199891C22.1335 0.0753302 21.8524 0.0951309 21.6746 0.245773L18.9283 2.57597H14.69C14.6461 2.5341 14.6 2.49589 14.5516 2.46318L11.7913 0.598084C11.5222 0.416302 11.0744 0.279268 10.7497 0.279268H6.03989C5.76425 0.279268 5.53772 0.399817 5.41831 0.610035C5.35446 0.722384 5.32951 0.847991 5.34059 0.976651H3.56516C3.28952 0.976651 3.0629 1.0972 2.94358 1.30742C2.87414 1.42962 2.85068 1.56744 2.86978 1.70788H0.702967C0.427328 1.70788 0.200798 1.82843 0.0813841 2.03865C-0.0380302 2.24878 -0.0255567 2.50522 0.115665 2.74196L0.80668 3.90086C0.847066 3.96864 0.847066 4.13533 0.80668 4.20319L0.115665 5.36201C-0.0254695 5.59883 -0.037943 5.85519 0.0814713 6.06533C0.200886 6.27554 0.427415 6.39609 0.703054 6.39609H2.86987C2.85077 6.53653 2.87423 6.67435 2.94366 6.79655C3.06308 7.00677 3.28961 7.12732 3.56525 7.12732H5.35699C5.31869 7.2907 5.33788 7.45329 5.41831 7.59477C5.53772 7.80499 5.76425 7.92554 6.03989 7.92554H10.7497C11.0746 7.92554 11.5224 7.78842 11.7914 7.60655L14.5517 5.74162C14.6001 5.70891 14.6462 5.67071 14.6901 5.62884H19.0472L21.675 7.85837C21.7738 7.9422 21.9018 7.98825 22.0352 7.98825C22.1412 7.98825 22.2433 7.95921 22.3298 7.90443L27.7795 4.46758C27.9261 4.37521 28.0137 4.21985 28.0137 4.05194C28.0137 3.88403 27.9261 3.72876 27.7797 3.63665Z" fill="white"/>
			</svg>
			</div></a>', $item_output );
			return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'be_header_menu_desc', 10, 4 );


