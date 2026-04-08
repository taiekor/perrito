/**
 * SVG path-draw animation using anime.js v4 svg.createDrawable
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export function initSvgDraw() {
	if (prefersReducedMotion) return;

	const elements = document.querySelectorAll('[data-svg-draw]');
	if (!elements.length) return;

	const { animate, svg } = window.anime || {};
	if (!animate || !svg || !svg.createDrawable) return;

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) return;
				const container = entry.target;
				const paths = container.querySelectorAll('path, line, polyline, rect, circle, ellipse, polygon');
				if (!paths.length) {
					observer.unobserve(container);
					return;
				}

				try {
					const drawables = svg.createDrawable(Array.from(paths));
					animate(drawables, {
						draw: ['0 0', '0 1'],
						duration: 2000,
						delay: (_, i) => i * 60,
						ease: 'inOut(3)',
					});
				} catch (err) {
					// Fallback: just fade in the SVG if drawable not available
					animate(container, {
						opacity: [0, 1],
						duration: 1000,
						ease: 'out(3)',
					});
				}

				observer.unobserve(container);
			});
		},
		{ threshold: 0.2 }
	);

	elements.forEach((el) => observer.observe(el));
}
