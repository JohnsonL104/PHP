<?php
    
    require(__DIR__ . '/models/sql.php');
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        $password = sha1("school-salt".$_POST["password"]);
        $_POST["password"] = "";
        $results = checkLogin($_POST["username"], $password);
        if($results != false){
            session_start();
            $_SESSION["user_id"] = $results[0]["user_id"];
            echo($_SESSION["user_id"]);
            header("Location: search.php");
        }
        
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE266 - Lucas Johnson</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html,body{
            height: 100%;
        }
        .footer {
            position: fixed;
            bottom: 0;
        }
        main{
            margin-top: 10px;
            width: 80%;
            margin-left: 10%;
            background-color: #eeeeee;
            padding: 5%;
        }
        .hidden{ 
            display: none;
        }



    </style>
</head>
<body>


    <?php 
        include(__DIR__.'/header.php');
        
    ?>


    <main>
        <form method = "post">
            <?= ($_SERVER['REQUEST_METHOD']==='POST') ? "Login Failed: Incorrect username or password.<br>" : ""?>
            User Name:
            <input type = "text" placeholder="Username" name = "username" required><br>
            Password:
            <input type = "password" name = "password" placeholder="Password" required><br>
            <input type = "submit" value = "Login">
        </form>
    </main>

    

    <?php 
        include(__DIR__.'/footer.php');
    ?>        




    

    <script>

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>