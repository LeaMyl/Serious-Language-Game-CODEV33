<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serious Language Game</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }

      .centrer {
        text-align: center;
      }

      h1 {
        font-size: 3rem;
        margin-top: 0;
      }

      h2 {
        font-size: 2rem;
        margin-top: 0;
      }

      i {
        font-size: 1.3rem;
        display: block;
        margin-bottom: 20px;
      }

      hr {
        margin: 40px 0;
        border: none;
        border-top: 1px solid #ccc;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }

      th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
      }

      a {
        display: block;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
        margin-bottom: 10px;
        transition: all 0.3s ease;
      }

      a:hover {
        background-color: #f8f8f8;
      }

      textarea {
        width: 100%;
        padding: 10px;
        resize: vertical;
      }

      @media only screen and (max-width: 600px) {
        h1 {
          font-size: 2rem;
        }

        h2 {
          font-size: 1.5rem;
        }

        i {
          font-size: 1rem;
        }
      }
    </style>
  </head>

  <body>
    <div class="container">
      <header>
        <h1 class="centrer">Serious Language Game</h1>
      </header>
      <main>
        <i>Welcome to Serious Language Game</i>
      </main>
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serious Language Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .centrer {
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-top: 0;
        }

        h2 {
            font-size: 2rem;
            margin-top: 0;
        }

        i {
            font-size: 1.3rem;
            display: block;
            margin-bottom: 20px;
        }

        hr {
            margin: 40px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        a {
            display: block;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #f8f8f8;
        }

        textarea {
            width: 100%;
            padding: 10px;
            resize: vertical;
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            i {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
<div class="container">
    <header>
        <h1 class="centrer">Serious Language Game</h1>
    </header>
    <main>
        <i>Welcome to Serious Language Game</i>
    </main>
    <?php

$db = new mysqli('localhost', 'root', '', 'bdv2'); // Remplacez les valeurs de la base de données si nécessaire

if ($db->connect_errno) {
    echo "Erreur lors de la connexion à la base de données : " . $db->connect_error;
    exit();
}

if (!$db->select_db('bdv2')) {
    echo "Erreur lors de la sélection de la base de données : " . $db->error;
    exit();
}

// Requête SQL pour récupérer tous les audios avec leurs détails
$sql = "SELECT audio.nom AS audio_nom, partie.id AS partie_id
        FROM audio
        INNER JOIN partie ON audio.nom = partie.nom_audio";

$result = $db->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Afficher les en-têtes des colonnes
        echo "<table>
                <tr>
                    <th>Audios enregistrés :</th>
                </tr>";

        // Parcourir les enregistrements et afficher les détails
        while ($row = $result->fetch_assoc()) {
            $audioNom = $row['audio_nom'];
            $partieId = $row['partie_id'];

            echo "<tr>
                    <td><a href=\"C:/wamp64/www/html/$audioNom.wav\">$audioNom</a></td>
                </tr>
                <tr>
                    <td>";

            // Récupérer les commentaires liés à la partie
            $commentairesSql = "SELECT * FROM remarque WHERE id_partie = '$partieId'";
            $commentairesResult = $db->query($commentairesSql);

            if ($commentairesResult) {
                // Afficher les commentaires existants
                echo "<ul>";
                while ($commentaireRow = $commentairesResult->fetch_assoc()) {
                    $commentaire = $commentaireRow['remarque'];
                    echo "<li>$commentaire</li>";
                }
                echo "</ul>";
                $commentairesResult->free();
            } else {
                echo "Erreur lors de l'exécution de la requête des commentaires : " . $db->error;
            }

            // Afficher le formulaire d'enregistrement des commentaires
            echo "<form action=\"enregistrer_commentaire.php\" method=\"post\">
                    <input type=\"hidden\" name=\"partie_id\" value=\"$partieId\">
                    Comment: <textarea name=\"comment\" rows=\"5\" cols=\"40\"></textarea>
                    <input type=\"submit\" value=\"Enregistrer\">
                </form>";

            echo "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun audio trouvé.";
    }

    $result->free();
} else {
    echo "Erreur lors de l'exécution de la requête : " . $db->error;
}

$db->close();
?>


    <a href="">Quitter l'application</a>
</div>

<footer>
    <p>© 2023 Serious Language Game. All rights reserved.</p>
</footer>
</body>
</html>
