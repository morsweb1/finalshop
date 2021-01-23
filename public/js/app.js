const btns = document.querySelectorAll('.prod-link');

btns.forEach(buybtn => buybtn.addEventListener('click',  (e)=> {
	const id = e.target.dataset.id
	// console.log(id, buybtn)
	addToBasket(id)
}))

function renderBasket(data) {

	const answer = JSON.parse(data.content_data)

	console.log(answer.result)

}

function addToBasket(id) {
	return fetch('index.php?path=order/add/'+id+'&asAjax=true', {
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

//index.php?path=order/add/{{ good.id }}&asAjax=true