<?php
/*
 * All Windfall Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/* Theme All Basic Setup */
require_once( WINDFALL_FRAMEWORK . '/theme-support.php' );
require_once( WINDFALL_FRAMEWORK . '/backend-functions.php' );
require_once( WINDFALL_FRAMEWORK . '/frontend-functions.php' );
require_once( WINDFALL_FRAMEWORK . '/enqueue-files.php' );
require_once( WINDFALL_FRAMEWORK . '/gallery-ajax-post.php' );
require_once( WINDFALL_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( WINDFALL_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( WINDFALL_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( WINDFALL_FRAMEWORK . '/plugins/notify/activation.php' );

/* Sidebars */
require_once( WINDFALL_FRAMEWORK . '/core/sidebars.php' );

/* Dynamic styles Include */
require_once( WINDFALL_FRAMEWORK . '/dynamic-style.php' );
