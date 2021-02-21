<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products_maps";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Подписки</li>
	</ol>
</nav>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Подписки
					<a href="modules/products_maps/add.php" class="btn btn-primary ml-3">Добавить</a>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Наименование</th>
							<th>Описание</th>
							<th>Цена</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							//создаём запрос к БД на вывод товаров из таблицы products
							$sql = "SELECT * FROM `products_maps` WHERE `status` = 'Добавлено'";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<!-- Выводим в таблицу данные товара  -->
									<td><?php echo $row["id"] ?></td>
									<td><?php echo $row["title"] ?></td>
									<td><?php echo $row["content"] ?></td>
									<td><?php echo $row["cost"] ?></td>
									<td>
										<a href="modules/products_maps/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Изменить</a>
										<a href="modules/products_maps/delete.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Удалить</a>

									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>