<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    
    <title>todolist</title>
</head>
<body>
    <div id='app'>
        <header class='text-center'>
            <h1>TODOLIST</h1>      
        </header>
        <main>
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <ul class="list-unstyled">
                            <li class='py-2' v-for="todo, index in todoList" :key="index">
                                <div @click="doneTodo(index)" :class="todoList[index].done == true ? 'text-decoration-line-through' : ''">
                                    {{todo.name}}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input @keyup.enter="addTodo" v-model="todoNew" type="text" class="form-control" placeholder="add todo" aria-label="add todo" aria-describedby="button-addon2">
                            <button @click="addTodo" class="btn btn-outline-success" type="button" id="button-addon2">Button</button>
                        </div>

                    </div>
                </div>
            </div>  
        </main>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/script.js"></script>
</body>
</html>