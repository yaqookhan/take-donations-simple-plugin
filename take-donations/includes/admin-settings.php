<?php

// Layout the admin settings page.
function tdon_settings_page() {

	global $tdon_settings;

	?>

	<div class="wrap">

		<h2>Take Donations Settings</h2>

		<form method="post" action="options.php">

			<?php settings_fields( 'tdon_settings_group' ); ?>

			<p>
				<input id="tdon_settings[enable_stripe]" name="tdon_settings[enable_stripe]" type="checkbox" value="1" <?php checked( 1, $tdon_settings['enable_stripe'] ); ?> />

				<label class="description" for="tdon_settings[enable_stripe]">Enable Stripe Checkout</label>
			</p>

			<?php submit_button(); ?>

		</form>

	</div>

	<?php
}

// Create admin menu item
function tdon_add_menu_item() {

	add_options_page( 'Take Donations Settings', 'Take Donations', 'manage_options', 'tdon-options', 'tdon_settings_page' );

}
add_action( 'admin_menu', 'tdon_add_menu_item' );

// Create our settings in the WP options table.
function tdon_register_settings() {

	register_setting( 'tdon_settings_group', 'tdon_settings' );

}
add_action( 'admin_init', 'tdon_register_settings' );
