<?php 

  include __DIR__ . "/../../app/config/conn.php";
  
  if(!$_GET["id"]){
    exit("any id is guiven to proceed with the update process");
  }

  if(!is_numeric($_GET["id"])) {
    exit("id paramenter must be a number.");
  }

  $id = intval($_GET["id"]);

  $delete_image_query = "SELECT image FROM pokemons WHERE id = " . $id;
  $old_image = $conn->query($delete_image_query)->fetch_assoc();
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


  $query = "DELETE FROM pokemons WHERE id = " . $id;
  $res = $conn->query($query);

  require_once __DIR__ . "/../../app/views/header.php";

  echo "<h1>Poqmon has successfully deleted!</h1>";

  echo "<p>you will be redirected in a few seconds...</p>";

  echo "<script>
    setTimeout(function() {
      window.location.href = '/';
    }, 3000);
  </script>";

  require_once __DIR__ . "/../../app/views/footer.php";

?>