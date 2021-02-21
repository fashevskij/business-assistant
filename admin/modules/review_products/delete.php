<?php
// подключаем базу данных
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//если товар в таблице админки выбран 
//посылаем запрос в БД на удаление товара из таблицы review_products в БД
$sqlDeleteProduct = "DELETE FROM  review_products WHERE id= '" . $_GET["id"] . "' ";
//если запрос выполнен то...
if($conn->query($sqlDeleteProduct)) {
  //задаём адрес перехода после выполнения запроса
  header("Location: /admin/review_products.php");
  //в ином случае показываем ошибку
} else {
  echo "<h2>ERROR!</h2>";
}
?>



