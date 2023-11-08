<?php
require '../../utils/common.php';
require SITE_ROOT . 'utils/database.php';

// Récupération de l'userId du joueur connecté
$connectedUsersId = isset($_SESSION['userId']) ? $_SESSION['userId'] : NULL;

$pdo = connectToDbAndGetPdo();

// Requête SQL pour récupérer les scores des utilisateurs
$pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
                               DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                               FROM scores
                               INNER JOIN game
                               ON scores.gameId = game.gameId
                               INNER JOIN users
                               ON scores.usersId = users.usersId
                               ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
$pdoStatement->execute();
$scores = $pdoStatement->fetchAll();
// if (isset($_POST['gameId']) && isset($_POST['searchValue']) && isset($_POST['gameDifficulty'])) {
//     $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
//                                    DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
//                                    FROM scores
//                                    INNER JOIN game
//                                    ON scores.gameId = game.gameId
//                                    INNER JOIN users
//                                    ON scores.usersId = users.usersId
//                                    WHERE gameId = :gameId
//                                    AND usersPseudo LIKE "%:searchValue%"
//                                    AND scoresDifficulty = :scoresDifficulty
//                                    ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
//     $pdoStatement->execute([
//         ':gameId' => $_POST['gameId'],
//         ':searchValue' => $_POST['searchValue'],
//         ':scoresDifficulty' => $_POST['gameDifficulty']
//     ]);
//     $scores = $pdoStatement->fetchAll();
// }  else
if (isset($_POST['gameId'])) {
    $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
                                   DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                                   FROM scores
                                   INNER JOIN game
                                   ON scores.gameId = game.gameId
                                   INNER JOIN users
                                   ON scores.usersId = users.usersId
                                   WHERE gameId = :gameId
                                   ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
    $pdoStatement->execute([
        ':gameId' => $_POST['gameId'],
    ]);
    $scores = $pdoStatement->fetchAll();
} elseif (isset($_GET['searchValue'])) {
    $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
                                   DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                                   FROM scores
                                   INNER JOIN game
                                   ON scores.gameId = game.gameId
                                   INNER JOIN users
                                   ON scores.usersId = users.usersId
                                   WHERE usersPseudo LIKE "%":searchValue"%"
                                   ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
    $pdoStatement->execute([
        ':searchValue' => $_GET['searchValue'],
    ]);
    $scores = $pdoStatement->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT . 'partials/head.php'; ?>

<body>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div id="homeScores"></div>
        <div class="pages_banner">
            <h1>SCORES</h1>
        </div>

        <?php
        // Récupération de la variable GET 'scoresSearch' pour effectuer une recherche
        if (isset($_GET['scoresSearch'])) {
            $scoresSearch = $_GET['scoresSearch'];
            // Requête SQL pour rechercher des scores en fonction de la recherche
            $scoresSearchResult = $pdo->query('SELECT usersPseudo, gameName, `scoresDifficulty`, `scoresPoints`, users.usersId,
                                               DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                                               FROM `scores`
                                               INNER JOIN game
                                               ON scores.gameId = game.gameId
                                               INNER JOIN users
                                               ON scores.usersId = users.usersId
                                               WHERE usersPseudo LIKE "%' . $scoresSearch . '%"
                                               ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC
                                               LIMIT 10');
            $scores = $scoresSearchResult->fetchAll();
        }
        ?>
        <div class="scores_table">
            <table>
                <thead>
                    <tr>
                        <td>
                            <button onclick="gameDropdown()" class="dropbtn">Jeu<i class="fa fa-chevron-down"></i></button>
                            <div id="gameDropdown" class="dropdown-content">
                                <button onclick="firstGame()" class="dropcontentbtn">Power of Memory</button>
                                <button onclick="secondGame()" class="dropcontentbtn">2048</button>
                            </div>
                        </td>
                        <td>
                            <button onclick="pseudoDropdown()" class="dropbtn">Pseudo<i class="fa fa-chevron-down"></i></button>
                            <div id="pseudoDropdown" class="dropdown-content">
                                <input type="search" onkeyup="pseudoSearch()" name="scoresSearch" id="scoresSearch" class="scoresSearch" placeholder="Recherche...">
                            </div>
                        </td>
                        <td>
                            <button onclick="difficultyDropdown()" class="dropbtn">Difficulté<i class="fa fa-chevron-down"></i></button>
                            <div id="difficultyDropdown" class="dropdown-content">
                                <button onclick="easyDifficulty()" class="dropcontentbtn">Facile</button>
                                <button onclick="mediumDifficulty()" class="dropcontentbtn">Moyen</button>
                                <button onclick="hardDifficulty()" class="dropcontentbtn">Difficile</button>
                            </div>
                        </td>
                        <td>Score</td>
                        <td>Date et heure</td>
                    </tr>
                </thead>
                <tbody>
                    <div id="scoresTable">
                        <?php foreach ($scores as $score) : ?>
                            <tr style="<?= $connectedUsersId == $score->usersId ? 'background-color: rgba(22, 17, 60, 255); color: white;' : ''; ?>">
                                <td><?= $score->gameName ?></td>
                                <td><?= $score->usersPseudo ?></td>
                                <td><?= $score->scoresDifficulty == 1 ? "Facile" : ($score->scoresDifficulty == 2 ? "Moyen" : "Difficile") ?></td>
                                <td><?= $score->scoresPoints > 5999 ? floor($score->scoresPoints / 6000) . " min et " . number_format($score->scoresPoints % 6000 / 100, 2) . " sec" : number_format($score->scoresPoints / 100, 2) . " sec" ?></td>
                                <td><?= $score->DateScores ?></td>
                            </tr>
                        <?php endforeach ?>
                    </div>
                </tbody>
            </table>
        </div>
        <a href="#homeScores" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
</body>

</html>