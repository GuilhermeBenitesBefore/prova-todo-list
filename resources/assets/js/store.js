import Vue from 'vue'
import Vuex from 'vuex'
import moment from 'moment'
import { showToastrError, showToastrSuccess, getYesterday } from './shared/utils'

Vue.use(Vuex)

const state = {
  todoForm: {
    todoInit: {
      title: '',
      description: '',
      start: '',
      end: '',
      done: false,
      tags: []
    },
    isEditMode: false,
    tags: [],
    startOptions: {
      to: getYesterday()
    },
    endOptions: {
      to: getYesterday()
    }
  },
  todoList: {
    todos: []
  }
}

export const getters = {
  getTodoList (state) {
    return state.todoList.todos
  },
  getTodoInit (state) {
    return state.todoForm.todoInit
  },
  getTodosDone (state) {
    return state.todoList.todos.filter(todo => todo.done)
  },
  getTodosPending (state) {
    return state.todoList.todos.filter(todo => !todo.done)
  },
  getEditMode (state) {
    return state.todoForm.isEditMode
  },
  getFormTags (state) {
    return state.todoForm.tags
  },
  getFormStartOptions (state) {
    return state.todoForm.startOptions
  },
  getFormEndOptions (state) {
    return state.todoForm.endOptions
  }
}

export const actions = {
  TODO_LOAD: ({ commit }) => {
    axios.get(`${BASE_URL}/api/tasks`).then(resp => {
      commit('TODO_SET', {
        todos: resp.data
      })
    })
  },
  TODO_ADD: ({ commit, dispatch }, payload) => {
    axios.post(`${BASE_URL}api/tasks`, payload).then(resp => {
      if (resp.data.error) {
        showToastrError()
        return
      }
      showToastrSuccess()
      commit('TODO_INITIALIZE')
      dispatch('TODO_LOAD')
      dispatch('TAG_LOAD')
    })
  },
  TODO_UPDATE: ({ commit, dispatch }, payload) => {
    axios.put(`${BASE_URL}api/tasks/${payload.id}`, payload).then(resp => {
      if (resp.data.error) {
        showToastrError()
        return
      }
      showToastrSuccess('Atualizado com sucesso!')
      commit('TODO_INITIALIZE')
      dispatch('TODO_LOAD')
      dispatch('TAG_LOAD')
    })
  },
  TODO_REMOVE: ({ commit, dispatch }, payload) => {
    axios.delete(`${BASE_URL}api/tasks/${payload.id}`).then(resp => {
      if (resp.data.error) {
        showToastrError()
        return
      }
      showToastrSuccess('Removido com sucesso!')
      commit('TODO_INITIALIZE')
      dispatch('TODO_LOAD')
      dispatch('TAG_LOAD')
    })
  },
  TAG_LOAD: ({ commit }, payload) => {
    axios.get(`${BASE_URL}/api/tags`).then(resp => {
      commit('FORM_SET_TAGS', {
        tags: resp.data
      })
    })
  },
  FORM_CANCEL: ({ commit, dispatch }) => {
    commit('TODO_INITIALIZE')
    dispatch('TODO_LOAD')
  }
}

export const mutations = {
  TODO_SET: (state, { todos }) => {
    state.todoList.todos = todos
  },
  TODO_INITIALIZE: (state, payload) => {
    state.todoForm.todoInit = {
      title: '',
      description: '',
      start: '',
      end: '',
      done: false,
      tags: []
    }
    state.todoForm.startOptions = {
      to: getYesterday()
    }
    state.todoForm.endOptions = {
      to: getYesterday()
    }
    state.todoForm.isEditMode = false
  },
  FORM_SET_EDIT: (state, payload) => {
    state.todoForm.isEditMode = true
    state.todoForm.todoInit = payload
  },
  FORM_SET_TAGS: (state, { tags }) => {
    state.todoForm.tags = tags
  },
  FORM_SET_START_OPTIONS: (state, { date }) => {
    state.todoForm.endOptions = { ...state.todoForm.endOptions, to: date }
    if (state.todoForm.todoInit.end && moment(date) > moment(state.todoForm.todoInit.end)) {
      state.todoForm.todoInit.end = ''
    }
  },
  FORM_SET_END_OPTIONS: (state, { date }) => {
    state.todoForm.startOptions = { ...state.todoForm.startOptions, from: date }
    if (state.todoForm.todoInit.start && moment(date) < moment(state.todoForm.todoInit.start)) {
      state.todoForm.todoInit.start = ''
    }
  }
}

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})
