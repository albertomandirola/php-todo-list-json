<?php
// Create variable with value todolist in file json
$todoList = file_get_contents('todo-list.json');

// decode the list take in json in associative array 
$list = json_decode($todoList, true);

header('Content-Type: application/json');

//send back the information in json form
echo json_encode($list);
