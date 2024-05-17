<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://www.fiverr.com/mauro_gaitan
 * @since      1.0.0
 *
 * @package    Woo_Booking_Storage
 * @subpackage Woo_Booking_Storage/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woo_Booking_Storage
 * @subpackage Woo_Booking_Storage/includes
 * @author     Mauro Gaitan <maurodeveloper86@gmail.com>
 */
class Woo_Booking_Storage_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woo-booking-storage',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
