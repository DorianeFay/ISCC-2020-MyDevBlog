<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
        <title>Doriane Fay</title>
    </head>

    <body>
    <h2>Présentation</h2>
        <div class="présentation">
        <img id='photocv' src="assets/photoCV.JPG">
        <p class="texteprésentation"> Bonjour ! Je m'appelle Doriane Fay, j'ai 21 ans et j'habite à Strasbourg. 
            Je suis étudiante en master digital marketing / communication & médias sociaux à l'ISEG de Strasbourg
            et j'ai décidé de vous présenter mon parcours, mes projets et qui je suis à travers ce site internet. 
        </p>
</div>
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
    $articles=$pdo->query("SELECT * FROM Articles ORDER BY id DESC LIMIT 5")->fetchAll();
    foreach($articles as $article) {
        echo '<strong>'.$article['titre'].'</strong> '.$article['imagee']. '<br/> '.$article['extrait'].'';

        $number_article=$article['id'];
    ?>
    <a href="./front.php?page=article&id=<?php echo $number_article?>">Lire la suite de l'article</a>
    <?php 
    echo '<br><br>';
    }
}

$pdo=connect_to_database();
articles($pdo);
    ?>

    </body>

 
</html>