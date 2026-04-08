/**
 * Cart module - localStorage-based fake shopping cart.
 *
 * API:
 *   cart.add(product)       // { id, title, price, image, qty }
 *   cart.remove(id)
 *   cart.updateQty(id, qty)
 *   cart.clear()
 *   cart.get()              // returns items array
 *   cart.total()            // returns total CLP
 *   cart.count()            // returns total qty
 */

const STORAGE_KEY = 'perrito_cart_v1';

const formatCLP = (n) => '$' + Math.round(n).toLocaleString('es-CL');

const readStorage = () => {
	try {
		const raw = localStorage.getItem(STORAGE_KEY);
		return raw ? JSON.parse(raw) : [];
	} catch {
		return [];
	}
};

const writeStorage = (items) => {
	try {
		localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
	} catch {
		/* ignore */
	}
};

export const cart = {
	get() {
		return readStorage();
	},
	count() {
		return this.get().reduce((sum, item) => sum + (item.qty || 1), 0);
	},
	total() {
		return this.get().reduce((sum, item) => sum + (item.price || 0) * (item.qty || 1), 0);
	},
	add(product) {
		const items = this.get();
		const existing = items.find((i) => i.id === product.id);
		if (existing) {
			existing.qty = (existing.qty || 1) + (product.qty || 1);
		} else {
			items.push({ ...product, qty: product.qty || 1 });
		}
		writeStorage(items);
		this._emit();
		return items;
	},
	remove(id) {
		const items = this.get().filter((i) => i.id !== id);
		writeStorage(items);
		this._emit();
	},
	updateQty(id, qty) {
		const items = this.get();
		const item = items.find((i) => i.id === id);
		if (!item) return;
		item.qty = Math.max(1, qty);
		writeStorage(items);
		this._emit();
	},
	clear() {
		writeStorage([]);
		this._emit();
	},
	_emit() {
		document.dispatchEvent(new CustomEvent('cart:update', { detail: this.get() }));
	},
};

function showToast(message, variant = 'success') {
	let toast = document.querySelector('.toast');
	if (!toast) {
		toast = document.createElement('div');
		toast.className = 'toast';
		document.body.appendChild(toast);
	}
	toast.className = `toast toast--${variant}`;
	toast.innerHTML = `
		<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
		<span>${message}</span>
	`;
	toast.classList.add('is-visible');
	clearTimeout(toast._timer);
	toast._timer = setTimeout(() => toast.classList.remove('is-visible'), 2800);
}

function renderCount() {
	const badges = document.querySelectorAll('[data-cart-count]');
	const count = cart.count();
	badges.forEach((el) => {
		el.textContent = count;
		el.dataset.count = count;
		if (count > 0 && window.anime) {
			window.anime.animate(el, {
				scale: [1.4, 1],
				duration: 400,
				ease: 'out(3)',
			});
		}
	});
}

