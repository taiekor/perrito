<?php
/**
 * Archive: Servicios.
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Servicios clínicos</span>
		<h1 class="hero__title">Atención veterinaria integral</h1>
		<p class="hero__subtitle">Medicina preventiva, urgencias, cirugía y bienestar. Todo lo que tu mascota necesita bajo un mismo techo en Ñuñoa.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php
		$terms = get_terms( array( 'taxonomy' => 'servicio_categoria', 'hide_empty' => true ) );
		if ( $terms && ! is_wp_error( $terms ) ) :
		?>
			<nav class="flex justify-center gap-3 flex-wrap mb-8" aria-label="Filtrar por categoria" data-reveal>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'servicio' ) ); ?>" class="chip is-active">Todas</a>
				<?php foreach ( $terms as $term ) : ?>
					<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="chip"><?php echo esc_html( $term->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<div class="services-grid">
			<?php
			$i = 0;
			while ( have_posts() ) :
				the_post();
				$icono = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : '';
				$es_urgente = function_exists( 'get_field' ) ? get_field( 'es_urgencia' ) : false;
				$icon_file = $icono ? "icons/{$icono}.svg" : 'icons/service-consulta.svg';
				?>
				<article class="svc-card <?php echo $es_urgente ? 'svc-card--urgent' : ''; ?>" data-reveal data-reveal-delay="<?php echo ( $i % 3 ) * 80; ?>">
					<div class="svc-card__icon"><?php perrito_the_svg( $icon_file ); ?></div>
					<h3 class="svc-card__title"><?php the_title(); ?></h3>
					<p class="svc-card__desc"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 22 ) ); ?></p>
					<a href="<?php the_permalink(); ?>" class="svc-card__link">Ver detalle <?php perrito_the_svg( 'icons/ui-arrow.svg' ); ?></a>
				</article>
				<?php
				$i++;
			endwhile;
			?>
		</div>

		<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
	</div>
</section>

<?php get_footer(); ?>
