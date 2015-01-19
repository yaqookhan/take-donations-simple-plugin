<?php

// Add donate text and link to bottom of post.
function tdon_add_content( $content ) {

	global $tdon_settings;

	// Check if we're on a post.
	if ( is_single() ) {

		//$donate_html = '<h4>Like what you see? Please donate!</h4>';

		$donate_html = '<h4 class="tdon-text">Like what you see? Please donate!</h4>';

		if ( $tdon_settings['enable_stripe'] == true ) {

			$donate_html .= '<div><button id="customButton">Donate Now</button></div>';
		}

		$content .= $donate_html;
	}
	return $content;
}
add_filter( 'the_content', 'tdon_add_content' );

// Include this plugin's public JS & CSS files on posts.
function tdon_load_scripts_styles() {

	global $tdon_settings;

	// Check if we're on a post.
	if ( is_single() ) {

		wp_enqueue_style( 'take-donations-css', plugin_dir_url( __FILE__ ) . 'css/public.css' );

		if ( $tdon_settings['enable_stripe'] == true ) {

			wp_enqueue_script( 'stripe-checkout', 'https://checkout.stripe.com/checkout.js', array(), null, true );
		}

		wp_enqueue_script( 'take-donations-js', plugin_dir_url( __FILE__ ) . 'js/public.js', array( 'jquery', 'stripe-checkout' ), null, true );
	}

}
add_action( 'wp_enqueue_scripts', 'tdon_load_scripts_styles' );

