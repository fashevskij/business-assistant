<div class="col-4">
	<div class="card m-2">
		<div class="card-body">
			<h5 class="card-title" alt="35px"><?php echo $row["title"]; ?></h5>
			<p class="card-text"><?php echo $row["content"]; ?></p>
			<h5 class="card-title" alt="35px">Цена <?php echo $row["cost"]; ?> грн</h5>
			<button class="btn btn-warning ml-5">
				<a href="order.php?id='<?php echo $row['id']; ?>'">
					Купить
				</a>
			</button>
		</div>
	</div>
</div> <!-- закрываем div row внутри col-4-->