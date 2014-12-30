<?php

define('SLICETHEME_BASE', TEMPLATEPATH);
define('SLICETHEME_BASE_URL', get_template_directory_uri());

define('SLICETHEME_PATH', SLICETHEME_BASE . '/library');
define('SLICETHEME_ADMIN', SLICETHEME_PATH . '/admin');
define('SLICETHEME_EXTENDED', SLICETHEME_PATH . '/extended');

define('SLICETHEME_URL', SLICETHEME_BASE_URL . '/library');
define('SLICETHEME_INCLUDES', SLICETHEME_BASE_URL . '/includes');
define('SLICETHEME_SLIDESHOW', SLICETHEME_BASE_URL . '/slideshow');
define('SLICETHEME_JS', SLICETHEME_BASE_URL . '/js');
define('SLICETHEME_CSS', SLICETHEME_BASE_URL . '/css');
define('SLICETHEME_IMAGES', SLICETHEME_BASE_URL . '/images');

require_once ('library/st_panels.php');
require_once ('library/st_registers.php');
require_once ('library/st_widgets.php');
require_once ('library/st_shortcodes.php');
require_once ('library/st_functions.php');

//dummy
require_once ('library/st_dummy.php');
