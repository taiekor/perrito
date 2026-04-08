<?php
/**
 * Seed: 4 landing pages para Google Ads.
 *
 * @package PerritoFeliz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function perrito_seed_landings() {
	$landings = perrito_landings_data();
	foreach ( $landings as $l ) {
		$existing = get_page_by_path( $l['slug'], OBJECT, 'landing' );
		if ( $existing ) {
			continue;
		}
		$id = wp_insert_post( array(
			'post_type'    => 'landing',
			'post_status'  => 'publish',
			'post_name'    => $l['slug'],
			'post_title'   => $l['title'],
			'post_excerpt' => $l['excerpt'],
			'post_content' => $l['content'],
		) );
		if ( ! is_wp_error( $id ) && $id ) {
			perrito_seed_fields( $id, $l['fields'] );
		}
	}
}

function perrito_landings_data() {
	return array(
		perrito_landing_ambulancia(),
		perrito_landing_urgencias(),
		perrito_landing_esterilizacion(),
		perrito_landing_cachorro(),
	);
}

function perrito_landing_cachorro() {
	return array(
		'slug'    => 'plan-cachorro-vacunas-alimento',
		'title'   => 'Plan Cachorro: Vacunas + Alimento + Control',
		'excerpt' => 'Plan integral para cachorros en Nunoa. Vacunas, desparasitacion, control medico, revision nutricional y descuentos en alimentos premium. Todo en un solo pago.',
		'content' => '',
		'fields'  => array(
			'hero_titular' => 'Plan Cachorro: Vacunas + Alimento + Control Incluidos',
			'hero_subtitulo' => 'Todo lo que necesita tu cachorro en sus primeros meses, en un solo plan. Vacunas, desparasitacion, nutricion, acompanamiento y descuentos exclusivos.',
			'hero_ilustracion_slug' => 'hero-cachorro',
			'cta_principal_texto' => 'Reservar plan cachorro',
			'cta_principal_tipo' => 'whatsapp',
			'cta_secundario_texto' => 'Llamar a la clinica',
			'tracking_label' => 'ads_cachorro',
			'trust_signals' => array(
				array( 'numero' => '6500+', 'label' => 'Cachorros atendidos' ),
				array( 'numero' => '$69.990', 'label' => 'Pago unico' ),
				array( 'numero' => '6', 'label' => 'Beneficios incluidos' ),
				array( 'numero' => '4.9', 'label' => 'Rating Google' ),
			),
			'bullets' => array(
				array( 'item' => 'Primera consulta medica completa con ficha digital' ),
				array( 'item' => 'Calendario de vacunas completo (triple, sextuple, antirrabica)' ),
				array( 'item' => 'Desparasitacion interna y externa' ),
				array( 'item' => 'Revision y plan nutricional personalizado' ),
				array( 'item' => 'Guia de adaptacion en casa y entrenamiento basico' ),
				array( 'item' => 'Descuento de 20% en primera peluqueria' ),
				array( 'item' => 'Descuento especial en alimentos premium puppy' ),
				array( 'item' => '3 controles medicos durante los 6 primeros meses' ),
			),
			'proceso_pasos' => array(
				array( 'titulo' => 'Reserva tu plan', 'descripcion' => 'Escribenos por WhatsApp o llamanos para confirmar la primera cita y activar el plan.' ),
				array( 'titulo' => 'Primera consulta', 'descripcion' => 'Evaluacion completa, plan de vacunas personalizado, primera desparasitacion y revision nutricional.' ),
				array( 'titulo' => 'Seguimiento programado', 'descripcion' => 'Te recordamos las siguientes vacunas y controles segun el calendario de tu cachorro.' ),
				array( 'titulo' => 'Acompanamiento continuo', 'descripcion' => 'Guia, consejos y apoyo durante los primeros meses. Siempre disponibles para resolver dudas.' ),
			),
			'faq_items' => array(
				array( 'pregunta' => 'Desde que edad puedo tomar el plan?', 'respuesta' => 'El plan esta disenado para cachorros entre 0 y 6 meses de edad. Lo ideal es comenzar a partir de los 45 dias de vida con el calendario de vacunas.' ),
				array( 'pregunta' => 'Que vacunas incluye?', 'respuesta' => 'Incluye el calendario completo: primera triple o sextuple, refuerzos correspondientes y la vacuna antirrabica. Tambien desparasitacion interna y externa segun edad.' ),
				array( 'pregunta' => 'Cuanto cuesta el plan?', 'respuesta' => 'El Plan Cachorro Feliz tiene un valor unico de $69.990 y cubre todo lo descrito. Es mucho mas economico que pagar cada consulta y vacuna por separado.' ),
				array( 'pregunta' => 'Sirve tanto para perros como gatos?', 'respuesta' => 'El Plan Cachorro Feliz esta orientado a perros. Para gatitos tenemos el Plan Gatito Seguro con beneficios equivalentes adaptados a medicina felina.' ),
				array( 'pregunta' => 'Que pasa si mi cachorro se enferma?', 'respuesta' => 'Si tu cachorro se enferma dentro del periodo del plan, te atendemos con prioridad y te hacemos descuento en las consultas adicionales y tratamientos requeridos.' ),
			),
			'seo_content_bottom' => '<h2>Plan cachorro completo: todo lo que necesita en sus primeros meses</h2><p>Los primeros meses son criticos en la vida de un cachorro. Es cuando se forma su sistema inmunologico, su comportamiento social y sus habitos de vida. En Perrito Feliz creamos un plan integral que cubre todos los aspectos esenciales en un solo pago conveniente.</p><h2>Por que un plan cachorro y no consultas sueltas</h2><p>Cuando sumas todo lo que un cachorro necesita en sus primeros meses (consulta inicial, calendario de vacunas completo, desparasitaciones, controles, asesoria nutricional) el costo puede ser significativo. Nuestro plan reune todo esto en un precio integrado, ademas de incluir descuentos exclusivos y seguimiento personalizado.</p><h2>Que incluye el Plan Cachorro Feliz</h2><h3>Primera consulta veterinaria completa</h3><p>Evaluacion general de salud, revision fisica, peso, dentadura, mucosas y signos vitales. Abrimos ficha clinica digital y planificamos todo el primer ano de cuidados.</p><h3>Calendario de vacunas</h3><p>Las vacunas son una inversion en salud. Cubrimos el calendario completo recomendado para cachorros en Chile: triple o sextuple canina, refuerzos correspondientes y antirrabica obligatoria.</p><h3>Desparasitacion</h3><p>Tratamiento interno contra parasitos intestinales y externo contra pulgas y garrapatas. Protegemos a tu cachorro desde el primer momento.</p><h3>Revision nutricional personalizada</h3><p>Recomendamos el mejor alimento segun la raza, tamano adulto esperado y condicion de tu cachorro. Ademas te explicamos las porciones, frecuencia y transicion.</p><h3>Guia de adaptacion en casa</h3><p>Te entregamos tips de entrenamiento basico, socializacion, manejo del llanto nocturno, control de estres del nuevo hogar y primeros pasos con el bano y el paseo.</p><h2>Cuidados esenciales para un cachorro sano</h2><h3>Alimentacion puppy</h3><p>Los cachorros necesitan alimentos formulados especificamente para su etapa: alta proteina, DHA para desarrollo cerebral, calcio para huesos en crecimiento. No uses alimento de adulto.</p><h3>Socializacion temprana</h3><p>Entre los 3 y 14 semanas es el periodo critico de socializacion. Expon a tu cachorro a personas, animales, sonidos y ambientes diversos de forma positiva.</p><h3>Rutina de higiene</h3><p>Ensena desde chico las rutinas: bano, cepillado, corte de unas. Lo haras mas cooperativo cuando sea adulto.</p><h3>Ejercicio adecuado</h3><p>Los cachorros tienen energia pero sus huesos aun estan en crecimiento. Juegos cortos, paseos suaves, nada de saltos o escaleras excesivas hasta los 8-12 meses.</p><h2>Reserva tu plan cachorro</h2><p>Escribenos por WhatsApp al <strong>+56 9 6612 8834</strong> o llamanos al +56 2 2987 4410. Agendamos tu primera consulta y comenzamos el plan de inmediato. Tu cachorro merece el mejor comienzo.</p>',
		),
	);
}

function perrito_landing_esterilizacion() {
	return array(
		'slug'    => 'esterilizacion-perros-gatos',
		'title'   => 'Esterilizacion Perros y Gatos Nunoa',
		'excerpt' => 'Esterilizacion y castracion de perros y gatos en Nunoa. Cirugia segura, protocolo analgesico, seguimiento postoperatorio. Precio desde $85.000.',
		'content' => '',
		'fields'  => array(
			'hero_titular' => 'Esterilizacion de Perros y Gatos en Nunoa',
			'hero_subtitulo' => 'Cirugia segura con evaluacion preanestesica, monitorizacion completa y protocolo analgesico. Recuperacion comoda y seguimiento incluido. Precios transparentes.',
			'hero_ilustracion_slug' => 'hero-esterilizacion',
			'cta_principal_texto' => 'Cotizar ahora',
			'cta_principal_tipo' => 'whatsapp',
			'cta_secundario_texto' => 'Llamar a la clinica',
			'tracking_label' => 'ads_esterilizacion',
			'trust_signals' => array(
				array( 'numero' => '3200+', 'label' => 'Cirugias realizadas' ),
				array( 'numero' => '100%', 'label' => 'Pabellon propio' ),
				array( 'numero' => '4.9', 'label' => 'Estrellas Google' ),
				array( 'numero' => '24h', 'label' => 'Seguimiento post' ),
			),
			'bullets' => array(
				array( 'item' => 'Evaluacion preanestesica completa' ),
				array( 'item' => 'Examenes previos segun edad y riesgo' ),
				array( 'item' => 'Protocolo anestesico personalizado' ),
				array( 'item' => 'Monitorizacion intraoperatoria continua' ),
				array( 'item' => 'Manejo del dolor perioperatorio' ),
				array( 'item' => 'Recuperacion supervisada por equipo' ),
				array( 'item' => 'Alta con indicaciones claras por escrito' ),
				array( 'item' => 'Control postoperatorio incluido' ),
			),
			'proceso_pasos' => array(
				array( 'titulo' => 'Cotizacion transparente', 'descripcion' => 'Te damos el valor exacto sin sorpresas segun el tipo de cirugia y el tamano de tu mascota.' ),
				array( 'titulo' => 'Evaluacion prequirurgica', 'descripcion' => 'Consulta medica completa con examenes si es necesario para asegurar una cirugia segura.' ),
				array( 'titulo' => 'Cirugia con protocolo completo', 'descripcion' => 'Anestesia monitorizada, equipo calificado y manejo del dolor durante toda la intervencion.' ),
				array( 'titulo' => 'Recuperacion y seguimiento', 'descripcion' => 'Alta con instrucciones detalladas y control postoperatorio para asegurar la recuperacion optima.' ),
			),
			'faq_items' => array(
				array( 'pregunta' => 'Cuanto cuesta la esterilizacion?', 'respuesta' => 'La esterilizacion de gatas comienza en $85.000, gatos en $65.000, perras desde $120.000 segun tamano, y perros desde $95.000. Incluye cirugia, anestesia, hospitalizacion del dia y control postoperatorio.' ),
				array( 'pregunta' => 'Cuanto dura la cirugia?', 'respuesta' => 'Depende del procedimiento y tamano. Una gata toma aproximadamente 30-45 minutos, una perra grande puede tomar 60-90 minutos. Los machos son mas rapidos.' ),
				array( 'pregunta' => 'Como es la recuperacion?', 'respuesta' => 'Tu mascota queda en observacion unas horas post cirugia y vuelve a casa el mismo dia con analgesicos. La recuperacion completa toma 10-14 dias con reposo relativo.' ),
				array( 'pregunta' => 'Mi mascota necesita examenes previos?', 'respuesta' => 'Para pacientes jovenes y sanos, evaluacion clinica basica. Para mayores de 7 anos o con antecedentes, recomendamos examenes de sangre prequirurgicos para cirugia mas segura.' ),
				array( 'pregunta' => 'A que edad se puede esterilizar?', 'respuesta' => 'Recomendamos entre los 4-6 meses en gatos y 6-8 meses en perros, antes del primer celo. Pero podemos hacerlo a cualquier edad con evaluacion previa.' ),
			),
			'seo_content_bottom' => '<h2>Esterilizacion de perros y gatos en Nunoa</h2><p>La esterilizacion es uno de los cuidados mas importantes que puedes dar a tu mascota. En Perrito Feliz realizamos cirugias seguras con protocolo completo, pabellon propio y seguimiento incluido.</p><h2>Por que esterilizar a tu mascota</h2><p>La esterilizacion no es solo una medida para evitar camadas no deseadas. Tiene beneficios importantes para la salud y bienestar de tu mascota:</p><ul><li><strong>Previene enfermedades graves:</strong> reduce drasticamente el riesgo de tumores mamarios, piometra (infeccion uterina), cancer testicular y problemas prostaticos.</li><li><strong>Mejora el comportamiento:</strong> reduce escapadas, peleas, marcacion territorial y comportamientos asociados al celo.</li><li><strong>Prolonga la vida:</strong> los estudios muestran que mascotas esterilizadas viven en promedio mas anos que las no esterilizadas.</li><li><strong>Control poblacional responsable:</strong> contribuye a reducir el numero de mascotas abandonadas en Santiago.</li></ul><h2>Nuestro protocolo quirurgico</h2><h3>Evaluacion prequirurgica</h3><p>Antes de cualquier cirugia realizamos una consulta medica completa para asegurar que tu mascota esta en condiciones optimas. En pacientes mayores o con antecedentes pedimos examenes de sangre prequirurgicos.</p><h3>Anestesia balanceada</h3><p>Usamos protocolos de anestesia balanceada personalizados segun edad, peso, raza y condicion del paciente. Incluye premedicacion, induccion y mantenimiento con monitoreo continuo.</p><h3>Manejo del dolor</h3><p>El manejo del dolor es una prioridad. Usamos protocolos analgesicos preventivos, intraoperatorios y postoperatorios para asegurar comodidad maxima.</p><h3>Recuperacion supervisada</h3><p>Tu mascota permanece en recuperacion con el equipo hasta que esta completamente despierta. Luego va a casa con instrucciones claras y medicacion.</p><h2>Cuidados postoperatorios</h2><p>La recuperacion completa toma entre 10 y 14 dias. En ese tiempo es importante:</p><ul><li>Limitar el ejercicio y saltos.</li><li>Mantener la herida limpia y seca.</li><li>Usar collar isabelino para evitar lamido.</li><li>Administrar los analgesicos segun lo indicado.</li><li>Traer a control a los 7-10 dias para retiro de puntos.</li></ul><h2>Cotiza tu cirugia</h2><p>Escribenos por WhatsApp al <strong>+56 9 6612 8834</strong> con el peso aproximado y edad de tu mascota. Te damos la cotizacion inmediata y agendamos la cirugia segun tu disponibilidad.</p>',
		),
	);
}

function perrito_landing_urgencias() {
	return array(
		'slug'    => 'urgencias-veterinarias-santiago',
		'title'   => 'Urgencias Veterinarias Santiago',
		'excerpt' => 'Urgencias veterinarias 24/7 en Nunoa, Santiago. Triage inmediato, estabilizacion y atencion por medicos especialistas. Vomitos, traumas, intoxicaciones, convulsiones.',
		'content' => '',
		'fields'  => array(
			'hero_titular' => 'Urgencias Veterinarias - Atendemos Ya',
			'hero_subtitulo' => 'Clinica veterinaria 24/7 en Nunoa. Triage inmediato, estabilizacion y atencion por medicos especialistas. Si tu mascota esta mal, no esperes.',
			'hero_ilustracion_slug' => 'hero-urgencia',
			'cta_principal_texto' => 'Llamar urgencia',
			'cta_principal_tipo' => 'telefono',
			'cta_secundario_texto' => 'WhatsApp',
			'tracking_label' => 'ads_urgencias',
			'trust_signals' => array(
				array( 'numero' => '24/7', 'label' => 'Abiertos siempre' ),
				array( 'numero' => '18000+', 'label' => 'Consultas atendidas' ),
				array( 'numero' => '4.9', 'label' => 'Rating Google' ),
				array( 'numero' => '10+ anos', 'label' => 'En Nunoa' ),
			),
			'bullets' => array(
				array( 'item' => 'Atencion inmediata al llegar (triage)' ),
				array( 'item' => 'Estabilizacion primaria con equipo completo' ),
				array( 'item' => 'Examenes prioritarios en la clinica' ),
				array( 'item' => 'Hospitalizacion si el caso lo requiere' ),
				array( 'item' => 'Comunicacion clara con el tutor desde el primer minuto' ),
				array( 'item' => 'Medicos especialistas en urgencias disponibles' ),
				array( 'item' => 'Pabellon quirurgico preparado para emergencias' ),
				array( 'item' => 'Seguimiento post-urgencia' ),
			),
			'proceso_pasos' => array(
				array( 'titulo' => 'Llamanos antes de salir', 'descripcion' => 'Con una llamada evaluamos la situacion y preparamos todo para recibir a tu mascota sin demoras.' ),
				array( 'titulo' => 'Triage al llegar', 'descripcion' => 'Categorizacion inmediata de la gravedad para priorizar atencion y decidir el protocolo.' ),
				array( 'titulo' => 'Estabilizacion y diagnostico', 'descripcion' => 'Trabajamos en paralelo: estabilizar signos vitales y realizar los examenes esenciales.' ),
				array( 'titulo' => 'Plan y comunicacion', 'descripcion' => 'Te explicamos que esta pasando, que opciones tenemos y coordinamos los siguientes pasos contigo.' ),
			),
			'faq_items' => array(
				array( 'pregunta' => 'Cuando es una urgencia veterinaria real?', 'respuesta' => 'Son urgencias reales: vomitos o diarrea severa, convulsiones, traumatismos, atropellos, intoxicaciones, dificultad respiratoria, hemorragias, dolor agudo, decaimiento severo, reacciones alergicas intensas y obstrucciones urinarias.' ),
				array( 'pregunta' => 'Necesito agendar hora?', 'respuesta' => 'No. Las urgencias se atienden de inmediato segun gravedad. Aun asi, te recomendamos llamarnos antes de salir para avisarnos que vas en camino y preparar el equipo.' ),
				array( 'pregunta' => 'Cuanto cuesta una urgencia?', 'respuesta' => 'La consulta de urgencia tiene un valor base de $38.000. A eso se suman los examenes y procedimientos que sean necesarios segun el caso. Siempre te explicamos antes para que sepas los costos.' ),
				array( 'pregunta' => 'Atienden urgencias de gatos?', 'respuesta' => 'Si, tenemos un medico veterinario especialista en medicina felina que atiende urgencias con protocolos menos invasivos y mas amigables para gatos sensibles.' ),
				array( 'pregunta' => 'Puedo llegar sin avisar?', 'respuesta' => 'Si, puedes llegar directamente. Pero si es posible llamarnos antes, prepararemos mejor la atencion y ganaremos tiempo critico.' ),
			),
			'seo_content_bottom' => '<h2>Urgencias veterinarias 24 horas en Nunoa, Santiago</h2><p>Nuestro servicio de urgencias veterinarias funciona las 24 horas del dia, los 7 dias de la semana. Estamos ubicados en Av. Irarrazaval 2450, Nunoa, con acceso facil desde las principales comunas del centro y oriente de Santiago.</p><h2>Que hacer en una urgencia veterinaria</h2><p>Si tu mascota esta mal, el tiempo es critico. Aqui algunas recomendaciones antes de venir:</p><ul><li>Llamanos primero. Asi preparamos la atencion.</li><li>No le des medicamentos humanos.</li><li>No le des comida ni agua sin indicacion.</li><li>Si hay sangrado, aplica presion suave con pano limpio.</li><li>Si es una intoxicacion, trae el envase del producto.</li><li>Manten a tu mascota tibia y en un lugar seguro.</li></ul><h2>Las urgencias veterinarias mas comunes</h2><h3>Vomitos y diarrea severa</h3><p>La gastroenteritis aguda puede deshidratar a tu mascota rapido. Si hay sangre, debilidad o mas de 3-4 episodios en pocas horas, es urgencia.</p><h3>Convulsiones y problemas neurologicos</h3><p>Una convulsion requiere evaluacion inmediata. Aunque termine sola, hay que descartar causas serias como toxicos, tumores o epilepsia.</p><h3>Traumatismos y atropellos</h3><p>Aunque tu mascota parezca estable, los danos internos son comunes. Siempre es urgencia.</p><h3>Intoxicaciones</h3><p>Productos de limpieza, chocolate, uvas, cebolla, medicamentos humanos, plantas toxicas. Trae el envase si puedes identificar la sustancia.</p><h3>Dificultad respiratoria</h3><p>Respiracion agitada, encias azuladas o pegadas, tos persistente. Son signos de emergencia absoluta.</p><h3>Obstruccion urinaria en gatos</h3><p>Mas comun en machos. Si tu gato no puede orinar, lleva varias horas intentando o se queja, es una emergencia de vida o muerte. Maximo 24 horas.</p><h2>Nuestro equipo de urgencias</h2><p>Nuestros medicos veterinarios estan capacitados en medicina de urgencias y trabajan con protocolos actualizados de triage, estabilizacion y manejo del dolor. Contamos con pabellon quirurgico, area de hospitalizacion, diagnostico por imagen y farmacia interna las 24 horas.</p><h2>Agenda tu urgencia ahora</h2><p>Llama al <strong>+56 2 2987 4410</strong> o ven directamente a Av. Irarrazaval 2450, Nunoa. Estamos preparados para recibirte en cualquier momento.</p>',
		),
	);
}

function perrito_landing_ambulancia() {
	return array(
		'slug'    => 'ambulancia-veterinaria-24-7',
		'title'   => 'Ambulancia Veterinaria 24/7',
		'excerpt' => 'Servicio de ambulancia veterinaria 24/7 en Santiago. Traslado asistido, oxigenoterapia y estabilizacion inicial. Cobertura en Nunoa, Providencia, La Reina, Las Condes y mas.',
		'content' => '',
		'fields'  => array(
			'hero_titular' => 'Ambulancia Veterinaria 24/7 en Santiago',
			'hero_subtitulo' => 'Respondemos en 25-50 minutos en comunas del centro y oriente. Traslado asistido con oxigenoterapia, estabilizacion y comunicacion directa con nuestra clinica de Nunoa.',
			'hero_ilustracion_slug' => 'hero-ambulancia',
			'cta_principal_texto' => 'Llamar ambulancia ahora',
			'cta_principal_tipo' => 'telefono',
			'cta_secundario_texto' => 'Escribir por WhatsApp',
			'tracking_label' => 'ads_ambulancia',
			'trust_signals' => array(
				array( 'numero' => '25-50min', 'label' => 'Tiempo respuesta' ),
				array( 'numero' => '12', 'label' => 'Comunas cubiertas' ),
				array( 'numero' => '24/7', 'label' => 'Todos los dias' ),
				array( 'numero' => '10+ anos', 'label' => 'De experiencia' ),
			),
			'bullets' => array(
				array( 'item' => 'Traslado veterinario asistido en unidad movil equipada' ),
				array( 'item' => 'Evaluacion inicial en domicilio o punto de retiro' ),
				array( 'item' => 'Oxigenoterapia basica para pacientes criticos' ),
				array( 'item' => 'Estabilizacion inicial segun el caso clinico' ),
				array( 'item' => 'Monitorizacion durante todo el traslado' ),
				array( 'item' => 'Comunicacion directa con la clinica para recepcion inmediata' ),
				array( 'item' => 'Paramedicos veterinarios capacitados en urgencias' ),
				array( 'item' => 'Atencion 24 horas los 365 dias del ano' ),
			),
			'proceso_pasos' => array(
				array( 'titulo' => 'Llamas al telefono de urgencias', 'descripcion' => 'Te atendemos inmediatamente y evaluamos la situacion por telefono para preparar el equipo adecuado.' ),
				array( 'titulo' => 'Despachamos la unidad mas cercana', 'descripcion' => 'Enviamos la ambulancia con paramedico veterinario y todo el equipo necesario para estabilizar.' ),
				array( 'titulo' => 'Evaluacion y estabilizacion', 'descripcion' => 'Al llegar evaluamos signos vitales, estabilizamos y coordinamos con la clinica para recibir al paciente.' ),
				array( 'titulo' => 'Traslado seguro a clinica', 'descripcion' => 'Transporte monitorizado con oxigeno y soporte continuo hasta la clinica en Nunoa.' ),
			),
			'faq_items' => array(
				array( 'pregunta' => 'Cuanto demora la ambulancia en llegar?', 'respuesta' => 'Entre 25 y 50 minutos en comunas de cobertura principal (Nunoa, Providencia, La Reina, Macul, Las Condes, Vitacura, Santiago Centro). En comunas extendidas puede tomar mas tiempo segun trafico y disponibilidad.' ),
				array( 'pregunta' => 'Que comunas cubren?', 'respuesta' => 'Cobertura principal: Nunoa, Providencia, La Reina, Macul, Santiago Centro, San Joaquin, Penalolen, Las Condes, Vitacura, Lo Barnechea, San Miguel, La Florida. Cobertura extendida sujeta a evaluacion.' ),
				array( 'pregunta' => 'Cuanto cuesta el servicio?', 'respuesta' => 'El servicio de ambulancia tiene un valor base de $45.000 que incluye traslado y estabilizacion inicial. Los procedimientos clinicos posteriores se cotizan aparte.' ),
				array( 'pregunta' => 'Que equipo lleva la ambulancia?', 'respuesta' => 'Oxigeno, equipo de monitorizacion, material de estabilizacion, analgesicos, sedantes basicos, camilla adaptada y kit de urgencias. Personal capacitado en urgencias veterinarias.' ),
				array( 'pregunta' => 'Atienden perros y gatos?', 'respuesta' => 'Si, atendemos a perros y gatos de todas las razas y tamanos. Nuestro equipo esta entrenado en manejo de pacientes sensibles y estresados.' ),
			),
			'seo_content_bottom' => '<h2>Servicio de ambulancia veterinaria 24/7 en Santiago</h2><p>En Perrito Feliz sabemos que las emergencias no esperan. Por eso operamos un servicio de <strong>ambulancia veterinaria 24 horas</strong> con base en Nunoa y cobertura en las principales comunas de Santiago. Nuestro objetivo es simple: actuar a tiempo cuando tu mascota lo necesita.</p><h2>Por que elegir nuestra ambulancia veterinaria</h2><p>No todas las ambulancias veterinarias son iguales. La nuestra esta integrada con nuestra clinica en Nunoa, lo que significa que desde el momento en que llamamos ya estamos preparandonos para recibir a tu mascota. Esa coordinacion salva vidas.</p><h3>Equipo y profesionales capacitados</h3><p>Nuestras unidades cuentan con oxigeno, material de estabilizacion, analgesicos, equipo de monitorizacion, camilla veterinaria y todo lo necesario para estabilizar a tu mascota durante el traslado. El personal esta capacitado en urgencias y manejo del dolor.</p><h3>Cobertura en las principales comunas de Santiago</h3><p>Atendemos 24 horas los 365 dias del ano en Nunoa, Providencia, La Reina, Macul, Santiago Centro, San Joaquin, Penalolen, Las Condes, Vitacura, Lo Barnechea, San Miguel y La Florida. Tenemos cobertura extendida en Estacion Central, Independencia, Recoleta, Quinta Normal, Maipu y Puente Alto sujeto a evaluacion.</p><h2>Cuando solicitar una ambulancia veterinaria</h2><p>Llama a nuestra ambulancia veterinaria si tu mascota presenta cualquiera de estos sintomas: dificultad respiratoria, sospecha de golpe de calor, sangrado activo, inmovilidad por dolor severo, convulsiones, ingesta de toxicos, traumatismo o atropello, pacientes geriatricos descompensados, o postoperatorios complejos. No esperes: cada minuto cuenta.</p><h3>Que hacer mientras llega la ambulancia</h3><ul><li>Manten la calma. Tu mascota puede sentir tu ansiedad.</li><li>No le des comida ni agua sin indicacion medica.</li><li>No le des medicamentos humanos sin autorizacion.</li><li>Si hay sangrado, aplica presion suave con un pano limpio.</li><li>Mantenla tibia y en un lugar seguro.</li><li>Ten a mano la ficha veterinaria si la tienes.</li></ul><h2>Urgencias veterinarias mas comunes en Santiago</h2><p>Las urgencias mas frecuentes que atendemos son: intoxicaciones (por comida humana, plantas, productos de limpieza), traumatismos (atropellos, caidas), problemas respiratorios, obstrucciones urinarias en gatos, dificultades para parir, reacciones alergicas severas, y descompensaciones de enfermedades cronicas en pacientes geriatricos.</p><h2>Agenda tu emergencia con Perrito Feliz</h2><p>Llama ahora al <strong>+56 2 2987 4410</strong> o escribenos por WhatsApp al +56 9 6612 8834. Nuestro servicio funciona las 24 horas y estamos preparados para responder cuando tu mascota nos necesita.</p>',
		),
	);
}
