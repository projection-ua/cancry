<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cancri
 */

?>

<?php
	if ( is_product_category() ){

		global $wp_query;
		$cat = $wp_query->get_queried_object();    
		$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
		$image = wp_get_attachment_url( $thumbnail_id );
	}
?>

<header class="entry-header">
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<?php if ( is_product_category( array('podkategorii', 'zoloto-s-brilliantom', 'zoloto-s-muassanitom', 'serebro-s-muassanitom' ) ) ) {?>

			<div class="title_img_block">
				<h1 class="woocommerce-products-header__title page-title heading-2 heading_category"><?php woocommerce_page_title(); ?></h1>
				<div class="img_category_block">
					<img src="<?php echo $image  ?>" alt="" class="img_category">
				</div>
			</div>
			<style>
				.container_catalog{
					display: grid;
					grid-template-columns: 16.6vw auto;
					gap: 8.69vw;
					margin-top: 4.375vw;
				}
				.products_grid .products{
					display: grid;
					grid-template-columns: repeat(3, 1fr);
					grid-column-gap: 30px;
					grid-row-gap: 54px
				}
				.products_grid .products .product .image_wrapper{
					height: 22.9vw !important;
				}
				.products_grid .product.last .image_wrapper {
					height: calc(100% - 7vw) !important;
					min-height: 22.9vw;
					padding: 0 !important;
				}
			</style>
		
		<?php 
	
	} elseif ( is_product_category( array('braslety', 'brosh', 'kole', 'kolca', 'perstni', 'sergi' ) )) { ?>
			
			
			<div class="header_category_type" style="background-image: url('<?php echo $image  ?>')">
				<div class="backgroung_linear_catelog"></div>
				<div class="type_icon_heading container">
					<img src="<?php echo get_field("icon_category", get_queried_object()); ?>" alt="" class="icon_category">
					<h1 class="woocommerce-products-header__title page-title heading-2"><?php woocommerce_page_title(); ?></h1>
				</div>
			</div>

			<style>
				.main_header{
					position: absolute;
					background: linear-gradient(0deg, rgba(0, 0, 0, 0.00) 10%, rgba(0, 0, 0, 0.5) 100%) !important;
					top: 0px;
					z-index: 9999;
					width: 100%;
				}
				.container_catalog{
					display: grid;
					grid-template-columns: 16.6vw auto;
					gap: 8.69vw;
					margin-top: 4.375vw;
				}
				.products_grid .products{
					display: grid;
					grid-template-columns: repeat(3, 1fr);
					grid-column-gap: 30px;
					grid-row-gap: 54px
				}
				.products_grid .products .product .image_wrapper{
					height: 22.9vw !important;
				}
				.products_grid .product.last .image_wrapper {
					height: calc(100% - 7vw) !important;
					min-height: 22.9vw;
					padding: 0 !important;
				}
			</style>
		
		<?php 
		} else{ 
			
			wp_nav_menu(
				array(
					'theme_location' => 'catalog_item',
					'menu_id'        => 'catalog_item',
					'menu_class'	 => 'grid_catalog',
					'container_class'=> 'catalog_nav_items'
				)
			);

		 } ?>
		
	<?php endif; ?>



	
	</header><!-- .entry-header -->

	<div class="container">
		<div class="filter_top">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'catalog_value',
						'menu_id'        => 'catalog_value',
						'menu_class'	 => 'catalog_ul_nav',
						'container_class'=> 'catalog_nav_items'
					)
				);
			?>
			<div class="filter_sort">
				<?php 
								/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>
				<?php echo do_shortcode('[wpf-filters id=3]') ?>
			</div>
		</div>
		<div class="container_catalog">
			<div class="filter_wrap">
				<?php echo do_shortcode('[wpf-filters id=1]'); ?>
			</div>

			<?php cancri_post_thumbnail(); ?>
			<div class="products_grid">
				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cancri' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
		

