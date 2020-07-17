<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <head>
        <title>Utilisateurs</title>
    </head>

<body>
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

function afficher_article($pdo) {
    $number_article=$_POST['id'];

    $articles=$pdo->query("SELECT * FROM Articles
    WHERE id ='$number_article'")->fetchAll();
    echo $articles[0]['Article'];
}
$pdo=connect_to_database();
afficher_article($pdo);

?>
</html>