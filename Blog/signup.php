<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Inscription au blog</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>Inscription au Blog de l'inutilité universelle</h1>
      <form action="signup_process.php" method="POST">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Adresse e-mail :</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit" class="button">S'inscrire</button>
      </form>
      <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
    </div>
  </body>
</html>
