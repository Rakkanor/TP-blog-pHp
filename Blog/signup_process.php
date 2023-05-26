<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Inclure le fichier de configuration de la base de données
  require_once "config.php";
  
  // Définir les variables postées
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // Vérifier si l'utilisateur existe déjà dans la base de données
  $sql = "SELECT id FROM users WHERE username = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
    // L'utilisateur existe déjà
    header("Location: signup.php?error=username_taken");
    exit();
  }
  
  // Hasher le mot de passe
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  // Insérer l'utilisateur dans la base de données
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $hashed_password);
  $stmt->execute();
  
  // Rediriger vers la page de connexion
  header("Location: login.php?success=signup");
  exit();
} else {
  // Le formulaire n'a pas été soumis
  header("Location: signup.php");
  exit();
}
?>
