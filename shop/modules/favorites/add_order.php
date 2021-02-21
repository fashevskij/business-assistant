<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send_message.php';

/*
1. Проверить есть ли в БД пользователь с email что ввел пользователь +
2. Если нет, то зарегистрировать пользователя +
3. Добавляем заказ в БД с привязкой к пользователю +
4. Сгенерировать случайный номер купона и отправить его пользователю на указанный email +
5. Удалить товар с избраного +
*/

//функция для определения рандомной строки
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//если авторизован обычный пользователь
	if(isset($_COOKIE["user_id"])) {
		//генерируем номер купона
		$coupon = generateRandomString(15);
		//отправляем его пользователю на указаный email
		mail($_POST['email'], 'Coupon', $coupon);
		//отправляем запрос к БД на добавление товара от авторизованого пользователя
		$sql = "INSERT INTO `orders`(`user_id`, `product_id`, `coupon`, `email`) VALUES ('" . $_COOKIE["user_id"] . "', '" . $_POST["id_product"] . "', '" . $coupon . "', '" . $_POST["email"] . "')";
		//если запрос обработан
		if($conn->query($sql)) {
			//делаем запрос к БД на получение авторизованного пользователя
			$sql = "SELECT * FROM users";
			//получаем результат
			$result = $conn->query($sql);
			//получаем авторизованого пользователя
			$user = mysqli_fetch_assoc($result);
			//преобразуем строку "избранное" из БД авторизованого пользователя в массив данных
			$favorites = json_decode($user['favorites'], true);
			//удаляем товар который купил пользователь из избраного
			for($i = 0; $i < count($favorites['favorites']); $i++) {
				if($favorites['favorites'][$i]["product_id"] == $_POST['id_product']) {
					unset($favorites['favorites'][$i]);
					sort($favorites['favorites']);
				}
			}
			//преобразуем массив данных в json формат
			$jsonProduct = json_encode($favorites);
			//делаем запрос к БД на перезапись строки "избранное" авторизованого пользователя
			$sql1 = "UPDATE `users` SET `favorites` ='" . $jsonProduct . "' WHERE `users`.`id` =" . $_COOKIE["user_id"];
			//получаем результат
			$result1 = $conn->query($sql1);
		} //выводим что заказ оформлен и ссылку на главную страницу
		header("Location: /shop/orders_history.php");
		message_to_telegram("Куплен новый купон");
	} else if (isset($_COOKIE["user_id_b"])) { //если авторизован пользователь владелец бизнеса
		//отправляем запрос к БД на добавление товара от авторизованого пользователя
		$sql = "INSERT INTO `orders_maps`(`user_b_id`, `product_id`, `adress`, `email`) VALUES ('" . $_COOKIE["user_id_b"] . "', '" . $_POST["id_product"] . "', '" . $_POST["address"] . "', '" . $_POST["email"] . "')";
		//получаем результат
		$result = $conn->query($sql);
		//выводим что заказ оформлен и ссылку на страницу "Подписки" в личном кабинете
		header("Location: /shop/subscriptions.php");
		message_to_telegram("Куплена подписка");
	} else { //если пользователь не авторизован - заказ происход только на главной странице
		//отправляем запрос к БД на получение пользователя с email соответствующий введеному пользователем
		$sql = "SELECT * FROM users WHERE email LIKE '" . $_POST["email"] . "'";
		//переменная для хранения номера пользователя
		$user_id = 0;
		//получаем результат запроса от БД
		$result = $conn->query($sql);
		//преобразуем результат в массив данных
		$user = mysqli_fetch_assoc($result);
		//усли пользователь найден
		if ($result->num_rows > 0) {
			//присваиваем переменной user_id номер этого пользователя
			$user_id = $user['id'];
		} else { //если нет
			//отправляем запрос к БД на добавление пользователя с login и email соответствующими введеным пользователем
			$sql = "INSERT INTO `users` (`login`, `email`) VALUES ('" . $_POST['userName'] . "', '" . $_POST["email"] . "')";
			if($conn->query($sql)) { //если запрос обработан
				//выводим сто пользователь добавлен
				echo "User added!";
				//и присваиваем переменной user_id номер этого пользователя
				$user_id = $conn->insert_id;
			}
		}
		//генерируем номер купона
		$coupon = generateRandomString(15);
		//отправляем номер купона пользователю на указаный email
		mail($_POST['email'], 'Coupon', $coupon);
		//отправляем запрос к БД на добавление товара от нового пользователя
		$sql = "INSERT INTO `orders`(`user_id`, `product_id`, `coupon`, `email`) VALUES ('" . $user_id . "', '" . $_POST["id_product"] . "', '" . $coupon . "', '" . $_POST["email"] . "')";
		//получаем результат
		$result = $conn->query($sql);
		//выводим что заказ оформлен и сслку на главную страницу
		header("Location: /shop/");
		message_to_telegram("Куплен новый купон");
	}
}
?>