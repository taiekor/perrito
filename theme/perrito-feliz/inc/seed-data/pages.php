<?php
/**
 * Seed: pages.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_pages() {
	$pages = array(
		array(
			'slug'     => 'home',
			'title'    => 'Home',
			'template' => '',
			'content'  => '',
		),
		array(
			'slug'     => 'sobre-nosotros',
			'title'    => 'Sobre Nosotros',
			'template' => '',
			'content'  => "<h2>Diez años acompañando tutores</h2>\n<p>Perrito Feliz fue fundada en 2016 por un grupo de médicos veterinarios que compartían una frustración común: muchas clínicas ofrecían buena medicina, pero mala experiencia humana; otras eran amables, pero no tenían capacidad clínica suficiente para resolver casos complejos.</p>\n<p>La idea fue crear un lugar donde ambas cosas convivieran: una clínica seria, equipada y confiable, pero al mismo tiempo cálida, clara y cercana para las familias.</p>\n<h2>Nuestra misión</h2>\n<p>Brindar atención veterinaria integral, humana y confiable para mejorar la salud y la calidad de vida de perros y gatos, acompañando a sus familias con cercanía, criterio clínico y soluciones reales.</p>\n<h2>Nuestros valores</h2>\n<ul><li><strong>Empatía real:</strong> escuchamos a los tutores y entendemos que cada caso importa.</li><li><strong>Rigor clínico:</strong> tomamos decisiones basadas en evaluación médica, evidencia y experiencia.</li><li><strong>Claridad:</strong> explicamos diagnósticos, tratamientos y costos de forma comprensible.</li><li><strong>Prevención:</strong> creemos que una buena medicina empieza antes de la enfermedad.</li><li><strong>Rapidez con criterio:</strong> en urgencias actuamos con velocidad, pero sin improvisación.</li></ul>",
		),
		array(
			'slug'     => 'contacto',
			'title'    => 'Contacto',
			'template' => 'page-templates/tpl-contacto.php',
			'content'  => '',
		),
		array(
			'slug'     => 'cobertura',
			'title'    => 'Cobertura de atención',
			'template' => 'page-templates/tpl-cobertura.php',
			'content'  => '',
		),
		array(
			'slug'     => 'carrito',
			'title'    => 'Carrito',
			'template' => 'page-templates/tpl-carrito.php',
			'content'  => '',
		),
		array(
			'slug'     => 'checkout',
			'title'    => 'Checkout',
			'template' => 'page-templates/tpl-checkout.php',
			'content'  => '',
		),
		array(
			'slug'     => 'preguntas-frecuentes',
			'title'    => 'Preguntas frecuentes',
			'template' => 'page-templates/tpl-faq.php',
			'content'  => '',
		),
		array(
			'slug'     => 'planes',
			'title'    => 'Planes de salud',
			'template' => 'page-templates/tpl-planes.php',
			'content'  => '',
		),
		array(
			'slug'     => 'equipo',
			'title'    => 'Equipo médico',
			'template' => 'page-templates/tpl-equipo.php',
			'content'  => '',
		),
		array(
			'slug'     => 'tienda',
			'title'    => 'Tienda veterinaria',
			'template' => 'page-templates/tpl-tienda.php',
			'content'  => '',
		),
		array(
			'slug'     => 'blog',
			'title'    => 'Blog',
			'template' => '',
			'content'  => '',
		),
	);

	$ids = array();
	foreach ( $pages as $p ) {
		$existing = get_page_by_path( $p['slug'] );
		if ( $existing ) {
			$id = $existing->ID;
		} else {
			$id = wp_insert_post( array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_name'    => $p['slug'],
				'post_title'   => $p['title'],
				'post_content' => $p['content'],
			) );
		}
		if ( $id && ! empty( $p['template'] ) ) {
			update_post_meta( $id, '_wp_page_template', $p['template'] );
		}
		$ids[ $p['slug'] ] = $id;
	}

	// Set homepage and blog page.
	update_option( 'show_on_front', 'page' );
	if ( ! empty( $ids['home'] ) ) {
		update_option( 'page_on_front', $ids['home'] );
	}
	if ( ! empty( $ids['blog'] ) ) {
		update_option( 'page_for_posts', $ids['blog'] );
	}

	// Set permalink structure to pretty permalinks.
	if ( '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
}
