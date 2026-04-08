<?php
/**
 * Template Name: Checkout
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<h1 class="hero__title">Finalizar compra</h1>
		<p class="hero__subtitle">Completa tus datos. Esta es una web de demostración y el pago no se procesa realmente.</p>
	</div>
</section>

<section class="section">
	<div class="container container--narrow">
		<form class="form" data-fake-form>
			<div class="form__success-msg">Gracias. Tu pedido simulado fue recibido.</div>
			<div class="form__error-msg">Por favor revisa los campos marcados.</div>

			<h3 class="mb-4">Datos de envío</h3>
			<div class="form__row">
				<div class="form__field">
					<label class="form__label form__label--required" for="nombre">Nombre</label>
					<input class="form__control" type="text" id="nombre" name="nombre" required>
					<span class="form__error">Requerido</span>
				</div>
				<div class="form__field">
					<label class="form__label form__label--required" for="apellido">Apellido</label>
					<input class="form__control" type="text" id="apellido" name="apellido" required>
					<span class="form__error">Requerido</span>
				</div>
			</div>

			<div class="form__row">
				<div class="form__field">
					<label class="form__label form__label--required" for="email">Email</label>
					<input class="form__control" type="email" id="email" name="email" required>
					<span class="form__error">Email válido</span>
				</div>
				<div class="form__field">
					<label class="form__label form__label--required" for="telefono">Teléfono</label>
					<input class="form__control" type="tel" id="telefono" name="telefono" required>
					<span class="form__error">Requerido</span>
				</div>
			</div>

			<div class="form__field">
				<label class="form__label form__label--required" for="direccion">Dirección</label>
				<input class="form__control" type="text" id="direccion" name="direccion" required>
				<span class="form__error">Requerido</span>
			</div>

			<div class="form__row">
				<div class="form__field">
					<label class="form__label form__label--required" for="comuna">Comuna</label>
					<select class="form__control" id="comuna" name="comuna" required>
						<option value="">Selecciona tu comuna</option>
						<option>Ñuñoa</option>
						<option>Providencia</option>
						<option>La Reina</option>
						<option>Macul</option>
						<option>Santiago Centro</option>
						<option>Las Condes</option>
						<option>Vitacura</option>
						<option>Otra</option>
					</select>
					<span class="form__error">Requerido</span>
				</div>
				<div class="form__field">
					<label class="form__label" for="notas">Notas</label>
					<input class="form__control" type="text" id="notas" name="notas" placeholder="Opcional">
				</div>
			</div>

			<h3 class="mt-6 mb-4">Datos de pago (demo)</h3>
			<div class="form__field">
				<label class="form__label form__label--required" for="tarjeta">Número de tarjeta</label>
				<input class="form__control" type="text" id="tarjeta" name="tarjeta" placeholder="0000 0000 0000 0000" required maxlength="19">
				<span class="form__help">Sitio de demostración - no ingreses tu tarjeta real</span>
			</div>
			<div class="form__row">
				<div class="form__field">
					<label class="form__label form__label--required" for="expiracion">Vencimiento</label>
					<input class="form__control" type="text" id="expiracion" name="expiracion" placeholder="MM/AA" required maxlength="5">
				</div>
				<div class="form__field">
					<label class="form__label form__label--required" for="cvv">CVV</label>
					<input class="form__control" type="text" id="cvv" name="cvv" placeholder="123" required maxlength="4">
				</div>
			</div>

			<button type="submit" class="btn btn--primary btn--lg btn--block" data-fake-checkout>Pagar ahora (demo)</button>
			<p class="text-muted text-center" style="font-size: var(--fs-xs); margin-top: var(--sp-4);">Al hacer clic en "Pagar ahora" se simulará un pedido. Esta es una web de demostración ficticia.</p>
		</form>
	</div>
</section>

<?php get_footer(); ?>
