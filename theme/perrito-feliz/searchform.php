<?php
/**
 * Search form.
 *
 * @package PerritoFeliz
 */

?>
<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="perrito-s-<?php echo esc_attr( uniqid() ); ?>">Buscar en Perrito Feliz</label>
	<div class="searchform__wrap">
		<span class="searchform__icon" aria-hidden="true">
			<?php perrito_the_svg( 'icons/ui-search.svg' ); ?>
		</span>
		<input
			type="search"
			class="searchform__input"
			id="perrito-s-<?php echo esc_attr( uniqid() ); ?>"
			name="s"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			placeholder="Buscar servicios, productos, notas…"
			aria-label="Buscar en el sitio" />
		<button type="submit" class="searchform__submit btn btn--primary btn--sm">Buscar</button>
	</div>
</form>
