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