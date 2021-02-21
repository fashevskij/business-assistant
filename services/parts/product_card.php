<div class="col-12">
	<div class="card border-info mb-3">
		<div class="card-body">
	   		<h5 class="card-title text-left ml-2">
	   			<a href="/services/product.php?id=<?php echo $row['cat_id']; ?>&prod_id=<?php echo $row['id']; ?>">
	   			<?php echo $row['title']; ?>
	   			</a>	
	   		</h5>
		   		<div class="col-md-4">
			    	<img src="/services/images/<?php echo $row['image']; ?>" alt='Продукт' class="card-img float-left mr-4">
			    </div>
				<div>
		   			<p class="card-text"><?php echo $row['description']; ?></p>
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
		   			?>	
		   	</div>
  		</div>
	</div>	
</div>	<!-- закрываем col-4 -->