// const btns = document.querySelectorAll('.prod-link')
const buyBtns = document.querySelectorAll('.prod-link')
const delBtns = document.querySelectorAll('.fa-trash')
const basketWrp = document.querySelector('.basket-items-wrp')

const str = `<h5 class="title title-basket">добавьте товар в корзину</h5>`
basketWrp.insertAdjacentHTML('beforeend', str)

const sendForm = `
	<form method="post" class="form">
		<input type="tel" class="login" name="tel" required placeholder="Ваш телефон">
		<input type="email" class="email" name="email" required placeholder="Ваш email">
		<button type="submit" class="btn form-btn" name="order">Оформить заказ</button>
	</form>`

buyBtns.forEach(add => add.addEventListener('click', (e)=> {
	const id = e.target.dataset.id
	addToBasket(id)
}))

delBtns.forEach(del => del.addEventListener('click', (e) => {
	const id = e.target.dataset.id
	deleteFromBasket(id)
}))

function renderItem(item) {
	return `<div class="basket-item" data-id="${item.id_basket}">
				<img class="basket-img" src="images/products/${item.image}" alt="${item.name} photo">
				<div class="cart-name-wrp">
					<span class="basket-name">${item.name}</span>
				</div>
				<div class="count-wrp">
					<i class="fas fa-plus" onclick="addToBasket(${item.id_basket})"></i>
					<span class="basket-count">${item.count}</span>
					<i class="fas fa-minus"></i>
				</div>
				<span class="basket-price">${item.price * item.count}</span>
			</div>`
}

function renderBasket(data) {
	const items = JSON.parse(data.content_data)
	
	if(items.length > 0) {
		basketWrp.innerHTML = ''
		items.forEach(item => {
			basketWrp.insertAdjacentHTML('afterbegin', renderItem(item))
		})
		basketWrp.insertAdjacentHTML('beforeend', sendForm)
		count(items)
	}
	
}

function count(items) {
	let value  = 0
	let sum = items.reduce((s, item) => s += item.count, value)
	let summa = sum.split('').reduce(function(a,b){ return +a + +b })
	const showCount = document.querySelector('.cart-show')
	const iconCart = document.querySelector('.fa-shopping-basket')

	if(summa != 0) {
		showCount.innerHTML = ''
		showCount.insertAdjacentHTML('beforeend', summa)
	}
	// console.log('sum ',sum);
	console.log('summa ',summa);
}

function addToBasket(id) {
	return fetch('index.php?path=basket/add/'+id+'&asAjax=true', {
		method: 'POST',
		body:{itemId: id},
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

function deleteFromBasket(id) {
	return fetch('index.php?path=basket/delete/'+id+'&delGood=true', {
		method: 'POST',
		headers: {'Content-Type': 'application/x-www-form-urlencoded, charset=utf-8'}
	})
		// .then(response => {
		// 	if (response.ok) {
		// 		return response.json()
		// 	}
		// })
		// .then(data => {
		// 	// console.log(data)
		// })
		// .catch(()=> console.log('ошибка!'))
}

//index.php?path=order/add/{{ good.id }}&asAjax=true