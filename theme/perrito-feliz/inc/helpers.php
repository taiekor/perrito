<?php
/**
 * Theme helper functions.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Safe getter for an ACF option field with fallback.
 *
 * @param string $key     Field key.
 * @param mixed  $default Default value if not set.
 * @return mixed
 */
function perrito_option( $key, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key, 'option' );
		if ( ! empty( $value ) ) {
			return $value;
		}
	}
	$fallbacks = array(
		'telefono_principal'     => '+56 2 2987 4410',
		'telefono_principal_raw' => '+56229874410',
		'whatsapp'               => '+56 9 6612 8834',
		'whatsapp_raw'           => '56966128834',
		'email'                  => 'hola@perritofeliz.cl',
		'email_urgencias'        => 'urgencias@perritofeliz.cl',
		'direccion'              => 'Av. Irarrazaval 2450, Nunoa, Santiago, Chile',
		'horarios'               => 'Lun a Vie 08:00-21:00 | Sab 09:00-20:00 | Dom 10:00-18:00 | Urgencias 24/7',
		'mensaje_urgencia'       => 'Urgencia veterinaria 24/7. Llama ya.',
	);
	if ( isset( $fallbacks[ $key ] ) ) {
		return $fallbacks[ $key ];
	}
	return $default;
}

/**
 * Return inline SVG contents from /assets/svg.
 *
 * @param string $path   Relative path inside /assets/svg.
 * @param string $class  Optional CSS class.
 * @return string
 */
function perrito_svg( $path, $class = '' ) {
	$file = PERRITO_DIR . '/assets/svg/' . ltrim( $path, '/' );
	if ( ! file_exists( $file ) ) {
		return '';
	}
	$svg = file_get_contents( $file );
	if ( $class ) {
		$svg = preg_replace( '/<svg /', '<svg class="' . esc_attr( $class ) . '" ', $svg, 1 );
	}
	return $svg;
}

/**
 * Echo inline SVG.
 *
 * @param string $path  Relative path.
 * @param string $class Optional CSS class.
 */
function perrito_the_svg( $path, $class = '' ) {
	echo perrito_svg( $path, $class ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Formatted CLP price.
 *
 * @param int|float $amount Amount.
 * @return string
 */
function perrito_price( $amount ) {
	return '$' . number_format( (float) $amount, 0, ',', '.' );
}

/**
 * Safe tel link from a phone number.
 *
 * @param string $phone Phone number (any format).
 * @return string
 */
function perrito_tel_link( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}

/**
 * Build a WhatsApp link with prefilled text.
 *
 * @param string $phone   Phone number.
 * @param string $message Prefilled message.
 * @return string
 */
function perrito_wa_link( $phone, $message = '' ) {
	$number = preg_replace( '/[^0-9]/', '', $phone );
	$url    = 'https://wa.me/' . $number;
	if ( $message ) {
		$url .= '?text=' . rawurlencode( $message );
	}
	return $url;
}

/**
 * Get the featured illustration for a post from ACF with fallback to default SVG.
 *
 * @param int    $post_id Post ID.
 * @param string $key     ACF key.
 * @param string $default Default SVG path relative to /assets/svg.
 * @return string HTML (img or inline svg).
 */
function perrito_illustration( $post_id, $key, $default = 'illustrations/hero-home.svg' ) {
	if ( function_exists( 'get_field' ) ) {
		$image = get_field( $key, $post_id );
		if ( is_array( $image ) && isset( $image['url'] ) ) {
			return '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image['alt'] ?? '' ) . '" loading="lazy" />';
		}
	}
	return perrito_svg( $default );
}

/**
 * Return a truncated excerpt.
 *
 * @param string $text  Text to truncate.
 * @param int    $words Word limit.
 * @return string
 */
function perrito_excerpt( $text, $words = 28 ) {
	return wp_trim_words( wp_strip_all_tags( $text ), $words, '...' );
}
