<?php
/**
 * Template part: producto card.
 *
 * @package PerritoFeliz
 */

$precio      = function_exists( 'get_field' ) ? get_field( 'precio' ) : 0;
$precio_desc = function_exists( 'get_field' ) ? get_field( 'precio_descuento' ) : 0;
$marca       = function_exists( 'get_field' ) ? get_field( 'marca' ) : '';
$desc_corta  = function_exists( 'get_field' ) ? get_field( 'descripcion_corta' ) : '';
$destacado   = function_exists( 'get_field' ) ? get_field( 'destacado' ) : false;
$color       = function_exists( 'get_field' ) ? get_field( 'color_placeholder' ) : '#2D8659';
$icono       = function_exists( 'get_field' ) ? get_field( 'icono_slug' ) : 'prod-alimento';
?>
<article class="prod-card" data-prod-card>
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
				data-cart-color="<?php echo esc_attr( $color ); ?>">+</button>
		</div>
	</div>
</article>
