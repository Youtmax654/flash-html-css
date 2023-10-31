<?php 
    $current = $_SERVER['REQUEST_URI'];
    if($current != "/flash_memory/index.php"):
?>
<header class="header">
        <p>The Power Of Memory</p>
        <label for="ch" id="lab"></label>
        <input type="checkbox" id="ch">
        <nav class="header-right"> <!-- Navbar -->
            <ul>
                <li><a href="<?=PROJECT_FOLDER?>index.php">ACCUEIL</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php">JEU</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/scores.php">SCORES</a></li>
                <li><a href="<?=PROJECT_FOLDER?>contact.php">NOUS CONTACTER</a></li>
                <li><a href="<?=PROJECT_FOLDER?>login.php">CONNEXION</a></li>
                <li><a href="<?=PROJECT_FOLDER?>register.php">INSCRIPTION</a></li>
                <li><a href="<?=PROJECT_FOLDER?>myAccount.php">MON COMPTE</a></li>
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
                <li><a href="<?=PROJECT_FOLDER?>index.php">ACCUEIL</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/index.php">JEU</a></li>
                <li><a href="<?=PROJECT_FOLDER?>games/memory/scores.php">SCORES</a></li>
                <li><a href="<?=PROJECT_FOLDER?>contact.php">NOUS CONTACTER</a></li>
                <li><a href="<?=PROJECT_FOLDER?>login.php">CONNEXION</a></li>
                <li><a href="<?=PROJECT_FOLDER?>register.php">INSCRIPTION</a></li>
                <li><a href="<?=PROJECT_FOLDER?>myAccount.php">MON COMPTE</a></li>
            </ul>
        </nav>
</header>
<?php endif ?>