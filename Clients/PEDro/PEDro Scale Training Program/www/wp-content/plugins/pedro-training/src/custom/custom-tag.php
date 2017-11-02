<?php
/**
 * Custom tag
 *
 * @package     PEDRO\PedroTraining\Custom
 * @since       1.0.0
 * @author      Purple Prodigy
 * @link        http://www.purpleprodigy.com
 * @licence     GNU General Public License 2.0+
 */

namespace PEDRO\PedroTraining\Custom;

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
		'hierarchical'      => true,
		'rewrite'           => array(
			'slug'       => 'faq-groupings',
			'with_front' => false,
		),

	);

	// register_taxonomy( $taxonomy, $object_type, $args );

	register_taxonomy( 'faq_tag', 'pedro_faq', $args );
}