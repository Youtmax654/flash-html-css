<?php
require 'utils/common.php';
require SITE_ROOT . 'utils/database.php'; 
$pdo = connectToDbAndGetPdo();

// Récupération de l'email de l'utilisateur actuellement connecté.
$pdoStatement = $pdo->prepare('SELECT usersEmail FROM users WHERE `usersId` = :id');
$pdoStatement->execute([
    ":id" => $_SESSION["userId"]
]);
$usersEmail = $pdoStatement->fetch();

// Traitement du formulaire de changement d'email.
if (isset($_POST["newEmail"])) {
    // Vérification si le nouvel email n'est pas déjà utilisé.
    $pdoStatement = $pdo->prepare('SELECT COUNT(*) as nbr FROM users WHERE `usersEmail` = :email');
    $pdoStatement->execute([":email" => $_POST["newEmail"]]);
    $verifieEmail = $pdoStatement->fetch();
    if ($verifieEmail->nbr == 0) {
        if (filter_var($_POST["newEmail"], FILTER_VALIDATE_EMAIL)) {
            // Vérification du mot de passe actuel pour autoriser le changement d'email.
            $pdoStatement = $pdo->prepare('SELECT usersPassword FROM users WHERE `usersId` = :id');
            $pdoStatement->execute([":id" => $_SESSION["userId"]]);
            $user = $pdoStatement->fetch();
            if (!$user == false) {
                if (password_verify($_POST["password"], $user->usersPassword)) {
                    // Mise à jour de l'email de l'utilisateur dans la base de données.
                    $pdoStatement = $pdo->prepare('UPDATE users SET usersEmail = :newEmail WHERE usersId = :id');
                    $pdoStatement->execute([
                        ":newEmail" => $_POST["newEmail"],
                        ":id" => $_SESSION["userId"],
                    ]);
                    $user = $pdoStatement->fetch();
                    $MessageConnexion = "Votre email a bien été modifié";
                } else {
                    $MessageConnexion = "L'email ou le mot de passe est incorrect";
                }
            }
        } else {
            $MessageConnexion = "L'email ou le mot de passe est incorrect";
        }
    } else {
        $MessageConnexion = "Cet email est déjà utilisé";
    }
}

// Traitement du formulaire de changement de mot de passe.
if (isset($_POST["oldPassword"])) {
    $pdoStatement = $pdo->prepare('SELECT * FROM users WHERE `usersId` = :id');
    $pdoStatement->execute([
        ":id" => $_SESSION["userId"]
    ]);
    $user = $pdoStatement->fetch();
    if (!$user == false) {
        if (password_verify($_POST["oldPassword"], $user->usersPassword)) {
            if ($_POST["newPassword"] === $_POST["verifiedNewPassword"]) {
                // Validation du nouveau mot de passe.
                $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/';
                if (preg_match($passwordPattern, $_POST["newPassword"])) {
                    // Mise à jour du mot de passe dans la base de données.
                    $pdoStatement = $pdo->prepare('UPDATE users SET usersPassword = :newPassword WHERE usersId = :id');
                    $pdoStatement->execute([
                        ":newPassword" => password_hash($_POST["newPassword"], PASSWORD_DEFAULT),
                        ":id" => $_SESSION["userId"],
                    ]);
                    $user = $pdoStatement->fetch();
                    $MessageConnexion = "Votre mot de passe a bien été modifié";
                } else {
                    $MessageConnexion = "Le nouveau mot de passe ne convient pas";
                }
            } else {
                $MessageConnexion = "Votre mot de passe est incorrect";
            }
        } else {
            $MessageConnexion = "Votre mot de passe est incorrect";
        }
    }
}
// Afficher un message si la photo de profil de l'utilisateur a changé
if(isset($_SESSION['profilePictureHasChanged'])) {
    $MessageConnexion = $_SESSION['profilePictureHasChanged'];
    unset($_SESSION['profilePictureHasChanged']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT . 'partials/head.php'; ?>

<body>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div id="homeAccount"></div>
        <div class="pages_banner"> <!-- Bannière pour les pages -->
            <h1>MON COMPTE</h1>
        </div>
        <?php if (isset($MessageConnexion)) : ?>
            <p class="errorMessage"><?= $MessageConnexion ?></p>
        <?php endif ?>
        <div class="myAccount">
            <!-- Affichage du profil de l'utilisateur -->
            <div class="myAccount_profile">
                <img src="<?=PROJECT_FOLDER?>userFiles/<?=$_SESSION['userId']?>/userProfilePicture.jpg" alt="profile picture" class="profilePicture">
                <?= "<p>$_SESSION[userName]</p>" ?>
                <!-- Formulaire de changement de photo de profil -->
                <form action="<?= PROJECT_FOLDER ?>utils/upload.php" method="post" enctype="multipart/form-data">
                    <p>Changer de photo de profil :</p>
                    <input type="file" name="profilePictureToUpload" id="profilePictureToUpload">
                    <input type="submit" value="Valider">
                </form>
            </div>
            <!-- Formulaire de changement d'email et de mot de passe -->
            <div class="myAccount_form">
                <div class="login_form"> 
                    <form action="#" method="post">
                        <label for="OldEmail"></label>
                        <input type="email" id="OldEmail" placeholder="Ancien Email : <?= $usersEmail->usersEmail ?>" readonly>
                        <label for="NewEmail"></label>
                        <input type="email" id="NewEmail" name="newEmail" placeholder="Nouveau Email">
                        <label for="password"></label>
                        <input type="password" id="password" name="password" placeholder="Mot de passe">
                        <input type="submit" value="Valider">
                    </form>
                </div>
                <div class="login_form"> 
                    <form action="#" method="post">
                        <label for="OldPassword"></label>
                        <input type="password" id="OldPassword" name="oldPassword" placeholder="Ancien Mot de passe">
                        <label for="NewPassword"></label>
                        <input type="password" id="NewPassword" name="newPassword" placeholder="Nouveau Mots de passe">
                        <label for="ConfirmPassword"></label>
                        <input type="password" id="ConfirmPassword" name="verifiedNewPassword" placeholder="Confirmer le Mot de passe">
                        <input type="submit" value="Valider">
                    </form>
                </div>
            </div>
        </div>
        <a href="#homeAccount" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
</body>
</html>
