<?php
/**
 * Seed: testimonios.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_testimonios() {
	$testimonios = array(
		array(
			'slug' => 'francisca-t-providencia',
			'title' => 'Francisca T.',
			'content' => 'Nos salvaron en una urgencia de madrugada. Mi perrita empezó con dificultad para respirar y no sabíamos qué hacer. La ambulancia veterinaria llegó súper rápido y la clínica ya estaba preparada para recibirla. Nos explicaron todo con mucha calma.',
			'fields' => array( 'autor' => 'Francisca T.', 'comuna' => 'Providencia', 'estrellas' => '5' ),
		),
		array(
			'slug' => 'matias-r-nunoa',
			'title' => 'Matías R.',
			'content' => 'No es solo una clínica, de verdad acompañan. Llevamos a nuestro gato por un tema digestivo que venía hace meses y por fin sentimos que alguien se tomó el tiempo de revisar bien el caso.',
			'fields' => array( 'autor' => 'Matías R.', 'comuna' => 'Ñuñoa', 'estrellas' => '5' ),
		),
		array(
			'slug' => 'daniela-c-la-reina',
			'title' => 'Daniela C.',
			'content' => 'La tienda y la clínica juntas nos resolvieron todo. Fuimos por una consulta, nos indicaron una dieta específica y pudimos salir con todo listo ese mismo día. Eso se agradece muchísimo.',
			'fields' => array( 'autor' => 'Daniela C.', 'comuna' => 'La Reina', 'estrellas' => '5' ),
		),
	);

	foreach ( $testimonios as $t ) {
		$existing = get_page_by_path( $t['slug'], OBJECT, 'testimonio' );
		if ( $existing ) {
			continue;
		}
		$id = wp_insert_post( array(
			'post_type'    => 'testimonio',
			'post_status'  => 'publish',
			'post_name'    => $t['slug'],
			'post_title'   => $t['title'],
			'post_content' => $t['content'],
		) );
		if ( ! is_wp_error( $id ) && $id ) {
			perrito_seed_fields( $id, $t['fields'] );
		}
	}
}
