<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products container_related">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Вам также может понравиться', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2 class="relatede_heading"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<div class="container_slider_related">
		<div class="swiper_arrow_block swiper-prev"><img src="<?php echo get_template_directory_uri()?>/assets/img/swiper_prev.svg" alt="" class="swiper_arrow"></div>
		
			<div class="swiper swiper_related ">
				<div class="swiper-wrapper swiper_wrapper_related">

						<?php foreach ( $related_products as $related_product ) : ?>
								
							<div class="swiper-slide swiper_slide_related">
								
								<?php
								$post_object = get_post( $related_product->get_id() );

								setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

								wc_get_template_part( 'content', 'product' );
								?>

							</div>

						<?php endforeach; ?>

					
				</div>
			</div>
			
		<div class="swiper_arrow_block swiper-next"><img src="<?php echo get_template_directory_uri()?>/assets/img/swiper_next.svg" alt="" class="swiper_arrow"></div>
		
		</div>

	</section>
	<?php
endif;

wp_reset_postdata();
