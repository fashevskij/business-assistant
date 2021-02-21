<?php   // страница формирования отзывов потребителей о предоставленных услугах

// подключаем базу данных 
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
// подключаем хеадер
include $_SERVER['DOCUMENT_ROOT'] . "/shop/parts/header.php";

// запрос в БД, выбираем продукты по id
$sql = "SELECT * FROM products WHERE id=" . $_GET['product_id'];
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

// запрос в БД, выбираем категорию по id товара
$categoryResult = $conn->query('SELECT * FROM categories WHERE id=' . $row['category_id']);
$category = mysqli_fetch_assoc($categoryResult);
?>
<!-- хлебные крошки -->
<div class="container">
	<div class="row m-3">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="/shop/">Продукты</a></li>
		    <li class="breadcrumb-item active">
		    	<a href="/shop/cat.php?id=<?php echo $category['id']; ?>">
		    		<?php echo $category['title'];?>
		    	</a>
		    </li>
		    <li class="breadcrumb-item active">
		    	<a href="/shop/product.php?id=<?php echo $row['id']; ?>">
		    		<?php echo $row['title']; ?>
		    	</a>
		    </li>
		    <li class="breadcrumb-item active" aria-current="page">Оставить отзыв</li>
		  </ol>
		</nav>
	</div>
	
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<?php echo $row['title']; ?>
			</div>	
			<div class="card-body">
	   			<h6 class="card-title"><i class="text-info">Ваш отзыв</i></h6>
	   			<form action="/shop/modules/review/add_review.php" method="POST">
	   				<?php // проверим вошел ли пользователь в систему
					if(isset($_COOKIE['user_id'])) { ?>
						<textarea type="text" class="form-control" name="text_review" rows="3"></textarea><?php
					} else { ?>
						<textarea type="text" class="form-control" name="text_review" rows="3" disabled="disabled">Чтобы иметь возможность оставить коментарий, необходимо авторизоваться!</textarea> <?php
					} ?>
				    <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']?>">
			  		<button type="submit" class="btn btn-info mt-3 mb-2">Отправить</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
// подключаем футер
include $_SERVER['DOCUMENT_ROOT'] . "/shop/parts/footer.php";
?>