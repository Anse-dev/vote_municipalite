<?php

$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri, PHP_URL_PATH);
$path = ltrim($path, '/');
$segments = explode("/", $path);
$page = $segments[0];

ob_start();//Je capture le fichier chargé en memoire 
switch ($page) {
  case '':
    include '../pages/home.php';
    break;
  case 'candidat-register':
    include '../pages/candidat-register.php';
    break;
  case 'candidat-login':
    include '../pages/candidat-login.php';
    break;
  case 'candidate-home':
    include '../pages/candidate-home.php';
    break;
  case 'candidat-logout':
    include '../pages/candidat-logout.php';
    break;
  case 'user-register':
    include '../pages/user-register.php';
    break;
  case 'user-login':
    include '../pages/user-login.php';
    break;
  default:
    include '../pages/404.php';
    break;
}

$content = ob_get_clean(); // Récupérez la sortie de la mémoire tampon
$pageTitle = "Voting System"; // Titre par défaut
if (isset($pageTitleOverride)) {
    $pageTitle = $pageTitleOverride;
}

include '../template.php'; // Incluez le modèle

?>