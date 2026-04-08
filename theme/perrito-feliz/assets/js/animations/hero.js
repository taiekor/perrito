/**
 * Hero entrance animations - stagger title words, fade subtitle, scale CTA.
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export function initHeroAnimations() {
	if (prefersReducedMotion) return;

	const hero = document.querySelector('[data-hero-anim]');
	if (!hero) return;

	const { animate, stagger } = window.anime || {};
	if (!animate) return;

	// Split the title into word spans for staggered reveal.
	const title = hero.querySelector('[data-hero-title]');
	if (title && !title.dataset.split) {
		const text = title.textContent;
		title.dataset.split = '1';
		title.innerHTML = text
			.split(/(\s+)/)
			.map((word) => {
				if (!word.trim()) return word;
				return `<span class="hero-word" style="display:inline-block;opacity:0;transform:translateY(40px);">${word}</span>`;
			})
			.join('');

		animate('.hero-word', {
			opacity: [0, 1],
			translateY: [40, 0],
			duration: 900,
			delay: stagger(60),
			ease: 'out(3)',
		});
	}

	// Subtitle fade up
	const subtitle = hero.querySelector('[data-hero-subtitle]');
	if (subtitle) {
		animate(subtitle, {
			opacity: [0, 1],
			translateY: [24, 0],
			duration: 900,
			delay: 600,
			ease: 'out(3)',
		});
	}

	// Actions scale in
	const actions = hero.querySelector('[data-hero-actions]');
	if (actions) {
		animate(actions, {
			opacity: [0, 1],
			translateY: [20, 0],
			duration: 700,
			delay: 900,
			ease: 'out(3)',
		});
	}

	// Trust signals stagger
	const trustItems = hero.querySelectorAll('[data-hero-trust] > *');
	if (trustItems.length) {
		animate(trustItems, {
			opacity: [0, 1],
			translateY: [16, 0],
			duration: 700,
			delay: stagger(80, { start: 1100 }),
			ease: 'out(3)',
		});
	}

	// Visual / illustration fade in from right
	const visual = hero.querySelector('[data-hero-visual]');
	if (visual) {
		animate(visual, {
			opacity: [0, 1],
			translateX: [40, 0],
			duration: 1100,
			delay: 300,
			ease: 'out(3)',
		});
	}

	// Floating cards with slight delay
	const floatingCards = hero.querySelectorAll('[data-hero-floating]');
	if (floatingCards.length) {
		animate(floatingCards, {
			opacity: [0, 1],
			scale: [0.8, 1],
			duration: 800,
			delay: stagger(200, { start: 1400 }),
			ease: 'out(4)',
		});
	}
}
