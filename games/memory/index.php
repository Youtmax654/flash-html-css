<?php 
require '../../utils/common.php'; 
require SITE_ROOT . 'utils/userConnexion.php';

// Vérification si l'utilisateur est déjà connecté en vérifiant la présence de la variable de session 'userId', si oui -> redirection 
if (!isset($_SESSION['userId'])) { 
    header("Location: ".PROJECT_FOLDER."login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'chat.php'; ?>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>JEU</h1>
        </div>
        
        <div id="timer">00:00:00</div>
        <table class="tableGame">
            <tr>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/osu" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/osu" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/csgo.png" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/csgo.png" alt="face de la carte">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/valorant.jpg" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/valorant.jpg" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/overwatch.jpg" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/overwatch.jpg" alt="face de la carte">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/minecraft.png" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/minecraft.png" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/lol.jpg" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/lol.jpg" alt="face de la carte">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/fortnite.png" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/fortnite.png" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/assassin.png" alt="face de la carte">
                    </div>
                </td>
                <td class="card">
                    <div class="frontCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte">
                    </div>
                    <div class="backCard">
                        <img src="<?=PROJECT_FOLDER?>assets/images/jeux-videos/assassin.png" alt="face de la carte">
                    </div>
                </td>
            </tr>
        </table>
        <table class="tableGame hidden">
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
        </table>
        <table class="tableGame hidden" id="big">
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
            <tr>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
                <td class="card"><img src="<?=PROJECT_FOLDER?>assets/images/carte.png" alt="dos de carte"></td>
            </tr>
        </table>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
    <script src="../../assets/js/memory.js"></script>
</body>
</html>