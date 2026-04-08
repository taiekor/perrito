<?php
/**
 * Single landing template - for Google Ads landing pages.
 *
 * Structure: CTAs first, SEO content last.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();

	$titular    = function_exists( 'get_field' ) ? get_field( 'hero_titular' ) : get_the_title();
	$subtitulo  = function_exists( 'get_field' ) ? get_field( 'hero_subtitulo' ) : get_the_excerpt();
	$ilustr     = function_exists( 'get_field' ) ? get_field( 'hero_ilustracion_slug' ) : 'hero-ambulancia';
	$cta1_text  = function_exists( 'get_field' ) ? get_field( 'cta_principal_texto' ) : 'Llamar ahora';
	$cta1_tipo  = function_exists( 'get_field' ) ? get_field( 'cta_principal_tipo' ) : 'telefono';
	$cta2_text  = function_exists( 'get_field' ) ? get_field( 'cta_secundario_texto' ) : 'WhatsApp';
	$trust      = function_exists( 'get_field' ) ? get_field( 'trust_signals' ) : array();
	$bullets    = function_exists( 'get_field' ) ? get_field( 'bullets' ) : array();
	$pasos      = function_exists( 'get_field' ) ? get_field( 'proceso_pasos' ) : array();
	$faqs       = function_exists( 'get_field' ) ? get_field( 'faq_items' ) : array();
	$seo_cont   = function_exists( 'get_field' ) ? get_field( 'seo_content_bottom' ) : '';
	$tracking   = function_exists( 'get_field' ) ? get_field( 'tracking_label' ) : 'landing';
	$ilus_file  = $ilustr ? "illustrations/{$ilustr}.svg" : 'illustrations/hero-ambulancia.svg';

	// Determine primary CTA URL.
	switch ( $cta1_tipo ) {
		case 'whatsapp':
			$cta1_url = perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, vengo de la web y necesito ayuda urgente' );
			break;
		case 'formulario':
			$cta1_url = '#landing-form';
			break;
		default:
			$cta1_url = perrito_tel_link( perrito_option( 'telefono_principal_raw' ) );
	}
	?>

	<!-- ============ HERO LANDING ============ -->
	<section class="landing-hero" data-hero-anim>
		<div class="container">
			<div class="landing-hero__grid">
				<div class="landing-hero__content">
					<span class="landing-hero__badge">
						<span class="landing-hero__badge-dot"></span>
						Atendemos ahora - <?php echo esc_html( perrito_option( 'telefono_principal' ) ); ?>
					</span>
					<h1 class="landing-hero__title" data-hero-title><?php echo esc_html( $titular ); ?></h1>
					<p class="landing-hero__subtitle" data-hero-subtitle><?php echo esc_html( $subtitulo ); ?></p>

					<div class="landing-hero__actions" data-hero-actions>
						<a href="<?php echo esc_url( $cta1_url ); ?>" class="btn btn--cta btn--xl btn--pulse" data-tracking="<?php echo esc_attr( $tracking ); ?>_cta1" <?php echo 'whatsapp' === $cta1_tipo ? 'target="_blank" rel="noopener"' : ''; ?>>
							<?php if ( 'telefono' === $cta1_tipo ) : ?>
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
							<?php endif; ?>
							<?php echo esc_html( $cta1_text ); ?>
						</a>
						<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, vengo de la web' ) ); ?>" class="btn btn--outline btn--xl" target="_blank" rel="noopener" data-tracking="<?php echo esc_attr( $tracking ); ?>_cta2">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487 1.85.8 2.593.87 3.523.73.567-.084 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
							<?php echo esc_html( $cta2_text ); ?>
						</a>
					</div>

					<div class="landing-hero__trust">
						<span class="landing-hero__trust-item">
							<span class="landing-hero__trust-icon">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
							</span>
							4.9/5 · 1.200+ reseñas
						</span>
						<span class="landing-hero__trust-item">
							<span class="landing-hero__trust-icon">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
							</span>
							10 años de experiencia
						</span>
						<span class="landing-hero__trust-item">
							<span class="landing-hero__trust-icon">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
							</span>
							Atención 24/7
						</span>
					</div>
				</div>

				<div class="landing-hero__illustration" data-hero-visual data-svg-draw>
					<?php perrito_the_svg( $ilus_file ); ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ TRUST NUMBERS ============ -->
	<?php if ( ! empty( $trust ) ) : ?>
		<section class="landing-trust">
			<div class="container">
				<div class="landing-trust__grid">
					<?php foreach ( $trust as $t ) : ?>
						<div class="landing-trust__item" data-reveal>
							<span class="landing-trust__num"><?php echo esc_html( $t['numero'] ); ?></span>
							<span class="landing-trust__label"><?php echo esc_html( $t['label'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php else : ?>
		<section class="landing-trust">
			<div class="container">
				<div class="landing-trust__grid">
					<div class="landing-trust__item" data-reveal>
						<span class="landing-trust__num" data-counter="18000" data-counter-format="comma" data-counter-suffix="+">0</span>
						<span class="landing-trust__label">Consultas realizadas</span>
					</div>
					<div class="landing-trust__item" data-reveal data-reveal-delay="100">
						<span class="landing-trust__num" data-counter="10" data-counter-suffix=" años">0</span>
						<span class="landing-trust__label">De operación</span>
					</div>
					<div class="landing-trust__item" data-reveal data-reveal-delay="200">
						<span class="landing-trust__num">24/7</span>
						<span class="landing-trust__label">Urgencias</span>
					</div>
					<div class="landing-trust__item" data-reveal data-reveal-delay="300">
						<span class="landing-trust__num" data-counter="4.9" data-counter-format="decimal">0</span>
						<span class="landing-trust__label">Estrellas promedio</span>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- ============ QUÉ INCLUYE ============ -->
	<?php if ( ! empty( $bullets ) ) : ?>
		<section class="landing-section">
			<div class="container">
				<header class="section__header" data-reveal>
					<span class="eyebrow">Qué incluye</span>
					<h2 class="section__title">Un servicio completo y transparente</h2>
				</header>
				<ul class="landing-bullets">
					<?php $i = 0; foreach ( $bullets as $b ) : ?>
						<li data-reveal data-reveal-delay="<?php echo ( $i % 4 ) * 80; ?>"><?php echo esc_html( $b['item'] ); ?></li>
					<?php $i++; endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<!-- ============ PROCESO / PASOS ============ -->
	<?php if ( ! empty( $pasos ) ) : ?>
		<section class="landing-section landing-section--alt">
			<div class="container">
				<header class="section__header" data-reveal>
					<span class="eyebrow">Cómo lo hacemos</span>
					<h2 class="section__title">Un proceso claro y tranquilo</h2>
				</header>
				<div class="process-grid">
					<?php $i = 1; foreach ( $pasos as $p ) : ?>
						<div class="process-step" data-reveal data-reveal-delay="<?php echo ( $i - 1 ) * 100; ?>">
							<div class="process-step__num"><?php echo $i; ?></div>
							<h3><?php echo esc_html( $p['titulo'] ); ?></h3>
							<p><?php echo esc_html( $p['descripcion'] ); ?></p>
						</div>
					<?php $i++; endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- ============ TESTIMONIOS ============ -->
	<section class="landing-section">
		<div class="container">
			<header class="section__header" data-reveal>
				<span class="eyebrow">Lo que dicen los tutores</span>
				<h2 class="section__title">Más de 1.200 reseñas positivas</h2>
			</header>
			<div class="grid grid--3">
				<article class="testi-card" data-reveal>
					<div class="testi-card__stars">
						<?php for ( $i = 0; $i < 5; $i++ ) perrito_the_svg( 'icons/ui-star.svg' ); ?>
					</div>
					<p class="testi-card__text">"Llegaron en menos de 30 minutos a Providencia. Mi perrita estaba muy mal y los paramédicos veterinarios la estabilizaron antes del traslado. Nos salvaron la vida."</p>
					<div class="testi-card__author">
						<span class="testi-card__name">Francisca T.</span>
						<span class="testi-card__loc">Providencia</span>
					</div>
				</article>
				<article class="testi-card" data-reveal data-reveal-delay="100">
					<div class="testi-card__stars">
						<?php for ( $i = 0; $i < 5; $i++ ) perrito_the_svg( 'icons/ui-star.svg' ); ?>
					</div>
					<p class="testi-card__text">"Nos explicaron todo en lenguaje que pudimos entender, nos mostraron los exámenes y nos dieron opciones claras. Primera vez que no nos sentimos apurados en una veterinaria."</p>
					<div class="testi-card__author">
						<span class="testi-card__name">Matías R.</span>
						<span class="testi-card__loc">Ñuñoa</span>
					</div>
				</article>
				<article class="testi-card" data-reveal data-reveal-delay="200">
					<div class="testi-card__stars">
						<?php for ( $i = 0; $i < 5; $i++ ) perrito_the_svg( 'icons/ui-star.svg' ); ?>
					</div>
					<p class="testi-card__text">"Súper profesionales y cálidos. Es raro encontrar veterinarios que combinen seriedad clínica con trato humano. Volvería sin dudar."</p>
					<div class="testi-card__author">
						<span class="testi-card__name">Daniela C.</span>
						<span class="testi-card__loc">La Reina</span>
					</div>
				</article>
			</div>
		</div>
	</section>

	<!-- ============ BIG CTA ============ -->
	<section class="landing-section">
		<div class="container">
			<div class="big-cta" data-reveal>
				<h2><?php echo esc_html( $titular ); ?></h2>
				<p>No esperes. Nuestro equipo está listo para atenderte ahora mismo.</p>
				<div class="big-cta__actions">
					<a href="<?php echo esc_url( $cta1_url ); ?>" class="btn btn--cta btn--xl btn--pulse" <?php echo 'whatsapp' === $cta1_tipo ? 'target="_blank" rel="noopener"' : ''; ?>>
						<?php echo esc_html( $cta1_text ); ?>
					</a>
					<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ) ) ); ?>" class="btn btn--white btn--xl" target="_blank" rel="noopener">
						WhatsApp <?php echo esc_html( perrito_option( 'whatsapp' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ FAQ ============ -->
	<?php if ( ! empty( $faqs ) ) : ?>
		<section class="landing-section landing-section--alt">
			<div class="container">
				<header class="section__header" data-reveal>
					<span class="eyebrow">Preguntas frecuentes</span>
					<h2 class="section__title">Resolvemos tus dudas</h2>
				</header>
				<div class="faq-list" data-faq-group>
					<?php foreach ( $faqs as $faq ) : ?>
						<div class="faq-item" data-faq-item data-reveal>
							<button class="faq-item__q" data-faq-q type="button" aria-expanded="false">
								<span><?php echo esc_html( $faq['pregunta'] ); ?></span>
								<span class="faq-item__icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
								</span>
							</button>
							<div class="faq-item__a">
								<p><?php echo esc_html( $faq['respuesta'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- ============ SEO CONTENT BOTTOM ============ -->
	<?php if ( $seo_cont || get_the_content() ) : ?>
		<section class="landing-seo">
			<div class="container">
				<div class="landing-seo__content" data-reveal>
					<?php
					if ( $seo_cont ) {
						echo wp_kses_post( $seo_cont );
					} else {
						the_content();
					}
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- ============ STICKY MOBILE CTA ============ -->
	<div class="landing-sticky-cta">
		<a href="<?php echo esc_url( $cta1_url ); ?>" class="btn btn--cta btn--lg" <?php echo 'whatsapp' === $cta1_tipo ? 'target="_blank" rel="noopener"' : ''; ?>>
			<?php echo esc_html( $cta1_text ); ?>
		</a>
	</div>

	<?php
endwhile;

get_footer();
