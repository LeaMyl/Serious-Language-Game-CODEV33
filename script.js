if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
    console.log("getUserMedia n'est pas pris en charge sur ce navigateur");
  }
  
  // Récupère uniquement de l'audio
  const constraints = { audio: true };
  
  // Accès au microphone de l'utilisateur et capture des données audio
  navigator.mediaDevices.getUserMedia(constraints)
    .then(stream => {
      // Le stream contient les données audio capturées
      console.log("Données audio capturées :", stream);
  
      // Création de l'enregistreur
      let mediaRecorder = new MediaRecorder(stream);
  
      // Bouton de lancement de l'enregistrement
      const startButton = document.getElementById("startButton");
      startButton.addEventListener("click", () => {
        // Démarrage de l'enregistrement
        mediaRecorder.start();
        console.log("Enregistrement audio démarré");
        document.getElementById("status").innerHTML = "Enregistrement en cours...";
      });
  
      // Bouton d'arrêt de l'enregistrement
      const stopButton = document.getElementById("stopButton");
      stopButton.addEventListener("click", () => {
        // Arrêt de l'enregistrement
        mediaRecorder.stop();
        console.log("Enregistrement audio arrêté");
        document.getElementById("status").innerHTML = "Enregistrement terminé.";
      });
  
      // Événement déclenché lorsque les données audio sont disponibles
      mediaRecorder.ondataavailable = event => {
        // Les données audio sont disponibles sous forme de blob dans event.data
        console.log("Données audio enregistrées :", event.data);
        const file = new File([event.data], 'enregistrement.wav', { type: event.data.type });
  
        // Création d'un objet FormData
        const formData = new FormData();
        formData.append('audio_file', file);
  
        // Requête AJAX vers le fichier PHP qui traitera l'envoi
        const request = new XMLHttpRequest();
        request.open("POST", "upload.php");
        request.send(formData);
  
        // Gestion de la réponse de la requête AJAX
        request.onreadystatechange = () => {
          if (request.readyState === 4) {
            if (request.status === 200) {
              console.log("Fichier audio envoyé avec succès !");
            } else {
              console.error("Erreur lors de l'envoi du fichier audio :", request.status);
            }
          }
        };
      };
    })
    .catch(error => {
      console.error("Erreur lors de la capture audio :", error);
    });