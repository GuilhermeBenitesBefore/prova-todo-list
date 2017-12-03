<template>
  <div>
    <form>
      <div class="form-group">
        <label for="title">Título</label>
        <input
          type="text"
          class="form-control"
          id="title"
          name="title"
          v-model="todo.title" />
      </div>
      <div class="form-group">
        <label for="tags">Tags</label>
        <v-select
          multiple
          :options="tags"
          :taggable="true"
          v-model="todo.tags"
          label="title">
          <span slot="no-options">Sem opções correspondentes.</span>
        </v-select>
      </div>
      <div class="form-group">
        <label for="description">Descrição</label>
        <textarea
          id="description"
          class="form-control"
          rows="3"
          v-model="todo.description"></textarea>
      </div>
      <div class="form-group">
        <label for="start">Início</label>
        <datepicker
          name="start"
          format="dd/MM/yyyy"
          input-class="form-control datepicker__input"
          language="pt-br"
          :required="true"
          :disabled="startOptions"
          @selected="handleStartSelected"
          @opened="handleStartOpened"
          v-model="todo.start"></datepicker>
      </div>
      <div class="form-group">
        <label for="end">Fim</label>
        <datepicker
          name="end"
          format="dd/MM/yyyy"
          input-class="form-control datepicker__input"
          language="pt-br"
          :required="true"
          :disabled="endOptions"
          @selected="handleEndSelected"
          @opened="handleEndOpened"
          v-model="todo.end"></datepicker>
      </div>
      <div class="form-group" v-if="isEditMode">
        <div class="checkbox">
          <label>
            <input type="checkbox" v-model="todo.done"> Concluído?
          </label>
        </div>
      </div>
      <button
        type="button"
        class="btn btn-primary"
        v-if="!isEditMode"
        :disabled="!isCompleted"
        @click.prevent="addTodo()">Adicionar</button>
      <button
        type="button"
        class="btn btn-primary"
        v-if="isEditMode"
        :disabled="!isCompleted"
        @click.prevent="editTodo()">Atualizar</button>
      <button
        type="button"
        class="btn btn-danger"
        v-if="isEditMode"
        @click="removeTodo()">Apagar</button>
      <button
        type="button"
        class="btn btn-default"
        v-if="isEditMode"
        @click="cancelEditMode()">Cancelar</button>
    </form>
    <simplert :useRadius="true"
      :useIcon="true"
      ref="simplert">
    </simplert>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Datepicker from 'vuejs-datepicker'
import vSelect from 'vue-select'
import Simplert from 'vue2-simplert'
import { tagsBeforeSave, formateDate } from '../shared/utils'

export default {
  components: { Datepicker, vSelect, Simplert },
  computed: {
    ...mapGetters({
      todo: 'getTodoInit',
      isEditMode: 'getEditMode',
      tags: 'getFormTags',
      startOptions: 'getFormStartOptions',
      endOptions: 'getFormEndOptions'
    }),
    isCompleted: function () {
      return this.todo.title && this.todo.start && this.todo.end
    }
  },
  created () {
    this.$store.dispatch('TAG_LOAD')
  },
  methods: {
    addTodo () {
      const _todo = tagsBeforeSave(this.todo)
      this.$store.dispatch('TODO_ADD', {
        ..._todo,
        start: formateDate(this.todo.start, 'YYYY-MM-DD'),
        end: formateDate(this.todo.end, 'YYYY-MM-DD')
      })
    },
    editTodo () {
      const _todo = tagsBeforeSave(this.todo)
      this.$store.dispatch('TODO_UPDATE', {
        ..._todo,
        start: formateDate(this.todo.start, 'YYYY-MM-DD'),
        end: formateDate(this.todo.end, 'YYYY-MM-DD')
      })
    },
    removeTodo () {
      this.$refs.simplert.openSimplert({
        title: 'Atenção',
        message: 'Deseja remover este registro?',
        type: 'warning',
        useConfirmBtn: true,
        customCloseBtnText: 'Cancel',
        customCloseBtnClass: 'simplert__close simplert__close--radius',
        customConfirmBtnText: 'Ok',
        customConfirmBtnClass: 'simplert__confirm simplert__confirm--radius',
        onConfirm: () => {
          this.$store.dispatch('TODO_REMOVE', this.todo)
        }
      })
    },
    handleStartSelected (date) {
      this.$store.commit('FORM_SET_START_OPTIONS', { date })
    },
    handleEndSelected (date) {
      this.$store.commit('FORM_SET_END_OPTIONS', { date })
    },
    cancelEditMode () {
      this.$store.dispatch('FORM_CANCEL')
    },
    handleStartOpened () {
      this.$store.commit('FORM_SET_END_OPTIONS', { date: new Date(this.todo.end) })
    },
    handleEndOpened () {
      this.$store.commit('FORM_SET_START_OPTIONS', { date: new Date(this.todo.start) })
    }
  }
}
</script>

<style>
.datepicker__input:read-only {
  background-color: #ffffff;
}
</style>
