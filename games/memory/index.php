<?php
require '../../utils/common.php';

require SITE_ROOT . 'utils/database.php';
$pdo = connectToDbAndGetPdo();

// Envoie des données vers la base de données
if (isset($_POST['usersMemoryScores'])) {
    $usersMemoryScores = $_POST['usersMemoryScores'];
    $memoryDifficulty = $_POST['memoryDifficulty'];
    $getUsersScore = $pdo->prepare("SELECT scoresPoints FROM scores
                                    WHERE usersId = :usersId 
                                    AND gameId = :gameId 
                                    AND scoresDifficulty = :scoresDifficulty;");
    $getUsersScore->execute([
        ':usersId' => $_SESSION['userId'],
        ':gameId' => 1,
        ':scoresDifficulty' => $memoryDifficulty,
    ]);
    $actualUsersScore = $getUsersScore->fetch();

    echo $getUsersScore->rowCount();
    if ($getUsersScore->rowCount() === 1) {
        if ($actualUsersScore->scoresPoints > $usersMemoryScores) {
            $updateScores = $pdo->prepare("UPDATE scores SET scoresPoints = :scoresPoints, scoresDate = DEFAULT
                                       WHERE usersId = :usersId 
                                       AND gameId = :gameId 
                                       AND scoresDifficulty = :scoresDifficulty");
            $updateScores->execute([
                ':scoresPoints' => $usersMemoryScores,
                ':usersId' => $_SESSION['userId'],
                ':gameId' => 1,
                ':scoresDifficulty' => $memoryDifficulty,
            ]);
        }
    } elseif ($getUsersScore->rowCount() === 0) {
        $insertScores = $pdo->prepare("INSERT INTO scores (`usersId`,`gameId`,`scoresDifficulty`,`scoresPoints`)
                                       VALUES (:usersId, :gameId, :scoresDifficulty, :scoresPoints)");
        $insertScores->execute([
            ':scoresPoints' => $usersMemoryScores,
            ':usersId' => $_SESSION['userId'],
            ':gameId' => 1,
            ':scoresDifficulty' => $memoryDifficulty,
        ]);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT . 'partials/head.php'; ?>

<body>
    <?php require SITE_ROOT . 'chat.php'; ?>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>MEMORY</h1>
        </div>
        <div id="timer">00:00:00</div>
        <div id="popup" class="popup">
            <h1>Bien joué !</h1>
            <h2><span id="score">0</span></h2>
            <button onclick="location.href = '../scores.php'">Scores</button>
            <button onclick="replayMemory()">Rejouer</button>
            <button onclick="location.href = '../index.php'">Jeu</button>
        </div>
        <div id="gameChoice">
            <form>
                <div id="themeSelect">
                    <label for="theme">Thème :</label>
                    <select name="theme" id="theme">
                        <option value="JV">Jeux Vidéo</option>
                        <option value="Fruit">Fruit</option>
                        <option value="Animaux">Animaux</option>
                    </select>
                </div>
                <div id="difficultySelect">
                    <label for="difficulty">Difficulté :</label>
                    <select name="difficulty" id="difficulty">
                        <option value="1">Facile</option>
                        <option value="2">Moyen</option>
                        <option value="3">Difficile</option>
                    </select>
                </div>
            </form>
            <button id="submitGame">Submit</button>
        </div>
        <table class="tableGame">

        </table>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
    <script src="<?= PROJECT_FOLDER . "assets/js/memory.js" ?>"></script>
    <script src="<?= PROJECT_FOLDER . "assets/js/chat.js" ?>"></script>
</body>

</html>