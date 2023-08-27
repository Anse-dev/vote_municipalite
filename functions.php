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
//Email est deja utilisé
function isEmailUsed($email) {
  global $pdo;

  $query = "SELECT COUNT(*) FROM Candidats WHERE email = :email";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['email' => $email]);
  $count = $stmt->fetchColumn();

  return $count > 0;
}




function  registerCandidat($name, $email ,$password, $description){
  global $pdo;
  //Hash du mot de passe 
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  //insertion dans la base de donnée 
  
  try {
    $query = "INSERT INTO Candidats 
    (name, description, email, password_hash,photo) 
    VALUES (:name, :description, :email, :password_hash, :photo)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
      'name' => $name,
      'description' => $description,
      'email' => $email,
      'password_hash' => $password_hash,
      'photo' => "test"
    ]);

    return true;
  } catch (\Throwable $th) {
    return false;
  }
}



?>