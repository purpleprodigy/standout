<?php
/**
 * FAQ Shortcode [faq]
 *
 * @package     $PEDRO\PedroTraining\Shortcode;
 * @since       1.0.0
 * @author      Purple Prodigy
 * @link        http://www.purpleprodigy.com
 * @licence     GNU General Public License 2.0+
 */
namespace PEDRO\PedroTraining\Shortcode;


add_shortcode( 'faq', __NAMESPACE__ . '\render_faq_shortcode_html' );

/**
 * Render the FAQ HTML.
 *
 * @since 1.0.0
 *
 * @param array $attributes User defined (implementation) attributes.
 *
 * @return void
 */
function render_faq_shortcode_html( $attributes ) {
	$defaults = array(
		'class'             => '',
		'id'                => '',
		'category'          => '',
		'open_icon'         => 'ion-chevron-down',
		'close_icon'        => 'ion-chevron-up',
		'show_first_answer' => 0,
	);

	$view = __DIR__ . '/views/faq.php';

	$attributes = shortcode_atts( $defaults, $attributes, 'faq' );

	$html = '';

	$query = get_faq_records( $attributes );


	if ( ! $query->have_posts() ) {
		return '';
	}

	$html = sprintf( '<dl%s class="faq%s">',
		render_html_to_the_pattern( $attributes ),
		render_html_to_the_pattern( $attributes, 'class', ' %s' )
	);

	ob_start();

	$loop_count = 1;

	while ( $query->have_posts() ) :
		$icon = get_the_answer_icon( $attributes, $loop_count );

		$query->the_post();

		include( $view );

		$loop_count ++;

	endwhile;

	$html .= ob_get_clean();
	$html .= '</dl>';

	wp_reset_postdata();

	return $html;
}

/**
 * Render the FAQ HTML.
 *
 * @since 1.0.0
 *
 * @param array $attributes User defined (implementation) attributes.
 *
 * @return array|false
 */
function get_faq_records( array $attributes ) {

	$args = get_faq_query_args( $attributes );

	$records = new \WP_Query( $args );

	return $records;
}

function get_faq_query_args( array $attributes ) {
	$args = array(
		'post_type' => 'pedro_faq',
	);

	if ( ! is_attribute_being_used( $attributes, 'category' ) ) {
		return $args;
	}


	$args['tax_query'] = array(
		array(
			'taxonomy' => 'faq_category',
			'field'    => 'slug',
			'terms'    => extract_terms_from_attribute( $attributes['category'] ),

		),
	);

	return $args;
}

/**
 * Extract out all of the terms, which can be comma delimited
 * and return as a trimmed array
 *
 * @since 1.0.0
 *
 * @param string $comma_list_of_terms Attribute
 *
 * @return array
 */

function extract_terms_from_attribute( $comma_list_of_terms ) {
	$terms = explode( ',', $comma_list_of_terms );
	$terms = array_map( 'trim', $terms );

	return $terms;
}

/**
 * Check is if the specified attribute is required. It does so
 * by checking if the key exists and it's not empty.
 *
 * @since 1.0.0
 *
 * @param array $attributes
 * @param string $key
 *
 * @return bool
 */
function is_attribute_being_used( array $attributes, $key ) {
	return array_key_exists( $key, $attributes ) &&
	       ! empty( $attributes[ $key ] );
}

/**
 * Render HTML for the options to the specified pattern.
 *
 * @since 1.0.0
 *
 * @param array $options Array of options
 * @param string $key The specific key within the options
 * @param string $pattern Pattern for the HTML to populate the option.
 *
 * @return string
 */
function render_html_to_the_pattern( array $options, $key = 'id', $pattern = ' id="%s"' ) {
	if ( is_attribute_being_used( $options, $key ) ) {
		return sprintf( $pattern, esc_attr( $options[ $key ] ) );
	}

	return '';
}

/**
 * Get the icon that matches whether to show or hide the answer.
 *
 * @since 1.0.0
 *
 * @param array $attributes
 * @param int $loop_count
 *
 * @return mixed
 */

function get_the_answer_icon( array $attributes, $loop_count ) {
	if ( show_first_answer( $attributes, $loop_count ) ) {
		return $attributes['close_icon'];

	}

	return $attributes['open_icon'];
}

/**
 * Checks if the first answer is to be shown.
 *
 * @since 1.0.0
 *
 * @param array $attributes
 * @param int $loop_count
 *
 * @return bool
 */
function show_first_answer( $attributes, $loop_count ) {
	return (bool) $attributes['show_first_answer'] && $loop_count == 1;
}
