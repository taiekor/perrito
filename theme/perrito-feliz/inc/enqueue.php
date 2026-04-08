<?php
/**
 * Enqueue styles, scripts and fonts.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue front-end assets.
 */
function perrito_enqueue_assets() {
	$ver = PERRITO_VERSION;

	// Main stylesheet (imports all component CSS files).
	wp_enqueue_style(
		'perrito-main',
		PERRITO_URI . '/assets/css/main.css',
		array(),
		$ver
	);

	// Page-specific styles loaded conditionally.
	if ( is_page_template( 'page-templates/tpl-tienda.php' ) || is_post_type_archive( 'producto' ) || is_singular( 'producto' ) ) {
		wp_enqueue_style( 'perrito-producto', PERRITO_URI . '/assets/css/pages/producto.css', array( 'perrito-main' ), $ver );
	}

	if ( is_singular( 'landing' ) ) {
		wp_enqueue_style( 'perrito-landing', PERRITO_URI . '/assets/css/pages/landing.css', array( 'perrito-main' ), $ver );
	}

	// anime.js v4 from CDN (UMD build).
	wp_enqueue_script(
		'animejs',
		'https://cdn.jsdelivr.net/npm/animejs@4.0.2/lib/anime.iife.min.js',
		array(),
		'4.0.2',
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	// Main theme JS (ES module).
	wp_enqueue_script(
		'perrito-main',
		PERRITO_URI . '/assets/js/main.js',
		array( 'animejs' ),
		$ver,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	// Pass config to JS.
	wp_localize_script(
		'perrito-main',
		'PerritoConfig',
		array(
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'themeUri'   => PERRITO_URI,
			'homeUrl'    => home_url( '/' ),
			'cartPage'   => home_url( '/carrito/' ),
			'whatsapp'   => perrito_option( 'whatsapp_raw' ),
			'telefono'   => perrito_option( 'telefono_principal_raw' ),
			'isLanding'  => is_singular( 'landing' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'perrito_enqueue_assets' );

/**
 * Add type="module" and preload hints.
 */
function perrito_script_attributes( $tag, $handle ) {
	if ( 'perrito-main' === $handle ) {
		$tag = str_replace( '<script ', '<script type="module" ', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'perrito_script_attributes', 10, 2 );

/**
 * Preload critical fonts in <head>.
 */
function perrito_preload_fonts() {
	$fonts = array(
		'Inter-Regular.woff2',
		'Inter-SemiBold.woff2',
		'Fraunces-SemiBold.woff2',
	);
	foreach ( $fonts as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin="anonymous">' . "\n",
			esc_url( PERRITO_URI . '/assets/fonts/' . $font )
		);
	}
	// DNS prefetch for CDN.
	echo '<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">' . "\n";
	echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>' . "\n";
}
add_action( 'wp_head', 'perrito_preload_fonts', 1 );
