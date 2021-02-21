//выбираем id кнопки отображения дополнительных товаров на странице 
var btnShowMore = document.querySelector("#showMore");

var siteURL = "http://f0476748.xsph.ru/services/"

// функция по нажатию на кнопку
btnShowMore.onclick = function(){
var currentPageInput = document.querySelector("#current-page");
	
	// создаем объект ajax-запрса
	var ajax = new XMLHttpRequest();

	// подготовка GET-запроса
	ajax.open("GET", siteURL + "modules/products/getMore.php?page=" + currentPageInput.value, false);
	
	// отправка запроса
	ajax.send();

// когда закончились товары для вывода
if(ajax.response == ""){
	btnShowMore.style.display = "none";
}
	else{

		// корректируем счетчик страниц
		currentPageInput.value = +currentPageInput.value + 1; 

			//добавляем товаров к предыдущему выводу 
			var productsBLock = document.querySelector("#products");
			productsBLock.innerHTML = productsBLock.innerHTML + ajax.response;
	}
}