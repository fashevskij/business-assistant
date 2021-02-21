<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

/*
1. Добавить кнопку для удаления товара +
2. Пройтись по всему массиву товаров +
3. Проверить id товара и удалить товар +
*/

//проверка был ли отправлен POST запрос
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//если пользователь авторизован заносим данные в БД
	if(isset($_COOKIE["user_id"])) {
		//делаем запрос в БД - выбираем пользователя
		$sql2 = "SELECT * FROM users WHERE id=". $_COOKIE["user_id"];
		//получаем результат
		$result2 = $conn->query($sql2);
		//получаем пользователя
		$user = mysqli_fetch_assoc($result2);
		//декодим избраное с БД
		$favorites = json_decode($user['favorites'], true);
		var_dump($favorites);
		//разбиваем построчно
		for($i = 0; $i < count($favorites['favorites']); $i++) {
			//проверяя каждую строку на соответсвие номеру выбраного товара
			if($favorites['favorites'][$i]["product_id"] == $_POST['id']) {
				//удаляем этот товар
				unset($favorites['favorites'][$i]);
				//смещаем (сортируем) массив
				sort($favorites['favorites']);
			}
		}
		//преобразование массива данных в json формат
		$jsonProduct = json_encode($favorites);
		//перезаписываем избраное в БД
		$sql1 = "UPDATE `users` SET `favorites` ='" . $jsonProduct . "' WHERE `users`.`id` =" . $user['id'];
		//получаем результат
		$result1 = $conn->query($sql1);
		
	} else { //если пользователь не авторизован
		if(isset($_COOKIE['favorites'])) { //если присутствуют товары в избраном
			//декодим избраное с БД
			$favorites = json_decode($_COOKIE['favorites'], true);
			//разбиваем построчно
			for($i = 0; $i < count($favorites['favorites']); $i++) {
				//проверяя каждую строку на соответсвие номеру выбраного товара
				if($favorites['favorites'][$i]["product_id"] == $_POST['id']) {
					//удаляем этот товар
					unset($favorites['favorites'][$i]);
					//смещаем (сортируем) массив
					sort($favorites['favorites']);
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
}
?>