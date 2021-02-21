<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
$page = "account_b";
$nav_activ = "serv";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/header.php';
?>

<div class="row m-4">
	<?php 
	//подключаем навигацию
	include 'parts/account_b/nav.php'; 
	?>
    <?php
    //делаем запрос в БД - получаем предложения авторизованого пользователя
    $sql = "SELECT * FROM `request_serv` WHERE `user_id`=" . $user_id_b;
    //получаем результат
    $result = $conn->query($sql);
    //получаем все поля где user_b_id соответствует user_b_id авторизованому пользователю
    ?>
    <div class="col-9">
    <h4 class="card-title">Ваши предложения</h4>
    <?php 
    while ($row = mysqli_fetch_assoc($result)) {
    //выводим предложения данного пользователя
    include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/account_b/serv_request.php';
    }
    ?>

    <a class="btn btn-primary mt-3 ml-3" href="new_request_serv.php">
        Подать заявку
    </a>
</div>
</div>

<?php 
include 'parts/footer.php'; 
?>