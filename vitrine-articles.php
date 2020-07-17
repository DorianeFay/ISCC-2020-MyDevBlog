<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<body>
<h2>Mes articles</h2>
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

function articles($pdo){
    $articles=$pdo->query("SELECT * FROM Articles")->fetchAll();
    foreach($articles as $article) {
        echo '<strong>'.$article['titre'].'</strong> ';
        echo '<br>' .$article['extrait'] .'<br>';
        echo $article['imagee'];
       

        $number_article=$article['id'];
    ?>
    <a href="front.php?page=article&id=<?php echo $number_article?>"> <br> Lire la suite de l'article</a>
    <?php 
    echo '<br><br>';
    }
}

$pdo=connect_to_database();
articles($pdo);
?> 
    
</body> 

</html>