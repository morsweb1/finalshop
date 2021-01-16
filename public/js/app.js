// const btns = document.querySelectorAll('.prod-link');
// //
//
// btns.forEach(buybtn => buybtn.addEventListener('click',  ()=> {
// 	console.log(buybtn)
// }))

// function addToBasket(id) {
// 	$.ajax({
// 		url: "index.php?path=order/add/",
// 		method: 'post',
// 		data: {itemId:id}
// 	}).done(function(data){
// 		// Успешное получение ответа
// 		$(".cart-show").html(data);
// 		console.log(data)
// 	});
// }

// function addToBasket(id) {
// 	return fetch('index.php?path=order/add/', {
// 		method: 'POST',
// 		body: 'asAjax='+id,
// 		headers: {'Content-Type': 'application/x-www-form-urlencoded, charset=utf-8'}
// 	})
// 		.then(response => {
// 			if (response.ok) {
// 				return response.json()
// 			}
// 		})
// 		.then(data => {
// 			console.log(data)
// 		})
// 		.catch(()=> console.log('ошибка!'))
// }