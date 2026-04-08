/**
 * Animated counters - numbers count up from 0 to target when visible.
 * Uses anime.js v4 animate() with { modifier }.
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export function initCounters() {
	const counters = document.querySelectorAll('[data-counter]');
	if (!counters.length) return;

	if (prefersReducedMotion) {
		counters.forEach((el) => {
			el.textContent = el.dataset.counter;
		});
		return;
	}

	const { animate } = window.anime || {};
	if (!animate) {
		counters.forEach((el) => {
			el.textContent = el.dataset.counter;
		});
		return;
	}

	const formatNumber = (n, format) => {
		if (format === 'comma') return Math.round(n).toLocaleString('es-CL');
		if (format === 'decimal') return n.toFixed(1);
		return Math.round(n).toString();
	};

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) return;
				const el = entry.target;
				const target = parseFloat(el.dataset.counter);
				const format = el.dataset.counterFormat || 'integer';
				const prefix = el.dataset.counterPrefix || '';
				const suffix = el.dataset.counterSuffix || '';
				const duration = parseInt(el.dataset.counterDuration || '2000', 10);

				const state = { value: 0 };
				animate(state, {
					value: target,
					duration,
					ease: 'out(2)',
					onUpdate: () => {
						el.textContent = `${prefix}${formatNumber(state.value, format)}${suffix}`;
					},
				});
				observer.unobserve(el);
			});
		},
		{ threshold: 0.5 }
	);

	counters.forEach((el) => observer.observe(el));
}
