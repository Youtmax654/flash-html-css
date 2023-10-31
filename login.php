<?php 
require 'utils/common.php';
require SITE_ROOT . 'utils/database.php';
if(isset($_POST['email_login'])){
    if(filter_var($_POST['email_login'], FILTER_VALIDATE_EMAIL)){
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare('SELECT * FROM users WHERE `usersEmail` = :email');
        $pdoStatement->execute([
            ":email" => $_POST['email_login'],
        ]);
        $user = $pdoStatement->fetch();
        if(password_verify($_POST['password_login'],$user->usersPassword)){
            $_SESSION["userId"] = $user->userId;
            $MessageConnexion = "Vous êtes connecté(e).";
        }else{
            $MessageConnexion = "Il y a une erreur avec votre email ou votre mot de passe";
        }
    }else{
        $MessageConnexion = "Le format de l'email est incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="homeConnect"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>CONNEXION</h1>
        </div>
        <div class="login_form"> <!-- Div pour le formulaire de connexion-->
            <form action="#" method="post">
                <?php if(isset($_POST['email_login'])): ?>
                    <p><?= $MessageConnexion; ?></p>
                <?php endif ?>
                <label for="email_login"></label>
                <input type="email" id="email_login" name="email_login" placeholder="Email">
                <label for="password_login"></label>
                <input type="password" id="password_login" name="password_login" placeholder="Mot de passe">
                <input type="submit" value="Connexion">
            </form>
        </div>
        <a href="#homeConnect" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>