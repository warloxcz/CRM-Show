<?php
$username = "admin";
$passwd = "1234";


$servername = "localhost";
$usernameDb = "root";
$password = "";
$dbname = "crm";
$conn = new mysqli($servername, $usernameDb, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  exit();
}
?>
