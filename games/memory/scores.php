<?php require '../../utils/common.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="homeScores"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>SCORES</h1>
        </div>
        <div class="scores_table">
            <table>
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Pseudo</td>
                        <td>Difficulté</td>
                        <td>Score</td>
                        <td>Date et heure</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maxime</td>
                        <td>Youtmax</td>
                        <td>3</td>
                        <td>0.01 sec</td>
                        <td>18/10/2023 à 17h23</td>
                    </tr>
                    <tr>
                        <td>Killian</td>
                        <td>Lomudru</td>
                        <td>3</td>
                        <td>0.02 sec</td>
                        <td>18/10/2023 à 19h39</td>
                    </tr>
                    <tr>
                        <td>Charles</td>
                        <td>Charles.zbr</td>
                        <td>3</td>
                        <td>0.03 sec</td>
                        <td>17/10/2023 à 12h34</td>
                    </tr>
                    <tr>
                        <td>Rick</td>
                        <td>R.Astley</td>
                        <td>3</td>
                        <td>10 sec</td>
                        <td>29/10/2009 à 09h00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="#homeScores" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>

</html>