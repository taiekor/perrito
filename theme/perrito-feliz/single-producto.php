<?php
/**
 * Single producto template.
 *
 * @package PerritoFeliz
 */

get_header();

while ( have_posts() ) :
	the_post();
	$precio      = function_exists( 'get_field' ) ? get_field( 'precio' ) : 0;
	$precio_desc = function_exists( 'get_field' ) ? get_field( 'precio_descuento' ) : 0;
	$marca       = function_exists( 'get_field' ) ? get_field( 'marca' ) : '';
	$peso        = function_exists( 'get_field' ) ? get_field( 'peso_o_unidad' ) : '';
	$stock       = function_exists( 'get_field' ) ? get_field( 'stock_estado' ) : 'disponible';
	$desc_corta  = function_exists( 'get_field' ) ? get_field( 'descripcion_corta' ) : '';
	$caracts     = function_exists( 'get_field' ) ? get_field( 'caracteristicas' ) : array();
	$color       = function_exists( 'get_field' ) ? get_field( 'color_placeholder' ) : '#2D8659';
	$icono       = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : 'prod-alimento';
	?>

	<section class="prod-page">
		<div class="container">
			<?php perrito_breadcrumbs(); ?>
			<div class="prod-page__grid">

				<div class="prod-page__media" style="background: <?php echo esc_attr( $color ); ?>15;" data-reveal data-svg-draw>
					<div style="color: <?php echo esc_attr( $color ); ?>; display: flex;">
						<?php perrito_the_svg( 'icons/' . ( $icono ?: 'prod-alimento' ) . '.svg' ); ?>
					</div>
				</div>

				<div data-reveal data-reveal-delay="100">
					<?php if ( $marca ) : ?>
						<span class="prod-page__brand"><?php echo esc_html( $marca ); ?></span>
					<?php endif; ?>
					<h1 class="prod-page__title"><?php the_title(); ?></h1>

					<div class="prod-page__price-row">
						<?php if ( $precio_desc ) : ?>
							<span class="prod-page__price-old"><?php echo esc_html( perrito_price( $precio ) ); ?></span>
							<span class="prod-page__price"><?php echo esc_html( perrito_price( $precio_desc ) ); ?></span>
						<?php else : ?>
							<span class="prod-page__price"><?php echo esc_html( perrito_price( $precio ) ); ?></span>
						<?php endif; ?>
					</div>

					<div class="prod-page__stock">
						<span class="prod-page__stock-dot"></span>
						<?php
						switch ( $stock ) {
							case 'agotado':
								echo 'Agotado temporalmente';
								break;
							case 'pocas':
								echo 'Pocas unidades';
								break;
							default:
								echo 'Disponible - Envío programado';
						}
						?>
					</div>

					<p class="prod-page__desc"><?php echo esc_html( $desc_corta ?: get_the_excerpt() ); ?></p>

					<?php if ( ! empty( $caracts ) ) : ?>
						<ul class="prod-page__features">
							<?php foreach ( $caracts as $c ) : ?>
								<li>
									<?php perrito_the_svg( 'icons/ui-check.svg' ); ?>
									<?php echo esc_html( $c['item'] ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<?php if ( $peso ) : ?>
						<p class="text-muted" style="font-size: var(--fs-sm); margin-bottom: var(--sp-6);"><strong>Formato:</strong> <?php echo esc_html( $peso ); ?></p>
					<?php endif; ?>

					<div class="prod-page__actions">
						<button class="btn btn--primary btn--lg"
							data-cart-add="<?php the_ID(); ?>"
							data-cart-title="<?php the_title_attribute(); ?>"
							data-cart-price="<?php echo esc_attr( $precio_desc ?: $precio ); ?>"
							data-cart-color="<?php echo esc_attr( $color ); ?>">
							Agregar al carrito
						</button>
						<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ), 'Hola, quiero info sobre ' . get_the_title() ) ); ?>" class="btn btn--outline btn--lg" target="_blank" rel="noopener">
							Preguntar por WhatsApp
						</a>
					</div>
				</div>

			</div>

			<div class="prose section" data-reveal>
				<h2>Sobre este producto</h2>
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
