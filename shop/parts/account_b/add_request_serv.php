<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send_message.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	if($_POST['image'] == '') {
		$image = "unnamed.jpg";
	} else {
		$image = $_POST['image'];
	}
	//отправляем запрос к БД на добавление заявки от авторизованого пользователя
	$sql = "INSERT INTO `request_serv`(`user_id`, `cat_id`, `title`, `description`, `content`, `phone`, `town`, `street`, `house`, `flat`, `image`) VALUES ('" . $_COOKIE["user_id_b"] . "', '" . $_POST["category_id"] . "', '" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["phone"] . "', '" . $_POST["town"] . "', '" . $_POST["street"] . "', '" . $_POST["house"] . "', '" . $_POST["flat"] . "', '" . $image . "')";
	//если запрос обработан
	if($conn->query($sql)) {//выводим что заказ оформлен и ссылку на главную страницу
		header("Location: /shop/my_serv.php");
		message_to_telegram("Подана заявка на добавление услуги");
	} else {
		echo "EROR";
	}
	
}
?>