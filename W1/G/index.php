<?php

function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo'</pre>';
}

// Loop 100 times
for($i = 0; $i < 100; $i++){
    // initialize the final string as the integer converted to a string
    $final = strval($i);
    //check if the number is evely divisable by 2 and if so concatonate fizz to the end of the string.
    if(($i % 2) == 0){
        $final .= " fizz";

    }
    //check if the number is evely divisable by 3 and if so concatonate buzz to the end of the string.
    if($i % 3 == 0){
        $final .= " buzz";
    }
    // echo the final string with a breakline at the end
    echo $final."<br>";
}

//Call view.php
require "view.php";
 