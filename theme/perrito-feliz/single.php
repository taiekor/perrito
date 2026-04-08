<?php
/**
 * Single blog post template.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="hero hero--small">
		<div class="container container--narrow">
			<?php perrito_breadcrumbs(); ?>
			<div class="post-meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<span class="post-meta__sep">&bull;</span>
				<span><?php echo esc_html( get_the_author() ); ?></span>
			</div>
			<h1 class="hero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<article <?php post_class( 'section' ); ?>>
		<div class="container container--narrow">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-featured">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>

			<div class="prose" data-reveal>
				<?php the_content(); ?>
			</div>
		</div>
	</article>

	<section class="section section--alt">
		<div class="container container--narrow">
			<div class="cta-inline">
				<h2>Tu mascota necesita atencion?</h2>
				<p>Nuestro equipo veterinario esta disponible para consultas, urgencias y controles preventivos.</p>
				<div class="cta-inline__buttons">
					<a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn btn--primary">Agendar consulta</a>
					<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ) ) ); ?>" class="btn btn--outline" target="_blank" rel="noopener">WhatsApp</a>
				</div>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
