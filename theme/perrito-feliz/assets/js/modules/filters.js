/**
 * Shop filters - client-side filtering of product cards.
 */

export function initFilters() {
	const grid = document.querySelector('[data-shop-grid]');
	const filters = document.querySelectorAll('[data-shop-filter]');
	if (!grid || !filters.length) return;

	const active = { category: 'all', species: 'all' };

	const applyFilters = () => {
		const cards = grid.querySelectorAll('[data-prod-card]');
		let visible = 0;
		cards.forEach((card) => {
			const cat = card.dataset.prodCategory || '';
			const sp = card.dataset.prodSpecies || '';
			const matchCat = active.category === 'all' || cat.includes(active.category);
			const matchSp = active.species === 'all' || sp.includes(active.species);
			const show = matchCat && matchSp;
			card.style.display = show ? '' : 'none';
			if (show) visible++;
		});

		const count = document.querySelector('[data-shop-count]');
		if (count) count.textContent = `${visible} productos`;
	};

	filters.forEach((filter) => {
		filter.addEventListener('change', (e) => {
			const type = e.target.name;
			active[type] = e.target.value;
			applyFilters();
		});
	});

	applyFilters();
}
