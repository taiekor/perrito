<?php
/**
 * Seed: productos de la tienda.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_productos() {
	$productos = array(
		// Alimentos
		array( 'alimento-premium-perro-adulto-15kg', 'Alimento premium perro adulto 15kg', 'Nutrición balanceada para perros adultos. Proteína de cordero y arroz, sin colorantes ni conservantes artificiales.', 'VetLine', 34990, 29990, true, 'alimentos', array( 'perro' ), '#2D8659', 'prod-alimento', '15 kg' ),
		array( 'alimento-premium-gato-adulto-8kg', 'Alimento premium gato adulto 8kg', 'Formulado para el pelaje, la salud urinaria y el peso ideal del gato adulto indoor.', 'VetLine', 28990, 0, true, 'alimentos', array( 'gato' ), '#4FA577', 'prod-alimento', '8 kg' ),
		array( 'alimento-puppy-cachorro-12kg', 'Alimento puppy cachorro 12kg', 'Alto en proteínas y calcio para el crecimiento sano de cachorros en sus primeros meses.', 'VetLine', 32990, 0, false, 'alimentos', array( 'perro' ), '#E97B3F', 'prod-alimento', '12 kg' ),
		array( 'alimento-kitten-6kg', 'Alimento kitten 6kg', 'Para gatitos en crecimiento. Rico en DHA, taurina y proteína para desarrollo cerebral y muscular.', 'VetLine', 24990, 0, false, 'alimentos', array( 'gato' ), '#E97B3F', 'prod-alimento', '6 kg' ),
		array( 'dieta-renal-perro-7kg', 'Dieta veterinaria renal perro 7kg', 'Dieta veterinaria para perros con insuficiencia renal crónica. Bajo fósforo y proteína controlada.', 'Royal Vet', 44990, 0, false, 'alimentos', array( 'perro' ), '#1A2E3D', 'prod-alimento', '7 kg' ),
		array( 'dieta-gastrointestinal-perro-5kg', 'Dieta gastrointestinal perro 5kg', 'Dieta veterinaria para trastornos digestivos. Alta digestibilidad y fibras moderadas.', 'Royal Vet', 38990, 35990, false, 'alimentos', array( 'perro' ), '#1A2E3D', 'prod-alimento', '5 kg' ),
		array( 'snacks-funcionales-perros', 'Snacks funcionales perros', 'Premios naturales con colágeno y condroitina para el cuidado articular de perros activos.', 'NaturePaw', 8990, 0, false, 'alimentos', array( 'perro' ), '#E97B3F', 'prod-alimento', '200 g' ),

		// Farmacia
		array( 'antiparasitario-externo-spot', 'Antiparasitario externo spot-on', 'Protección efectiva contra pulgas, garrapatas y mosquitos por hasta 4 semanas.', 'VetPro', 14990, 0, true, 'farmacia', array( 'perro', 'gato' ), '#D8352A', 'prod-farmacia', 'Monodosis' ),
		array( 'desparasitante-interno', 'Desparasitante interno comprimidos', 'Para el control de parásitos intestinales. Para perros y gatos de todas las edades.', 'VetPro', 7990, 0, false, 'farmacia', array( 'perro', 'gato' ), '#D8352A', 'prod-farmacia', '4 comprimidos' ),
		array( 'suplemento-articular-glucosamina', 'Suplemento articular glucosamina', 'Condroitina + glucosamina + MSM para el cuidado de articulaciones de perros senior y activos.', 'NaturePaw', 19990, 17990, false, 'farmacia', array( 'perro' ), '#2D8659', 'prod-farmacia', '60 tabletas' ),
		array( 'probiotico-digestivo', 'Probiótico digestivo', 'Restauración de la flora intestinal en casos de diarrea o uso prolongado de antibióticos.', 'VetPro', 12990, 0, false, 'farmacia', array( 'perro', 'gato' ), '#2D8659', 'prod-farmacia', '30 g' ),
		array( 'shampoo-medicado-dermatologico', 'Shampoo medicado dermatológico', 'Para pieles sensibles, alergias y dermatitis. Con avena coloidal y clorhexidina.', 'DermaVet', 11990, 0, false, 'farmacia', array( 'perro', 'gato' ), '#4FA577', 'prod-farmacia', '250 ml' ),
		array( 'limpiador-otico', 'Limpiador ótico suave', 'Solución para la higiene regular de oídos en perros y gatos. Sin alcohol.', 'DermaVet', 8990, 0, false, 'farmacia', array( 'perro', 'gato' ), '#4FA577', 'prod-farmacia', '120 ml' ),

		// Accesorios
		array( 'arnes-antitiron-talla-m', 'Arnés antitirón talla M', 'Arnés ergonómico con puntos reflectantes para caminatas seguras. Talla M (10-20kg).', 'WalkSafe', 19990, 0, true, 'accesorios', array( 'perro' ), '#1A2E3D', 'prod-accesorio', 'Talla M' ),
		array( 'collar-identificacion', 'Collar con placa de identificación', 'Collar de nylon resistente con placa personalizable para el nombre y teléfono del tutor.', 'WalkSafe', 12990, 0, false, 'accesorios', array( 'perro', 'gato' ), '#1A2E3D', 'prod-accesorio', 'Ajustable' ),
		array( 'transportadora-plegable', 'Transportadora plegable', 'Transportadora resistente con ventilación y cierre seguro. Aprobada para aerolíneas nacionales.', 'TravelPet', 34990, 0, false, 'accesorios', array( 'perro', 'gato' ), '#3F5566', 'prod-accesorio', 'Mediana' ),
		array( 'cama-ortopedica-grande', 'Cama ortopédica grande', 'Cama con espuma memory foam para perros grandes y senior. Funda lavable.', 'CozyPet', 49990, 42990, false, 'accesorios', array( 'perro' ), '#E97B3F', 'prod-accesorio', '90x70cm' ),
		array( 'caja-arena-antiolores', 'Caja de arena antiolores', 'Caja con filtro de carbón y tapa removible. Diseño que contiene olores y arena.', 'CozyPet', 29990, 0, false, 'accesorios', array( 'gato' ), '#4FA577', 'prod-accesorio', '50x40cm' ),

		// Juguetes
		array( 'pelota-interactiva-dispensadora', 'Pelota interactiva dispensadora', 'Pelota con compartimento para premios. Estimulación mental y juego autónomo.', 'PlayPup', 9990, 0, true, 'juguetes', array( 'perro' ), '#E97B3F', 'prod-juguete', 'Unidad' ),
		array( 'mordedor-resistente-kong', 'Mordedor resistente', 'Mordedor de goma natural resistente para masticadores fuertes. Con hueco para rellenar.', 'PlayPup', 14990, 0, false, 'juguetes', array( 'perro' ), '#E97B3F', 'prod-juguete', 'Talla M' ),
		array( 'rascador-gatos-vertical', 'Rascador vertical para gatos', 'Poste vertical con sisal natural y plataforma superior. Altura 80cm.', 'CatTower', 24990, 0, false, 'juguetes', array( 'gato' ), '#4FA577', 'prod-juguete', '80 cm' ),
		array( 'raton-catnip', 'Ratón con catnip', 'Juguete clásico con catnip natural. Estimula el juego y el ejercicio.', 'CatTower', 3990, 0, false, 'juguetes', array( 'gato' ), '#4FA577', 'prod-juguete', '3 unidades' ),

		// Ropa
		array( 'parka-invierno-talla-m', 'Parka de invierno talla M', 'Parka impermeable con forro polar para el frío de Santiago. Ideal para paseos invernales.', 'WarmPet', 22990, 19990, false, 'ropa', array( 'perro' ), '#6B8293', 'prod-ropa', 'Talla M' ),
		array( 'impermeable-talla-s', 'Impermeable talla S', 'Capa impermeable ligera para días lluviosos. Ajuste seguro y cola incluida.', 'WarmPet', 14990, 0, false, 'ropa', array( 'perro' ), '#6B8293', 'prod-ropa', 'Talla S' ),
		array( 'botitas-proteccion-pack-4', 'Botitas de protección pack x4', 'Botitas de neopreno con suela antideslizante. Protección del pavimento caliente o frío.', 'WarmPet', 11990, 0, false, 'ropa', array( 'perro' ), '#6B8293', 'prod-ropa', 'Pack 4' ),

		// Higiene
		array( 'arena-aglutinante-10kg', 'Arena aglutinante 10kg', 'Arena sanitaria aglutinante con alto poder absorbente y control de olor.', 'CleanCat', 14990, 0, true, 'higiene', array( 'gato' ), '#4FA577', 'prod-higiene', '10 kg' ),
		array( 'toallitas-humedas-pet', 'Toallitas húmedas pet', 'Toallitas desmaquillantes y limpiadoras para el día a día. Con aloe vera.', 'CleanCat', 5990, 0, false, 'higiene', array( 'perro', 'gato' ), '#4FA577', 'prod-higiene', '80 un' ),
		array( 'cepillo-deslanador', 'Cepillo deslanador', 'Cepillo undercoat para reducir la muda. Elimina pelo suelto sin dañar la piel.', 'BrushMe', 13990, 11990, false, 'higiene', array( 'perro', 'gato' ), '#6B8293', 'prod-higiene', 'Unidad' ),
		array( 'cortauñas-profesional', 'Cortaúñas profesional', 'Cortaúñas con protector y guía de seguridad para evitar cortes excesivos.', 'BrushMe', 8990, 0, false, 'higiene', array( 'perro', 'gato' ), '#6B8293', 'prod-higiene', 'Unidad' ),
	);

	foreach ( $productos as $p ) {
		list( $slug, $title, $desc, $marca, $precio, $desc_precio, $destacado, $cat, $especies, $color, $icono, $peso ) = $p;

		$existing = get_page_by_path( $slug, OBJECT, 'producto' );
		if ( $existing ) {
			continue;
		}

		$id = wp_insert_post( array(
			'post_type'    => 'producto',
			'post_status'  => 'publish',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_excerpt' => $desc,
			'post_content' => '<p>' . esc_html( $desc ) . '</p><p>Producto seleccionado y recomendado por el equipo veterinario de Perrito Feliz.</p>',
		) );

		if ( ! is_wp_error( $id ) && $id ) {
			perrito_seed_fields( $id, array(
				'precio'            => $precio,
				'precio_descuento'  => $desc_precio,
				'sku'               => strtoupper( substr( md5( $slug ), 0, 8 ) ),
				'marca'             => $marca,
				'peso_o_unidad'     => $peso,
				'stock_estado'      => 'disponible',
				'descripcion_corta' => $desc,
				'destacado'         => $destacado ? 1 : 0,
				'color_placeholder' => $color,
				'icono_slug'        => $icono,
				'caracteristicas'   => array(
					array( 'item' => 'Recomendado por veterinarios' ),
					array( 'item' => 'Envío en Santiago' ),
					array( 'item' => 'Garantía de satisfacción' ),
				),
			) );
			wp_set_object_terms( $id, array( $cat ), 'producto_categoria' );
			wp_set_object_terms( $id, $especies, 'producto_especie' );
		}
	}
}
