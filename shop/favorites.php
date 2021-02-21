<?php
include 'configs/db.php';
$page = "home";
include 'parts/header.php';

/*
1. Вывести блок с корзиной в шапке сайта +
2. Сделать таблицу в БД для хранения заказов +
3. Добавление товарок в корзину +
	3.1 Сделать клик по кнопке +
	3.2 Добавить товар в куки корзины + 
	3.3 Отобразить что товар добавился d кoрзине +
4. Сделать страницу корзины +
5. Оформление заказа +
*/

?>
<div class="container">
	<div class="row m-2">
		<div class="col-11">
			<div class="container">
				<div class="row" id='products'>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Title</th>
								<th scope="col">Cost</th>
								<th scope="col">Options</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_COOKIE["user_id"])) {
								//делаем запрос в БД - выбираем пользователя
								$sql2 = "SELECT * FROM users WHERE id=" . $_COOKIE["user_id"];
								//получаем результат
								$result2 = $conn->query($sql2);
								//получаем пользователя
								$user = mysqli_fetch_assoc($result2);
								//преобразуем данные json из БД в массив данных
								$favorites = json_decode($user['favorites'], true);
								for ($i = 0; $i < count($favorites['favorites']); $i++) {
									$sql = "SELECT * FROM products WHERE id=" . $favorites['favorites'][$i]['product_id'];
									$result = $conn->query($sql);
									$product = mysqli_fetch_assoc($result);
							?>
									<tr>
										<th scope="row"><?php echo $product['id']; ?></th>
										<td><?php echo $product['title']; ?></td>
										<td><?php echo $product['cost']; ?></td>
										<td><button onclick="deleteProductFavorites(this, <?php echo $product['id']; ?>)" class="btn btn-primary">Удалить</button></td>
										<td>
											<a class="btn btn-primary" href="order.php?id='<?php echo $product['id']; ?>'">Купить
											</a>
										</td>
									</tr>
									<?php
								}
							} else {
								if (isset($_COOKIE['favorites'])) {
									$col_product = 0;
									$favorites = json_decode($_COOKIE['favorites'], true);
									for ($i = 0; $i < count($favorites['favorites']); $i++) {
										$sql = "SELECT * FROM products WHERE id=" . $favorites['favorites'][$i]['product_id'];
										$result = $conn->query($sql);
										$product = mysqli_fetch_assoc($result);
									?>
										<tr>
											<th scope="row"><?php echo $product['id']; ?></th>
											<td><?php echo $product['title']; ?></td>
											<td><?php echo $product['cost']; ?></td>
											<td><button onclick="deleteProductFavorites(this, <?php echo $product['id']; ?>)" class="btn btn-primary">Удалить</button></td>
											<td>
												<a class="btn btn-primary" href="order.php?id='<?php echo $product['id']; ?>'">Купить
												</a>
											</td>
										</tr>
							<?php
									}
								}
							}
							?>
						</tbody>
					</table>
				</div> <!-- закрываем div row внутри col-9-->

				<?php
				include 'parts/footer.php';
				?>