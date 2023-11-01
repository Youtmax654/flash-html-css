<?php
require "common.php";
$uploadDir = SITE_ROOT."userFiles/$_SESSION[userId]/";
$uploadFile = $uploadDir . basename($_FILES['profilePictureToUpload']['name']);

if (move_uploaded_file($_FILES['profilePictureToUpload']['tmp_name'], $uploadFile)) {
    rename($uploadFile, $uploadDir . "userProfilePicture.jpg");
    header("Location: ".PROJECT_FOLDER."myAccount.php");
    $_SESSION['profilePictureHasChanged'] = "Votre photo de profil a bien été modifié.";
}
