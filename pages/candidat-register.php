<?php
require_once '../db.php'; // Assurez-vous d'avoir ce fichier correctement configuré
var_dump(__DIR__);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  $name = $_POST["name"];
  $description = $_POST["description"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  //Hash du mot de passe 
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  //insertion dans la base de donnée 
  $query = "INSERT INTO Candidats (name, description, email, password_hash,photo) VALUES (:name, :description, :email, :password_hash, :photo)";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
    'name' => $name,
    'description' => $description,
    'email' => $email,
    'password_hash' => $password_hash,
    'photo' => "test"
  ]);

  header('Location: /pages/candidat-login.php');
  exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Bienvenue sur la page d'inscription du candidat</h1>
  <h2>Inscription Candidat</h2>
  <form method="post" action="/pages/candidat-register.php">

    <div>
      <label for="name"> name </label>
      <input id="name" type="text" name="name" placeholder="Nom du candidat" required>
    </div>
    <div>
      <label for="description"> description </label>
      <textarea id="description" name="description" placeholder="Description du candidat" required></textarea>
    </div>
    <div>
      <label for="email"> email </label>
      <input type="email" name="email" placeholder="Adresse e-mail" required>
    </div>
    <div>
      <label for="password"> password </label>
      <input type="password" name="password" placeholder="Mot de passe" required>
    </div>
    <button type="submit" name="register">S'inscrire en tant que candidat</button>

  </form>

</body>

</html>