//Исходный адрес сайта
var siteURL = "http://f0476748.xsph.ru/shop/";

/********************************************************
                Кнопка показать еще
********************************************************/
var btnShowMore = document.querySelector('#show-more');
// если на странице присутствует кнопка Показать еще, то выполняем код
if(btnShowMore) {
	//Функция нажатия на кнопку "Показать еще"
	btnShowMore.onclick = function () {
		var currentPageInput = document.querySelector('#current-page');
		var ajax = new XMLHttpRequest();
		    currentPageInput.value = +currentPageInput.value + 1;
			ajax.open('GET', siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
			ajax.send();

		if(ajax.response == '') {
			btnShowMore.style.display = "none";
		}

		var productsBlock = document.querySelector('#products');
			productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
	};
}

/********************************************************
                Кнопка показать еще в отзывах
********************************************************/
var btnShowMoreReview = document.querySelector('#show_more_review');
// если на странице присутствует кнопка Показать еще, то выполняем код
if(btnShowMoreReview) {
	//Функция нажатия на кнопку "Показать еще"
	btnShowMoreReview.onclick = function () {
		var currentPageReview = document.querySelector('#current_page_review');
		var product_review = document.querySelector('#product_review');
		var ajax = new XMLHttpRequest();
		    currentPageReview.value = +currentPageReview.value + 1;
			ajax.open('GET', siteURL + "modules/review/get_more.php?page=" + currentPageReview.value + "&product_id=" + product_review.value, false);
			ajax.send();

		if(ajax.response == '') {
			btnShowMoreReview.style.display = "none";
		}

		var reviewBlock = document.querySelector('#review');
			reviewBlock.innerHTML = reviewBlock.innerHTML + ajax.response;
	}
}

/********************************************************
           Добавление товаров в избранное
********************************************************/
function addToFavorites(btn) {
	console.dir(btn.dataset.id);

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "modules/favorites/add-favorites.php", false);

		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		ajax.send("id=" + btn.dataset.id);
	//массив добавленых товаров в избранное
	var response = JSON.parse(ajax.response);
	
	console.dir(response);

	var btnGoFavorites = document.querySelector('#go-favorites span');
		//вывод количества товарок возле иконки корзины
		btnGoFavorites.innerHTML = response.favorites.length;
}

/********************************************************
                    Оформление заказа
********************************************************/
var form = document.querySelector('#form');
function addOrder (event) {
	event.preventDefault();

	var userName = form.querySelector("input[name='userName']"); 
	var email = form.querySelector("input[name='email']"); 
	var id_product = form.querySelector("input[name='id_product']"); 
	var address = form.querySelector("input[name='address']");
	var data = "userName=" + userName.value +
	  			"&email=" + email.value +
	  			"&address=" + address.value +
	  			"&id_product=" + id_product.value +
	  			"&add_order=1";
	var ajax = new XMLHttpRequest();
		ajax.open('POST', form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(data);

		var response = JSON.parse(ajax.response);
}

/********************************************************
                Удаление товара с избраного
********************************************************/
function deleteProductFavorites(obj, id) {

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "modules/favorites/delete.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

	alert('DELETE');

	//удалить строку с товаром
	obj.parentNode.parentNode.remove();
}

/********************************************************
Удаление предложений малого бизнеса в его личном кабинете
********************************************************/
function deleteProductUserB(obj, id) {

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "parts/account_b/delete_products.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

	alert('DELETE');

	//удалить строку с товаром
	obj.parentNode.parentNode.remove();
}

/********************************************************
Оформление заявки на добаление предложения от малого бизнеса
********************************************************/
function addRequest(event) {
	event.preventDefault();

	var add_request = document.querySelector('#add_request');
	var title = form.querySelector("input[name='title']"); 
	var description = form.querySelector("input[name='description']"); 
	var content = form.querySelector("textarea[name='content']");
	var category_id = form.querySelector("select[name='category_id']"); 
	var image = form.querySelector("input[name='image']");
	var cost = form.querySelector("input[name='cost']");
	var phone = form.querySelector("input[name='phone']");
	var data = "title=" + title.value +
	  			"&description=" + description.value +
	  			"&content=" + content.value +
	  			"&category_id=" + category_id.value +
	  			"&image=" + image.value +
	  			"&cost=" + cost.value +
	  			"&phone=" + phone.value +
	  			"&add_request=1";
	var ajax = new XMLHttpRequest();
		ajax.open('POST', form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(data);

	var response = JSON.parse(ajax.response);
}

/********************************************************
Удаление услуги малого бизнеса в его личном кабинете
********************************************************/
function deleteServUserB(obj, id) {

	var ajax = new XMLHttpRequest();
		ajax.open('POST', siteURL + "parts/account_b/delete_serv.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

	alert('DELETE');

	//удалить строку с товаром
	obj.parentNode.parentNode.remove();
}

/********************************************************
Оформление заявки на добаление услуги от малого бизнеса
********************************************************/
function addRequestServ(event) {
	event.preventDefault();

	var form = document.querySelector('#add_request_serv');
	var title = form.querySelector("input[name='title']"); 
	var description = form.querySelector("input[name='description']"); 
	var content = form.querySelector("textarea[name='content']");
	var category_id = form.querySelector("select[name='category_id']"); 
	var image = form.querySelector("input[name='image']");
	var town = form.querySelector("input[name='town']");
	var phone = form.querySelector("input[name='phone']");
	var house = form.querySelector("input[name='house']");
	var street = form.querySelector("input[name='street']");
	var flat = form.querySelector("input[name='flat']");
	var data = "title=" + title.value +
	  			"&description=" + description.value +
	  			"&content=" + content.value +
	  			"&category_id=" + category_id.value +
	  			"&image=" + image.value +
	  			"&town=" + town.value +
	  			"&phone=" + phone.value +
	  			"&flat=" + flat.value +
	  			"&street=" + street.value +
	  			"&house=" + house.value +
	  			"&add_request_serv=1";
	var ajax = new XMLHttpRequest();
		ajax.open('POST', form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(data);

	var response = JSON.parse(ajax.response);
}