
<?php
session_start();
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audio_file'])) {
  // Vérifier si le fichier a été téléchargé sans erreur
  if ($_FILES['audio_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['audio_file']['tmp_name'])) {
    $upload_dir = "C:\\wamp64\\www\\CODEV33\\son\\"; // chemin vers le répertoire d'upload
    $audio_file = $_FILES['audio_file'];
    $audio_name = $_SESSION['user_name'] . '_' . $_SESSION['user_fname'] .'_'. $_SESSION['nom_image'] .'_'. date('YmdHis') . '.' . pathinfo($audio_file['name'], PATHINFO_EXTENSION);
    $audio_path = $upload_dir . $audio_name;
    // Déplacer le fichier téléchargé vers le répertoire d'upload
    if (move_uploaded_file($audio_file['tmp_name'], $audio_path)) {
      // Insérer les informations du fichier audio dans la base de données
      $db = new mysqli('localhost', 'root', '', 'bdv2'); // remplacer les valeurs de la base de donnée si nécessaire
      if ($db->connect_errno) {
        echo "Erreur lors de la connexion à la base de données : " . $db->connect_error;
        exit();
      }
      if (!$db->select_db('bdv2')) {
        echo "Erreur lors de la sélection de la base de données : " . $db->error;
        exit();
      }
      
      // Insérer le fichier audio dans la table "audio"
      $stmt = $db->prepare("INSERT INTO audio (nom, chemin, temps) VALUES (?, ?, '')");
      $stmt->bind_param('ss', $audio_name, $audio_path);
      $stmt->execute();
      $stmt->close();
    
      
      // Insérer la partie dans la table "partie"
      $stmt = $db->prepare("INSERT INTO partie (id, nom_audio, id_eleve, id_jeu) VALUES (DEFAULT, ?, ?, ?)");
      $stmt->bind_param('sii', $audio_name, $_SESSION['user_id'],$_SESSION['id_jeu']);
      $stmt->execute();
      $stmt->close();
      
      $db->close();
      
      echo 'Fichier audio téléchargé avec succès !';
    } else {
      echo 'Erreur lors du téléchargement du fichier audio.';
    }
  } else {
    echo 'Erreur lors de l\'envoi du fichier audio.';
  }
}
?>
