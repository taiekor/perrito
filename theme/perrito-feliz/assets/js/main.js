/**
 * Perrito Feliz - Main entry
 *
 * Bootstraps all modules. anime.js v4 is available as a global `anime`
 * (loaded via CDN UMD in inc/enqueue.php).
 */

import { initNav } from './modules/nav.js';
import { initCart } from './modules/cart.js';
import { initForms } from './modules/forms.js';
import { initFilters } from './modules/filters.js';
import { initFAQ } from './modules/faq.js';
import { initScrollReveal } from './animations/scroll-reveal.js';
import { initCounters } from './animations/counters.js';
import { initHeroAnimations } from './animations/hero.js';
import { initSvgDraw } from './animations/svg-draw.js';

const ready = (fn) => {
	if (document.readyState !== 'loading') {
		fn();
	} else {
		document.addEventListener('DOMContentLoaded', fn);
	}
};

ready(() => {
	// Core modules
	initNav();
	initCart();
	initForms();
	initFilters();
	initFAQ();

	// Animations
	initScrollReveal();
	initCounters();
	initHeroAnimations();
	initSvgDraw();

	// Header scroll state
	const header = document.querySelector('[data-nav]');
	if (header) {
		const onScroll = () => {
			if (window.scrollY > 20) {
				header.classList.add('is-scrolled');
			} else {
				header.classList.remove('is-scrolled');
			}
		};
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	}

	// Expose globally for debugging
	window.Perrito = {
		version: '1.0.0',
		config: window.PerritoConfig || {},
	};
});
