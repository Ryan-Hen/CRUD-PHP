  <?php

  include __DIR__ . "/../../config/conn.php";
  
  if(!$_GET["id"]){
    exit("any id is guiven to proceed with the update process");
  }

  if(!is_numeric($_GET["id"])) {
    exit("id paramenter must be a number.");
  }

  $id = intval($_GET["id"]);
  
  $query = "SELECT * FROM pokemons WHERE id = " . $id;
  $current_poqmon = $conn->query($query)->fetch_assoc();
  ?>

  <div class="form-container">
    <form enctype="multipart/form-data" method="POST" action="/actions/update_pokemon.php">
      <div class="field-container">
        <label for="poqmon-name">Poqmon Name:</label>
        <input required name="poqmon-name" id="poqmon-name"
          value="<?php echo htmlspecialchars($current_poqmon["name"])?>">
      </div>
      <div class="field-container">
        <label for="poqmon-description">Poqmon Description:</label>
        <textarea required name="poqmon-description"
          id="poqmon-description"><?php echo htmlspecialchars($current_poqmon["description"])?></textarea>
      </div>
      <div class="field-container">
        <label for="poqmon-type">Poqmon Type:</label>
        <select required name="poqmon-type" id="poqmon-type">
          <option value="">Select a type...</option>
          <option value="Plant" <?php if($current_poqmon["type"] === "Plant") echo "selected"; ?>>Plant</option>
          <option value="Fire" <?php if($current_poqmon["type"] === "Fire") echo "selected"; ?>>Fire</option>
          <option value="Water" <?php if($current_poqmon["type"] === "Water") echo "selected"; ?>>Water</option>
          <option value="Eletric" <?php if($current_poqmon["type"] === "Eletric") echo "selected"; ?>>Eletric</option>
        </select>
      </div>
      <div class="field-container" style="flex-direction: row;">
        <div style="display: flex; flex-direction: column; gap: 8px;">
          <label for="poqmon-image">Select a image</label>
          <input name="poqmon-image" id="poqmon-image" type="file">
        </div>
        <div
          style="width: 200px; display: flex; flex-direction: column; gap: 8px; justify-content: center; align-items: center">
          <img class="current-image" src="/uploads/<?php echo htmlspecialchars($current_poqmon['image']); ?>"
            alt="<?php echo htmlspecialchars($current_poqmon['name']); ?>" />
          <small>Selected image</small>
        </div>
      </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="field-container">
        <input class="send" type="submit" name="send">
      </div>
    </form>
  </div>

  <script>
const fileInput = document.getElementById("poqmon-image");
const previewImg = document.querySelector(".current-image");
const previewLabel = previewImg.nextElementSibling; // o <small> "Selected image"

fileInput.addEventListener("change", function() {
  const file = this.files[0];
  if (!file) return;

  if (!file.type.startsWith("image/")) {
    alert("Por favor, selecione um arquivo de imagem válido.");
    this.value = "";
    return;
  }

  const reader = new FileReader();

  reader.onload = function(e) {
    previewImg.src = e.target.result;
    previewLabel.textContent = "new image selected";
  };

  reader.readAsDataURL(file); // lê o arquivo e gera uma URL temporária
});
  </script>