<?php

require __DIR__ . '/conn.php';

$pokemons = [
    ["Bulbasaur", "Um Pokémon do tipo Planta/Veneno.", "Planta", "bulbasaur.jpg"],
    ["Charmander", "Um Pokémon do tipo Fogo.", "Fogo", "charmander.webp"],
    ["Squirtle", "Um Pokémon do tipo Água.", "Água", "squirtle.avif"],
];

foreach($pokemons as $p) {
  $stmt = $conn->prepare("INSERT INTO pokemons (name, description, type, image) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $p[0], $p[1], $p[2], $p[3]);
  $stmt->execute();
}

echo "Seed executado com sucesso!";
?>