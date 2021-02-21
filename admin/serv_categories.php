<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "serv_categories";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item active" aria-current="page">Категории услуг</li>
	</ol>
</nav>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">
					Категории услуг
					<a href="modules/serv_categories/add.php" class="btn btn-primary ml-3">Добавить</a>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<th>№</th>
							<th>Наименование</th>
							<th>Опции</th>
						</thead>
						<tbody>
							<?php
							$i = 1;
							//создаём запрос к БД 
							$sql = "SELECT * FROM `serv_category` WHERE `status`= 'Добавлено'";
							//выполнить sql запрос в базе данных
							$result = $conn->query($sql);
							//ложим в перемеенную $row преобразованные в массив полученные из БД данные  
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<tr>
									<!-- Выводим в таблицу данные  -->
									<td><?php echo $i ?></td>
									<td><?php echo $row["serv_cat_name"] ?></td>
									<td>

										<a href="modules/serv_categories/edit.php?id=<?php echo $row["serv_cat_id"] ?>" class="btn btn-primary">Изменить</a>
										<a href="modules/serv_categories/delete.php?id=<?php echo $row["serv_cat_id"] ?>" class="btn btn-primary">Удалить</a>

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