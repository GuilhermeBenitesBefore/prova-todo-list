<template>
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">TodoList</div>
                <div class="panel-body">
                    <TodoForm />
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#pending" data-toggle="tab">Pending</a>
                        </li>
                        <li>
                            <a href="#done" data-toggle="tab">Done</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active" id="pending">
                            <TodoTable :todos="todosPending" />
                        </div>

                        <div class="tab-pane" id="done">
                            <TodoTable :todos="todosDone" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import TodoForm from './TodoForm';
import TodoTable from './TodoList';

export default {
    components: { TodoForm, TodoTable },
    computed: {
        ...mapGetters({
            todosPending: 'getTodosPending',
            todosDone: 'getTodosDone'
        })
    },
    created() {
        this.$store.dispatch('TODO_LOAD');
    }
}
</script>