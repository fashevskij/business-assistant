<?php
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

// готовим запрос на выборку всех элементов
$sql = "SELECT * From serv_orders";

// реализуем запрос
$result = $conn->query($sql);

// подсчитаем все элементы (для расчета количества страниц)
$productsQuantity = mysqli_num_rows($result);
  
  // подготовим переменные для пагинации количество страниц, при условии,
  // что на странице 6 товаров
  $lastPage = $productsQuantity / 6;
    
    // если нет товаров - получим нулевые значения и ошибки php
    if($lastPage == 0){ $lastPage = 1; }

  // максимальное число страниц (номер последней)
  // если число получилось дробное, то надо добавить еще страницу
  if ( is_float ($lastPage) ){
    $lastPage = intval($lastPage) + 1;
  }

      // $currentPage - текущая страница
      // если существует запрос GET - присвоим значение
      if (isset($_GET['page'])){
        // проверим на превышение максимального числа страниц в базе
        if($_GET['page'] <= $lastPage){
          $currentPage = $_GET['page'];
        }else{
          $currentPage = $lastPage;
        }
      }
      // если нет - значение = 1
      else{
        $currentPage = 1;
      }

  // $nextPage - слдующая страница (текст на кнопке)
  // $nextPageLink - значение номера страницы
  if ($currentPage < $lastPage){
      $nextPage = $currentPage + 1;
      $nextPageLink = $nextPage;
    }else{
      $nextPage = ".";
      $nextPageLink = $currentPage;
    }

        // $prevPage - предыдущая страница
        // значение от 1 до $lastPage
        if($currentPage > 1 ){
          $prevPage = $currentPage - 1;
        }else
        {
          $prevPage = 1;
        }

  // статус активности элементов в боксе
  // если страниц меньше, чем кнопок, то присвоим кнопкам статус disabled
  // первую страницу, даже без товара, будем отображать 
  $activeStatus2 = '';
  $activeStatus3 = '';

  switch ($lastPage) {
      case 1:
          $activeStatus2 = 'disabled';
          $activeStatus3 = 'disabled';
          break;
      case 2:
          $activeStatus3 = 'disabled';
          break;
  }

echo "<div class='row mt-5'>";
  echo "<div class='col'>";
    echo "<nav aria-label='Page navigation'>";
      echo "<ul class='pagination pagination-ыь'>";
        // первая кнопка пагинации (ведет к первой странице)
        echo "<li class='page-item'>";
          echo "<a class='page-link disabled' href='/services/services.php' aria-label='Previous'>";
            echo "<span aria-hidden='true'>First</span>";
          echo "</a>";
        echo "</li>";
          // вторая кнопка пагинации (ведет к предыдущей странице или останавливается на первой, если пришли в начало)
          echo "<li class='page-item'>";
            echo "<a class='page-link' href='/services/services.php?page=" . $prevPage . "' aria-label='Next'>";
              echo "<span aria-hidden='true'>&laquo;</span>";
            echo "</a>";
          echo "</li>";

      // прорисовка стартового случая, когда активна первая страница
      if ($currentPage == 1){
        echo "<li class='page-item active'><a class='page-link' href='/services/services.php?page=1'>1</a></li>";
        echo "<li class='page-item " . $activeStatus2 . "'><a class='page-link' href='/services/services.php?page=2'>2</a></li>";
        echo "<li class='page-item " . $activeStatus3 . "'><a class='page-link' href='/services/services.php?page=3'>3</a></li>";

      // страницы от 2 и дальше, активную страницу рисуем по центру
      }else{
          echo "<li class='page-item'><a class='page-link' href='/services/services.php?page=" . ( $currentPage - 1) . "'>" . ( $currentPage - 1) . "</a></li>";
          echo "<li class='page-item active'><a class='page-link' href='/services/services.php?page=" . $currentPage . "'>" . $currentPage . "</a></li>";
          echo "<li class='page-item " . $activeStatus3 . "'><a class='page-link' href='/services/services.php?page=" . $nextPageLink . "'>" . ($nextPage) . "</a></li>";
      }
        // предпоследняя кнопка пагинации, ведет к следующей странице
        echo "<li class='page-item'>";
          echo "<a class='page-link' href='/services/services.php?page=" . $nextPageLink . "' aria-label='Next'>";
            echo "<span aria-hidden='true'>&raquo;</span>";
          echo "</a>";
          // последняя кнопка пагинации, ведет к последней странице продуктов в БД
          echo "<li class='page-item'>";
            echo "<a class='page-link' href='/services/services.php?page=" . $lastPage . "' aria-label='Next'>";
              echo "<span aria-hidden='true'>Last</span>";
            echo "</a>";
          echo "</li>";
        echo "</li>";
      echo "</ul>";
    echo "</nav>"; 
  echo "</div>";
echo "</div>";
?>