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
    <li class="breadcrumb-item active" aria-current="page">Контакты</li>
  </ol>
</nav>

	<div class="col-12">
		<div class="card mx-auto">
			<h2 class="card-title row justify-content-center">Контакты</h2>
			<img src="images/contacts.jpg" alt='image' class="card-img-top mx-auto mt-2" style="max-width: 80%;">
			
			<div class="card-body">

				<p class="text-left ml-5">Адрес: Киев, Хрещатик, дом 23
					<a href="https://www.google.com/maps/place/Киев+Хрещатик+23"  type="button" class="btn btn-outline-info btn-sm ml-3">Google maps</a>
				</p>
				<p class="text-left ml-5">Телефон: 044-555-13-23</p>
				<p class="text-left ml-5">Факс: 044-555-13-24</p>
				<p class="text-left ml-5">E-mail: business-assistant@gmail.com
				</p>
				<p class="text-left ml-5">График работы: Пн-Сб 9:00 - 20:00</p>

			</div>
		</div>
	</div>	<!-- закрываем row -->
<?php
	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>