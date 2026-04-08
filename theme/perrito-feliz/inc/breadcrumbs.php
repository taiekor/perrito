<?php
/**
 * Breadcrumbs.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build an array of breadcrumb items for the current view.
 *
 * @return array of ['label' => string, 'url' => string]
 */
function perrito_get_breadcrumb_items() {
	$items = array();

	// Home always first.
	$items[] = array(
		'label' => 'Inicio',
		'url'   => home_url( '/' ),
	);

	if ( is_front_page() ) {
		return $items;
	}

	if ( is_singular( 'servicio' ) ) {
		$items[] = array( 'label' => 'Servicios', 'url' => home_url( '/servicios/' ) );
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_post_type_archive( 'servicio' ) ) {
		$items[] = array( 'label' => 'Servicios', 'url' => home_url( '/servicios/' ) );
	} elseif ( is_singular( 'producto' ) ) {
		$items[] = array( 'label' => 'Tienda', 'url' => home_url( '/tienda/' ) );
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_post_type_archive( 'producto' ) ) {
		$items[] = array( 'label' => 'Tienda', 'url' => home_url( '/tienda/' ) );
	} elseif ( is_singular( 'miembro' ) ) {
		$items[] = array( 'label' => 'Equipo', 'url' => home_url( '/equipo/' ) );
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_post_type_archive( 'miembro' ) ) {
		$items[] = array( 'label' => 'Equipo', 'url' => home_url( '/equipo/' ) );
	} elseif ( is_singular( 'plan' ) ) {
		$items[] = array( 'label' => 'Planes', 'url' => home_url( '/planes/' ) );
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_singular( 'landing' ) ) {
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_singular( 'post' ) ) {
		$items[] = array( 'label' => 'Blog', 'url' => home_url( '/blog/' ) );
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_home() ) {
		$items[] = array( 'label' => 'Blog', 'url' => home_url( '/blog/' ) );
	} elseif ( is_page() ) {
		$items[] = array( 'label' => get_the_title(), 'url' => get_permalink() );
	} elseif ( is_search() ) {
		$items[] = array( 'label' => 'Busqueda', 'url' => '' );
	} elseif ( is_404() ) {
		$items[] = array( 'label' => 'Pagina no encontrada', 'url' => '' );
	}

	return $items;
}

/**
 * Render breadcrumb HTML.
 */
function perrito_breadcrumbs() {
	$items = perrito_get_breadcrumb_items();
	if ( count( $items ) < 2 ) {
		return;
	}
	echo '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol class="breadcrumbs__list">';
	$last = count( $items ) - 1;
	foreach ( $items as $i => $item ) {
		if ( $i === $last ) {
			printf( '<li class="breadcrumbs__item breadcrumbs__item--current" aria-current="page">%s</li>', esc_html( $item['label'] ) );
		} else {
			printf(
				'<li class="breadcrumbs__item"><a href="%s">%s</a></li>',
				esc_url( $item['url'] ),
				esc_html( $item['label'] )
			);
		}
	}
	echo '</ol></nav>';
}
