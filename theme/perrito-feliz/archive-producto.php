<?php
/**
 * Archive: Productos (tienda).
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="shop-header">
	<div class="container">
		<?php perrito_breadcrumbs(); ?>
		<div class="hero__content hero__content--centered">
			<span class="eyebrow">Tienda veterinaria</span>
			<h1 class="hero__title">Productos seleccionados por veterinarios</h1>
			<p class="hero__subtitle">Alimentos premium, farmacia, accesorios, juguetes, higiene y todo lo que tu mascota necesita. Todo validado por nuestro equipo clínico.</p>
		</div>
	</div>
</section>

<div class="container">
	<div class="shop-layout">
		<aside class="shop-filters">
			<div class="shop-filters__group">
				<h3 class="shop-filters__title">Categoría</h3>
				<ul class="shop-filters__list">
					<li><label><input type="radio" name="category" value="all" checked data-shop-filter> Todas</label></li>
					<?php
					$cats = get_terms( array( 'taxonomy' => 'producto_categoria', 'hide_empty' => true ) );
					if ( $cats && ! is_wp_error( $cats ) ) :
						foreach ( $cats as $cat ) :
					?>
						<li><label><input type="radio" name="category" value="<?php echo esc_attr( $cat->slug ); ?>" data-shop-filter> <?php echo esc_html( $cat->name ); ?></label></li>
					<?php
						endforeach;
					else :
						foreach ( array( 'Alimentos', 'Farmacia', 'Accesorios', 'Juguetes', 'Ropa', 'Higiene' ) as $stub ) :
					?>
						<li><label><input type="radio" name="category" value="<?php echo esc_attr( strtolower( $stub ) ); ?>" data-shop-filter> <?php echo esc_html( $stub ); ?></label></li>
					<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>
			<div class="shop-filters__group">
				<h3 class="shop-filters__title">Especie</h3>
				<ul class="shop-filters__list">
					<li><label><input type="radio" name="species" value="all" checked data-shop-filter> Todas</label></li>
					<li><label><input type="radio" name="species" value="perro" data-shop-filter> Perros</label></li>
					<li><label><input type="radio" name="species" value="gato" data-shop-filter> Gatos</label></li>
				</ul>
			</div>
		</aside>

		<div>
			<div class="shop-toolbar">
				<span class="shop-results-count"><span data-shop-count><?php echo intval( $GLOBALS['wp_query']->found_posts ); ?> productos</span></span>
				<select class="form__control" style="max-width: 200px;">
					<option>Más relevantes</option>
					<option>Precio ascendente</option>
					<option>Precio descendente</option>
					<option>Destacados</option>
				</select>
			</div>

			<div class="shop-grid" data-shop-grid>
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$precio     = function_exists( 'get_field' ) ? get_field( 'precio' ) : 0;
						$precio_desc = function_exists( 'get_field' ) ? get_field( 'precio_descuento' ) : 0;
						$marca      = function_exists( 'get_field' ) ? get_field( 'marca' ) : '';
						$desc_corta = function_exists( 'get_field' ) ? get_field( 'descripcion_corta' ) : '';
						$destacado  = function_exists( 'get_field' ) ? get_field( 'destacado' ) : false;
						$color      = function_exists( 'get_field' ) ? get_field( 'color_placeholder' ) : '#2D8659';
						$icono      = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : 'prod-alimento';
						$cats_list  = wp_get_post_terms( get_the_ID(), 'producto_categoria', array( 'fields' => 'slugs' ) );
						$esp_list   = wp_get_post_terms( get_the_ID(), 'producto_especie', array( 'fields' => 'slugs' ) );
						?>
						<article class="prod-card" data-prod-card data-prod-category="<?php echo esc_attr( implode( ',', (array) $cats_list ) ); ?>" data-prod-species="<?php echo esc_attr( implode( ',', (array) $esp_list ) ); ?>">
							<div class="prod-card__media" style="background: <?php echo esc_attr( $color ); ?>15;">
								<?php if ( $destacado ) : ?>
									<span class="prod-card__badge">Destacado</span>
								<?php endif; ?>
								<div style="color: <?php echo esc_attr( $color ); ?>;">
									<?php perrito_the_svg( 'icons/' . ( $icono ?: 'prod-alimento' ) . '.svg' ); ?>
								</div>
							</div>
							<div class="prod-card__body">
								<?php if ( $marca ) : ?><span class="prod-card__brand"><?php echo esc_html( $marca ); ?></span><?php endif; ?>
								<h3 class="prod-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="prod-card__desc"><?php echo esc_html( $desc_corta ?: perrito_excerpt( get_the_excerpt(), 14 ) ); ?></p>
								<div class="prod-card__footer">
									<div>
										<?php if ( $precio_desc ) : ?>
											<span class="prod-card__price-old"><?php echo esc_html( perrito_price( $precio ) ); ?></span>
											<span class="prod-card__price"><?php echo esc_html( perrito_price( $precio_desc ) ); ?></span>
										<?php else : ?>
											<span class="prod-card__price"><?php echo esc_html( perrito_price( $precio ) ); ?></span>
										<?php endif; ?>
									</div>
									<button class="btn btn--primary btn--sm"
										data-cart-add="<?php the_ID(); ?>"
										data-cart-title="<?php the_title_attribute(); ?>"
										data-cart-price="<?php echo esc_attr( $precio_desc ?: $precio ); ?>"
										data-cart-color="<?php echo esc_attr( $color ); ?>"
										aria-label="Agregar <?php the_title_attribute(); ?> al carrito">
										+
									</button>
								</div>
							</div>
						</article>
					<?php
					endwhile;
				else :
					echo '<p>Todavía no hay productos en la tienda.</p>';
				endif;
				?>
			</div>

			<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
