<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

// вводим переменные: 
// page - номер страницы, offset - количество продуктов на странице
$page = $_GET['page'];
$offset = $page * 6;

	// подготовим запрос в БД
	$sql = "SELECT * From serv_orders LIMIT 6 OFFSET " . $offset;
	
	// реализуем запрос
	$result = $conn->query($sql);

	// выводим карточки с продуктами
	while($row = mysqli_fetch_assoc($result)){
		include $_SERVER['DOCUMENT_ROOT'] . '/services/parts/product_card.php';
	}
?>