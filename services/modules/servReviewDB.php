<?php //вносим отзывы в БД 
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

if(isset($_POST['servRviewText'])){

	// подготовим запрос в БД на внесение новой записи в таблицу отзывов
	$sql = "INSERT INTO `review` (`modificator`, `user_id`, `unit_id`, `date_time`, `reviewText`) VALUES ('1'," . $_COOKIE['user_id'] . ", '" . $_POST['unit_id'] . "', '" . date("Y-m-d H:i:s") . "', '" . $_POST['servRviewText'] . "')";

	echo $sql;


		if( !($result = $conn->query($sql) ) ){
			echo "Error (servReviewDB_1)";
		}else{
			//переходим на страницу с сообщениями 
			header('Location: http://f0476748.xsph.ru/services/allServices.php');
		}

}
?>