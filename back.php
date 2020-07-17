<!DOCTYPE html>
<html>
<link rel="stylesheet" href="front.css">
<head>
    <title>Administration</title>
</head>
<header>
    <h1>Administration </h1>
</header>
<nav>
        <a href="back.php?page=2">Ajouter un article</a>
        <a href="back.php?page=3">Ajouter un utilisateur</a>
        <a href="back.php?page=4">Utilisateurs</a>
<?php
    session_start();
    if (isset($_SESSION['id']))
        echo ("<a href='back.php?page=5'>Admin</a>");
?>
    </nav>

    <body>
        <?php
        if (!isset($_GET['page']))
            $_GET['page'] = 1;
        if ($_GET['page'] == "1")
            include 'connexion.html';
        elseif ($_GET['page'] == "2")
            include 'ajout-article.html';
        elseif ($_GET['page'] == "3")
            include 'ajout-utilisateur.html';
        elseif ($_GET['page'] == "4")
            include 'utilisateurs.php';
        elseif ($_GET['page'] == "")
            include ("admin.php");
    else
        include ("404.php");
?>
<footer>
    <div class="reseaux">
     <a class="reseaux2" href="front.php?page=1">Retour accueil blog</a>
</div>
    </footer>
</html>