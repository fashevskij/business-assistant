<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
$page = "account_b";
$nav_activ = "subscriptions";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/header.php';
?>

<div class="row m-4">
	<?php 
	//подключаем навигацию
	include 'parts/account_b/nav.php'; 
	//выводим таблицу с заказами данного пользователя
	?>

   <div class="col-9 ml-5">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Ваши подписки</h4>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Номер заказа</th>
                        <th>Количество месяцев</th>
                        <th>Адрес</th>
                        <th>Email</th>
                        <th>Дата покупки</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                        <th>Статус</th>
                    </thead>
                    <tbody>
                        <?php
                        //делаем запрос в БД - получаем заказы авторизованого пользователя
                        $sql = "SELECT * FROM `orders_maps` WHERE `user_b_id`=" . $user_id_b;
                        //получаем результат
                        $result = $conn->query($sql);
                        //получаем все поля где user_b_id соответствует user_b_id авторизованому пользователю
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>
                            	<?php 
                            	//делаем запрос в БД - получаем заказы авторизованого пользователя
                            	$sql1 = "SELECT * FROM products_maps WHERE `id`=" . $row['product_id'];
                            	//получаем результат
		                        $result1 = $conn->query($sql1);
		                        $product = mysqli_fetch_assoc($result1);
		                        echo $product['title'];
		                        ?>
                            </td>
                            <td><?php echo $row['adress']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['data']; ?></td> 
                            <td><?php echo $row['data_start']; ?></td> 
                            <td><?php echo $row['data_stop']; ?></td>
                            <td>
                                <?php 
                                if ($row['status'] == "Новый") {
                                    echo "В обработке";
                                } else {
                                    echo $row['status'];
                                }
                                ?>
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