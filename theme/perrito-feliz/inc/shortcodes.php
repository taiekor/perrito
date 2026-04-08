<?php
/**
 * Shortcodes.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * [perrito_whatsapp text="..."] - WhatsApp link button.
 */
function perrito_sc_whatsapp( $atts ) {
	$atts = shortcode_atts(
		array(
			'text'    => 'Escribenos por WhatsApp',
			'message' => 'Hola, quisiera informacion',
			'class'   => 'btn btn--primary',
		),
		$atts,
		'perrito_whatsapp'
	);
	return sprintf(
		'<a href="%s" class="%s" target="_blank" rel="noopener" data-tracking="sc_wa">%s</a>',
		esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), $atts['message'] ) ),
		esc_attr( $atts['class'] ),
		esc_html( $atts['text'] )
	);
}
add_shortcode( 'perrito_whatsapp', 'perrito_sc_whatsapp' );

/**
 * [perrito_tel text="..."] - Phone link button.
 */
function perrito_sc_tel( $atts ) {
	$atts = shortcode_atts(
		array(
			'text'  => 'Llamar ahora',
			'class' => 'btn btn--primary',
		),
		$atts,
		'perrito_tel'
	);
	return sprintf(
		'<a href="%s" class="%s" data-tracking="sc_tel">%s</a>',
		esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ),
		esc_attr( $atts['class'] ),
		esc_html( $atts['text'] )
	);
}
add_shortcode( 'perrito_tel', 'perrito_sc_tel' );
