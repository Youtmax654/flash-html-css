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
        <div id="gameChoice">
           <form>
                <select name="theme" id="theme">
                    <option value="JV">Jeux Vidéo</option>
                    <option value="Fruit">Fruit</option>
                    <option value="Animaux">Animaux</option>
                </select>
                <select name="difficulty" id="difficulty">
                    <option value="1">Facile</option>
                    <option value="2">Moyen</option>
                    <option value="3">Difficile</option>
                </select>
            </form>
            <button id="submit">Submit</button> 
        </div>
        <table class="tableGame">

        </table>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
    <script src="<?= PROJECT_FOLDER . "assets/js/memory.js" ?>"></script>
</body>
</html>