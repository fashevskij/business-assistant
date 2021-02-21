<?php
include 'configs/db.php';
$page = "business";
$nameTitle = "Business Assistant";
include 'parts/header.php';
?>

<div class="container">
	<div class="row m-2">
	  	<div class="col-9">
	  		<div class="container">
				<div class="row" id='products'>
					<?php
					$sql = "SELECT * FROM `products_maps` WHERE `status` = 'Добавлено'";
					$result = $conn->query($sql);
					while ($row = mysqli_fetch_assoc($result)) {
					include 'parts/product_card_b.php';	
					}
					?>
				</div> <!-- закрываем div row внутри col-9-->
<?php 
include 'parts/footer.php'; 
?>