<?php 
    require('cnx.php');

    $res = $c->prepare('DELETE from todo where id = :p1');

    $res->bindValue(":p1",$_GET["id"]);

    if( $res->execute() ){
        header("Location: index.php");
    }
?>