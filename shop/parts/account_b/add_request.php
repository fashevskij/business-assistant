<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send_message.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	if($_POST['image'] == '') {
		$image = "shop.jpg";
	} else {
		$image = $_POST['image'];
	}
	//отправляем запрос к БД на добавление заявки от авторизованого пользователя
	$sql = "INSERT INTO `request`(`user_id`, `title`, `description`, `content`, `category_id`, `image`, `cost`, `phone`) VALUES ('" . $_COOKIE["user_id_b"] . "', '" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "', '" . $image . "', '" . $_POST["cost"] . "', '" . $_POST["phone"] . "')";
	//если запрос обработан
	if($conn->query($sql)) {//выводим что заказ оформлен и ссылку на главную страницу
		header("Location: /shop/request.php");
		message_to_telegram("Подана заявка на добавление купона");
	} else {
		echo "EROR";
	}
	
}
?>