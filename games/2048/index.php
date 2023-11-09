<?php
require '../../utils/common.php';
require SITE_ROOT . 'utils/database.php';

$pdo = connectToDbAndGetPdo();

// Vérification si l'utilisateur est déjà connecté en vérifiant la présence de la variable de session 'userId', si oui -> redirection 
if (!isset($_SESSION['userId'])) {
    header("Location: " . PROJECT_FOLDER . "login.php");
}
// Envoie des données vers la base de données
if (isset($_POST['users2048Scores'])) {
    $users2048Scores = $_POST['users2048Scores'];
    $game2048Difficulty = $_POST['game2048Difficulty'];
    $getUsersScore = $pdo->prepare("SELECT scoresPoints FROM scores
                                    WHERE usersId = :usersId 
                                    AND gameId = :gameId 
                                    AND scoresDifficulty = :scoresDifficulty;");
    $getUsersScore->execute([
        ':usersId' => $_SESSION['userId'],
        ':gameId' => 2,
        ':scoresDifficulty' => $game2048Difficulty,
    ]);
    $actualUsersScore = $getUsersScore->fetch();

    echo $getUsersScore->rowCount();
    if ($getUsersScore->rowCount() === 1) {
        if ($actualUsersScore->scoresPoints > $users2048Scores) {
            $updateScores = $pdo->prepare("UPDATE scores SET scoresPoints = :scoresPoints, scoresDate = DEFAULT
                                       WHERE usersId = :usersId 
                                       AND gameId = :gameId 
                                       AND scoresDifficulty = :scoresDifficulty");
            $updateScores->execute([
                ':scoresPoints' => $users2048Scores,
                ':usersId' => $_SESSION['userId'],
                ':gameId' => 2,
                ':scoresDifficulty' => $game2048Difficulty,
            ]);
        }
    } elseif ($getUsersScore->rowCount() === 0) {
        $insertScores = $pdo->prepare("INSERT INTO scores (`usersId`,`gameId`,`scoresDifficulty`,`scoresPoints`)
                                       VALUES (:usersId, :gameId, :scoresDifficulty, :scoresPoints)");
        $insertScores->execute([
            ':scoresPoints' => $users2048Scores,
            ':usersId' => $_SESSION['userId'],
            ':gameId' => 2,
            ':scoresDifficulty' => $game2048Difficulty,
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
            <h1>2048</h1>
        </div>
        <div id="popup" class="popup">
            <h1>La partie est terminé !</h1>
            <h2><span id="score">0</span></h2>
            <button onclick="location.href = '../scores.php'">Scores</button>
            <button onclick="restartGame()">Rejouer</button>
            <button onclick="location.href = '../index.php'">Jeu</button>
        </div>
        <div id="gameChoice2048">
            <form>
                <select name="difficulty" id="difficulty2048">
                    <option value="3">Facile (5x5)</option>
                    <option value="2">Moyen (4x4)</option>
                    <option value="1">Difficile (3x3)</option>
                </select>
            </form>
            <button id="submitGame2048">Submit</button>
        </div>
        <p id="score"></p>
        <table id="tableGame2048">

        </table>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
    <script src="<?= PROJECT_FOLDER . "assets/js/2048.js" ?>"></script>
    <script src="<?= PROJECT_FOLDER . "assets/js/chat.js" ?>"></script>
</body>

</html>