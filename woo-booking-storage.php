<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://www.fiverr.com/mauro_gaitan
 * @since             1.0.0
 * @package           Woo_Booking_Storage
 *
 * @wordpress-plugin
 * Plugin Name:       WooBookingStorage
 * Plugin URI:        https://https://github.com/cafeconlecheymedialunas/woo-booking-storage
 * Description:       A plugin to book reservation storage with Woocommerce Support
 * Version:           1.0.0
 * Author:            Mauro Gaitan
 * Author URI:        https://https://www.fiverr.com/mauro_gaitan/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-booking-storage
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOO_BOOKING_STORAGE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-booking-storage-activator.php
 */
function activate_woo_booking_storage() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-booking-storage-activator.php';
	Woo_Booking_Storage_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-booking-storage-deactivator.php
 */
function deactivate_woo_booking_storage() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-booking-storage-deactivator.php';
	Woo_Booking_Storage_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_booking_storage' );
register_deactivation_hook( __FILE__, 'deactivate_woo_booking_storage' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-booking-storage.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_booking_storage() {
	
	//Css
	wp_enqueue_style( 'bootstrap-css' );
	wp_enqueue_style( 'bootstrap-icons' );
	wp_enqueue_style( 'woo-booking-storage-css' );
	
	//Js
	wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_script( 'woo-booking-storage-js' );

	

	$plugin = new Woo_Booking_Storage();
	$plugin->run();

	add_shortcode( 'woo_booking_storage', array($plugin,'create_shortcode') );

}
run_woo_booking_storage();



function agregar_submenu_personalizado_woocommerce_settings() {
    add_submenu_page(
        'woocommerce',
        __( 'Horarios', 'text-domain' ),
        __( 'Horarios', 'text-domain' ),
        'manage_options',
        'horarios',
        'mostrar_pagina_horarios'
    );
}
add_action( 'admin_menu', 'agregar_submenu_personalizado_woocommerce_settings' );

// Mostrar la página del submenú Horarios
function mostrar_pagina_horarios() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'horarios' );
                do_settings_sections( 'horarios' );
                submit_button( __( 'Guardar cambios', 'text-domain' ) );
            ?>
        </form>
    </div>
    <?php
}

// Agregar campos a la página de submenú Horarios
function agregar_campos_horarios_woocommerce_settings() {
    add_settings_section(
        'section_horarios',
        __( 'Horarios de la tienda', 'text-domain' ),
        '__return_false',
        'horarios'
    );

    add_settings_field(
        'horario_apertura',
        __( 'Horario de apertura', 'text-domain' ),
        'mostrar_campo_horario_apertura',
        'horarios',
        'section_horarios'
    );

    add_settings_field(
        'horario_cierre',
        __( 'Horario de cierre', 'text-domain' ),
        'mostrar_campo_horario_cierre',
        'horarios',
        'section_horarios'
    );

    register_setting( 'horarios', 'horario_apertura' );
    register_setting( 'horarios', 'horario_cierre' );
}
add_action( 'admin_init', 'agregar_campos_horarios_woocommerce_settings' );

// Mostrar campo de Horario de apertura
function mostrar_campo_horario_apertura() {
    $horario_apertura = get_option( 'horario_apertura' );
    echo '<input type="time" name="horario_apertura" value="' . esc_attr( $horario_apertura ) . '" />';
}

// Mostrar campo de Horario de cierre
function mostrar_campo_horario_cierre() {
    $horario_cierre = get_option( 'horario_cierre' );
    echo '<input type="time" name="horario_cierre" value="' . esc_attr( $horario_cierre ) . '" />';
}
