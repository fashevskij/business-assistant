<?php
	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

	// название страницы
	$page = 'services';

	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";
?>

<!-- Хлебные крошки без крошек (главная страница) -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/services/">Услуги</a></li>
  </ol>
</nav>

<!-- выводим продукты в поле контента -->
<div class="row" id="products">
	<?php

			if(isset($_GET['page'])){
				//запрос в БД, выбираем все продукты 
				$sql = "SELECT * FROM serv_orders WHERE `status`= 'Добавлено' LIMIT 6 OFFSET " . ( ($_GET['page'] - 1) * 6);
			}
			else{
				$sql = "SELECT * FROM serv_orders WHERE `status`= 'Добавлено' LIMIT 6";
			}

		
		$result = $conn->query($sql);
		while ( $row = mysqli_fetch_assoc($result) ) {
			include 'parts/product_card.php';
		}
		?>
</div>		

<!-- кнопка Показать еще -->
<?php
	if( !(isset($_GET['page']) && $_GET['page'] != '1') ) {
?>	
		<div class="row" >
			<div class="col-4 offset-6">
				<input type="hidden" value="1" id="current-page">
				<button class="btn btn-primary mt-5" id="showMore">Показать еще</button>
			</div>
		</div><!-- закрываем кнопку Показать еще -->
<?php
	}
?>
<!-- Пагинация -->
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/pagination.php";
?><!-- закрываем пагинацию -->

	<script src="/services/assets/js/main.js"></script>

<?php	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>