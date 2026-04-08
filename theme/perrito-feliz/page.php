<?php
/**
 * Default page template.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="hero hero--small">
		<div class="container">
			<?php perrito_breadcrumbs(); ?>
			<h1 class="hero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="section">
		<div class="container container--narrow">
			<article class="page-content prose" data-reveal>
				<?php the_content(); ?>
			</article>
		</div>
	</section>
	<?php
endwhile;

get_footer();
