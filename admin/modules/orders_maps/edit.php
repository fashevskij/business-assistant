<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "orders_maps";

//создаём запрос на вывод данных выбранного продукта в таблицу редактирования
$sql = "SELECT * FROM orders_maps WHERE id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sql);
//возвращаем выбранный товар из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if (isset($_POST['submit'])) {
	//запрос в БД на редактирование товара
	$sql = "UPDATE orders_maps SET 
                status= '" . $_POST["status"] . "',
                  data_start= '" . $_POST["data_start"] . "',
                    data_stop= '" . $_POST["data_stop"] . "' 
                      WHERE orders_maps.id = '" . $_POST["id"] . "'";
	//если выполнился запрос то...
	if ($conn->query($sql)) {
		//перход на главную страницу админ-панели
		header("Location: /admin/orders_maps.php");
	} else {
		//в ином случае выводим Ошибку
		echo "Error!";
	}
}

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
		<li class="breadcrumb-item"><a href="/admin/orders_maps.php">Заказы подписок</a></li>
		<li class="breadcrumb-item active" aria-current="page">Активировать</li>
	</ol>
</nav>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Активировать</h4>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
						<input type="hidden" name="status" value="Активна">
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="inputDate">Дата начала</label>
								<input name="data_start" type="date" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="inputDate">Дата окончания</label>
								<input name="data_stop" type='date' class="form-control">
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