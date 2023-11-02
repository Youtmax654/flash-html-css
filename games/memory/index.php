<?php 
require '../../utils/common.php'; 
require SITE_ROOT . 'utils/userConnexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="chat_lab"><i class="fa-solid fa-message"></i></div>
        <div class="chat">
            <div class="tchat">
                <div class="tchat_head">
                    <div class="image_robot"></div>
                    <p><span>Chat général</span></p>
                </div>
                <div class="tchat_body">
                    <div class="msger-tchat">
                        <div class="msg-right-msg">
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name">Moi</div>
                                    <div class="msg-text">
                                        <span>Hello</span>
                                    </div>
                                    <div class="msg-info-time">Aujourd'hui à 16h45</div>
                                </div>
                            </div>
                        </div>

                        <div class="msg-left-msg">
                            <div class="msg-img"></div>
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name">Virginie</div>
                                    <div class="msg-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti alias volu.
                                    </div>
                                    <div class="msg-info-time">Aujourd'hui à 17h01</div>
                                </div>
                            </div>
                        </div>

                        <div class="msg-right-msg">
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name">Moi</div>
                                    <div class="msg-text">
                                        <span>Lorem ipsum dolor sit amet, lumosum adipisicing elit.</span>
                                    </div>
                                    <div class="msg-info-time">Aujourd'hui à 17h03</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tchat-body-bottom">
                        <div class="msg-write">
                            <div class="msg-write-form">
                                <form action="#">
                                    <label for="chat-text"></label>
                                    <input type="text" id="chat-text" placeholder="Votre message...">
                                    <input type="submit" value="Envoyer" class="send">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>JEU</h1>
        </div>
        <table class="tableGame">
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
        </table>
        <table class="tableGame hidden">
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
        </table>
        <table class="tableGame hidden" id="big">
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
        </table>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>