<?php

$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri, PHP_URL_PATH);
$path = ltrim($path, '/');
$segments = explode("/", $path);
$page = $segments[0];

switch ($page) {
  case '':
    include './pages/home.php';
    break;
  case 'register-candidat':
    include './pages/candidat-register.php';
    break;
  case 'login-candidat':
    include './pages/candidat-login.php';
    break;
  case 'register-user':
    include './pages/register-user.php';
    break;
  case 'login-user':
    include './pages/login-user.php';
    break;
  default:
    include './pages/404.php';
    break;
}