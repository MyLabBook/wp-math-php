<?php 
/**
 * @package  WpMathPhpPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $pages = array();

	public function __construct()
	{
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'WP MathPhp Plugin', 
				'menu_title' => 'Math Functions', 
				'capability' => 'manage_options', 
				'menu_slug' => 'wp_math_php_plugin', 
				'callback' => function() { echo '<h1>Use Math functions from the MathPHP library</h1>'; }, 
				'icon_url' => 'dashicons-calculator', 
				'position' => 110
			)
		);
	}

	public function register() 
	{
		$this->settings->addPages( $this->pages )->register();
	}
}