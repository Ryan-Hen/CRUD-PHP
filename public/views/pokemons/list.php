<?php 

  include __DIR__ . "/../../../app/config/conn.php";

  $query = "SELECT * FROM pokemons";
  $pokemons = $conn->query($query);

  if(!$pokemons) {
    die("Erro na consulta: , $conn->error");
  }

?>
<ul class="list">
  <?php while ($pokemon = $pokemons->fetch_assoc()): ?>
  <li>
    <div class="div-icon">
      <img class="icon" src="/images/<?php echo htmlspecialchars($pokemon['type']); ?>.png" />
    </div>
    <a href="/views/delete.php/?id=<?php echo htmlspecialchars($pokemon['id']); ?>">
      <div class="div-delete">
        <img class="icon-delete" src="/images/close.png" />
      </div>
    </a>
    <?php if (!empty($pokemon['image'])): ?>
    <img class="pokemon-image" src="/uploads/<?php echo htmlspecialchars($pokemon['image']); ?>"
      alt="<?php echo htmlspecialchars($pokemon['name']); ?>">
    <?php endif; ?>
    <div class="pokemon-name-container">
      <span class="pokemon-name"><?php echo htmlspecialchars($pokemon['name']); ?></span>
    </div>
    <div class="type <?php echo htmlspecialchars($pokemon['type']); ?>">
      <span><?php echo htmlspecialchars($pokemon['type']); ?></span>
    </div>
    <div class="pokemon-description-container">
      <p class="description"><?php echo htmlspecialchars($pokemon['description']); ?></p>
    </div>
    <div class="pokemon-info-container">
      <div class="info">
        <img class="info-img" src="/images/sword.png" />
        <small><?php echo htmlspecialchars($pokemon['attack']); ?></small>
      </div>
      <div class="info">
        <img class="info-img" src="/images/shield.png" />
        <small><?php echo htmlspecialchars($pokemon['defense']); ?></small>
      </div>
      <div class="info">
        <img class="info-img" src="/images/brain.png" />
        <small><?php echo htmlspecialchars($pokemon['intelligence']); ?></small>
      </div>
      <a class="edit" href="/views/update.php/?id=<?php echo htmlspecialchars($pokemon['id']); ?>">
        <img class="info-img" src="/images/pencil.png" />
        <small>Edit</small>
      </a>
    </div>
    <div class="line <?php echo htmlspecialchars($pokemon['type']) ?>"></div>
  </li>
  <?php endwhile; ?>
</ul>