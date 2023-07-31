<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cancri
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<style>
	.select-styled:after {
		content: url('<?php echo get_template_directory_uri()?>/assets/img/arrov-drop.svg');
		width: 0;
		height: 0;
		position: absolute;
		top: 1px;
		right: 20px;
	}
</style>

<div class="search_wrapper">
	<div class="search_block">
		<h3 class="heading-3 text-center">поиск</h3>
		<?php echo do_shortcode('[fibosearch]'); ?>
		<img src="<?php echo get_template_directory_uri()?>/assets/img/close_search.svg" alt="" class="close-search">
	</div>
	<div class="search_back"></div>
</div>

<header class="main_header">
	<div class="container">
		<div class="header_wrapper">
			<a href="/" class="main_logo"><img src="<?php echo get_template_directory_uri()?>/assets/img/logo_header.svg" alt="" class="logo_header"></a>
			<div class="nav_block">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main_menu',
							'menu_id'        => 'header-menu',
							'menu_class'	 => 'ul_nav',
							'container_class'=> 'nav_items'
						)
					);
					?>
					
				<div class="search_block_icon">
					<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="search_icon">
<circle cx="8.62167" cy="9.1207" r="8.1207" stroke="white"/>
<path d="M19.9997 20.5002L14.4824 14.9829" stroke="white" stroke-linecap="round"/>
</svg>

					<div class="shape_animation"></div>
				</div>

				<div class="lang_items">
					<div class="lang_item active_lang">RU</div>
					<span>/</span>
					<div class="lang_item">EN</div>
					<span>/</span>
					<div class="lang_item">TU</div>
				</div>
			</div>

		</div>
	</div>
</header>