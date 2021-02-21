<?php   // страница формирования отзывов потребителей о предоставленных услугах

	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';
	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/header.php";

// проверим вошел ли пользователь в систему
	if(isset($_COOKIE['user_id'])){
		// переменная-признак логирования пользователя
		$userLogged = '';
		$reviewText = '';
	}else{
		$userLogged = 'disabled="disabled"';
		$reviewText = 'Чтобы иметь возможность оставить коментарий, необходимо авторизоваться';
	}

		// запрос в БД, выбираем продукты по id
		$sql = "SELECT * FROM serv_orders WHERE id=" . $_GET['id'] . " ";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);

		// запрос в БД, выбираем категорию по id товара
		$categoryResult = $conn->query('SELECT * FROM serv_category WHERE serv_cat_id =' . $row['cat_id'] . '');
		$category =  mysqli_fetch_assoc($categoryResult);
?>
<!-- хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/services/">Домашняя</a></li>
    <li class="breadcrumb-item active">
    	<a href="/services/cat.php?id=<?php echo $category['serv_cat_id'] ?>">
    		<?php echo $category['serv_cat_name'];?>
    	</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']?></li>
  </ol>
</nav>

<div class="row">
	
	<div class="col-12">
		<div class="card">
			<div class="card-header"><?php echo $row['title']; ?></div>				
				<div class="card-body">
		   			<h5 class="card-title">
		   			</h5>
		   		<form class="mx-2" action="/services/modules/servReviewDB.php" method="POST" id="servReviewForm">
				  <div class="form-group">
				    <div class="form-group">
					    <label for="servRviewText"><i class="text-info">Ваш отзыв</i></label>
					    <textarea type="text" class="form-control" name="servRviewText" rows="3" <?php echo $userLogged ?>><?php echo $reviewText ?></textarea>
					    <input type="hidden" name="unit_id" value="<?php echo $_GET['id']?>">
					</div>
				  </div>

				  <button type="submit" class="btn btn-info mt-3 mb-2">Отправить</button>
				</form>
				
				</div>
	  	</div>
	</div>
</div>

<?php
	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/services/parts/futer.php";
?>