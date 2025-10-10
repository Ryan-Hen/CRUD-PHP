<?php 

if($_SERVER["REQUEST_METHOD"] !== "POST"){
  exit("<h1>Something went wrong...</h1>") ;
  return;
}

$uploaddir = __DIR__ . "/../uploads/";
$uploadfile = $uploaddir . basename($_FILES['poqmon-image']['name']);

$poqmon_name = $_POST["poqmon-name"];
$poqmon_description = $_POST["poqmon-description"];
$poqmon_type = $_POST["poqmon-type"];

//verifica se foi feito o upload de algum arquivo pelo formulário
if(!isset($_FILES["poqmon-image"]) && $_FILES['poqmon-image']['error'] !== UPLOAD_ERR_OK) {
  exit("<h1>You must send all fields to proced</h1>");
} 

if($poqmon_name === "" || $poqmon_description === "" || $poqmon_type === ""){
  exit("<h1>You must send all fields to proced</h1>");
}

//MONTAR A QUERY DE INSERÇÂO DE POQMON NO BANCO 

//verifica se já existe um arquivo com este nome no diretório uploads e se existir adciona um timestamp ao nome do arquivo
// if(file_exists($uploadfile)){
//   $uploadfile = $uploaddir . basename($_FILES['poqmon-image']['name']) . time();
// }

// if (move_uploaded_file($_FILES['poqmon-image']['tmp_name'], $uploadfile)) {
//     echo "File is valid, and was successfully uploaded.\n";
// } else {
//     exit("<h1>Something went wrong...</h1>");
// }

?>