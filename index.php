<?php require 'utils/common.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="home"></div>
        <article id="welcome">
            <h1>Bienvenue dans notre studio !</h1>
            <p>Venez challenger les cerveaux les plus agiles !</p>
            <a href="login.php" id="button">Jouer !</a>
        </article>
        <div id="IlluImg">
            <div id="AllImg">
                <div class="img"><img src="<?=PROJECT_FOLDER?>assets/images/PC.jpg" alt="a picture of a pc"></div>
                <div class="img"><img src="<?=PROJECT_FOLDER?>assets/images/illustration.jpg" alt="a illustration"></div>
                <div class="img"><img src="<?=PROJECT_FOLDER?>assets/images/flush.jpg" alt="a lot a poker card"></div>
            </div>
            <div>
                <div>
                    <p>01</p>
                    <p>Lorem Ipsum</p>
                    <p>sit amet consectetur adipisicing elit. Reiciendis quisquam omnis sunt unde, ipsa ipsam pariatur
                        delectus, eum placeat quibusdam enim, amet nostrum voluptatum corrupti minus rem qui eius
                        itaque!</p>
                </div>
                <div>
                    <p>02</p>
                    <p>Lorem Ipsum</p>
                    <p>sit amet consectetur adipisicing elit. Reiciendis quisquam omnis sunt unde, ipsa ipsam pariatur
                        delectus, eum placeat quibusdam enim, amet nostrum voluptatum corrupti minus rem qui eius
                        itaque!</p>
                </div>
                <div>
                    <p>03</p>
                    <p>Lorem Ipsum</p>
                    <p>sit amet consectetur adipisicing elit. Reiciendis quisquam omnis sunt unde, ipsa ipsam pariatur
                        delectus, eum placeat quibusdam enim, amet nostrum voluptatum corrupti minus rem qui eius
                        itaque!</p>
                </div>
            </div>
        </div>
        <div id="Stats">
            <img src="<?=PROJECT_FOLDER?>assets/images/img-ia.jpg" alt="img genereted by a ia">
            <div>
                <div>
                    <p>310</p>
                    <p>Partie Jouées</p>
                </div>
                <div>
                    <p>1020</p>
                    <p>Joueur Connectés</p>
                </div>
                <div>
                    <p>10 sec</p>
                    <p>Temps Record</p>
                </div>
                <div>
                    <p>21 300</p>
                    <p>Joueurs Inscrits</p>
                </div>
            </div>
        </div>
        <article id="Team">
            <h2>Notre Équipe</h2>
            <p>dolor sit amet consectetur adipisicing elit. Odio voluptas laudantium impedit pariatur voluptate debitis.
            </p>
            <img src="<?=PROJECT_FOLDER?>assets/images/Transition.png" alt="Transition image">
            <div>
                <div>
                    <div class="pp"><img src="<?=PROJECT_FOLDER?>assets/images/personne-1.jpg" alt="a person"></div>
                    <p>Hamilton</p>
                    <p>Games Developer</p>
                    <div class="reseau">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                </div>
                <div>
                    <div class="pp"><img src="<?=PROJECT_FOLDER?>assets/images/personne-2.jpg" alt="a person"></div>
                    <p>Mickhel</p>
                    <p>Games Designer</p>
                    <div class="reseau">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                </div>
                <div>
                    <div class="pp"><img src="<?=PROJECT_FOLDER?>assets/images/personne-3.gif" alt="a person"></div>
                    <p>Rick</p>
                    <p>Games Developer</p>
                    <div class="reseau">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                </div>
            </div>
        </article>
        <a href="#home" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>