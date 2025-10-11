<?php

require __DIR__ . '/conn.php';

$pokemons = [
    ["Bulbasaur", "Um Pokémon do tipo Planta/Veneno.", "Planta", "bulbasaur.jpg", rand(0, 100), rand(0, 100), rand(-100, 100)],
    ["Charmander", "Um Pokémon do tipo Fogo.", "Fogo", "charmander.webp", rand(0, 100), rand(0, 100), rand(-100, 100)],
    ["Squirtle", "Um Pokémon do tipo Água.", "Água", "squirtle.avif", rand(0, 100), rand(0, 100), rand(-100, 100)],
];

foreach($pokemons as $p) {
  $stmt = $conn->prepare("INSERT INTO pokemons (name, description, type, image, attack, defense, intelligence) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssiii", $p[0], $p[1], $p[2], $p[3],$p[4], $p[5], $p[6]);
  $stmt->execute();
}

echo "Seed successfully executed!";
?>