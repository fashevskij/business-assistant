<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "consult";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Заявки на консультацию</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Заявки на консультацию
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Пользователь</th>
							<th>Телефон</th>
							<th>Еmail</th>
							<th>Заявка</th>
							<th>Дата</th>
							<th>Статус</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							//создаём запрос к БД на вывод заявку из таблицы заявок на консультацию
							$sql = "SELECT * FROM consult";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные о заявках 
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<td><?php echo $row["id"] ?></td>
									<td><?php
										if ($row["user_id"] != '') {
											//создаём запрос к БД на вывод имени категории
											$sql1 = "SELECT * FROM users WHERE `id` =" . $row["user_id"];
											//выполнить sql запрос в базе данных
											$result1 = $conn->query($sql1);
											$users = mysqli_fetch_assoc($result1);
											$cat_user = "";
										} else {
											//создаём запрос к БД на вывод имени категории
											$sql1 = "SELECT * FROM users_b WHERE `id` =" . $row["user_b_id"];
											//выполнить sql запрос в базе данных
											$result1 = $conn->query($sql1);
											$users = mysqli_fetch_assoc($result1);
											$cat_user = "Владелец МБ";
										}
										echo $users["name"];
										?> </br> <?php
								echo $cat_user; ?>
									</td>
									<td><?php echo $users["phone"] ?></td>
									<td><?php echo $users["email"] ?></td>
									<td><?php echo $row["message"] ?></td>
									<td><?php echo $row["date_time"] ?></td>
									<td><?php
										if ($row["processed"] == 0) {
											$status = 'Новый';
										} else if ($row["processed"] == 1) {
											$status = 'В обработке';
										} else {
											$status = 'Обработан';
										}
										echo $status; ?>
									</td>
									<td>
										<a href="modules/consult/accept.php?id=<?php echo $row["id"] ?>" class="btn btn-sm btn-primary">Принять</a>
										<a href="modules/consult/processed.php?id=<?php echo $row["id"] ?>" class="btn mt-0 btn-sm btn-primary">Обработано</a>
										<a href="modules/consult/reject.php?id=<?php echo $row["id"] ?>" class="btn mt-0 btn-sm btn-primary">Удалить</a>
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