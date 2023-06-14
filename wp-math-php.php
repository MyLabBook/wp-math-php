<?php
/**
 * @package  WpMathPhpPlugin
 */

/*
Plugin Name: Math Functions
Plugin URI: http://github.com/mylabbook/wp-math-php
Description: Plugin that exposes the functions of the MathPHP library for use by other plugins. 
Version: 1.0.0
Author: MyLabBook
Author URI: http://github.com/mylabbook
License: MIT
Text Domain: mylabbook-plugin
*/

// If this file is called directly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_wp_math_php_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_wp_math_php_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_wp_math_php_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_wp_math_php_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}