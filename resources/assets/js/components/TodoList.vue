<template>
    <div>
        <table class="table table-hover" v-if="todos && todos.length">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cursor"
                    v-for="todo in todos" :key="todo.id"
                    @dblclick="handleDblClick(todo)">
                    <td>{{ todo.title }}</td>
                    <td>{{ todo.start | dateFormat }}</td>
                    <td>{{ todo.end | dateFormat }}</td>
                </tr>
            </tbody>
        </table>
        <p v-if="todos && !todos.length" class="text-center todolist__pagraph--not-found">
            Nenhum registro cadastrado.
        </p>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    props: ['todos'],
    methods: {
        handleDblClick(todo) {
            this.$store.commit('FORM_SET_EDIT', todo);
        }
    },
    filters: {
        dateFormat(value) {
            if (!value) {
                return '';
            }
            return moment(value).format('DD/MM/YYYY');
        }
    }
}
</script>

<style>
.todolist__pagraph--not-found {
    margin: 10px 0;
}
</style>
