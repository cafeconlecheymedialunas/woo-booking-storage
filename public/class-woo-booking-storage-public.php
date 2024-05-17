<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://www.fiverr.com/mauro_gaitan
 * @since      1.0.0
 *
 * @package    Woo_Booking_Storage
 * @subpackage Woo_Booking_Storage/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Woo_Booking_Storage
 * @subpackage Woo_Booking_Storage/public
 * @author     Mauro Gaitan <maurodeveloper86@gmail.com>
 */
class Woo_Booking_Storage_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		

		wp_register_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',array(), $this->version, 'all');
		wp_register_style('bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css',array(), $this->version, 'all');
		wp_register_style("woo-booking-storage-css", plugin_dir_url( __FILE__ ) . 'css/woo-booking-storage-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woo_Booking_Storage_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Booking_Storage_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_register_script( 'bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ),'5.3.3',true );


		wp_register_script( "woo-booking-storage-js", plugin_dir_url( __FILE__ ) . 'js/woo-booking-storage-public.js', array( 'jquery' ), $this->version, false );
		

    	
	}

}
