<?php
/**
 * Custom Post Types.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all CPTs.
 */
function perrito_register_cpts() {

	// Servicio.
	register_post_type(
		'servicio',
		array(
			'labels'             => array(
				'name'               => 'Servicios',
				'singular_name'      => 'Servicio',
				'add_new_item'       => 'Anadir nuevo servicio',
				'edit_item'          => 'Editar servicio',
				'new_item'           => 'Nuevo servicio',
				'view_item'          => 'Ver servicio',
				'search_items'       => 'Buscar servicios',
				'menu_name'          => 'Servicios',
			),
			'public'             => true,
			'has_archive'        => 'servicios',
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-heart',
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			'rewrite'            => array(
				'slug'       => 'servicios',
				'with_front' => false,
			),
		)
	);

	// Producto.
	register_post_type(
		'producto',
		array(
			'labels'             => array(
				'name'               => 'Productos',
				'singular_name'      => 'Producto',
				'add_new_item'       => 'Anadir nuevo producto',
				'edit_item'          => 'Editar producto',
				'new_item'           => 'Nuevo producto',
				'view_item'          => 'Ver producto',
				'search_items'       => 'Buscar productos',
				'menu_name'          => 'Tienda',
			),
			'public'             => true,
			'has_archive'        => 'tienda',
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-cart',
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			'rewrite'            => array(
				'slug'       => 'tienda',
				'with_front' => false,
			),
		)
	);

	// Miembro del equipo.
	register_post_type(
		'miembro',
		array(
			'labels'             => array(
				'name'               => 'Equipo medico',
				'singular_name'      => 'Miembro',
				'add_new_item'       => 'Anadir miembro',
				'edit_item'          => 'Editar miembro',
				'new_item'           => 'Nuevo miembro',
				'view_item'          => 'Ver miembro',
				'search_items'       => 'Buscar miembros',
				'menu_name'          => 'Equipo',
			),
			'public'             => true,
			'has_archive'        => 'equipo',
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-groups',
			'menu_position'      => 7,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
			'rewrite'            => array(
				'slug'       => 'equipo',
				'with_front' => false,
			),
		)
	);

	// Plan.
	register_post_type(
		'plan',
		array(
			'labels'             => array(
				'name'               => 'Planes de salud',
				'singular_name'      => 'Plan',
				'add_new_item'       => 'Anadir plan',
				'edit_item'          => 'Editar plan',
				'new_item'           => 'Nuevo plan',
				'menu_name'          => 'Planes',
			),
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-awards',
			'menu_position'      => 8,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'rewrite'            => array(
				'slug'       => 'planes',
				'with_front' => false,
			),
		)
	);

	// Testimonio (no publico).
	register_post_type(
		'testimonio',
		array(
			'labels'             => array(
				'name'               => 'Testimonios',
				'singular_name'      => 'Testimonio',
				'add_new_item'       => 'Anadir testimonio',
				'edit_item'          => 'Editar testimonio',
				'menu_name'          => 'Testimonios',
			),
			'public'             => false,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-format-quote',
			'menu_position'      => 9,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		)
	);

	// Landing.
	register_post_type(
		'landing',
		array(
			'labels'             => array(
				'name'               => 'Landing pages',
				'singular_name'      => 'Landing',
				'add_new_item'       => 'Nueva landing',
				'edit_item'          => 'Editar landing',
				'menu_name'          => 'Landings (Ads)',
			),
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-megaphone',
			'menu_position'      => 10,
			'supports'           => array( 'title', 'editor', 'revisions' ),
			'rewrite'            => array(
				'slug'       => 'landing',
				'with_front' => false,
			),
			'exclude_from_search' => true,
		)
	);
}
add_action( 'init', 'perrito_register_cpts' );
