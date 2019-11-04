<?php
/**
 * This file loads all the needed files for the theme to work properly.
 *
 * @package karmic
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/* ------------------------------------------------------------------------ *
 * SET THEME CONSTANTS
 * ------------------------------------------------------------------------ */
define( 'KARMIC_THEME_DIR', 			  get_template_directory_uri() );
define( 'KARMIC_THEMEROOT', 			  get_template_directory() );
define( 'KARMIC_FRAMEWORK_ROOT', 	  KARMIC_THEMEROOT . '/lib/' );

define( 'KARMIC_IMAGES', 				    KARMIC_THEME_DIR . '/assets/img/' );
define( 'KARMIC_SCRIPTS', 			    KARMIC_THEME_DIR . '/assets/js/' );
define( 'KARMIC_STYLES', 				    KARMIC_THEME_DIR . '/assets/css/' );

/* ------------------------------------------------------------------------ *
 * LOAD THEME FILES
 * ------------------------------------------------------------------------ */
require_once KARMIC_FRAMEWORK_ROOT . 'theme-setup.php';
require_once KARMIC_FRAMEWORK_ROOT . 'theme-settings.php';
require_once KARMIC_FRAMEWORK_ROOT . 'template-tags.php';

require_once KARMIC_FRAMEWORK_ROOT . 'enqueue.php';
require_once KARMIC_FRAMEWORK_ROOT . 'widgets.php';

// require_once KARMIC_FRAMEWORK_ROOT . 'cpt.php';

require_once KARMIC_FRAMEWORK_ROOT . 'acf.php';

