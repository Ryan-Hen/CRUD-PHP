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


<div class="alert">
  <ul class="list">
    <li>
      <div class="div-icon">
        <img class="icon" src="/images/<?php echo htmlspecialchars($current_poqmon['type']); ?>.png" />
      </div>
      <?php if (!empty($current_poqmon['image'])): ?>
      <img class="pokemon-image" src="/uploads/<?php echo htmlspecialchars($current_poqmon['image']); ?>"
        alt="<?php echo htmlspecialchars($current_poqmon['name']); ?>">
      <?php endif; ?>
      <div class="pokemon-name-container">
        <span class="pokemon-name"><?php echo htmlspecialchars($current_poqmon['name']); ?></span>
      </div>
      <div class="type <?php echo htmlspecialchars($current_poqmon['type']); ?>">
        <span><?php echo htmlspecialchars($current_poqmon['type']); ?></span>
      </div>
      <div class="pokemon-description-container">
        <p class="description"><?php echo htmlspecialchars($current_poqmon['description']); ?></p>
      </div>
      <div class="pokemon-info-container">
        <div class="info">
          <img class="info-img" src="/images/sword.png" />
          <small><?php echo htmlspecialchars($current_poqmon['attack']); ?></small>
        </div>
        <div class="info">
          <img class="info-img" src="/images/shield.png" />
          <small><?php echo htmlspecialchars($current_poqmon['defense']); ?></small>
        </div>
        <div class="info">
          <img class="info-img" src="/images/brain.png" />
          <small><?php echo htmlspecialchars($current_poqmon['intelligence']); ?></small>
        </div>
        <a class="edit" href="/update_pokemon.php/?id=<?php echo htmlspecialchars($current_poqmon['id']); ?>">
          <img class="info-img" src="/images/pencil.png" />
          <small>Edit</small>
        </a>
      </div>
      <div class="line <?php echo htmlspecialchars($current_poqmon['type']) ?>"></div>
    </li>
  </ul>
  <div class="alert-container-confirm">
    <h1>Are you sure you want to delete this Poqmon? This action is irreversible.</h1>

    <div style="margin-top: 10px;">
      <a href="/actions/delete_pokemon.php?id=<?php echo htmlspecialchars($current_poqmon["id"]); ?>">
        <button class="danger">Delete</button>
      </a>
      <a href="/">
        <button class="cancel">Cancel</button>
      </a>
    </div>

  </div>
</div>