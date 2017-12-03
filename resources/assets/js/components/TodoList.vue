<template>
    <div>
        <div v-if="todos && todos.length">
            <div class="form-group search__container">
                <input type="text" class="form-control"
                    placeholder="Buscar pelo título..."
                    v-model="search">
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-xs-2 text-center">Concluído</th>
                            <th class="col-xs-4 text-center">Título</th>
                            <th class="col-xs-3 text-center">Início</th>
                            <th class="col-xs-3 text-center">Fim</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <div class="text-right">Total: {{ todos.length }}</div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr class="cursor"
                            v-for="todo in filteredTodos" :key="todo.id"
                            @dblclick="handleDblClick(todo)">
                            <td class="text-center">
                                <input type="checkbox"
                                v-model="todo.done"
                                @change="handleChange(todo)">
                            </td>
                            <td :class="{'text-center': true, 'strike-through': todo.done}">
                                {{ todo.title }}
                            </td>
                            <td class="text-center">{{ todo.start | dateFormat }}</td>
                            <td class="text-center">{{ todo.end | dateFormat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p v-if="todos && !todos.length" class="text-center todolist__pagraph--not-found">
            Nenhum registro cadastrado.
        </p>
    </div>
</template>

<script>
import moment from 'moment';
import { tagsBeforeSave, formateDate } from '../utils/utils';

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
        },
        handleChange(todo) {
            this.$store.dispatch('TODO_UPDATE', tagsBeforeSave(todo));
        }
    },
    filters: {
        dateFormat(value) {
            if (!value) {
                return '';
            }
            return formateDate(value);
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

.strike-through {
    text-decoration: line-through;
}
</style>
