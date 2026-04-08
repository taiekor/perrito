<?php
/**
 * SEO: meta tags, Open Graph, Twitter cards, canonical.
 *
 * Custom SEO implementation (no Yoast). Fast, minimal, schema.org ready.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build the title for current view.
 *
 * @param string $title Original title.
 * @return string
 */
function perrito_document_title( $title ) {
	$site = get_bloginfo( 'name' );

	if ( is_front_page() ) {
		return 'Perrito Feliz - Clinica Veterinaria Integral en Nunoa, Santiago | Urgencias 24/7';
	}

	if ( is_singular( 'servicio' ) ) {
		return sprintf( '%s - Servicio Veterinario en Nunoa | Perrito Feliz', get_the_title() );
	}

	if ( is_singular( 'producto' ) ) {
		return sprintf( '%s - Tienda Veterinaria | Perrito Feliz', get_the_title() );
	}

	if ( is_singular( 'miembro' ) ) {
		return sprintf( '%s - Equipo Medico Veterinario | Perrito Feliz', get_the_title() );
	}

	if ( is_singular( 'landing' ) ) {
		$tit = get_field( 'hero_titular' );
		if ( $tit ) {
			return sprintf( '%s | Perrito Feliz - Nunoa, Santiago', $tit );
		}
	}

	if ( is_post_type_archive( 'servicio' ) ) {
		return 'Servicios Veterinarios - Consulta, Urgencias, Cirugia | Perrito Feliz Nunoa';
	}

	if ( is_post_type_archive( 'producto' ) ) {
		return 'Tienda Veterinaria - Alimentos, Farmacia, Accesorios | Perrito Feliz';
	}

	if ( is_post_type_archive( 'miembro' ) ) {
		return 'Equipo Medico Veterinario | Perrito Feliz Nunoa';
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'perrito_document_title' );

/**
 * Build meta description for current view.
 *
 * @return string
 */
function perrito_meta_description() {
	if ( is_front_page() ) {
		return 'Clinica veterinaria integral en Nunoa, Santiago. Consultas, urgencias 24/7, ambulancia veterinaria, cirugia, hospitalizacion, examenes, nutricion, peluqueria y tienda. Atencion humana y criterio clinico para perros y gatos.';
	}

	if ( is_singular() ) {
		global $post;
		$excerpt = get_the_excerpt( $post );
		if ( $excerpt ) {
			return wp_strip_all_tags( $excerpt );
		}
		return wp_trim_words( wp_strip_all_tags( $post->post_content ), 30, '...' );
	}

	if ( is_archive() ) {
		return 'Perrito Feliz - clinica veterinaria integral en Nunoa, Santiago. Medicina seria con trato humano, urgencias 24/7 y ambulancia veterinaria.';
	}

	return get_bloginfo( 'description' );
}

/**
 * Output meta tags in head.
 */
function perrito_head_meta() {
	$description = perrito_meta_description();
	$canonical   = is_singular() ? get_permalink() : home_url( add_query_arg( null, null ) );
	$og_image    = PERRITO_URI . '/assets/svg/illustrations/og-default.svg';
	$title       = wp_get_document_title();

	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta name="author" content="Perrito Feliz">' . "\n";
	echo '<meta name="robots" content="index, follow, max-image-preview:large">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
	echo '<link rel="alternate" hreflang="es-CL" href="' . esc_url( $canonical ) . '">' . "\n";

	// Open Graph.
	echo '<meta property="og:locale" content="es_CL">' . "\n";
	echo '<meta property="og:type" content="' . ( is_singular( 'post' ) ? 'article' : 'website' ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
	echo '<meta property="og:site_name" content="Perrito Feliz">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $og_image ) . '">' . "\n";

	// Twitter.
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '">' . "\n";

	// Geo.
	echo '<meta name="geo.region" content="CL-RM">' . "\n";
	echo '<meta name="geo.placename" content="Nunoa, Santiago">' . "\n";
	echo '<meta name="geo.position" content="-33.4556;-70.6000">' . "\n";
	echo '<meta name="ICBM" content="-33.4556, -70.6000">' . "\n";
}
add_action( 'wp_head', 'perrito_head_meta', 2 );
