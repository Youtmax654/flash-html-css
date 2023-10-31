<?php 
    $currentPage = $_SERVER['REQUEST_URI'];
    if (session_status() === PHP_SESSION_NONE):
        if($currentPage != "/flash_memory/index.php"):
?>
<header class="header">
        <p>The Power Of Memory</p>
        <label for="ch" id="lab"></label>
        <input type="checkbox" id="ch">
        <nav class="header-right"> <!-- Navbar -->
            <ul>
                <li><a href="<?=PROJECT_FOLDER?>index.php" class="<?php echo PROJECT_FOLDER . "index.php" == $currentPage ? "current" : NULL; ?>">ACCUEIL</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php" class="<?php echo PROJECT_FOLDER . "games/memory/index.php" == $currentPage ? "current" : NULL; ?>">JEU</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/scores.php" class="<?php echo  PROJECT_FOLDER . "games/memory/scores.php" == $currentPage ? "current" : NULL; ?>">SCORES</a></li>
                <li><a href="<?=PROJECT_FOLDER?>contact.php" class="<?php echo  PROJECT_FOLDER . "contact.php" == $currentPage ? "current" : NULL; ?>">NOUS CONTACTER</a></li>
                <li><a href="<?=PROJECT_FOLDER?>login.php" class="<?php echo  PROJECT_FOLDER . "login.php" == $currentPage ? "current" : NULL; ?>">CONNEXION</a></li>
                <li><a href="<?=PROJECT_FOLDER?>register.php" class="<?php echo  PROJECT_FOLDER . "register.php" == $currentPage ? "current" : NULL; ?>">INSCRIPTION</a></li>
            </ul>
        </nav>
</header>
<?php
        else:
?>

<header class="header_index">
        <p>The Power Of Memory</p>
        <label for="ch" id="lab"></label>
        <input type="checkbox" id="ch">
        <nav class="header-right">
            <ul>
                <li><a href="<?=PROJECT_FOLDER?>index.php" class="<?php echo  PROJECT_FOLDER . "index.php" == $currentPage ? "current" : NULL; ?>">ACCUEIL</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php">JEU</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/scores.php">SCORES</a></li>
                <li><a href="<?=PROJECT_FOLDER?>contact.php">NOUS CONTACTER</a></li>
                <li><a href="<?=PROJECT_FOLDER?>login.php">CONNEXION</a></li>
                <li><a href="<?=PROJECT_FOLDER?>register.php">INSCRIPTION</a></li>
            </ul>
        </nav>
</header>
<?php   
        endif;
    else:
        if($currentPage != "/flash_memory/index.php"):
?>
<header class="header">
        <p>The Power Of Memory</p>
        <label for="ch" id="lab"></label>
        <input type="checkbox" id="ch">
        <nav class="header-right"> <!-- Navbar -->
            <ul>
                <li><a href="<?=PROJECT_FOLDER?>index.php" class="<?php echo PROJECT_FOLDER . "index.php" == $currentPage ? "current" : NULL; ?>">ACCUEIL</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php" class="<?php echo PROJECT_FOLDER . "games/memory/index.php" == $currentPage ? "current" : NULL; ?>">JEU</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/scores.php" class="<?php echo  PROJECT_FOLDER . "games/memory/scores.php" == $currentPage ? "current" : NULL; ?>">SCORES</a></li>
                <li><a href="<?=PROJECT_FOLDER?>contact.php" class="<?php echo  PROJECT_FOLDER . "contact.php" == $currentPage ? "current" : NULL; ?>">NOUS CONTACTER</a></li>
                <li><a href="<?=PROJECT_FOLDER?>myAccount.php" class="<?php echo  PROJECT_FOLDER . "myAccount.php" == $currentPage ? "current" : NULL; ?>">MON COMPTE</a></li>
                <li><a href="<?=PROJECT_FOLDER?>disconnect.php">SE DECONNECTER</a></li>
            </ul>
        </nav>
</header>
<?php
        else:
?>

<header class="header_index">
        <p>The Power Of Memory</p>
        <label for="ch" id="lab"></label>
        <input type="checkbox" id="ch">
        <nav class="header-right">
            <ul>
                <li><a href="<?=PROJECT_FOLDER?>index.php" class="<?php echo  PROJECT_FOLDER . "index.php" == $currentPage ? "current" : NULL; ?>">ACCUEIL</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php">JEU</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/scores.php">SCORES</a></li>
                <li><a href="<?=PROJECT_FOLDER?>contact.php">NOUS CONTACTER</a></li>
                <li><a href="<?=PROJECT_FOLDER?>myAccount.php">MON COMPTE</a></li>
                <li><a href="<?=PROJECT_FOLDER?>disconnect.php">SE DECONNECTER</a></li>
            </ul>
        </nav>
</header>
<?php   
        endif;       
    endif
?>