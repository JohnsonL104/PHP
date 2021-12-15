<?php
    
    require(__DIR__ . '/models/sql.php');
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

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
        .wrapper{
            display: flex;
        }
        .character{
            display:flex;
            flex-direction: column;
            align-items: center;
            border: 5px solid black;
            margin-right: 5px;
        }
        .voteBtn{
            background-color: green;
            text-align: center;
            color: white;
            width: 70%;
            font-size: 1.1em;
            margin: 2px;
            border-radius: 20px;
        }
        .voteBtn:hover{
            color: white;
            text-decoration: none;
            background-color: green;
        }
        

    </style>
</head>
<body>


    <?php 
        include(__DIR__.'/header.php');
    ?>


    <main>
        <h1>Vote for your favorite Disney Character</h1>
        <div class = "wrapper">
            <div class = "character">
                <h2>Donald Duck</h2>
                <img src = "img/donald.png">
                <a class = "voteBtn" id = "1" href = "#">Vote for Donald Duck</a>
            </div>
            
            <div class = "character">
                <h2>Mickey Mouse</h2>
                <img src = "img/mickey.png">
                <a class = "voteBtn" id = "2" href = "#">Vote for Mickey Mouse</a>
            </div>
            <div class = "character">
                <h2>Goofy</h2>
                <img src = "img/goofy.png">
                <a class = "voteBtn" id = "3" href = "#">Vote for Goofy</a>
            </div>
            <div class = "character"><canvas id = "chart" width = "400" height ="400"></canvas></div>
        </div>
        
    </main>

    

    <?php 
        include(__DIR__.'/footer.php');
    ?>        




    
    
    <script>
        var voteBtns = document.querySelectorAll(".voteBtn");
        var ctx = document.querySelector("#chart").getContext("2d");

        function updateChart(_data){
            var chart = new Chart(ctx, {
                type: 'bar', 
                data: _data, 
                options: {
                  scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            })
        }

        $.ajax({
            url : "models/vote.php",
            method : "POST",
            data:{
                'action' : 'getVotes'
            }
        })
        .fail(function(e) {console.log(e)})
        .done(function(data){
            data = JSON.parse(data);
            
            updateChart({
                labels: data[0],
                datasets:[
                    {
                        label: "Number of Votes",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                        data: data[1],
                        borderWidth: 10
                    }
                ]
            })
        })

        for(let i = 0; i < voteBtns.length; i++){
            voteBtns[i].addEventListener("click", function(e){
                $.ajax({
                        url : "models/vote.php",
                        method : "POST",
                        data:{
                            'action' : 'insertVote',
                            'id' : e.target.id
                        }
                    })
                    .fail(function(e) {console.log(e)})
                    .done(function(data){
                        data = JSON.parse(data);
                        console.log(data)
                        updateChart({
                            labels: data[0],
                            datasets:[
                                {
                                    label: "Number of Votes",
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                                    data: data[1],
                                    borderWidth: 10
                                }
                            ]
                        })
                    })
            })
           
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>