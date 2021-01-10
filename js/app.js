function renderItem(item) {
	return `<div class="basket-item" data-id="${item.id}">
						<img class="basket-img" src="images/products/${item.image}" alt="${item.name} photo">
						<div class="cart-name-wrp">
							<span class="basket-name">${item.name}</span>
							<span class="basket-desc">${item.short_desc}</span>
						</div>
						<div class="count-wrp">
							<i class="fas fa-plus" onclick="addToBasket(${item.id})"></i>
							<span class="basket-count">${item.count}</span>
							<i class="fas fa-minus"></i>
						</div>
						<span class="basket-price">${item.price * item.count}</span>
					</div>`
}

function renderBasket (data) {
	const cartItems = []
	data.forEach(item => {
		cartItems.push(item)
	})
	for (i=0; i<cartItems.length; i++) {
		const cart = document.querySelector('.basket')
		cart.insertAdjacentHTML('beforeend', renderItem(item))
	}
}

function addToBasket(id) {
	return fetch('./modules/basket.php', {
		method: 'POST',
		body: 'basketId='+id,
		headers: {'Content-Type': 'application/x-www-form-urlencoded, charset=utf-8'}
	})
		.then(response => {
			if (response.ok) {
				return response.json()
			}
		})
		.then(data => {
			renderBasket(data)
		})
		.catch(()=> console.log('ошибка!'))
}