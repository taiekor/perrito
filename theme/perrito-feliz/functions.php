<?php
/**
 * Perrito Feliz theme bootstrap.
 *
 * Loads all theme modules in order. Each module lives in /inc and registers its own hooks.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PERRITO_VERSION', '1.0.0' );
define( 'PERRITO_DIR', get_template_directory() );
define( 'PERRITO_URI', get_template_directory_uri() );

/**
 * Load theme modules.
 */
require_once PERRITO_DIR . '/inc/helpers.php';
require_once PERRITO_DIR . '/inc/theme-setup.php';
require_once PERRITO_DIR . '/inc/enqueue.php';
require_once PERRITO_DIR . '/inc/menus.php';
require_once PERRITO_DIR . '/inc/cpts.php';
require_once PERRITO_DIR . '/inc/taxonomies.php';
require_once PERRITO_DIR . '/inc/acf-fields.php';
require_once PERRITO_DIR . '/inc/seo.php';
require_once PERRITO_DIR . '/inc/schema.php';
require_once PERRITO_DIR . '/inc/breadcrumbs.php';
require_once PERRITO_DIR . '/inc/shortcodes.php';
require_once PERRITO_DIR . '/inc/seeder.php';
