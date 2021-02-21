<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<a class="nav-link <?php if( !isset($_GET['id']) ){echo 'active';}?>" href="/services/allServices.php">Все услуги</a>
	
	<?php
		//запрос в БД, выбираем все категории 
		$sql = "SELECT * FROM serv_category WHERE `status`= 'Добавлено'";
		$result = $conn->query($sql);
		while ( $row = mysqli_fetch_assoc($result) ) {
			if (isset($_GET['id']) && $_GET['id'] == $row['serv_cat_id']) {?>

				<!-- подсвечиваем выбранную категорию товара в боковом блоке навигации -->
				<a class="nav-link active" href="/services/cat.php?id=<?php echo $row['serv_cat_id']?>"><?php echo $row['serv_cat_name']?></a>
			<?php
			} 
			else {?>
				<!-- выводим обычным способом не выбранные категории товара в боковом блоке навигации -->
				<a class="nav-link" href="/services/cat.php?id=<?php echo $row['serv_cat_id']?>"><?php echo $row['serv_cat_name']?></a>
			<?php
			}
		}
	?>
</div>