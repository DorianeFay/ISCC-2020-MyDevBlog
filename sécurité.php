<?php 
session_start();

function connect_to_database(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $databasename = "BaseDevBlog";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Vous êtes connecté à la database";
        return($pdo);
    }
    catch (PDOException $e) {
        echo "La connexion a echouée" .$e->getMessage();
    }
    }

function login($pdo){
    try{
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login=$_POST['login'];
            $password=$_POST['password'];
           
            $requete=$pdo->query("SELECT passwordd 
            FROM Utilisateurs WHERE loginn= '$login'");
            $res=$requete->fetchAll();

        if ($res){
            if ($password == $res[0]['passwordd']) {
                echo "Vous êtes connecté";
                header("Location: back.php?page=2");
            }
           
        } 
        else {
            echo "<p>Mauvais couple identifiant / mot de passe</p>";
            echo "<p>Cliquez ici pour vous reconnecter : <a href ='connexion.html'>Connexion</a></p>";
        }
        }
    }
    catch (PDOException $e){
        echo "Mauvais couple identifiant/mot de passe" .$e->getMessage();  
    }
}
$pdo = connect_to_database();
login($pdo);

?> 