<?php
//require_once '../db.php'; // Assurez-vous d'avoir ce fichier correctement configuré


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


  <h1>Bienvenue sur la page d'inscription du candidat</h1>
  <h2>Inscription Candidat</h2>
  <form id="register-candidat-form" method="post" action="/pages/candidat-register.php">

    <div class="form-group">
      <label for="name"> name </label>
      <input id="name" type="text" name="name" placeholder="Nom du candidat" required>
    </div>
    <div class="form-group">
      <label for="description"> description </label>
      <textarea id="description" name="description" placeholder="Description du candidat" required></textarea>
    </div>
    <div class="form-group"> 
      <label for="email"> email </label>
      <input type="email" name="email" placeholder="Adresse e-mail" required>
    </div>
    <div class="form-group">
      <label for="password"> password </label>
      <input type="password" name="password" placeholder="Mot de passe" required>
    </div>
    <button type="submit" name="register">S'inscrire</button>

  </form>

