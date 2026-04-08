<?php
/**
 * Main index template.
 *
 * Fallback for all archives and the blog.
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container">
		<div class="hero__content hero__content--centered">
			<h1 class="hero__title">
				<?php
				if ( is_home() ) {
					echo 'Blog Perrito Feliz';
				} elseif ( is_search() ) {
					printf( 'Resultados para: "%s"', esc_html( get_search_query() ) );
				} elseif ( is_archive() ) {
					the_archive_title();
				} else {
					echo esc_html( get_the_archive_title() );
				}
				?>
			</h1>
			<?php if ( is_home() ) : ?>
				<p class="hero__subtitle">Consejos, guias y educacion veterinaria para tutores responsables.</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'post-card' ); ?> data-reveal>
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
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
								</div>
								<h2 class="post-card__title"><?php the_title(); ?></h2>
								<p class="post-card__excerpt"><?php echo esc_html( perrito_excerpt( get_the_excerpt(), 24 ) ); ?></p>
								<span class="post-card__more">Leer mas <span aria-hidden="true">&rarr;</span></span>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
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
			<p>No hay publicaciones todavia.</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
