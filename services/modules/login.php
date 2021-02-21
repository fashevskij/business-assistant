<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

// имя страницы
$page = "servLogin";

// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";

// Проверим существование запроса POST
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

	// зашифруем пароль
	$password = md5($_POST['password']);

	//*** проверим нет ли такого пользователя в БД ***

	// создаем запрос на поиск пользователя с логином и паролем
	$sql = "SELECT * FROM users WHERE email LIKE '" . $_POST['email'] . "' AND password LIKE '" . $password . "'";

	// реализуем запрос
	$result = $conn->query($sql);

	// если найдено > 0 результатов
	// Пользователь найден, проверим подтверждение почты
	if($result->num_rows > 0){

		// переводим в массив результаты запроса
		$user = mysqli_fetch_assoc($result);

		//если почта у пользователя верифицирована, то переходим на главную
		if($user['verifided'] == "1"){

			//проверим наличие куки: если есть - обновить, если нет - создать 
			// если существует cookie
			if (isset($_COOKIE['user_id'])){

				// очищаем cookie
				setcookie("user_id", '', '', "/");
				
					if(isset($_COOKIE['user_id_b'])){
						setcookie("user_id_b", '', '', "/");
					}
				
				// создаем cookie на 1 час (60сек * 60мин)
				setcookie("user_id", $user['id'], time() + 60*60, "/");

			}else{

				if(isset($_COOKIE['user_id_b'])){
					setcookie("user_id_b", '', '', "/");
				}

					// создаем cookie на 1 час (60сек * 60мин)
					setcookie("user_id", $user['id'], time() + 60*60, "/");
			}

			// переход на главную
			header('Location: http://f0476748.xsph.ru/services/allServices.php');
		
		}else{

				// выводим форму с требованием верификации почты
				header('Location: http://f0476748.xsph.ru/modules/registration/emailConfirmation.php');
			}
	}else{

			// если такой пользователь не найден
			echo "Такой пользователь не зарегистрирован";
		}
}	

?>

<!-- Хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Услуги</a></li>
    <li class="breadcrumb-item active" aria-current="page">Авторизация</li>
  </ol>
</nav>	<!-- завершаем хлебные крошки -->


<!-- кнопки регистрации и верификации данных -->
<a class="btn btn-outline-info mr-3 mb-3" href="http://f0476748.xsph.ru/shop/authorization_b.php?page=<?php echo $page; ?>">Авторизация бзнес-лиц</a>
<a class="btn btn-outline-info mb-3" href="http://f0476748.xsph.ru/services/registration.php">Регистрация</a>

<a class="btn btn-outline-info ml-3 mb-3" href="http://f0476748.xsph.ru/services/modules/registration/emailConfirmation.php">Верификация E-mail</a>


<!-- авторизация пользователя -->
	<div class="card">
		<div class="card-header">Для авторизации введите E-mail и пароль</div>	
			<form class="mx-2" method="POST" id="login">

				  <div class="form-group mt-3">
				    <label for="email">E-mail</label>
				    <input type="email" class="form-control" required name=email>
				    <small id="emailHelp" class="form-text text-muted">Введите E-mail</small>
				  </div>

				  <div class="form-group">
				    <label for="password">Пароль</label>
				    <input type="password" class="form-control" required name=password>
				    <small class="form-text text-muted">Введите Пароль</small>
				  </div>

				  <button type="submit" class="btn btn-info mt-3 mb-2">Авторизоваться</button>

			</form>
	</div>
<!-- завершаем авторизацию пользователя -->

<?php	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>