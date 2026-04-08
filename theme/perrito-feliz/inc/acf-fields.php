<?php
/**
 * ACF field groups registered in PHP.
 *
 * Requires Advanced Custom Fields (free) plugin.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register ACF field groups.
 */
function perrito_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// Servicio fields.
	acf_add_local_field_group(
		array(
			'key'      => 'group_servicio',
			'title'    => 'Datos del servicio',
			'fields'   => array(
				array(
					'key'          => 'field_servicio_precio_desde',
					'label'        => 'Precio desde (CLP)',
					'name'         => 'precio_desde',
					'type'         => 'number',
					'instructions' => 'Precio referencial, sin signo ni separadores.',
				),
				array(
					'key'   => 'field_servicio_duracion',
					'label' => 'Duracion estimada',
					'name'  => 'duracion_estimada',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_servicio_urgencia',
					'label' => 'Es servicio de urgencia',
					'name'  => 'es_urgencia',
					'type'  => 'true_false',
					'ui'    => 1,
				),
				array(
					'key'        => 'field_servicio_incluye',
					'label'      => 'Que incluye',
					'name'       => 'incluye',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_servicio_incluye_item',
							'label' => 'Item',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'        => 'field_servicio_casos',
					'label'      => 'Casos frecuentes',
					'name'       => 'casos_frecuentes',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_servicio_caso_item',
							'label' => 'Caso',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'   => 'field_servicio_icono',
					'label' => 'Icono (slug svg)',
					'name'  => 'icono_slug',
					'type'  => 'text',
					'instructions' => 'Nombre del archivo SVG en /assets/svg/icons/ sin extension. Ej: service-consulta',
				),
				array(
					'key'   => 'field_servicio_ilustracion',
					'label' => 'Ilustracion hero (slug svg)',
					'name'  => 'ilustracion_slug',
					'type'  => 'text',
					'instructions' => 'Nombre del archivo SVG en /assets/svg/illustrations/ sin extension.',
				),
				array(
					'key'   => 'field_servicio_cta_texto',
					'label' => 'CTA texto',
					'name'  => 'cta_texto',
					'type'  => 'text',
					'default_value' => 'Agendar ahora',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'servicio',
					),
				),
			),
		)
	);

	// Producto fields.
	acf_add_local_field_group(
		array(
			'key'      => 'group_producto',
			'title'    => 'Datos del producto',
			'fields'   => array(
				array(
					'key'      => 'field_producto_precio',
					'label'    => 'Precio (CLP)',
					'name'     => 'precio',
					'type'     => 'number',
					'required' => 1,
				),
				array(
					'key'   => 'field_producto_precio_desc',
					'label' => 'Precio descuento (opcional)',
					'name'  => 'precio_descuento',
					'type'  => 'number',
				),
				array(
					'key'   => 'field_producto_sku',
					'label' => 'SKU',
					'name'  => 'sku',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_producto_marca',
					'label' => 'Marca',
					'name'  => 'marca',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_producto_peso',
					'label' => 'Peso / unidad',
					'name'  => 'peso_o_unidad',
					'type'  => 'text',
				),
				array(
					'key'     => 'field_producto_stock',
					'label'   => 'Estado de stock',
					'name'    => 'stock_estado',
					'type'    => 'select',
					'choices' => array(
						'disponible'  => 'Disponible',
						'pocas'       => 'Pocas unidades',
						'agotado'     => 'Agotado',
					),
					'default_value' => 'disponible',
				),
				array(
					'key'   => 'field_producto_descripcion_corta',
					'label' => 'Descripcion corta',
					'name'  => 'descripcion_corta',
					'type'  => 'textarea',
					'rows'  => 3,
				),
				array(
					'key'        => 'field_producto_caract',
					'label'      => 'Caracteristicas',
					'name'       => 'caracteristicas',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_producto_caract_item',
							'label' => 'Item',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'   => 'field_producto_destacado',
					'label' => 'Producto destacado',
					'name'  => 'destacado',
					'type'  => 'true_false',
					'ui'    => 1,
				),
				array(
					'key'   => 'field_producto_color',
					'label' => 'Color SVG placeholder',
					'name'  => 'color_placeholder',
					'type'  => 'color_picker',
					'default_value' => '#2D8659',
				),
				array(
					'key'   => 'field_producto_icono',
					'label' => 'Icono SVG placeholder',
					'name'  => 'icono_slug',
					'type'  => 'text',
					'instructions' => 'Slug del icono SVG (en /assets/svg/icons/).',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'producto',
					),
				),
			),
		)
	);

	// Miembro fields.
	acf_add_local_field_group(
		array(
			'key'      => 'group_miembro',
			'title'    => 'Perfil del miembro',
			'fields'   => array(
				array(
					'key'      => 'field_miembro_cargo',
					'label'    => 'Cargo',
					'name'     => 'cargo',
					'type'     => 'text',
					'required' => 1,
				),
				array(
					'key'   => 'field_miembro_resumen',
					'label' => 'Resumen profesional',
					'name'  => 'resumen_profesional',
					'type'  => 'textarea',
					'rows'  => 5,
				),
				array(
					'key'        => 'field_miembro_especialidades',
					'label'      => 'Especialidades',
					'name'       => 'especialidades',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_miembro_especialidad_item',
							'label' => 'Especialidad',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'        => 'field_miembro_formacion',
					'label'      => 'Formacion',
					'name'       => 'formacion',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_miembro_formacion_item',
							'label' => 'Item',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'        => 'field_miembro_experiencia',
					'label'      => 'Experiencia simulada',
					'name'       => 'experiencia_simulada',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_miembro_experiencia_item',
							'label' => 'Item',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'        => 'field_miembro_areas',
					'label'      => 'Areas de trabajo',
					'name'       => 'areas_trabajo',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_miembro_areas_item',
							'label' => 'Area',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'   => 'field_miembro_registro',
					'label' => 'Registro profesional (ficticio)',
					'name'  => 'registro_ficticio',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_miembro_ilustracion',
					'label' => 'Ilustracion perfil (slug)',
					'name'  => 'ilustracion_slug',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'miembro',
					),
				),
			),
		)
	);

	// Plan fields.
	acf_add_local_field_group(
		array(
			'key'      => 'group_plan',
			'title'    => 'Datos del plan',
			'fields'   => array(
				array(
					'key'   => 'field_plan_precio',
					'label' => 'Precio referencial (CLP)',
					'name'  => 'precio_referencial',
					'type'  => 'number',
				),
				array(
					'key'     => 'field_plan_frecuencia',
					'label'   => 'Frecuencia',
					'name'    => 'frecuencia',
					'type'    => 'select',
					'choices' => array(
						'unico'   => 'Pago unico',
						'mensual' => 'Mensual',
						'anual'   => 'Anual',
					),
				),
				array(
					'key'   => 'field_plan_dirigido',
					'label' => 'Dirigido a',
					'name'  => 'dirigido_a',
					'type'  => 'text',
				),
				array(
					'key'        => 'field_plan_beneficios',
					'label'      => 'Beneficios',
					'name'       => 'beneficios',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_plan_beneficio_item',
							'label' => 'Beneficio',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'   => 'field_plan_destacado',
					'label' => 'Plan destacado',
					'name'  => 'destacado',
					'type'  => 'true_false',
					'ui'    => 1,
				),
				array(
					'key'   => 'field_plan_color',
					'label' => 'Color acento',
					'name'  => 'color_acento',
					'type'  => 'color_picker',
					'default_value' => '#2D8659',
				),
				array(
					'key'   => 'field_plan_icono',
					'label' => 'Icono (slug)',
					'name'  => 'icono_slug',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'plan',
					),
				),
			),
		)
	);

	// Testimonio fields.
	acf_add_local_field_group(
		array(
			'key'      => 'group_testimonio',
			'title'    => 'Datos del testimonio',
			'fields'   => array(
				array(
					'key'      => 'field_testimonio_autor',
					'label'    => 'Nombre del autor',
					'name'     => 'autor',
					'type'     => 'text',
					'required' => 1,
				),
				array(
					'key'   => 'field_testimonio_comuna',
					'label' => 'Comuna',
					'name'  => 'comuna',
					'type'  => 'text',
				),
				array(
					'key'     => 'field_testimonio_estrellas',
					'label'   => 'Estrellas',
					'name'    => 'estrellas',
					'type'    => 'select',
					'choices' => array(
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'default_value' => '5',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'testimonio',
					),
				),
			),
		)
	);

	// Landing fields.
	acf_add_local_field_group(
		array(
			'key'      => 'group_landing',
			'title'    => 'Landing page - contenido',
			'fields'   => array(
				array(
					'key'      => 'field_landing_titular',
					'label'    => 'Hero titular',
					'name'     => 'hero_titular',
					'type'     => 'text',
					'required' => 1,
				),
				array(
					'key'   => 'field_landing_subtitulo',
					'label' => 'Hero subtitulo',
					'name'  => 'hero_subtitulo',
					'type'  => 'textarea',
					'rows'  => 3,
				),
				array(
					'key'   => 'field_landing_ilustracion',
					'label' => 'Ilustracion hero (slug)',
					'name'  => 'hero_ilustracion_slug',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_landing_cta1_texto',
					'label' => 'CTA principal texto',
					'name'  => 'cta_principal_texto',
					'type'  => 'text',
					'default_value' => 'Llamar ahora',
				),
				array(
					'key'     => 'field_landing_cta1_tipo',
					'label'   => 'CTA principal tipo',
					'name'    => 'cta_principal_tipo',
					'type'    => 'select',
					'choices' => array(
						'telefono'  => 'Llamar (tel:)',
						'whatsapp'  => 'WhatsApp',
						'formulario'=> 'Scroll a formulario',
					),
					'default_value' => 'telefono',
				),
				array(
					'key'   => 'field_landing_cta2_texto',
					'label' => 'CTA secundario texto',
					'name'  => 'cta_secundario_texto',
					'type'  => 'text',
					'default_value' => 'Enviar WhatsApp',
				),
				array(
					'key'        => 'field_landing_trust',
					'label'      => 'Trust signals (numeros)',
					'name'       => 'trust_signals',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_landing_trust_num',
							'label' => 'Numero',
							'name'  => 'numero',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_landing_trust_label',
							'label' => 'Label',
							'name'  => 'label',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'        => 'field_landing_bullets',
					'label'      => 'Que incluye (bullets)',
					'name'       => 'bullets',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array(
							'key'   => 'field_landing_bullet_item',
							'label' => 'Bullet',
							'name'  => 'item',
							'type'  => 'text',
						),
					),
				),
				array(
					'key'        => 'field_landing_pasos',
					'label'      => 'Proceso / pasos',
					'name'       => 'proceso_pasos',
					'type'       => 'repeater',
					'layout'     => 'block',
					'sub_fields' => array(
						array(
							'key'   => 'field_landing_paso_titulo',
							'label' => 'Titulo',
							'name'  => 'titulo',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_landing_paso_desc',
							'label' => 'Descripcion',
							'name'  => 'descripcion',
							'type'  => 'textarea',
							'rows'  => 2,
						),
					),
				),
				array(
					'key'        => 'field_landing_faq',
					'label'      => 'FAQ items',
					'name'       => 'faq_items',
					'type'       => 'repeater',
					'layout'     => 'block',
					'sub_fields' => array(
						array(
							'key'   => 'field_landing_faq_q',
							'label' => 'Pregunta',
							'name'  => 'pregunta',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_landing_faq_a',
							'label' => 'Respuesta',
							'name'  => 'respuesta',
							'type'  => 'textarea',
							'rows'  => 3,
						),
					),
				),
				array(
					'key'   => 'field_landing_seo_content',
					'label' => 'Contenido SEO (abajo)',
					'name'  => 'seo_content_bottom',
					'type'  => 'wysiwyg',
					'instructions' => '800-1200 palabras de contenido SEO con headings H2/H3 para ranking organico.',
				),
				array(
					'key'   => 'field_landing_tracking',
					'label' => 'Tracking label (Google Ads)',
					'name'  => 'tracking_label',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'landing',
					),
				),
			),
		)
	);

	// Options page (datos generales).
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Datos generales de Perrito Feliz',
				'menu_title' => 'Datos generales',
				'menu_slug'  => 'perrito-opciones',
				'capability' => 'edit_posts',
				'icon_url'   => 'dashicons-admin-settings',
				'position'   => 3,
			)
		);

		acf_add_local_field_group(
			array(
				'key'      => 'group_opciones',
				'title'    => 'Datos de la empresa',
				'fields'   => array(
					array(
						'key'   => 'field_op_telefono',
						'label' => 'Telefono principal (formato visual)',
						'name'  => 'telefono_principal',
						'type'  => 'text',
						'default_value' => '+56 2 2987 4410',
					),
					array(
						'key'   => 'field_op_telefono_raw',
						'label' => 'Telefono (raw para tel:)',
						'name'  => 'telefono_principal_raw',
						'type'  => 'text',
						'default_value' => '+56229874410',
					),
					array(
						'key'   => 'field_op_whatsapp',
						'label' => 'WhatsApp (visual)',
						'name'  => 'whatsapp',
						'type'  => 'text',
						'default_value' => '+56 9 6612 8834',
					),
					array(
						'key'   => 'field_op_whatsapp_raw',
						'label' => 'WhatsApp raw',
						'name'  => 'whatsapp_raw',
						'type'  => 'text',
						'default_value' => '56966128834',
					),
					array(
						'key'   => 'field_op_email',
						'label' => 'Email',
						'name'  => 'email',
						'type'  => 'email',
						'default_value' => 'hola@perritofeliz.cl',
					),
					array(
						'key'   => 'field_op_email_urg',
						'label' => 'Email urgencias',
						'name'  => 'email_urgencias',
						'type'  => 'email',
						'default_value' => 'urgencias@perritofeliz.cl',
					),
					array(
						'key'   => 'field_op_direccion',
						'label' => 'Direccion',
						'name'  => 'direccion',
						'type'  => 'text',
						'default_value' => 'Av. Irarrazaval 2450, Nunoa, Santiago, Chile',
					),
					array(
						'key'   => 'field_op_horarios',
						'label' => 'Horarios',
						'name'  => 'horarios',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'   => 'field_op_banner_urg',
						'label' => 'Activar banner urgencia sticky',
						'name'  => 'banner_urgencia_activo',
						'type'  => 'true_false',
						'ui'    => 1,
						'default_value' => 1,
					),
					array(
						'key'   => 'field_op_mensaje_urg',
						'label' => 'Mensaje urgencia',
						'name'  => 'mensaje_urgencia',
						'type'  => 'text',
						'default_value' => 'Urgencia veterinaria 24/7. Ambulancia en comunas de Santiago.',
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'perrito-opciones',
						),
					),
				),
			)
		);
	}
}
add_action( 'acf/init', 'perrito_register_acf_fields' );
