<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['lastId'])){
        $usersId = $_SESSION['userId'];
        require_once('database.php');
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare(' SELECT chatMessage, usersPseudo, users.usersId,
                                        DATE_FORMAT(chatDate, "%d/%m/%Y à %Hh%i") AS DateChat,
                                        CASE 
                                            WHEN chat.usersId = ' . $usersId . ' THEN true
                                            ELSE false
                                        END AS isSender
                                        FROM chat
                                        LEFT JOIN users
                                        ON chat.usersId = users.usersId
                                        WHERE chatDate >= NOW() - INTERVAL 1 DAY
                                        ORDER BY chatDate DESC');
        $pdoStatement->execute();
        $messages = $pdoStatement->fetchAll();

        $messagesJson = json_encode($messages);
        
        echo $messagesJson;
    }
}else{
    http_response_code(405);
    echo json_encode(['message' => 'Mauvaise méthode']);
}