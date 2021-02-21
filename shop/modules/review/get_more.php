<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

$page = $_GET['page'];
$kol = 3;  //количество записей для вывода
$art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить

$sql = "SELECT * FROM review_products WHERE product_id='" . $_GET['product_id'] . "' LIMIT $art, $kol";
$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) { ?>
	<div class="mt-4"> 
		<i><?php echo $row['data']; ?></i><br>
		<i><?php echo $row['text']; ?></i>
	</div> <?php 
} ?>