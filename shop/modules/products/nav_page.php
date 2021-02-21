<?php
// Подключение к БД
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

/*
$kol - количество записей для вывода
$art - с какой записи выводить
$total - всего записей
$page - текущая страница
$str_pag - количество страниц для пагинации
*/

// Определяем все количество записей в таблице
$sql = "SELECT COUNT(*) FROM `products`";
$res = $conn->query($sql);
$row = mysqli_fetch_row($res);
$total = $row[0]; // всего записей	

// Количество страниц для пагинации
$str_pag = ceil($total / $kol);

// формируем пагинацию
echo("Страница: ");
for ($i = 1; $i <= $str_pag; $i++){
	echo "<a class='btn active' href='index.php?page=" . $i . "'> $i </a>";
}
