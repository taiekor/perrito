<?php
/**
 * Schema.org JSON-LD structured data.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output JSON-LD in head.
 */
function perrito_head_jsonld() {
	$graph = array();

	// 1. WebSite with SearchAction (always).
	$graph[] = array(
		'@type'           => 'WebSite',
		'@id'             => home_url( '/#website' ),
		'url'             => home_url( '/' ),
		'name'            => 'Perrito Feliz',
		'inLanguage'      => 'es-CL',
		'potentialAction' => array(
			'@type'       => 'SearchAction',
			'target'      => array(
				'@type'       => 'EntryPoint',
				'urlTemplate' => home_url( '/?s={search_term_string}' ),
			),
			'query-input' => 'required name=search_term_string',
		),
	);

	// 2. LocalBusiness + VeterinaryCare (on home and footer).
	$graph[] = array(
		'@type'            => array( 'LocalBusiness', 'VeterinaryCare' ),
		'@id'              => home_url( '/#business' ),
		'name'             => 'Perrito Feliz',
		'legalName'        => 'Centro Veterinario Perrito Feliz SpA',
		'url'              => home_url( '/' ),
		'logo'             => PERRITO_URI . '/assets/svg/logo.svg',
		'image'            => PERRITO_URI . '/assets/svg/illustrations/hero-home.svg',
		'description'      => 'Clinica veterinaria integral en Nunoa, Santiago. Medicina seria con trato humano, urgencias 24/7, ambulancia veterinaria, cirugia, hospitalizacion y tienda veterinaria.',
		'telephone'        => perrito_option( 'telefono_principal' ),
		'email'            => perrito_option( 'email' ),
		'priceRange'       => '$$',
		'foundingDate'     => '2016',
		'address'          => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Av. Irarrazaval 2450',
			'addressLocality' => 'Nunoa',
			'addressRegion'   => 'Region Metropolitana',
			'postalCode'      => '7750000',
			'addressCountry'  => 'CL',
		),
		'geo'              => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => -33.4556,
			'longitude' => -70.6000,
		),
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
				'opens'     => '08:00',
				'closes'    => '21:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => 'Saturday',
				'opens'     => '09:00',
				'closes'    => '20:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => 'Sunday',
				'opens'     => '10:00',
				'closes'    => '18:00',
			),
		),
		'sameAs'           => array(
			'https://www.instagram.com/perritofeliz',
			'https://www.facebook.com/perritofeliz',
		),
		'areaServed'       => array(
			array( '@type' => 'City', 'name' => 'Nunoa' ),
			array( '@type' => 'City', 'name' => 'Providencia' ),
			array( '@type' => 'City', 'name' => 'La Reina' ),
			array( '@type' => 'City', 'name' => 'Macul' ),
			array( '@type' => 'City', 'name' => 'Santiago' ),
			array( '@type' => 'City', 'name' => 'Las Condes' ),
			array( '@type' => 'City', 'name' => 'Vitacura' ),
		),
		'aggregateRating'  => array(
			'@type'       => 'AggregateRating',
			'ratingValue' => '4.9',
			'reviewCount' => '1200',
			'bestRating'  => '5',
		),
	);

	// 3. Service schema on single-servicio.
	if ( is_singular( 'servicio' ) ) {
		$graph[] = array(
			'@type'       => 'Service',
			'@id'         => get_permalink() . '#service',
			'serviceType' => get_the_title(),
			'name'        => get_the_title(),
			'description' => wp_strip_all_tags( get_the_excerpt() ),
			'provider'    => array( '@id' => home_url( '/#business' ) ),
			'areaServed'  => array(
				'@type' => 'AdministrativeArea',
				'name'  => 'Region Metropolitana de Santiago',
			),
		);
	}

	// 4. Product schema on single-producto.
	if ( is_singular( 'producto' ) ) {
		$precio = function_exists( 'get_field' ) ? get_field( 'precio' ) : 0;
		$stock  = function_exists( 'get_field' ) ? get_field( 'stock_estado' ) : 'disponible';
		$marca  = function_exists( 'get_field' ) ? get_field( 'marca' ) : '';

		$graph[] = array(
			'@type'       => 'Product',
			'@id'         => get_permalink() . '#product',
			'name'        => get_the_title(),
			'description' => wp_strip_all_tags( get_the_excerpt() ),
			'brand'       => $marca ? array( '@type' => 'Brand', 'name' => $marca ) : null,
			'offers'      => array(
				'@type'         => 'Offer',
				'url'           => get_permalink(),
				'priceCurrency' => 'CLP',
				'price'         => (string) ( $precio ?: 0 ),
				'availability'  => 'agotado' === $stock ? 'https://schema.org/OutOfStock' : 'https://schema.org/InStock',
				'seller'        => array( '@id' => home_url( '/#business' ) ),
			),
		);
	}

	// 5. Person schema on single-miembro.
	if ( is_singular( 'miembro' ) ) {
		$cargo    = function_exists( 'get_field' ) ? get_field( 'cargo' ) : '';
		$registro = function_exists( 'get_field' ) ? get_field( 'registro_ficticio' ) : '';
		$graph[] = array(
			'@type'        => 'Person',
			'@id'          => get_permalink() . '#person',
			'name'         => get_the_title(),
			'jobTitle'     => $cargo,
			'worksFor'     => array( '@id' => home_url( '/#business' ) ),
			'identifier'   => $registro,
			'description'  => wp_strip_all_tags( get_the_content() ),
		);
	}

	// 6. FAQPage schema on landings with faq_items.
	if ( is_singular( 'landing' ) && function_exists( 'get_field' ) ) {
		$faqs = get_field( 'faq_items' );
		if ( is_array( $faqs ) && count( $faqs ) ) {
			$q_entities = array();
			foreach ( $faqs as $faq ) {
				$q_entities[] = array(
					'@type'          => 'Question',
					'name'           => $faq['pregunta'],
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $faq['respuesta'],
					),
				);
			}
			$graph[] = array(
				'@type'      => 'FAQPage',
				'mainEntity' => $q_entities,
			);
		}
	}

	// 7. BreadcrumbList on inner pages.
	if ( ! is_front_page() ) {
		$crumbs = perrito_get_breadcrumb_items();
		if ( count( $crumbs ) > 1 ) {
			$items = array();
			foreach ( $crumbs as $i => $crumb ) {
				$items[] = array(
					'@type'    => 'ListItem',
					'position' => $i + 1,
					'name'     => $crumb['label'],
					'item'     => $crumb['url'],
				);
			}
			$graph[] = array(
				'@type'           => 'BreadcrumbList',
				'itemListElement' => $items,
			);
		}
	}

	// Output.
	$jsonld = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $jsonld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'perrito_head_jsonld', 20 );
