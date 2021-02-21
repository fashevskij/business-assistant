<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "serv_orders";

//делаем запрос в БД - получаем заявку
$sql = "SELECT * FROM `serv_orders` WHERE `id`=" . $_GET['prod_id'];
//получаем результат
$result = $conn->query($sql);
//возвращаем выбранный товар из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item"><a href="/admin/serv_orders.php">Услуги</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $row["title"] ?></li>
	</ol>
</nav>

<?php
//выводим предложения данного пользователя
include $_SERVER['DOCUMENT_ROOT'] . '/services/product.php';
?>