<?php
/**
 * Generic archive fallback.
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">
			<?php
			if ( is_category() ) {
				esc_html_e( 'Categoría', 'perrito-feliz' );
			} elseif ( is_tag() ) {
				esc_html_e( 'Etiqueta', 'perrito-feliz' );
			} elseif ( is_author() ) {
				esc_html_e( 'Autor', 'perrito-feliz' );
			} elseif ( is_date() ) {
				esc_html_e( 'Archivo', 'perrito-feliz' );
			} else {
				esc_html_e( 'Listado', 'perrito-feliz' );
			}
			?>
		</span>
		<h1 class="hero__title"><?php echo esc_html( wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
		<?php if ( get_the_archive_description() ) : ?>
			<div class="hero__subtitle"><?php echo wp_kses_post( get_the_archive_description() ); ?></div>
		<?php endif; ?>
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
									<?php if ( 'post' === get_post_type() ) : ?>
										<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
									<?php endif; ?>
								</div>
								<h2 class="post-card__title"><?php the_title(); ?></h2>
								<p class="post-card__excerpt"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 24 ) ); ?></p>
								<span class="post-card__more">Leer más <span aria-hidden="true">&rarr;</span></span>
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
			<p>No hay contenido para mostrar en este archivo todavía.</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
