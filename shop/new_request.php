<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
$page = "home";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/header.php';
?>

<div class="row">
	<div class="col-md-7 mt-3 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Оформление заявки на добавление предложения на сайт</h4>
            </div>
            <div class="card-body">
                <form method="POST" id="add_request" action="/shop/parts/account_b/add_request.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Наименование</label>
                                <input name = "title" type="text" class="form-control" placeholder="Заголовок предложения">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Короткое описание</label>
                                <input name = "description" type="text" class="form-control" placeholder="Кратко опишите на что предоставляется купон">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name = "content" type="text" class="form-control" placeholder="Дайте полное описание услуги"></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Не выбрано</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Изображение</label>
                                <input name = "image" type="text" class="form-control" placeholder="image">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Цена</label>
                                <input name = "cost" type="text" class="form-control" placeholder="цена">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ваш телефон</label>
                                <input name = "phone" type="text" class="form-control" placeholder="телефон для связи">
                            </div>
                        </div>
                    </div>
                    <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right"  onclick="addRequest()">Оформить заявку</button>
                </form>
            </div>
        </div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/footer.php'; 
?>