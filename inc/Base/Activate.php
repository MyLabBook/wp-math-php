<?php
/**
 * @package  WpMathPhpPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	
		if ( get_option( 'wp_math_php_plugin' ) ) {
			return;
		}

		$default = array();

		update_option( 'wp_math_php_plugin', $default );

	}
}