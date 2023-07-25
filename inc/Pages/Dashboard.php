<?php 
/**
 * @package  WpMathPhpPlugin
 */
namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

/**
* 
*/
class Dashboard extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	//public $subpages = array();

	/*
	public function __construct()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();
		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();

		/*
		$this->pages = array(
			array(
				'page_title' => 'WP Math PHP Plugin', 
				'menu_title' => 'Math Functions', 
				'capability' => 'manage_options', 
				'menu_slug' => 'wp_math_php_plugin', 
				'callback' => function() { echo '<h1>Use Math functions from the MathPHP library</h1>'; }, 
				'icon_url' => 'dashicons-calculator', 
				'position' => 110
			)
		);
		*/
//	}

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'WP Math PHP Plugin', 
				'menu_title' => 'Math Functions', 
				'capability' => 'manage_options', 
				'menu_slug' => 'wp_math_php_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-calculator', 
				'position' => 110
			)
		);
	}

	/*
	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'wp_math_php_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'wp_math_php_cpt', 
				'callback' => array( $this->callbacks, 'adminCpt' )
			),
			array(
				'parent_slug' => 'wp_math_php_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'wp_math_php_taxonomies', 
				'callback' => array( $this->callbacks, 'adminTaxonomy' )
			),
			array(
				'parent_slug' => 'wp_math_php_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'wp_math_php_widgets', 
				'callback' => array( $this->callbacks, 'adminWidget' )
			)
		);
	}
	*/
	
	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'wp_math_php_plugin_settings',
				'option_name' => 'wp_math_php_plugin',
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'wp_math_php_admin_index',
				'title' => 'Settings Manager',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'wp_math_php_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array();

		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'wp_math_php_plugin',
				'section' => 'wp_math_php_admin_index',
				'args' => array(
					'option_name' => 'wp_math_php_plugin',
					'label_for' => $key,
					'class' => 'ui-toggle'
				)
			);
		}

		$this->settings->setFields( $args );
	}

}