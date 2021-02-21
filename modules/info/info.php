<?php
  // подключаем базу данных
  include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
  
  // название страницы
  $page = 'info';

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

  if(isset($_POST['consultMessageText'])){

      if($_POST['mod'] == "0"){
          
        $sql="INSERT INTO `consult` (`id`, `user_id`, `user_b_id`, `message`, `date_time`, `processed`) VALUES (NULL, '" . $_POST['unit_id'] . "', '', '" . $_POST['consultMessageText'] . "', '" . (date("Y-m-d H:i:s") ) . "', '0')";

          // реализуем запрос
          if( !($result = $conn->query($sql) ) ){
            echo "Eror adding record to database";
          }

      }else{
        
        $sql="INSERT INTO `consult` (`id`, `user_id`, `user_b_id`, `message`, `date_time`, `processed`) VALUES (NULL, '', '" . $_POST['unit_id'] . "', '" . $_POST['consultMessageText'] . "', '" . (date("Y-m-d H:i:s") ) . "', '0')";

          // реализуем запрос
          if( !($result = $conn->query($sql) ) ){
            echo "Eror adding record to database";
          }
      }
  }

?>

<div class="card">
  <div class="card-header">
    Информационная поддержка
  </div>
  <div class="card-body">
    <!-- <blockquote class="blockquote mb-0"> -->
      <p>Платформа "Бизнесс-ассистент" предоставляет своим пользователям финансовую и юридическую консультацию</p>
      <p>Мы поможем Вам принять правильные стратегические решения на первых этапах становления Вашего бизнеса</p>
      <p>Изложите ниже тему для проведения консультации и с Вами свяжутся наши специалисты</p>
      <footer class="blockquote-footer"><i>Администрация платформы "Бизнес-ассистент"</i></footer>
    <!-- </blockquote> -->
  </div>
</div>

<div class="row">
  
  <div class="col-12">
    <div class="card mt-3">
      <div class="card-header">Финансовая и правовая консультация</div>       
        <div class="card-body">
            <h5 class="card-title">
            </h5>
          <form class="mx-2" action="/modules/info/info.php" method="POST" id="consultForm">
          <div class="form-group">
            <div class="form-group">
              <label for="consultMessageText"><i class="text-info">Введите тему предстоящей консультации или задайте Ваш вопрос здесь</i></label>
              <textarea type="text" class="form-control" name="consultMessageText" rows="5" <?php echo $userLogged ?>><?php echo $messageText ?></textarea>
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