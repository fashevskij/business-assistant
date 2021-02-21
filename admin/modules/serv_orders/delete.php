<?php
// подключаем базу данных
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//если товар в таблице админки выбран 
if (isset($_GET["id"])) {
	//посылаем запрос в БД на удаление товара из таблицы products_maps в БД
	$sqlDeleteProduct = "UPDATE `serv_orders` SET `status`= 'Удалено' WHERE id= '" . $_GET["id"] . "' ";
	//если запрос выполнен то...
	if ($conn->query($sqlDeleteProduct)) {
		//задаём адрес перехода после выполнения запроса
		header("Location: /admin/serv_orders.php");
		//в ином случае показываем ошибку
	} else {
		echo "<h2>ERROR!</h2>";
	}
}
