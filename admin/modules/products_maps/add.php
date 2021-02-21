<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products_maps";

if (isset($_POST["submit"])) {
	$sql = "INSERT INTO `products_maps` (title, content, cost, image) VALUES ('" . $_POST["title"] . "', '" . $_POST["content"] . "', '" . $_POST["cost"] . "', '" . $_POST["image"] . "')";
	if ($conn->query($sql)) {
		header("Location: /admin/products_map.php");
	} else {
		echo "Error!";
	}
}

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
    <li class="breadcrumb-item"><a href="/admin/products.php">Подписки</a></li>
    <li class="breadcrumb-item active" aria-current="page">Добавить</li>
  </ol>
</nav>


<div class="row">
	<div class="col-md-8">
	    <div class="card">
		    <div class="card-header card-header-primary">
		      <h4 class="card-title">Добавить</h4>
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
			              <label class="bmd-label-floating">Описание</label>
			              <textarea name="content" type="text" class="form-control"></textarea>
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Цена</label>
			              <input name="cost" type="text" class="form-control">
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
		        
		          <button name="submit" value="1" type="submit" class="btn btn-success pull-right">Добавить</button>
		          <div class="clearfix"></div>
		        </form>
		    </div>
	    </div>
	</div>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?> 