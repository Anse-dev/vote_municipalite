<?php
session_start(); // Démarrage de la session

require_once '../db.php';
require_once "../functions.php";
if (isset($_SESSION['candidate_id'])) {
  header('Location: candidate-home'); // Redirigez vers la page d'accueil du candidat
  exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
    // Authentification du candidat
  $candidate = authenticateCandidate($email, $password);

  if ($candidate) {
      // Enregistrez l'ID du candidat dans la session
      $_SESSION['candidate_id'] = $candidate['id'];
      header('Location: candidate-home'); // Redirigez vers la page d'accueil du candidat
      exit();
  } else {
      $loginError = "Identifiants invalides. Veuillez réessayer.";
    }
}


?>




  <h1>Bienvenue sur la page de connexion du candidat</h1>
  <?php if (isset($loginError)): ?>
    <p>
      <?php echo $loginError; ?>
    </p>
  <?php endif; ?>
  <form method="post" action="/pages/candidat-login.php">
    <input type="email" name="email" placeholder="Adresse e-mail" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" name="login">Se connecter</button>
  </form>
  <p>Vous n'avez pas de compte ? <a href="/register-candidat"> Inscrivez-vous </a></p>

