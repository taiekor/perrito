<?php
/**
 * Taxonomy: producto_categoria.
 *
 * Listado de productos filtrado por categoría.
 *
 * @package PerritoFeliz
 */

get_header();

$current_term = get_queried_object();
?>

<section class="shop-header">
	<div class="container">
		<?php perrito_breadcrumbs(); ?>
		<div class="hero__content hero__content--centered">
			<span class="eyebrow">Tienda · Categoría</span>
			<h1 class="hero__title"><?php echo esc_html( $current_term->name ); ?></h1>
			<?php if ( ! empty( $current_term->description ) ) : ?>
				<p class="hero__subtitle"><?php echo esc_html( $current_term->description ); ?></p>
			<?php else : ?>
				<p class="hero__subtitle">Selección curada de productos de <strong><?php echo esc_html( strtolower( $current_term->name ) ); ?></strong> validados por nuestro equipo veterinario.</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<div class="container">
	<div class="shop-layout">
		<aside class="shop-filters">
			<div class="shop-filters__group">
				<h3 class="shop-filters__title">Categoría</h3>
				<ul class="shop-filters__list">
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'producto' ) ); ?>">Todas</a></li>
					<?php
					$cats = get_terms( array( 'taxonomy' => 'producto_categoria', 'hide_empty' => true ) );
					if ( $cats && ! is_wp_error( $cats ) ) :
						foreach ( $cats as $cat ) :
							$active = ( $cat->term_id === $current_term->term_id );
					?>
						<li>
							<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="<?php echo $active ? 'is-active' : ''; ?>">
								<?php echo esc_html( $cat->name ); ?>
							</a>
						</li>
					<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>
			<div class="shop-filters__group">
				<h3 class="shop-filters__title">Especie</h3>
				<ul class="shop-filters__list">
					<?php
					$especies = get_terms( array( 'taxonomy' => 'producto_especie', 'hide_empty' => true ) );
					if ( $especies && ! is_wp_error( $especies ) ) :
						foreach ( $especies as $esp ) :
					?>
						<li><a href="<?php echo esc_url( get_term_link( $esp ) ); ?>"><?php echo esc_html( $esp->name ); ?></a></li>
					<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>
		</aside>

		<div>
			<div class="shop-toolbar">
				<span class="shop-results-count"><?php echo intval( $GLOBALS['wp_query']->found_posts ); ?> productos</span>
			</div>

			<div class="shop-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/cards/card-producto' );
					endwhile;
				else :
					echo '<p>Aún no hay productos en esta categoría.</p>';
				endif;
				?>
			</div>

			<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
