<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

$page = $_GET['page'];
$kol = 6;  //количество записей для вывода
$art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить

$sql = "SELECT * FROM `products` WHERE `status`= 'Добавлено' LIMIT $art, $kol";
$result = $conn->query($sql);

/*$sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
$result = $conn->query($sql);*/

while ($row = mysqli_fetch_assoc($result)) {
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/product_card.php';
}
?>
