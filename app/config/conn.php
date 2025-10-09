<?php 

$host = "localhost";
$username = "root";
$password = "";
$databasename = "crud";

$conn = mysqli_connect($host, $username, $password, $databasename);

if(!$conn){
 die("Erro ao conectar: " . mysqli_connect_error());
}

?>