<?php
/**
 * Menu helpers.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output a clean nav menu without extra IDs and wrapper classes.
 *
 * @param string $location Theme location.
 * @param string $class    Menu class.
 */
function perrito_nav_menu( $location, $class = 'nav-menu' ) {
	wp_nav_menu(
		array(
			'theme_location'  => $location,
			'container'       => false,
			'menu_class'      => $class,
			'fallback_cb'     => 'perrito_nav_menu_fallback',
			'depth'           => 2,
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
		)
	);
}

/**
 * Fallback nav menu if none is assigned.
 */
function perrito_nav_menu_fallback() {
	$items = array(
		'/'                        => 'Inicio',
		'/servicios/'              => 'Servicios',
		'/equipo/'                 => 'Equipo',
		'/tienda/'                 => 'Tienda',
		'/planes/'                 => 'Planes',
		'/cobertura/'              => 'Cobertura',
		'/blog/'                   => 'Blog',
		'/contacto/'               => 'Contacto',
	);
	echo '<ul class="nav-menu">';
	foreach ( $items as $path => $label ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( home_url( $path ) ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}
