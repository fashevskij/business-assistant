<?php //вносим отзывы в БД 
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';

if(isset($_POST['text_review']) && $_POST['text_review'] != "") {
	// подготовим запрос в БД на внесение новой записи в таблицу отзывов
	$sql = "INSERT INTO `review_products` (`product_id`, `user_id`, `text`) VALUES ('" . $_POST['product_id'] . "', '" . $_COOKIE['user_id'] . "', '" . $_POST['text_review'] . "')";

	if($conn->query($sql)){
		//переходим на страницу с продуктом 
		header('Location: /shop/product.php?id=' . $_POST['product_id']);
	}else {
		echo "Error (servReviewDB_1)";
	}
}
?>