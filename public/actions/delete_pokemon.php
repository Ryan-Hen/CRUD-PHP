<?php 

  include __DIR__ . "/../../app/config/conn.php";
  
  if(!$_GET["id"]){
    exit("any id is guiven to proceed with the update process");
  }

  if(!is_numeric($_GET["id"])) {
    exit("id paramenter must be a number.");
  }

  $id = intval($_GET["id"]);

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