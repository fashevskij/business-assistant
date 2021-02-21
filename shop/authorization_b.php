<?php
$page = "shopLogin_b";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include 'parts/header.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//зашифровуем пароль
	$password = md5($_POST['password']);
	//делаем запрос в БД - выбираем пользователя
	$sql = "SELECT * FROM `users_b` WHERE  `email`='" . $_POST["email"] . "' AND `password`='" . $password . "'";
	//получаем результат
	$result = $conn->query($sql);
	//если пользователь существует
	if($result->num_rows > 0) {
		//выбираем пользователя
		$user = mysqli_fetch_assoc($result);
		if($user['login'] == "admin") {
			//создаем куки для хранения данных пользователя
			setcookie("user_admin", $user['id'], time() + 60*60*7, "/");
			header("Location: /admin/");
		} else {
			//проверяем верифицирован ли он
			if($user['verifided'] == '1') {

				//создаем куки для хранения данных пользователя
				setcookie("user_id_b", $user['id'], time() + 60*60*60, "/");
				header("Location: /shop/account_b.php");
			} else {
				//если нет, то выводим ссылку на повторную верификацию
				?>
				<a class="btn btn-primary" href="verification_b.php?id=<?php echo $user['id']; ?>" role="button">Подтвердите свою почту!</a>	
				<?php
			}
		}	
	} else {
		echo "Такого пользователя не существует!";
	}
}
?>

<div class="card col-5 mt-3 mx-auto">
	<div class="card-header mt-2">
		<h5>Авторизация</h5>
	</div>	
	<form class="mx-2" method="POST">
	  <div class="form-group mt-3">
	    <label for="email">Email</label>
	    <input type="text" class="form-control" name="email" placeholder="Введите email">
	  </div>

	  <div class="form-group">
	    <label for="password">Пароль</label>
	    <input type="password" class="form-control" required name="password" placeholder="Введите пароль">
	  </div>

	  <button type="submit" class="btn btn-primary mr-3 mb-2">Авторизоваться</button>
	  <a href="register_b.php" class="btn btn-primary mb-2">Регистрация</a>
	</form>
</div>

<?php include 'parts/footer.php'; ?>