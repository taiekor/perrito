/**
 * Navigation: mobile toggle, sticky header, scroll behavior.
 */

export function initNav() {
	const toggle = document.querySelector('.nav-toggle');
	const nav = document.querySelector('#primary-nav');
	if (toggle && nav) {
		toggle.addEventListener('click', () => {
			const expanded = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', String(!expanded));
			nav.classList.toggle('is-open');
			document.body.classList.toggle('nav-open', !expanded);

			if (!expanded && window.anime) {
				const items = nav.querySelectorAll('.nav-menu li, .primary-nav__actions > *');
				if (items.length) {
					window.anime.animate(items, {
						opacity: [0, 1],
						translateX: [20, 0],
						duration: 500,
						delay: window.anime.stagger(60, { start: 100 }),
						ease: 'out(3)',
					});
				}
			}
		});

		// Close on link click (mobile)
		nav.querySelectorAll('a').forEach((link) => {
			link.addEventListener('click', () => {
				if (window.innerWidth < 960) {
					toggle.setAttribute('aria-expanded', 'false');
					nav.classList.remove('is-open');
					document.body.classList.remove('nav-open');
				}
			});
		});

		// Close on escape
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape' && nav.classList.contains('is-open')) {
				toggle.setAttribute('aria-expanded', 'false');
				nav.classList.remove('is-open');
				document.body.classList.remove('nav-open');
				toggle.focus();
			}
		});
	}
}
