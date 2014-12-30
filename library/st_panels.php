<?php

/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/

// Paths to admin functions
define('ADMIN_PATH', SLICETHEME_PATH . '/admin/');
define('ADMIN_DIR', SLICETHEME_URL . '/admin/');
define('LAYOUT_PATH', SLICETHEME_PATH . '/admin/layouts/');

// You can mess with these 2 if you wish.
$themedata = get_theme_data(STYLESHEETPATH . '/style.css');
define('THEMENAME', $themedata['Name']);
define('OPTIONS', 'of_options_'. strtolower(THEMENAME)); // Name of the database row where your options are stored

// disable for live, enable for development
error_reporting(0);

// Build Options
require_once (ADMIN_PATH . 'admin-interface.php');		// Admin Interfaces 
require_once (ADMIN_PATH . 'theme-options.php'); 		// Options panel settings and custom settings
require_once (ADMIN_PATH . 'admin-functions.php'); 	// Theme actions based on options settings
require_once (ADMIN_PATH . 'medialibrary-uploader.php'); // Media Library Uploader
require_once (ADMIN_PATH . 'shortcodes/shortcodes.php');