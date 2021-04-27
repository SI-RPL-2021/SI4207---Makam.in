<?php
$databaseHost = 'localhost';
$databaseName = 'makamin';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (mysqli_connect_errno()) {
	echo "Jangan Lupa Hidukan MySQL dan Appache di XAMPP :" .mysqli_connect_error();
}
?>