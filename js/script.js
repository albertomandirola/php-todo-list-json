const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: 'server.php',
            todoList: [],
            todoNew: ''
        }
    },
    mounted() {
        this.getTodoList();
    },
    methods: {
        getTodoList() {
            //axios call that allow to take data from api
            axios.get(this.apiUrl).then((response) => {
                this.todoList = response.data;
            })
        },
        addTodo() {
            // create posts variable
            const data = {
                name: this.todoNew,
            }
            //do the POST's call with the new variable
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoNew = '';
                this.todoList = response.data;
            });
        },
        doneTodo(index) {
            this.todoList[index].done = !this.todoList[index].done
        }

    },
}).mount('#app')