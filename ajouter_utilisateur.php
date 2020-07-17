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

function ajouter_utilisateur($pdo) {
    try{
        if (!empty($_POST['loginn']) && !empty($_POST['passwordd'])){
            $login=$_POST['loginn'];
            $password=$_POST['passwordd'];

            $requete=$pdo->query("SELECT loginn
            FROM Utilisateurs");
            $res=$requete->fetchAll();
            $found = false;

            if ($res){
                foreach($res as $user){
                    if ($user['loginn'] == $login) {
                        $found = true;
                        }
                    }

                    if(!$found){
                        $sql="INSERT INTO Utilisateurs (loginn, passwordd) VALUES('$login', '$password')";
                        $pdo->exec($sql);
                        echo "L'utilisateur a été ajouté";
                        echo '<br>Cliquez ici pour retourner à la liste des utilisateurs : <a href="http://localhost:8888/ISCC-2020/ISCC-2020-MyDevBlog/back.php?page=4">Liste utilisateurs</a>';
                    } else{
                        echo "Cet utilisateur existe déjà";
                    }
                } else{
                    echo "Cet utilisateur n'a pas pu être créé";
                }
            }
        }
    catch(PDOException $e){
        echo "Login erreur" .$e->getMessage();

    }
}

$pdo=connect_to_database();
ajouter_utilisateur($pdo);
?>