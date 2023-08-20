<?php
require_once 'db.php';
// Assurez-vous d'avoir ce fichier correctement configuré

function createTables()
{
  global $pdo; // Cela utilise la connexion à la base de données définie dans db.php

  // Requête pour créer la table Utilisateurs
  $createUsersTable = "
    CREATE TABLE IF NOT EXISTS Utilisateurs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password_hash VARCHAR(255) NOT NULL
    );
    ";

  // Requête pour créer la table Candidats
  $createCandidatesTable = "
    CREATE TABLE IF NOT EXISTS Candidats (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        email VARCHAR(255) NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        photo VARCHAR(255)
    );
    ";

  // Requête pour créer la table Votes
  $createVotesTable = "
    CREATE TABLE IF NOT EXISTS Votes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        candidate_id INT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES Utilisateurs(id),
        FOREIGN KEY (candidate_id) REFERENCES Candidats(id)
    );
    ";

  try {
    // Exécution des requêtes pour créer les tables
    $pdo->exec($createUsersTable);
    $pdo->exec($createCandidatesTable);
    $pdo->exec($createVotesTable);
    echo "Tables créées avec succès!";
  } catch (PDOException $e) {
    echo "Erreur lors de la création des tables : " . $e->getMessage();
  }
}

// Appel de la fonction pour créer les tables
createTables();
?>