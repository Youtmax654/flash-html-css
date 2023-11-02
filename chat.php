<?php
require 'utils/common.php';
$catApi = json_decode(file_get_contents("https://api.thecatapi.com/v1/images/search?mime_types=gif"))[0];
?>
<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT . 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div id="homeAccount"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>CHAT</h1>
        </div>
        <img src="<?= $catApi->url ?>" alt="a cute cat" class="cuteCat">
        <a href="#homeAccount" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
</body>

</html>