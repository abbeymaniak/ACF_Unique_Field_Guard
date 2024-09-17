<?php

/**
 * Plugin Name:     Acf Unique Field Guard
 * Plugin URI:      https://github.com/abbeymaniak/Acf_Unique_Field_Guard
 * Description:    	Adds a validation option to ACF fields to enforce unique values across posts.
 * Author:          Abiodun Paul Ogunnaike
 * Author URI:      https://www.linkedin.com/in/abiodun-paul-ogunnaike
 * Text Domain:     acf-unique-field-guard
 * Donate:          https://www.buymeacoffee.com/abbeymaniak
 * Domain Path:     /languages
 * Version:         0.1.0
 * prefix:			Acf_Unique_Field_Guard
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package         Acf_Unique_Field_Guard
 */

// If the file is accessed directly abort script.
defined('ABSPATH') || die('Unauthorized Access');

// Include the main plugin class.
require_once plugin_dir_path(__FILE__) . 'includes/class-acf-unique-field-guard.php';

//instantiate the main class

$Acf_Unique_Field_Guard = new ACF_Unique_Field_Guard();
