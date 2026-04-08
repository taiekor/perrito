<?php
/**
 * Taxonomies.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register taxonomies.
 */
function perrito_register_taxonomies() {

	// Servicio categoria.
	register_taxonomy(
		'servicio_categoria',
		'servicio',
		array(
			'labels'            => array(
				'name'          => 'Categorias de servicio',
				'singular_name' => 'Categoria',
				'menu_name'     => 'Categorias',
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array(
				'slug'       => 'servicios/categoria',
				'with_front' => false,
			),
		)
	);

	// Producto categoria.
	register_taxonomy(
		'producto_categoria',
		'producto',
		array(
			'labels'            => array(
				'name'          => 'Categorias de producto',
				'singular_name' => 'Categoria',
				'menu_name'     => 'Categorias',
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array(
				'slug'       => 'tienda/categoria',
				'with_front' => false,
			),
		)
	);

	// Producto especie.
	register_taxonomy(
		'producto_especie',
		'producto',
		array(
			'labels'            => array(
				'name'          => 'Especies',
				'singular_name' => 'Especie',
				'menu_name'     => 'Especies',
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array(
				'slug'       => 'tienda/especie',
				'with_front' => false,
			),
		)
	);

	// Miembro rol.
	register_taxonomy(
		'miembro_rol',
		'miembro',
		array(
			'labels'            => array(
				'name'          => 'Roles',
				'singular_name' => 'Rol',
				'menu_name'     => 'Roles',
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array(
				'slug'       => 'equipo/rol',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'perrito_register_taxonomies' );
