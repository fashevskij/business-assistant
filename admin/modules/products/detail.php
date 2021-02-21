<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
//делаем запрос в БД - получаем заявку
$sql = "SELECT * FROM `products` WHERE `id`=" . $_GET['id'];
//получаем результат
$result = $conn->query($sql);
//возвращаем выбранный товар из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
    <li class="breadcrumb-item"><a href="/admin/products.php">Продукты</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row["title"] ?></li>
  </ol>
</nav>

<?php
//выводим предложения данного пользователя
include $_SERVER['DOCUMENT_ROOT'] . '/shop/product.php';
?>