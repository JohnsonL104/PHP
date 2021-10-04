<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3, span{
            display : inline
        }
    </style>
</head>
<body>
    
    <ul>
        <!-- display tasks on the page using a foreach loop -->
        <li>
            <h3>Title: </h3>
            <span><?=$tasks['title']?></span>
        </li>
        <li>
            <h3>Due Date: </h3>
            <span><?=$tasks['dueDate']?></span>
        </li>
        <li>
            <h3>Assigned To: </h3>
            <span><?=$tasks['assignedTo']?></span>
        </li>
        <li>
            <h3>Status: </h3>
            <span><?php
                if($tasks['completed']){
                    echo '&#9989;';
                }
                else{
                    echo '&#9940;';
                }
            ?></span>
        </li>
    </ul>
</body>
</html>