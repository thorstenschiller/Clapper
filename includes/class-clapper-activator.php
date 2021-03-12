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
class Clapper_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

	}

}

global $wpdb;
$plugin_name_db_version = '1.0';
$table_name = $wpdb->prefix . "clapper_date"; 
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  created timestamp NOT NULL default CURRENT_TIMESTAMP,
		  name tinytext NULL,
		  custom_field varchar(255) DEFAULT '' NOT NULL,
		  email varchar(255) DEFAULT '' NOT NULL,
		  UNIQUE KEY id (id)
		) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
add_option( 'plugin_name_db_version', $plugin_name_db_version );