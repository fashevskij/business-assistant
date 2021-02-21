<?php
include 'configs/db.php';
$page = "account";
$nav_activ = "account";
include 'parts/header.php';

//получаем авторизованного пользователя
//делаем запрос в БД
$sql = "SELECT * FROM users WHERE id=". $user_id;
//получаем результат
$result = $conn->query($sql);
//получаем пользователя
$user = mysqli_fetch_assoc($result);
?> 

<div class="row m-4">
	<?php 
	//подключаем навигацию
	include 'parts/account/nav.php'; 
	?>

<div class="col-6 ml-5">	
	<form method="POST" id="form_change-user" action="parts/account/change_user.php">
	  <h3 class="mt-5">Личные даные</h3>
	  <div class="form-row mt-3">
	    <div class="form-group col-md-6">
	      <label>Логин</label>
	      <input type="text" name="login" class="form-control" placeholder="<?php echo $user['login'] ?>">
	    </div>
	    <div class="form-group col-md-6">
	      <label>Имя</label>
	      <input type="text" name="name" class="form-control" placeholder="<?php echo $user['name'] ?>">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label>Email</label>
	      <input type="text" name="email" class="form-control" placeholder="<?php echo $user['email'] ?>">
	    </div>
	    <div class="form-group col-md-6">
	      <label>Телефон</label>
	      <input type="text" name="phone" class="form-control" placeholder="<?php echo $user['phone'] ?>">
	    </div>
	  </div>
	  <button value="1" type="submit" class="btn btn-primary" onclick="changeUser()">Изменить</button>
	
	</form>
	</br>
	<form method="POST">
	  <h3 class="mt-5">Изменить пароль</h3>
	  <div class="form-row mt-3">
	    <div class="form-group col-md-6">
	      <label>Текущий пароль</label>
	      <input type="password" name="password" class="form-control">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label>Новый пароль</label>
	      <input type="password" name="new_password" class="form-control">
	    </div>
	    <div class="form-group col-md-6">
	      <label>Повторите пароль</label>
	      <input type="password" name="return_password" class="form-control">
	    </div>
	  </div>
	  <button type="submit" class="btn btn-primary">Подтвердить</button>
	</form>
</div>

<?php 
//если был запрос на изменение пароля - пользователь ввел текущий пароль
if (isset($_POST["password"])) {
	//зашифровываем пароль
	$password = md5($_POST['password']);
	//делаем запрос в БД
	$sql_password = "SELECT * FROM `users` WHERE `users`.`id` =". $_COOKIE["user_id"];
	//получаем результат
	$result_password = $conn->query($sql_password);
	$user = mysqli_fetch_assoc($result_password);
	//если пароль совпадает с введеным пользователем
	if ($user['password'] == $password) {
		//проверяем совпадают ли новые пароли между собой
		if ($_POST["new_password"] == $_POST["return_password"]) {
			//зашифровываем новый пароль
			$password_new = md5($_POST['new_password']);
			//если пароли введени одинаковы делаем запрос к БД на изменение пароля
			$sql_change = "UPDATE `users` SET `password` = '" . $password_new . "' WHERE `users`.`id` =". $_COOKIE["user_id"];
			//получаем результат
			$result_change = $conn->query($sql_change);
		} else {
			echo "Пароли не совпадают!";
		}
	} else {
		echo "Текущий пароль введен не верно!!";
	}
}

include 'parts/footer.php'; 
?>