<template>
    <div>
        <div v-if="todos && todos.length">
            <div class="form-group search__container">
                <input type="text" class="form-control"
                    placeholder="Buscar por..."
                    v-model="search">
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Início</th>
                        <th>Fim</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="text-right">Total: {{ todos.length }}</div>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class="cursor"
                        v-for="todo in filteredTodos" :key="todo.id"
                        @dblclick="handleDblClick(todo)">
                        <td>{{ todo.title }}</td>
                        <td>{{ todo.start | dateFormat }}</td>
                        <td>{{ todo.end | dateFormat }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p v-if="todos && !todos.length" class="text-center todolist__pagraph--not-found">
            Nenhum registro cadastrado.
        </p>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    props: ['todos'],
    data() {
        return {
            search: ''
        }
    },
    computed: {
        filteredTodos() {
            return this.todos.filter(todo => {
                return todo.title.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    },
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

.search__container {
    margin: 10px 0;
}
</style>
