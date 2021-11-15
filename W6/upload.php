<?php
    
    require(__DIR__ . '/models/sql.php');
    session_start();
    $error = false;
    if($_SESSION["user_id"] != ""){
        $user_id = $_SESSION["user_id"];
    }
    else{
        header("Location: login.php");
        die();
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if($_POST["file"] != ""){
            if(insertSchoolsFromFile($_POST["file"])){
                header("Location: search.php");
                die();
            }  
            else{
                $error = true;
            }          
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
    <form method = "post" action = "logout.php">
            <input type = "submit" value = "Logout">
        </form>
       <form method = "post">
           <?= ($error) ? "Error adding file try again." : ""?>
           <input type = "file" name = "file">
           <input type = "submit" value = "Submit">
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