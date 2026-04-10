<?php
/**
 * Taxonomy: servicio_categoria.
 *
 * Listado de servicios clínicos filtrado por categoría.
 *
 * @package PerritoFeliz
 */

get_header();

$current_term = get_queried_object();
?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Servicios · Categoría</span>
		<h1 class="hero__title"><?php echo esc_html( $current_term->name ); ?></h1>
		<?php if ( ! empty( $current_term->description ) ) : ?>
			<p class="hero__subtitle"><?php echo esc_html( $current_term->description ); ?></p>
		<?php else : ?>
			<p class="hero__subtitle">Servicios clínicos de <strong><?php echo esc_html( strtolower( $current_term->name ) ); ?></strong> realizados por nuestro equipo veterinario en Ñuñoa.</p>
		<?php endif; ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php
		$terms = get_terms( array( 'taxonomy' => 'servicio_categoria', 'hide_empty' => true ) );
		if ( $terms && ! is_wp_error( $terms ) ) :
		?>
			<nav class="flex justify-center gap-3 flex-wrap mb-8" aria-label="Filtrar por categoria" data-reveal>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'servicio' ) ); ?>" class="chip">Todas</a>
				<?php foreach ( $terms as $term ) : ?>
					<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="chip <?php echo ( $term->term_id === $current_term->term_id ) ? 'is-active' : ''; ?>"><?php echo esc_html( $term->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="services-grid">
				<?php
				$i = 0;
				while ( have_posts() ) :
					the_post();
					$icono      = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : '';
					$es_urgente = function_exists( 'get_field' ) ? get_field( 'es_urgencia' ) : false;
					$icon_file  = $icono ? "icons/{$icono}.svg" : 'icons/service-consulta.svg';
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
		<?php else : ?>
			<p>Aún no hay servicios publicados en esta categoría.</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
