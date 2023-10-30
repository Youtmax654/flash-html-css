<?php require 'utils/common.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<?php require SITE_ROOT. 'partials/head.php'; ?>
<body>
    <?php require SITE_ROOT. 'partials/header.php'; ?>
    <main>
        <div id="homeContact"></div>
        <div class="pages_banner"> <!-- Div pour la bannière des pages -->
            <h1>NOUS CONTACTER</h1>
        </div>
        <div class="contact_infos">
            <div class="info_block">
                <i class="fa-solid fa-mobile-screen mobile_phone"></i>
                <p>06 74 56 14 16</p>
            </div>
            <div class="info_block">
                <i class="fa-regular fa-envelope envelope"></i>
                <p>Oui@ceciestunmail.com</p>
            </div>
            <div class="info_block">
                <i class="fa-solid fa-location-dot location_pin"></i>
                <p>Paris</p>
            </div>
        </div>
        <div class="contact_form">
            <form action="#">
                <div class="contact_row1">
                    <label for="name"></label>
                    <input type="text" id="name" placeholder="Nom">
                    <label for="email"></label>
                    <input type="email" id="email" placeholder="Email">
                </div>
                <label for="subject"></label>
                <input type="text" id="subject" placeholder="Sujet">
                <div class="contact_">
                    <textarea placeholder="Message" cols="30" rows="10"></textarea>
                </div>
                <div class="contact_submit">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
        <a href="#homeContact" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>
