<div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link <?php if($nav_activ == "account"){ ?> active <?php } ?>"  href="account_b.php" >Контактная информация</a>
      <a class="nav-link <?php if($nav_activ == "request"){ ?> active <?php } ?>" href="request.php">Мои товары</a>
      <a class="nav-link <?php if($nav_activ == "serv"){ ?> active <?php } ?>" href="my_serv.php">Мои услуги</a>
      <a class="nav-link <?php if($nav_activ == "subscriptions"){ ?> active <?php } ?>" href="subscriptions.php">Подписки</a>
      <a class="nav-link" href="exit.php">Выйти</a>
    </div>
  </div>