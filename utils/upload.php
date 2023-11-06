<?php
//fichier pour changement de photo de profil

require "common.php";

// Définition du répertoire de téléchargement en fonction de l'utilisateur connecté
$uploadDir = SITE_ROOT."userFiles/$_SESSION[userId]/";

// Définition du chemin complet du fichier téléchargé
$uploadFile = $uploadDir . basename($_FILES['profilePictureToUpload']['name']);

// Vérification si le fichier téléchargé a été déplacé avec succès vers le répertoire cible
if (move_uploaded_file($_FILES['profilePictureToUpload']['tmp_name'], $uploadFile)) {
    rename($uploadFile, $uploadDir . "userProfilePicture.jpg");
    header("Location: ".PROJECT_FOLDER."myAccount.php");
    $_SESSION['profilePictureHasChanged'] = "Votre photo de profil a bien été modifié.";
}
