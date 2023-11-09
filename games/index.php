<?php
require '../utils/common.php';
require SITE_ROOT . 'utils/database.php';
$pdo = connectToDbAndGetPdo();
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT . 'chat.php'; ?>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>JEU</h1>
        </div>
        <div class="gameSelect">
            <button onclick="location.href='memory/index.php'">Memory</button>
            <button onclick="location.href='2048/index.php'">2048</button>
        </div>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
    <script src="<?= PROJECT_FOLDER . "assets/js/memory.js" ?>"></script>
    <script src="<?= PROJECT_FOLDER . "assets/js/chat.js" ?>"></script>
</body>

</html>