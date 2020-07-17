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

        try {
            try {
                $query=$pdo->query("SELECT * FROM Utilisateurs")->fetchAll();
                foreach($query as $user){
                    $login=$user['loginn'];
                    $password=$user['passwordd'];
                    $id=$user['id'];
                }
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        $query=$pdo->query("DELETE FROM Utilisateurs WHERE id='$id'");
        echo "L'utilisateur a bien été supprimé";
        echo "<br>Cliquez ici pour afficher les utilisateurs : <a href='http://localhost:8888/ISCC-2020/ISCC-2020-MyDevBlog/back.php?page=4'>Liste utilisateur</a>";
        }
        catch (PDOException $e) {
            echo "Erreur : L'utilisateur n'a pas pu être supprimé" .$e->getMessage();
        }
?>