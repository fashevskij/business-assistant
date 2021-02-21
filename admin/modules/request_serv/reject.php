<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//делаем запрос в БД - получаем заявку
$sql = "UPDATE `request_serv` SET `status`= 'Отклонено' WHERE `id`=" . $_GET['id'];
//если запрос выполнен то...
if( $conn->query($sql)) {
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/request_serv.php");
    //в ином случае показываем ошибку
} else {
    echo "<h2>ERROR!</h2>";
}
?>