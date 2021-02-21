<?php
	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';
	
	// имя страницы
	$page = "validation";

	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";

// Проверим существование запроса POST
if (isset($_POST['email']) and $_SERVER["REQUEST_METHOD"]=="POST"){

	// генерируем случайную последовательность символов
	$u_code = RandomString(20);


	// запрос на изменение кода верификации
	$sql = "UPDATE `users` SET `confirm_mail` = '" . $u_code . "' WHERE `email`='" . $_POST['email'] . "'";

	// осущиствляем запрос в БД, выведем при успехе сообщение
	if(!($conn->query($sql))){
		echo "Error";
	}



	// создаем ссылку, содержащую запрос с нашей строкой из случайных символов
	$link = "<a href='http://f0476748.xsph.ru/services/registration.php?u_code=" . $u_code . "'</a>";
	
	// отправим пользователю письмо со ссылкой
	mail($_POST['email'], 'business-assistant registration', $link);
}

// генератор случайной цифро-буквенной последовательности заданной длины
function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = "";
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

?>

<!-- Хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/services/">Услуги</a></li>
    <li class="breadcrumb-item active" aria-current="page">Валидация E-mail</li>
  </ol>
</nav>	<!-- завершаем хлебные крошки -->

<!-- валидация почты -->
	<div class="card">
		<div class="card-header">Верификация E-mail</div>	
			<form class="mx-2" method="POST" id="login">
				<p class="mt-2">Для завершения регистрации необходимо подтвердить E-mail</p>
				<p>Пожалуйста, введите свой E-mail и мы отправим Вам ссылку с кодом подтверждения</p>
			  <div class="form-group mt-3">
			    <label for="email">E-mail</label>
			    <input type="email" class="form-control" required name=email>
			    <small id="emailHelp" class="form-text text-muted">Введите свой E-mail</small>
			  </div>

			  <button type="submit" class="btn btn-info mt-3 mb-2">Отправить мне ссылку</button>

			</form>
	</div>
<!-- завершаем валидацию почты -->


<?php	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>