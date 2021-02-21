<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

/*
1. Получить товар по которому кликнул пользователь +
2. Создать масив товаров + 
3. Добавить масив в куки +
4. Перебрать прошлый массив
	4.1 Преобразовать json с куки в массив
	4.2 Добавить новый элемент в массив
	4.3 Преобразовать массив в правильный jsom
	4.4 Добавить в куки
*/
//проверка был ли отправлен POST запрос
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//если пользователь авторизован заносим данные в БД
	if(isset($_COOKIE["user_id"])) {
		//делаем запрос в БД - выбираем продукт
		$sql = "SELECT * FROM products WHERE id=". $_POST['id'];
		//получаем результат
		$result = $conn->query($sql);
		//получаем продукт
		$product = mysqli_fetch_assoc($result);
		//делаем запрос в БД - выбираем пользователя
		$sql2 = "SELECT * FROM users WHERE id=". $_COOKIE["user_id"];
		//получаем результат
		$result2 = $conn->query($sql2);
		//получаем пользователя
		$user = mysqli_fetch_assoc($result2);
		// добавление в избранное
		if ($user['favorites'] == null) { // если еще ничего нету в избранном
			$favorites = [ "favorites" => [ 
				["product_id" => $product['id']]
			] ];
		} else { /// если товар уже есть в избранном
			// Преобразование с формата json в массив
			$favorites = json_decode($user['favorites'], true);

			/*
			1. Пройтись по всему массиву избраного +
			2. Проверить есть ли совпадения по product_id +
			3. Если совпадение есть то увеличить кол-во +
			*/
			$issetProduct = 0;
			for ($i=0; $i < count($favorites["favorites"]); $i++) { 
				if($favorites["favorites"][$i]["product_id"] == $product['id']) {
					$issetProduct = 1;
				} 
			}

			if($issetProduct != 1) {
				$favorites["favorites"][] = [
					"product_id" => $product['id']
				];
			}
		}
		//преобразование массива данных в json формат
		$jsonProduct = json_encode($favorites);
		//делаем запрос в БД - редактируем избранное
		$sql3 = "UPDATE `users` SET `favorites` ='" . $jsonProduct . "' WHERE `users`.`id` =" . $user['id'];
		//получаем результат
		$result3 = $conn->query($sql3);
	} else { //если нет то в куки
		//делаем запрос в БД - выбираем продукт
		$sql = "SELECT * FROM products WHERE id=". $_POST['id'];
		//получаем результат
		$result = $conn->query($sql);
		//получаем продукт
		$product = mysqli_fetch_assoc($result);

		// добавление в избранное
		if (isset($_COOKIE['favorites'])) { // если товар уже есть в избранном
			// Преобразование с формата json в массив
			$favorites = json_decode($_COOKIE['favorites'], true);

			/*
			1. Пройтись по всему массиву корзины  +
			2. Проверить есть ли совпадения по product_id +
			3. Если совпадение есть то увеличить кол-во +
			*/
			$issetProduct = 0;
			for ($i=0; $i < count($favorites["favorites"]); $i++) { 
				if($favorites["favorites"][$i]["product_id"] == $product['id']) {
					$issetProduct = 1;
				} 
			}

			if($issetProduct != 1) {
				$favorites["favorites"][] = [
					"product_id" => $product['id']
				];
			}
		} else { // если еще ничего нету в избранном
			$favorites = [ "favorites" => [ 
				["product_id" => $product['id']]
			] ];
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