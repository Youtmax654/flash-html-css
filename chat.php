<?php
$catApi = json_decode(file_get_contents("https://api.thecatapi.com/v1/images/search?mime_types=gif"))[0];


?>
<div id="chat_lab"><i class="fa-solid fa-message"></i></div>
<div class="chat">
    <div class="tchat">
        <div class="tchat_head">
            <div class="image_robot"></div>
            <p><span>Chat général</span></p>
            <img src="<?= $catApi->url ?>" alt="a cute cat" class="cuteCat">
        </div>
        <input type="hidden" id="SessionId" value="<?= $_SESSION["userId"] ?>">
        <div class="tchat_body">
            <div class="msger-tchat">
                
            </div>

            <div class="tchat-body-bottom">
                <div class="msg-write">
                    <div class="msg-write-form">
                        <form>
                            <label for="chatMessage"></label>
                            <input type="text" name="chatMessage" id="TextPlace" placeholder="Votre message..." required="required">
                            <input type="text" name="submitChatMessage" id="submit" value="Envoyer" class="send" readonly>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>