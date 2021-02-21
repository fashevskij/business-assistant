<?php
// название страницы
$page = 'home';

//очищаем куки с пользователем
setcookie("user_admin", '', '', "/");

// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>

<div class="row row-cols-6 row-cols-md-12 ml-1">

	<div class="col-6">
		<div class="card bg-light mr-3 mb-5 text-left">
			<div>
				<h4 class="text-center mt-1"><a href="/modules/assistance.php" class="card-link text-info"><i>Содействие малому бизнесу</i></a></h4>
			</div>

			<img class="card-img" alt='image' src="/assets/img/4.jpg">
		</div>
	</div>


	<div class="col-6">
		<div class="card bg-light mr-3 mb-5 text-left ml-1">
			<div>
				<h4 class="text-center mt-1"><a href="/modules/support.php" class="card-link text-info"><i>Поддержка предпринимателей</i></a></h4>
			</div>
			<img class="card-img" src="/assets/img/8.jpg" alt="image">
		</div>

	</div>
</div>

<div class="row row-cols-1 row-cols-md-3">

	<div class="col mb-3">
		<div class="card bg-light h-100">
			<img src="/assets/img/1.jpg" class="card-img-top" alt="image">
			<div class="card-body">
				<h5 class="card-title"><a href="/modules/info/info.php" class="card-link text-info"><i>Информация</i></a></h5>
				<p class="card-text"><i>Новости портала<br>Финансы и право</i></p>
			</div>
		</div>
	</div>

	<div class="col mb-4">
		<div class="card bg-light h-100">
			<img src="/assets/img/2.jpg" class="card-img-top" alt="image">
			<div class="card-body">
				<h5 class="card-title"><a href="/modules/info/cooperation.php" class="card-link text-info"><i>Сотрудничество</i></a></h5>
				<p class="card-text"><i>Программы партнерства<br>Наши партнеры</i></p>
			</div>
		</div>
	</div>

	<div class="col mb-4">
		<div class="card bg-light h-100">
			<img src="/assets/img/3.jpg" class="card-img-top" alt="image">
			<div class="card-body">
				<h5 class="card-title"><a href="/modules/info/innovation.php" class="card-link text-info"><i>Инновации</i></a></h5>
				<p class="card-text"><i>Передовые бизнес-предложения<br>Опыт внедрения инноваций</i></p>
			</div>
		</div>
	</div>
</div>

<?php // подключаем футер
include $_SERVER['DOCUMENT_ROOT'] . "/parts/futer.php";
?>