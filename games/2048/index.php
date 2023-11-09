<?php 
require '../../utils/common.php'; 
require SITE_ROOT . 'utils/userConnexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'chat.php'; ?>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>2048</h1>
        </div>
        <div id="gameChoice2048">
           <form>
                <select name="difficulty" id="difficulty2048">
                    <option value="1">Facile (3X3)</option>
                    <option value="2">Moyen (4X4)</option>
                    <option value="3">Difficile (5X5)</option>
                </select>
            </form>
            <button id="submitGame2048">Submit</button> 
        </div>
        <p id="score"></p>
        <table id="tableGame2048">
            
        </table>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
    <script src="<?= PROJECT_FOLDER . "assets/js/2048.js" ?>"></script>
    <script src="<?= PROJECT_FOLDER . "assets/js/chat.js" ?>"></script>
</body>
</html>