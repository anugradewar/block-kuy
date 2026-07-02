<?php
/**
 * Plugin Name:       Block Kuy
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.8
 * Requires PHP:      7.4
 * Author:            Virtual Remote Design Agency
 * Author URI:        https://vrda.net
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       block-kuy
 *
 * @package BlockKuy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
 * based on the registered block metadata. Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function create_block_block_kuy_block_init() {
	wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
}
add_action( 'init', 'create_block_block_kuy_block_init' );

/**
 * Adds a new block category
 *
 * @date 6/6/26
 * @since 1.0.0
 */
function block_kuy_creates_categories( $block_categories, $block_editor_context ) {
	if ( ! empty( $block_editor_context->post ) ) {
		array_push(
			$block_categories,
			array(
				'slug'  => 'block-kuy',
				'title' => 'Block Kuy',
				'icon'  => null,
			)
		);
	}
	return $block_categories;
}
add_filter( 'block_categories_all', 'block_kuy_creates_categories', 10, 2 );

/**
 * Adds custom fields API
 *
 * Date 18/6/2026
 *
 * @since 1.0.0
 */
function block_kuy_register_new_api() {
	register_rest_route(
		'vrda/v1',
		'/custom-fields/(?P<post_type>[a-zA-Z0-9-]+)',
		array(
			array(
				'methods'             => 'GET',
				'callback'            => 'block_kuy_custom_fields_api_callback',
				'permission_callback' => '__return_true',
			),
			'schema' => 'block_kuy_get_custom_field_schema',
		)
	);
}
add_action( 'rest_api_init', 'block_kuy_register_new_api' );


/**
 * Creates custom API
 *
 * @param  mixed $request
 * @return void
 */
function block_kuy_custom_fields_api_callback( $request ) {
	global $wpdb;

	$post_type             = sanitize_key( $request['post_type'] );
	$post_table            = $wpdb->prefix . 'posts';
	$prepared_post_type_id = $wpdb->prepare(
		"SELECT ID FROM $post_table WHERE `post_name` = %s",
		$post_type
	);
	$post_type_id          = $wpdb->get_var( $prepared_post_type_id );
	if ( $post_type_id == 0 ) {
		return;
	}

	$prepared_custom_fields = $wpdb->prepare(
		"SELECT post_name FROM $post_table WHERE `post_parent` = %d",
		$post_type_id
	);
	$custom_fields          = $wpdb->get_col( $prepared_custom_fields );

	foreach ( $custom_fields as $custom_field ) {
		$response = block_kuy_prepare_custom_fields( $custom_field, $post_type, $request );
		$data[]   = block_kuy_prepare_for_collection( $response );
	}

	return rest_ensure_response( $data );
}

/**
 * Prepares Custom Fields for API
 *
 * @param  mixed $custom_field
 * @param  mixed $post_type
 * @param  mixed $request
 * @return void
 */
function block_kuy_prepare_custom_fields( $custom_field, $post_type, $request ) {
	$custom_field_data = array();
	$schema            = block_kuy_get_custom_field_schema( $custom_field );

	if ( isset( $schema ) ) {
		$custom_post_ids = get_posts(
			array(
				'fields'        => 'ids',
				'post_per_page' => -1,
				'post_status'   => 'publish',
				'post_type'     => $post_type,
			)
		);

		foreach ( $custom_post_ids as $custom_post_id ) {
			$custom_field_value                   = get_post_meta( $custom_post_id, $custom_field, false );
			$custom_field_data[ $custom_field ][] = array(
				'post_id'    => (int) $custom_post_id,
				'meta_value' => (array) $custom_field_value,
			);
		}
	}

	return rest_ensure_response( $custom_field_data );
}

/**
 * Prepares collection for Custom Fields API
 *
 * @param  mixed $response
 * @return void
 */
function block_kuy_prepare_for_collection( $response ) {
	if ( ! ( $response instanceof WP_REST_Response ) ) {
		return $response;
	}

	$data  = (array) $response->get_data();
	$links = rest_get_server()::get_compact_response_links( $response );

	if ( ! empty( $links ) ) {
		$data['_links'] = $links;
	}

	return $data;
}

/**
 * Creates API schema
 *
 * @param  mixed $custom_field
 * @return void
 */
function block_kuy_get_custom_field_schema( $custom_field ) {
	$schema = array(
		'$schema'    => 'http://json-schema.org/draft-04/schema#',
		'title'      => 'custom-field',
		'type'       => 'object',
		'properties' => array(
			$custom_field => array(
				'description' => esc_html__( 'Name of the custom field', 'vrda-blocks' ),
				'type'        => 'array',
				'items'       => array(
					'type'       => 'object',
					'properties' => array(
						'post_id'    => array(
							'type' => 'integer',
						),
						'meta_value' => array(
							'type' => 'array',
						),
					),
				),
			),

		),
	);

	return $schema;
}
