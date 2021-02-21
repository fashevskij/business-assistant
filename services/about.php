<?php
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';
// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";
?>

<!-- Хлебные крошки -->
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Услуги</a></li>
		<li class="breadcrumb-item active" aria-current="page">О нас</li>
	</ol>
</nav>
<div class="col-12">
	<div class="card">
		<h3 class="card-title row justify-content-center">О нас</h3>
		<img src="images/about.jpg" alt='image' class="card-img-top mx-auto mt-2" style="max-width: 80%;">

		<div class="card-body">
			<h3 class="ml-5">Портал поддержки малого бизнеса</h3>
			<p class="text-left ml-5">Мы поможем Вам реализовать мечту об успешном бизнесе<br>Здесь Вы найдете возможность сделать еще один шаг к развитию своего Дела.<br>Мы предлагаем Вам воспользоваться сервисами, которые начинающие предприниматели, порой, упускают из виду:<br>Торговая площадка<br>
				Рекламма товаров и услуг<br>
				Финансовая консультация<br>
				Правовая консультация<br>
				Расширение круга деловых контактов</p>
			<p class="text-left ml-5"></p>
			<p class="text-left ml-5"></p>
			<p class="text-left ml-5"></p>
			<p class="text-left ml-5"></p>
			<p class="text-left ml-5"></p>
		</div>
	</div>
</div>
<?php
// подключаем футер
include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>