<?php
/**
 * Seed: nav menus.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_menus() {
	$menu_name = 'Menu principal';
	$menu = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
	} else {
		$menu_id = $menu->term_id;
	}

	if ( is_wp_error( $menu_id ) || ! $menu_id ) {
		return;
	}

	// Only seed if menu is empty.
	$items = wp_get_nav_menu_items( $menu_id );
	if ( ! empty( $items ) ) {
		return;
	}

	$pages = array(
		array( 'title' => 'Servicios', 'url' => home_url( '/servicios/' ) ),
		array( 'title' => 'Equipo', 'url' => home_url( '/equipo/' ) ),
		array( 'title' => 'Tienda', 'url' => home_url( '/tienda/' ) ),
		array( 'title' => 'Planes', 'url' => home_url( '/planes/' ) ),
		array( 'title' => 'Cobertura', 'url' => home_url( '/cobertura/' ) ),
		array( 'title' => 'Blog', 'url' => home_url( '/blog/' ) ),
		array( 'title' => 'Contacto', 'url' => home_url( '/contacto/' ) ),
	);

	foreach ( $pages as $p ) {
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => $p['title'],
			'menu-item-url'    => $p['url'],
			'menu-item-status' => 'publish',
			'menu-item-type'   => 'custom',
		) );
	}

	// Assign to primary location.
	$locations = get_theme_mod( 'nav_menu_locations' );
	if ( ! is_array( $locations ) ) {
		$locations = array();
	}
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}
