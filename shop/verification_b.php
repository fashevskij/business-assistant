<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include 'parts/header.php';

// функция для определения рандомной строки
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if(isset($_GET['user_code'])) {
	$sql = "SELECT * FROM `users_b` WHERE  `confirm_mail`='" . $_GET['user_code'] . "'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users_b` SET `verifided` = '1' WHERE `id` =" . $user['id'];
		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
		} else {
			echo "Пользователь не верифицирован!";
		} 
	}else {
			echo "EROR";
		}
}

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	
	$user_code = generateRandomString(20);
	$link = "<a href='http://f0476748.xsph.ru/shop/verification_b.php?user_code=$user_code'>Confirm</a>";
	$sql = "UPDATE `users_b` SET `confirm_mail` = '$user_code' WHERE `id`=" . $_GET["id"];
	$result = $conn->query($sql);
	mail($_POST['email'], 'Verification', $link);
}

?>
<div class="card col-7 mt-3 mx-auto">
	<div class="card-header">
		<h5>Верификация</h5>
	</div>	
	<form class="mx-2" method="POST" id="login">
		<p class="mt-2">Для завершения регистрации необходимо подтвердить E-mail</p>
		<p>Пожалуйста, введите свой E-mail и мы отправим Вам ссылку с кодом подтверждения</p>
	    <div class="form-group mt-3">
	    <label for="email">E-mail</label>
	    <input type="email" class="form-control" required name=email placeholder="Введите свой E-mail">
	  </div>

	  <button type="submit" class="btn btn-primary mt-3 mb-2">Отправить мне ссылку</button>

	</form>
</div>

<?php include 'parts/footer.php'; ?>