<?php 
require 'utils/common.php'; 
require SITE_ROOT . 'utils/userConnexion.php';

try {
    //si les champs "contactEmail" et "contactName" sont définis dans le formulaire on récupère l'email et du pseudo 
    if (isset($_POST["contactEmail"]) && isset($_POST["contactName"])) { 
        $email = $_POST["contactEmail"];
        $name = $_POST["contactName"];

        // Vérifie si le champ "subject" est vide et définit un message d'erreur dans ce cas
        if (empty($_POST['subject'])) {
            $errorMessage = "Votre sujet est vide";
        } else {
            //idem pour message
            if (empty($_POST['message'])) {
                $errorMessage = "Votre message est vide";
            } else {
                //verif du format d'email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("Le format de l'email n'est pas valide");
                } else {
                    //formulaire soumis ?
                    if (isset($_POST["contactSubmit"])) {
                        $to = "powerofmemoryparis@gmail.com"; //email de destination
                        $subject = $_POST["subject"]; //sujet du message
                        $message = "From $name ($email)\nMessage:\n" . $_POST["message"]; //Corps du message
                        $headers = "From: powerofmemoryparis@gmail.com"; // En-tête du message
                    
                        //envoie du courier et confimation d'envoie
                        if (mail($to, $subject, $message, $headers)) {
                            $errorMessage = "Votre message a bien été envoyé. Vous aurez une réponse sous 48h.";
                        }
                    }
                }
            }
        }
    }
} catch (Exception $e) {
    $errorMessage = "Erreur : " . $e->getMessage();
}
?>

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
        <?php if(isset($errorMessage)) {
            echo "<p class='errorMessage'>$errorMessage</p>";
        } ?>
        <div class="contact_infos">
            <div class="info_block">
                <i class="fa-solid fa-mobile-screen mobile_phone"></i>
                <p>06 01 02 03 04</p>
            </div>
            <div class="info_block">
                <i class="fa-regular fa-envelope envelope"></i>
                <p>powerofmemoryparis@gmail.com</p>
            </div>
            <div class="info_block">
                <i class="fa-solid fa-location-dot location_pin"></i>
                <p>Paris</p>
            </div>
        </div>
        <div class="contact_form">
            <form method="post">
                <div class="contact_row1">
                    <label for="contactName"></label>
                    <input type="text" name="contactName" placeholder="Nom">
                    <label for="contactEmail"></label>
                    <input type="email" name="contactEmail" placeholder="Email" required="required">
                </div>
                <label for="subject"></label>
                <input type="text" name="subject" placeholder="Sujet" required="required">
                <div class="contact_">
                    <textarea placeholder="Message" name="message" cols="30" rows="10" required="required"></textarea>
                </div>
                <div class="contact_submit">
                    <input type="submit" name="contactSubmit" value="Envoyer">
                </div>
            </form>
        </div>
        <a href="#homeContact" class="returnHome"></a>
    </main>
    <?php require SITE_ROOT. 'partials/footer.php';?>
</body>
</html>