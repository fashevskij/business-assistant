<?php
$page = "register_b";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include 'parts/header.php';

//функция для определения рандомной строки для верификации
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
//верификация пользователя
if(isset($_GET['user_code'])) {
	$sql = "SELECT * FROM `users_b` WHERE  `confirm_mail`='" . $_GET['user_code'] . "'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users_b` SET `verifided` = '1' WHERE `id` =" . $user['id'];
		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
		}
	}
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//зашифровываем пароль
	$password = md5($_POST['pass']);
	//определяем код верификации
	$user_code = generateRandomString(20);
	//проверяем существует ли пользователь с таким логином и email
	$sql = "SELECT * FROM `users_b` WHERE  `login`='" . $_POST["user_name"] . "' AND `email`='" . $_POST["email"] . "'";
	$result = $conn->query($sql);
	//если пользователь существует
	if($result->num_rows > 0) {
		// выбираем строку с этим пользователем
		$user = mysqli_fetch_assoc($result);
		// проверяем есть ли пароль
		if($user['password'] == null) {
			//если нет, то обновляем данные в БД этого пользователя
			$sql = "UPDATE `users_b` SET `password` = '" . $password . "', `name` = '" . $_POST['name'] . "', `phone` = '" . $_POST['phone'] . "', `confirm_mail` = '$user_code' WHERE `users`.`id` =" . $user['id'];
			//если запрос обработан то выводим что пользователь зарегистрирован
			if($conn->query($sql)) {
				echo "Пользователь зарегистрирован!";
				//Выбираем данного пользователя для передачи его id для повторной верификации
				$sql2 = "SELECT * FROM `users_b` WHERE  `login`='" . $_POST["user_name"] . "' AND `password`='" . $password . "'";
				$result2 = $conn->query($sql2);
				$user2 = mysqli_fetch_assoc($result2);
				?>
				<p>
					Не пришло письмо с подтверждением
				<a class="btn btn-primary" href="verification.php?id=<?php echo $user2['id']; ?>" role="button">Resend</a>	
				</p>
				<?php
				$link = "<a href='http://f0476748.xsph.ru/shop/register_b.php?user_code=$user_code'>Confirm</a>";
				mail($_POST['email'], 'Registration', $link);	
			}
		} else {
				//если есть, то пишем сто пользователь существует
				echo "Пользователь с таким логином и email уже существует!";
		}
			//если пользвателя нету
	} else {
		// регистрируем его внося все данные в БД
		$sql = "INSERT INTO `users_b` (`login`, `email`, `name`, `phone`, `password`, `confirm_mail`) VALUES ('" . $_POST['user_name'] . "', '" . $_POST['email'] . "', '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $password . "', '$user_code')";
		//если запрос обработан то выводим что пользователь зарегистрирован
		if($conn->query($sql)) {
			echo "Пользователь зарегистрирован!";
			//Выбираем данного пользователя для передачи его id для повторной верификации
			$sql = "SELECT * FROM `users_b` WHERE  `login`='" . $_POST["user_name"] . "' AND `password`='" . $password . "'";
			$result = $conn->query($sql);
			$user = mysqli_fetch_assoc($result);
			?>
			<p>
				Не пришло письмо с подтверждением
			<a class="btn btn-primary" href="verification_b.php?id=<?php echo $user['id']; ?>" role="button">Resend</a>	
			</p>
			<?php
			$link = "<a href='http://f0476748.xsph.ru/shop/register_b.php?user_code=$user_code'>Confirm</a>";
			mail($_POST['email'], 'Registration', $link);	
		}	
	} 
}

/*
1. Сделать форму регистрации +
2. Сделать отправку формы +
3. Сделать отправку письма со ссылкой на подтверждение регистрации +
4. Сделать страцину с подтверждением регистрации +
*/


?>

<div class="card col-7 mt-3 mx-auto">
	<div class="card-header mt-3">
		<h5>Регистрация нового пользователя </h5>
	</div>	

	<form class="mx-2" method="POST" id="registration" oninput='password2.setCustomValidity(password2.value != pass.value ? "Пароли не совпадают" : "")'>
	  <div class="form-group mt-3">
	    <label for="name">Логин</label>
	    <input type="text" class="form-control" required name="user_name" placeholder="Введите логин">
	  </div>
	  
	  <div class="form-group">
	    <label for="email">E-mail</label>
	    <input type="email" class="form-control" required name="email" placeholder="Введите email">
	  </div>

	   <div class="form-group">
	    <label for="name">Имя</label>
	    <input type="text" class="form-control" required name="name" placeholder="Введите свое имя">
	  </div>

	   <div class="form-group">
	    <label for="phone">Телефон</label>
	    <input type="text" class="form-control" required name="phone" placeholder="Введите номер телефона">
	  </div>

	  <div class="form-group">
	    <label for="password">Пароль</label>
	    <input type="password" class="form-control" required name="pass" placeholder="Введите пароль">
	  </div>

	  <div class="form-group">
	    <label for="password2">Подтверждение пароля</label>
	    <input type="password" class="form-control" name="password2" placeholder="Введите пароль повторно">
	  </div>
	  
	  <button type="submit" class="btn btn-primary mt-3 mb-2">Регистрация</button>
	</form>
</div>

<?php include 'parts/footer.php'; ?>