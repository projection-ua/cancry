<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="flex_atrr_price">
<div class="atributes_block">

<?php

	global $product;

	$size = wp_get_object_terms($product->get_id(), 'pa_size');
	if (!empty($size)) {
		echo '<div class="product-attributes-item">';		
		foreach ($size as $item) { $size_all[] = $item->name; }
		echo '<p class="product-attributes-item__label"><span>Размер:</span></p>';
		echo '<p class="product-attributes-item__value">'.implode(', ', $size_all).'</p>';
		echo '</div>';
	}

	$size_stone = wp_get_object_terms($product->get_id(), 'pa_size_stone');
	if (!empty($size_stone)) {
		echo '<div class="product-attributes-item">';		
		foreach ($size_stone as $item) { $size_all_stone[] = $item->name; }
		echo '<p class="product-attributes-item__label"><span>Характеристики камня:</span></p>';
		echo '<p class="product-attributes-item__value">'.implode(', ', $size_all_stone).'</p>';
		echo '</div>';
	}
?>

</div>

<p class="price_main <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>

</div>