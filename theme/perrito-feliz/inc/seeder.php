<?php
/**
 * Content seeder - runs once on theme activation.
 *
 * Creates all pages, services, products, team members, plans, testimonials,
 * landings and sample blog posts from the Perrito Feliz content document.
 *
 * Data is split into files under /inc/seed-data/ for maintainability.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once PERRITO_DIR . '/inc/seed-data/pages.php';
require_once PERRITO_DIR . '/inc/seed-data/servicios.php';
require_once PERRITO_DIR . '/inc/seed-data/productos.php';
require_once PERRITO_DIR . '/inc/seed-data/miembros.php';
require_once PERRITO_DIR . '/inc/seed-data/planes.php';
require_once PERRITO_DIR . '/inc/seed-data/testimonios.php';
require_once PERRITO_DIR . '/inc/seed-data/landings.php';
require_once PERRITO_DIR . '/inc/seed-data/blog.php';
require_once PERRITO_DIR . '/inc/seed-data/menus.php';

/**
 * Run the seeder on theme activation.
 */
function perrito_run_seeder() {
	if ( get_option( 'perrito_seeded_v1' ) ) {
		return;
	}

	perrito_seed_pages();
	perrito_seed_terms();
	perrito_seed_servicios();
	perrito_seed_productos();
	perrito_seed_miembros();
	perrito_seed_planes();
	perrito_seed_testimonios();
	perrito_seed_landings();
	perrito_seed_blog();
	perrito_seed_menus();

	update_option( 'perrito_seeded_v1', time() );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'perrito_run_seeder' );

/**
 * Admin action to re-run seeder manually.
 * Usage: wp-admin/admin.php?action=perrito_reseed
 */
function perrito_admin_reseed() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'No autorizado' );
	}
	delete_option( 'perrito_seeded_v1' );
	perrito_run_seeder();
	wp_safe_redirect( admin_url() );
	exit;
}
add_action( 'admin_action_perrito_reseed', 'perrito_admin_reseed' );

/**
 * Seed taxonomy terms used across CPTs.
 */
function perrito_seed_terms() {
	$servicio_cats = array(
		'preventivo'  => 'Medicina preventiva',
		'urgencia'    => 'Urgencias',
		'quirurgico'  => 'Quirúrgico',
		'diagnostico' => 'Diagnóstico',
		'bienestar'   => 'Bienestar',
	);
	foreach ( $servicio_cats as $slug => $name ) {
		if ( ! term_exists( $slug, 'servicio_categoria' ) ) {
			wp_insert_term( $name, 'servicio_categoria', array( 'slug' => $slug ) );
		}
	}

	$producto_cats = array(
		'alimentos'   => 'Alimentos',
		'farmacia'    => 'Farmacia',
		'accesorios'  => 'Accesorios',
		'juguetes'    => 'Juguetes',
		'ropa'        => 'Ropa',
		'higiene'     => 'Higiene',
	);
	foreach ( $producto_cats as $slug => $name ) {
		if ( ! term_exists( $slug, 'producto_categoria' ) ) {
			wp_insert_term( $name, 'producto_categoria', array( 'slug' => $slug ) );
		}
	}

	$especies = array(
		'perro' => 'Perros',
		'gato'  => 'Gatos',
	);
	foreach ( $especies as $slug => $name ) {
		if ( ! term_exists( $slug, 'producto_especie' ) ) {
			wp_insert_term( $name, 'producto_especie', array( 'slug' => $slug ) );
		}
	}
}

/**
 * Helper: create or update a post by slug.
 */
function perrito_seed_post( $args ) {
	$existing = get_page_by_path( $args['post_name'], OBJECT, $args['post_type'] );
	if ( $existing ) {
		return $existing->ID;
	}
	$id = wp_insert_post( wp_parse_args( $args, array(
		'post_status' => 'publish',
	) ) );
	return is_wp_error( $id ) ? 0 : $id;
}

/**
 * Helper: set ACF fields on a post if ACF is active.
 */
function perrito_seed_fields( $post_id, $fields ) {
	if ( ! function_exists( 'update_field' ) ) {
		// Fallback: save to post meta.
		foreach ( $fields as $key => $value ) {
			update_post_meta( $post_id, $key, $value );
		}
		return;
	}
	foreach ( $fields as $key => $value ) {
		update_field( $key, $value, $post_id );
	}
}

/**
 * Helper: attach taxonomy terms to a post.
 */
function perrito_seed_terms_for( $post_id, $terms_by_tax ) {
	foreach ( $terms_by_tax as $tax => $slugs ) {
		wp_set_object_terms( $post_id, $slugs, $tax );
	}
}
