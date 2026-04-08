<?php
/**
 * Seed: blog posts iniciales.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_blog() {
	$posts = array(
		array(
			'slug'  => 'senales-urgencia-veterinaria',
			'title' => 'Como saber si tu perro necesita atencion veterinaria urgente',
			'excerpt' => 'Aprende a identificar las senales de alerta que requieren una visita inmediata al veterinario antes de que sea demasiado tarde.',
			'content' => "<p>Los perros tienen una capacidad extraordinaria para ocultar el dolor. Es un instinto de supervivencia que puede hacer dificil detectar cuando algo anda mal. Por eso los tutores atentos marcan la diferencia.</p>\n\n<h2>Senales que requieren urgencia inmediata</h2>\n<ul><li><strong>Dificultad respiratoria:</strong> respiracion rapida, entrecortada o con la boca abierta en reposo.</li><li><strong>Debilidad extrema o colapso:</strong> si tu perro no puede levantarse o parece desorientado.</li><li><strong>Vomitos o diarrea con sangre.</strong></li><li><strong>Ingesta de toxicos:</strong> chocolate, uvas, cebolla, medicamentos humanos, plantas.</li><li><strong>Traumatismo o atropello</strong>, aun si parece estable.</li><li><strong>Convulsiones</strong>, incluso si son breves.</li><li><strong>Abdomen hinchado o doloroso.</strong></li><li><strong>Sangrado activo</strong> que no para.</li></ul>\n\n<h2>Como prepararte antes de la urgencia</h2>\n<p>Ten siempre a mano el telefono de tu veterinario de urgencias. En Perrito Feliz atendemos 24/7. Guarda el numero en tu telefono y sabe como llegar a nuestra clinica en Nunoa.</p>\n\n<h2>Que NO hacer</h2>\n<p>No le des medicamentos humanos a tu perro sin consulta veterinaria: muchos son toxicos. No esperes a que se le pase. No intentes remedios caseros para envenenamiento.</p>",
		),
		array(
			'slug'  => 'senales-dolor-gatos',
			'title' => 'Senales de dolor en gatos que muchos tutores no detectan',
			'excerpt' => 'Los gatos son expertos en esconder el dolor. Conoce las senales sutiles que indican que tu gato podria necesitar atencion veterinaria.',
			'content' => "<p>Los gatos son maestros ocultando molestias. A diferencia de los perros, rara vez muestran dolor de forma obvia. Por eso es crucial conocer las senales sutiles.</p>\n\n<h2>Cambios de comportamiento</h2>\n<p>Un gato que siempre fue carinoso y empieza a esconderse, o uno tranquilo que se vuelve agresivo al tocarlo, puede estar sufriendo. Otros signos: ronronear mas (si, ronronean por dolor), dormir en posiciones extranas, menos juego.</p>\n\n<h2>Senales fisicas sutiles</h2>\n<ul><li>Cojera o rigidez al levantarse.</li><li>Dificultad para saltar a lugares donde antes saltaba facil.</li><li>Cambio en la forma de acicalarse (mas o menos de lo normal).</li><li>Perdida de apetito o cambios en el consumo de agua.</li><li>Cambios en el uso de la caja de arena.</li><li>Mirada tensa, orejas hacia atras, bigotes rigidos.</li></ul>\n\n<h2>Cuando consultar</h2>\n<p>Si notas cualquiera de estos cambios por mas de 24-48 horas, es momento de una consulta veterinaria. En medicina felina, el Dr. Matias Leon se especializa en evaluaciones menos invasivas y mas amigables.</p>",
		),
		array(
			'slug'  => 'vacunas-esenciales-chile',
			'title' => 'Vacunas esenciales para perros y gatos en Chile',
			'excerpt' => 'Guia completa del calendario de vacunas recomendado por el Colegio Medico Veterinario de Chile para perros y gatos.',
			'content' => "<p>Las vacunas son una de las herramientas mas efectivas para proteger la salud de tu mascota. En Chile, existen vacunas obligatorias y recomendadas que todo tutor responsable deberia conocer.</p>\n\n<h2>Para perros</h2>\n<h3>Sextuple canina</h3><p>Protege contra distemper, hepatitis, parvovirus, parainfluenza y dos tipos de leptospirosis. Se administra en 3 dosis entre las 6 y 16 semanas.</p>\n<h3>Antirrabica</h3><p>Obligatoria por ley en Chile. Primera dosis desde los 3 meses, revacunacion anual.</p>\n<h3>Traqueobronquitis (tos de las perreras)</h3><p>Recomendada para perros que asisten a peluquerias, hoteles o parques.</p>\n\n<h2>Para gatos</h2>\n<h3>Triple felina</h3><p>Protege contra rinotraqueitis, calicivirus y panleucopenia. Se administra en 2-3 dosis entre las 8 y 16 semanas.</p>\n<h3>Leucemia felina</h3><p>Recomendada especialmente para gatos con acceso al exterior o hogares con varios gatos.</p>\n<h3>Antirrabica</h3><p>Tambien obligatoria en gatos segun normativa chilena.</p>\n\n<h2>Calendario resumido</h2><p>Llevamos un calendario claro para cada cachorro y gatito. El Plan Cachorro Feliz y Plan Gatito Seguro incluyen todas las vacunas en un pago integrado. Pregunta por el en nuestra clinica.</p>",
		),
		array(
			'slug'  => 'alimentacion-perros-senior',
			'title' => 'Alimentacion para perros senior: errores frecuentes',
			'excerpt' => 'A partir de los 7 anos las necesidades nutricionales cambian. Evita estos errores comunes y ayuda a tu perro a envejecer con calidad de vida.',
			'content' => "<p>Los perros senior (mayores de 7 anos en razas medianas y grandes, 9-10 anos en pequenas) tienen necesidades nutricionales muy distintas a las de un perro adulto joven. Estos son los errores mas frecuentes que vemos en consulta.</p>\n\n<h2>Error 1: seguir dandole alimento adulto</h2><p>Los alimentos senior estan formulados con menos grasa, mas proteina de alta calidad, mas fibra y suplementos articulares. Marcan la diferencia.</p>\n\n<h2>Error 2: no adaptar porciones</h2><p>El metabolismo baja con la edad. Mantener las mismas porciones genera sobrepeso, lo que agrava problemas articulares y cardiacos.</p>\n\n<h2>Error 3: ignorar la hidratacion</h2><p>Los perros mayores tienden a beber menos. Considera agregar alimento humedo o hidratar el seco para aumentar el consumo de agua.</p>\n\n<h2>Error 4: no suplementar cuando hace falta</h2><p>Glucosamina, condroitina, omega 3 y antioxidantes pueden mejorar notablemente la calidad de vida. Pero siempre bajo indicacion veterinaria.</p>\n\n<h2>Error 5: no controlar el peso regularmente</h2><p>Pesamos a cada paciente senior en cada visita. Es la mejor forma de detectar cambios tempranos.</p>\n\n<h2>Nuestro Plan Senior Contigo</h2><p>Incluye evaluacion nutricional completa, plan de alimentacion personalizado y seguimiento cada 4 meses. Pregunta por el en nuestra clinica.</p>",
		),
		array(
			'slug'  => 'cuidados-post-esterilizacion',
			'title' => 'Cuidados despues de la esterilizacion de tu mascota',
			'excerpt' => 'Guia completa de los cuidados postoperatorios despues de la esterilizacion. Lo que debes hacer y lo que debes evitar.',
			'content' => "<p>La esterilizacion es una cirugia rutinaria pero requiere cuidados post operatorios atentos para asegurar una recuperacion optima. Esta guia te ayudara a saber que hacer en los dias siguientes.</p>\n\n<h2>Los primeros dias</h2><p>Tu mascota volvera a casa algo somnolienta por los efectos de la anestesia. Es normal. Offrecele un lugar tranquilo, tibio y sin saltos ni escaleras.</p>\n\n<h2>Cuidados de la herida</h2><ul><li>Mantenla limpia y seca.</li><li>Revisala 1-2 veces al dia buscando enrojecimiento, hinchazon o secrecion.</li><li>Usa collar isabelino o camiseta quirurgica para evitar lamido.</li><li>No banes a tu mascota hasta el retiro de puntos.</li></ul>\n\n<h2>Medicacion</h2><p>Administra los analgesicos y antibioticos exactamente segun lo indicado. No dejes de darlos aunque parezca recuperado.</p>\n\n<h2>Alimentacion</h2><p>La primera noche ofrece solo media racion. A partir del dia siguiente puede comer normal. Asegurate de que tenga agua fresca disponible.</p>\n\n<h2>Cuando llamar al veterinario</h2><ul><li>Si no come por mas de 24 horas.</li><li>Si vomita persistentemente.</li><li>Si la herida sangra o se ve infectada.</li><li>Si esta muy decaido despues de 48 horas.</li><li>Si no orina o defeca en 48 horas.</li></ul>\n\n<h2>Control postoperatorio</h2><p>A los 7-10 dias venimos a retirar puntos (si no son reabsorbibles) y a evaluar la cicatrizacion. Ya estara listo para volver a su vida normal.</p>",
		),
	);

	foreach ( $posts as $p ) {
		$existing = get_page_by_path( $p['slug'], OBJECT, 'post' );
		if ( $existing ) {
			continue;
		}
		wp_insert_post( array(
			'post_type'    => 'post',
			'post_status'  => 'publish',
			'post_name'    => $p['slug'],
			'post_title'   => $p['title'],
			'post_excerpt' => $p['excerpt'],
			'post_content' => $p['content'],
		) );
	}
}
