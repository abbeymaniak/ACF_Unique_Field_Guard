<?php

/**
 *  ACF Unique Field Guard
 *
 * @package 		ACF_Unique_Field_Guard
 * @author  		Abiodun Paul Ogunnaike <primastech101@gmail.com>
 *
 * Plugin Name:     ACF Unique Field Guard
 * Plugin URI:      https://primastech.com.ng/plugins/acf-unique-field-guard
 * Description:     Adds a validation option to ACF fields to enforce unique values across posts.
 * Author:          Abiodun Paul Ogunnaike
 * Author URI:      https://primastech.com.ng/
 * Text Domain:     acf-unique-field-guard
 * Donate:          https://www.buymeacoffee.com/abbeymaniak
 * Domain Path:     /languages
 * Version:         1.0.0
 * prefix:          ACF_Unique_Field_Guard
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Requires PHP:      7.4
 * Requires at least: 6.0
 */

// If the file is accessed directly abort script.
defined('ABSPATH') || die('Unauthorized Access');

// Include the main plugin class.
require_once plugin_dir_path(__FILE__) . 'includes/class-acf-unique-field-guard.php';

//instantiate the main class

$Acf_Unique_Field_Guard = new ACF_Unique_Field_Guard();
