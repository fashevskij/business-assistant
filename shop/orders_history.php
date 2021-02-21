<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
$page = "account";
$nav_activ = "order_history";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/header.php';
?>

<div class="row m-4">
	<?php 
	//подключаем навигацию
	include 'parts/account/nav.php'; 
	//выводим таблицу с заказами данного пользователя
	?>

   <div class="col-9 ml-5">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Ваши заказы</h4>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Номер заказа</th>
                        <th>Наименование</th>
                        <th>Короткое описание</th>
                        <th>Номер купона</th>
                        <th>Email</th>
                        <th>Дата покупки</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        //делаем запрос в БД - получаем заказы авторизованого пользователя
                        $sql = "SELECT * FROM orders WHERE `user_id`=" . $user_id;
                        //получаем результат
                        $result = $conn->query($sql);
                        //получаем все поля где user_id соответствует user_id авторизованому пользователю
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>
                            	<?php 
                            	//делаем запрос в БД - получаем заказы авторизованого пользователя
                            	$sql1 = "SELECT * FROM products WHERE `id`=" . $row['product_id'];
                            	//получаем результат
		                        $result1 = $conn->query($sql1);
		                        $product = mysqli_fetch_assoc($result1);
		                        echo $product['title'];
		                        ?>
                            </td>
                            <td><?php echo $product['description']; ?></td>
                            <td><?php echo $row['coupon']; ?></td>
                            <td><?php echo $row['email']; ?></td> 
                            <td><?php echo $row['data']; ?></td>
                            <td>
                                <a href="/shop/review.php?product_id=<?php echo $product['id']?>" type="button" class="btn btn-outline-success btn-sm float-right">Оставить отзыв</a>
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

<?php 
include 'parts/footer.php'; 
?>