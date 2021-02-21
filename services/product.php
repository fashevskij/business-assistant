<?php
	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

	if(isset($_COOKIE["user_admin"])) { 
	} else if(isset($_COOKIE["user_id_b"])) {
		include $_SERVER['DOCUMENT_ROOT'] . "/shop/parts/header.php"; ?>

<!-- начинаем перечень товаров -->
			<div class="container">
	<?php }

	 else {
	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";
	}

	if(isset($_COOKIE["user_id_b"])) {
	$sql = "SELECT * FROM serv_orders WHERE id_request=" . $_GET['prod_id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
 	} else {
		// запрос в БД, выбираем продукты по id
		$sql = "SELECT * FROM serv_orders WHERE id=" . $_GET['prod_id'] . " ";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);

		// запрос в БД, выбираем категорию по id товара
		$categoryResult = $conn->query('SELECT * FROM serv_category WHERE serv_cat_id =' . $row['cat_id'] . '');
		$category =  mysqli_fetch_assoc($categoryResult);
	} ?>

<?php
if(isset($_COOKIE["user_admin"]) || isset($_COOKIE["user_id_b"])) { } else { ?>
<!-- хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Услуги</a></li>
    <li class="breadcrumb-item active">
    	<a href="/services/cat.php?id=<?php echo $category['serv_cat_id'] ?>">
    		<?php echo $category['serv_cat_name'];?>
    	</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']?></li>
  </ol>
</nav> <?php
} ?>
</nav>

<div class="row">
	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
		   		<h5 class="card-title">
		   			<?php echo $row['title']; 
		   			if(isset($_COOKIE["user_admin"]) || isset($_COOKIE["user_id_b"])) { } else { ?>
		   			<a href="/services/servReview.php?id=<?php echo $row['id']?>" type="button" class="btn btn-outline-success btn-sm float-right">Оставить отзыв</a> <?php
	                } ?>
		   		</h5>
		   		<div class="col-md-4">
			    	<img src="/services/images/<?php echo $row['image']; ?>" alt='Продукт' class="card-img float-left mr-4">
			    </div>
		   		<p class="card-text"><?php echo $row['description']; ?></p>
		   		<p class="card-text"><?php echo $row['content']; ?></p>
		   		<p class="card-text">Телефон: <?php echo $row['phone']; ?></p>

		   			<!-- если забит адрес - выводим ссылку на мапсы -->
		   			<?php
		   				if($row['addr_town'] != '' && $row['addr_street'] != '' && $row['addr_house'] != ''){
		   					?>
		   						<p class="card-text">Адрес: <?php echo $row['addr_town'] . " " . $row['addr_street'] . " " . $row['addr_house'] . "/" . $row['addr_flat']; ?>
		   						<a href="https://www.google.com/maps/place/<?php echo $row['addr_town'] . "+" . $row['addr_street'] . "+" . $row['addr_house']?>"  type="button" class="btn btn-outline-info btn-sm ml-3">Google maps</a>
		   						</p>
					<?php
		   				}
	        			if(isset($_COOKIE["user_admin"])) { } else { 
		   				// выведем отзывы потребителей
		   				echo "<hr><p><i class='text-info'>Отзывы</i><p>";
		   				
		   				// формируем запрос 5 последних отзыва
		   				$sql = "SELECT * FROM review WHERE unit_id='" . $row['id'] . "' LIMIT 5";

						// реализуем запрос
						$result = $conn->query($sql);

						// в цикле выводим результат (отзывы потребителей)
						while ($row = mysqli_fetch_assoc($result)){
							echo $row['date_time'] . "<br>";
							echo "<i class='card-text'>" . $row['reviewText'] . "</i><br><br>";
						}
					}
		   			?>
	  		</div>
		</div>
	</div>
</div>

<?php
	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>