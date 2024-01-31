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
if (isset($_POST['todoIndex'])) {
    //create variable whose value is the user input
    $index = $_POST['todoIndex'];
    $list[$index]['done'] = !$list[$index]['done'];
    
    
    

    // save the new file todo in json
    file_put_contents('todo-list.json', json_encode($list));
}

if(isset($_POST['todoIndexDelete'])){
    $index = $_POST['todoIndexDelete'];
    
    array_splice($list, $index, 1);
    file_put_contents('todo-list.json', json_encode($list));
}

header('Content-Type: application/json');

//send back the information in json form
echo json_encode($list);
