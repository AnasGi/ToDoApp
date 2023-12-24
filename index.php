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
    <link rel="stylesheet" href="bt/css/bootstrap.min.css" />
    <title>To Do App</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center text-center vh-100">
        <div class="row h-50">
            <div class="row"><h1 class="col">Todo List</h1></div>
            <div class="row">
                <form method="post">
                    <input class="border rounded p-2 w-50" type="text" name="title" placeholder="Task Title"/>
                    <input class="bg-primary border rounded text-white p-2 w-25" type="submit" name="add" value="Add" />
                </form>
                <div class="mt-3">
                    <?php
                        $tsk = $c->query("SELECT * from todo order by created_at desc");
                        while($res = $tsk->fetch(PDO::FETCH_ASSOC)){
                            $id = $res['id'];
                            echo $res['done'] == "0"? "<div class='bg-warning-subtle border rounded p-3 m-1 d-flex justify-content-between'><span class='p-2 lead '>".$res['title']."</span> <div><a href='done.php?id=$id'><input class='bg-primary border rounded text-white p-2' type='submit' name='Done' value='Done' /></a> <a href='delete.php?id=$id'><input class='bg-danger border rounded text-white p-2' type='submit' name='delt' value='X' /></a></div> </div>" : "<div style='background-color:lightgreen;' class=' p-3 m-1 border rounded d-flex justify-content-between'><span class='p-2 lead'>".$res['title']."</span> <div> <a href='undo.php?id=$id'><input class='bg-primary border rounded text-white p-2' type='submit' name='undo' value='Undo' /></a> <a href='delete.php?id=$id'><input class='bg-danger border rounded text-white p-2' type='submit' name='delt' value='X' /></a></div> </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <footer class="row">
            <p class="col text-center">Made By Anas Boussalem</p>
        </footer>
    </div>                  

</body>
</html>
