<?php
// Récupération d'un GIF depuis l'API TheCatAPI et stockage dans $catApi
$catApi = json_decode(file_get_contents("https://api.thecatapi.com/v1/images/search?mime_types=gif"))[0];
$pdo = connectToDbAndGetPdo();
$gameId = "1";
$usersId = $_SESSION['userId'];

//Récupération des messages du chat récents
$pdoStatement = $pdo->prepare("SELECT chatMessage, usersPseudo, users.usersId,
                                DATE_FORMAT(chatDate, '%d/%m/%Y à %Hh%i') AS DateChat,
                                CASE 
                                    WHEN chat.usersId = $usersId THEN 'true'
                                    ELSE 'false'
                                END AS isSender
                                FROM chat
                                LEFT JOIN users
                                ON chat.usersId = users.usersId
                                WHERE chatDate >= NOW() - INTERVAL 1 DAY
                                ORDER BY chatDate DESC");
$pdoStatement->execute();
$chat = $pdoStatement->fetchAll();

// Si un message est soumis via le formulaire alors on le récupère
if (isset($_POST["submitChatMessage"])) {
    $chatMessage = $_POST["chatMessage"];

    //Insertion du nouveau message dans la bdd
    $pdoStatement = $pdo->prepare('INSERT INTO chat (`gameId`,`usersId`,`chatMessage`)
                                   VALUES (:gameId,:usersId,:chatMessage)');
    $pdoStatement->execute([
        ":gameId" => $gameId,
        ":usersId" => $usersId,
        ":chatMessage" => $chatMessage,
    ]);
    $sendChatMessage = $pdoStatement->fetchAll();

    // Actualisation de la page pour afficher le nouveau message
    header("Refresh: 0");
}

?>
<div id="chat_lab"><i class="fa-solid fa-message"></i></div>
<div class="chat">
    <div class="tchat">
        <div class="tchat_head">
            <div class="image_robot"></div>
            <p><span>Chat général</span></p>
            <img src="<?= $catApi->url ?>" alt="a cute cat" class="cuteCat">
        </div>
        <div class="tchat_body">
            <div class="msger-tchat">
            <!-- Boucle pour afficher tous les messages du chat -->
                <?php
                foreach ($chat as $chats) :
                    // Vérification si l'utilisateur est l'expéditeur du message 
                    if ($chats->isSender === 'true') : ?>
                        <div class="msg-right-msg">
                            <!-- Affichage du message envoyé par l'utilisateur -->
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name">Vous</div>
                                    <div class="msg-text">
                                        <span><?= $chats->chatMessage ?></span>
                                    </div>
                                    <div class="msg-info-time"><?= $chats->DateChat ?></div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="msg-left-msg">
                            <img src="<?= PROJECT_FOLDER ?>userFiles/<?= $chats->usersId ?>/userProfilePicture.jpg" class="msg-img" alt="pp user">
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <!-- Affichage du message reçu d'un autre utilisateur -->
                                    <div class="msg-info-name"><?= $chats->usersPseudo ?></div>
                                    <div class="msg-text"><?= $chats->chatMessage ?></div>
                                    <div class="msg-info-time"><?= $chats->DateChat ?></div>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach ?>
            </div>

            <div class="tchat-body-bottom">
                <div class="msg-write">
                    <div class="msg-write-form">
                        <!-- Formulaire pour soumettre un nouveau message -->
                        <form method="post">
                            <label for="chatMessage"></label>
                            <input type="text" name="chatMessage" placeholder="Votre message..." required="required">
                            <input type="submit" name="submitChatMessage" value="Envoyer" class="send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>