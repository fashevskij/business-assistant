<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "orders_maps";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Заказы подписки</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Заказы подписки
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Пользователь</th>
							<th>Наименование</th>
							<th>Дата оформления</th>
							<th>Дата начала</th>
							<th>Email</th>
							<th>Адрес</th>
							<th>Статус</th>
							<th>Дата окончания</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							//создаём запрос к БД на вывод товаров из таблицы заказов
							$sql = "SELECT * FROM orders_maps";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $row["id"] ?></td>
									<td><?php 
										//делаем запрос в БД - получаем название продукта
										$sql1 = "SELECT * FROM `users_b` WHERE `id`=" . $row['user_b_id'];
										//получаем результат
										$result1 = $conn->query($sql1);
										$user = mysqli_fetch_assoc($result1);
										echo $user['name'];
										?></td>
									<td><?php
										//делаем запрос в БД - получаем название продукта
										$sql1 = "SELECT * FROM products_maps WHERE `id`=" . $row['product_id'];
										//получаем результат
										$result1 = $conn->query($sql1);
										//ложим в перемеенную $row преобразованные в массив полученные из БД данные
										$product = mysqli_fetch_assoc($result1);
										echo $product['title'];
										?></td>
									<td><?php echo $row["data"] ?></td>
									<td><?php echo $row["data_start"] ?></td>
									<td><?php echo $row["email"] ?></td>
									<td><?php echo $row["adress"] ?></td>
									<td><?php 
										// если дата окончания уже прошла и не была установлена
										if ($row["data_stop"] < date('Y-m-d') && $row["data_stop"] != '0000-00-00') {
											// делаем запрос в БД на изменение статуса
											$sql1 =	"UPDATE `orders_maps` SET `status`= 'Завершена' WHERE `id`=" . $row['id'];
											// получаем результат
											$conn->query($sql1);
											// получаем результат обновленных данных с таблицы orders_maps
											$result = $conn->query($sql);
											$row = mysqli_fetch_assoc($result);
										}
										echo $row["status"] ?>
									</td>
									<td><?php echo $row["data_stop"] ?></td>
									<td>
										<?php
										if($row["status"] == 'Новый') {
										?>
											<a href="modules/orders_maps/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Активировать</a>
										<?php
										}
										?>
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