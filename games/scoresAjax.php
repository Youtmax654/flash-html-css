<?php
require '../utils/common.php';
require SITE_ROOT . 'utils/database.php';
$pdo = connectToDbAndGetPdo();
$connectedUsersId = isset($_SESSION['userId']) ? $_SESSION['userId'] : NULL;
// if (isset($_POST['gameId'], $_POST['searchValue'], $_POST['gameDifficulty'])) {
//     $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
//                                    DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
//                                    FROM scores
//                                    INNER JOIN game
//                                    ON scores.gameId = game.gameId
//                                    INNER JOIN users
//                                    ON scores.usersId = users.usersId
//                                    WHERE game.gameId = :gameId
//                                    AND usersPseudo LIKE LIKE "%":searchValue"%"
//                                    AND scoresDifficulty = :scoresDifficulty
//                                    ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
//     $pdoStatement->execute([
//         ':gameId' => $_POST['gameId'],
//         ':searchValue' => $_POST['searchValue'],
//         ':scoresDifficulty' => $_POST['gameDifficulty'],
//     ]);
//     $scores = $pdoStatement->fetchAll();
// }
// if (isset($_POST['gameId'], $_POST['searchValue'])) {
//     $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
//                                    DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
//                                    FROM scores
//                                    INNER JOIN game
//                                    ON scores.gameId = game.gameId
//                                    INNER JOIN users
//                                    ON scores.usersId = users.usersId
//                                    WHERE game.gameId = :gameId
//                                    AND usersPseudo LIKE LIKE "%":searchValue"%"
//                                    ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
//     $pdoStatement->execute([
//         ':gameId' => $_POST['gameId'],
//         ':searchValue' => $_POST['searchValue'],
//         ':scoresDifficulty' => $_POST['gameDifficulty'],
//     ]);
//     $scores = $pdoStatement->fetchAll();
// }
// if (isset($_POST['gameId'], $_POST['gameDifficulty'])) {
//     $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
//                                    DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
//                                    FROM scores
//                                    INNER JOIN game
//                                    ON scores.gameId = game.gameId
//                                    INNER JOIN users
//                                    ON scores.usersId = users.usersId
//                                    WHERE game.gameId = :gameId
//                                    AND scoresDifficulty = :scoresDifficulty
//                                    ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
//     $pdoStatement->execute([
//         ':gameId' => $_POST['gameId'],
//         ':searchValue' => $_POST['searchValue'],
//         ':scoresDifficulty' => $_POST['gameDifficulty'],
//     ]);
//     $scores = $pdoStatement->fetchAll();
// }
// if (isset($_POST['searchValue'], $_POST['gameDifficulty'])) {
//     $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
//                                    DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
//                                    FROM scores
//                                    INNER JOIN game
//                                    ON scores.gameId = game.gameId
//                                    INNER JOIN users
//                                    ON scores.usersId = users.usersId
//                                    WHERE game.gameId = :gameId
//                                    AND scoresDifficulty = :scoresDifficulty
//                                    ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
//     $pdoStatement->execute([
//         ':gameId' => $_POST['gameId'],
//         ':searchValue' => $_POST['searchValue'],
//         ':scoresDifficulty' => $_POST['gameDifficulty'],
//     ]);
//     $scores = $pdoStatement->fetchAll();
// }
if (isset($_POST['gameId'])) {
    $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
                                   DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                                   FROM scores
                                   INNER JOIN game
                                   ON scores.gameId = game.gameId
                                   INNER JOIN users
                                   ON scores.usersId = users.usersId
                                   WHERE game.gameId = :gameId
                                   ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
    $pdoStatement->execute([
        ':gameId' => $_POST['gameId'],
    ]);
    $scores = $pdoStatement->fetchAll();
}
if (isset($_POST['searchValue'])) {
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
        ':searchValue' => $_POST['searchValue'],
    ]);
    $scores = $pdoStatement->fetchAll();
}
if (isset($_POST['gameDifficulty'])) {
    $pdoStatement = $pdo->prepare('SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints, users.usersId,
                                   DATE_FORMAT(scoresDate, "%d/%m/%Y à %Hh%i") AS DateScores
                                   FROM scores
                                   INNER JOIN game
                                   ON scores.gameId = game.gameId
                                   INNER JOIN users
                                   ON scores.usersId = users.usersId
                                   WHERE scoresDifficulty = :scoresDifficulty
                                   ORDER BY gameName ASC, scoresDifficulty DESC, scoresPoints ASC');
    $pdoStatement->execute([
        ':scoresDifficulty' => $_POST['gameDifficulty'],
    ]);
    $scores = $pdoStatement->fetchAll();
}
?>
<?php foreach ($scores as $score) : ?>
    <tr style="<?= $connectedUsersId == $score->usersId ? 'background-color: rgba(22, 17, 60, 255); color: white;' : ''; ?>">
        <td><?= $score->gameName ?></td>
        <td><?= $score->usersPseudo ?></td>
        <td><?= $score->scoresDifficulty == 1 ? "Facile" : ($score->scoresDifficulty == 2 ? "Moyen" : "Difficile") ?></td>
        <td><?= $score->scoresPoints > 5999 ? floor($score->scoresPoints / 6000) . " min et " . number_format($score->scoresPoints % 6000 / 100, 2) . " sec" : number_format($score->scoresPoints / 100, 2) . " sec" ?></td>
        <td><?= $score->DateScores ?></td>
    </tr>
<?php endforeach ?>