<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//делаем запрос в БД - получаем заявку
$sql1 = "UPDATE `consult` SET `processed`= 1 WHERE `id`=" . $_GET['id'];
//если запрос выполнен то...
if($conn->query($sql1)) {
  //задаём адрес перехода после выполнения запроса
  header("Location: /admin/consult.php");
  //в ином случае показываем ошибку
} else {
    echo "<h2>ERROR!</h2>";
}
?>