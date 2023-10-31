<?php 
require 'utils/common.php'; 
require SITE_ROOT . 'utils/database.php';

if(isset($_POST["newEmail"])){
    if(filter_var($_POST["newEmail"], FILTER_VALIDATE_EMAIL)){
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="homeAccount"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>MON COMPTE</h1>
        </div>
        <div class="login_form"> <!-- Div pour le formulaire de connexion-->
            <form action="#" method="post">
                <label for="OldEmail"></label>
                <input type="email" id="OldEmail" placeholder="Ancien Email : jacke@gmail.com" readonly>
                <label for="NewEmail"></label>
                <input type="email" id="NewEmail" name="newEmail" placeholder="Nouveau Email">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Mot de passe">
                <input type="submit" value="Valider">
            </form>
        </div>
        <div class="login_form"> <!-- Div pour le formulaire de connexion-->
            <form action="#" method="post">
                <label for="OldPassword"></label>
                <input type="email" id="OldPassword" placeholder="Ancien Mot de passe">
                <label for="NewPassword"></label>
                <input type="email" id="NewPassword" placeholder="Nouveau Mots de passe">
                <label for="ConfirmPassword"></label>
                <input type="password" id="ConfirmPassword" placeholder="Confirmer le Mot de passe">
                <input type="submit" value="Valider">
            </form>
        </div>
        <a href="#homeAccount" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>