<?php 

require __DIR__ . "/../../app/config/conn.php";

if($_SERVER["REQUEST_METHOD"] !== "POST"){
  exit("<h1>Something went wrong...</h1>") ;
  return;
}

if($_POST["poqmon-name"] === "" || $_POST["poqmon-description"] === "" || $_POST["poqmon-type"] === ""){
  exit("<h1>You must send all fields to proced</h1>");
}

$id = intval($_POST["id"]);

if($_FILES['poqmon-image']['error'] === 4 && isset($_FILES["poqmon-image"])){
  $poqmon_name = $_POST["poqmon-name"];
  $poqmon_description = $_POST["poqmon-description"];
  $poqmon_type = $_POST["poqmon-type"];

  $stmt = $conn->prepare("UPDATE pokemons SET name = ?, description = ?, type = ? WHERE id = ?");
  $stmt->bind_param("ssss", $poqmon_name, $poqmon_description, $poqmon_type, $id);
  $stmt->execute();

  require_once __DIR__ . "/../../app/views/header.php";

  echo "<h1>Poqmon has successfully updated!</h1>";

  echo "<p>Você será redirecionado em alguns segundos...</p>";

  echo "<script>
    setTimeout(function() {
      window.location.href = '/
    }, 3000);
  </script>";

  require_once __DIR__ . "/../../app/views/footer.php";
}
else {
  $uploaddir = __DIR__ . "/../uploads/";
  $uploadfile = $uploaddir . basename($_FILES['poqmon-image']['name']);
  $poqmon_name = $_POST["poqmon-name"];
  $poqmon_description = $_POST["poqmon-description"];
  $poqmon_type = $_POST["poqmon-type"];
  $poqmon_image = basename($_FILES['poqmon-image']['name']); 

  $query = "SELECT image FROM pokemons WHERE id = " . $id;
  $old_image = $conn->query($query)->fetch_assoc();
  $image_to_delete_path = __DIR__ . "/../uploads/" . $old_image["image"];
  
  if(file_exists($image_to_delete_path)){
    if(unlink($image_to_delete_path)){}
    else {
        exit("<h1>Something went wrong with delete old image operation...</h1>");
    }
  }else {
    echo $image_to_delete_path;
    exit("<h1>the old image cannot be find</h1>");
  }

  if(file_exists($uploadfile)){
    $uploadfile = $uploaddir . basename($_FILES['poqmon-image']['name']) . time();
  }

  if (move_uploaded_file($_FILES['poqmon-image']['tmp_name'], $uploadfile)) {
    
  } else {
    exit("<h1>Something went wrong...</h1>");
  }

  $stmt = $conn->prepare("UPDATE pokemons SET name = ?, description = ?, type = ?, image = ? WHERE id = ?");
  $stmt->bind_param("ssssi", $poqmon_name, $poqmon_description, $poqmon_type, $poqmon_image, $id);
  $stmt->execute();

  require_once __DIR__ . "/../../app/views/header.php";

  echo "<h1>Poqmon has successfully updated!</h1>";

  echo "<p>you will be redirected in a few seconds...</p>";

  echo "<script>
    setTimeout(function() {
      window.location.href = '/';
    }, 3000);
  </script>";

  require_once __DIR__ . "/../../app/views/footer.php";
}

?>