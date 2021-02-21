<?php
include 'configs/db.php';
$page = "home";
include 'parts/header.php';

?>
<div class="container">
	<div class="row m-2">
	  	<div class="col-3">
		    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/cat_nav.php'; ?>
	  	</div>

	  	<div class="col-9">
	  		<div class="container">
				<div class="row" id='products'>
					<?php
					if (isset($_GET['page'])){
						$page = $_GET['page'];
					} else {
						$page = 1;
					}
					// текущая страница
					$kol = 6;  //количество записей для вывода
					$art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить

					$sql = "SELECT * FROM `products` WHERE `status`= 'Добавлено' LIMIT $art, $kol";
					$result = $conn->query($sql);
					while ($row = mysqli_fetch_assoc($result)) {
					include 'parts/product_card.php';	
					}
					?>
				</div> <!-- закрываем div row внутри col-9-->

				<div class="row">
					<div class="col-4 offset-4">
						<?php
						if (isset($_GET['page'])){
						?>
							<input type="hidden" value="<?php echo $_GET['page']; ?>" id='current-page'>
							<?php
						} else {
							?>
							<input type="hidden" value="1" id='current-page'>
							<?php
						}
						?>
						<button class="btn btn-warning btn-lg" id='show-more'>Показать еще</button>
					</div>
				</div>

<?php 
include 'modules/products/nav_page.php';
include 'parts/footer.php'; 
?>