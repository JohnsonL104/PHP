<?php
    include (__DIR__ . '/sql.php');

    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST["action"])){
            if($_POST["action"] == "insertVote"){
                echo(insertDisneyVote($_POST["id"]));
            }
            if($_POST["action"] == "getVotes"){
                echo(getVotes());
            }
        }
    }

?>