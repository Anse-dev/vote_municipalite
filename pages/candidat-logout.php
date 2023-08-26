<?php
session_start(); // Démarrage de la session

// Détruire toutes les données de session
session_unset();
session_destroy();

// Rediriger vers une page après la déconnexion (par exemple, la page d'accueil)
header('Location: login-candidat');
exit();
?>
