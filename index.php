<?php 
/*
Plugin Name: Wtt stock addon for WooCommerce
Plugin URI : webtoptemplate.com
Description: Show atock availability and sold quantity
Version:1.0
Author: kardi
Author URI : https://github.com/ikardi420
License : GPL v or later
Text Domain: wtt-woo-stock
Domain Path : /languages/
WC requires at least: 4.2.0
WC tested up to: 4.9

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    add_action('woocommerce_after_shop_loop_item_title','wtt_atock_availability');

function wtt_atock_availability(){

	global $product;

	if ($product-> get_stock_quantity() >0 ){

		echo  esc_html_e('In stock: ','wtt-woo-stock').esc_html($product-> get_stock_quantity())." ";

	}
	else{ echo esc_html_e($product->get_stock_status(),'wtt-woo-stock')." ";}

    if($product->get_total_sales() >0 ){

    	echo esc_html_e('sold: ','wtt-woo-stock').esc_html($product->get_total_sales());
    }
}

}
