<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "serv_categories";

//создаём запрос на вывод данных выбранного в таблицу редактирования
$sqlCategory = "SELECT * FROM serv_category WHERE serv_cat_id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sqlCategory);
//возвращаем выбранный из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if (isset($_POST['submit'])) {
	//запрос в БД на редактирование 
	$sqlEdit = "UPDATE serv_category SET 
                  serv_cat_name= '" . $_POST["serv_cat_name"] . "' 
                    WHERE serv_cat_id = '" . $_POST["serv_cat_id"] . "'";


	//если выполнился запрос то...
	if ($conn->query($sqlEdit)) {
		//перход на главную страницу админ-панели
		header("Location: /admin/serv_categories.php");
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
		<li class="breadcrumb-item"><a href="/admin/serv_categories.php">Категории услуг</a></li>
		<li class="breadcrumb-item active" aria-current="page">Изменить</li>
	</ol>
</nav>


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Изменить категорию услуг</h4>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Наименование</label>
								<input type="hidden" name="serv_cat_id" value="<?php echo $_GET["id"] ?>">
								<input name="serv_cat_name" value="<?php echo $row["serv_cat_name"] ?>" type="text" class="form-control">
							</div>
						</div>
					</div>
					<button name="submit" value="1" type="submit" class="btn btn-success pull-right">Изменить</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>