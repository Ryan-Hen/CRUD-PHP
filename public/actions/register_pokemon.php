<?php 

require __DIR__ . "/../../app/config/conn.php";

if($_SERVER["REQUEST_METHOD"] !== "POST"){
  exit("<h1>Something went wrong...</h1>") ;
  return;
}

if($_POST["poqmon-name"] === "" || $_POST["poqmon-description"] === "" || $_POST["poqmon-type"] === ""){
  exit("<h1>You must send all fields to proced</h1>");
}

if(!isset($_FILES["poqmon-image"]) && $_FILES['poqmon-image']['error'] !== UPLOAD_ERR_OK) {
  exit("<h1>You must send all fields to proced</h1>");
} 

$uploaddir = __DIR__ . "/../uploads/";
$uploadfile = $uploaddir . basename($_FILES['poqmon-image']['name']);
$poqmon_name = $_POST["poqmon-name"];
$poqmon_description = $_POST["poqmon-description"];
$poqmon_type = $_POST["poqmon-type"];
$poqmon_image = basename($_FILES['poqmon-image']['name']); 
$poqmon_attack = rand(0, 100);
$poqmon_defense = rand(0, 100);
$poqmon_intelligence = rand(-100, 100);

if(file_exists($uploadfile)){
  $uploadfile = $uploaddir . basename($_FILES['poqmon-image']['name']) . time();
}

if (move_uploaded_file($_FILES['poqmon-image']['tmp_name'], $uploadfile)) {
  
} else {
  echo "entrou aqui 2";
    exit("<h1>Something went wrong...</h1>");
}

$stmt = $conn->prepare("INSERT INTO pokemons (name, description, type, image, attack, defense, intelligence) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiii", $poqmon_name, $poqmon_description, $poqmon_type, $poqmon_image, $poqmon_attack, $poqmon_defense, $poqmon_intelligence);
$stmt->execute();


require __DIR__ . "/../views/header.php";

echo "<h1>Success!</h1>";

echo "<p>you will be redirected in a few seconds...</p>";

echo "<script>
  setTimeout(function() {
    window.location.href = '/';
  }, 3000);
</script>";

require __DIR__ . "/../views/footer.php";

?>