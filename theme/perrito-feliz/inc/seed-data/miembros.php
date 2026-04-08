<?php
/**
 * Seed: 6 miembros del equipo.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_miembros() {
	$miembros = array(
		array(
			'slug'  => 'dra-catalina-rivas',
			'title' => 'Dra. Catalina Rivas M.',
			'order' => 1,
			'content' => '<p>La Dra. Catalina Rivas lidera el equipo clínico de Perrito Feliz y se especializa en medicina interna, pacientes complejos y estabilización de urgencias. Es reconocida por su criterio clínico, su capacidad para explicar diagnósticos difíciles de forma clara y su enfoque humano con los tutores.</p>',
			'fields' => array(
				'cargo' => 'Directora Médica · Medicina Interna y Urgencias',
				'resumen_profesional' => 'Médica veterinaria con 12 años de experiencia clínica, especializada en medicina interna, pacientes complejos y estabilización de urgencias.',
				'registro_ficticio' => 'COLMEVET RM-18452',
				'ilustracion_slug' => '',
				'formacion' => array(
					array( 'item' => 'Médico Veterinaria - Universidad de Chile' ),
					array( 'item' => 'Diplomado en Medicina Interna de Pequeños Animales' ),
					array( 'item' => 'Certificación en Urgencias y Cuidados Intensivos' ),
				),
				'experiencia_simulada' => array(
					array( 'item' => '12 años de experiencia clínica' ),
					array( 'item' => 'Más de 7.000 consultas de medicina interna' ),
					array( 'item' => 'Más de 1.500 casos de urgencia atendidos' ),
				),
				'especialidades' => array(
					array( 'item' => 'Medicina interna' ),
					array( 'item' => 'Urgencias' ),
					array( 'item' => 'Hospitalización' ),
					array( 'item' => 'Enfermedades crónicas' ),
					array( 'item' => 'Pacientes geriátricos' ),
				),
				'areas_trabajo' => array(
					array( 'item' => 'Consulta general' ),
					array( 'item' => 'Urgencias 24/7' ),
					array( 'item' => 'Hospitalización' ),
				),
			),
		),
		array(
			'slug'  => 'dr-benjamin-soto',
			'title' => 'Dr. Benjamín Soto L.',
			'order' => 2,
			'content' => '<p>El Dr. Benjamín Soto está a cargo de los procedimientos quirúrgicos programados y de urgencia. Se especializa en cirugía de tejidos blandos y en el diseño de protocolos analgésicos para una recuperación más segura y cómoda.</p>',
			'fields' => array(
				'cargo' => 'Cirujano Veterinario · Tejidos Blandos y Manejo del Dolor',
				'resumen_profesional' => 'Médico veterinario con 10 años de experiencia, especializado en cirugía de tejidos blandos y protocolos analgésicos para recuperación segura.',
				'registro_ficticio' => 'COLMEVET RM-20114',
				'ilustracion_slug' => '',
				'formacion' => array(
					array( 'item' => 'Médico Veterinario - Universidad Santo Tomás' ),
					array( 'item' => 'Diplomado en Cirugía de Pequeños Animales' ),
					array( 'item' => 'Anestesia Balanceada Veterinaria' ),
				),
				'experiencia_simulada' => array(
					array( 'item' => '10 años de experiencia' ),
					array( 'item' => 'Más de 2.400 cirugías realizadas' ),
				),
				'especialidades' => array(
					array( 'item' => 'Cirugía general' ),
					array( 'item' => 'Esterilizaciones' ),
					array( 'item' => 'Extracción de masas' ),
					array( 'item' => 'Suturas complejas' ),
					array( 'item' => 'Manejo del dolor' ),
				),
				'areas_trabajo' => array(
					array( 'item' => 'Pabellón quirúrgico' ),
					array( 'item' => 'Evaluación preanestésica' ),
					array( 'item' => 'Recuperación postoperatoria' ),
				),
			),
		),
		array(
			'slug'  => 'dra-josefa-mena',
			'title' => 'Dra. Josefa Mena V.',
			'order' => 3,
			'content' => '<p>La Dra. Josefa Mena trabaja en el diagnóstico y seguimiento de casos dermatológicos recurrentes, alergias y problemas alimentarios. Tiene un enfoque muy detallista y trabaja estrechamente con los tutores para lograr cambios reales en el bienestar de cada paciente.</p>',
			'fields' => array(
				'cargo' => 'Médica Veterinaria · Dermatología y Nutrición Clínica',
				'resumen_profesional' => 'Médica veterinaria con 8 años de experiencia, especializada en dermatología básica, alergias, otitis recurrente y nutrición clínica.',
				'registro_ficticio' => 'COLMEVET RM-22573',
				'ilustracion_slug' => '',
				'formacion' => array(
					array( 'item' => 'Médico Veterinaria - Universidad Austral de Chile' ),
					array( 'item' => 'Diplomado en Dermatología Veterinaria' ),
					array( 'item' => 'Certificación en Nutrición Clínica Veterinaria' ),
				),
				'experiencia_simulada' => array(
					array( 'item' => '8 años de experiencia' ),
					array( 'item' => 'Más de 3.100 pacientes dermatológicos evaluados' ),
				),
				'especialidades' => array(
					array( 'item' => 'Dermatología básica' ),
					array( 'item' => 'Alergias' ),
					array( 'item' => 'Otitis recurrente' ),
					array( 'item' => 'Nutrición clínica' ),
					array( 'item' => 'Dietas terapéuticas' ),
				),
				'areas_trabajo' => array(
					array( 'item' => 'Consulta dermatológica' ),
					array( 'item' => 'Nutrición y dietas' ),
				),
			),
		),
		array(
			'slug'  => 'dr-matias-leon',
			'title' => 'Dr. Matías León F.',
			'order' => 4,
			'content' => '<p>El Dr. Matías León tiene un fuerte enfoque en medicina felina, chequeos preventivos y educación al tutor. Destaca por su paciencia con gatos sensibles y por diseñar consultas menos invasivas y más amables.</p>',
			'fields' => array(
				'cargo' => 'Médico Veterinario · Medicina Felina y Preventiva',
				'resumen_profesional' => 'Médico veterinario con 7 años de experiencia, especializado en medicina felina, chequeos preventivos y educación al tutor.',
				'registro_ficticio' => 'COLMEVET RM-23190',
				'ilustracion_slug' => '',
				'formacion' => array(
					array( 'item' => 'Médico Veterinario - Universidad Andrés Bello' ),
					array( 'item' => 'Curso de Medicina Felina Avanzada' ),
					array( 'item' => 'Certificación en Bienestar Animal' ),
				),
				'experiencia_simulada' => array(
					array( 'item' => '7 años de experiencia' ),
					array( 'item' => 'Más de 4.000 controles felinos realizados' ),
				),
				'especialidades' => array(
					array( 'item' => 'Medicina felina' ),
					array( 'item' => 'Vacunación' ),
					array( 'item' => 'Chequeos preventivos' ),
					array( 'item' => 'Certificados de viaje' ),
				),
				'areas_trabajo' => array(
					array( 'item' => 'Consulta felina' ),
					array( 'item' => 'Medicina preventiva' ),
				),
			),
		),
		array(
			'slug'  => 'camila-paredes',
			'title' => 'TMV Camila Paredes G.',
			'order' => 5,
			'content' => '<p>Camila es parte clave de la experiencia clínica diaria de Perrito Feliz. Participa en hospitalización, monitoreo, toma de signos y asistencia en procedimientos. Su trato con los pacientes y su comunicación con los tutores han sido fundamentales para el posicionamiento humano de la clínica.</p>',
			'fields' => array(
				'cargo' => 'Técnico en Medicina Veterinaria · Hospitalización',
				'resumen_profesional' => 'Técnico en medicina veterinaria con enfoque en hospitalización, monitoreo, toma de signos y asistencia quirúrgica.',
				'registro_ficticio' => '',
				'ilustracion_slug' => '',
				'formacion' => array(
					array( 'item' => 'Técnico en Medicina Veterinaria - AIEP' ),
					array( 'item' => 'Monitorización de Paciente Crítico' ),
					array( 'item' => 'Bioseguridad y Esterilización Clínica' ),
				),
				'experiencia_simulada' => array(
					array( 'item' => 'Parte del equipo desde 2018' ),
				),
				'especialidades' => array(
					array( 'item' => 'Hospitalización' ),
					array( 'item' => 'Recuperación anestésica' ),
					array( 'item' => 'Toma de muestras' ),
					array( 'item' => 'Asistencia de urgencia' ),
				),
				'areas_trabajo' => array(
					array( 'item' => 'Hospitalización' ),
					array( 'item' => 'Apoyo quirúrgico' ),
				),
			),
		),
		array(
			'slug'  => 'paula-contreras',
			'title' => 'Paula Contreras N.',
			'order' => 6,
			'content' => '<p>Paula lidera el área de baño, higiene y mantenimiento de piel y pelaje. Su trabajo se coordina con el equipo médico, especialmente en pacientes dermatológicos, geriátricos o de alta sensibilidad.</p>',
			'fields' => array(
				'cargo' => 'Encargada de Peluquería Clínica y Bienestar',
				'resumen_profesional' => 'Groomer profesional certificada con enfoque en pacientes sensibles, geriátricos y con problemas dermatológicos.',
				'registro_ficticio' => '',
				'ilustracion_slug' => '',
				'formacion' => array(
					array( 'item' => 'Groomer profesional certificada' ),
					array( 'item' => 'Manejo Seguro de Mascotas Ansiosas' ),
					array( 'item' => 'Higiene Dermatológica para Peluquería' ),
				),
				'experiencia_simulada' => array(),
				'especialidades' => array(
					array( 'item' => 'Baño medicado' ),
					array( 'item' => 'Corte higiénico' ),
					array( 'item' => 'Deslanado' ),
					array( 'item' => 'Mantenimiento dermatológico' ),
				),
				'areas_trabajo' => array(
					array( 'item' => 'Peluquería clínica' ),
					array( 'item' => 'Bienestar' ),
				),
			),
		),
	);

	foreach ( $miembros as $m ) {
		$existing = get_page_by_path( $m['slug'], OBJECT, 'miembro' );
		if ( $existing ) {
			continue;
		}
		$id = wp_insert_post( array(
			'post_type'    => 'miembro',
			'post_status'  => 'publish',
			'post_name'    => $m['slug'],
			'post_title'   => $m['title'],
			'post_excerpt' => $m['fields']['resumen_profesional'],
			'post_content' => $m['content'],
			'menu_order'   => $m['order'],
		) );
		if ( ! is_wp_error( $id ) && $id ) {
			perrito_seed_fields( $id, $m['fields'] );
		}
	}
}
