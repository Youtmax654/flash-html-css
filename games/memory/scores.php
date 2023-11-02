<?php require '../../utils/common.php';
require SITE_ROOT . 'utils/database.php';
if (isset($_SESSION['userId'])) {
    $connectedUsersId = $_SESSION['userId'];
} else {
    $connectedUsersId = NULL;
}
$pdo = connectToDbAndGetPdo();
$pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
                               DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                               FROM scores
                               INNER JOIN game
                               ON scores.gameId = game.gameId
                               INNER JOIN users
                               ON scores.usersId = users.usersId
                               ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC
                               LIMIT 10');
$pdoStatement->execute();
$scores = $pdoStatement->fetchAll(); ?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT . 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT . 'partials/header.php'; ?>
    <main>
        <div id="homeScores"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>SCORES</h1>
        </div>
        <?php 
            if (isset($_GET['scoresSearch'])) {
                $scoresSearch = $_GET['scoresSearch'];
                $scoresSearchResult = $pdo->query('SELECT usersPseudo, gameName, `scoresDifficulty`, `scoresPoints`, users.usersId,
                                                   DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                                                   FROM `scores`
                                                   INNER JOIN game
                                                   ON scores.gameId = game.gameId
                                                   INNER JOIN users
                                                   ON scores.usersId = users.usersId
                                                   WHERE usersPseudo LIKE "%'.$scoresSearch.'%"
                                                   ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC
                                                   LIMIT 10');
                $scores = $scoresSearchResult->fetchAll();
            }
        ?>
        <form method="get" class="scoresSearchBar">
            <input type="search" name="scoresSearch" id="scoresSearch" placeholder="Recherche..."
            style="width: 50vw; margin:2vw">
            <input type="submit" value="Rechercher">
        </form>
        <div class="scores_table">
            <table>
                <thead>
                    <tr>
                        <td>Jeu</td>
                        <td>Pseudo</td>
                        <td>Difficulté</td>
                        <td>Score</td>
                        <td>Date et heure</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($scores as $score) :
                        if ($connectedUsersId == $score->usersId) : ?>
                            <tr style="background-color: rgba(22, 17, 60, 255);
                                       color: white;">
                                <td><?= $score->gameName ?></td>
                                <td><?= $score->usersPseudo ?></td>
                                <td><?= $score->scoresDifficulty ?></td>
                                <td><?= number_format($score->scoresPoints / 1000, 2) . " sec" ?></td>
                                <td><?= $score->DateScores ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td><?= $score->gameName ?></td>
                                <td><?= $score->usersPseudo ?></td>
                                <td><?= $score->scoresDifficulty ?></td>
                                <td><?= number_format($score->scoresPoints / 1000, 2) . " sec" ?></td>
                                <td><?= $score->DateScores ?></td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <a href="#homeScores" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT . 'partials/footer.php'; ?>
</body>
</html>