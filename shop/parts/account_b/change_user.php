<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
//если был отправлен POST запрос на изменение логина
if (isset($_POST["login"]) && $_POST["login"] != "") {
	//делаем запрос в БД
	$sql_change = "UPDATE `users_b` SET `login` = '" . $_POST["login"] . "' WHERE `users_b`.`id` =". $_COOKIE["user_id_b"];
	//получаем результат
	$result_change = $conn->query($sql_change);
}
//если был отправлен POST запрос на изменение имени
if (isset($_POST["name"]) && $_POST["name"] != "") {
	//делаем запрос в БД
	$sql_change = "UPDATE `users_b` SET `name` = '" . $_POST["name"] . "' WHERE `users_b`.`id` =". $_COOKIE["user_id_b"];
	//получаем результат
	$result_change = $conn->query($sql_change);
}
//если был отправлен POST запрос на изменение email
if (isset($_POST["email"]) && $_POST["email"] != "") {
	//делаем запрос в БД
	$sql_change = "UPDATE `users_b` SET `email` = '" . $_POST["email"] . "' WHERE `users_b`.`id` =". $_COOKIE["user_id_b"];
	//получаем результат
	$result_change = $conn->query($sql_change);
}
//если был отправлен POST запрос на изменение телефона
if (isset($_POST["phone"]) && $_POST["phone"] != "") {
	//делаем запрос в БД
	$sql_change = "UPDATE `users_b` SET `phone` = '" . $_POST["phone"] . "' WHERE `users_b`.`id` =". $_COOKIE["user_id_b"];
	//получаем результат
	$result_change = $conn->query($sql_change);
}

header("Location: http://f0476748.xsph.ru/shop/account_b.php");
?>