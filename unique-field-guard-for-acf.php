<?php

/**
 *  Unique Field Guard For ACF
 *
 * @package 		Unique_Field_Guard_ACF
 * @author  		Abiodun Paul Ogunnaike <ayo_ogunnaike@yahoo.com>
 *
 * Plugin Name:     Unique Field Guard For ACF
 * Plugin URI:      https://primastech.com.ng/plugins/unique-field-guard-for-acf
 * Description:     Adds a unique validation option to ACF fields to enforce unique values across posts.
 * Author:          Abiodun Paul Ogunnaike
 * Author URI:      https://primastech.com.ng/
 * Text Domain:     unique-field-guard-for-acf
 * Donate:          https://www.buymeacoffee.com/abbeymaniak
 * Domain Path:     /languages
 * Version:         1.0.0
 * prefix:          Unique_Field_Guard_ACF
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Requires PHP:      7.4
 * Requires at least: 6.0
 */

// If the file is accessed directly abort script.
defined('ABSPATH') || die('Unauthorized Access');

// Include the main plugin class.
require_once plugin_dir_path(__FILE__) . 'includes/class-unique-field-guard-for-acf.php';

//instantiate the main class

$Unique_Field_Guard_For_ACF = new Unique_Field_Guard_For_ACF();
