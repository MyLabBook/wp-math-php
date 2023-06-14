<?php
/**
 * WP Plugin for the MathPHP library
 *
 * This plugin uses composer and borrows insights from https://github.com/tommcfarlin/wp-plugin-scaffold
 * and https://github.com/Alecaddd/WordPressPlugin101.
 *
 * PHP version 7.4.27
 *
 * @category WordPress_Plugin
 * @package  TODO
 * @author   William Kudrle <william.kudrle@mylabbook.com>
 * @license  MIT <https://www.gnu.org/licenses/gpl-3.0.en.html>
 * @link     https://github.com/mylabbook/wp-math-php/
 * @since    TODO: Date
 *
 * @wordpress-plugin
 * Plugin Name: WP Math PHP
 * Plugin URI:  https://github.com/mylabbook/wp-math-php/
 * Description: The description for the plugin scaffolded by this file.
 * Author:      William Kudrle <william.kudrle@mylabbook.com>
 * Version:     1.0.0
 */

namespace WPMathPHP;

defined('WPINC') || die;
require_once __DIR__ . '/vendor/autoload.php';