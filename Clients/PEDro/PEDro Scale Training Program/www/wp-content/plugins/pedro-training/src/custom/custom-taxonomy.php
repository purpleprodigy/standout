<?php
/**
 * Custom taxonomy
 *
 * @package     PEDRO\PedroTraining\Custom
 * @since       1.0.0
 * @author      Purple Prodigy
 * @link        http://www.purpleprodigy.com
 * @licence     GNU General Public License 2.0+
 */

namespace PEDRO\PedroTraining\Custom;

add_action( 'init', __NAMESPACE__ . '\register_faq_category_taxonomy' );
/*
 * Register Taxonomy for FAQ Category
 *
 * @since 1.0.0
 *
 * @return void
 */

function register_faq_category_taxonomy() {

	$labels = array(
		'name'          => _x( 'FAQ Categories', 'taxonomy general name', 'pedrotraining' ),
		'singular_name' => _x( 'FAQ Category', 'taxonomy singular name', 'pedrotraining' ),
		'menu_name'     => _x( 'FAQ Categories', 'admin menu name', 'pedrotraining' ),
		'all_items'     => __( 'All FAQ Categories', 'pedrotraining' ),
		'add_new_item'  => __( 'Add New FAQ Category', 'pedrotraining' ),
		'view_item'     => __( 'View FAQ Category', 'pedrotraining' ),
		'edit_item'     => __( 'Edit FAQ Category', 'pedrotraining' ),
		'update_item'   => __( 'Update FAQ Category', 'pedrotraining' ),

	);

	$args   = array(
		'labels'            => $labels,
		'show_in_nav_menus' => false,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'rewrite'           => array(
			'slug'       => 'faq-groupings',
			'with_front' => false,
		),
	);
		register_taxonomy( 'faq_category', 'pedro_faq', $args	);
}

add_action( 'init', __NAMESPACE__ . '\register_faq_tag_taxonomy' );
/*
 * Register Taxonomy for FAQ Tag
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_faq_tag_taxonomy() {

	$labels = array(
		'name'          => _x( 'FAQ Tags', 'taxonomy general name', 'pedrotraining' ),
		'singular_name' => _x( 'FAQ Tag', 'taxonomy singular name', 'pedrotraining' ),
		'menu_name'     => _x( 'FAQ Tags', 'admin menu name', 'pedrotraining' ),
		'all_items'     => __( 'All FAQ Tags', 'pedrotraining' ),
		'add_new_item'  => __( 'Add New FAQ Tag', 'pedrotraining' ),
		'view_item'     => __( 'View FAQ Tag', 'pedrotraining' ),
		'edit_item'     => __( 'Edit FAQ Tag', 'pedrotraining' ),
		'update_item'   => __( 'Update FAQ Tag', 'pedrotraining' ),

	);
	$args   = array(
		'labels'            => $labels,
		'show_in_nav_menus' => false,
		'show_admin_column' => true,
		'rewrite'           => array(
			'slug'       => 'faq-tags',
			'with_front' => false,
		),

	);

	register_taxonomy( 'faq_tags', 'pedro_faq', $args );
}

