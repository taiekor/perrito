<?php
/**
 * Search results template.
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Buscador</span>
		<h1 class="hero__title">
			<?php
			/* translators: %s is the search query */
			printf( esc_html__( 'Resultados para "%s"', 'perrito-feliz' ), '<em>' . esc_html( get_search_query() ) . '</em>' );
			?>
		</h1>
		<p class="hero__subtitle">
			<?php
			global $wp_query;
			$found = intval( $wp_query->found_posts );
			if ( $found > 0 ) {
				printf(
					/* translators: %d is the number of results */
					esc_html( _n( '%d resultado encontrado en el sitio.', '%d resultados encontrados en el sitio.', $found, 'perrito-feliz' ) ),
					$found
				);
			} else {
				esc_html_e( 'No encontramos coincidencias. Probá con otros términos o revisá la tienda y los servicios.', 'perrito-feliz' );
			}
			?>
		</p>
		<div class="hero__search" style="margin-top: 1.5rem; max-width: 560px;">
			<?php get_search_form(); ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				$i = 0;
				while ( have_posts() ) :
					the_post();
					$post_type       = get_post_type();
					$post_type_obj   = get_post_type_object( $post_type );
					$post_type_label = $post_type_obj ? $post_type_obj->labels->singular_name : '';
					?>
					<article <?php post_class( 'post-card' ); ?> data-reveal data-reveal-delay="<?php echo ( $i % 3 ) * 80; ?>">
						<a href="<?php the_permalink(); ?>" class="post-card__link">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-card__thumb">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</div>
							<?php else : ?>
								<div class="post-card__thumb post-card__thumb--placeholder" style="--bg: #E8F5EE;">
									<?php perrito_the_svg( 'illustrations/post-placeholder.svg' ); ?>
								</div>
							<?php endif; ?>
							<div class="post-card__body">
								<div class="post-card__meta">
									<?php if ( $post_type_label ) : ?>
										<span class="chip chip--sm"><?php echo esc_html( $post_type_label ); ?></span>
									<?php endif; ?>
									<?php if ( 'post' === $post_type ) : ?>
										<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
									<?php endif; ?>
								</div>
								<h2 class="post-card__title"><?php the_title(); ?></h2>
								<p class="post-card__excerpt"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 24 ) ); ?></p>
								<span class="post-card__more">Ver más <span aria-hidden="true">&rarr;</span></span>
							</div>
						</a>
					</article>
					<?php
					$i++;
				endwhile;
				?>
			</div>

			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => '&larr; Anterior',
					'next_text' => 'Siguiente &rarr;',
				)
			);
			?>
		<?php else : ?>
			<div class="empty-state" data-reveal>
				<div class="empty-state__illustration">
					<?php perrito_the_svg( 'illustrations/empty-cart.svg' ); ?>
				</div>
				<h2>No encontramos resultados</h2>
				<p>Probá con palabras diferentes, o explorá directamente los servicios y la tienda.</p>
				<div class="flex gap-3 justify-center flex-wrap" style="margin-top: 1.5rem;">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'servicio' ) ); ?>" class="btn btn--primary">Ver servicios</a>
					<a href="<?php echo esc_url( get_post_type_archive_link( 'producto' ) ); ?>" class="btn btn--outline">Ir a la tienda</a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
