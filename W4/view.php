<?php
    
    require(__DIR__ . '/models/Patients.php');
    echo get_table();

    

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




    </style>
</head>
<body>


    <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
        <a class = "navbar-brand" href = "/index.php">SE266 - Lucas Johnson</a>
        <ul class = "navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="assignmentsDD" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Assignments</a>
                
                <div class="dropdown-menu" aria-labelledby="assignmentsDD">
                    <a class = "dropdown-item" href = "/W1/index.php">W1</a>
                    <a class = "dropdown-item" href = "/W2/index.php">W2</a>
                    <a class = "dropdown-item" href = "/W3/index.php">W3</a>
                    <a class = "dropdown-item" href = "/W4/index.php">W4</a>
                    <a class = "dropdown-item" href = "/W5/index.php">W5</a>
                    <a class = "dropdown-item" href = "/W6/index.php">W6</a>
                    <a class = "dropdown-item" href = "/W7/index.php">W7</a>
                    <a class = "dropdown-item" href = "/W8/index.php">W8</a>
                    <a class = "dropdown-item" href = "/W9/index.php">W9</a>
                    <a class = "dropdown-item" href = "/W10/index.php">W10</a>
                </div>
            </li>

            

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="phpRescDD" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PHP Recources</a>
                
                <div class="dropdown-menu" aria-labelledby="phpRescDD">
                    <a class = "dropdown-item" href = "https://www.w3schools.com/php/">W3Schools</a>
                    <a class = "dropdown-item" href = "https://www.youtube.com/watch?v=pWG7ajC_OVo&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&ab_channel=TheNetNinja">Youtube</a>
                    <a class = "dropdown-item" href = "https://www.php.net/docs.php">PHP Documentation</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="gitRescDD" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Git Recources</a>
                
                <div class="dropdown-menu" aria-labelledby="gitRescDD">
                    <a class = "dropdown-item" href = "https://www.codecademy.com/learn/learn-git">Code Academy</a>
                    <a class = "dropdown-item" href = "https://www.youtube.com/watch?v=8JJ101D3knE&ab_channel=ProgrammingwithMosh">Youtube</a>
                    <a class = "dropdown-item" href = "https://git-scm.com/docs">Git Reference documentation</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="herRescDD" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More About Me</a>
                
                <div class="dropdown-menu" aria-labelledby="herRescDD">
                    <a class = "dropdown-item" href = "https://www.escapefromtarkov.com/">Tarkov</a>
                    <a class = "dropdown-item" href = "https://steamcommunity.com/id/loopisjones/">More Games</a>
                    <a class = "dropdown-item" href = "https://eol-lj.000webhostapp.com/coding.html">Code (I do like to code non-proffessionaly)</a>
                </div>
            </li>

           
            <a class = "nav-link" href = "https://github.com/JohnsonL104">Github</a>
            
        </ul>

    </nav>


    <main>
        <h1>Patients</h1>
        <a href = "addPatient.php">Add a Patient</a>
        <table class = "table">
            <thead>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Married</th>
                <th>Date Of Birth</th>
            </thead>
            <?php foreach(getTable() as $i){?>
                <tr>
                    <td><?php echo $i['id'];?></td>
                    <td><?php echo $i['patientFirstName'];?></td>
                    <td><?php echo $i['patientLastName'];?></td>
                    <td><?php echo ($i['patientMarried'] == '0') ? "NO" : "YES" ?></td>
                    <td><?php echo $i['patientBirthDate'];?></td>
                </tr>
            <?php }?>
            
        </table>
    </main>

    






    <footer class = "footer">
        <div class = "container">
            <p class = "text-muted">
                <?php       
                    date_default_timezone_set('UTC');
                    $file = basename($_SERVER['PHP_SELF']);
                    $mod_date=date("F d Y h:i:s A", filemtime($file));
                    echo "File last updated $mod_date UTC";
                ?>
            </p>
            
        </div>
    </footer>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>