<?php
/**
 * Template Name: Planes de salud
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Planes de salud</span>
		<h1 class="hero__title">Cuida cada etapa de vida</h1>
		<p class="hero__subtitle">Diseñamos planes según edad, especie y estilo de vida para que puedas acompañar a tu mascota con previsibilidad y tranquilidad.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php
		$planes = new WP_Query( array(
			'post_type'      => 'plan',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		) );

		if ( $planes->have_posts() ) : ?>
			<div class="grid grid--3 grid--lg">
				<?php
				while ( $planes->have_posts() ) :
					$planes->the_post();
					$precio    = function_exists( 'get_field' ) ? get_field( 'precio_referencial' ) : 0;
					$frec      = function_exists( 'get_field' ) ? get_field( 'frecuencia' ) : 'unico';
					$dirigido  = function_exists( 'get_field' ) ? get_field( 'dirigido_a' ) : '';
					$benef     = function_exists( 'get_field' ) ? get_field( 'beneficios' ) : array();
					$destacado = function_exists( 'get_field' ) ? get_field( 'destacado' ) : false;
					?>
					<article class="plan-card <?php echo $destacado ? 'plan-card--featured' : ''; ?>" data-reveal>
						<?php if ( $destacado ) : ?><span class="plan-card__ribbon">Más popular</span><?php endif; ?>
						<h2 class="plan-card__title"><?php the_title(); ?></h2>
						<p class="plan-card__subtitle"><?php echo esc_html( $dirigido ); ?></p>
						<div class="plan-card__price"><?php echo esc_html( perrito_price( $precio ) ); ?></div>
						<div class="plan-card__freq">
							<?php
							switch ( $frec ) {
								case 'mensual': echo '/ mes'; break;
								case 'anual':   echo '/ año'; break;
								default:        echo 'Pago único';
							}
							?>
						</div>
						<ul class="plan-card__features">
							<?php foreach ( $benef as $b ) : ?>
								<li><?php echo esc_html( $b['item'] ); ?></li>
							<?php endforeach; ?>
						</ul>
						<a href="<?php the_permalink(); ?>" class="btn <?php echo $destacado ? 'btn--primary' : 'btn--outline'; ?> btn--block">Ver detalle</a>
					</article>
				<?php endwhile; ?>
			</div>
		<?php
			wp_reset_postdata();
		else :
		?>
			<div class="grid grid--3 grid--lg">
				<article class="plan-card" data-reveal>
					<h3 class="plan-card__title">Plan Cachorro Feliz</h3>
					<p class="plan-card__subtitle">Para los primeros meses</p>
					<div class="plan-card__price">$69.990</div>
					<div class="plan-card__freq">Pago único</div>
					<ul class="plan-card__features">
						<li>Primera consulta</li>
						<li>Calendario de vacunas</li>
						<li>Desparasitación</li>
						<li>Revisión nutricional</li>
						<li>Guía de adaptación</li>
						<li>Descuento peluquería</li>
					</ul>
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--outline btn--block">Consultar</a>
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
						<li>Vacunas del año</li>
						<li>Recordatorios automáticos</li>
						<li>Prioridad en agenda</li>
					</ul>
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--primary btn--block">Contratar</a>
				</article>

				<article class="plan-card" data-reveal data-reveal-delay="200">
					<h3 class="plan-card__title">Plan Senior Contigo</h3>
					<p class="plan-card__subtitle">Mascotas de más de 8 años</p>
					<div class="plan-card__price">$89.990</div>
					<div class="plan-card__freq">Anual</div>
					<ul class="plan-card__features">
						<li>Evaluación geriátrica</li>
						<li>Perfil preventivo anual</li>
						<li>Control de dolor</li>
						<li>Revisión de movilidad</li>
						<li>Seguimiento nutricional</li>
						<li>Prioridad en controles</li>
					</ul>
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--outline btn--block">Consultar</a>
				</article>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
