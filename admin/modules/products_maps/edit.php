<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products_maps";

//создаём запрос на вывод данных выбранного продукта в таблицу редактирования
$sqlProduct = "SELECT * FROM products_maps WHERE id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sqlProduct);
//возвращаем выбранный товар из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if (isset($_POST['submit'])) {
	//запрос в БД на редактирование товара
	$sqlEditProduct = "UPDATE products_maps SET 
                  title= '" . $_POST["title"] . "', 
                    content= '" . $_POST["content"] . "',
                      cost= '" . $_POST["cost"] . "',
                        image= '" . $_POST["image"] . "'
                          WHERE products_maps.id = '" . $_POST["id"] . "'";
	//если выполнился запрос то...
	if ($conn->query($sqlEditProduct)) {
		//перход на главную страницу админ-панели
		header("Location: /admin/products_map.php");
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
		<li class="breadcrumb-item"><a href="/admin/products.php">Подписки</a></li>
		<li class="breadcrumb-item active" aria-current="page">Изменить</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Изменить</h4>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Наименование</label>
								<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
								<input name="title" value="<?php echo $row["title"] ?>" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Описание</label>
								<textarea name="content" type="text" class="form-control"><?php echo $row["content"] ?></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Цена</label>
								<input name="cost" value="<?php echo $row["cost"] ?>" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">Изображение</label>
								<input name="image" value="<?php echo $row["image"] ?>" type="text" class="form-control">
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