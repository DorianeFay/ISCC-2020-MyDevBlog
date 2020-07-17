<!DOCTYPE html>
<html>
<head>
    <title>Book - Doriane Fay</title>
    <link rel="stylesheet" href="front.css">
</head>
<header>
    <h1>Book - Doriane Fay </h1>
</header>
<nav>
        <a href="front.php?page=1">Accueil</a>
        <a href="front.php?page=2">Mes articles</a>
        <a href="front.php?page=3">Mon CV</a>
        <a href="front.php?page=4">Me contacter</a>

    </nav>

    <body>
        <?php
        if (!isset($_GET['page']))
            $_GET['page'] = 1;
        if ($_GET['page'] == "1")
            include 'vitrine-accueil.php';
        elseif ($_GET['page'] == "2")
            include 'vitrine-articles.php';
        elseif ($_GET['page'] == "article")
            include 'afficher-article.php';
        elseif ($_GET['page'] == "3")
            include 'cv.html';
        elseif ($_GET['page'] == "4")
            include 'vitrine-contact.html';
        elseif ($_GET['page'] == "")
            include ("admin.php");
    else
        include ("404.php");
?>

<footer>
    <div class="reseaux">
        <a  href="https://www.linkedin.com/in/doriane-fay-46005b148/" 
        target="_blank">
            <img class="reseaux1" src="assets/logo-linkedin.png">
        </a>
        <a  href="https://www.instagram.com/dorianefay/"
        target="_blank">
            <img class="reseaux1" src="assets/logo-instagram.png">
        </a>
        <a href="https://github.com/DorianeFay"
        target="_blank">
            <img class="reseaux2" src="assets/logo-github.png">
        </a>
        <a class="admi" href="connexion.html">Administrateur</a>
</div>
    </footer>
</html>