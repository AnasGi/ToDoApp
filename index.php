<?php 
    require('cnx.php');

    if(isset($_POST["add"])){
        $tache = $c->prepare("INSERT into todo(title) values(:p1)");
        $tache->bindValue(":p1" , @$_POST["title"]);
        $tache->execute(); 
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
                <input type="text" name="title" placeholder="Task Title"/>
                <input type="submit" name="add" value="Add" />
            </form>
            <div>
                <?php
                    $tsk = $c->query("SELECT * from todo order by created_at desc");
                    while($res = $tsk->fetch(PDO::FETCH_ASSOC)){
                        $id = $res['id'];
                        echo $res['done'] == "0"? "<div><span>".$res['title']."</span> <a href='done.php?id=$id'><input type='submit' name='Done' value='Done' /></a> <a href='delete.php?id=$id'><input type='submit' name='delt' value='X' /></a></div>" : "<div><span>".$res['title']."</span><a href='delete.php?id=$id'><input type='submit' name='delt' value='X' /></a></div>";
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
