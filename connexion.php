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
$nameErr= $fnameErr = $passwordErr = "";
$name =  $fname = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  if (empty($_POST["name"])) {
    $nameErr = "last name is required";
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Serious Language Game</h1>
<h2>Connexion</h2>
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
  <input type="submit" name="submit" value="Submit">  
</form>

<?php 
print "<h2>Your Input:</h2>";
print $name;
print "<br>";
print $fname;
print "<br>";
print $password;
?>

<?php
// Démarrer la session utilisateur

$db = new mysqli('localhost', 'root', '', 'bdv2'); // Remplacez les valeurs de la base de données si nécessaire
if ($db->connect_errno) {
  echo "Erreur lors de la connexion à la base de données : " . $db->connect_error;
  exit();
}
if (!$db->select_db('bdv2')) {
  echo "Erreur lors de la sélection de la base de données : " . $db->error;
  exit();
}
$user = "";

// Vérifier si les variables de nom, prénom et mot de passe sont définies et non vides
if (!empty($name) && !empty($fname) && !empty($password)) {
  // Requête SQL pour récupérer l'utilisateur avec le nom, prénom et mot de passe donnés
  $stmt = $db->prepare("SELECT * FROM utilisateur WHERE nom = ? AND prenom = ? AND code_connexion = ?");
  $stmt->bind_param("sss", $name, $fname, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $stmt->close();
}
 
// Vérification de la connexion et redirection en fonction du rôle de l'utilisateur
if ($user != "") {
  // L'utilisateur existe et les informations d'identification sont correctes

  // Récupérer le rôle de l'utilisateur en effectuant une requête dans les tables 'eleve' et 'professeur'
  $stmt = $db->prepare("SELECT id FROM eleve WHERE id = ?");
  $stmt->bind_param("i", $user['id']);
  $stmt->execute();
  $resultEleve = $stmt->get_result();
  $stmt->close();

  $stmt = $db->prepare("SELECT id FROM professeur WHERE id = ?");
  $stmt->bind_param("i", $user['id']);
  $stmt->execute();
  $resultProfesseur = $stmt->get_result();
  $stmt->close();

    // Créer les variables de session
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nom'];
$_SESSION['user_fname'] = $user['prenom'];
// Rediriger l'utilisateur vers la page de succès ou effectuer d'autres actions nécessaires


  if ($resultEleve->num_rows > 0) {
    // L'utilisateur est un élève
    header("Location: menuBeau.html");
    exit();
  } elseif ($resultProfesseur->num_rows > 0) {
    // L'utilisateur est un professeur
    header("Location: menuProf.php");
    exit();
  } else {
    // Rôle non reconnu
    echo "Rôle de l'utilisateur non reconnu.";
  }
} else {
  // L'utilisateur n'existe pas ou les informations d'identification sont incorrectes
  echo "Informations d'identification incorrectes.";
}
?>



</body>
</html>