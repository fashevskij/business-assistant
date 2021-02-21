<?php
	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
	
	// имя страницы
	$page = "homeRegistration";

	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";

// если пришел проверочный код 
// (пользователь перешел по ссылке подтверждения почты)
if( isset($_GET['u_code']) ){

	// запрос на поиск строки в поле confirm_email, которая совпадает с тем,
	// что пришло в запросе
	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";

	// реализуем запрос
	$result = $conn->query($sql);

	// если найдено > 0 результатов
	if($result->num_rows > 0){
	
		// переведем в массив ответ БД
		$user = mysqli_fetch_assoc($result);

		// запрос на изменение статуса верификации в записи пользователя
		$sql = "UPDATE `users` SET `verifided` = '1', `confirm_mail` = ''  WHERE `id` =" . $user['id'];

			// реализуем запрос
			if($conn->query($sql)){

				echo "Пользователь верифицирован";	
					
			}
	}
}

// Проверим существование запроса POST
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

	// зашифруем пароль
	$password = md5($_POST['password']);


	//*** проверим нет ли такого пользователя в БД ***

	// создаем запрос на поиск пользователя с логином и паролем
	$sql = "SELECT * FROM users WHERE login LIKE '" . $_POST['name'] . "' AND password LIKE '" . $password . "'";

	// реализуем запрос
	$result = $conn->query($sql);

	// если найдено > 0 результатов
	if($result->num_rows > 0){

		var_dump("Пользователь с такими логином и паролем уже сужествует!");

	}else{

		// генерируем случайную последовательность символов
		$u_code = RandomString(20);

		// подготовим запрос в БД на внесение новой записи в таблицу пользователей
		$sql = "INSERT INTO users(login, password, email, confirm_mail) VALUES ('" . $_POST['name'] . "','" . $password . "','" . $_POST['email'] ."','" . $u_code ."')";

		// осущиствляем запрос в БД, выведем при успехе сообщение
		if($conn->query($sql)){

				var_dump("Пользователь зарегистрирован");	

			// создаем ссылку, содержащую запрос с нашей строкой из случайных символов
			$link = "<a href='http://f0476748.xsph.ru/modules/registration/registration.php?u_code=" . $u_code . "'</a>";

			// отправим пользователю письмо со ссылкой
			mail($_POST['email'], 'Бизнес-ассистент, регистрация', $link);
		}
	}	
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
    <li class="breadcrumb-item"><a href="/">Домашняя</a></li>
    <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
  </ol>
</nav>	<!-- завершаем хлебные крошки -->

<!-- регистрация нового пользователя -->
	<div class="card">
		<div class="card-header">Регистрация нового пользователя</div>	
			<form class="mx-2" method="POST" id="registration" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
			  <div class="form-group mt-3">
			    <label for="name">Логин</label>
			    <input type="text" class="form-control" required name="name">
			    <small id="nameHelp" class="form-text text-muted">Введите логин</small>
			  </div>
			  
			  <div class="form-group">
			    <label for="email">E-mail</label>
			    <input type="email" class="form-control" required name=email>
			    <small id="emailHelp" class="form-text text-muted">Введите email</small>
			  </div>

			  <div class="form-group">
			    <label for="password">Пароль</label>
			    <input type="password" class="form-control" required name=password>
			    <small class="form-text text-muted">Введите пароль</small>
			  </div>

			  <div class="form-group">
			    <label for="password2">Введите пароль повторно</label>
			    <input type="password" class="form-control" name=password2>
			    <small class="form-text text-muted">Подтверждение пароля</small>
			  </div>
			  
			  <button type="submit" class="btn btn-info mt-3 mb-2">Регистрировать</button>

			</form>
	</div>
<!-- завершаем регистрацию нового пользователя -->

<?php	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/futer.php";
?>