<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//делаем запрос в БД - получаем заявку
$sql1 = "UPDATE `request_serv` SET `status`= 'Добавлено' WHERE `id`=" . $_GET['id'];
//если запрос выполнен то...
if($conn->query($sql1)) {
  //создаём запрос к БД на вывод товаров из таблицы заказов
  $sql = "SELECT * FROM request_serv WHERE `id`=" . $_GET['id']; 
  //выполнить sql запрос в базе данных
  $result = $conn->query($sql);
  //получаем продукт у которого номер заявки соответствует выбранной
  $request = mysqli_fetch_assoc($result);
  //создаём запрос к БД на добавление товара
  $sql = "INSERT INTO `serv_orders`(`id_request`, `user_b_id`, `title`, `cat_id`, `description`, `content`, `phone`, `addr_town`, `addr_street`, `addr_house`, `addr_flat`, `image`) VALUES (" . $request['id'] . ", '" . $request['user_id'] . "', '" . $request['title'] . "', '" . $request['cat_id'] . "', '" . $request['description'] . "', '" . $request['content'] . "', '" . $request['phone'] . "', '" . $request['town'] . "', '" . $request['street'] . "', '" . $request['house'] . "', '" . $request['flat'] . "','" . $request['image'] . "')"; 
  //выполнить sql запрос в базе данных;
  if( $conn->query($sql)) {
    //в ином случае показываем ошибку
  } else {
      echo "<h2>ERROR!</h2>";
  }
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/request_serv.php");
    //в ином случае показываем ошибку
} else {
    echo "<h2>ERROR!</h2>";
}
?>