<?php
  // подключаем базу данных
  include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

  // название страницы
  $page = 'innovation';

  // подключаем хеадер
  include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";

    // если нет никого в авторизации, заполним переменные значения по умолчанию
    $userLogged = 'disabled="disabled"';
    $messageText = 'Необходима авторизация';

// проверим вошел ли пользователь в систему
  if(isset($_COOKIE['user_id']) or isset($_COOKIE['user_id_b'])){
      
      // если зашел пользователь, его id будет храниться в id
      if( isset($_COOKIE['user_id']) ){
        
        // заполним id
        $id = $_COOKIE['user_id'];

        // заполним модификатор
        $mod = "0";
        
      }else{

        // заполним id
        $id = $_COOKIE['user_id_b'];
        
        // заполним модификатор
        $mod = "1";
      }

      // переменная-признак логирования пользователя
      $userLogged = '';
      $messageText = '';
  }

// ------- внесение в БД запроса на консультацию ------------------------------

  if(isset($_POST['innovationText'])){

      if($_POST['mod'] == 0) {
          
        $sql="INSERT INTO `innovation` (`user_id`, `message`, `date_time`, `processed`) VALUES ('" . $_POST['unit_id'] . "', '" . $_POST['innovationText'] . "', '" . (date("Y-m-d H:i:s") ) . "', '0')";

          // реализуем запрос
          if($conn->query($sql)) {
            echo "Предложение отправлено";
          } else {
            echo "Eror adding record to database";
          }

      } else {
        
        $sql="INSERT INTO `innovation` (`user_b_id`, `message`, `date_time`, `processed`) VALUES ('" . $_POST['unit_id'] . "', '" . $_POST['innovationText'] . "', '" . (date("Y-m-d H:i:s") ) . "', '0')";

          // реализуем запрос
          if( !($result = $conn->query($sql) ) ){
            echo "Eror adding record to database";
          }
      }
  }

?>

<div class="card">
  <div class="card-header">
    Инновационная деятельность
  </div>
  <div class="card-body">
    <!-- <blockquote class="blockquote mb-0"> -->
      <p>Инновационная деятельность – деятельность, направленная на использование и коммерциализацию результатов научных исследований и разработок и обусловливающая выпуск на рынок новых конкурентоспособных товаров и услуг</p>
      <p>В соответствии с <a href="https://meget.kiev.ua/zakon/zakon-ob-innovatsionnoy-deyatelnosti/">Законом</a> Украины об инновационной деятельности, нами предпринимаются шаги по продвижению или внедрению инновационных проектов</p>
      <p>Для внесения на рассмотрение нашими техническими и юридическими специалистами Вашего инновационного предложения отправьте, пожалуйста, заявку в форме ниже </p>
      <footer class="blockquote-footer"><i>Администрация платформы "Бизнес-ассистент"</i></footer>
    <!-- </blockquote> -->
  </div>
</div>


<div class="row">
  
  <div class="col-12">
    <div class="card mt-3">
      <div class="card-header">Заявка на рассмотрение инновации</div>       
        <div class="card-body">
            <h5 class="card-title">
            </h5>
          <form class="mx-2" action="/modules/info/innovation.php" method="POST" id="innovationForm">
          <div class="form-group">
            <div class="form-group">
              <label for="innovationText"><i class="text-info">Опишите Ваше инновационное предложение или задайте вопросы здесь</i></label>
              <textarea type="text" class="form-control" name="innovationText" rows="5" <?php echo $userLogged ?>><?php echo $messageText ?></textarea>
              <input type="hidden" name="unit_id" value="<?php echo $id; ?>">
              <input type="hidden" name="mod" value="<?php echo $mod; ?>">
          </div>
          </div>

          <button type="submit" class="btn btn-info mt-3 mb-2">Отправить</button>
        </form>
        
        </div>
      </div>
  </div>
</div>

<?php // подключаем футер
  include $_SERVER['DOCUMENT_ROOT'] . "/parts/futer.php";
?>