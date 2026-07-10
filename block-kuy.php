<?php
/**
 * Plugin Name:       Block Kuy
 * Description:       A plugin contains of blocks to make your WordPress website more engaging.
 * Version:           1.0.0
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
	$block_categories[] = array(
		'slug'  => 'block-kuy',
		'title' => __( 'Block Kuy', 'block-kuy' ),
		'icon'  => null,
	);
	return $block_categories;
}
add_filter( 'block_categories_all', 'block_kuy_creates_categories', 10, 2 );
