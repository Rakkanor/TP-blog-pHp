<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Connexion au blog</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>Connexion au Blog de l'inutilité universelle</h1>
      <form action="login_process.php" method="POST">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit" class="button">Se connecter</button>
      </form>
      <p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez-vous ici</a></p>
    </div>
  </body>
</html>
