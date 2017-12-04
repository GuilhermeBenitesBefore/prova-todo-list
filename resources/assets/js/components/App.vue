<template>
  <div class="row">
    <div class="col-md-12">
      <p>Primeira vez? clique <a v-on:click="startTour" class="cursor">aqui</a> para fazer um tour</p>
    </div>
    <div class="col-md-5">
      <div class="panel panel-primary"
        data-intro="Cadastre uma tarefa para começar. O campo título, início e fim são obrigatório!"
        data-step="1">
        <div class="panel-heading">TodoList</div>
        <div class="panel-body">
          <TodoForm />
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="panel panel-default"
        data-intro="Após cadastrar as tarefas vão ficar disponíveis aqui ordenado por tarefas próximo do fim."
        data-step="2">
        <div class="panel-heading">Terefas</div>
        <div class="panel-body">

          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#all" data-toggle="tab">Todos</a>
            </li>
            <li>
              <a href="#pending" data-toggle="tab">Pendente</a>
            </li>
            <li>
              <a href="#done" data-toggle="tab">Concluído</a>
            </li>
          </ul>

          <div class="tab-content"
            data-intro="Para editar uma tarefa e só dar um clique duplo na tarefa cadastrada."
            data-step="3">

            <div class="tab-pane active" id="all">
              <TodoTable :todos="todos" />
            </div>

            <div class="tab-pane" id="pending">
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
import { mapGetters } from 'vuex'
import TodoForm from './TodoForm.vue'
import TodoTable from './TodoList.vue'

export default {
  components: { TodoForm, TodoTable },
  computed: {
    ...mapGetters({
      todosPending: 'getTodosPending',
      todosDone: 'getTodosDone',
      todos: 'getTodoList'
    })
  },
  created () {
    this.$store.dispatch('TODO_LOAD')
  },
  methods: {
    startTour: () => {
      introJs()
        .setOption('nextLabel', ' próximo ')
        .setOption('prevLabel', ' anterior ')
        .setOption('skipLabel', ' finalizar ')
        .start()
    }
  }
}
</script>
