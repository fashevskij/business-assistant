<?php
include 'configs/db.php';
$page = "home";
if (isset($_COOKIE["user_admin"])) {
} else {
	include 'parts/header.php';
}

if (isset($_COOKIE["user_id_b"])) {
	$sql = "SELECT * FROM products WHERE request_id=" . $_GET['id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
} else {
	$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);

	$categoryResult = $conn->query('SELECT * FROM categories WHERE id=' . $row['category_id']);
	$category = mysqli_fetch_assoc($categoryResult);
}
?>

<!-- хлебные крошки -->
<div class="container">
	<div class="row m-2">
		<?php
		if (isset($_COOKIE["user_id_b"]) || isset($_COOKIE["user_admin"])) {
		} else { ?>
			<nav aria-label="breadcrumb ">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/shop/">Все</a></li>
					<li class="breadcrumb-item">
						<a href="cat.php?id=<?php echo $category['id']; ?> ">
							<?php echo $category['title']; ?>
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
				</ol>
			</nav> <?php
				} ?>
		<div class="col-12">
			<div class="card border-info mb-3">
				<div class="card-body">
					<h5 class="card-title text-left ml-2">
						<?php echo $row['title'];
						if (isset($_COOKIE["user_admin"])) {
						} else { ?>
							<a href="/shop/review.php?product_id=<?php echo $row['id'] ?>" type="button" class="btn btn-outline-success btn-sm float-right">Оставить отзыв</a> <?php
						} ?>
					</h5>
					<div class="col-md-4">
						<img src="/shop/images/<?php echo $row['image']; ?>" alt='Продукт' class="card-img float-left mr-4">
					</div>
					<div>
						<p class="card-text"><?php echo $row['description']; ?></p>
						<p class="card-text"><?php echo $row['content']; ?></p>
						<p class="card-text">Цена: <?php echo $row['cost']; ?>грн</p>
					</div>
					<?php
					if (isset($_COOKIE["user_id_b"]) || isset($_COOKIE["user_admin"])) {
					} else { ?>
						<a class="btn btn-warning mt-3" onclick="addToFavorites(this)" data-id='<?php echo $row['id']; ?>'>В избранное</a>
					<?php 
					} 
					?>
				</div> <!-- закрываем div card-body-->
			</div> <!-- закрываем div card border-info mb-3-->
		</div> <!-- закрываем div col-12-->

		<?php
		if (isset($_COOKIE["user_admin"])) {
		} else { ?>
			<div class="col-12" id='review'>
				<p><i class='text-info'>Отзывы</i></p>
				<?php
				// выводим отзывы потребителей
				//определяем н какой странице отзывов продукта находится пользователь
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}
				// определяем текущую страницу
				$kol = 3;  //количество записей для вывода
				$art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить
				// формируем запрос на вывод 3 отзывов
				$sql = "SELECT * FROM review_products WHERE product_id='" . $row['id'] . "' LIMIT $art, $kol";
				// реализуем запрос
				$result = $conn->query($sql);
				// в цикле выводим результат (отзывы потребителей)
				while ($review = mysqli_fetch_assoc($result)) { ?>
					<div class="mt-4">
						<i><?php echo $review['data']; ?></i><br>
						<i><?php echo $review['text']; ?></i>
					</div> <?php
				}
				if (mysqli_num_rows($result) > 2) { ?>
			</div> <!-- закрываем div col-12 (блок с отзывами)-->
			<div class="row mt-3">
				<div class="col-12 offset-1">
					<input type="hidden" value="<?php echo $row['id']; ?>" id='product_review'>
					<input type="hidden" value="<?php echo $page; ?>" id='current_page_review'>
					<button class="btn btn-warning btn-sm " id='show_more_review'>Показать еще</button>
				</div>
			</div> <?php
				}
		} ?>

	<?php include 'parts/footer.php'; ?>