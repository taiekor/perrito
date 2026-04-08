<?php
/**
 * Template Name: Contacto
 *
 * @package PerritoFeliz
 */

get_header(); ?>

<section class="hero hero--small">
	<div class="container container--narrow">
		<?php perrito_breadcrumbs(); ?>
		<span class="eyebrow">Estamos para ayudarte</span>
		<h1 class="hero__title">Contacto</h1>
		<p class="hero__subtitle">Agenda una consulta, solicita información o pide nuestra ambulancia veterinaria. Respondemos rápido por cualquiera de nuestros canales.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="grid grid--split">
			<div data-reveal>
				<h2>Escríbenos</h2>
				<p>Completa el formulario y te responderemos a la brevedad. Para urgencias, llama directamente al <strong><?php echo esc_html( perrito_option( 'telefono_principal' ) ); ?></strong>.</p>

				<form class="form" data-fake-form style="margin-top: var(--sp-6);">
					<div class="form__success-msg">Mensaje enviado (demo). Te contactaremos pronto.</div>
					<div class="form__error-msg">Por favor revisa los campos.</div>

					<div class="form__field">
						<label class="form__label form__label--required" for="c-nombre">Nombre</label>
						<input class="form__control" type="text" id="c-nombre" name="nombre" required>
						<span class="form__error">Requerido</span>
					</div>
					<div class="form__row">
						<div class="form__field">
							<label class="form__label form__label--required" for="c-email">Email</label>
							<input class="form__control" type="email" id="c-email" name="email" required>
							<span class="form__error">Email válido</span>
						</div>
						<div class="form__field">
							<label class="form__label form__label--required" for="c-tel">Teléfono</label>
							<input class="form__control" type="tel" id="c-tel" name="telefono" required>
							<span class="form__error">Requerido</span>
						</div>
					</div>
					<div class="form__field">
						<label class="form__label" for="c-tipo">Motivo de contacto</label>
						<select class="form__control" id="c-tipo" name="tipo">
							<option>Agendar consulta</option>
							<option>Urgencia veterinaria</option>
							<option>Información de servicios</option>
							<option>Compra en tienda</option>
							<option>Otro</option>
						</select>
					</div>
					<div class="form__field">
						<label class="form__label form__label--required" for="c-mensaje">Mensaje</label>
						<textarea class="form__control" id="c-mensaje" name="mensaje" required></textarea>
						<span class="form__error">Requerido</span>
					</div>
					<button type="submit" class="btn btn--primary btn--lg">Enviar mensaje</button>
				</form>
			</div>

			<aside data-reveal data-reveal-delay="100">
				<div class="svc-aside__card">
					<h3>Información de contacto</h3>
					<p>Atendemos de lunes a domingo en Av. Irarrázaval 2450, Ñuñoa. Urgencias 24/7 con ambulancia veterinaria.</p>

					<ul class="site-footer__list site-footer__list--contact" style="margin-bottom: var(--sp-6);">
						<li>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
							<?php echo esc_html( perrito_option( 'direccion' ) ); ?>
						</li>
						<li>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
							<a href="<?php echo esc_url( perrito_tel_link( perrito_option( 'telefono_principal_raw' ) ) ); ?>" style="color:#fff;"><?php echo esc_html( perrito_option( 'telefono_principal' ) ); ?></a>
						</li>
						<li>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
							<a href="<?php echo esc_url( perrito_wa_link( perrito_option( 'whatsapp_raw' ) ) ); ?>" target="_blank" rel="noopener" style="color:#fff;">WhatsApp <?php echo esc_html( perrito_option( 'whatsapp' ) ); ?></a>
						</li>
						<li>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
							<a href="mailto:<?php echo esc_attr( perrito_option( 'email' ) ); ?>" style="color:#fff;"><?php echo esc_html( perrito_option( 'email' ) ); ?></a>
						</li>
					</ul>

					<div style="padding-top: var(--sp-5); border-top: 1px solid rgba(255,255,255,0.1);">
						<strong style="color: #fff; display: block; margin-bottom: var(--sp-2);">Horarios</strong>
						<p style="margin: 0; font-size: var(--fs-sm);"><?php echo nl2br( esc_html( perrito_option( 'horarios' ) ) ); ?></p>
					</div>
				</div>
			</aside>
		</div>
	</div>
</section>

<?php get_footer(); ?>
