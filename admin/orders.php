<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "orders";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Заказы</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Заказы
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Пользователь</th>
							<th>Продукт</th>
							<th>Купон</th>
							<th>Email</th>
							<th>Дата</th>
						</thead>
						<tbody>
							<?php
							//создаём запрос к БД на вывод товаров из таблицы заказов
							$sql = "SELECT * FROM orders";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $row["id"] ?></td>
									<td><?php
										//делаем запрос в БД - получаем название продукта
										$sql1 = "SELECT * FROM `users` WHERE `id`=" . $row['user_id'];
										//получаем результат
										$result1 = $conn->query($sql1);
										$user = mysqli_fetch_assoc($result1);
										echo $user['name'];
										?></td>
									<td><?php
										//создаём запрос к БД на вывод имени категории
										$sql1 = "SELECT * FROM products WHERE `id` =" . $row["product_id"];
										//выполнить sql запрос в базе данных
										$result1 = $conn->query($sql1);
										$product = mysqli_fetch_assoc($result1);
										echo $product["title"]; ?>
									</td>
									<td><?php echo $row["coupon"] ?></td>
									<td><?php echo $row["email"] ?></td>
									<td><?php echo $row["data"] ?></td>
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