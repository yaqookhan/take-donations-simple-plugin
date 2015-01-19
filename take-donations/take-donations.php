<?php
/**
 * Plugin Name: Take Donations
 * Plugin URI: http://philderksen.com/take-donations
 * Description: Accept donations on your site.
 * Version: 0.1
 * Author: Phil Derksen
 * Author URI: http://philderksen.com
 */

// Get plugin settings from the WP options table.

$tdon_settings = get_option( 'tdon_settings' );

require plugin_dir_path( __FILE__ ) . 'includes/display-functions.php';

require plugin_dir_path( __FILE__ ) . 'includes/admin-settings.php';

/*
function tdon_output_test() {
	echo '<h1>Testing plugin output</h1>';
}
add_action( 'admin_head', 'tdon_output_test' );
*/
