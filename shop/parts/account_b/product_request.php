<div class="col-10  mt-3">
    <div class="card border-info mb-3">
        <div class="card-body">
            <h5 class="card-title text-left ml-2">
                <?php
                if($row['status'] == "Новый") { ?>
                    <p class="card-text"><?php echo $row['title']; ?></p> 
                <?php } else { ?>
                    <a href="/shop/product.php?id=<?php echo $row['id']; ?>">
                        <?php echo $row['title']; ?>
                    </a>    
                <?php } ?>
                
            </h5>
            <div class="col-md-4">
                <img style="height: 250px; width: 250px;" src="/shop/images/<?php echo $row['image']; ?>" alt='Продукт' class="card-img float-left mr-4">
            </div>
            <div>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text"><?php echo $row['content']; ?></p>
                <p class="card-text">Цена: <?php echo $row['cost']; ?>грн</p>
                <p class="card-text">Статус: <?php echo $row['status']; ?></p>
                <?php
                //если статус заявки новый, т.е. она не добавлена в продукты на сайт
                if($row['status'] == "Новый" || $row['status'] == "Отклонено") {

                } else {
                //делаем запрос в БД - получаем таблицу продуктов
                $sql1 = "SELECT `id` FROM `products` WHERE `request_id`=" . $row['id'];
                $result1 = $conn->query($sql1);
                //получаем продукт у которого номер заявки соответствует выбранной
                $product = mysqli_fetch_assoc($result1);
                //делаем запрос в БД - получаем таблицу заказов
                $sql2 = "SELECT * FROM `orders`";
                $result2 = $conn->query($sql2);
                //переменная для подсчета количества купленого товара
                $col_order_product = 0;
                while ($order = mysqli_fetch_assoc($result2)) { //перебераем все поля таблицы с заказами в БД
                    //если номер продукта в таблице заказов соответствует номеру продукта в таблице продуктов
                    if ($order['product_id'] == $product['id']) {
                        //то добавляем 1 к переменной купленых товара
                        $col_order_product++; 
                    }
                }
                ?>
                <p class="card-text">Куплено: <?php echo $col_order_product; ?></p>
            <?php 
            //закрываем if со статусом = Новый
            } ?> 
            </div>
            <?php
            if (isset($_COOKIE["user_id_b"])) { ?>
            <button onclick="deleteProductUserB(this, <?php echo $row['id']; ?>)" class="btn btn-warning mt-3">Удалить</button> <?php
            } ?>
        </div>
    </div>  
</div>  