<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <head>
        <title>Utilisateurs</title>
    </head>

<body>
    <h2>Liste des utilisateurs</h2>
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

function afficher_utilisateurs($pdo){
    $utilisateurs=$pdo->query("SELECT * FROM Utilisateurs")->fetchAll();
    foreach($utilisateurs as $utilisateur) {
        echo '<strong> Login : </strong>'.$utilisateur['loginn'].' <br/> <strong>Mot de passe : </strong>'.$utilisateur['passwordd'].'';

?> 
<form method="POST" action="supprimer_utilisateur.php?id <?php 
    echo $utilisateur['id']?>">
    <button type="submit" name="supprimer_utilisateur">Supprimer l'utilisateur</button>
</form>

<?php 
    echo '<br><br>';
    }
}

$pdo=connect_to_database();
afficher_utilisateurs($pdo);
?> 
    
</body> 

</html>