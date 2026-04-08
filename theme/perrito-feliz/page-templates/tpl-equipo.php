<?php
/**
 * Template Name: Equipo
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Nuestro equipo médico</span>
		<h1 class="hero__title">Profesionales con criterio y calidez</h1>
		<p class="hero__subtitle">Médicos veterinarios, técnicos y especialistas que trabajan con protocolos actualizados, empatía real y foco en el bienestar integral de cada paciente.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php
		$equipo = new WP_Query( array(
			'post_type'      => 'miembro',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		) );

		if ( $equipo->have_posts() ) : ?>
			<div class="team-grid">
				<?php
				$i = 0;
				while ( $equipo->have_posts() ) :
					$equipo->the_post();
					$cargo = function_exists( 'get_field' ) ? get_field( 'cargo' ) : '';
					?>
					<article class="team-card" data-reveal data-reveal-delay="<?php echo ( $i % 4 ) * 80; ?>">
						<a href="<?php the_permalink(); ?>" style="color: inherit;">
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
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p class="text-center text-muted">Pronto publicaremos los perfiles del equipo.</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
