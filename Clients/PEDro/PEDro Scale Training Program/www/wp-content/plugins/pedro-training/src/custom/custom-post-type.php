<?php
/**
 * Custom Post Type
 *
 * @package     PEDRO\PedroTraining\Custom
 * @since       1.0.0
 * @author      Purple Prodigy
 * @link        http://www.purpleprodigy.com
 * @licence     GNU General Public License 2.0+
 */

namespace PEDRO\PedroTraining\Custom;

add_action( 'init', __NAMESPACE__ . '\register_faq_post_type' );
/*
 * Register Custom Post Type for FAQ
 *
 * @since 1.0.0
 *
 * @return void
 */

function register_faq_post_type() {
	$labels = array(
		'name'               => _x( 'FAQs', 'post type general name', 'pedrotraining' ),
		'singular_name'      => _x( 'FAQ', 'post type singular name', 'pedrotraining' ),
		'menu_name'          => _x( 'FAQs', 'admin menu name', 'pedrotraining' ),
		'add_new'            => _x( 'Add New FAQ', 'pedrotraining' ),
		'add_new_item'       => __( 'Add New FAQ', 'pedrotraining' ),
		'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'pedrotraining' ),
		'new_item'           => __( 'New FAQ', 'pedrotraining' ),
		'edit_item'          => __( 'Edit FAQ', 'pedrotraining' ),
		'view_item'          => __( 'View FAQ', 'pedrotraining' ),
		'all_items'          => __( 'All FAQs', 'pedrotraining' ),
		'search_items'       => __( 'Search FAQs', 'pedrotraining' ),
		'not_found'          => __( 'No FAQs found.', 'pedrotraining' ),
		'not_found_in_trash' => __( 'No FAQs found in Trash.', 'pedrotraining' ),
		'archives'           => _x( 'FAQ Archives', 'pedrotraining' ),
		'featured_image'     => false
	);
	$args   = array(
		'label'             => __( 'FAQs', 'pedrotraining' ),
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => false,
		'menu_position'     => 5,
		'menu_icon'         => 'dashicons-editor-help',
		'supports'          => get_faq_supports(),
		'taxonomies'        => array( 'faq_category', 'faq_tags' ),
		'rewrite'           => array( 'slug' => 'individual-faq' ),
	);
	register_post_type( 'pedro_faq', $args );

}

function get_faq_supports() {
	$supports = get_all_post_type_supports( 'post' );
	$supports = array_keys( $supports );

	$supports_to_exclude = array(
		'comments',
		'trackbacks',
		'post_formats',
		'author',
		'thumbnail',
		'excerpt',
		'custom-fields'
	);

	$supports = array_filter( $supports, function ( $support ) use ( $supports_to_exclude ) {

		return ! in_array( $support, $supports_to_exclude );
	} );

	return $supports;
}