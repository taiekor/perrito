<?php
/**
 * Single miembro (team member) template.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();
	$cargo     = function_exists( 'get_field' ) ? get_field( 'cargo' ) : '';
	$resumen   = function_exists( 'get_field' ) ? get_field( 'resumen_profesional' ) : '';
	$formacion = function_exists( 'get_field' ) ? get_field( 'formacion' ) : array();
	$exp       = function_exists( 'get_field' ) ? get_field( 'experiencia_simulada' ) : array();
	$especial  = function_exists( 'get_field' ) ? get_field( 'especialidades' ) : array();
	$areas     = function_exists( 'get_field' ) ? get_field( 'areas_trabajo' ) : array();
	$registro  = function_exists( 'get_field' ) ? get_field( 'registro_ficticio' ) : '';
	?>

	<section class="miembro-hero">
		<div class="container">
			<?php perrito_breadcrumbs(); ?>
			<div class="miembro-hero__grid">
				<div class="miembro-avatar" data-reveal>
					<span style="font-family: var(--ff-heading); font-size: 6rem; font-weight: 700;"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></span>
				</div>
				<div data-reveal data-reveal-delay="100">
					<div class="miembro-cargo"><?php echo esc_html( $cargo ); ?></div>
					<h1 class="hero__title"><?php the_title(); ?></h1>
					<?php if ( $resumen ) : ?>
						<p class="hero__subtitle"><?php echo esc_html( $resumen ); ?></p>
					<?php else : ?>
						<p class="hero__subtitle"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
					<?php if ( $registro ) : ?>
						<span class="miembro-registro">
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7L9 18l-5-5"/></svg>
							N° registro <?php echo esc_html( $registro ); ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="miembro-detail">
		<div class="container">
			<div class="miembro-detail__grid">

				<?php if ( ! empty( $formacion ) ) : ?>
					<div class="miembro-block" data-reveal>
						<h3>Formación</h3>
						<ul>
							<?php foreach ( $formacion as $f ) : ?>
								<li><?php echo esc_html( $f['item'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $exp ) ) : ?>
					<div class="miembro-block" data-reveal data-reveal-delay="100">
						<h3>Experiencia</h3>
						<ul>
							<?php foreach ( $exp as $e ) : ?>
								<li><?php echo esc_html( $e['item'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $especial ) ) : ?>
					<div class="miembro-block" data-reveal data-reveal-delay="200">
						<h3>Especialidades</h3>
						<ul>
							<?php foreach ( $especial as $s ) : ?>
								<li><?php echo esc_html( $s['item'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $areas ) ) : ?>
					<div class="miembro-block" data-reveal data-reveal-delay="300">
						<h3>Áreas de trabajo</h3>
						<ul>
							<?php foreach ( $areas as $a ) : ?>
								<li><?php echo esc_html( $a['item'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

			</div>

			<?php if ( get_the_content() ) : ?>
				<div class="prose section" data-reveal>
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

			<div class="section container--narrow" style="padding-top: 0;">
				<div class="cta-inline" data-reveal>
					<h2>Agenda con <?php the_title(); ?></h2>
					<p>Contáctanos para coordinar una consulta con este profesional según disponibilidad y tipo de atención requerida.</p>
					<div class="cta-inline__buttons">
						<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--primary btn--lg">Agendar consulta</a>
						<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ) ) ); ?>" class="btn btn--outline btn--lg" target="_blank" rel="noopener">WhatsApp</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
