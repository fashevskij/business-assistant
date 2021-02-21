<?php
// имя страницы
$page = "homeLogin";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<title>Бизнес-ассистент</title>
	<style>
		body {
			background: url(/assets/img/157.jpg);
		}
	</style>
</head>

<body>
	<!-- Хедер, панель навигации -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="http://f0476748.xsph.ru">Бизнес-Ассистент</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Хедер, навигационные ссылки слева -->
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<!-- навигационная панель сверху -->
				<li class="nav-item">
					<a class="nav-link" href="/modules/info/about.php">О нас</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/modules/info/contacts.php">Контакты</a>
				</li>
				<!-- Хедер, логин справа -->
				<?php
				// если кука существует - пишем "Выход", если нет - "Вход"
				if (isset($_COOKIE['user_id']) or isset($_COOKIE['user_id_b'])) {
				?>
					<li class="nav-item">
						<!-- ссылка на logout.php (там будем удалять куку) -->
						<a class="nav-link" href="/modules/logout.php">Выйти</a>
					</li>
				<?php
				} else {
				?>
				    <li class="nav-item">
						<a class="nav-link" style="width: 200px;" href="/modules/login.php?page=<?php echo $page; ?>">Войти</a>
                    </li>
				<?php
				}
				?>
			 </ul>
		</div>
	</nav>

	<!-- Тело контента страницы -->
	<div class="container">

		<!-- Тело контента страницы, навигация слева -->
		<div class="row m-3">
			<!-- начинаем перечень товаров -->
			<div class="container">