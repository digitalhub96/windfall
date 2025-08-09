<?php
/**
 * Plugin installation and activation for WordPress themes.
 *
 * Please note that this is a drop-in library for a theme or plugin.
 * The authors of this library (Thomas, Gary and Juliette) are NOT responsible
 * for the support of your plugin or theme. Please contact the plugin
 * or theme author for support.
 *
 * @package   TGM-Plugin-Activation
 * @version   2.6.1
 * @link      http://tgmpluginactivation.com/
 * @author    Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright Copyright (c) 2011, Thomas Griffin
 * @license   GPL-2.0+
 */

/*
        Copyright 2011 Thomas Griffin (thomasgriffinmedia.com)

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as
        published by the Free Software Foundation.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  U
SA
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
        return;
}

if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {

        /**
         * Automatic plugin installation and activation library.
         *
         * Creates a way to automatically install and activate plugins from with
in themes.
         * The plugins can be either bundled, downloaded from the WordPress
         * Plugin Repository or downloaded from another external source.
         *
         * @since 1.0.0
         *
         * @package TGM-Plugin-Activation
         * @author  Thomas Griffin
         * @author  Gary Jones
         */
        class TGM_Plugin_Activation {
                /**
                 * TGMPA version number.
                 *
                 * @since 2.5.0
                 *
                 * @const string Version number.
                 */
                const TGMPA_VERSION = '2.6.1';

                /**
                 * Regular expression to test if a URL is a WP plugin repo URL.
                 *
                 * @const string Regex.
                 *
                 * @since 2.5.0
                 */
                const WP_REPO_REGEX = '|^http[s]?://wordpress\.org/(?:extend/)?p
lugins/|';

                /**
                 * Arbitrary regular expression to test if a string starts with
a URL.
                 *
                 * @const string Regex.
                 *
                 * @since 2.5.0
                 */
                const IS_URL_REGEX = '|^http[s]?://|';

                /**
                 * Holds a copy of itself, so it can be referenced by the class
name.
                 *
                 * @since 1.0.0
                 *
                 * @var TGM_Plugin_Activation
                 */
                public static $instance;

                /**
                 * Holds arrays of plugin details.
                 *
                 * @since 1.0.0
                 * @since 2.5.0 the array has the plugin slug as an associative
key.
                 *
                 * @var array
                 */
                public $plugins = array();

                /**
                 * Holds arrays of plugin names to use to sort the plugins array
.
                 *
                 * @since 2.5.0
                 *
                 * @var array
                 */
                protected $sort_order = array();

                /**
                 * Whether any plugins have the 'force_activation' setting set t
o true.
                 *
                 * @since 2.5.0
                 *
                 * @var bool
                 */
                protected $has_forced_activation = false;

                /**
                 * Whether any plugins have the 'force_deactivation' setting set
 to true.
                 *
                 * @since 2.5.0
                 *
                 * @var bool
                 */
                protected $has_forced_deactivation = false;

                /**
                 * Name of the unique ID to hash notices.
                 *
                 * @since 2.4.0
                 *
                 * @var string
                 */
                public $id = 'tgmpa';

                /**
                 * Name of the query-string argument for the admin page.
                 *
                 * @since 1.0.0
                 *
                 * @var string
                 */
                protected $menu = 'tgmpa-install-plugins';

                /**
                 * Parent menu file slug.
                 *
                 * @since 2.5.0
                 *
                 * @var string
                 */
                public $parent_slug = 'themes.php';

                /**
                 * Capability needed to view the plugin installation menu item.
                 *
                 * @since 2.5.0
                 *
                 * @var string
                 */
                public $capability = 'edit_theme_options';

                /**
                 * Default absolute path to folder containing bundled plugin zip
 files.
                 *
                 * @since 2.0.0
                 *
                 * @var string Absolute path prefix to zip file location for bun
dled plugins. Default is empty string.
                 */
                public $default_path = '';

                /**
                 * Flag to show admin notices or not.
                 *
                 * @since 2.1.0
                 *
                 * @var boolean
                 */
                public $has_notices = true;

                /**
                 * Flag to determine if the user can dismiss the notice nag.
                 *
                 * @since 2.4.0
                 *
                 * @var boolean
                 */
                public $dismissable = true;

                /**
                 * Message to be output above nag notice if dismissable is false
.
                 *
                 * @since 2.4.0
                 *
                 * @var string
                 */
                public $dismiss_msg = '';

                /**
                 * Flag to set automatic activation of plugins. Off by default.
                 *
                 * @since 2.2.0
                 *
                 * @var boolean
                 */
                public $is_automatic = false;

                /**
                 * Optional message to display before the plugins table.
                 *
                 * @since 2.2.0
                 *
                 * @var string Message filtered by wp_kses_post(). Default is em
pty string.
                 */
                public $message = '';

                /**
                 * Holds configurable array of strings.
                 *
                 * Default values are added in the constructor.
                 *
                 * @since 2.0.0
                 *
                 * @var array
                 */
                public $strings = array();

                /**
                 * Holds the version of WordPress.
                 *
                 * @since 2.4.0
                 *
                 * @var int
                 */
                public $wp_version;

                /**
                 * Holds the hook name for the admin page.
                 *
                 * @since 2.5.0
                 *
                 * @var string
                 */
                public $page_hook;

                /**
                 * Adds a reference of this object to $instance, populates defau
lt strings,
                 * does the tgmpa_init action hook, and hooks in the interaction
s to init.
                 *
                 * {@internal This method should be `protected`, but as too many
 TGMPA implementations
                 * haven't upgraded beyond v2.3.6 yet, this gives backward compa
tibility issues.
                 * Reverted back to public for the time being.}}
                 *
                 * @since 1.0.0
                 *
                 * @see TGM_Plugin_Activation::init()
                 */
                public function __construct() {
                        // Set the current WordPress version.
                        $this->wp_version = $GLOBALS['wp_version'];

                        // Announce that the class is ready, and pass the object
 (for advanced use).
                        do_action_ref_array( 'tgmpa_init', array( $this ) );

                        /*
                         * Load our text domain and allow for overloading the fa
ll-back file.
                         *
                         * {@internal IMPORTANT! If this code changes, review th
e regex in the custom TGMPA
                         * generator on the website.}}
                         */
                        add_action( 'init', array( $this, 'load_textdomain' ), 5
 );
                        add_filter( 'load_textdomain_mofile', array( $this, 'ove
rload_textdomain_mofile' ), 10, 2 );

                        // When the rest of WP has loaded, kick-start the rest o
f the class.
                        add_action( 'init', array( $this, 'init' ) );
                }

                /**
                 * Magic method to (not) set protected properties from outside o
f this class.
                 *
                 * {@internal hackedihack... There is a serious bug in v2.3.2 -
2.3.6  where the `menu` property
                 * is being assigned rather than tested in a conditional, effect
ively rendering it useless.
                 * This 'hack' prevents this from happening.}}
                 *
                 * @see https://github.com/TGMPA/TGM-Plugin-Activation/blob/2.3.
6/tgm-plugin-activation/class-tgm-plugin-activation.php#L1593
                 *
                 * @since 2.5.2
                 *
                 * @param string $name  Name of an inaccessible property.
                 * @param mixed  $value Value to assign to the property.
                 * @return void  Silently fail to set the property when this is
tried from outside of this class context.
                 *               (Inside this class context, the __set() method
if not used as there is direct access.)
                 */
                public function __set( $name, $value ) {
                        // phpcs:ignore Squiz.PHP.NonExecutableCode.ReturnNotReq
uired -- See explanation above.
                        return;
                }

                /**
                 * Magic method to get the value of a protected property outside
 of this class context.
                 *
                 * @since 2.5.2
                 *
                 * @param string $name Name of an inaccessible property.
                 * @return mixed The property value.
                 */
                public function __get( $name ) {
                        return $this->{$name};
                }

                /**
                 * Initialise the interactions between this class and WordPress.
                 *
                 * Hooks in three new methods for the class: admin_menu, notices
 and styles.
                 *
                 * @since 2.0.0
                 *
                 * @see TGM_Plugin_Activation::admin_menu()
                 * @see TGM_Plugin_Activation::notices()
                 * @see TGM_Plugin_Activation::styles()
                 */
                public function init() {
                        /**
                         * By default TGMPA only loads on the WP back-end and no
t in an Ajax call. Using this filter
                         * you can overrule that behaviour.
                         *
                         * @since 2.5.0
                         *
                         * @param bool $load Whether or not TGMPA should load.
                         *                   Defaults to the return of `is_admin
() && ! defined( 'DOING_AJAX' )`.
                         */
                        if ( true !== apply_filters( 'tgmpa_load', ( is_admin()
&& ! defined( 'DOING_AJAX' ) ) ) ) {
                                return;
                        }

                        // Load class strings.
                        $this->strings = array(
                                'page_title'                      => __( 'Instal
l Required Plugins', 'tgmpa' ),
                                'menu_title'                      => __( 'Instal
l Plugins', 'tgmpa' ),
                                /* translators: %s: plugin name. */
                                'installing'                      => __( 'Instal
ling Plugin: %s', 'tgmpa' ),
                                /* translators: %s: plugin name. */
                                'updating'                        => __( 'Updati
ng Plugin: %s', 'tgmpa' ),
                                'oops'                            => __( 'Someth
ing went wrong with the plugin API.', 'tgmpa' ),
                                /* translators: 1: plugin name(s). */
                                'notice_can_install_required'     => _n_noop(
                                        'This theme requires the following plugi
n: %1$s.',
                                        'This theme requires the following plugi
ns: %1$s.',
                                        'tgmpa'
                                ),
                                /* translators: 1: plugin name(s). */
                                'notice_can_install_recommended'  => _n_noop(
                                        'This theme recommends the following plu
gin: %1$s.',
                                        'This theme recommends the following plu
gins: %1$s.',
                                        'tgmpa'
                                ),
                                /* translators: 1: plugin name(s). */
                                'notice_ask_to_update'            => _n_noop(
                                        'The following plugin needs to be update
d to its latest version to ensure maximum compatibility with this theme: %1$s.',
                                        'The following plugins need to be update
d to their latest version to ensure maximum compatibility with this theme: %1$s.
',
                                        'tgmpa'
                                ),
                                /* translators: 1: plugin name(s). */
                                'notice_ask_to_update_maybe'      => _n_noop(
                                        'There is an update available for: %1$s.
',
                                        'There are updates available for the fol
lowing plugins: %1$s.',
                                        'tgmpa'
                                ),
                                /* translators: 1: plugin name(s). */
                                'notice_can_activate_required'    => _n_noop(
                                        'The following required plugin is curren
tly inactive: %1$s.',
                                        'The following required plugins are curr
ently inactive: %1$s.',
                                        'tgmpa'
                                ),
                                /* translators: 1: plugin name(s). */
                                'notice_can_activate_recommended' => _n_noop(
                                        'The following recommended plugin is cur
rently inactive: %1$s.',
                                        'The following recommended plugins are c
urrently inactive: %1$s.',
                                        'tgmpa'
                                ),
                                'install_link'                    => _n_noop(
                                        'Begin installing plugin',
                                        'Begin installing plugins',
                                        'tgmpa'
                                ),
                                'update_link'                     => _n_noop(
                                        'Begin updating plugin',
                                        'Begin updating plugins',
                                        'tgmpa'
                                ),
                                'activate_link'                   => _n_noop(
                                        'Begin activating plugin',
                                        'Begin activating plugins',
                                        'tgmpa'
                                ),
                                'return'                          => __( 'Return
 to Required Plugins Installer', 'tgmpa' ),
                                'dashboard'                       => __( 'Return
 to the Dashboard', 'tgmpa' ),
                                'plugin_activated'                => __( 'Plugin
 activated successfully.', 'tgmpa' ),
                                'activated_successfully'          => __( 'The fo
llowing plugin was activated successfully:', 'tgmpa' ),
                                /* translators: 1: plugin name. */
                                'plugin_already_active'           => __( 'No act
ion taken. Plugin %1$s was already active.', 'tgmpa' ),
                                /* translators: 1: plugin name. */
                                'plugin_needs_higher_version'     => __( 'Plugin
 not activated. A higher version of %s is needed for this theme. Please update t
he plugin.', 'tgmpa' ),
                                /* translators: 1: dashboard link. */
                                'complete'                        => __( 'All pl
ugins installed and activated successfully. %1$s', 'tgmpa' ),
                                'dismiss'                         => __( 'Dismis
s this notice', 'tgmpa' ),
                                'notice_cannot_install_activate'  => __( 'There
are one or more required or recommended plugins to install, update or activate.'
, 'tgmpa' ),
                                'contact_admin'                   => __( 'Please
 contact the administrator of this site for help.', 'tgmpa' ),
                        );

                        do_action( 'tgmpa_register' );

                        /* After this point, the plugins should be registered an
d the configuration set. */

                        // Proceed only if we have plugins to handle.
                        if ( empty( $this->plugins ) || ! is_array( $this->plugi
ns ) ) {
                                return;
                        }

                        // Set up the menu and notices if we still have outstand
ing actions.
                        if ( true !== $this->is_tgmpa_complete() ) {
                                // Sort the plugins.
                                array_multisort( $this->sort_order, SORT_ASC, $t
his->plugins );

                                add_action( 'admin_menu', array( $this, 'admin_m
enu' ) );
                                add_action( 'admin_head', array( $this, 'dismiss
' ) );

                                // Prevent the normal links from showing underne
ath a single install/update page.
                                add_filter( 'install_plugin_complete_actions', a
rray( $this, 'actions' ) );
                                add_filter( 'update_plugin_complete_actions', ar
ray( $this, 'actions' ) );

                                if ( $this->has_notices ) {
                                        add_action( 'admin_notices', array( $thi
s, 'notices' ) );
                                        add_action( 'admin_init', array( $this,
'admin_init' ), 1 );
                                        add_action( 'admin_enqueue_scripts', arr
ay( $this, 'thickbox' ) );
                                }
                        }

                        // If needed, filter plugin action links.
                        add_action( 'load-plugins.php', array( $this, 'add_plugi
n_action_link_filters' ), 1 );

                        // Make sure things get reset on switch theme.
                        add_action( 'switch_theme', array( $this, 'flush_plugins
_cache' ) );

                        if ( $this->has_notices ) {
                                add_action( 'switch_theme', array( $this, 'updat
e_dismiss' ) );
                        }

                        // Setup the force activation hook.
                        if ( true === $this->has_forced_activation ) {
                                add_action( 'admin_init', array( $this, 'force_a
ctivation' ) );
                        }

                        // Setup the force deactivation hook.
                        if ( true === $this->has_forced_deactivation ) {
                                add_action( 'switch_theme', array( $this, 'force
_deactivation' ) );
                        }

                        // Add CSS for the TGMPA admin page.
                        add_action( 'admin_head', array( $this, 'admin_css' ) );
                }
        }
}
