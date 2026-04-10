<?php
/**
 * Taxonomy: producto_especie.
 *
 * Listado de productos filtrado por especie (perro / gato).
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
			<span class="eyebrow">Tienda · Especie</span>
			<h1 class="hero__title">Productos para <?php echo esc_html( strtolower( $current_term->name ) ); ?></h1>
			<?php if ( ! empty( $current_term->description ) ) : ?>
				<p class="hero__subtitle"><?php echo esc_html( $current_term->description ); ?></p>
			<?php else : ?>
				<p class="hero__subtitle">Alimentos, farmacia, accesorios y juguetes pensados especialmente para <strong><?php echo esc_html( strtolower( $current_term->name ) ); ?></strong>.</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<div class="container">
	<div class="shop-layout">
		<aside class="shop-filters">
			<div class="shop-filters__group">
				<h3 class="shop-filters__title">Especie</h3>
				<ul class="shop-filters__list">
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'producto' ) ); ?>">Todas</a></li>
					<?php
					$especies = get_terms( array( 'taxonomy' => 'producto_especie', 'hide_empty' => true ) );
					if ( $especies && ! is_wp_error( $especies ) ) :
						foreach ( $especies as $esp ) :
							$active = ( $esp->term_id === $current_term->term_id );
					?>
						<li>
							<a href="<?php echo esc_url( get_term_link( $esp ) ); ?>" class="<?php echo $active ? 'is-active' : ''; ?>">
								<?php echo esc_html( $esp->name ); ?>
							</a>
						</li>
					<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>
			<div class="shop-filters__group">
				<h3 class="shop-filters__title">Categoría</h3>
				<ul class="shop-filters__list">
					<?php
					$cats = get_terms( array( 'taxonomy' => 'producto_categoria', 'hide_empty' => true ) );
					if ( $cats && ! is_wp_error( $cats ) ) :
						foreach ( $cats as $cat ) :
					?>
						<li><a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></li>
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
					echo '<p>Aún no hay productos para esta especie.</p>';
				endif;
				?>
			</div>

			<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
