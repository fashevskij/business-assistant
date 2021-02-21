<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Продукты</li>
	</ol>
</nav>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Продукты
					<a href="modules/products/add.php" class="btn btn-primary ml-3">Добавить</a>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Наименование</th>
							<th>Короткое описание</th>
							<th>Категория</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							$i = 1;
							//создаём запрос к БД на вывод товаров из таблицы products
							$sql = "SELECT * FROM products WHERE `status` = 'Добавлено'";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<!-- Выводим в таблицу данные товара  -->
									<td><?php echo $i ?></td>
									<td><?php echo $row["title"] ?></td>
									<td><?php echo $row["description"] ?></td>
									<td><?php
										//создаём запрос к БД на вывод имени категории
										$sql1 = "SELECT * FROM categories WHERE `id` =" . $row["category_id"];
										//выполнить sql запрос в базе данных
										$result1 = $conn->query($sql1);
										$category = mysqli_fetch_assoc($result1);
										echo $category["title"]; ?>
									</td>
									<td>
										<a href="modules/products/detail.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Детальнее</a>
										<a href="modules/products/delete.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Удалить</a>
									</td>
								</tr>
							<?php
							$i++;
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