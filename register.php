<?php
require 'utils/common.php';
if (isset($_SESSION['userId'])) {
    header("Location: index.php");
}
require SITE_ROOT . 'utils/database.php';
$pdo = connectToDbAndGetPdo();

$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/';

if (!empty($_POST['register'])) {
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $password_register = $_POST['mdp'];
    $check_register = $_POST['mdp_check'];

    try { //si conditions respectées alors insertion bdd
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Le format de l'email n'est pas valide");
        } else {

            $pseudoLenght = strlen($pseudo); // obtient la longueur du pseudo

            if ($pseudoLenght < 4) { 
                throw new Exception("Votre pseudo doit contenir au moins 4 caractères");
            }

            if (!preg_match($passwordPattern, $password_register)) { //regarde si le format du mot de passe convient
                throw new Exception("Le mot de passe ne convient pas");
            } else {

                //supprime les espaces blancs inutiles pour éviter un faussage du mot de passe
                $password_register = trim($password_register); 
                $check_register = trim($check_register); 

                if ($password_register !== $check_register) { //compare le mdp et le mdp de confirmation et renvoie une erreur si il est différent 
                    throw new Exception("Veuillez entrer le même mot de passe !");
                } else {
                    //insertion infos user dans la bdd
                    $pdoStatement = $pdo->prepare("INSERT INTO users (usersEmail,usersPassword,usersPseudo) 
                                               VALUES (:usersEmail, :usersPassword, :usersPseudo)");
                    $usersHasBeenInserted = $pdoStatement->execute([ // remplacement des paramètres nommés par les valeurs correspondantes
                        ':usersEmail' => $email,
                        ':usersPassword' => password_hash($password_register, PASSWORD_DEFAULT), // Le mot de passe est haché avant d'être stocké
                        ':usersPseudo' => $pseudo,
                    ]);
                    // récupération de l'identifiant (usersId) et le pseudo (usersPseudo) de l'utilisateur
                    $pdoStatement = $pdo->prepare("SELECT usersId,usersPseudo FROM users  
                                       WHERE usersEmail = :usersEmail");
                    $pdoStatement->execute([ // recherche l'utilisateur par son adresse e-mail
                        ':usersEmail' => $email
                    ]);
                    $user = $pdoStatement->fetch();
                    if ($user !== false) { //si utilisateur correspondant alors récupération de l'id de l'utilisateur 
                        $usersId = $user->usersId;
                        mkdir('userFiles/' . $usersId, 0777, true); // Crée un répertoire pour l'utilisateur dans le système de fichiers
                        copy(SITE_ROOT. "assets/images/newUsers_pp.jpg", SITE_ROOT. "userFiles/$usersId/newUsers_pp.jpg"); // Copie une image de profil par défaut dans le répertoire de l'utilisateur
                        rename(SITE_ROOT. "userFiles/$usersId/newUsers_pp.jpg",SITE_ROOT. "userFiles/$usersId/userProfilePicture.jpg");
                    } else {
                        throw new Exception("Erreur lors de la création du compte");
                    }
                    if (!$usersHasBeenInserted) { // Vérifie si l'insertion des données dans la base de données a échoué, sécurité en + 
                        throw new Exception("Une erreur s'est produite lors de l'insertion dans la base de données.");
                    }
                }
            }
        }
        $_SESSION["userId"] = $user->usersId;
        $_SESSION["userName"] = $user->usersPseudo;
        $_SESSION['successfulRegister'] = "Vous êtes bien inscrit !";
        header("Location: index.php");
    } catch (Exception $e) { // Vérifie le message d'erreur de l'exception pour déterminer le type d'erreur
        if (strpos($e->getMessage(), 'index_email') !== false) { //erreur email
            $errorMessage = "Cet email existe déjà !";
        }else if  (strpos($e->getMessage(), 'index_pseudo') !== false) {
            $errorMessage = "Ce nom d'utilisateur est déjà prit !";
        } else {
            $errorMessage = "Erreur : " . $e->getMessage(); //autres erreurs
        }
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
        <?php if(isset($errorMessage)) {
            echo "<p class='errorMessage'>$errorMessage</p>";
        } ?>
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