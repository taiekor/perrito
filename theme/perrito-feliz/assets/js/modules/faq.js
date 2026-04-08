/**
 * FAQ accordion.
 */

export function initFAQ() {
	document.querySelectorAll('[data-faq-item]').forEach((item) => {
		const q = item.querySelector('[data-faq-q]');
		if (!q) return;
		q.addEventListener('click', () => {
			const isOpen = item.classList.contains('is-open');
			// Optional: close others in same group
			const group = item.closest('[data-faq-group]');
			if (group && !isOpen) {
				group.querySelectorAll('[data-faq-item].is-open').forEach((el) => el.classList.remove('is-open'));
			}
			item.classList.toggle('is-open');
			q.setAttribute('aria-expanded', String(!isOpen));
		});
	});
}
