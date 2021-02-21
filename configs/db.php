<?php
// данные для подключения к базе данных
	$server = "localhost";
	$username = "f0476748_businessAssistant";
	$password = "businessAssistant";
	$dbname = "f0476748_businessAssistant";

// подключение к базе данных
$conn = mysqli_connect($server, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

//проверка соединения
if ($conn->connect_error){
	die("Connection field: " . $conn->connect_error);
}