<?php
/**
 * Template Name: Preguntas Frecuentes
 *
 * @package PerritoFeliz
 */

get_header();

$faqs = array(
	array( '¿Atienden urgencias de noche?', 'Sí. Nuestro servicio de urgencias veterinarias y ambulancia funciona 24/7, sujeto a disponibilidad operativa y cobertura por comuna.' ),
	array( '¿Solo atienden perros?', 'No. Atendemos principalmente perros y gatos, con médicos especializados en medicina felina para una experiencia menos invasiva.' ),
	array( '¿Hacen visitas a domicilio?', 'Sí. Realizamos consultas veterinarias a domicilio, controles, vacunación, curaciones simples y algunos procedimientos programados.' ),
	array( '¿Tienen ambulancia veterinaria?', 'Sí. Contamos con unidades móviles adaptadas para traslados asistidos y atención de emergencias en distintas comunas de Santiago.' ),
	array( '¿Puedo comprar alimentos o medicamentos sin consulta?', 'Algunos productos sí. Otros requieren receta o evaluación veterinaria previa según normativa y seguridad del paciente.' ),
	array( '¿Hacen cirugías?', 'Sí. Realizamos cirugías programadas y algunos procedimientos de urgencia, con evaluación preanestésica y monitorización completa.' ),
	array( '¿Venden por internet?', 'Sí. Nuestra tienda online permite comprar alimentos, accesorios, juguetes, higiene y productos veterinarios seleccionados por nuestro equipo.' ),
	array( '¿Puedo agendar por WhatsApp?', 'Sí. Puedes agendar, consultar disponibilidad y coordinar algunos servicios por WhatsApp al ' . perrito_option( 'whatsapp' ) . '.' ),
	array( '¿Cuánto demora la ambulancia?', 'Entre 25 y 50 minutos en comunas de cobertura principal, dependiendo de tráfico y prioridad clínica. En situaciones críticas se prioriza siempre.' ),
	array( '¿Atienden con seguros veterinarios?', 'Estamos trabajando en convenios con diferentes aseguradoras. Consúltanos por tu caso específico.' ),
);
?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Dudas comunes</span>
		<h1 class="hero__title">Preguntas frecuentes</h1>
		<p class="hero__subtitle">Respondemos las dudas más comunes sobre nuestros servicios, cobertura, horarios y tienda veterinaria.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="faq-list" data-faq-group>
			<?php foreach ( $faqs as $faq ) : ?>
				<div class="faq-item" data-faq-item data-reveal>
					<button class="faq-item__q" data-faq-q type="button" aria-expanded="false">
						<span><?php echo esc_html( $faq[0] ); ?></span>
						<span class="faq-item__icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
						</span>
					</button>
					<div class="faq-item__a">
						<p><?php echo esc_html( $faq[1] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="container--narrow" style="margin-top: var(--sp-16);">
			<div class="cta-inline" data-reveal>
				<h2>¿No encontraste tu pregunta?</h2>
				<p>Escríbenos directamente y te respondemos lo antes posible.</p>
				<div class="cta-inline__buttons">
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--primary">Contacto</a>
					<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ) ) ); ?>" class="btn btn--outline" target="_blank" rel="noopener">WhatsApp</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- JSON-LD FAQPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php
    $entries = array();
    foreach ( $faqs as $faq ) {
        $entries[] = sprintf(
            '{"@type":"Question","name":%s,"acceptedAnswer":{"@type":"Answer","text":%s}}',
            wp_json_encode( $faq[0] ),
            wp_json_encode( $faq[1] )
        );
    }
    echo implode( ',', $entries );
    ?>
  ]
}
</script>

<?php get_footer(); ?>
