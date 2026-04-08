<?php
/**
 * Template Name: Cobertura
 *
 * @package PerritoFeliz
 */

get_header();

$principal = array( 'Ñuñoa', 'Providencia', 'La Reina', 'Macul', 'Santiago Centro', 'San Joaquín', 'Peñalolén', 'Las Condes', 'Vitacura', 'Lo Barnechea', 'San Miguel', 'La Florida' );
$extendida = array( 'Estación Central', 'Independencia', 'Recoleta', 'Quinta Normal', 'Maipú', 'Puente Alto' );
?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Santiago, Región Metropolitana</span>
		<h1 class="hero__title">Cobertura de atención</h1>
		<p class="hero__subtitle">Recibimos pacientes de toda la Región Metropolitana en nuestra clínica en Ñuñoa. Nuestras ambulancias veterinarias atienden en comunas seleccionadas.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="grid grid--split">
			<div data-reveal>
				<span class="eyebrow">Cobertura principal</span>
				<h2>Comunas con atención frecuente</h2>
				<p>Visitas a domicilio, controles, ambulancia veterinaria y despachos de tienda disponibles en estas comunas:</p>
				<ul class="landing-bullets" style="grid-template-columns: repeat(2, 1fr);">
					<?php foreach ( $principal as $comuna ) : ?>
						<li><?php echo esc_html( $comuna ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div data-reveal data-reveal-delay="100">
				<span class="eyebrow">Cobertura extendida</span>
				<h2>Comunas con atención por evaluación</h2>
				<p>Estas comunas pueden recibir nuestros servicios de ambulancia veterinaria sujeto a evaluación por distancia, tráfico y disponibilidad operativa:</p>
				<ul class="landing-bullets" style="grid-template-columns: repeat(2, 1fr);">
					<?php foreach ( $extendida as $comuna ) : ?>
						<li><?php echo esc_html( $comuna ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="cta-inline" style="margin-top: var(--sp-8); text-align: left; padding: var(--sp-6);">
					<h3 style="font-size: var(--fs-lg); margin-bottom: var(--sp-2);">¿Tu comuna no aparece?</h3>
					<p style="font-size: var(--fs-sm); margin-bottom: var(--sp-4);">Escríbenos y evaluamos tu caso. La clínica atiende pacientes de toda la RM.</p>
					<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, quiero consultar si atienden en mi comuna' ) ); ?>" class="btn btn--primary btn--sm" target="_blank" rel="noopener">Consultar por WhatsApp</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
