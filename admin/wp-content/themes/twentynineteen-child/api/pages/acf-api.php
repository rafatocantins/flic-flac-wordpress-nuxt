<?php

// create endpoint for gallery posts

/**
 * Hook into the REST API and include featured_image in "wp-json/wp/v2/page/" response 
 *
 */
function slug_register_featured_title() {
    register_rest_field( 'page',
        'featured_title', // Add it to the response
        array(
            'get_callback'    => 'get_featured_title_from_acf', // Callback function - returns the value
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'slug_register_featured_title' );

/**
 * Get the value of the "image" ACF field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function get_featured_title_from_acf( $object, $field_name, $request ) {
	// Check if ACF plugin activated
	if ( function_exists( 'get_field' ) ) {
		// Get the value
		if ( $title = get_field('titulo_cabecalho', $object['id'] ) ) :
			return $title;
		endif;
	} else {
		return '';
	}
}
