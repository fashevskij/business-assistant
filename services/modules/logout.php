<?php
if(isset($_COOKIE['user_id'])){
	// очищаем cookie
	setcookie("user_id", '', '', "/");
}else{
	if(isset($_COOKIE['user_id_b'])){
		// очищаем cookie
		setcookie("user_id_b", '', '', "/");
	}
}

// переход в услуги
header('Location: http://f0476748.xsph.ru/services/allServices.php');	
?>