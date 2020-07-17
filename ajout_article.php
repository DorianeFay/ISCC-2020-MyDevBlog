<?php

function connect_to_database(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $databasename = "BaseDevBlog";
        
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return($pdo);
    }
    catch (PDOException $e) {
        echo "La connexion a echouée" .$e->getMessage();
    }
}

$pdo=connect_to_database();

    if (isset($_POST['titre']))
        $titre=$_POST['titre'];
    else $titre="";
    if (isset($_POST['contenu']))
        $contenu=$_POST['contenu'];
    else $contenu="";
    if (isset($_POST['id']))
        $id=$_POST['id'];
    else $id="";
    if (isset($_FILES['imagee']))
        $image=$_FILES['imagee'];
    else $image="";
    if(isset($_POST['datee']))
        $date=$_POST['datee'];
    else $date="";
    if (isset($_POST['auteur']))
        $auteur=$_POST['auteur'];
    else $auteur="";
    if(isset($_POST['extrait']))
        $extrait=$_POST['extrait'];
    else $extrait="";

    
    try {
        $sql=$pdo->query("INSERT INTO Articles (titre, contenu, imagee, datee, auteur, extrait) 
            VALUES ('$titre', '$contenu', '', '$date', '$auteur', '$extrait')");
        echo "L'article a été ajouté à la base de donnée";

    }
    catch (PDOException $e) {
        echo "Erreur : l'article n'a pas pu être ajouté à la base de donnée" .$e->getMessage();
    }



?>