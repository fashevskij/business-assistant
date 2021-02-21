<?php
include 'configs/db.php';
$page = "home";
include 'parts/header.php';

$sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
$category = mysqli_fetch_assoc($conn->query($sql));
?>

<div class="container">
		<div class="row m-2">

		  	<div class="col-3">
			    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/cat_nav.php'; ?>
		  	</div>

		  	<div class="col-9">
		  		<div class="container">

		  			<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="/shop/">Все</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><?php echo $category['title']; ?></li>
					  </ol>
					</nav>

					<div class="row">
						<?php
						$sql = "SELECT * FROM products WHERE category_id=" . $_GET['id'] . " AND `status` = 'Добавлено'";
						$result = $conn->query($sql);
						while ($row = mysqli_fetch_assoc($result)) {
							include 'parts/product_card.php';
					    }
						?>
					</div> <!-- закрываем div row внутри col-9-->

<?php include 'parts/footer.php'; ?>