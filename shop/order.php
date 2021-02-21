<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
$page = "home";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/header.php';
?>

<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Оформление заказа</h4>
            </div>
            <div class="card-body">
                <form method="POST" id="form" action="/shop/modules/favorites/add_order.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ваше имя</label>
                                <input name = "userName" type="text" class="form-control" placeholder="Имя">
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_COOKIE["user_id_b"])) {
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Адресс предприятия</label>
                                    <input name = "address" type="text" class="form-control" placeholder="address">
                                </div>
                            </div>
                        </div>
                    <?php } else {} ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ваш email</label>
                                <input name = "email" type="text" class="form-control" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <input name = "id_product" type="hidden" value="<?php echo $_GET['id']; ?>">
                    <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right"  onclick="addOrder()">Оформить заказ</button>
                </form>
            </div>
        </div>
	</div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/footer.php'; 
?>