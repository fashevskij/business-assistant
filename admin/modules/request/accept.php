<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//делаем запрос в БД - получаем заявку
$sql1 = "UPDATE `request` SET `status`= 'Добавлено' WHERE `id`=" . $_GET['id'];
//если запрос выполнен то...
if($conn->query($sql1)) {
  //создаём запрос к БД на вывод товаров из таблицы заказов
  $sql = "SELECT * FROM request WHERE `id`=" . $_GET['id']; 
  //выполнить sql запрос в базе данных
  $result = $conn->query($sql);
  //получаем продукт у которого номер заявки соответствует выбранной
  $request = mysqli_fetch_assoc($result);
  //создаём запрос к БД на добавление товара
  $sql = " INSERT INTO `products`(`request_id`, `title`, `cost`, `description`, `content`, `image`, `category_id`) VALUES (" . $request['id'] . ", '" . $request['title'] . "', '" . $request['cost'] . "', '" . $request['description'] . "', '" . $request['content'] . "', '" . $request['image'] . "', '" . $request['category_id'] . "')"; 
  //выполнить sql запрос в базе данных
  $result = $conn->query($sql);
  if( $conn->query($sql)) {
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/request.php");
    //в ином случае показываем ошибку
  } else {
      echo "<h2>ERROR!</h2>";
  }
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/request.php");
    //в ином случае показываем ошибку
} else {
    echo "<h2>ERROR!</h2>";
}
?>