<?php
    require('cnx.php');

    $upd = $c->prepare("UPDATE todo set done = '1' where id = :p0");
    $upd->bindValue(":p0", $_GET['id']);
    if($upd->execute()){
        header("Location: index.php");
    }
?>