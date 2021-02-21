<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "serv_orders";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Услуги</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Услуги
					<a href="modules/serv_orders/add.php" class="btn btn-primary ml-3">Добавить</a>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Пользователь</th>
							<th>Категория</th>
							<th>Наименование</th>
							<th>Короткое описание</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							$i = 1;
							//создаём запрос к БД на вывод товаров из таблицы заказов
							$sql = "SELECT * FROM serv_orders WHERE `status`= 'Добавлено'";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php 
										//делаем запрос в БД - получаем название продукта
										$sql1 = "SELECT * FROM `users_b` WHERE `id`=" . $row['user_b_id'];
										//получаем результат
										$result1 = $conn->query($sql1);
										$user = mysqli_fetch_assoc($result1);
										if($row['user_b_id'] == 0) {
											echo 'Admin';
										} else {
											echo $user['name'];
										}
									?></td>
									<td><?php
										//создаём запрос к БД на вывод имени категории
										$sql1 = "SELECT * FROM serv_category WHERE `serv_cat_id` =" . $row["cat_id"];
										//выполнить sql запрос в базе данных
										$result1 = $conn->query($sql1);
										$category = mysqli_fetch_assoc($result1);
										echo $category["serv_cat_name"]; ?>
									</td>
									<td><?php echo $row["title"] ?></td>
									<td><?php echo $row["description"] ?></td>
									<td>
										<a href="modules/serv_orders/detail.php?prod_id=<?php echo $row["id"] ?>" class="btn btn-primary">Детальнее</a>
										<a href="modules/serv_orders/delete.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Удалить</a>
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