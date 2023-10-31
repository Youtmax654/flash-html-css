<?php require 'utils/common.php';
require SITE_ROOT . 'utils/database.php';
$pdo = connectToDbAndGetPdo();

$passwordPattern = "'/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/'";
$pseudoPattern = "'/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{4,}$/'";

if (!empty($_POST['register'])) {
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $password_register = $_POST['mdp'];
    $check_register = $_POST['mdp_check'];


    if($password_register = $check_register) {


        if (preg_match($passwordPattern, $password_register)) {

            $pdoStatement = $pdo->prepare("INSERT INTO users (usersEmail,usersPassword,usersPseudo) 
                                        VALUES (:usersEmail, :usersPassword,:usersPseudo)");
            $usersHasBeenInserted = $pdoStatement->execute([
                ':usersEmail' => $email,
                ':usersPassword' => password_hash($password_register, PASSWORD_DEFAULT),
                ':usersPseudo' => $pseudo,
            ]);
        }
    }else{
        echo "Veulliez entrer le même mot de passe !";
    }

}

?>


<!DOCTYPE html>
<html lang="fr">

<?php require SITE_ROOT . 'partials/head.php'; ?>

<body>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div id="homeRegister"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>INSCRIPTION</h1>
        </div>
        <div class="register_form"> <!-- Div pour le formulaire de connexion-->
            <form method="POST">
                <label for="email_register"></label>
                <input type="email" id="email_register" name="email" placeholder="Email" required>
                <label for="pseudo_register"></label>
                <input type="text" id="pseudo_register" name="pseudo" placeholder="Pseudo" required>
                <label for="password_register"></label>
                <input type="password" id="password_register" name="mdp" placeholder="Mot de passe" required>
                <label for="check_register"></label>
                <input type="password" id="check_register" name="mdp_check" placeholder="Confirmer le mot de passe" required>
                <input type="submit" value="Inscription" name="register">

            </form>
        </div>
        <a href="#homeRegister" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
</body>

</html>