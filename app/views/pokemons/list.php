<?php 

  include __DIR__ . "/../../config/conn.php";

  $query = "SELECT * FROM pokemons";
  $pokemons = $conn->query($query);

  if(!$pokemons) {
    die("Erro na consulta: , $conn->error");
  }

?>
<ul>
  <?php while ($pokemon = $pokemons->fetch_assoc()): ?>
  <li>
    <strong><?php echo htmlspecialchars($pokemon['name']); ?></strong><br>
    Tipo: <?php echo htmlspecialchars($pokemon['type']); ?><br>
    <p><?php echo htmlspecialchars($pokemon['description']); ?></p>
    <?php if (!empty($pokemon['image'])): ?>
    <img src="/pokemon/public/uploads/<?php echo htmlspecialchars($pokemon['image']); ?>"
      alt="<?php echo htmlspecialchars($pokemon['name']); ?>" width="120">
    <?php endif; ?>
  </li>
  <?php endwhile; ?>
</ul>