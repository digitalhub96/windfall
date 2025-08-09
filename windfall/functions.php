<?php
/*
 * Windfall Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/**
 * Define - Folder Paths
 */
define( 'WINDFALL_THEMEROOT_PATH', get_template_directory() );
define( 'WINDFALL_THEMEROOT_URI', get_template_directory_uri() );
define( 'WINDFALL_CSS', WINDFALL_THEMEROOT_URI . '/assets/css' );
define( 'WINDFALL_IMAGES', WINDFALL_THEMEROOT_URI . '/assets/images' );
define( 'WINDFALL_SCRIPTS', WINDFALL_THEMEROOT_URI . '/assets/js' );
define( 'WINDFALL_FRAMEWORK', get_template_directory() . '/inc' );
define( 'WINDFALL_LAYOUT', get_template_directory() . '/layouts' );
define( 'WINDFALL_CS_IMAGES', WINDFALL_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'WINDFALL_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'WINDFALL_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$windfall_theme_child = wp_get_theme();
	$windfall_get_parent = $windfall_theme_child->Template;
	$windfall_theme = wp_get_theme($windfall_get_parent);
} else { // Parent Theme Active
	$windfall_theme = wp_get_theme();
}
define('WINDFALL_NAME', $windfall_theme->get( 'Name' ));
define('WINDFALL_VERSION', $windfall_theme->get( 'Version' ));
define('WINDFALL_BRAND_URL', $windfall_theme->get( 'AuthorURI' ));
define('WINDFALL_BRAND_NAME', $windfall_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( WINDFALL_FRAMEWORK . '/init.php' );
