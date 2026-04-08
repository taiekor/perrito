<?php
/**
 * Single servicio template.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();
	$precio    = function_exists( 'get_field' ) ? get_field( 'precio_desde' ) : '';
	$duracion  = function_exists( 'get_field' ) ? get_field( 'duracion_estimada' ) : '';
	$incluye   = function_exists( 'get_field' ) ? get_field( 'incluye' ) : array();
	$casos     = function_exists( 'get_field' ) ? get_field( 'casos_frecuentes' ) : array();
	$icono     = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : '';
	$ilustr    = function_exists( 'get_field' ) ? get_field( 'ilustracion_slug' ) : '';
	$es_urg    = function_exists( 'get_field' ) ? get_field( 'es_urgencia' ) : false;
	$cta_text  = function_exists( 'get_field' ) ? get_field( 'cta_texto' ) : 'Agendar ahora';
	$icon_file = $icono ? "icons/{$icono}.svg" : 'icons/service-consulta.svg';
	$ilus_file = $ilustr ? "illustrations/{$ilustr}.svg" : 'illustrations/hero-home.svg';
	?>

	<section class="svc-hero">
		<div class="container">
			<?php perrito_breadcrumbs(); ?>
			<div class="svc-hero__grid">
				<div data-reveal>
					<div class="svc-hero__icon"><?php perrito_the_svg( $icon_file ); ?></div>
					<?php if ( $es_urg ) : ?>
						<span class="badge badge--urgent mb-4">Servicio de urgencia 24/7</span>
					<?php endif; ?>
					<h1 class="hero__title"><?php the_title(); ?></h1>
					<p class="hero__subtitle"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<div class="hero__actions">
						<a href="<?php echo esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ); ?>" class="btn btn--primary btn--lg">
							<?php echo esc_html( $cta_text ); ?>
						</a>
						<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, quiero informacion sobre ' . get_the_title() ) ); ?>" class="btn btn--outline btn--lg" target="_blank" rel="noopener">
							WhatsApp
						</a>
					</div>
				</div>
				<div class="svc-hero__illustration" data-reveal data-reveal-delay="200">
					<?php perrito_the_svg( $ilus_file ); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="svc-detail">
		<div class="container">
			<div class="svc-detail__grid">

				<div>
					<div class="svc-block prose" data-reveal>
						<h3>Sobre este servicio</h3>
						<?php the_content(); ?>
					</div>

					<?php if ( ! empty( $incluye ) ) : ?>
						<div class="svc-block" data-reveal>
							<h3>Qué incluye</h3>
							<ul class="svc-list">
								<?php foreach ( $incluye as $item ) : ?>
									<li><?php echo esc_html( $item['item'] ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $casos ) ) : ?>
						<div class="svc-block" data-reveal>
							<h3>Casos frecuentes</h3>
							<ul class="svc-list">
								<?php foreach ( $casos as $caso ) : ?>
									<li><?php echo esc_html( $caso['item'] ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>

				<aside class="svc-aside">
					<div class="svc-aside__card">
						<h3>Agenda este servicio</h3>
						<p>Llámanos, escríbenos por WhatsApp o visítanos en Av. Irarrázaval 2450, Ñuñoa. Atendemos con turnos coordinados y urgencias 24/7.</p>

						<div class="svc-aside__info">
							<?php if ( $precio ) : ?>
								<div class="svc-aside__info-row">
									<span class="svc-aside__info-label">Desde</span>
									<span class="svc-aside__info-value"><?php echo esc_html( perrito_price( $precio ) ); ?></span>
								</div>
							<?php endif; ?>
							<?php if ( $duracion ) : ?>
								<div class="svc-aside__info-row">
									<span class="svc-aside__info-label">Duración</span>
									<span class="svc-aside__info-value"><?php echo esc_html( $duracion ); ?></span>
								</div>
							<?php endif; ?>
							<div class="svc-aside__info-row">
								<span class="svc-aside__info-label">Atención</span>
								<span class="svc-aside__info-value"><?php echo $es_urg ? '24/7' : 'Lun-Sáb'; ?></span>
							</div>
						</div>

						<a href="<?php echo esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ); ?>" class="btn btn--white btn--block btn--lg mb-4">
							<?php echo esc_html( perrito_option( 'telefono_principal' ) ); ?>
						</a>
						<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ) ) ); ?>" class="btn btn--outline btn--block" style="color:#fff;border-color:rgba(255,255,255,0.4);" target="_blank" rel="noopener">WhatsApp</a>
					</div>
				</aside>

			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
