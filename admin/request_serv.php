<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "request_serv";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Заявки на услуги</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Заявки на добавление услуг
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Пользователь</th>
							<th>Номер телефона</th>
							<th>Заголовок</th>
							<th>Короткое описание</th>
							<th>Категория</th>
							<th>Статус</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							//создаём запрос к БД на вывод товаров из таблицы заказов
							$sql = "SELECT * FROM request_serv WHERE `status` = 'Новый'";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $row["id"] ?></td>
									<td><?php
										//делаем запрос в БД - получаем название продукта
										$sql1 = "SELECT * FROM `users_b` WHERE `id`=" . $row['user_id'];
										//получаем результат
										$result1 = $conn->query($sql1);
										$user = mysqli_fetch_assoc($result1);
										echo $user['name'];
									?></td>
									<td><?php echo $row["phone"] ?></td>
									<td><?php echo $row["title"] ?></td>
									<td><?php echo $row["description"] ?></td>
									<td><?php
										//создаём запрос к БД на вывод имени категории
										$sql1 = "SELECT * FROM serv_category WHERE `serv_cat_id` =" . $row["cat_id"];
										//выполнить sql запрос в базе данных
										$result1 = $conn->query($sql1);
										$category = mysqli_fetch_assoc($result1);
										echo $category["serv_cat_name"]; ?>
									</td>
									<td><?php echo $row["status"] ?></td>
									<td>
										<a href="modules/request_serv/detail.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Детальнее</a>
										<a href="modules/request_serv/accept.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Принять</a>
										<a href="modules/request_serv/reject.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Отклонить</a>
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