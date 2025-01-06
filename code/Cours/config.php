<?php
// config.php : Configuration de la connexion à la base de données
$host = 'localhost'; // Adresse du serveur
$dbname = 'crud_db'; // Nom de la base de données
$username = 'eleve'; // Nom d'utilisateur
$password = 'eleve'; // Mot de passe

try {
    // Création d'une connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    die("Erreur de connexion : " . $e->getMessage());
}
?>
