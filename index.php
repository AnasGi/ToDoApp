<?php 
    $server='localhost';
    $username='root';
    $password='AnSql12345';
    $dataBase='todolist';

    try{
        $c = new PDO("mysql:host=$server; dbname=$dataBase", $username, $password);
        $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        echo "erreur lors de la connexion a la base de données: ".$e->getMessage();
    }

    if(isset($_POST["add"])){
        $tache = $c->prepare("INSERT into todo(title , isdone , created_at) values(:p1 , :p2 , :p3)");
        $tache->bindValue(":p1" , $_POST["task"]);
        $tache->bindValue(":p2" , $_POST["done"]);
        $tache->bindValue(":p3" , strtotime("now"));
    }
?>
