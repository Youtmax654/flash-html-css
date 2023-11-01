<?php 
require 'utils/common.php'; 
require SITE_ROOT . 'utils/database.php';
$pdo = connectToDbAndGetPdo();
$pdoStatement = $pdo->prepare('SELECT usersEmail FROM users WHERE `usersId` = :id');
$pdoStatement->execute([
    ":id" => $_SESSION["userId"],
]);
$usersEmail = $pdoStatement->fetch();

if(isset($_POST["newEmail"])){
    if(filter_var($_POST["newEmail"], FILTER_VALIDATE_EMAIL)){
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare('SELECT usersPassword FROM users WHERE `usersId` = :id');
        $pdoStatement->execute([
            ":id" => $_SESSION["userId"],
        ]);
        $user = $pdoStatement->fetch();
        if(!$user == false){
            if(password_verify($_POST["password"], $user->usersPassword)){
                $pdo = connectToDbAndGetPdo();
                $pdoStatement = $pdo->prepare('UPDATE users SET usersEmail = :newEmail WHERE usersId = :id');
                $pdoStatement->execute([
                    ":newEmail" => $_POST["newEmail"],
                    ":id" => $_SESSION["userId"],
                ]);
                $user = $pdoStatement->fetch();
                $MessageConnexion = "Email changer";
            }else{
                $MessageConnexion = "erreur avec l'email ou le mot de passe";
            }
        }
    }else{
        $MessageConnexion = "erreur avec l'email ou le mot de passe";
    }
}
if(isset($_POST["oldPassword"])){
    $pdo = connectToDbAndGetPdo();
    $pdoStatement = $pdo->prepare('SELECT * FROM users WHERE `usersId` = :id');
    $pdoStatement->execute([
        ":id" => $_SESSION["userId"],
    ]);
    $user = $pdoStatement->fetch();
    if(!$user == false){
        if(password_verify($_POST["oldPassword"], $user->usersPassword)){
            if($_POST["newPassword"] === $_POST["verifiedNewPassword"]){
                $pdo = connectToDbAndGetPdo();
                $pdoStatement = $pdo->prepare('UPDATE users SET usersPassword = :newPassword WHERE usersId = :id');
                $pdoStatement->execute([
                    ":newPassword" => password_hash($_POST["newPassword"], PASSWORD_DEFAULT),
                    ":id" => $_SESSION["userId"],
                ]);
                $user = $pdoStatement->fetch();
                $MessageConnexion = "Mot de passe changer";
            }else{
                $MessageConnexion = "erreur dans la vérification de vos mots de passe ";
            }
        }else{
            $MessageConnexion = "erreur avec le mot de passe";
        }
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
        <?php if(isset($_POST['newEmail']) || isset($_POST['oldPassword'])): ?>
            <p><?= $MessageConnexion; ?></p>
        <?php endif ?>
        <div class="login_form"> <!-- Div pour le formulaire de connexion-->
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
        <div class="login_form"> <!-- Div pour le formulaire de connexion-->
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
        <a href="#homeAccount" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>