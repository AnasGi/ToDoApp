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
?>