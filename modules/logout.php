<?php
if(isset($_COOKIE['user_id'])){
	// очищаем cookie
	setcookie("user_id", '', '', "/");
	header('Location: http://f0476748.xsph.ru/');
}else{
	if(isset($_COOKIE['user_id_b'])){
		
		// очищаем cookie
		setcookie("user_id_b", '', '', "/");
		header('Location: http://f0476748.xsph.ru/');	
	}
	else{
		echo "user non set";
		header('Location: http://f0476748.xsph.ru/');	
	}
}
?>