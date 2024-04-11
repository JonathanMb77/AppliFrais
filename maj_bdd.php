<?php
$bdd = new PDO(
  'mysql:host=localhost;dbname=gsbfrais',
  "userGsb",
  'secret'
);

$requete1 = "SELECT id,mdp FROM Visiteur;";
$r1 = $bdd -> query($requete1);
$reponse = $r1 -> fetchall(PDO::FETCH_ASSOC);
foreach ($reponse as $ligne){
  echo $ligne['mdp']. PHP_EOL;
  $hash_mdp = password_hash($ligne['mdp'], PASSWORD_ARGON2ID);
  echo $hash_mdp . PHP_EOL;
  $id = $ligne['id'];
  $requete2 = "UPDATE Visiteur SET mdp = ? WHERE id = ?;";
  $r2 = $bdd -> prepare($requete2);
  $r2 -> execute([$hash_mdp, $id]);
}
