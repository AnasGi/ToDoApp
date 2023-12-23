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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
</head>
<body>
    <div>
        <div><h1>Todo List</h1></div>
        <div>
            <form method="post">
                <input type="text" name="task" placeholder="Task Title"/>
                <input type="submit" name="add" value="Add" />
            </form>
            <div>
                <?php

                ?>
            </div>
        </div>
    </div>

</body>
</html>
