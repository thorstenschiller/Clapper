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

    public function clapper_install()
    {

        global $wpdb;
        global $clapper_db_version;
        $table_name = $wpdb->prefix . 'clapper';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
					`id` int(10) NOT NULL auto_increment,
					`date` datetime,
					`vote1` numeric(9,2),
					`vote2` numeric(9,2),
					`vote3` numeric(9,2),
					PRIMARY KEY (id) )";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_option( 'clapper_db_version', $clapper_db_version );

    }

}

$ClapperActivator = new Clapper_Activator();
register_activation_hook( __FILE__, array( $ClapperActivator, 'clapper_install' ) );