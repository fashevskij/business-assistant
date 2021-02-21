<?php
// подключаем базу данных
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//если пользователь в таблице админки выбран 
if(isset($_GET["id"])) {
  //посылаем запрос в БД на удаление пользователя из таблицы в БД
  $sqlDelete = "DELETE FROM users_b WHERE id= '" . $_GET["id"] . "' ";
}
  //если запрос выполнен то...
  if( $conn->query($sqlDelete)) {
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/users_b.php");
    //в ином случае показываем ошибку
  } else {
    echo "<h2>ERROR!</h2>";
  }
?>

