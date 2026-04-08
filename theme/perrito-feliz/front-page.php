<?php
/**
 * Front page template - Home.
 *
 * Sections: hero, trust strip, servicios destacados, ambulancia band,
 * planes, equipo, testimonios, blog preview, CTA final.
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<!-- ============ HERO ============ -->
<section class="hero hero--home" data-hero-anim>
	<div class="container">
		<div class="hero__content">
			<span class="hero__badge" data-hero-badge>
				<span class="hero__badge-dot"></span>
				Atendemos 24/7 urgencias veterinarias
			</span>
			<h1 class="hero__title" data-hero-title>
				Cuidamos a tu compañero como parte de la <em>familia</em>
			</h1>
			<p class="hero__subtitle" data-hero-subtitle>
				Clínica veterinaria integral en Ñuñoa. Medicina seria, trato humano, urgencias 24/7 y ambulancia veterinaria en Santiago. Diez años acompañando tutores y mascotas.
			</p>
			<div class="hero__actions" data-hero-actions>
				<a href="<?php echo esc_url( home_url( '/servicios/urgencias-24-7/' ) ); ?>" class="btn btn--cta btn--lg btn--pulse">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
					Llamar urgencia
				</a>
				<a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn btn--outline btn--lg">
					Ver todos los servicios
					<?php perrito_the_svg( 'icons/ui-arrow.svg' ); ?>
				</a>
			</div>
			<div class="hero__trust" data-hero-trust>
				<div class="hero__trust-item">
					<span class="hero__trust-value" data-counter="10" data-counter-suffix="+">0</span>
					<span class="hero__trust-label">Años de operación</span>
				</div>
				<div class="hero__trust-item">
					<span class="hero__trust-value" data-counter="18000" data-counter-format="comma" data-counter-suffix="+">0</span>
					<span class="hero__trust-label">Consultas realizadas</span>
				</div>
				<div class="hero__trust-item">
					<span class="hero__trust-value" data-counter="4.9" data-counter-format="decimal">0</span>
					<span class="hero__trust-label">Estrellas promedio</span>
				</div>
			</div>
		</div>
		<div class="hero__visual" data-hero-visual>
			<div class="hero__illustration" data-svg-draw>
				<?php perrito_the_svg( 'illustrations/hero-home.svg' ); ?>
			</div>
			<div class="hero__floating-card hero__floating-card--1" data-hero-floating>
				<div class="hero__floating-card-icon">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
				</div>
				<div class="hero__floating-card-text">
					<strong>Cita confirmada</strong>
					<span>Dra. Catalina Rivas</span>
				</div>
			</div>
			<div class="hero__floating-card hero__floating-card--2" data-hero-floating>
				<div class="hero__floating-card-icon" style="background: #FDECEA; color: #D8352A;">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
				</div>
				<div class="hero__floating-card-text">
					<strong>Ambulancia 24/7</strong>
					<span>Cobertura Santiago</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ============ TRUST STRIP ============ -->
<section class="trust-strip">
	<div class="container">
		<div class="trust-strip__grid">
			<div class="trust-strip__item" data-reveal>
				<span class="trust-strip__value" data-counter="3200" data-counter-format="comma" data-counter-suffix="+">0</span>
				<span class="trust-strip__label">Cirugías realizadas</span>
			</div>
			<div class="trust-strip__item" data-reveal data-reveal-delay="100">
				<span class="trust-strip__value" data-counter="6500" data-counter-format="comma" data-counter-suffix="+">0</span>
				<span class="trust-strip__label">Planes preventivos</span>
			</div>
			<div class="trust-strip__item" data-reveal data-reveal-delay="200">
				<span class="trust-strip__value" data-counter="1200" data-counter-format="comma" data-counter-suffix="+">0</span>
				<span class="trust-strip__label">Reseñas</span>
			</div>
			<div class="trust-strip__item" data-reveal data-reveal-delay="300">
				<span class="trust-strip__value" data-counter="92" data-counter-suffix="%">0</span>
				<span class="trust-strip__label">Volvería a atenderse</span>
			</div>
		</div>
	</div>
</section>

<!-- ============ SERVICIOS DESTACADOS ============ -->
<section class="section">
	<div class="container">
		<header class="section__header" data-reveal>
			<span class="eyebrow">Nuestros servicios</span>
			<h2 class="section__title">Todo lo que tu mascota necesita, en un solo lugar</h2>
			<p class="section__subtitle">Medicina preventiva, urgencias, cirugía, hospitalización y tienda veterinaria. Un ecosistema completo de cuidado integral.</p>
		</header>

		<div class="services-grid">
			<?php
			$servicios_query = new WP_Query(
				array(
					'post_type'      => 'servicio',
					'posts_per_page' => 6,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				)
			);

			if ( $servicios_query->have_posts() ) {
				$i = 0;
				while ( $servicios_query->have_posts() ) {
					$servicios_query->the_post();
					$icono     = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : '';
					$es_urgente = function_exists( 'get_field' ) ? get_field( 'es_urgencia' ) : false;
					$icon_file = $icono ? "icons/{$icono}.svg" : 'icons/service-consulta.svg';
					?>
					<article class="svc-card <?php echo $es_urgente ? 'svc-card--urgent' : ''; ?>" data-reveal data-reveal-delay="<?php echo $i * 80; ?>">
						<div class="svc-card__icon">
							<?php perrito_the_svg( $icon_file ); ?>
						</div>
						<h3 class="svc-card__title"><?php the_title(); ?></h3>
						<p class="svc-card__desc"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 18 ) ); ?></p>
						<a href="<?php the_permalink(); ?>" class="svc-card__link">
							Ver servicio
							<?php perrito_the_svg( 'icons/ui-arrow.svg' ); ?>
						</a>
					</article>
					<?php
					$i++;
				}
				wp_reset_postdata();
			} else {
				// Fallback stubs if no content yet.
				$stubs = array(
					array( 'Consulta veterinaria general', 'service-consulta', 'Controles, revisiones, orientación preventiva y seguimiento integral de perros y gatos.', false ),
					array( 'Urgencias 24/7', 'service-urgencia', 'Atención inmediata para situaciones críticas. Estabilización, triage y comunicación clara desde el primer momento.', true ),
					array( 'Ambulancia veterinaria', 'service-ambulancia', 'Unidades móviles adaptadas para traslado asistido en distintas comunas de Santiago.', true ),
					array( 'Cirugía veterinaria', 'service-cirugia', 'Procedimientos programados y de urgencia con protocolo analgésico y monitorización completa.', false ),
					array( 'Hospitalización', 'service-hospitalizacion', 'Áreas diferenciadas para observación, estabilización y recuperación de pacientes complejos.', false ),
					array( 'Nutrición clínica', 'service-nutricion', 'Planes nutricionales según edad, condición clínica y estilo de vida de cada mascota.', false ),
				);
				foreach ( $stubs as $idx => $s ) {
					printf(
						'<article class="svc-card %s" data-reveal data-reveal-delay="%d">
							<div class="svc-card__icon">%s</div>
							<h3 class="svc-card__title">%s</h3>
							<p class="svc-card__desc">%s</p>
							<a href="%s" class="svc-card__link">Ver servicio %s</a>
						</article>',
						$s[3] ? 'svc-card--urgent' : '',
						$idx * 80,
						perrito_svg( 'icons/' . $s[1] . '.svg' ),
						esc_html( $s[0] ),
						esc_html( $s[2] ),
						esc_url( home_url( '/servicios/' ) ),
						perrito_svg( 'icons/ui-arrow.svg' )
					);
				}
			}
			?>
		</div>

		<div class="flex justify-center mt-8" data-reveal>
			<a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn btn--primary btn--lg">Ver todos los servicios</a>
		</div>
	</div>
</section>

<!-- ============ AMBULANCIA CTA BAND ============ -->
<section class="ambulance-band">
	<div class="container">
		<div class="ambulance-band__inner">
			<div data-reveal>
				<span class="hero__badge" style="background: rgba(255,255,255,0.2); border-color: rgba(255,255,255,0.3); color: #fff;">
					<span class="hero__badge-dot" style="background: #fff; box-shadow: 0 0 0 4px rgba(255,255,255,0.2);"></span>
					Servicio distintivo
				</span>
				<h2>Ambulancia veterinaria 24/7</h2>
				<p>Nuestras unidades móviles están preparadas para traslado asistido de pacientes en estado delicado o con movilidad reducida. Tiempo promedio de respuesta: 25-50 minutos en cobertura principal.</p>
				<div class="ambulance-band__actions">
					<a href="<?php echo esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ); ?>" class="btn btn--white btn--lg">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						Solicitar ambulancia
					</a>
					<a href="<?php echo esc_url( home_url( '/servicios/ambulancia-veterinaria/' ) ); ?>" class="btn btn--outline btn--lg" style="color: #fff; border-color: rgba(255,255,255,0.5);">Más información</a>
				</div>
			</div>
			<div class="ambulance-band__illustration" data-reveal data-reveal-delay="200">
				<?php perrito_the_svg( 'illustrations/hero-ambulancia.svg' ); ?>
			</div>
		</div>
	</div>
</section>

<!-- ============ EQUIPO MÉDICO ============ -->
<section class="section section--alt">
	<div class="container">
		<header class="section__header" data-reveal>
			<span class="eyebrow">Nuestro equipo</span>
			<h2 class="section__title">Médicos veterinarios con criterio y calidez</h2>
			<p class="section__subtitle">Cada profesional aporta especialización, experiencia clínica y empatía real con cada familia que nos visita.</p>
		</header>

		<div class="team-grid">
			<?php
			$team = new WP_Query(
				array(
					'post_type'      => 'miembro',
					'posts_per_page' => 4,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				)
			);
			if ( $team->have_posts() ) {
				$i = 0;
				while ( $team->have_posts() ) {
					$team->the_post();
					$cargo = function_exists( 'get_field' ) ? get_field( 'cargo' ) : '';
					?>
					<article class="team-card" data-reveal data-reveal-delay="<?php echo $i * 80; ?>">
						<div class="team-card__avatar"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></div>
						<h3 class="team-card__name"><?php the_title(); ?></h3>
						<div class="team-card__role"><?php echo esc_html( $cargo ); ?></div>
						<p class="team-card__desc"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 20 ) ); ?></p>
					</article>
					<?php
					$i++;
				}
				wp_reset_postdata();
			} else {
				$stub_team = array(
					array( 'Dra. Catalina Rivas M.', 'Directora Médica', 'Medicina interna y urgencias. 12 años de experiencia clínica y más de 7.000 consultas.' ),
					array( 'Dr. Benjamín Soto L.', 'Cirujano Veterinario', 'Cirugía de tejidos blandos y manejo del dolor. Protocolos analgésicos personalizados.' ),
					array( 'Dra. Josefa Mena V.', 'Dermatología y Nutrición', 'Alergias recurrentes, otitis y planes nutricionales terapéuticos. Enfoque detallista.' ),
					array( 'Dr. Matías León F.', 'Medicina Felina', 'Gatos sensibles, chequeos preventivos y consultas menos invasivas y más amables.' ),
				);
				foreach ( $stub_team as $i => $m ) {
					printf(
						'<article class="team-card" data-reveal data-reveal-delay="%d">
							<div class="team-card__avatar">%s</div>
							<h3 class="team-card__name">%s</h3>
							<div class="team-card__role">%s</div>
							<p class="team-card__desc">%s</p>
						</article>',
						$i * 80,
						esc_html( mb_substr( $m[0], 0, 1 ) ),
						esc_html( $m[0] ),
						esc_html( $m[1] ),
						esc_html( $m[2] )
					);
				}
			}
			?>
		</div>

		<div class="flex justify-center mt-8" data-reveal>
			<a href="<?php echo esc_url( home_url( '/equipo/' ) ); ?>" class="btn btn--outline btn--lg">Conocer al equipo completo</a>
		</div>
	</div>
</section>

<!-- ============ PLANES ============ -->
<section class="section">
	<div class="container">
		<header class="section__header" data-reveal>
			<span class="eyebrow">Planes de salud</span>
			<h2 class="section__title">Acompañamos cada etapa de vida</h2>
			<p class="section__subtitle">Diseñamos planes según edad, especie y estilo de vida para que puedas cuidar de tu mascota con previsibilidad y sin sustos.</p>
		</header>

		<div class="grid grid--3 grid--lg">
			<article class="plan-card" data-reveal>
				<h3 class="plan-card__title">Plan Cachorro Feliz</h3>
				<p class="plan-card__subtitle">Para los primeros meses</p>
				<div class="plan-card__price">$69.990</div>
				<div class="plan-card__freq">Pago único</div>
				<ul class="plan-card__features">
					<li>Primera consulta completa</li>
					<li>Calendario de vacunas</li>
					<li>Desparasitación interna y externa</li>
					<li>Revisión nutricional</li>
					<li>Guía de adaptación en casa</li>
					<li>Descuento primera peluquería</li>
				</ul>
				<a href="<?php echo esc_url( home_url( '/planes/' ) ); ?>" class="btn btn--outline btn--block">Más información</a>
			</article>

			<article class="plan-card plan-card--featured" data-reveal data-reveal-delay="100">
				<span class="plan-card__ribbon">Más popular</span>
				<h3 class="plan-card__title">Plan Familia</h3>
				<p class="plan-card__subtitle">Cuidado integral continuo</p>
				<div class="plan-card__price">$24.990</div>
				<div class="plan-card__freq">/ mes</div>
				<ul class="plan-card__features">
					<li>Consultas ilimitadas</li>
					<li>Descuentos en tienda</li>
					<li>Tarifas preferenciales</li>
					<li>Vacunas del año incluidas</li>
					<li>Recordatorios automáticos</li>
					<li>Prioridad en agenda</li>
				</ul>
				<a href="<?php echo esc_url( home_url( '/planes/' ) ); ?>" class="btn btn--primary btn--block">Elegir plan</a>
			</article>

			<article class="plan-card" data-reveal data-reveal-delay="200">
				<h3 class="plan-card__title">Plan Senior Contigo</h3>
				<p class="plan-card__subtitle">Mascotas de más de 8 años</p>
				<div class="plan-card__price">$89.990</div>
				<div class="plan-card__freq">Plan anual</div>
				<ul class="plan-card__features">
					<li>Evaluación geriátrica</li>
					<li>Perfil preventivo anual</li>
					<li>Control de dolor y movilidad</li>
					<li>Seguimiento nutricional</li>
					<li>Prioridad en controles</li>
					<li>Acompañamiento continuo</li>
				</ul>
				<a href="<?php echo esc_url( home_url( '/planes/' ) ); ?>" class="btn btn--outline btn--block">Más información</a>
			</article>
		</div>
	</div>
</section>

<!-- ============ TESTIMONIOS ============ -->
<section class="section section--alt">
	<div class="container">
		<header class="section__header" data-reveal>
			<span class="eyebrow">Tutores que confían en nosotros</span>
			<h2 class="section__title">Más de 1.200 reseñas positivas</h2>
		</header>

		<div class="grid grid--3">
			<article class="testi-card" data-reveal>
				<div class="testi-card__quote-icon">"</div>
				<div class="testi-card__stars">
					<?php for ( $i = 0; $i < 5; $i++ ) {
						perrito_the_svg( 'icons/ui-star.svg' );
					} ?>
				</div>
				<p class="testi-card__text">"Nos salvaron en una urgencia de madrugada. Mi perrita empezó con dificultad para respirar y no sabíamos qué hacer. La ambulancia veterinaria llegó súper rápido y la clínica ya estaba preparada para recibirla."</p>
				<div class="testi-card__author">
					<span class="testi-card__name">Francisca T.</span>
					<span class="testi-card__loc">Providencia</span>
				</div>
			</article>

			<article class="testi-card" data-reveal data-reveal-delay="100">
				<div class="testi-card__quote-icon">"</div>
				<div class="testi-card__stars">
					<?php for ( $i = 0; $i < 5; $i++ ) {
						perrito_the_svg( 'icons/ui-star.svg' );
					} ?>
				</div>
				<p class="testi-card__text">"No es solo una clínica, de verdad acompañan. Llevamos a nuestro gato por un tema digestivo que venía hace meses y por fin sentimos que alguien se tomó el tiempo de revisar bien el caso."</p>
				<div class="testi-card__author">
					<span class="testi-card__name">Matías R.</span>
					<span class="testi-card__loc">Ñuñoa</span>
				</div>
			</article>

			<article class="testi-card" data-reveal data-reveal-delay="200">
				<div class="testi-card__quote-icon">"</div>
				<div class="testi-card__stars">
					<?php for ( $i = 0; $i < 5; $i++ ) {
						perrito_the_svg( 'icons/ui-star.svg' );
					} ?>
				</div>
				<p class="testi-card__text">"La tienda y la clínica juntas nos resolvieron todo. Fuimos por una consulta, nos indicaron una dieta específica y pudimos salir con todo listo ese mismo día. Eso se agradece muchísimo."</p>
				<div class="testi-card__author">
					<span class="testi-card__name">Daniela C.</span>
					<span class="testi-card__loc">La Reina</span>
				</div>
			</article>
		</div>
	</div>
</section>

<!-- ============ CTA FINAL ============ -->
<section class="section">
	<div class="container container--narrow">
		<div class="cta-inline" data-reveal>
			<span class="eyebrow">Agenda hoy</span>
			<h2>Tu mascota merece medicina seria y trato humano</h2>
			<p>Escríbenos por WhatsApp, llámanos o agenda una consulta online. Estamos aquí para ayudarte con lo cotidiano y con lo urgente.</p>
			<div class="cta-inline__buttons">
				<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, quiero agendar una consulta' ) ); ?>" class="btn btn--primary btn--lg" target="_blank" rel="noopener">
					WhatsApp
				</a>
				<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--outline btn--lg">Agendar online</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
