<?php
/**
 * Archive: Miembros (equipo).
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Equipo médico</span>
		<h1 class="hero__title">Profesionales con criterio y calidez</h1>
		<p class="hero__subtitle">Médicos veterinarios, técnicos y especialistas que cuidan cada detalle para que tu mascota reciba la mejor atención posible.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="team-grid">
			<?php
			$i = 0;
			while ( have_posts() ) :
				the_post();
				$cargo = function_exists( 'get_field' ) ? get_field( 'cargo' ) : '';
				?>
				<article class="team-card" data-reveal data-reveal-delay="<?php echo ( $i % 4 ) * 80; ?>">
					<a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none; display: block;">
						<div class="team-card__avatar"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></div>
						<h3 class="team-card__name"><?php the_title(); ?></h3>
						<div class="team-card__role"><?php echo esc_html( $cargo ); ?></div>
						<p class="team-card__desc"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 22 ) ); ?></p>
					</a>
				</article>
				<?php
				$i++;
			endwhile;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