function renderCartPage() {
	const container = document.querySelector('[data-cart-page]');
	if (!container) return;

	const items = cart.get();

	if (items.length === 0) {
		container.innerHTML = `
			<div class="cart-empty">
				<svg width="200" height="200" viewBox="0 0 200 200" fill="none">
					<circle cx="100" cy="100" r="80" fill="#EDF7F1"/>
					<path d="M60 70h10l10 55h55l10-40H75" stroke="#2D8659" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
					<circle cx="90" cy="145" r="6" fill="#2D8659"/>
					<circle cx="130" cy="145" r="6" fill="#2D8659"/>
				</svg>
				<h2>Tu carrito esta vacio</h2>
				<p class="cart-empty__text">Descubre nuestros alimentos, accesorios y productos seleccionados por el equipo veterinario.</p>
				<a href="/tienda/" class="btn btn--primary">Ir a la tienda</a>
			</div>
		`;
		return;
	}

	const rows = items
		.map(
			(item) => `
		<div class="cart-item" data-cart-row="${item.id}">
			<div class="cart-item__media">
				<svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="26" fill="${item.color || '#2D8659'}" opacity="0.15"/><rect x="20" y="18" width="24" height="32" rx="3" fill="${item.color || '#2D8659'}"/></svg>
			</div>
			<div class="cart-item__info">
				<h3 class="cart-item__title">${item.title}</h3>
				<span class="cart-item__price">${formatCLP(item.price)}</span>
				<div class="cart-item__qty">
					<button class="cart-item__qty-btn" data-cart-dec="${item.id}" aria-label="Reducir cantidad">-</button>
					<span class="cart-item__qty-value">${item.qty}</span>
					<button class="cart-item__qty-btn" data-cart-inc="${item.id}" aria-label="Aumentar cantidad">+</button>
				</div>
			</div>
			<div>
				<button class="cart-item__remove" data-cart-remove="${item.id}" aria-label="Eliminar del carrito">Eliminar</button>
			</div>
		</div>
	`
		)
		.join('');

	container.innerHTML = `
		<div class="cart-page">
			<div class="cart-page__items">${rows}</div>
			<aside class="cart-page__summary">
				<h3>Resumen</h3>
				<div class="cart-page__row">
					<span>Subtotal (${cart.count()} productos)</span>
					<strong>${formatCLP(cart.total())}</strong>
				</div>
				<div class="cart-page__row cart-page__row--total">
					<span>Total</span>
					<strong>${formatCLP(cart.total())}</strong>
				</div>
				<a href="/checkout/" class="btn btn--primary btn--block btn--lg">Finalizar compra</a>
				<a href="/tienda/" class="btn btn--outline btn--block mt-4">Seguir comprando</a>
				<p class="cart-page__note">Este es un sitio de demostracion. El pago no se procesa realmente.</p>
			</aside>
		</div>
	`;
}

export function initCart() {
	renderCount();
	renderCartPage();

	// Add to cart buttons.
	document.addEventListener('click', (e) => {
		const addBtn = e.target.closest('[data-cart-add]');
		if (addBtn) {
			e.preventDefault();
			const data = addBtn.dataset;
			cart.add({
				id: data.cartAdd,
				title: data.cartTitle || 'Producto',
				price: parseFloat(data.cartPrice || '0'),
				color: data.cartColor || '#2D8659',
			});
			showToast('Agregado al carrito', 'success');
			return;
		}

		const incBtn = e.target.closest('[data-cart-inc]');
		if (incBtn) {
			const id = incBtn.dataset.cartInc;
			const item = cart.get().find((i) => i.id === id);
			if (item) cart.updateQty(id, item.qty + 1);
			renderCartPage();
			return;
		}

		const decBtn = e.target.closest('[data-cart-dec]');
		if (decBtn) {
			const id = decBtn.dataset.cartDec;
			const item = cart.get().find((i) => i.id === id);
			if (item && item.qty > 1) {
				cart.updateQty(id, item.qty - 1);
			} else {
				cart.remove(id);
			}
			renderCartPage();
			return;
		}

		const removeBtn = e.target.closest('[data-cart-remove]');
		if (removeBtn) {
			cart.remove(removeBtn.dataset.cartRemove);
			renderCartPage();
			return;
		}

		// Fake checkout submit
		const checkoutBtn = e.target.closest('[data-fake-checkout]');
		if (checkoutBtn) {
			e.preventDefault();
			showCheckoutModal();
			return;
		}
	});

	document.addEventListener('cart:update', () => {
		renderCount();
	});
}

function showCheckoutModal() {
	let modal = document.querySelector('.modal[data-checkout-modal]');
	if (!modal) {
		modal = document.createElement('div');
		modal.className = 'modal';
		modal.setAttribute('data-checkout-modal', '');
		modal.innerHTML = `
			<div class="modal__box">
				<div class="modal__icon">
					<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
				</div>
				<h2 class="modal__title">Pedido simulado</h2>
				<p class="modal__text">Este es un sitio de demostracion. El pago no se procesa realmente. Gracias por probar Perrito Feliz.</p>
				<div class="btn-group justify-center">
					<button class="btn btn--primary" data-modal-close>Volver</button>
					<a href="/" class="btn btn--outline">Ir al inicio</a>
				</div>
			</div>
		`;
		document.body.appendChild(modal);
		modal.addEventListener('click', (e) => {
			if (e.target === modal || e.target.closest('[data-modal-close]')) {
				modal.classList.remove('is-open');
				cart.clear();
				renderCartPage();
			}
		});
	}
	modal.classList.add('is-open');
}
