<?php
/**
 * Single plan template.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();
	$precio    = function_exists( 'get_field' ) ? get_field( 'precio_referencial' ) : 0;
	$frec      = function_exists( 'get_field' ) ? get_field( 'frecuencia' ) : 'unico';
	$dirigido  = function_exists( 'get_field' ) ? get_field( 'dirigido_a' ) : '';
	$benef     = function_exists( 'get_field' ) ? get_field( 'beneficios' ) : array();
	$color     = function_exists( 'get_field' ) ? get_field( 'color_acento' ) : '#2D8659';
	?>

	<section class="hero hero--small">
		<div class="container container--narrow">
			<?php perrito_breadcrumbs(); ?>
			<span class="eyebrow">Plan de salud</span>
			<h1 class="hero__title"><?php the_title(); ?></h1>
			<?php if ( $dirigido ) : ?>
				<p class="hero__subtitle"><?php echo esc_html( $dirigido ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="section">
		<div class="container container--narrow">
			<article class="plan-card plan-card--featured" data-reveal style="border-color: <?php echo esc_attr( $color ); ?>;">
				<h2 class="plan-card__title"><?php the_title(); ?></h2>
				<div class="plan-card__price" style="color: <?php echo esc_attr( $color ); ?>;"><?php echo esc_html( perrito_price( $precio ) ); ?></div>
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
				<div class="prose" style="margin-bottom: var(--sp-8);">
					<?php the_content(); ?>
				</div>
				<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, quiero contratar ' . get_the_title() ) ); ?>" class="btn btn--primary btn--block btn--lg" target="_blank" rel="noopener">Contratar este plan</a>
			</article>
		</div>
	</section>

	<?php
endwhile;

get_footer();
