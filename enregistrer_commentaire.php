<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $partieId = $_POST['partie_id'];
    $commentaire = $_POST['comment'];

    // Récupérer l'id du professeur à partir de la session
    $idProfesseur = $_SESSION['user_id']; 
    // Insérer le commentaire dans la base de données
    $db = new mysqli('localhost', 'root', '', 'bdv2'); // Remplacez les valeurs de la base de données si nécessaire

    if ($db->connect_errno) {
        echo "Erreur lors de la connexion à la base de données : " . $db->connect_error;
        exit();
    }

    $sql = "INSERT INTO remarque (id_partie, id_prof, remarque) VALUES ('$partieId', '$idProfesseur', '$commentaire')";

    if ($db->query($sql) === TRUE) {
        echo "Le commentaire a été enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement du commentaire : " . $db->error;
    }

    $db->close();
}
?>

