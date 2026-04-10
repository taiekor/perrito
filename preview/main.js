/**
 * Preview bootstrap.
 *
 * 1. Hydrates SVG placeholders by fetching the real files from the theme
 *    assets folder and injecting them inline (so the SVG draw animation can
 *    target paths inside them).
 * 2. Imports the theme main.js (ES module) so the same animation and UI
 *    modules that run on the production WordPress site also run in preview.
 */

const THEME_ASSETS = '../theme/perrito-feliz/assets';

async function hydrateSvgs() {
	const targets = document.querySelectorAll('[data-svg-src]');
	await Promise.all(
		Array.from(targets).map(async (el) => {
			const src = el.getAttribute('data-svg-src');
			if (!src) return;
			try {
				const res = await fetch(src);
				if (!res.ok) throw new Error(`${res.status} ${res.statusText}`);
				const text = await res.text();
				// Strip XML prolog if present
				el.innerHTML = text.replace(/<\?xml[^>]*\?>/i, '');
			} catch (err) {
				console.warn('[preview] SVG load failed:', src, err);
				el.innerHTML = `<div style="padding:2rem;text-align:center;color:#6B8293;">SVG no disponible</div>`;
			}
		})
	);
}

async function boot() {
	await hydrateSvgs();
	try {
		await import(`${THEME_ASSETS}/js/main.js`);
	} catch (err) {
		console.error('[preview] Theme JS import failed:', err);
	}

	// Mock Perrito config (normally injected by wp_localize_script).
	window.PerritoConfig = window.PerritoConfig || {
		themeUri: '../theme/perrito-feliz',
		homeUrl: '#',
		cartPage: '#cart',
		whatsapp: '56966128834',
		telefono: '56229874410',
		isLanding: false,
	};
}

boot();
