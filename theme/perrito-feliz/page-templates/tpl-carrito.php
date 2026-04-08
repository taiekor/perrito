<?php
/**
 * Template Name: Carrito
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<h1 class="hero__title">Tu carrito</h1>
		<p class="hero__subtitle">Revisa los productos antes de finalizar la compra. Este es un sitio de demostración: los pedidos no se procesan realmente.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div data-cart-page>
			<!-- Rendered by JS -->
			<div class="cart-empty">
				<p class="cart-empty__text">Cargando...</p>
			</div>
		</div>
	</div>
</section>

<style>
.cart-page { display: grid; grid-template-columns: 1.5fr 1fr; gap: var(--sp-8); }
@media (max-width: 768px) { .cart-page { grid-template-columns: 1fr; } }
.cart-page__items { background: var(--c-white); border: 1px solid var(--c-gray-100); border-radius: var(--radius-lg); padding: var(--sp-6); }
.cart-page__summary { background: var(--c-accent-light); border-radius: var(--radius-lg); padding: var(--sp-8); align-self: start; position: sticky; top: 100px; }
.cart-page__summary h3 { margin-bottom: var(--sp-5); }
.cart-page__row { display: flex; justify-content: space-between; padding: var(--sp-3) 0; border-bottom: 1px solid var(--c-gray-200); font-size: var(--fs-sm); }
.cart-page__row--total { font-size: var(--fs-lg); color: var(--c-gray-900); border-bottom: none; margin: var(--sp-3) 0 var(--sp-5); padding-top: var(--sp-4); border-top: 2px solid var(--c-gray-900); }
.cart-page__note { font-size: var(--fs-xs); color: var(--c-gray-500); margin-top: var(--sp-4); text-align: center; font-style: italic; }
</style>

<?php get_footer(); ?>
