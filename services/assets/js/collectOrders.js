var siteURL = "http://shop-master.local/"

// функция добавления заказов в БД
function collectOrders(orderBtn){
	
	// переменная-ссылка на корень сайта
	var siteURL = "http://shop-master.local/"
	
	// создаем объект ajax-запрса
	var ajax = new XMLHttpRequest();

	// подготовка POST-запроса
	ajax.open("POST", siteURL + "modules/basket/collectOrders.php", false);

	// описание заголовка POST-запроса
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	// выберем селектор формы
	var checkoutForm = document.querySelector('#orderBasketForm')

	// временная переменная с id пользователя
	// var user_id = '15';

	// посылаем запрос
	ajax.send("userData=1" +
				"&name=" + checkoutForm.name.value + // имя покупателя
					"&address=" + checkoutForm.address.value + // адрес покупателя
						"&telephone=" + checkoutForm.telephone.value);// телефон покупателя

	// отделим символом "*" вывод нашего ajax от всего остального
	var myString = ajax.response.split('*',10);

	// обработка ответа ajax
	// if(ajax.response == 'ok'){
		if(myString[0] == 'ok'){

		// выводим модальное окно (позже выведем номер заказа) с сообщением
		$('#okModal').modal('show');

	}else{
		// выводим модальное окно с сообщением об ошибке
		$('#errorModal').modal('show');
	}

}

// функция удаления товара из таблицы товаров корзины
function deleteProductBasket(obj, id){

	// создаем объект ajax-запрса
	var ajax = new XMLHttpRequest();

	// подготовка POST-запроса
	ajax.open("POST", siteURL + "modules/basket/delete.php", false);

	// описание заголовка POST-запроса
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	// посылаем запрос
	ajax.send("id=" + id);

	obj.parentNode.parentNode.remove();

	// alert("Deleted id= " + id);

}

// пересчет стоимости товара при изменении количества
function changeCostBasket(obj, cost){
	
	// извлекаем id товара из строки в корзине
	var id = obj.parentNode.parentNode.childNodes[1].innerText;

	// количество продуктов в строке с товаром
	var countProductInRow = obj.value;

	// создаем объект ajax-запрса
	var ajax = new XMLHttpRequest();

	// подготовка POST-запроса
	ajax.open("POST", siteURL + "modules/basket/update.php", false);

	// описание заголовка POST-запроса
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	// посылаем запрос
	ajax.send("id=" + id +								//id товара
				"&newCount=" + countProductInRow ); 	// новое количество товара

	// цена товара
	var cost = cost;

	// цена за количество товара
	var costProductInRow = cost * countProductInRow;

	// выводим суммарную стоимость количества товаров в строке
	obj.parentNode.parentNode.childNodes[7].innerText = costProductInRow;

}