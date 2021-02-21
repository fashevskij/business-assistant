<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

/*
1. Добавить кнопку для удаления товара +
2. Пройтись по всему массиву товаров +
3. Проверить id товара и удалить товар +
*/

//проверка был ли отправлен POST запрос
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//делаем запрос в БД - удаляем товар с заявок 
	$sql = "DELETE FROM `request` WHERE id=". $_POST["id"];
	//получаем результат
	$result = $conn->query($sql);
	//делаем запрос в БД - удаляем товар с продуктов на сайте 
	$sql = "DELETE FROM `products` WHERE request_id=". $_POST["id"];
	//получаем результат
	$result = $conn->query($sql);

}
?>