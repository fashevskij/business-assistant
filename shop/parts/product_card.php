<div class="col-12">
    <div class="card border-info mb-3">
        <div class="card-body">
            <h5 class="card-title text-left ml-2">
                <a href="/shop/product.php?id=<?php echo $row['id']; ?>">
                    <?php echo $row['title']; ?>
                </a>
            </h5>
            <div class="col-md-4">
                <img style="height: 150px; width: 150px;" src="/shop/images/<?php echo $row['image']; ?>" alt='Продукт' class="card-img float-left mr-4">
            </div>
            <div>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text">Цена: <?php echo $row['cost']; ?>грн</p>
                <?php
                //делаем запрос в БД - получаем таблицу заказов
                $sql1 = "SELECT * FROM `orders`";
                $result1 = $conn->query($sql1);
                //переменная для подсчета количества купленого товара
                $col_order_product = 0;
                while ($order = mysqli_fetch_assoc($result1)) { //перебераем все поля таблицы с заказами в БД
                    //если номер продукта в таблице заказов соответствует номеру продукта в таблице продуктов
                    if ($order['product_id'] == $row['id']) {
                        //то добавляем 1 к переменной купленых товара
                        $col_order_product++;
                    }
                }
                ?>
                <p class="card-text">Куплено: <?php echo $col_order_product; ?></p>
            </div>
            <a class="btn btn-warning mt-2" onclick="addToFavorites(this)" data-id='<?php echo $row['id']; ?>'>
                В избранное
            </a>
            <a class="btn btn-warning ml-3 mt-2" href="order.php?id='<?php echo $row['id']; ?>'">
                Купить
            </a>
        </div>
    </div>
</div>