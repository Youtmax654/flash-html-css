<?php
require SITE_ROOT . 'utils/database.php';

function ConnexionUser($postEmail, $postPassword){
    if(filter_var($postEmail, FILTER_VALIDATE_EMAIL)){
        $pdo = connectToDbAndGetPdo();

        //recherche un utilisateur avec l'e-mail fourni
        $pdoStatement = $pdo->prepare('SELECT * FROM users WHERE `usersEmail` = :email');
        $pdoStatement->execute([
            ":email" => $postEmail,
        ]);

        //Récupération des données de l'utilisateur
        $user = $pdoStatement->fetch();

        // Vérif si un utilisateur avec cet e-mail a été trouvé
        if($user !== false){
            //Vérif du mot de passe 
            if(password_verify($postPassword, $user->usersPassword)){
                $_SESSION["userId"] = $user->usersId;
                $_SESSION["userName"] = $user->usersPseudo;
                $_SESSION['successfulLogin'] = "Vous êtes bien connecté !";
                header("Location: index.php");

                 // Mise à jour de la dernière connexion de l'utilisateur dans la bdd
                $pdo->query('UPDATE users SET usersLastConnexion = DEFAULT WHERE usersId = '.$_SESSION["userId"].'');
            }else{
                return "Il y a une erreur avec votre email ou votre mot de passe"; //mdp incorrect
            }
        }else{
            return "Il y a une erreur avec votre email ou votre mot de passe"; //email non correspondant
        }
        
    }else{
        return "Le format de l'email est incorrect"; //format email incorrect
    }
}