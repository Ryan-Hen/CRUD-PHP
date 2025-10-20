<?php 

$host = ""; 
$username = "";
$password = "";
$databasename = "";

$conn = mysqli_connect($host, $username, $password);

if(!$conn){
 die("Erro ao conectar ao servidor MySQL " . mysqli_connect_error());
}

$sql_to_create_db =  "CREATE DATABASE IF NOT EXISTS $databasename CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

if(!mysqli_query($conn, $sql_to_create_db)){
  die("Erro ao criar banco de dados: " . mysqli_error($conn));
}

mysqli_select_db($conn, $databasename);

$table = "CREATE TABLE IF NOT EXISTS pokemons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  type VARCHAR(50),
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  attack INT,
  defense INT,
  intelligence INT
)";

if (!mysqli_query($conn, $table)) {
  die("Erro ao criar tabela: " . mysqli_error($conn));
}

?>