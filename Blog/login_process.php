<?php

// Vérification des champs de formulaire
if (!isset($_POST['username'], $_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
    header('Location: login.php?error=empty_fields');
    exit();
}

// Récupération des données de connexion depuis le formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Connexion à la base de données
$host = 'localhost';
$dbname = 'nom_de_la_base_de_donnees';
$username_db = 'nom_utilisateur_mysql';
$password_db = 'mot_de_passe_mysql';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username_db, $password_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Location: login.php?error=db_error');
    exit();
}

// Requête pour récupérer l'utilisateur correspondant au nom d'utilisateur
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification du mot de passe
if (!$user || !password_verify($password, $user['password'])) {
    header('Location: login.php?error=wrong_credentials');
    exit();
}

// Démarrage de la session et stockage des informations utilisateur
session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

// Redirection vers la page du blog
header('Location: index.php');
exit();

?>
