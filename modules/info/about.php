<?php
// название страницы
$page = 'homeAbout';

// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>

<div class="card bg-light mb-3">
	<img src="/assets/img/10.jpg" class="card-img-top" alt="image">
	<div class="card-body">
		<h5 class="card-title">Портал содействия предпринимателям и малому бизнесу</h5>
		<p class="card-text">Данная площадка разработана при поддержке наших партнеров и добровольных взносов единомышленников.</p>
		<p class="card-text">Основным посылом к созданию платформы послужили личный опыт ведения бизнеса "с нуля" и желание помочь тем, кто сейчас на этом нелегком пути.</p>
		<p class="card-text">Здесь Вы найдете все, что требуется новичку в торговле или иных коммерческих начинаниях.</p>
		<p class="card-text">Мы поможем Вам преодолеть невзгоды на пути к Успеху!</p>
	</div>
</div>

<?php // подключаем футер
include $_SERVER['DOCUMENT_ROOT'] . "/parts/futer.php";
?>