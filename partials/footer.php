<footer>
        <!-- Divisons du footer en deux parites pour pouvoir mettre en colonne le footer avec la ligne du copyright-->
        <div class="footer-body"> <!--section pour la parite principale du footer-->
            <!-- Séparation du footer-body en deux parties -->
            <div class="Informations"> <!-- Création de la partie informations -->
                <div class="Titre">
                    <p><strong>Informations</strong></p>
                </div> <!-- classe titre qui permettra d'isoler le titre pour le modifier seul -->
                <p>Lorem ipsum, dolor sit amet consectetur.</p>

                <div class="Tel"> <!-- classe pour contacter par téléphone -->
                    <p><strong>Tel : </strong>06 74 56 14 16</p>
                </div>

                <div class="Email"> <!-- classe pour contacter par email -->
                    <p><strong>Email : </strong>Oui@ceciestunmail.com</p>
                </div>

                <div class="Location"> <!-- classe pour savoir la localisation de l'entreprise -->
                    <p><strong>Location : </strong>Paris</p>
                </div>

                <div class="Images"> <!-- classe pour insérer les logos de réseaux sociaux -->
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-google"></i>
                    <i class="fa-brands fa-pinterest-p"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>

            <div class="PowerOfMemory"> <!-- classe pour la partie liens-->
                <div class="Titre">
                    <p><Strong>Power Of Memory</Strong></p>
                </div> <!-- classe pour isoler le titre pour le modifier seul -->
                <ul class="Liste"> <!-- classe pour faire la liste des liens -->
                    <li><a href="<?=PROJECT_FOLDER?>games/index.php">Jouer !</a></li>
                    <li><a href="<?=PROJECT_FOLDER?>games/scores.php">Les scores</a></li>
                    <li><a href="<?=PROJECT_FOLDER?>contact.php">Nous contacter</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom"> <!-- section pour insérer la ligne de copyright -->
            <span> Copyright © 2023 Tous droits reservés </span>
        </div>
    </footer>
    <script src="<?=PROJECT_FOLDER?>assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/1f0991f3fc.js" crossorigin="anonymous"></script>