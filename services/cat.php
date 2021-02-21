<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';
// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";

// запрос в БД, выбираем все категории
$sql = "SELECT * FROM serv_category WHERE `serv_cat_id`=" . $_GET['id'];
$category = mysqli_fetch_assoc($conn->query($sql));
?>
<!-- Хлебные крошки -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/services/allServices.php">Услуги</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $category['serv_cat_name'] ?></li>
	</ol>
</nav>

<div class="row" id="products">
	<?php
	// запрос в БД, выбираем категорию по id
	$sql = "SELECT * FROM serv_orders WHERE `status`= 'Добавлено' AND `cat_id`=" . $_GET['id'];
	// реализуем запрос
	$result = $conn->query($sql);

	// выводим список в цикле
	while ($row = mysqli_fetch_assoc($result)) {
		include 'parts/product_card.php';
	}
	?>
</div>

<!-- подключаем js для данной страницы -->
<!-- <script src="/services/assets/js/main.js"></script> -->

<?php
// подключаем футер
include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>