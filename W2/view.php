<?php
    function age ($bdate) {
        $date = new DateTime($bdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
     }

     function bmi($_heightIN, $_weightLBS){
         $heightM = $_heightIN * 0.0254;
         $weightKG = $_weightLBS/2.20462;
         $bmi = round(($weightKG/($heightM^2)), 1);
         return $bmi;
     }
     function bmiClass($_bmi){
         if($_bmi < 18.5){
             return 'Underwight';
         }
         elseif($_bmi < 24.9){
             return 'Normal Weight';
         }
         elseif($_bmi < 29.9){
             return 'Overweight';
         }
         else{
             return 'Obese';
         }
     }
    $post = false;
    $error = false;
    if(isset($_POST['submitBtn'])){
        $post = true;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $married = filter_input(INPUT_POST, 'married', FILTER_VALIDATE_BOOL);
        $d = strtotime($_POST['birthday']);
        $bday = date('Y-m-d', $d);
        $age = age($bday);
        $heightFT = (int)$_POST['heightFT'];
        $heightIN = (int)$_POST['heightIN'];
        $finalHeightIN = $heightIN + ($heightFT * 12);
        $weight = (int)filter_input(INPUT_POST, 'weight');
        $bmi = bmi($finalHeightIN, $weight);
        $bmiClass = bmiClass($bmi);
        
        $_SESSION['var'] = [
                "fname" => $fname,
                "lname" => $lname,
                "married" => $married,
                "bday" => $bday,
                "age" => $age,
                "finalHeightIN" => $finalHeightIN,
                "bmi" => $bmi,
                "bmiClass" => $bmiClass

        ];

        require("display.php");
        die();
        

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




    </style>
</head>
<body>


    <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
        <a class = "navbar-brand" href = "/PHP/index.php">SE266 - Lucas Johnson</a>
        <ul class = "navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="assignmentsDD" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Assignments</a>
                
                <div class="dropdown-menu" aria-labelledby="assignmentsDD">
                <a class = "dropdown-item" href = "/PHP/W1/index.php">W1</a>
                    <a class = "dropdown-item" href = "/PHP//W2/index.php">W2</a>
                    <a class = "dropdown-item" href = "/PHP//W3/index.php">W3</a>
                    <a class = "dropdown-item" href = "/PHP//W4/index.php">W4</a>
                    <a class = "dropdown-item" href = "/PHP//W5/index.php">W5</a>
                    <a class = "dropdown-item" href = "/PHP//W6/index.php">W6</a>
                    <a class = "dropdown-item" href = "/PHP//W7/index.php">W7</a>
                    <a class = "dropdown-item" href = "/PHP//W8/index.php">W8</a>
                    <a class = "dropdown-item" href = "/PHP//W9/index.php">W9</a>
                    <a class = "dropdown-item" href = "/PHP//W10/index.php">W10</a>
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
        <form method = "post" action = "view.php">
            <p>First Name:</p>
            <input type = "text" name = "fname" value = "<?php echo ($post) ? $fname : ''; ?>" required>
            <p>Last Name:</p>
            <input type = "text" name = "lname" value = "<?php echo ($post) ? $lname : ''; ?>" required>
            <p>Married:</p>
            <div>
                <input type = "radio" id = "yo" name = "married" value = "yes" 
                <?php 
                    if($post){
                        if($married){
                            echo 'checked';
                        }
                    }
                ?>>
                <label for="yo">Yes</label>
            </div>
            <div>
                <input type = "radio" id = "no" name = "married" value = "no" 
                <?php 
                    if($post){
                        if($married){
                            echo '';
                        }
                        else{
                            echo 'checked';
                        }
                    }
                    else{
                        echo 'checked';
                    }
                ?>>
                <label for="no">No</label>
            </div>
            <p>Birthday:</p>
            <input type = "date" name = "birthday"  value = "<?php echo ($post) ? $bday : '' ;?>" max = "<?= date('Y-m-d');?>" required>
            <p>Height:</p>
            <select name = "heightFT">
                <option value = "1" <?php echo ($post and $heightFT == 1) ? 'selected': '';?>>1ft</option>
                <option value = "2" <?php echo ($post and $heightFT == 2) ? 'selected': '';?>>2ft</option>
                <option value = "3" <?php echo ($post and $heightFT == 3) ? 'selected': '';?>>3ft</option>
                <option value = "4" <?php echo ($post and $heightFT == 4) ? 'selected': '';?>>4ft</option>
                <option value = "5" <?php echo ($post and $heightFT == 5) ? 'selected': '';?>>5ft</option>
                <option value = "6" <?php echo ($post and $heightFT == 6) ? 'selected': '';?>>6ft</option>
                <option value = "7" <?php echo ($post and $heightFT == 7) ? 'selected': '';?>>7ft</option>
                <option value = "8" <?php echo ($post and $heightFT == 8) ? 'selected': '';?>>8ft</option>
            </select>
            <select name = "heightIN">
                <option value = "0" <?php echo ($post and $heightIN == 0) ? 'selected': '';?>>0in</option>
                <option value = "1" <?php echo ($post and $heightIN == 1) ? 'selected': '';?>>1in</option>
                <option value = "2" <?php echo ($post and $heightIN == 2) ? 'selected': '';?>>2in</option>
                <option value = "3" <?php echo ($post and $heightIN == 3) ? 'selected': '';?>>3in</option>
                <option value = "4" <?php echo ($post and $heightIN == 4) ? 'selected': '';?>>4in</option>
                <option value = "5" <?php echo ($post and $heightIN == 5) ? 'selected': '';?>>5in</option>
                <option value = "6" <?php echo ($post and $heightIN == 6) ? 'selected': '';?>>6in</option>
                <option value = "7" <?php echo ($post and $heightIN == 7) ? 'selected': '';?>>7in</option>
                <option value = "8" <?php echo ($post and $heightIN == 8) ? 'selected': '';?>>8in</option>
                <option value = "9" <?php echo ($post and $heightIN == 9) ? 'selected': '';?>>9in</option>
                <option value = "10" <?php echo ($post and $heightIN == 10) ? 'selected': '';?>>10in</option>
                <option value = "11" <?php echo ($post and $heightIN == 11) ? 'selected': '';?>>11in</option>
            </select>
            <p>Weight:</p>
            <input name = "weight" type="range" min="1" max="1000" value="<?php echo ($post) ? $weight : '150';?>" class="slider" id="weightSLI">
            <p id = "weightLBL"></p>

            <input type = "submit" name = "submitBtn">
        </form>
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
    
    <script>
        console.log("test")
        var slider = document.querySelector("#weightSLI")
        var output = document.querySelector("#weightLBL")

        output.innerHTML = slider.value + "lbs"

        slider.oninput = function(){
            output.innerHTML = this.value + "lbs"
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>