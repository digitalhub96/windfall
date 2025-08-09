<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

if ( class_exists( 'WooCommerce' ) ) {

	// Remove Description Title From Single Products Page
	add_filter('woocommerce_product_description_heading','windfall_product_description_heading');

	function windfall_product_description_heading() {
    return '';
	}

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'windfall_product_limit', 20 );
	if ( ! function_exists('windfall_product_limit') ) {
	  function windfall_product_limit() {
	    $woo_limit = cs_get_option('theme_woo_limit');
	    $woo_limit = $woo_limit ? $woo_limit : '12';
	    return $woo_limit;
	  }
	}

	// Remove Shop Page Title
	add_filter( 'woocommerce_show_page_title' , 'windfall_hide_page_title' );
	function windfall_hide_page_title() {
		return false;
	}

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'windfall_single_product_gallery_image' );
	function windfall_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Single Product Page - Related Products Limit & columns
	add_filter( 'woocommerce_output_related_products_args', 'windfall_related_products_args' );
  function windfall_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
  	$columns = cs_get_option('woo_product_columns');
  	if ($woo_related_limit) {
			$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		} else {
			$args['posts_per_page'] = 4; // 4 related products
		}
		if($columns) {
			$args['columns'] = (int)$columns;
		} else {
			$args['columns'] = 3;
		}
		return $args;
	}
	// Related Products Title Change
	$related_title = cs_get_option('woo_related_title');
	function custom_related_products_text( $translated_text, $text, $domain ) {
	$related_title = cs_get_option('woo_related_title');
	  switch ( $translated_text ) {
	    case 'Related products' :
	      $translated_text = $related_title;
	      break;
	  }
	  return $translated_text;
	}
	if($related_title){
		add_filter( 'gettext', 'custom_related_products_text', 20, 3 );
	}

	// Remove You May Also Interested In section
  $woo_single_crosssell = cs_get_option('woo_single_crosssell');
  if(!$woo_single_crosssell) {
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	}

  // Remove Related Products section
  $woo_single_related = cs_get_option('woo_single_related');
  if(!$woo_single_related) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }

	// Product Column Limit - Shop Page
	add_filter('loop_shop_columns', 'windfall_loop_columns');
	if ( ! function_exists('windfall_loop_columns') ) {
		function windfall_loop_columns() {
			$col = cs_get_option('woo_product_columns');
			if($col) {
				return $col;
			} else {
				return 3;
			}
		}
	}

	// Remove You May Also Like section
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if($woo_single_upsell) {
		add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 20);
		if (!function_exists('woocommerce_output_upsells')) {
			function woocommerce_output_upsells() {
				$columns = cs_get_option('up_sell_column');
				$columns = $columns ? $columns : '3';
			    woocommerce_upsell_display(3,$columns); // Display 3 products in rows of 3
			}
		}
	}

} // class_exists => WooCommerce
