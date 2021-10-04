<?php

function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo'</pre>';
}

//Populate array with tasks
$tasks = [
    'title' => 'Homework',
    'dueDate' => '10/5/21',
    'assignedTo' => 'Lucas Johnson',
    'completed' => false
];

dd($tasks);

//Call view.php
require "view.php";
