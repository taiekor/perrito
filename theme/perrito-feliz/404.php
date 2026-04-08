<?php
/**
 * 404 template.
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="section section--hero">
	<div class="container container--narrow">
		<div class="error-404">
			<div class="error-404__illustration" data-reveal>
				<?php perrito_the_svg( 'illustrations/error-404.svg' ); ?>
			</div>
			<h1 class="hero__title">Ups, esta pagina se escapo</h1>
			<p class="hero__subtitle">No encontramos lo que buscas. Pero aun podemos ayudarte con tu mascota.</p>
			<div class="error-404__buttons">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">Volver al inicio</a>
				<a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn btn--outline">Ver servicios</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
