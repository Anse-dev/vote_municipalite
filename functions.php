<?php

// Fonction pour authentifier l'utilisateur
function authenticateCandidate($email, $password)
{
    global $pdo;
    $query = "SELECT id, name, password_hash, email, description FROM Candidats WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $candidat = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($candidat && password_verify($password, $candidat['password_hash'])) {
        return $candidat;
      } else {
        return false;
      }



}



?>