<?php $currentPage = $_SERVER['REQUEST_URI']; ?>
 
<header class="<?= $currentPage == "/flash_memory/index.php" ? 'header_index' : 'header' ?>">
    <p>The Power Of Memory</p>
    <label for="ch" id="lab"></label>
    <input type="checkbox" id="ch">
    <nav class="header-right">
        <ul>
            <li><a href="<?= PROJECT_FOLDER ?>index.php" class="<?php echo PROJECT_FOLDER . "index.php" == $currentPage ? "current" : NULL; ?>">ACCUEIL</a></li>
            <li><a href="<?= PROJECT_FOLDER ?>games/memory/scores.php" class="<?php echo  PROJECT_FOLDER . "games/memory/scores.php" == $currentPage ? "current" : NULL; ?>">SCORES</a></li>
            <li><a href="<?= PROJECT_FOLDER ?>contact.php" class="<?php echo  PROJECT_FOLDER . "contact.php" == $currentPage ? "current" : NULL; ?>">NOUS CONTACTER</a></li>
            <?php if (!isset($_SESSION['userId'])) : ?>
                <li><a href="<?= PROJECT_FOLDER ?>login.php" class="<?php echo  PROJECT_FOLDER . "login.php" == $currentPage ? "current" : NULL; ?>">CONNEXION</a></li>
                <li><a href="<?= PROJECT_FOLDER ?>register.php" class="<?php echo  PROJECT_FOLDER . "register.php" == $currentPage ? "current" : NULL; ?>">INSCRIPTION</a></li>
            <?php else : ?>
                <li><a href="<?= PROJECT_FOLDER ?>games/memory/index.php" class="<?php echo PROJECT_FOLDER . "games/memory/index.php" == $currentPage ? "current" : NULL; ?>">JEU</a></li>
                <li><a href="<?= PROJECT_FOLDER ?>myAccount.php" class="<?php echo  PROJECT_FOLDER . "myAccount.php" == $currentPage ? "current" : NULL; ?>"><?= strtoupper($_SESSION["userName"]) ?></a></li>
                <li><a href="<?= PROJECT_FOLDER ?>disconnect.php" onclick="return confirm('Vous allez être déconnecté')">SE DECONNECTER</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>