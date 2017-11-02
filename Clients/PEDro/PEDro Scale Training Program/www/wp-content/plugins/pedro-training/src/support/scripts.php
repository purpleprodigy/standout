<?php
/**
 * Script handling and functionality.
 *
 * @package     PEDRO\PedroTraining\Support
 * @since       1.0.0
 * @author      Purple Prodigy
 * @link        http://www.purpleprodigy.com/
 * @licence     GNU General Public License 2.0+
 */

namespace PEDRO\PedroTraining\Support;

use Hamcrest\StringDescription;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts');
/**
 * Enqueue scripts
 *
 * @since 1.0.0
 *
 * @return void
 */

function enqueue_scripts() {
	wp_enqueue_script(
		'pedro_sandbox',
		PEDRO_PLUGIN_URL . 'assets/js/sandbox.js',
		array( 'jquery' ),
		PEDRO_VERSION,
		true
	);
	wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );
}

