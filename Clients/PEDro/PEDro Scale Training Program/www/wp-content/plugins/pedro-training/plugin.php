<?php
/**
 * PedroTraining FAQ Plugin
 *
 * @package         PEDRO\PedroTraining
 * @author          Purple Prodigy
 * @license         GPL-2.0+
 * @link            http://www.purpleprodigy.com
 *
 * @wordpress-plugin
 * Plugin Name:     PedroTraining FAQ
 * Plugin URI:      https://training.pedro.org.au/
 * Description:     Frequently asked questions (FAQ) plugin for Practice Papers
 * Version:         1.0.0
 * Author:          Purple Prodigy
 * Author URI:      http://www.purpleprodigy.com
 * Text Domain:     pedro
 * Requires WP:     3.5
 * Requires PHP:    5.4
 */

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace PEDRO\PedroTraining;

// Oh no you don't. Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheating&#8217; uh?' );
}

if ( ! defined( 'PEDRO_PLUGIN_DIR' ) ) {
	define( 'PEDRO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'PEDRO_PLUGIN_URL' ) ) {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}
	define( 'PEDRO_PLUGIN_URL', $plugin_url );
}

if ( ! defined( 'PEDRO_VERSION' ) ) {
	define( 'PEDRO_VERSION', '1.0.0' );
}

if ( version_compare( $GLOBALS['wp_version'], '3.5', '>' ) ) {
	init_hooks();
}

/**
 * Initialize the plugin hooks
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\flush_rewrites' );
	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\flush_rewrite_rules' );

	add_action( 'plugins_loaded', __NAMESPACE__ . '\launch', 20 );
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	require_once( __DIR__ . '/assets/vendor/autoload.php' );
}

/**
 * Flush the rewrites.
 *
 * @since 1.0.0
 *
 * @return void
 */
function flush_rewrites() {
	require_once( __DIR__ . '/assets/vendor/autoload.php' );

	Custom\register_faq_post_type();

	flush_rewrite_rules();
}
