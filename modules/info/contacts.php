<?php
// название страницы
$page = 'homeContacts';

// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>


<div class="card bg-light mb-3">
	<img src="/assets/img/11.jpg" class="card-img-top" alt="image">
	<div class="card-body">
		<h5 class="card-title ml-3">Портал содействия предпринимателям и малому бизнесу</h5>
		<div class="card-body">

			<p class="text-left ml-5">Адрес: Киев, Хрещатик, дом 23
				<a href="https://www.google.com/maps/place/Киев+Хрещатик+23" type="button" class="btn btn-outline-info btn-sm ml-3">Google maps</a>
			</p>
			<p class="text-left ml-5">Телефон: 044-555-13-23</p>
			<p class="text-left ml-5">Факс: 044-555-13-24</p>
			<p class="text-left ml-5">E-mail: business-assistant@gmail.com
			</p>

		</div>
	</div>
</div>

<?php // подключаем футер
include $_SERVER['DOCUMENT_ROOT'] . "/parts/futer.php";
?>