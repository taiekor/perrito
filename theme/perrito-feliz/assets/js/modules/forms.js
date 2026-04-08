/**
 * Forms - fake submit with validation.
 */

export function initForms() {
	document.querySelectorAll('[data-fake-form]').forEach((form) => {
		form.addEventListener('submit', (e) => {
			e.preventDefault();

			// Clear previous states
			form.querySelectorAll('.form__field').forEach((field) => field.classList.remove('is-invalid'));
			form.classList.remove('is-success', 'is-error');

			// HTML5 validation
			if (!form.checkValidity()) {
				form.querySelectorAll(':invalid').forEach((input) => {
					input.closest('.form__field')?.classList.add('is-invalid');
				});
				form.classList.add('is-error');
				return;
			}

			const submitBtn = form.querySelector('[type="submit"]');
			const originalText = submitBtn?.textContent;
			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.textContent = 'Enviando...';
			}

			// Simulate network delay
			setTimeout(() => {
				form.classList.add('is-success');
				form.reset();
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.textContent = originalText || 'Enviar';
				}
				// Scroll to success message
				form.querySelector('.form__success-msg')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
			}, 800);
		});
	});
}
