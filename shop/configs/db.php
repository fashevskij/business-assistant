<?php
$servername = "localhost";
$username = "f0476748_businessAssistant";
$password = "businessAssistant";
$dbmame = "f0476748_businessAssistant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbmame);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>