<?php
/**
 * Header template.
 *
 * @package PerritoFeliz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#2D8659">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Saltar al contenido', 'perrito-feliz' ); ?></a>

<?php if ( perrito_option( 'banner_urgencia_activo', true ) && ! is_singular( 'landing' ) ) : ?>
	<div class="urgency-bar" role="region" aria-label="Urgencia 24/7">
		<div class="container urgency-bar__inner">
			<span class="urgency-bar__icon" aria-hidden="true">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
			</span>
			<span class="urgency-bar__text"><?php echo esc_html( perrito_option( 'mensaje_urgencia' ) ); ?></span>
			<a href="<?php echo esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ); ?>" class="urgency-bar__cta" data-tracking="urgency_bar_call">
				<?php echo esc_html( perrito_option( 'telefono_principal' ) ); ?>
			</a>
		</div>
	</div>
<?php endif; ?>

<header class="site-header" data-nav>
	<div class="container site-header__inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="Perrito Feliz - Inicio">
			<?php perrito_the_svg( 'logo.svg', 'site-logo__svg' ); ?>
			<span class="site-logo__text">
				<span class="site-logo__name">Perrito Feliz</span>
				<span class="site-logo__tagline">Clinica veterinaria Nunoa</span>
			</span>
		</a>

		<?php if ( is_singular( 'landing' ) ) : ?>
			<div class="site-header__landing-cta">
				<a href="<?php echo esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ); ?>" class="btn btn--primary btn--sm" data-tracking="landing_header_call">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
					<?php echo esc_html( perrito_option( 'telefono_principal' ) ); ?>
				</a>
			</div>
		<?php else : ?>
			<button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="Abrir menu">
				<span class="nav-toggle__bar"></span>
				<span class="nav-toggle__bar"></span>
				<span class="nav-toggle__bar"></span>
			</button>

			<nav id="primary-nav" class="primary-nav" aria-label="Menu principal">
				<?php perrito_nav_menu( 'primary', 'nav-menu' ); ?>
				<div class="primary-nav__actions">
					<a href="<?php echo esc_url( home_url( '/carrito/' ) ); ?>" class="nav-cart" aria-label="Ver carrito" data-cart-toggle>
						<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
						<span class="nav-cart__badge" data-cart-count>0</span>
					</a>
					<a href="#" class="btn btn--primary btn--sm" onclick="event.preventDefault();document.querySelector('#main')?.scrollIntoView({behavior:'smooth'});">Agendar</a>
				</div>
			</nav>
		<?php endif; ?>
	</div>
</header>

<main id="main" class="site-main">
