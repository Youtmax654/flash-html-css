<?php
$pdo = connectToDbAndGetPdo();
$gameId = "1";
$usersId = $_SESSION['userId'];
$pdoStatement = $pdo->prepare('SELECT chatMessage, usersPseudo, users.usersId,
                                DATE_FORMAT(chatDate, "%d/%m/%Y à %Hh%i") AS DateChat,
                                CASE 
                                    WHEN chat.usersId = 1 THEN "true"
                                    ELSE "false"
                                END AS isSender
                                FROM chat
                                LEFT JOIN users
                                ON chat.usersId = users.usersId
                                WHERE chatDate >= NOW() - INTERVAL 1 DAY
                                ORDER BY chatDate ASC');
$pdoStatement->execute();
$chat = $pdoStatement->fetchAll();

if (isset($_POST["submitChatMessage"])) {
    $chatMessage = $_POST["chatMessage"];
    $pdoStatement = $pdo->prepare('INSERT INTO chat (`gameId`,`usersId`,`chatMessage`)
                                   VALUES (:gameId,:usersId,:chatMessage)');
    $pdoStatement->execute([
        ":gameId" => $gameId,
        ":usersId" => $usersId,
        ":chatMessage" => $chatMessage,
    ]);
    $sendChatMessage = $pdoStatement->fetchAll();
    header("Refresh: 1");
}

?>
<div id="chat_lab"><i class="fa-solid fa-message"></i></div>
<div class="chat">
    <div class="tchat">
        <div class="tchat_head">
            <div class="image_robot"></div>
            <p><span>Chat général</span></p>
        </div>
        <div class="tchat_body">
            <div class="msger-tchat">
                <?php
                foreach ($chat as $chats) :
                    if ($chats->isSender === 'true') : ?>
                        <div class="msg-right-msg">
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