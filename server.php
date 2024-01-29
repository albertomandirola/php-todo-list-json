<?php
// Create variable with value todolist in file json
$todoList = file_get_contents('todo-list.json');

// decode the list take in json in associative array 
$list = json_decode($todoList, true);

if (isset($_POST['name'])) {
    //create variable whose value is the user input
    $todoName = $_POST['name'];
    $todoDone = false;

    $todo = [
        "name" => $todoName,
        "done" => $todoDone,
    ];
    $list[] = $todo;

    // save the new file todo in json
    file_put_contents('todo-list.json', json_encode($list));
}

header('Content-Type: application/json');

//send back the information in json form
echo json_encode($list);
