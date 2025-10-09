<?php 

  include __DIR__ . "/../../config/conn.php";

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
      <img class="icon" src="/pokemon/public/images/leaf.png"/>
    </div>
    <?php if (!empty($pokemon['image'])): ?>
      <img src="/pokemon/public/uploads/<?php echo htmlspecialchars($pokemon['image']); ?>"
      alt="<?php echo htmlspecialchars($pokemon['name']); ?>" width="120">
    <?php endif; ?>
    <div>
      <strong><?php echo htmlspecialchars($pokemon['name']); ?></strong>
    </div>
    <div class="type <?php echo htmlspecialchars($pokemon['type']); ?>">
      <span><?php echo htmlspecialchars($pokemon['type']); ?></span>
    </div>
    <div>
      <p><?php echo htmlspecialchars($pokemon['description']); ?></p>
    </div>
  </li>
  <?php endwhile; ?>
</ul>