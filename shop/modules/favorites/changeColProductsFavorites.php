<?php
/*
1. Добавить кнопку для подтверждения +
2. Пройтись по всему массиву товаров +
3. Проверить id товара и изменить количество
*/

//проверка был ли отправлен POST запрос
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	if(isset($_COOKIE['favorites'])) {
		$favorites = json_decode($_COOKIE['favorites'], true);
		for($i = 0; $i < count($favorites['favorites']); $i++) {
			if($favorites['favorites'][$i]["product_id"] == $_POST['id']) {
				$favorites['favorites'][$i]["count"] = $_POST['count'];
			}
		}

		//преобразование массива данных в json формат
		$jsonProduct = json_encode($favorites);
		//очищаем куки
		setcookie("favorites", "", 0, "/shop/");
		//добавляем куки
		setcookie("favorites", $jsonProduct, time() + 60*60, "/shop/");
	}
}
?>