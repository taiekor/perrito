/**
 * Scroll reveal animations using IntersectionObserver + anime.js v4
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export function initScrollReveal() {
	const elements = document.querySelectorAll('[data-reveal]');
	if (!elements.length) return;

	if (prefersReducedMotion) {
		elements.forEach((el) => el.classList.add('is-revealed'));
		return;
	}

	const { animate } = window.anime || {};
	if (!animate) {
		elements.forEach((el) => el.classList.add('is-revealed'));
		return;
	}

	const revealed = new WeakSet();

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting && !revealed.has(entry.target)) {
					const el = entry.target;
					revealed.add(el);

					const delay = parseInt(el.dataset.revealDelay || '0', 10);
					const duration = parseInt(el.dataset.revealDuration || '800', 10);

					animate(el, {
						opacity: [0, 1],
						translateY: [30, 0],
						duration,
						delay,
						ease: 'out(3)',
					});

					el.classList.add('is-revealed');
					observer.unobserve(el);
				}
			});
		},
		{
			threshold: 0.12,
			rootMargin: '0px 0px -50px 0px',
		}
	);

	elements.forEach((el) => observer.observe(el));
}

/**
 * Stagger reveal for children of a container.
 */
export function staggerReveal(selector, options = {}) {
	const container = typeof selector === 'string' ? document.querySelector(selector) : selector;
	if (!container) return;

	const { animate, stagger } = window.anime || {};
	if (!animate) return;

	const children = container.children;
	if (!children.length) return;

	animate(children, {
		opacity: [0, 1],
		translateY: [30, 0],
		duration: 700,
		delay: stagger(100, { start: options.start || 0 }),
		ease: 'out(3)',
	});
}
