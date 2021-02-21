<?php
//заголовок сайта
$nameSite = "Business Assistant";

//авторизованный обычный пользователь
$user_id = null;
if(isset($_COOKIE["user_id"])) {
	$user_id = $_COOKIE["user_id"];
}
//авторизованный пользователь владелец малого бизнеса
$user_id_b = null;
if(isset($_COOKIE["user_id_b"])) {
	$user_id_b = $_COOKIE["user_id_b"];
}
?>