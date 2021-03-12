<?php

/**
 * Fired during plugin activation
 *
 * @link       thorstenschiller.com
 * @since      1.0.0
 *
 * @package    Clapper
 * @subpackage Clapper/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Clapper
 * @subpackage Clapper/includes
 * @author     Thorsten <info@thorstenschiller.com>
 */

/**
 * Register the settings page for the admin area.
 *
 * @since    1.0.0
 */
public function register_settings_page() {
	// Create our settings page as a submenu page.
	add_submenu_page(
		'tools.php',                             // parent slug
		__( 'Applause', 'applause' ),      // page title
		__( 'Applause', 'Applause' ),      // menu title
		'manage_options',                        // capability
		'toptal-save',                           // menu_slug
		array( $this, 'display_settings_page' )  // callable function
	);
}