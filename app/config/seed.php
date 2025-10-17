<?php

require __DIR__ . '/conn.php';

$pokemons = [
    ["Bulbasaur", "a visibly overweight grass/poison type poqmon", "Planta", "Bulbasaur.jpg", rand(0, 100), rand(0, 100), rand(-100, 100)],
    ["Charmander", "This poqmon is perfect for you who don't have a stove at home", "Fogo", "Charmander.jpg", rand(0, 100), rand(0, 100), rand(-100, 100)],
    ["Squirtle", "A poqm... wait, that thing you splashed on me is water, right?", "Água", "Squirtle.avif", rand(0, 100), rand(0, 100), rand(-100, 100)],
    ["Pikachu", "this little guy has definitely been through a lot..", "Água", "Pikachu.jpg", rand(0, 100), rand(0, 100), rand(-100, 100)],
];

foreach($pokemons as $p) {
  $stmt = $conn->prepare("INSERT INTO pokemons (name, description, type, image, attack, defense, intelligence) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssiii", $p[0], $p[1], $p[2], $p[3],$p[4], $p[5], $p[6]);
  $stmt->execute();
}

echo "Seed successfully executed!";
?>