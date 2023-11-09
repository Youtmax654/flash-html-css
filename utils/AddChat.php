<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_SESSION['userId'])){
        $donneesJson = file_get_contents('php://input');
        $donnees = json_decode($donneesJson);
        if(isset($donnees->message) && !empty($donnees->message)){

            require_once('database.php');
            $pdo = connectToDbAndGetPdo();
            $pdoStatement = $pdo->prepare('INSERT INTO `chat`(`chatMessage`, `usersId`, `gameId`) VALUES (:message, :user, "1")');
            if($pdoStatement->execute([":message" => strip_tags($donnees->message), ":user" => $_SESSION["userId"]])){
                http_response_code(201);
                echo json_encode(['message' => 'Message enregistré']);
            }else{
                http_response_code(400);
                echo json_encode(['message' => 'Une erreur est survenue']);
            }
        }else{
            http_response_code(400);
            echo json_encode(['message' => 'Le message est vide']);    
        }
    }else{
        http_response_code(400);
        echo json_encode(['message' => 'Vous n\'êtes pas connecté(e)']);
    }
}else{
    http_response_code(405);
    echo json_encode(['message' => 'Mauvaise méthode']);
}