<?php

/**
 * De-registers WordPress default javascript
 *
 * @link https://developer.wordpress.org/reference/functions/wp_deregister_script/
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_deregister_script( 'jquery' );
	}
);

/**
 * Remove oEmbed-specific JavaScript from the front-end and back-end.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_oembed_add_host_js/
 */
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

// Remover o jQuery Migrate
add_action( 
	'wp_default_scripts', 
	function ($scripts) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		  $script = $scripts->registered['jquery'];

		  if ( $script->deps ) {
		      $script->deps = array_diff(
		          $script->deps,
		          array(
		              'jquery-migrate',
		          )
		      );
		  }
		}
	} 
);

// Remover o wp-embed.min.js
add_action( 
	'wp_footer', 
	function () {
	  wp_deregister_script( 'wp-embed' );
	} 
);

// Desabilitar o Gutenberg e remover scripts e estilos
add_action( 
	'wp_print_styles', 
	function () {
		wp_dequeue_style( 'wp-block-library' );
		wp_deregister_style( 'wp-block-library' );
	}, 
	100 
);