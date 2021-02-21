<?php
// подключаем базу данных
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//если в таблице админки выбран 
//посылаем запрос в БД на удаление в БД
$sqlDeleteCategory = "UPDATE `serv_category` SET `status`= 'Удалено' WHERE `serv_cat_id`=" . $_GET["id"];
//если запрос выполнен то...
if ($conn->query($sqlDeleteCategory)) {
  //задаём адрес перехода после выполнения запроса
  header("Location: /admin/serv_categories.php");
  //в ином случае показываем ошибку
} else {
  echo "<h2>ERROR!</h2>";
}
