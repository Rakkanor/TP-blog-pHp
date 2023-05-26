<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog de l'inutilité universelle</title>
    <link rel="stylesheet" href="blog.css">
  </head>
  <body>
    <div class="container">
      <h1>Bienvenue sur le Blog de l'inutilité universelle</h1>
      <nav>
        <ul>
          <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
      </nav>
      <h2>Les 10 derniers articles</h2>
      <?php
        // Connexion à la base de données
        $bdd = new PDO('mysql:host=localhost;dbname=nom_de_la_base_de_donnees;charset=utf8', 'nom_utilisateur', 'mot_de_passe');

        // Récupération des 10 derniers articles
        $requete = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM articles ORDER BY date_creation DESC LIMIT 0, 10');

        // Affichage des articles
        while ($donnees = $requete->fetch())
        {
          echo '<article>';
          echo '<h3>' . htmlspecialchars($donnees['titre']) . '</h3>';
          echo '<em>Publié le ' . $donnees['date_creation_fr'] . '</em><br>';
          echo '<p>' . htmlspecialchars($donnees['contenu']) . '</p>';
          echo '</article>';
        }

        // Fermeture de la requête
        $requete->closeCursor();
      ?>
    </div>
  </body>
</html>
