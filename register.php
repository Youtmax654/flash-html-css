<?php require 'utils/common.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="homeRegister"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>INSCRIPTION</h1>
        </div>
        <div class="register_form"> <!-- Div pour le formulaire de connexion-->
            <form action="#">
                <label for="email_register"></label>
                <input type="email" id="email_register" placeholder="Email">
                <label for="pseudo_register"></label>
                <input type="text" id="pseudo_register" placeholder="Pseudo">
                <label for="password_register"></label>
                <input type="password" id="password_register" placeholder="Mot de passe">
                <label for="check_register"></label>
                <input type="password" id="check_register" placeholder="Confirmer le mot de passe">
                <input type="submit" value="Inscription">

            </form>
        </div>
        <a href="#homeRegister" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>