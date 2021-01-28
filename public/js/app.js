const btns = document.querySelectorAll('.prod-link')
const addBtns = document.querySelectorAll('.plus')
const delBtns = document.querySelectorAll('.fa-trash')

addBtns.forEach(add => add.addEventListener('click', e=> {
	const id = e.target.dataset.id
	addToBasket(id)
	location.reload()
}))

btns.forEach(buybtn => buybtn.addEventListener('click',  (e)=> {
	const id = e.target.dataset.id
	addToBasket(id)
}))

delBtns.forEach(del => del.addEventListener('click', e => {
	const id = e.target.dataset.id
	deleteFromBasket(id)
}))



function renderBasket(data) {
	const answer = JSON.parse(data.content_data)
	console.log(answer.result)
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
			console.log(data)
		})
		.catch(()=> console.log('ошибка!'))
}

function deleteFromBasket(id) {
	return fetch('index.php?path=basket/delete/'+id+'&delGood=true', {
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
			console.log(data)
		})
		.catch(()=> console.log('ошибка!'))
}

//index.php?path=order/add/{{ good.id }}&asAjax=true