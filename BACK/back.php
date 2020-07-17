<!DOCTYPE html>
<html>
<header>
    <nav>
        <a href="back.php?page=1">Connexion</a>
        <a href="back.php?page=2">Ajouter un article</a>
        <a href="back.php?page=3">Ajouter un utilisateur</a>
        <a href="back.php?page=4">Utilisateurs</a>
<?php
    session_start();
    if (isset($_SESSION['id']))
        echo ("<a href='back.php?page=5'>Admin</a>");
?>
    </nav>
    <h1>Doriane Fay </h1>
</header>

    <body>
        <?php
        if (!isset($_GET['page']))
            $_GET['page'] = 1;
        if ($_GET['page'] == "1")
            include 'connexion.html';
        elseif ($_GET['page'] == "2")
            include 'ajout-article.php';
        elseif ($_GET['page'] == "3")
            include 'ajout-utilisateur.php';
        elseif ($_GET['page'] == "4")
            include 'utilisateurs.php';
        elseif ($_GET['page'] == "")
            include ("admin.php");
    else
        include ("404.php");
?>
</html>