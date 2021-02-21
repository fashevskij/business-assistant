<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "serv_orders";

if (isset($_POST["submit"])) {
	if ($_POST['image'] == '') {
		$image = "unnamed.jpg";
	} else {
		$image = $_POST['image'];
	}
	$sql = "INSERT INTO serv_orders (title, description, content, cat_id, image,  `phone`, `addr_town`, `addr_street`, `addr_house`, `addr_flat`) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["cat_id"] . "', '" . $image . "', '" . $_POST["phone"] . "', '" . $_POST["town"] . "', '" . $_POST["street"] . "', '" . $_POST["house"] . "', '" . $_POST["flat"] . "')";
	if ($conn->query($sql)) {
		header("Location: /admin/serv_orders.php");
	} else {
		echo "Error!";
	}
}
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item"><a href="/admin/serv_orders.php">Услуги</a></li>
		<li class="breadcrumb-item active" aria-current="page">Добавить</li>
	</ol>
</nav>


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Добавить продукт</h4>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Наименование</label>
								<input name="title" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Короткое описание</label>
								<textarea name="description" type="text" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Полное описание</label>
								<textarea name="content" type="text" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Изображение</label>
								<input name="image" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Категория</label>
								<select class="form-control" name="cat_id">
									<option value="0">Не выбрано</option>
									<?php
									$sql = "SELECT * FROM serv_category";
									$result = $conn->query($sql);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<option value='" . $row["serv_cat_id"] . "'>" . $row["serv_cat_name"] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Телефон</label>
								<input name="phone" type="text" class="form-control">
							</div>
						</div>
					</div>
					<h5>Адрес</h5>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Город</label>
								<input name="town" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Улица</label>
								<input name="street" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Дом</label>
								<input name="house" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Офис</label>
								<input name="flat" type="text" class="form-control">
							</div>
						</div>
					</div>

					<button name="submit" value="1" type="submit" class="btn btn-success pull-right">Сохранить</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>