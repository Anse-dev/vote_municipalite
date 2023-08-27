<?php
require_once '../db.php'; // Assurez-vous d'avoir ce fichier correctement configuré
require_once '../functions.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
 $name = $_POST['name'];
 $description = $_POST['description'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $isUsedEmail = isEmailUsed($email);
 if($isUsedEmail){
  $registerError=  "Email deja existant";
 }else{
  $bool=  registerCandidat($name, $email,$password,$description);
  if($bool){
   header('Location: candidat-login');
   exit();
  }else{
   header('Location: candidat-register');
   exit();
  }
 }

 
}
?>


  <h1>Bienvenue sur la page d'inscription du candidat</h1>
  <h2>Inscription Candidat</h2>
  <?php if (isset($registerError)): ?>
    <p>
      <?php echo $registerError; ?>
    </p>
  <?php endif; ?>
  <form id="register-candidat-form" method="post" action="candidat-register">

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

