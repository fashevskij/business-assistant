<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "review_serv";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Отзывы на услуги</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Отзывы на услуги
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>№</th>
              <th>Продукт</th>
              <th>Текст отзыва</th>
              <th>Дата</th>
              <th>Опции</th>
            </thead>
            <tbody>
                <?php
               //создаём запрос к БД на вывод отзыва из таблицы отзывов на продукты
                $sql = "SELECT * FROM review";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные об отзыве 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php 
                      //создаём запрос к БД на вывод имени категории
                      $sql1 = "SELECT * FROM serv_orders WHERE `id` =" . $row["unit_id"];
                      //выполнить sql запрос в базе данных
                      $result1 = $conn->query($sql1);
                      $product = mysqli_fetch_assoc($result1);
                      echo $product["title"]; ?>
                    </td>
                    <td><?php echo $row["reviewText"] ?></td>
                    <td><?php echo $row["date_time"] ?></td>
                    <td><a href="modules/review_serv/delete.php?id=<?php echo $row["id"] ?>"class="btn btn-primary">Удалить</a></td>
                </tr>
              <?php     
              } 
              ?>    
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>      