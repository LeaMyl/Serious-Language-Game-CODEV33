<?php
session_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form Validation Example</title>
  <style>
    /* uniformisation du code comme les autres pages */
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
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    h1 {
      text-align: center;
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

    img {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: auto;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    a:hover {
      background-color: #000;
    }

    /* styles pour le formulaire */
    form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 10px;
      font-size: 1rem;
    }

    input[type="text"], input[type="password"], textarea {
      padding: 10px;
      border-radius: 5px;
      border: none;
      margin-bottom: 10px;
      font-size: 1rem;
      resize: none;
      min-height: 40px;
    }

    input[type="radio"] {
      margin-right: 10px;
    }

    input[type="submit"] {
      background-color: #008CBA;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      font-size: 1rem;
    }

    .error {
      color: #FF0000;
    }

    /* media queries pour les petits écrans */
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

<?php
// define variables and set to empty values
$nameErr = $fnameErr = $languageTeachedErr = $passwordErr = "";
$statut="professeur";
$name = $fname = $languageTeached = $comment = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["fname"])) {
    $fnameErr = "first name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }
    
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["languageTeached"])) {
    $languageTeachedErr = "Language teached is required";
  } else {
    $languageTeached = test_input($_POST["languageTeached"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Serious Language Game</h1>
<h2>Inscription</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Last Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  First Name: <input type="text" name="fname">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>
  Password: <input type="password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Teaching :
  <input type="radio" name="languageTeached" value="french">French
  <input type="radio" name="languageTeached" value="english">English
  <input type="radio" name="languageTeached" value="spanish">Spanish
  <input type="radio" name="languageTeached" value="other">Other
  <span class="error">* <?php echo $languageTeachedErr;?></span>
  <br><br><br><br>

  <form action="menuBeau.html" method="get">
    <input type="hidden" name="parametre" value="valeur">
    <input type="submit" value="Send">
  </form>

</form>

<?php 
print "<h2>Your Input:</h2>";
print $name;
print "<br>";
print $fname;
print "<br>";
print $password;
print "<br>";
print $languageTeached;
print "<br>";
?>
<?php
$db = new mysqli('localhost', 'root', '', 'bdv2'); // remplacer les valeurs de la base de donnée si nécessaire
if ($db->connect_errno) {
  echo "Erreur lors de la connexion à la base de données : " . $db->connect_error;
  exit();
}
if (!$db->select_db('bdv2')) {
  echo "Erreur lors de la sélection de la base de données : " . $db->error;
  exit();
}

// Vérifier si le formulaire a été soumis
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Vérifier les données du formulaire et les stocker dans des variables
  $fname = isset($_POST["fname"]) ? test_input($_POST["fname"]) : "";
  $name = isset($_POST["name"]) ? test_input($_POST["name"]) : "";
  $password = isset($_POST["password"]) ? test_input($_POST["password"]) : "";
  $languageTeached = isset($_POST["languageTeached"]) ? test_input($_POST["languageTeached"]) : "";

  // Vérifier que les champs obligatoires ne sont pas vides
  if (!empty($fname) && !empty($name) && !empty($password) && !empty($languageTeached)) {
    // Insérer les données dans la base de données
    $stmt = $db->prepare("INSERT INTO utilisateur (prenom, nom, code_connexion) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $fname, $name, $password);
    $stmt->execute();
    $id_utilisateur = $stmt->insert_id; // Récupérer l'ID généré pour l'utilisateur
    $stmt->close();

    $stmt = $db->prepare("INSERT INTO professeur (id, prenom, nom, code_connexion, langage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('issss', $id_utilisateur, $fname, $name, $password, $languageTeached);
    $stmt->execute();
    $stmt->close();

    // Sélectionner l'utilisateur nouvellement inscrit
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE id = ?");
    $stmt->bind_param("i", $id_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    // Vérification de la connexion et affichage des informations
    if ($user) {
      // L'utilisateur existe et les informations d'identification sont correctes
      // Créer les variables de session
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['nom'];
      $_SESSION['user_fname'] = $user['prenom'];
      // Rediriger l'utilisateur vers la page de succès ou effectuer d'autres actions nécessaires
      echo '<script>window.location.href = "menuProf.php";</script>';
      exit();
    } else {
      // L'utilisateur n'existe pas ou les informations d'identification sont incorrectes
      echo "Informations d'identification incorrectes.";
    }

    // Fermer la connexion à la base de données
    $db->close();
  } else {
    echo "Veuillez remplir tous les champs obligatoires.";
  }

  // Fermer la connexion à la base de données
  //$db->close();
}
?>



</body>
</html>
