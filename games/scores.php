<?php
require '../utils/common.php';
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
?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT . 'partials/head.php'; ?>
<script src="<?=PROJECT_FOLDER?>assets/js/scores.js"></script>
<body>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div id="homeScores"></div>
        <div class="pages_banner">
            <h1>SCORES</h1>
        </div>
        <div class="scores_table">
            <table>
                <thead>
                    <tr>
                        <td>
                            <button id="gameDropdownBtn" class="dropbtn">Jeu<i class="fa fa-chevron-down game"></i></button>
                            <div id="gameDropdown" class="dropdown-content">
                                <button id="firstGame" class="dropcontentbtn">Power of Memory</button>
                                <button id="secondGame" class="dropcontentbtn">2048</button>
                            </div>
                        </td>
                        <td>
                            <button id="pseudoDropdownBtn" class="dropbtn">Pseudo<i class="fa fa-chevron-down pseudo"></i></button>
                            <div id="pseudoDropdown" class="dropdown-content">
                                <input type="search" name="scoresSearch" id="scoresSearch" class="scoresSearch" placeholder="Recherche...">
                            </div>
                        </td>
                        <td>
                            <button id="difficultyDropdownBtn" class="dropbtn">Difficulté<i class="fa fa-chevron-down difficulty"></i></button>
                            <div id="difficultyDropdown" class="dropdown-content">
                                <button id="easyDifficulty" class="dropcontentbtn">Facile</button>
                                <button id="mediumDifficulty" class="dropcontentbtn">Moyen</button>
                                <button id="hardDifficulty" class="dropcontentbtn">Difficile</button>
                            </div>
                        </td>
                        <td>Score</td>
                        <td>Date et heure</td>
                    </tr>
                </thead>
                <tbody id="scoresTable">
                    <?php foreach ($scores as $score) : ?>
                        <tr style="<?= $connectedUsersId == $score->usersId ? 'background-color: rgba(22, 17, 60, 255); color: white;' : ''; ?>">
                            <td><?= $score->gameName ?></td>
                            <td><?= $score->usersPseudo ?></td>
                            <td><?= $score->scoresDifficulty == 1 ? "Facile" : ($score->scoresDifficulty == 2 ? "Moyen" : "Difficile") ?></td>
                            <td> <?php if($score->gameName === "Power of Memory") {
                                echo $score->scoresPoints > 5999 ? floor($score->scoresPoints / 6000) . " min et " . number_format($score->scoresPoints % 6000 / 100, 2) . " sec" : number_format($score->scoresPoints / 100, 2) . " sec";
                            } elseif($score->gameName === "2048") {
                                echo $score->scoresPoints;
                            } ?>
                            </td>
                            <td><?= $score->DateScores ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="#homeScores" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
</body>

</html>