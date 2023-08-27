<?php
$host = 'localhost';
$dbName = 'vote_db';
$user = 'root';
$password = 'anselme';

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);