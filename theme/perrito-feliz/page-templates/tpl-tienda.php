<?php
/**
 * Template Name: Tienda (hub)
 *
 * Redirects visually to the producto archive with category browsing.
 *
 * @package PerritoFeliz
 */

get_header();

$categorias = array(
	array( 'Alimentos', 'alimentos', 'prod-alimento', '#2D8659', 'Nutrición premium y dietas veterinarias para cada etapa' ),
	array( 'Farmacia', 'farmacia', 'prod-farmacia', '#D8352A', 'Antiparasitarios, suplementos y medicamentos bajo receta' ),
	array( 'Accesorios', 'accesorios', 'prod-accesorio', '#1A2E3D', 'Collares, arneses, camas, transportadoras y más' ),
	array( 'Juguetes', 'juguetes', 'prod-juguete', '#E97B3F', 'Mordedores, interactivos y enriquecimiento ambiental' ),
	array( 'Ropa', 'ropa', 'prod-ropa', '#6B8293', 'Chalecos, parkas, impermeables y botitas para el frío' ),
	array( 'Higiene', 'higiene', 'prod-higiene', '#4FA577', 'Shampoos, toallitas, cepillos y arena sanitaria' ),
);
?>

<section class="shop-header">
	<div class="container">
		<?php perrito_breadcrumbs(); ?>
		<div class="hero__content hero__content--centered">
			<span class="eyebrow">Tienda veterinaria</span>
			<h1 class="hero__title">Todo lo que tu mascota necesita</h1>
			<p class="hero__subtitle">Productos seleccionados por nuestro equipo veterinario. Alimentos premium, farmacia, accesorios y más. Despacho en Santiago o retiro en clínica.</p>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<header class="section__header" data-reveal>
			<span class="eyebrow">Explora por categoría</span>
			<h2 class="section__title">Nuestras categorías</h2>
		</header>

		<div class="grid grid--3 grid--lg">
			<?php foreach ( $categorias as $i => $cat ) : ?>
				<a href="<?php echo esc_url( home_url( '/tienda/' ) ); ?>" class="card" data-reveal data-reveal-delay="<?php echo ( $i % 3 ) * 80; ?>" style="text-decoration: none; color: inherit;">
					<div style="padding: var(--sp-8); text-align: center;">
						<div style="width: 90px; height: 90px; margin: 0 auto var(--sp-5); background: <?php echo esc_attr( $cat[3] ); ?>15; border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; color: <?php echo esc_attr( $cat[3] ); ?>;">
							<?php perrito_the_svg( 'icons/' . $cat[2] . '.svg' ); ?>
						</div>
						<h3 style="font-size: var(--fs-xl); margin-bottom: var(--sp-2);"><?php echo esc_html( $cat[0] ); ?></h3>
						<p style="color: var(--c-gray-500); font-size: var(--fs-sm); margin-bottom: var(--sp-4);"><?php echo esc_html( $cat[4] ); ?></p>
						<span style="color: var(--c-primary); font-weight: 600; font-size: var(--fs-sm);">Ver productos →</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--alt">
	<div class="container">
		<header class="section__header" data-reveal>
			<span class="eyebrow">Destacados del mes</span>
			<h2 class="section__title">Productos recomendados por nuestro equipo</h2>
		</header>
		<div class="shop-grid">
			<?php
			$destacados = new WP_Query( array(
				'post_type'      => 'producto',
				'posts_per_page' => 8,
				'meta_query'     => array(
					array(
						'key'     => 'destacado',
						'value'   => '1',
						'compare' => '=',
					),
				),
			) );
			if ( $destacados->have_posts() ) :
				while ( $destacados->have_posts() ) :
					$destacados->the_post();
					get_template_part( 'template-parts/cards/card-producto' );
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p class="text-muted">Los productos destacados apareceran aqui cuando se registren en la tienda.</p>';
			endif;
			?>
		</div>
		<div class="flex justify-center mt-8" data-reveal>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'producto' ) ); ?>" class="btn btn--primary btn--lg">Ver toda la tienda</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
