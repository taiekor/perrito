<?php
/**
 * Seed: 4 planes de salud.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_planes() {
	$planes = array(
		array(
			'slug'  => 'plan-cachorro-feliz',
			'title' => 'Plan Cachorro Feliz',
			'order' => 1,
			'content' => '<p>El Plan Cachorro Feliz está diseñado para acompañar a los primeros meses de vida de tu mascota con todos los cuidados esenciales reunidos en un solo paquete.</p>',
			'fields' => array(
				'precio_referencial' => 69990,
				'frecuencia' => 'unico',
				'dirigido_a' => 'Cachorros de 0 a 6 meses',
				'destacado' => false,
				'color_acento' => '#E97B3F',
				'icono_slug' => 'service-preventiva',
				'beneficios' => array(
					array( 'item' => 'Primera consulta completa' ),
					array( 'item' => 'Calendario de vacunas' ),
					array( 'item' => 'Desparasitación interna y externa' ),
					array( 'item' => 'Revisión nutricional' ),
					array( 'item' => 'Guía de adaptación en casa' ),
					array( 'item' => 'Descuento primera peluquería' ),
				),
			),
		),
		array(
			'slug'  => 'plan-gatito-seguro',
			'title' => 'Plan Gatito Seguro',
			'order' => 2,
			'content' => '<p>Un plan diseñado especialmente para gatitos en crecimiento. Incluye medicina preventiva, educación al tutor y acompañamiento en la adaptación.</p>',
			'fields' => array(
				'precio_referencial' => 59990,
				'frecuencia' => 'unico',
				'dirigido_a' => 'Gatitos de 0 a 8 meses',
				'destacado' => false,
				'color_acento' => '#4FA577',
				'icono_slug' => 'service-preventiva',
				'beneficios' => array(
					array( 'item' => 'Chequeo inicial completo' ),
					array( 'item' => 'Vacunas trivalente + leucemia' ),
					array( 'item' => 'Desparasitación' ),
					array( 'item' => 'Evaluación de comportamiento' ),
					array( 'item' => 'Recomendaciones de enriquecimiento' ),
					array( 'item' => 'Descuento en alimentos kitten' ),
				),
			),
		),
		array(
			'slug'  => 'plan-familia-perrito-feliz',
			'title' => 'Plan Familia Perrito Feliz',
			'order' => 3,
			'content' => '<p>Nuestro plan más completo. Cuidado integral continuo con consultas ilimitadas, descuentos y prioridad en toda la operación de la clínica.</p>',
			'fields' => array(
				'precio_referencial' => 24990,
				'frecuencia' => 'mensual',
				'dirigido_a' => 'Familias con una o varias mascotas',
				'destacado' => true,
				'color_acento' => '#2D8659',
				'icono_slug' => 'service-preventiva',
				'beneficios' => array(
					array( 'item' => 'Consultas generales ilimitadas' ),
					array( 'item' => 'Descuentos en tienda veterinaria' ),
					array( 'item' => 'Tarifas preferenciales en peluquería' ),
					array( 'item' => 'Vacunas del año incluidas' ),
					array( 'item' => 'Recordatorios automáticos de controles' ),
					array( 'item' => 'Prioridad en agenda y urgencias' ),
					array( 'item' => 'Acceso a campañas preventivas' ),
				),
			),
		),
		array(
			'slug'  => 'plan-senior-contigo',
			'title' => 'Plan Senior Contigo',
			'order' => 4,
			'content' => '<p>Para mascotas adultas mayores que necesitan acompañamiento médico continuo, control del dolor y evaluación geriátrica regular.</p>',
			'fields' => array(
				'precio_referencial' => 89990,
				'frecuencia' => 'anual',
				'dirigido_a' => 'Mascotas mayores de 8 años',
				'destacado' => false,
				'color_acento' => '#1A2E3D',
				'icono_slug' => 'service-preventiva',
				'beneficios' => array(
					array( 'item' => 'Evaluación geriátrica anual' ),
					array( 'item' => 'Perfil preventivo anual' ),
					array( 'item' => 'Control de dolor y analgesia' ),
					array( 'item' => 'Revisión de movilidad' ),
					array( 'item' => 'Seguimiento nutricional' ),
					array( 'item' => 'Prioridad en agenda de controles' ),
				),
			),
		),
	);

	foreach ( $planes as $p ) {
		$existing = get_page_by_path( $p['slug'], OBJECT, 'plan' );
		if ( $existing ) {
			continue;
		}
		$id = wp_insert_post( array(
			'post_type'    => 'plan',
			'post_status'  => 'publish',
			'post_name'    => $p['slug'],
			'post_title'   => $p['title'],
			'post_excerpt' => $p['fields']['dirigido_a'],
			'post_content' => $p['content'],
			'menu_order'   => $p['order'],
		) );
		if ( ! is_wp_error( $id ) && $id ) {
			perrito_seed_fields( $id, $p['fields'] );
		}
	}
}
