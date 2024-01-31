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
                this.todoList = response.data;
            });
        },

        toggleTodoStatus(index) {
            const data = {
                todoIndex: index
            }

            // const data = new FormData();
            // data.append('taskIndex', index);

            axios.post(this.apiUrl, data, {
                headers: { 'content-type': 'multipart/form-data' }
            }).then((response) => {

                this.todoList = response.data

            });

        },
        deleteTodo(index) {
            const data = {
                todoIndexDelete: index
            }

            axios.post(this.apiUrl, data, {
                headers: { 'content-type': 'multipart/form-data' }
            }).then((response) => {

                this.todoList = response.data

            });
        }
    }
}).mount('#app')