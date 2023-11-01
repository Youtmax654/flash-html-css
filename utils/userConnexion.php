<?php
require SITE_ROOT . 'utils/database.php';

function ConnexionUser($postEmail, $postPassword){
    if(filter_var($postEmail, FILTER_VALIDATE_EMAIL)){
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare('SELECT * FROM users WHERE `usersEmail` = :email');
        $pdoStatement->execute([
            ":email" => $postEmail,
        ]);
        $user = $pdoStatement->fetch();
        if(!$user == false){
            if(password_verify($postPassword, $user->usersPassword)){
                $_SESSION["userId"] = $user->usersId;
                return "Vous etes connecter." ;
            }else{
                return "Il y as une erreur avec votre email ou votre mot de passe";
            }
        }else{
            return "Il y as une erreur avec votre email ou votre mot de passe";
        }
        
    }else{
        return "Le format de l'email est incorrect";
    }
}

    
