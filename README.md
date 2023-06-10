# Serious-Language-Game-CODEV33

Projet étudiant IMT Atlantique : Serious Language Game 

Etudiants : Ellyas Dago, Léa Miqueu, Antoine Sarignac

Ce projet a pour objectif de créer une application web permettant l'apprentissage d'une langue étrangère via l'enregistrement d'exercices comme la description d'images ou la lecture d'un texte. L'application met en place deux types d'utilisateurs : les étudiants et les professeurs. Les étudiants ont accès aux différents jeux proposés par l'application tandis que les professeurs ont l'opportunité de commenter les audios des élèves et de voir les commentaires des autres professeurs sur ce même audio. 

L'architecture de l'application web est présente ci-dessous avec le nom des codes correspondant aux pages web: 

![Texte alternatif](diagrammeCodev.png)

Dans le serveur est mis en place une base de données, dont les requêtes de création se trouvent dans [bd_V2.sq](bd_V2.sq) et l'architecture est fournie ci-dessous : 

![Texte alternatif](bd(1).jpg)

Lorsqu'un utilisateur arrive sur l'application web - donc à l'ouverture du fichier [accueil.php](accueil.php)- il choisit de se connecter ou de s'inscrire. En fonction de son choix il est envoyé soit à [connexion.php](connexion.php) soit à [inscriptionProfEtudiant.php](inscriptionProfEtudiant.php). Dans le cas de la connexion, le code va faire appel à la base de donnée pour savoir si l'utilisateur existe et s'il s'agit d'un professeur ou d'un élève. Dans le cas d'une inscription, l'utilisateur a le choix de cliquer sur deux boutons, l'un permet la création d'un compte élève et envoie sur la page [inscriptionEtudiant.php](inscriptionEtudiant.php), l'autre permet la création d'un compte professeur et envoie sur la page [inscriptionProf.php](inscriptionProf.php). Dans les deux cas le nouvel utilisateur est référencé dans la base de donnée dans les tables utilisateur et eleve ou professeur en fonction du type d'utilisateur. Que ce soit pour la connexion ou les inscriptions, une session php est ouverte afin de conserver l'identifiant de l'utilisateur, son nom et son prénom. 

Une fois connecté, le professeur arrive sur la page correspondant au code [menuProf.php](menuProf.php), cela lui donne accès aux audios (à retravailler), aux commentaire des autres professeurs pour chaque audio et à un espace commentaire pour chaque audio.





